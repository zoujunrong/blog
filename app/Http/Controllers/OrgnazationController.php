<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrgnazationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('orgnazation.index');
    }

    public function mine()
    {
        return view('orgnazation.mine');
    }

    //主页
    public function profile()
    {
        return view('orgnazation.profile');
    }
}
