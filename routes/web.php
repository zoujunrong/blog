<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('editor', function () {
    return view('editor');
});
Auth::routes();


//首页
Route::get('/home', 'HomeController@index');
Route::get('/profile', 'HomeController@profile');

Route::get('/collect', 'CollectController@mine');
Route::get('/doc/mine', 'DocController@mine');
Route::get('/subject/mine', 'SubjectController@mine');
Route::get('/column/mine', 'ColumnController@mine');
Route::get('/orgnazation/mine', 'OrgnazationController@mine');
Route::get('/home/baseinfo', 'HomeController@baseinfo');
Route::get('/settings', 'SettingsController@mine');
//文档
Route::get('/editor/doc', 'EditorController@create');
Route::post('/editor/doc', 'EditorController@store');
//专栏
Route::get('/column', 'ColumnController@index');
Route::get('/doc', 'DocController@index');
Route::get('/column/profile', 'ColumnController@profile');
//组织
Route::get('/orgnazation', 'OrgnazationController@index');
Route::get('/orgnazation/profile', 'OrgnazationController@profile');
Route::get('/orgnazation/subjects', 'OrgnazationController@subjects');
Route::get('/orgnazation/columns', 'OrgnazationController@columns');
Route::get('/orgnazation/discuz', 'OrgnazationController@discuz');
Route::get('/orgnazation/members', 'OrgnazationController@members');
Route::get('/orgnazation/settings', 'OrgnazationController@settings');
Route::get('/orgnazation/energyFlows', 'OrgnazationController@energyFlows');
//社区
Route::get('/community', 'CommunityController@index');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
