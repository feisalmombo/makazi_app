<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use Auth;
use DB;


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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $regionsCount = DB::select('SELECT COUNT(*) as "regionsCount" FROM regions');

        $districtsCount = DB::select('SELECT COUNT(*) as "districtsCount" FROM districts');


        $wardsCount = DB::select('SELECT COUNT(*) as "wardsCount" FROM wards');


        return view('home')
        ->with('regionsCount', $regionsCount)
        ->with('districtsCount', $districtsCount)
        ->with('wardsCount', $wardsCount);
    }
}
