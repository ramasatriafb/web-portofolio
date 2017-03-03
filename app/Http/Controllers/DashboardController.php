<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
Use App\Icon;
use App\Medsos;
use App\Contact;
use App\Project;
use App\Quotes;
use DB;
class DashboardController extends Controller
{
    public function index()
    {
    	//Array Hari
		$array_hari = array(1=>'Senin','Selasa','Rabu','Kamis','Jumat', 'Sabtu','Minggu');
		$hari = $array_hari[date('N')];

		//Format Tanggal
		$tanggal = date ('j');

		//Array Bulan
		$array_bulan = array(1=>'Januari','Februari','Maret', 'April', 'Mei', 'Juni','Juli','Agustus','September','Oktober', 'November','Desember');
		$bulan = $array_bulan[date('n')];

		//Format Tahun
		$tahun = date('Y');

		$hariini = $hari.', '.$tanggal.' '.$bulan.' '.$tahun;
		$icons = Icon::all()->pluck('icon','id');
		$medsoss = DB::table('medsos')
					->join('icon',function ($join){
						$join->on('medsos.icon_id','=','icon.id');
					})->get();
		$today = date('Y-m-d 00:00:00');
		$count_message = DB::table('contact')
									->where('created_at','>=',$today)->count(); 
		//Contact::where('created_at','>=',$today)->get();

		$projects_count =  DB::table('projects')->count();
		$quotes = Quotes::all();
    	return view('home.dashboard',[
			'hariini' => $hariini,
			'icons' =>$icons,
			'medsoss' => $medsoss,
			'count_message' => $count_message,
			'projects_count' => $projects_count,
			'quotes' => $quotes,
			]);
    }
}
