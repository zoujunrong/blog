UE.registerUI('SaveContent',function(editor,uiName){
    //注册按钮执行时的command命令，使用命令默认就会带有回退操作
    editor.registerCommand(uiName,{
        execCommand:function(){
            alert('execCommand:' + uiName)
        }
    });

    //创建一个button
    var btn = new UE.ui.Button({
        //按钮的名字
        name:uiName,
        //提示
        title:'提交保存',
        //需要添加的额外样式，指定icon图标，这里默认使用一个重复的icon
        cssRules :'background-position: -480px -20px;',
        //点击时执行的命令
        onclick:function () {
           //提交保存
           kfSubmit();
        }
    });

    //当点到编辑内容上时，按钮要做的状态反射
    editor.addListener('selectionchange', function () {
        var state = editor.queryCommandState(uiName);
        if (state == -1) {
            btn.setDisabled(true);
            btn.setChecked(false);
        } else {
            btn.setDisabled(false);
            btn.setChecked(state);
        }
    });

    //因为你是添加button,所以需要返回这个button
    return btn;
});


//
function click_docList() {

}
//点击左边菜单动作
function list_side(obj) {
    if ( $('#ueditor_list').attr('id') != 'ueditor_list' ) {
        var leftListWidth = 20;
        var listDiv = '<div id="ueditor_list" class="scroller" style="width:'+leftListWidth+'%;height:100%;overflow-y:auto;overflow-x:hidden;white-space:nowrap;text-overflow:ellipsis;float:left;z-index:100;margin:0px;padding:0px;box-shadow: #d8d8d8 0px 1px 0px 0px;">'+ $('#ueditor_list_hide').html() +'<div style="position:fixed;width:21px;height:25px;left:0px;bottom:0px;border-right:1px solid silver;background-color:#fff;cursor:pointer;margin:0px;" onclick="list_side(this);"><img style="margin:7px 3px 2px 2px;" title="关闭菜单" src="/lib/ueditor/themes/default/images/list_side.png"></div></div>';
        $('#ueditor_0').attr('width', (100-leftListWidth)+'%').before(listDiv);
        $('#ueditor_list_hide').html('')
    } else {
        if ( $('#ueditor_list').css('display') == 'block' ) {
            $('#ueditor_list').hide();
            $('#ueditor_0').attr('width', '100%');
        } else {
            $('#ueditor_0').attr('width', ($('#ueditor_0').width()-$('#ueditor_list').width())).before(listDiv);
            $('#ueditor_list').width($('#ueditor_list').width()).show();
        }
        
    }

}



var resetHandler = function(){
    var dirmap = {}, dir = ue.execCommand('getsections');

    // 更新目录树
    easyTree.rebuildTree( traversal(dir) || null );
    // 删除章节按钮
    $('.deleteIcon').click(function(e){
        var $target = $(this),
            address = $target.parent().attr('data-address');
        ue.execCommand('deletesection', dirmap[address]);
    });
    // 选中章节按钮
    $('#menu_list li a').click(function(e){
        var posY = $(this).attr('href').replace('#', '');
        document.getElementById('ueditor_0').contentWindow.document.body.scrollTop = posY;

    });
    // 章节上移
    $('.moveUp,.moveDown').click(function(e){
        var address = $(this).attr('href').replace('#', '');
            moveUp = $(this).hasClass('moveUp') ? true:false;
        if($(this).hasClass('moveUp')) {
            ue.execCommand('movesection', dirmap[address], dirmap[address].previousSection);
        } else {
            ue.execCommand('movesection', dirmap[address], dirmap[address].nextSection, true);
        }
    });

    function traversal(section, l=30) {
        var child, childList, nodes = [];
        if(section.children.length) {
            for(var i = 0; i< section.children.length; i++) {
                child = section.children[i];
                domPos = UE.dom.domUtils.getXY(child.dom)
                // console.log(child.dom.innerText)
                $('#ueditor_0').contents().find(child.dom.tagName).each(function(){
                    if ($(this).text() == child.dom.innerText) {
                        $(this).attr('id', domPos.y);
                    }
                });
                var title = getSubStr(child['title'], l);
                if ( ! $.trim(title) ) continue;
                var node = {
                    "text" : title,
                    "isExpanded" : true,
                    "href" : '#'+domPos.y,
                    "tooltip" : child['title']
                }
                //设置目录节点内容标签
                dirmap[child['startAddress'].join(',')] = child;
                //继续遍历子节点
                if(child) {
                    childList = traversal(child, l-2);
                    childList && (node.children = childList)
                }
                nodes.push(node);
            }
        }
        return nodes;
    }
}

function getSubStr(s,l){
    var i=0,len=0;
    for(i;i<s.length;i++){
        if(s.charAt(i).match(/[^\x00-\xff]/g)!=null){
            len+=2;
        }else{
            len++;
        }
        if(len>l){ break; }
    }
    return (i == s.length) ? s.substr(0,i) : (s.substr(0,i)+'...');
};