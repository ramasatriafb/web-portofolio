<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Experience;
use Validator;
use Session;
class ExperienceController extends Controller
{
  	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $experiences = Experience::orderBy('id','DESC')->paginate(5);
        return view('experience.index',compact('experiences'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('experience.create');
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
            
             'profesi' => 'required',
            'tahun' => 'required',
            'perusahaan' => 'required',
            'deskripsi' => 'required',
        ]);

        Experience::create($request->all());
        return redirect()->route('experience.index')
                        ->with('success','Experience created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $experiences = Experience::find($id);
        return view('experience.show',compact('experiences'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $experiences = Experience::find($id);
        return view('experience.edit',compact('experiences'));
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
            'profesi' => 'required',
            'tahun' => 'required',
            'perusahaan' => 'required',
            'deskripsi' => 'required',
        ]);

        Experience::find($id)->update($request->all());
        return redirect()->route('experience.index')
                        ->with('success','Experience updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Experience::find($id)->delete();
        return redirect()->route('experience.index')
                        ->with('success','Experience deleted successfully');
    }

}
