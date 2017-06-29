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

    // 能源库
    public function subjects()
    {
        return view('orgnazation.subjects');
    }

    // 专栏
    public function columns()
    {
        return view('orgnazation.columns');
    }

    // 互动社区
    public function discuz()
    {
        return view('orgnazation.discuz');
    }

    // 互动社区
    public function members()
    {
        return view('orgnazation.members');
    }

    // 设置
    public function settings()
    {
        return view('orgnazation.settings');
    }

    // 供电流水
    public function energyFlows()
    {
        return view('orgnazation.energyFlow');
    }

}
