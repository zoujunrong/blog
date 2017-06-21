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
        $content = Storage::get('docs/content.html');
        $menu = Storage::get('docs/menu.json');
        $folders = Storage::get('docs/folders.json');

        return view('editor.doc', ['content' => $content, 'menu'=> $menu, 'folders' => $folders]);
    }

    /**
     * 存储
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Storage::put('docs/content.html', $request->content);
        Storage::put('docs/menu.json', $request->menuTree);
        Storage::put('docs/folders.json', $request->folderList);
        return view('editor.doc', ['content' => $request->content, 'menu'=> $request->menuTree, 'folders' => $request->folderList]);
    }
}
