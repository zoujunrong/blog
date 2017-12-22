var easyTree = null, folderTree = null;
var menuList = '{{ $menu or "" }}'
var contentIsChange = false;
//实例化编辑器
var ue = UE.getEditor('editor');
// setInterval(function(){
//     if ( contentIsChange ) {
//         resetHandler();
//         contentIsChange = false;
//     }
// }, 20000);

var form = document.getElementById('form');

var kfSubmit = function(){
    ue.getKfContent(function(content){
        menuList = JSON.stringify(easyTree.getAllNodes())
        folderList = JSON.stringify(folderTree.getAllNodes())
        $('input[name=menuTree]').val(menuList);
        $('input[name=folderList]').val(folderList);
        
        toggleloadingDiv('正在保存...')
        saveRequest($('#form').serialize(), function(ret) {
            toggleloadingDiv()
            if (ret.code != 0 || !ret.data) {
                alert('保存失败！')
            } else {
                contentIsChange = false
            }
        })
    })
}

function saveRequest(data, callback, error) {
    var url = '/editor/doc'
    if ($('input[name=token]').val()) {
        url = '/api/notebookedit'
    }
    docRequest(url, data, callback, error)
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
    });
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
        folderTree = $('#folder_list').easytree({enableDnd: true});
        easyTree = $('#menu_list').easytree({stateChanged: toggled, enableDnd: true});
        var nodes = easyTree.getAllNodes();
        toggleNodes(nodes, 'open');
        easyTree.rebuildTree(nodes);



        $('#folder_list li a').on('dblclick', function(){
            menuFileActive($(this).text());
        });

        //操作界面
        $(function(){
            resetHandler()
            // 选中章节按钮
            $(document).on('click', '#menu_list .easytree-node', function(e){
                var posY = $(this).find('a').attr('href').replace('#', '');
                document.getElementById('ueditor_0').contentWindow.document.documentElement.scrollTop = posY;
            });
            $('#menu_folder').on('click', function(e){
                $('#menu_list').hide();
                $('#folder_list').show();
                $('#menu_file').removeClass('active');
                $(this).addClass('active');
            });
            $('#menu_file').on('click', function(e){
                menuFileActive();
            });

            //菜单按钮点击事件
            $('.menu-btn').on('click', function(){
                hideMenu();
                var btnId = $(this).attr('id')
                var activeNodeId = $('.easytree-drag-source').attr('id')
                if (btnId == 'menu_delete') {
                    var splitArr = activeNodeId.split('_')
                    if (splitArr.length <= 5) return;
                    folderTree.removeNode(activeNodeId)
                    folderTree.rebuildTree(folderTree.getAllNodes())
                } else if(btnId == 'menu_new_folder') {
                    var activeNode = folderTree.getNode(activeNodeId)
                    if (!activeNode.isFolder) return;
                    var name = prompt('请输入名称', '')
                    if (name) {
                        var node = {
                            "id": createId(),
                            "text" : name,
                            "tooltip" : name,
                            "isFolder" : true,
                            "isExpanded" : true,
                            "isActive": true
                        }
                        folderTree.addNode(node, activeNodeId)
                        folderTree.rebuildTree(folderTree.getAllNodes())
                        // 同步书签
                        saveRequest({folderList: JSON.stringify(folderTree.getAllNodes())}, function(ret) {
                            console.log(ret)
                        })
                    }
                } else if(btnId == 'menu_new_doc') {
                    var activeNode = folderTree.getNode(activeNodeId)
                    if (!activeNode.isFolder) return;
                    var name = prompt('请输入名称', '')
                    if (name) {
                        var node = {
                            "id" : createId(),
                            "text" : name,
                            "tooltip" : name,
                            "isActive": true,
                            "href" : '#'
                        }
                        folderTree.addNode(node, activeNodeId)
                        folderTree.rebuildTree(folderTree.getAllNodes())
                        saveRequest({folderList: JSON.stringify(folderTree.getAllNodes())}, function(ret) {
                            console.log(ret)
                            openNewFile(node.id, true)
                        })
                    }
                } else if(btnId == 'menu_rename') {
                    var activeNode = folderTree.getNode(activeNodeId)
                    var name = prompt('请输入名称', '')

                    if (name) {
                        activeNode.text = name
                        activeNode.tooltip = name
                        var node = {
                            "text" : name,
                            "tooltip" : name
                        }
                        var nodes = renameNodeName(folderTree.getAllNodes(), activeNodeId, name)
                        folderTree.rebuildTree(nodes)
                        saveRequest({folderList: JSON.stringify(folderTree.getAllNodes())}, function(ret) {
                            console.log(ret)
                        })
                    }
                } else if(btnId == 'menu_moveup' || btnId == 'menu_movedown') {
                    var activeNode = folderTree.getNode(activeNodeId)
                    var allNodes = folderTree.getAllNodes()
                    console.log(JSON.stringify(allNodes))
                    allNodes = moveNodes(activeNode, allNodes, btnId == 'menu_moveup' ? 'up' : 'down');
                    console.log(JSON.stringify(allNodes)); 
                    if (allNodes) folderTree.rebuildTree(allNodes)
                    saveRequest({folderList: JSON.stringify(folderTree.getAllNodes())}, function(ret) {
                        console.log(ret)
                    })
                }
                $('#folder_list li a').on('dblclick', function(){
                    menuFileActive($(this).text());
                });
            });
        });
        
        var menuFileActive = function(filename=null) {
            $('#folder_list').hide();
            $('#menu_list').show();
            $('#menu_folder').removeClass('active');
            $('#menu_file').addClass('active');
            if(filename!== null) $('#menu_file').text(filename)
            //判断是否重复
            /*if ( filename && $('#menu_file').text() != filename) {
                $.ajax({
                    type: "GET",
                    url: "/editor/doc",
                    data: {"columnId":10, "docId":10},
                    success: function(msg){
                        alert( "Data Saved: " + msg );
                    }
                });
            }*/
        }

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

//上下移动节点
function moveNodes(currentNode, allNodes, moveTo) {
    if ((moveTo != 'up' && moveTo != 'down')) return false;
    var index = null;
    for (var i = 0; i < allNodes.length; i++) {
        if (allNodes[i].id == currentNode.id) {
            index = i;
            break;
        }
        if (allNodes[i].children && allNodes[i].children.length > 0) {
            allNodes[i].children = moveNodes(currentNode, allNodes[i].children, moveTo);
        }
    }

    if (index !== null && moveTo == 'up' && i > 0) {
        allNodes[i] = allNodes[i-1];
        allNodes[i-1] = currentNode;
    } else if (index !== null && moveTo == 'down' && i < allNodes.length-1) {
        allNodes[i] = allNodes[i+1];
        allNodes[i+1] = currentNode;
    }
    return allNodes;
}

//重命名node name
function renameNodeName(nodes, id, name) {
    var i = 0;
    for (i = 0; i < nodes.length; i++) {
        if (nodes[i].id == id) {
            nodes[i].text = name
            nodes[i].tooltip = name
            break;
        } else {
            if (nodes[i].children && nodes[i].children.length > 0) {
                renameNodeName(nodes[i].children, id, name);
            }
        }
    }
    return nodes
}

function toggled() {
}

//菜单栏右键按钮操作
var menu = document.querySelector('.menu');
function showMenu(x, y){
    menu.style.left = x + 'px';
    menu.style.top = y + 'px';
    menu.classList.add('show-menu');
}
function hideMenu(){
    menu.classList.remove('show-menu');
}
function onContextMenu(e){
    e.preventDefault();
    if($('#menu_file').hasClass('active')) return;
    showMenu(e.pageX, e.pageY);
    document.addEventListener('mousedown', onMouseDown, false);
}
function onMouseDown(e){
    setTimeout(function(){hideMenu();}, 200)
    document.removeEventListener('mousedown', onMouseDown);
}
document.addEventListener('contextmenu', onContextMenu, false);

$(function() {
    $(document).on('click', '#folder_list .easytree-reject', function() {
        // 防止重复点击
        if ($('#loadingDiv').hasClass('hide')) {
            openNewFile($(this).attr('id'))
        }
    })

})

function createId() {
    return Date.parse(new Date())
}

function openNewFile(id, isNew) {
    if (contentIsChange) {
        if (confirm('当前编辑文件未保存， 确定覆盖吗？覆盖后将丢失最新修改的内容。')) {
            getFileContent(id, isNew) 
            contentIsChange = false
        }
    } else {
        getFileContent(id, isNew)
    }
}

function getFileContent(id, isNew) {
    $('input[name=active]').val(id)
    if (!isNew) {
        toggleloadingDiv()
        docRequest('/api/getnotebookfile', {'active': id}, function(ret) {
            toggleloadingDiv()
            if (ret.code == 0) {
                ue.setContent(ret.data)
            } else if (ret.code > 0) {
                alert(ret.msg)
            } else {
                alert('请关闭后重试！')
            }
            resetHandler()
        }, function() {
            toggleloadingDiv()
            alert('网络异常！')
        })
    } else {
        ue.setContent('')
        resetHandler()
    }
    
}

function toggleloadingDiv(msg) {
    msg = msg ? msg : '文件加载中...'
    if ($('#loadingDiv').hasClass('hide')) {
        $('#loadingDiv').text(msg).width(document.body.clientWidth-$('#ueditor_list').width()).height($('#ueditor_list').height()+$('#edui1_bottombar').height()).removeClass('hide')
    } else {
        $('#loadingDiv').addClass('hide')
    }
}