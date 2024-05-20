<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reports;

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
        return view('home', compact('reports'));
    }


}
