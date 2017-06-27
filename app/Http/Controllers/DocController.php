<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocController extends Controller
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
        $content = Storage::get('docs/content.html');
        $menu = Storage::get('docs/menu.json');
        $folders = Storage::get('docs/folders.json');

        //组装菜单
        $menuHtml = $this->builtMenuList(json_decode($menu, true), 'bs-docs-sidenav');
        $folderHtml = $this->builtMenuList(json_decode($folders, true), 'bs-docs-folder-nav');
        return view('column.doc', ['content' => $content, 'menuHtml'=> $menuHtml, 'folders' => $folders]);
    }

    public function mine()
    {
        return view('personal.mydoc');
    }

    public function builtMenuList($listArr, $class='') {
        $listStr = '<ul class="nav '.$class.'">';
        if (!empty($listArr)) {
            foreach ($listArr as $list) {
                $listStr .= '<li class="'. (isset($list['isActive']) && $list['isActive'] ? 'active' : '') .'">';
                $listStr .= '<a href="'.(isset($list['href']) ? $list['href'] : '').'" title="'.(isset($list['tooltip']) ? $list['tooltip'] : '').'">'.(isset($list['text']) ? $list['text'] : '').'</a>';

                if (isset($list['children']) && !empty($list['children'])) $listStr .= $this->builtMenuList($list['children']);
                $listStr .= '</li>';
            }
        }
        $listStr .= '</ul>';
        return $listStr;
    }
}
