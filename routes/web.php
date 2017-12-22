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

//社会化组件登录
Route::get('/login/github', 'Auth\LoginController@redirectToProvider');
Route::get('/auth/callback', 'Auth\LoginController@handleProviderCallback');
Route::get('/login/weixin', function(){return Socialite::with('weixin')->redirect();});

Auth::routes();


//首页
Route::get('/home', 'HomeController@index');
Route::get('/profile', 'HomeController@profile');

Route::get('/collect', 'CollectController@mine');
Route::get('/doc/mine', 'DocController@mine');
Route::get('/subject/mine', 'SubjectController@mine');
Route::get('/subject/info', 'SubjectController@info');

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

Route::get('/explore', 'ExploreController@index')->name('explore');


Route::group(['middleware' => ['api','cors'],'prefix' => 'api'], function () {
    Route::post('login', 'ApiController@login');           // 登陆
    Route::group(['middleware' => 'jwt.auth'], function () {
        Route::post('getuserdetails', 'ApiController@getUserDetails');  // 获取用户详情

        // 同步书签
        Route::post('syncbookmarks', 'ApiController@syncBookmarks');  // 同步书签
        Route::post('getbookmarks', 'ApiController@getBookmarks');  // 获取书签

        Route::post('shareBookmarks', 'ApiController@shareBookmarks');  // 分享书签


        Route::post('getnotebook', 'ApiController@getNotebooks');  // 获取笔记本
        Route::post('createnotebook', 'ApiController@createOrUpdateNotebook');  // 创建或修改笔记本
        Route::post('deletenotebook', 'ApiController@deleteNotebook');  // 创建或修改笔记本
        Route::get('notebookedit', 'ApiController@notebookEdit');  // 创建或修改笔记本
        Route::get('notebookshow', 'ApiController@notebookShow');  // 创建或修改笔记本
        Route::post('notebookedit', 'ApiController@syncNotebookInfo');  // 创建或修改笔记本
        Route::post('getnotebookfile', 'ApiController@getnotebookfile');  // 创建或修改笔记本
        
        Route::post('createtag', 'ApiController@createtag');  // 新建标签
        Route::post('deletetag', 'ApiController@deletetag');  // 新建标签
        Route::post('getallmytags', 'ApiController@getAllMyTags');  // 获取所有标签
        

    });
});
