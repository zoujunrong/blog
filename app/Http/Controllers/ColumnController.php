<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ColumnController extends Controller
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
        return view('column.index');
    }

    public function mine()
    {
        return view('column.mine');
    }
}
