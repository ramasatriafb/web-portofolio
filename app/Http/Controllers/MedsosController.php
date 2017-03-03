<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Medsos;
use Validator;
use Session;
class MedsosController extends Controller
{
  	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index(Request $request)
    // {
    //     $medsoss = Medsos::orderBy('id','DESC')->paginate(5);
    //     return view('medsos.index',compact('medsoss'))
    //         ->with('i', ($request->input('page', 1) - 1) * 5);
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     return view('medsos.create');
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            
            'icon_id' => 'required',
            'social_media' => 'required',
            'link' => 'required',
            
        ]);

        Medsos::create($request->all());
        return redirect()->route('dashboard.dashboard')
                        ->with('success','Your Social Media created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     $medsoss = Medsos::find($id);
    //     return view('medsos.show',compact('medsoss'));
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // {
    //     $medsoss = Medsos::find($id);
    //     return view('medsos.edit',compact('medsoss'));
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    // {
    //     $this->validate($request, [
    //         'icon' => 'required',
    //     ]);

    //     Icon::find($id)->update($request->all());
    //     return redirect()->route('icon.index')
    //                     ->with('success','Icon updated successfully');
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Medsos::find($id)->delete();
        return redirect()->route('dashboard.dashboard')
                        ->with('success','Your Social Media deleted successfully');
    }

}
