<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EditorController extends Controller
{
    const STORAGE_DRIVE = 'local';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 获取笔记本信息
        $content = Storage::disk(self::STORAGE_DRIVE)->has('docs/content.html') ? Storage::disk(self::STORAGE_DRIVE)->get('docs/content.html') : null;
        $menu = Storage::disk(self::STORAGE_DRIVE)->has('docs/menu.json') ? Storage::disk(self::STORAGE_DRIVE)->get('docs/menu.json') : null;
        $folders = Storage::disk(self::STORAGE_DRIVE)->has('docs/folders.json') ? Storage::disk(self::STORAGE_DRIVE)->get('docs/folders.json') : '[{"text":"新建专题", "isFolder":true, "isExpanded":true}]';

        return view('doc.editdoc', ['content' => $content, 'menu'=> $menu, 'folders' => $folders]);
    }

    /**
     * 存储
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Storage::disk(self::STORAGE_DRIVE)->put('docs/content.html', $request->content);
        Storage::disk(self::STORAGE_DRIVE)->put('docs/menu.json', $request->menuTree);
        Storage::disk(self::STORAGE_DRIVE)->put('docs/folders.json', $request->folderList);
        return ['errCode' => 200, 'errMsg' => '操作成功', 'data' => [1,2,3,3,4,5]];
        return view('editor.doc', ['content' => $request->content, 'menu'=> $request->menuTree, 'folders' => $request->folderList]);
    }

    public function test(Request $request)
    {
        return view('doc.test');
    }
}
