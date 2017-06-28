<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EditorController extends Controller
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
    public function create()
    {
        $content = Storage::has('docs/content.html') ? Storage::get('docs/content.html') : null;
        $menu = Storage::has('docs/menu.json') ? Storage::get('docs/menu.json') : null;
        $folders = Storage::has('docs/folders.json') ? Storage::get('docs/folders.json') : '[{"text":"新建专题", "isFolder":true, "isExpanded":true}]';

        return view('editor.doc', ['content' => $content, 'menu'=> $menu, 'folders' => $folders]);
    }

    /**
     * 存储
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {print_r($request->content);exit;
        Storage::put('docs/content.html', $request->content);
        Storage::put('docs/menu.json', $request->menuTree);
        Storage::put('docs/folders.json', $request->folderList);
        return view('editor.doc', ['content' => $request->content, 'menu'=> $request->menuTree, 'folders' => $request->folderList]);
    }
}
