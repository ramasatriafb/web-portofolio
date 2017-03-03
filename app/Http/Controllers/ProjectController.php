<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Project;
use Validator;
use Session;
class ProjectController extends Controller
{
  	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $projects = Project::orderBy('id','DESC')->paginate(5);
        return view('project.index',compact('projects'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('project.create');
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
            
            'name' => 'required',
            'image' => 'required',
            // 'link' => 'required',
            'deskripsi' => 'required',
        ]);
        
        $imageName = $request->file('image')->getClientOriginalName();
        $request->file('image')->move(base_path().'/public/images',$imageName);
        Project::create([
            'name' => $request->input('name'),
            'image' => '/images/'.$imageName,
            'link' => $request->input('link'),
            'deskripsi' => $request->input('deskripsi')
            ]);
        return redirect()->route('project.index')
                        ->with('success','Project created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $projects = Project::find($id);
        return view('project.show',compact('projects'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $projects = Project::find($id);
        return view('project.edit',compact('projects'));
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
            'name' => 'required',
            'image' => 'required',
            // 'link' => 'required',
            'deskripsi' => 'required',
        ]);
        $imageName = $request->file('image')->getClientOriginalName();
        $request->file('image')->move(base_path().'/public/images',$imageName);
        Project::find($id)->update([
            'name' => $request->input('name'),
            'image' => '/images/'.$imageName,
            'link' => $request->input('link'),
            'deskripsi' => $request->input('deskripsi')
            ]);
        return redirect()->route('project.index')
                        ->with('success','Project updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Project::find($id)->delete();
        return redirect()->route('project.index')
                        ->with('success','Project deleted successfully');
    }

}
