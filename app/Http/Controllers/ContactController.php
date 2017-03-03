<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Contact;

class ContactController extends Controller
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

   	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $contacts = Contact::orderBy('id','DESC')->paginate(5);
        return view('contact.index',compact('contacts'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contacts = Contact::find($id);
        return view('contact.show',compact('contacts'));
    }

    public function destroy($id)
    {
        Contact::find($id)->delete();
        return redirect()->route('contact.index')
                        ->with('success','Your Message deleted successfully');
    }

}
