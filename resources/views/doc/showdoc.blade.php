<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="stylesheet" href="{{ asset('lib/easyTree/skin-win8/ui.easytree.css') }}">
        
        <title>{{ $title or '' }}-Weuping</title>
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
        <div id="loadingDiv" class="" style="width:100%;height:100%;right:0px;bottom:0px;line-height:500px;background-color: rgba(0,0,0,.6);color:white;position: absolute;z-index: 10000;text-align: center;">文件加载中...</div>
        {!! csrf_field() !!}
        <input type="hidden" name="id" value="{{ $id or 0 }}" />
        <input type="hidden" name="uid" value="{{ $uid or 0 }}" />
        <input type="hidden" name="token" value="{{ $token or '' }}" />
        <input type="hidden" name="folderList" value="{{$folders}}" />
        <div id="ueditor_list" class="scroller nav">
        <!-- {{-- 通过js将此菜单栏注入到插件中实现菜单栏功能 --}} -->
            <div class="nav-tabs">
                  <span class="active" id="menu_folder">文件夹</span>
                  <span role="presentation" id="menu_file">内容导航</span>
                  <span role="presentation" id="menu_file">记录</span>
                  <span role="presentation" id="menu_file">作者</span>
            </div>
            <div id="menu_list" class="nav-content hide">
                {{ $menu or '[{"text" : "首页", "href" : "#136"}]' }}
            </div>

            <div id="folder_list" class="nav-content hide">
                {{ $folders or '[]' }}
            </div>
        </div>
        <div id="content" class="content"">
            <div class="view">{!! $content !!}</div>
        </div>
        
        <script type="text/javascript" src="{{asset('js/jquery1.12.4.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('lib/easyTree/jquery.easytree.min.js')}}"></script>
        <script type="text/javascript">
        $(function() {
            $('#folder_list').easytree();
            $('title').text($('h1,h1,h2,h3,h4,h5,h6').first().text())
            // 初始化内容导航
            menuListInit()
            setTimeout(function(){$('#folder_list').show(),toggleloadingDiv()}, 1000)

            $(document).on('click', '#folder_list .easytree-ico-c', function() {
                // 防止重复点击
                if ($('#loadingDiv').hasClass('hide')) {
                    getFileContent($(this).attr('id'))
                }
            })

            $('#menu_folder').on('click', function(e){
                $('#menu_list').hide();
                $('#folder_list').show();
                $('#menu_file').removeClass('active');
                $(this).addClass('active');
            });
            $('#menu_file').on('click', function(e){
                menuFileActive();
            });
            $('#folder_list li a').on('dblclick', function(){
                menuFileActive();
            });

        })

        function menuFileActive(filename) {
            $('#folder_list').hide();
            $('#menu_list').show();
            $('#menu_folder').removeClass('active');
            $('#menu_file').addClass('active');
            if(filename) $('#menu_file').text(filename)
        }

        function menuListInit() {
            var menuTree = $('#menu_list').easytree();
            var menuList = []
            $('h1,h2,h3,h4,h5,h6').each(function() {
                var node = {
                    "text" : $(this).text(),
                    "isExpanded" : true,
                    "href" : '#'+$(this).attr('id'),
                    "tooltip" : $(this)[0].tagName
                }
                // 寻找该节点所在的位置并且归并到目录树
                menuList = traversal(menuList, node)
            })
            menuTree.rebuildTree(menuList)
        }

        function traversal(menuList, node) {
            if (!menuList) menuList = []
            if (menuList.length > 0 ) {
                if (menuList[menuList.length-1].tooltip >= node.tooltip ) {
                    menuList.push(node)
                } else {
                    menuList[menuList.length-1]['children'] = traversal(menuList[menuList.length-1]['children'], node)
                }
            } else {
                menuList.push(node)
            }
            return menuList
            
        }


        function getFileContent(id) {
            toggleloadingDiv()
            docRequest('/api/getnotebookfile', {'active': id}, function(ret) {
                toggleloadingDiv()
                if (ret.code == 0) {
                    $('#content .view').html(ret.data)
                    // 重新初始化内容目录导航
                    menuListInit()
                } else if (ret.code > 0) {
                    alert(ret.msg)
                } else {
                    alert('请关闭后重试！')
                }
            }, function() {
                toggleloadingDiv()
                alert('网络异常！')
            })
            
        }

        function docRequest(url, data, callback, error) {
            if (typeof(data) == 'string') {
                data += '&uid='+$('input[name=uid]').val()+'&id='+$('input[name=id]').val()+'&token='+$('input[name=token]').val()
            } else {
                data['token'] = $('input[name=token]').val()
                data['id'] = $('input[name=id]').val()
                data['uid'] = $('input[name=uid]').val()
            }
            $.ajax({
                async: true,
                type: "POST",
                url: url,
                data: data,
                dataType: 'json',
                success: callback,
                error: error
            })
        }
        
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
