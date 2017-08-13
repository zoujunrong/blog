<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubjectController extends Controller
{
    // 个人专题
    public function mine() {
    	return view('subject.mine');
    }

    // 创建
    public function create() {
    	return view('subject.create');
    }

    // 个人专题
    public function info() {
    	return view('subject.know-info');
    }
}
