
        <form action="getContent.php" id="form" method="post">
            {!! csrf_field() !!}
            <input type="hidden" name="menuTree" value="" />
            <script id="editor" type="text/plain" name="content">{!! $content or '世界你好！' !!}</script>
        </form>
        <!-- {{-- 通过js将此菜单栏注入到插件中实现菜单栏功能 --}} -->
        <div id="ueditor_list_hide" style="display:none;">
            <div style="width:100%;border-bottom:1px solid #e2dddd;height:30px;line-height: 30px;padding-left:5px;font-weight: bolder;font-family: arial;">目录</div>
            <div id="menu_list">
                {{ $menu or '[{"text" : "首页", "href" : "#0"}]' }}
            </div>
        </div>
        <script type="text/javascript">
            var easyTree = null;
            var menuList = '{{ $menu or "" }}'
            var contentIsChange = false;
            //实例化编辑器
            var ue = UE.getEditor('editor');
            setInterval(function(){
                if ( contentIsChange ) {
                    resetHandler();
                    contentIsChange = false;
                }
            }, 20000);

            var form = document.getElementById('form');
            
            var kfSubmit = function(){
                ue.getKfContent(function(content){
                    menuList = JSON.stringify(easyTree.getAllNodes())
                    $('input[name=menuTree]').val(menuList);
                    $.ajax({
                        type: "POST",
                        url: "/editor",
                        data: $('#form').serialize(),
                        success: function(msg){
                         alert( "Data Saved: " + msg );
                        }
                    });
                })
                
            }
            ue.addListener("keydown ready", function(type, e) {
                if ( e && ( ( !e.ctrlKey && e.keyCode != 18 ) || e.keyCode == 86 ) ) contentIsChange = true;
                if ( type == 'keydown' && e.keyCode == 83 && e.ctrlKey ) {
                    e.preventDefault(); //方法阻止元素发生默认的行为。
                    resetHandler();
                    return false;
                }

                if ( type == 'keydown' && e.keyCode == 8 ) {
                    if ( ! ue.hasContents() ) {
                        e.preventDefault(); //方法阻止元素发生默认的行为。
                        return false;
                    }
                }
                if ( type == 'ready' ) {
                    list_side();
                    //easyTree 文档网址 http://www.easyjstree.com
                    easyTree = $('#menu_list').easytree({stateChanged: toggled, enableDnd: true});
                    var nodes = easyTree.getAllNodes();
                    toggleNodes(nodes, 'open');
                    easyTree.rebuildTree(nodes);

                    // 选中章节按钮
                    $('#menu_list li a').click(function(e){
                        var posY = $(this).attr('href').replace('#', '');
                        document.getElementById('ueditor_0').contentWindow.document.body.scrollTop = posY;

                    });
                }
            }, false);

            function getText(){
                //当你点击按钮时编辑区域已经失去了焦点，如果直接用getText将不会得到内容，所以要在选回来，然后取得内容
                var range = ue.selection.getRange();
                range.select();
                var txt = ue.selection.getText();
            }

            function toggleNodes(nodes, openOrClose){
                var i = 0;
                for (i = 0; i < nodes.length; i++) {
                    nodes[i].isExpanded = openOrClose == "open"; // either expand node or don't
                    
                    // if has children open/close those as well
                    if (nodes[i].children && nodes[i].children.length > 0) {
                        toggleNodes(nodes[i].children, openOrClose);
                    }
                }
            }

            function toggled() {
            }

        </script>
    </body>
</html>
