<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reports;
use App\Models\Areas;
use App\Models\Equipments;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
   
        $reports = Reports::where('status', '1')->get();;
        //dd($reports);
        $equipments = Equipments::whereIn('number', $reports->pluck('camera_ip'))->get();
      //  dd($equipments);
        $areasIds = $equipments->pluck('areas_id');
        $areas = Areas::whereIn('id', $areasIds)->get()->pluck('name', 'id');

        return view('home', compact('reports',  'areas', 'equipments'));
    }


}
