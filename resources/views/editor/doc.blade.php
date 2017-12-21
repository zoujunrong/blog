<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script type="text/javascript" src="{{asset('js/jquery1.12.4.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('lib/ueditor/ueditor.config.js')}}"></script>
        <script type="text/javascript" src="{{asset('lib/ueditor/ueditor.all.min.js')}}"></script>
        <script type="text/javascript" charset="utf-8" src="{{asset('lib/ueditor/kityformula-plugin/addKityFormulaDialog.js')}}"></script>
        <script type="text/javascript" charset="utf-8" src="{{asset('lib/ueditor/kityformula-plugin/getKfContent.js')}}"></script>
        <script type="text/javascript" charset="utf-8" src="{{asset('lib/ueditor/kityformula-plugin/defaultFilterFix.js')}}"></script>
        
        <script type="text/javascript" src="{{asset('lib/ueditor/ueditor.js')}}"></script>
        <script type="text/javascript" src="{{asset('lib/easyTree/jquery.easytree.min.js')}}"></script>
        <link rel="stylesheet" href="{{ asset('lib/easyTree/skin-win8/ui.easytree.css') }}">
        
        <title>文档编辑-Weuping</title>
        <style>
            body{margin: 0px;padding:0px;font-family: arial, helvetica;}
            .nav-tabs {
                width:100%;line-height: 30px;padding-left:5px;font-family: arial;font-size:13px;background: rgba(204, 204, 204, 0.6);
            }
            .nav-tabs span {
                display: inline-block;
                height: 31px;
                padding:0px 8px;
                cursor: pointer;
            }
            span.active{
                font-weight: bolder;
                background: #fff;
            }

            .menu {
                position: absolute;
                width: 200px;
                padding: 2px;
                margin: 0;
                border: 1px solid #bbb;
                background: #eee;
                background: -webkit-linear-gradient(to bottom, #fff 0%, #e5e5e5 100px, #e5e5e5 100%);
                background: linear-gradient(to bottom, #fff 0%, #e5e5e5 100px, #e5e5e5 100%);
                z-index: 10001;
                border-radius: 3px;
                box-shadow: 1px 1px 4px rgba(0,0,0,.2);
                opacity: 0;
                -webkit-transform: translate(0, 15px) scale(.95);
                transform: translate(0, 15px) scale(.95);
                transition: transform 0.1s ease-out, opacity 0.1s ease-out;
                pointer-events: none;
            }
             
            .menu-item {
                display: block;
                position: relative;
                margin: 0;
                padding: 0;
                white-space: nowrap;
            }
             
            .menu-btn { 
                background: none;
                line-height: normal;
                overflow: visible;
                -webkit-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                display: block;
                width: 100%;
                color: #444;
                font-family: 'Roboto', sans-serif;
                font-size: 13px;
                text-align: left;
                cursor: pointer;
                border: 1px solid transparent;
                white-space: nowrap;
                padding: 6px 8px;
                border-radius: 3px;
            }
             
            .menu-btn::-moz-focus-inner,
            .menu-btn::-moz-focus-inner {
                border: 0;
                padding: 0;
            }
             
            .menu-text {
                margin-left: 25px;
            }
             
            .menu-btn .fa {
                position: absolute;
                left: 8px;
                top: 50%;
                -webkit-transform: translateY(-50%);
                transform: translateY(-50%);
            }
            
            .menu-item:hover > .menu-btn { 
                color: #fff; 
                outline: none; 
                background-color: #2E3940;
                background: -webkit-linear-gradient(to bottom, #5D6D79, #2E3940);
                background: linear-gradient(to bottom, #5D6D79, #2E3940);
                border: 1px solid #2E3940;
            }
             
            .menu-item.disabled {
                opacity: .5;
                pointer-events: none;
            }
             
            .menu-item.disabled .menu-btn {
                cursor: default;
            }
             
            .menu-separator {
                display:block;
                margin: 7px 5px;
                height:1px;
                border-bottom: 1px solid #fff;
                background-color: #aaa;
            }
             
            .menu-item.submenu::after {
                content: "";
                position: absolute;
                right: 6px;
                top: 50%;
                -webkit-transform: translateY(-50%);
                transform: translateY(-50%);
                border: 5px solid transparent;
                border-left-color: #808080; 
            }
             
            .menu-item.submenu:hover::after {
                border-left-color: #fff;
            }
             
            .menu .menu {
                top: 4px;
                left: 99%;
            }
             
            .show-menu,
            .menu-item:hover > .menu {
                opacity: 1;
                -webkit-transform: translate(0, 0) scale(1);
                transform: translate(0, 0) scale(1);
                pointer-events: auto;
            }
             
            .menu-item:hover > .menu {
                -webkit-transition-delay: 100ms;
                transition-delay: 300ms;
            }  
        </style>
    </head>
    <body>
        <form action="#" id="form" method="post">
            {!! csrf_field() !!}
            <input type="hidden" name="id" value="{{ $id or 0 }}" />
            <input type="hidden" name="uid" value="{{ $uid or 0 }}" />
            <input type="hidden" name="token" value="{{ $token or '' }}" />
            <input type="hidden" name="folderList" value="{{$folders}}" />
            <input type="hidden" name="active" value="{{$active}}" />
            <script id="editor" type="text/plain" name="content">{!! $content or '<h1 id="136">首页</h1>世界你好！' !!}</script>
        </form>
        <!-- {{-- 通过js将此菜单栏注入到插件中实现菜单栏功能 --}} -->
        <div id="ueditor_list_hide" style="display:none;">
            <div class="nav-tabs">
                  <span id="menu_folder">笔记本</span>
                  <span class="active" role="presentation" id="menu_file">内容目录</span>
            </div>
            <div id="menu_list">
                {{ $menu or '[{"text" : "首页", "href" : "#136"}]' }}
            </div>

            <div id="folder_list" style="display:none;">
                {{ $folders or '[]' }}
            </div>
        </div>
        <div id="loadingDiv" style="display:none;right:0px;bottom:0px;line-height:500px;background-color: rgba(0,0,0,.6);color:white;position: absolute;z-index: 10000;text-align: center;">文件加载中...</div>
        <div class="menu">
            <li class="menu-item">
                <button type="button" id="menu_new_folder" class="menu-btn">
                    <span class="menu-text">新建文件夹</span>
                </button>
            </li>
            <li class="menu-item">
                <button type="button" id="menu_new_doc" class="menu-btn">
                    <span class="menu-text">新建文档</span>
                </button>
            </li>
            <li class="menu-item">
                <button type="button" id="menu_rename" class="menu-btn">
                    <span class="menu-text">重命名</span>
                </button>
            </li>
            <li class="menu-item">
                <button type="button" id="menu_moveup" class="menu-btn">
                    <span class="menu-text">上移</span>
                </button>
            </li>
            <li class="menu-item">
                <button type="button" id="menu_movedown" class="menu-btn">
                    <span class="menu-text">下移</span>
                </button>
            </li>
            <li class="menu-item">
                <button type="button" id="menu_delete" class="menu-btn">
                    <span class="menu-text">删除</span>
                </button>
            </li>
        </div>
        
        <script type="text/javascript" src="{{asset('js/notebookedit.js')}}"></script>
    </body>
</html>
