<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;
use App\Service;
use App\Education;
use App\Skill;
use App\Experience;
use App\Project;
use App\Quotes;
use App\Medsos;
class HomeController extends Controller
{
    //
    public function index()
    {
    	$profiles = DB::table('profiles')->take(1)->get();
      $quotes = Quotes::all();
      $medsoss = DB::table('medsos')
          ->join('icon',function ($join){
            $join->on('medsos.icon_id','=','icon.id');
          })->get();
     	$services = Service::orderBy('id','ASC')->get();
     	$educations = Education::orderBy('id','DESC')->take(2)->get();
    	$skills = Skill::orderBy('id','ASC')->take(5)->get();
      $skills_more = Skill::orderBy('id','DESC')->take(3)->get();
    	$experiences = Experience::orderBy('id','DESC')->get();
    	$experiences_count =  DB::table('experience')->count();
    	$projects = Project::orderBy('id','DESC')->get();
    	$projects_count =  DB::table('projects')->count();
    	return view('home.index',[
    		'profiles' => $profiles,
        'quotes' => $quotes,
        'medsoss' => $medsoss,
    		'services' => $services,
    		'educations' => $educations,
    		'skills' =>$skills,
        'skills_more' => $skills_more,
    		'experiences' => $experiences,
    		'projects' => $projects,
    		'experiences_count' =>$experiences_count,
    		'projects_count' => $projects_count
    	]);
    }

    // public function click($id)
    // {
      
    //   $click = DB::table('medsos')->select(DB::raw('click'))->where('id','=',$id)->get();
    //   var_dump($click);
    //   $click = $click + 1;
    //   DB::table('medsos')->insert(
    //     ['click'=>$click]
    //     )->where('id','=',$id);

    // }
}
