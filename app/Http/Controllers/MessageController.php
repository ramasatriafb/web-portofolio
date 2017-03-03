<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Contact;

class MessageController extends Controller
{
   public function create(Request $request)
   {
   		$validation = $this->validate($request,[
			'name' => 'required',
			'email' => 'email|required',
			'phone' => 'required|min:6',
			'message'=> 'required'

			
		]);

		

		// $contact = new Contact([
		// 	'name' => $request->input('name'),
		// 	'email' => $request->input('email'),
		// 	'phone' => $request->input('phone'),
		// 	'message' => $request->input('message')
		// ]);
		// $contact->save();
         Contact::create($request->all());

		return redirect()->route('home.index');
   }



}
