$(function(){
    // 首先判断是否已经打开了这个窗口

    window.open('bookmarks.html')
    // 初始化窗口
    initFrm();
    // 开始使用
    $('.aui-start').find('input[name=start]').on('click', function() {
        $('.aui-start').fadeToggle();
        $('.aui-content').fadeToggle();
        localStorage.setItem('startId', 1);
        initFrm();
    });

    // 关闭提示消息
    $('#tips .aui-icon-close').on('click', function() {
        $(this).parent().remove();
    });

    // 切换窗口
    $('div[tapmode]').on('click', function() {
        swithFrm($(this).attr('role-frm'));
    });
});

function initFrm() {
    // 启动页面化
    var startId = localStorage.getItem('startId');
    if (!startId || startId == 0) {
        $('.aui-start').show();
        $('.aui-content').hide();
    } else {
        $('.aui-start').hide();
        $('.aui-content').show();
        // 内容页面初始化
        var contentId = localStorage.getItem('contentId');
        if (contentId) {
            swithFrm(contentId);
        }
    }
    
}

function swithFrm(contentId) {
    
    $('div[tapmode]').removeClass('aui-active');
    $('div[role-frm='+contentId+']').addClass('aui-active');

    $('.content').removeClass('content-show');
    $('#'+contentId).addClass('content-show');

    localStorage.setItem('contentId', contentId);
}

// 设置标签
function setItemsContent() {

}