<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Education;
use Validator;
use Session;
class EducationController extends Controller
{
  	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $educations = Education::orderBy('id','DESC')->paginate(5);
        return view('education.index',compact('educations'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('education.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            
            'institusi' => 'required',
            'tahun' => 'required',
            'gelar' => 'required',
            'deskripsi' => 'required',
        ]);

        Education::create($request->all());
        return redirect()->route('education.index')
                        ->with('success','Education created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $educations = Education::find($id);
        return view('education.show',compact('educations'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $educations = Education::find($id);
        return view('education.edit',compact('educations'));
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
        $this->validate($request, [
            'institusi' => 'required',
            'tahun' => 'required',
            'gelar' => 'required',
            'deskripsi' => 'required',
        ]);

        Education::find($id)->update($request->all());
        return redirect()->route('education.index')
                        ->with('success','Education updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Education::find($id)->delete();
        return redirect()->route('education.index')
                        ->with('success','Education deleted successfully');
    }

}
