<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Profile;
use App\User;
use Auth;
use DB;

class ProfileController extends Controller
{
  //   public function getCreate()
  //   {
  //   	$id = Auth::user()->id;
  //   	$profiles = DB::table('profiles')->select(DB::raw('*'))->where('user_id',$id)->get();
  //   	return view('profile.create',[
  //   			'profiles' => $profiles
  //   		]);
  //   }

  //    public function postCreate(Request $request)
  //   {
  //   	//$file = array('photo' => Input::file('photo'));
  //   	$this->validate($request,[
		// 	'name' => 'required',
		// 	'job_title' => 'required',
		// 	'sex' => 'required',
		// 	'address' => 'required',
		// 	'photo' => 'required'
			
		// ]);
  //   	//$user = new User();
  //   	if (Auth::check())
  //   	{
  //   		$imageName = $request->file('photo')->getClientOriginalName();
  //   		$request->file('photo')->move(base_path().'/public/images',$imageName);
  //   		$profile = new Profile([
  //   		'user_id'=> Auth::user()->id,
		// 	'name' => $request->input('name'),
		// 	'job_title' => $request->input('job_title'),
		// 	'sex' => $request->input('sex'),
		// 	'address' => $request->input('address'),
  //   		'email' => Auth::user()->email,
  //   		'photo' => '/images/'.$imageName
		// 	]);
		// 	$profile->save();


		// 	return redirect()->route('dashboard.dashboard');
  //   	}
  //   	return redirect()->route('home.index');
		
  //   }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       $id = Auth::user()->id;
        $profiles = DB::table('profiles')->select(DB::raw('*'))->where('user_id',$id)->get();
        return view('profile.index',compact('profiles'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profile.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->validate($request,[
            'name' => 'required',
            'job_title' => 'required',
            'sex' => 'required',
            'address' => 'required',
            'photo' => 'required'
            
        ]);

       if (Auth::check())
        {
           
        
            $imageName = $request->file('photo')->getClientOriginalName();
            $request->file('photo')->move(base_path().'/public/images',$imageName);
            Profile::create([
            'user_id'=> Auth::user()->id,
            'name' => $request->input('name'),
            'job_title' => $request->input('job_title'),
            'sex' => $request->input('sex'),
            'address' => $request->input('address'),
            'email' => Auth::user()->email,
            'photo' => '/images/'.$imageName
            ]);
            return redirect()->route('profile.index')
                        ->with('success','Profile created successfully');
        }
        return redirect()->route('home.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $profiles = Profile::find($id);
        return view('profile.show',compact('profiles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profiles = Profile::find($id);
        return view('profile.edit',compact('profiles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $this->validate($request,[
            'name' => 'required',
            'job_title' => 'required',
            'sex' => 'required',
            'address' => 'required',
            'photo' => 'required'
            
        ]);

       if (Auth::check())
        {
          
        $imageName = $request->file('photo')->getClientOriginalName();
        $request->file('photo')->move(base_path().'/public/images',$imageName);
         Profile::find($id)->update([
        'user_id'=> Auth::user()->id,
            'name' => $request->input('name'),
            'job_title' => $request->input('job_title'),
            'sex' => $request->input('sex'),
            'address' => $request->input('address'),
            'email' => Auth::user()->email,
            'photo' => '/images/'.$imageName
        ]);
        return redirect()->route('profile.index')
                        ->with('success','Profile updated successfully');
        }
        return redirect()->route('home.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Profile::find($id)->delete();
        return redirect()->route('profile.index')
                        ->with('success','Profile deleted successfully');
    }
}
