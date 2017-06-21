<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductES;
use App\Book;
use App\User;
class EsTestController extends Controller
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
        $result = User::search()->match('name', 'test')->get();
        // $product = ProductES::findOrFail(1);
        // $product = ProductES::create(['id' => 3, 'name' => 'Product 3', 'price' => 30]);
        dd($result);exit;
        return view('home');
    }
}
