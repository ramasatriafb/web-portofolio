<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use Illuminate\Http\Request;
use Session;

class UserController extends Controller {

	
	public function getSignup()
	{
		return view ('user.signup');
	}

	
	public function postSignup(Request $request )
	{
		$this->validate($request,[
			'email' => 'email|required|unique:users',
			'password' => 'required|min:4'
		]);

		$user = new User([
			'email' => $request->input('email'),
			'password' => bcrypt($request->input('password'))
		]);
		$user->save();

		Auth::login($user);

		if(Session::has('oldUrl'))
		{
			$oldUrl = Session::get('oldUrl');
			Session::forget('oldUrl');
			return redirect()->to(Session::get('oldUrl'));
		}

		return redirect()->route('dashboard.dashboard');
	}

	public function getSignin()
	{
		return view ('user.signin');
	}

	public function postSignin (Request $request)
	{
		$this->validate($request,[
			'email' => 'email|required',
			'password' => 'required|min:4'
		]);

		if(Auth::attempt(['email' => $request->input('email'),'password' => $request->input('password')]))
		{
			if(Session::has('oldUrl'))
			{
				$oldUrl = Session::get('oldUrl');
				Session::forget('oldUrl');
				return redirect()->to($oldUrl);
			}
			return redirect()->route('dashboard.dashboard');
		}

		return redirect()->back();
	}	
	public function logout()
	{
		Auth::logout();
		return redirect()->route('home.index');
	}
}