<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script type="text/javascript" src="{{asset('js/jquery1.12.4.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('lib/easyTree/jquery.easytree.min.js')}}"></script>
        <link rel="stylesheet" href="{{ asset('lib/easyTree/skin-win8/ui.easytree.css') }}">
        
        <title>{{ $notebook->title or '' }}-Weuping</title>
        <style>
            body{margin: 0px;padding:0px;font-family: arial, helvetica;}
            .nav {
                width:20%;height:100%;position:absolute;overflow-y:auto;overflow-x:hidden;white-space:nowrap;text-overflow:ellipsis;z-index:100;margin:0px;padding:0px;box-shadow: #d8d8d8 0px 1px 0px 0px;
            }
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
            
           
            .hide {
                display: none;
            }
            
            .content{
                width:80%;height:100%;position:absolute;right:0px;top:0px;overflow:auto;background-color:#eee;
                
            }
            .view {
                    width: 640px;
                    margin: 20px auto;
                    padding: 95px 120px;
                    height: 100%;
                    box-shadow: #d8d8d8 0px 1px 1px 2px;
                    overflow-x: hidden;
                    display: table;
                    background-color: #fff;
                    table-layout: fixed;
                    word-wrap: break-word;
                    overflow: auto;
            }
        </style>
    </head>
    <body>
        <div id="ueditor_list" class="scroller nav">
        <!-- {{-- 通过js将此菜单栏注入到插件中实现菜单栏功能 --}} -->
            <div class="nav-tabs">
                  <span class="active" id="menu_folder">文件夹</span>
                  <span role="presentation" id="menu_file">内容导航</span>
            </div>
            <div id="menu_list" class="nav-content hide">
                {{ $menu or '[{"text" : "首页", "href" : "#136"}]' }}
            </div>

            <div id="folder_list" class="nav-content">
                {{ $folders or '[]' }}
            </div>
        </div>
        <div id="content" class="content"">
            <div class="view">{!! $content !!}</div>
            
        </div>
        <div id="loadingDiv" class="hide" style="right:0px;bottom:0px;line-height:500px;background-color: rgba(0,0,0,.6);color:white;position: absolute;z-index: 10000;text-align: center;">文件加载中...</div>
        <script type="text/javascript">
        $(function() {
        	$('#menu_list').easytree({enableDnd: true});
        	$('#folder_list').easytree({enableDnd: true});
        })
        
        function toggleloadingDiv(msg) {
            msg = msg ? msg : '文件加载中...'
            if ($('#loadingDiv').hasClass('hide')) {
                $('#loadingDiv').text(msg).width(document.body.clientWidth-$('#ueditor_list').width()).height($('#ueditor_list').height()+$('#edui1_bottombar').height()).removeClass('hide')
            } else {
                $('#loadingDiv').addClass('hide')
            }
        }
        </script>
    </body>
</html>
