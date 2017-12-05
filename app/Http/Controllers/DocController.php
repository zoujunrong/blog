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
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $content = Storage::disk('oss')->has('docs/content.html') ? Storage::disk('oss')->get('docs/content.html') : null;
        $menu = Storage::disk('oss')->has('docs/menu.json') ? Storage::disk('oss')->get('docs/menu.json') : null;
        $folders = Storage::disk('oss')->has('docs/folders.json') ? Storage::disk('oss')->get('docs/folders.json') : null;

        $folders = json_decode($folders, true);
        $children = isset($folders[0]['children']) ? $folders[0]['children'] : [];
        $folders[0]['type'] = 'theme';
        unset($folders[0]['children']);
        $folders = array_merge($folders, $children);

        //组装菜单
        $menuHtml = $this->builtMenuList(json_decode($menu, true), 'bs-docs-sidenav');
        $folderHtml = $this->builtDocMenu($folders);
        return view('column.doc', ['content' => $content, 'menuHtml'=> $menuHtml, 'folderHtml' => $folderHtml]);
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

    public function builtDocMenu($listArr, $index = 1)
    {
        $listStr = '<ul class="'.($index == 1 ? 'summary' : 'articles').'">';
        
        $i = 0;
        foreach ($listArr as $list) {
            if (isset($list['type']) && $list['type'] == 'theme') {
                $listStr .= '<li><a href="#">'.(isset($list['text']) ? $list['text'] : '').'</a></li>';
                $listStr .= '<li class="divider"></li>';
            } else {
                $listStr .= '<li class="chapter '.(isset($list['isActive']) && $list['isActive'] ? 'active' : '').'" data-level="'.$index.'.'.++$i.'">';
                $listStr .= '<a href="'.(isset($list['href']) ? $list['href'] : '').'" title="'.(isset($list['tooltip']) ? $list['tooltip'] : '').'">'.(isset($list['text']) ? $list['text'] : '').'</a>';

                if (isset($list['children']) && !empty($list['children'])) $listStr .= $this->builtDocMenu($list['children'], ++$index);
                $listStr .= '</li>';
            }
        }
        $listStr .= '</ul>';

        return $listStr;
    }
}
