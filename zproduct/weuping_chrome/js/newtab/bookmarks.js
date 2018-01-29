// ======================= 书签功能事件 =================================

$(function() {
    // 先获取历史打开书签路径，以便初始化
    var booksPath = getCurrentVisitPath()
    booksPath = booksPath ? booksPath : '0'
    // 根据标签路径生成路径导航
    getVisitPath(0, booksPath);

    //================================ 常用功能 ================================
    usefulBookmarksMain()

    // 绑定书签操作事件
    bookmarksEvent()
})


/**
 * 常用操作 主方法
 */
function usefulBookmarksMain() {
    usefulItems = '1'
    chrome.bookmarks.getChildren(usefulItems, function(bookmarkArray){
        var openArr = getCurrentVisitPath().split('-')
        var pathHtml = ''
        var index = 11
        
        for (i in bookmarkArray) {
            var isGrpup = bookmarkArray[i].hasOwnProperty('dateGroupModified')
            var iconHtml1 = ''
            var iconHtml2 = ''
            if (isGrpup) {
                var openClass = openArr.length > 0 && openArr[openArr.length - 1] == bookmarkArray[i]['id'] ? 'glyphicon-folder-open' : ''
                iconHtml1 = '<span class="glyphicon glyphicon-folder-close '+openClass+'"></span>'
                iconHtml2 = '<i class="glyphicon glyphicon-folder-close '+openClass+'"></i>'
            } else {
                iconHtml2 = getIcon(bookmarkArray[i]['url'])
                iconHtml1 = iconHtml2
            }
            if (i < index) {
                pathHtml += '<div class="col-lg-1"><a id="'+bookmarkArray[i]['id']+'" href='+(isGrpup ? '"#0-'+usefulItems+'-'+bookmarkArray[i]['id']+'" bookmark-folder' : '"'+bookmarkArray[i]['url']+'" bookmark-link target="_blank"')+' title="'+bookmarkArray[i]['title']+'">'+iconHtml1+' '+bookmarkArray[i]['title']+'</a></div>'
            } else if (i == index) {
                pathHtml += '<div class="col-lg-1"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">更多 <span class="caret"></span></a><ul class="dropdown-menu">'
            }
            if (i >= index) {
                pathHtml += '<li><a id="'+bookmarkArray[i]['id']+'" href='+(isGrpup ? '"#0-'+usefulItems+'-'+bookmarkArray[i]['id']+'" bookmark-folder' : '"'+bookmarkArray[i]['url']+'" bookmark-link target="_blank"')+' title="'+bookmarkArray[i]['title']+'">'+iconHtml2+' '+bookmarkArray[i]['title']+'</a></li>'
                if (i > bookmarkArray.length) {
                    pathHtml += '</ul></div>'
                }
            }
        }
        $('.address').html(pathHtml)
    })
}

/**
 * 标签操作js 主方法
 */
function bookmarksEvent() {
    // initBookMarks()
    $(document).on('click', 'a[bookmark-folder]', function() {
        getVisitPath(1, $(this).attr('href').substring(1))
    })
    // 前进/后退
    $(document).on('click', '#bookmark-left,#bookmark-right', function() {
        var step = -1
        if ($(this).attr('id') == 'bookmark-right') {
            step = 1
        }
        getVisitPath(step)
    })
    // 全选/反选
    $(document).on('click', 'div[right-content=we-bookmarks] :checkbox[name=checkAll]', function() {
        $('div[right-content=we-bookmarks] :checkbox').prop('checked', $(this).prop('checked'))
        if ($(this).prop('checked')) {
            $('div[bookmarks-items]').css('background-color', '#eee')
        } else {
            $('div[bookmarks-items]').css('background-color', '')
        }
    })

    // 书签文件夹点击
    $(document).on('click', 'a[bookmark-folder]', function() {
        getVisitPath(1, $(this).attr('href').substring(1))
    })

    $(document).on('click', 'div[bookmarks-items]', function() {
        var checked = $(this).find(':checkbox').prop('checked')
        $(this).find(':checkbox').prop('checked', !checked)
        if (!checked) {
            $(this).css('background-color', '#eee')
        } else {
            $(this).css('background-color', '')
        }
    })
    $(document).on('click', 'div[right-content=we-bookmarks] :checkbox, div[right-content=we-bookmarks] .panel-body a', function(event) {
        event.stopPropagation()
        if ($(this).prop('checked')) {
            $(this).parents('div[bookmarks-items]').css('background-color', '#eee')
        } else {
            $(this).parents('div[bookmarks-items]').css('background-color', '')
        }
    })
    // 初始化分类标签


    // 操作相关事件
    // 新增操作
    $(document).on('click', 'a[bookmark-add]', function() {
        var modalBody = '<div class="form-group form-inline">\
                        <div class="radio">\
                          <label>\
                            <input type="radio" name="bookmarkType" value="1" checked>网址\
                          </label>\
                        </div>\
                        <div class="radio">\
                          <label>\
                            <input type="radio" name="bookmarkType" value="2">文件夹\
                          </label>\
                        </div>\
                    </div>\
                    <div class="form-group">\
                        <input name="itemName" type="text" class="form-control" placeholder="标签名">\
                    </div>\
                    <div class="form-group">\
                        <input name="url" type="text" class="form-control" placeholder="网址">\
                    </div>\
                    <div class="form-group">\
                        <input name="index" type="number" min="0" max="'+$('div[bookmarks-items]').length+'" value=0 class="form-control" placeholder="排序">\
                    </div>'
        weConfirm('新增书签', modalBody, function() {
            var bookmarkType = $('input[name=bookmarkType]:checked').val()
            var config = {
                parentId: $('ol[role-path] li[bookmark-id]:last').attr('bookmark-id'),
                index: parseInt($('input[name=index]').val()),
                title: $('input[name=itemName]').val()
            }
            if (bookmarkType == '1') {
                config['url'] = $('input[name=url]').val()
            }
            chrome.bookmarks.create(config, function(bookmark){
                if (bookmark == undefined) {
                    weAlert('新增书签', '无效输入，新增失败！')
                } else {
                    location.reload()
                }
            });
        })
    })
    $(document).on('click', 'input[name=bookmarkType]', function() {
        if ($(this).val() == "1") {
            $(this).parents('.modal-body').find('input[name=url]').show()
        } else {
            $(this).parents('.modal-body').find('input[name=url]').hide()
        }
    })

    // 合并操作
    $(document).on('click', 'a[bookmark-merge]', function() {
        var checkeds = $('div[bookmarks-items]').find(':checked')
        if (checkeds.length > 0) {
            var modalBody = '<div class="form-group">\
                            <input name="newname" type="text" class="form-control" placeholder="新书签名">\
                        </div>\
                        <div class="form-group">\
                            <input name="index" type="number" min="0" max="'+$('div[bookmarks-items]').length+'" value=0 class="form-control" placeholder="排序">\
                        </div>'
            weConfirm('合并书签', modalBody, function() {
                var config = {
                    parentId: $('ol[role-path] li[bookmark-id]:last').attr('bookmark-id'),
                    index: parseInt($('input[name=index]').val()),
                    title: $('input[name=newname]').val()
                }
                chrome.bookmarks.create(config, function(bookmark){
                    if (bookmark == undefined) {
                        weAlert('合并书签', '无效输入，移动失败')
                    } else {
                        $('div[bookmarks-items]').find(':checked').each(function(i){
                            chrome.bookmarks.move($(this).attr('bookmarks-id'), {
                                parentId: bookmark.id,
                                index: i
                            })
                        })
                        location.reload()
                    }
                })
            })
        } else {
            weAlert('合并书签', '请选择需要合并的标签！')
        }
    })

    // 书签移动
    $(document).on('click', 'a[bookmark-move]', function() {
        var checkeds = null
        if ($(this).attr('bookmark-move') == 'all') {
            checkeds = $('div[bookmarks-items]').find(':checked')
        } else {
            checkeds = $(this).parents('div[bookmarks-items]').find(':checkbox')
        }
        if (checkeds.length > 0) {
            var modalBody = '<div class="tree well"><ul><li><span tree-id="0"><i class="glyphicon glyphicon-folder-open"></i> 首页</span></li></ul></div>'
            weConfirm('移动书签', modalBody, function() {
                var selectBookmark = $('.tree').find('.parent_li:last')
                var newBookmarkId = selectBookmark.parent().attr('tree-id')
                
                checkeds.each(function(i){
                    chrome.bookmarks.move($(this).attr('bookmarks-id'), {
                        parentId: newBookmarkId,
                        index: i
                    })
                })
                location.reload()
            })
            var booksPath = getCurrentVisitPath()
            var pathArr = booksPath.split('-')
            initBookMarkFolderPath('0', pathArr, '0', 'folder')
        } else {
            weAlert('移动书签', '请选择需要移动的标签！')
        }
    })
    // 点击移动书签操作
    $(document).on('click', 'span[tree-path]', function() {
        var idPathArr = $(this).attr('tree-path').split('-')
        initBookMarkFolderPath('0', idPathArr, '0', 'folder')
    })

    // 删除操作
    $(document).on('click', 'a[bookmark-delete]', function() {
        var checkeds = null
        if ($(this).attr('bookmark-delete') == 'all') {
            checkeds = $('div[bookmarks-items]').find(':checked')
        } else {
            checkeds = $(this).parents('div[bookmarks-items]').find(':checkbox')
        }
        
        if (checkeds.length > 0) {
            var deleteItems = ''
            checkeds.each(function() {
                deleteItems += '<p>'+$(this).siblings('a').parent().html()+'</p>'
            })
            var newObj = $('<div>'+deleteItems+'</div>')
            newObj.find('input').replaceWith('<label></label>')
            weConfirm('标签删除', newObj.html()+'<p><b style="color:red;">将删除以上标签，是否确定永久删除？</b>', function() {
                checkeds.each(function() {
                    chrome.bookmarks.removeTree($(this).attr('bookmarks-id'))
                })
                location.reload()
            })
        } else {
            weAlert('标签删除', '请选择需要删除的内容！')
        }
    })

    // 重命名操作
    $(document).on('click', 'a[bookmark-rename]', function() {
        var thisObj = $(this).parents('div[bookmarks-items]')
        var id = thisObj.find('input[bookmarks-id]').attr('bookmarks-id')
        var aTag = thisObj.find(':checkbox').siblings('a')
        var name = aTag.text()

        var modalBody = '<div class="form-group">\
                            <input name="newname" type="text" class="form-control" value="'+name+'" placeholder="新书签名">\
                        </div>'
                        
        if (aTag.attr('bookmark-folder') == undefined) {
            var url = aTag.attr('href')
            modalBody += '<div class="form-group">\
                            <input name="url" type="text" value='+url+' class="form-control" placeholder="地址">\
                        </div>'
        }


        weConfirm('重命名', modalBody, function() {
            var updateConfig =  {
                title: $.trim($('input[name="newname"]').val())
            }
            if (aTag.attr('bookmark-folder') == undefined) {
                updateConfig['url'] = $.trim($('input[name="url"]').val())
            }
            chrome.bookmarks.update(id, updateConfig)
            location.reload()
        })
    })

    // 上下移动
    $(document).on('click', 'a[bookmark-moveup], a[bookmark-movedown]', function() {
        var thisObj = $(this).parents('div[bookmarks-items]')
        var index = $('div[bookmarks-items]').index(thisObj)
        var id = thisObj.find('input[bookmarks-id]').attr('bookmarks-id')
        var parentId = $('ol[role-path] li[bookmark-id]:last').attr('bookmark-id')
        if ($(this).attr('bookmark-moveup') == undefined) {
            index = index + 2
        } else {
            index = index - 1
        }
        if (index < 0) return;
        chrome.bookmarks.move(id, {
            parentId: parentId,
            index: index
        })
        location.reload()
    })

    // 分享操作
    $(document).on('click', 'a[bookmark-share]', function() {
        var checkeds = null
        if ($(this).attr('bookmark-share') == 'all') {
            checkeds = $('div[bookmarks-items]').find(':checked')
        } else {
            checkeds = $(this).parents('div[bookmarks-items]').find(':checkbox')
        }

        if (checkeds.length > 0) {
            var shares = []
            checkeds.each(function() {
                // 根据ID 获取对应标签信息
                shares.push($(this).attr('bookmarks-id'))
            })

            if (shares) {
                chrome.storage.local.get(shares, function(result){
                    if (JSON.stringify(result) != '{}') {
                        var requestData = {
                            'bookmarks': JSON.stringify(result)
                        }
                        weupingRequest('/api/shareBookmarks', requestData, function(ret) {
                            var index = 0
                            for (var i in result) {
                                result[i]['open_status'] = ret.data[index] ? 1 : 0
                                index++
                            }
                            chrome.storage.local.set(result)
                            location.reload()
                        })
                    }
                })
            }
        } else {
            weAlert('标签删除', '请选择需要删除的内容！')
        }

    })

}

/**
 * 控制访问路径
 */
function getVisitPath(step, path) {
    var openArr = localStorage.getItem('bookmarks-openArr')
    var openIndex = localStorage.getItem('bookmarks-open')
    openArr = openArr ? JSON.parse(openArr) : []
    openIndex = openIndex ? parseInt(openIndex) : 1

    if (step == 0) {
        // 移动步数为0 替换原来的
        if (path) {
            openArr[openIndex-1] = path
        }
    } else {
        if (path) {
            // 新增操作， 防止同一个文件夹反复点击新增多条
            if (openArr[openIndex-1] != path) {
                // 覆盖后面所有的项
                openArr.splice(openIndex, openArr.length-openIndex, path)
                openIndex += step
                // 不能超过数组范围
                if (openIndex > openArr.length) {
                    openIndex = openArr.length
                }
            }
        } else{
            // 只前进或后退
            openIndex += step
            // 不能超过数组范围
            if (openIndex > openArr.length) {
                openIndex = openArr.length
            }
            // 取得移动的路径， 方便展示对应的信息
            path = openArr ? openArr[openIndex-1] : '0'
        }
    }
    // 保存最新的openIndex  和 openArr
    localStorage.setItem('bookmarks-openArr', JSON.stringify(openArr))
    localStorage.setItem('bookmarks-open', openIndex)

    createBookMarkPath(path)
}

/**
 * 获取当前的路径
 */
function getCurrentVisitPath() {
    var openArr = localStorage.getItem('bookmarks-openArr')
    var openIndex = localStorage.getItem('bookmarks-open')
    openArr = openArr ? JSON.parse(openArr) : []
    openIndex = openIndex ? parseInt(openIndex) : 1
    console.log(openIndex)
    console.log(openArr)
    return openArr ? openArr[openIndex-1] : '0'
}

/**
 * 检测移动按钮的状态
 * @return {[type]} [description]
 */
function checkMoveBarStatus() {
    var openArr = localStorage.getItem('bookmarks-openArr')
    var openIndex = localStorage.getItem('bookmarks-open')
    openArr = openArr ? JSON.parse(openArr) : []
    openIndex = openIndex ? parseInt(openIndex) : 1
    var hasLeft = true
    var hasRight = true
    if (openIndex == 1) {
        hasLeft = false
        if (openArr.length <= 1) {
            hasRight = false
        }
    } else {
        if (openArr.length == openIndex) {
            hasRight = false
        }
    }
    return [hasLeft, hasRight]
}

/**
 * 根据标签路径生成路径导航
 * @param  {[type]} booksPath [description]
 * @return {[type]}           [description]
 */
function createBookMarkPath(booksPath) {
    // 初始化address中的文件夹状态
    $('.address').find('.glyphicon-folder-close').removeClass('glyphicon-folder-open')
    $('.address a[href="#'+booksPath+'"]').find('.glyphicon-folder-close').addClass('glyphicon-folder-open')
    
    var pathArr = booksPath.split('-')
    // 获取标签信息
    chrome.bookmarks.get(pathArr, function(bookmarkArray){
        var checkBarStatus = checkMoveBarStatus()
        var leftIconHtml = '<i class="glyphicon glyphicon-menu-left" style="margin-left:-5px;"></i>'
        var rightIconHtml = '<i class="glyphicon glyphicon-menu-right" style="margin-left:10px;"></i>'
        var pathHtml = ''
        if (checkBarStatus[0]) {
            pathHtml += '<a id="bookmark-left" title="前进" href="#">'+leftIconHtml+'</a>'
        } else {
            pathHtml += '<label style="color:gray">'+leftIconHtml+'</label>'
        }
        if (checkBarStatus[1]) {
            pathHtml += '<a id="bookmark-right" title="后退" href="#">'+rightIconHtml+'</a>'
        } else {
            pathHtml += '<label style="color:gray">'+rightIconHtml+'</label>'
        }
        
        pathHtml += '&nbsp;&nbsp;<input name="checkAll" type="checkbox"> ';
        var tmpPath = '';
        for (i in pathArr) {
            if (i == 0) {
                bookmarkArray[i]['title'] = '首页'
            }
            tmpPath += i==0 ? bookmarkArray[i]['id'] : '-'+bookmarkArray[i]['id'];
            if (i==pathArr.length-1) {
                pathHtml += '<li bookmark-id="'+bookmarkArray[i]['id']+'" class="active">'+bookmarkArray[i]['title']+'</li>';
            } else {
                pathHtml += '<li bookmark-id="'+bookmarkArray[i]['id']+'"><a bookmark-folder href="#'+tmpPath+'">'+bookmarkArray[i]['title']+'</a></li>';
            }
            
        }
        pathHtml += '<div role="presentation" class="dropdown pull-right"><a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">\
                                操作 <span class="caret"></span>\
                                </a>\
                                <ul class="dropdown-menu">\
                                    <li><a bookmark-add href="#"><i class="glyphicon glyphicon-plus-sign"></i> 新增</a></li>\
                                    <li><a bookmark-merge href="#"><i class="glyphicon glyphicon-tags"></i> 合并</a></li>\
                                    <li><a bookmark-move="all" href="#"><i class="glyphicon glyphicon-move"></i> 移动</a></li>\
                                    <li><a bookmark-delete="all" href="#"><i class="glyphicon glyphicon-remove-circle"></i> 删除</a></li>\
                                </ul></div>'
        $('ol[role-path]').html(pathHtml);
    });

    chrome.bookmarks.getChildren(pathArr[pathArr.length-1], function(bookmarkArray){
        var pathHtml = ''
        var newDate = new Date()
        var bookmarkIds = []
        for (i in bookmarkArray) {
            bookmarkIds.push(bookmarkArray[i]['id'])
            newDate.setTime(bookmarkArray[i]['dateAdded'])
            var isGrpup = bookmarkArray[i].hasOwnProperty('dateGroupModified')

            var iconHtml = ''
            if (isGrpup) {
                iconHtml = '<i class="glyphicon glyphicon-folder-close"></i>'
            } else {
                iconHtml = getIcon(bookmarkArray[i]['url'])
            }
            pathHtml += '<div bookmarks-items='+bookmarkArray[i]['index']+' class="col-lg-12 hover">\
                            <div class="col-lg-8">\
                                <input type="checkbox" bookmarks-id="'+bookmarkArray[i]['id']+'"> '+iconHtml+'<a id="'+bookmarkArray[i]['id']+'" href='+(isGrpup ? '"#'+booksPath+'-'+bookmarkArray[i]['id']+'" bookmark-folder' : '"'+bookmarkArray[i]['url']+'" bookmark-link target="_blank"')+' title="'+bookmarkArray[i]['title']+'"> '+bookmarkArray[i]['title']+'</a>\
                            </div>\
                            <div class="col-lg-1">\
                                <span class="dropdown-toggle bookmark-inner-oper" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-option-vertical"></i></span>\
                                <ul class="dropdown-menu">\
                                    <li bookmark-single-rename><a bookmark-rename href="#">重命名</a></li>\
                                    <li><a bookmark-move="single" href="#">移动至</a></li>\
                                    <li><a bookmark-moveup href="#">上移</a></li>\
                                    <li><a bookmark-movedown href="#">下移</a></li>\
                                    <li><a bookmark-delete="single" href="#">删除</a></li>\
                                </ul>\
                            </div>\
                            <div class="col-lg-3"><i class="pull-right">'+newDate.toLocaleString()+'</i></div></div>'
        }
        var roleItemsObj = $('div[right-content="we-bookmarks"] div[role-items]')
        roleItemsObj.html(pathHtml)
        $('ol[role-path] li[bookmark-id]:last').append('<span> ('+bookmarkArray.length+')</span>');

    })
}

// 生成书签目录
function initBookMarkFolderPath(id, showPathArr, idPath, type) {
    chrome.bookmarks.getChildren(id, function(bookmarkArray){
        if (bookmarkArray.length > 0) {
            var subTreeStr = ''
            var showId = null
            subTreeStr += '<ul>'
            for (i in bookmarkArray) {
                var isGrpup = bookmarkArray[i].hasOwnProperty('dateGroupModified')
                if (type == 'folder' && isGrpup) {
                    if ($.inArray(bookmarkArray[i]['id'], showPathArr) != -1) {
                        showId = bookmarkArray[i]['id']
                    }
                    subTreeStr += '<li>'
                    subTreeStr += '<span tree-id="'+bookmarkArray[i]['id']+'" tree-path="'+idPath+'-'+bookmarkArray[i]['id']+'"><i class="glyphicon glyphicon-folder-'+(showId == bookmarkArray[i]['id'] ? 'open parent_li' : 'close')+'"></i> '+ bookmarkArray[i]['title'] +'</span>'
                    subTreeStr += '</li>'
                }
            }
            subTreeStr += '</ul>'
            $('.tree span[tree-id="'+id+'"]').siblings('ul').remove()
            $('.tree span[tree-id="'+id+'"]').after(subTreeStr)
            if (showId) {
                initBookMarkFolderPath(showId, showPathArr, idPath+'-'+showId, type)
            }
        }
    })
}


// 统计访问次数
function statisticsVisitors(start, end) {
    var maxResults = 10000;
    chrome.history.search({
        text: '',
        startTime: start,
        endTime: end,
        maxResults: maxResults
    }, function(historyItemArray) {
        var total = historyItemArray.length;
        historyItemArray = historyItemArray.sort(function(x, y) {return y['visitCount'] - x['visitCount'];})
        console.log(historyItemArray)
    });
}

function getIcon(url) {
    var re = /^(https?:\/\/)?([\w-_.]+(com|com\.cn|net|org|info|mobi|cn))+(:[0-9]+)?(\/[\w-_.\?=&%#:]+)*\/?$/g
    var res = re.exec(url)
    var icon = null
    if (res) {
        icon = localStorage.getItem('icon:' + res[2])
    }
    return icon ? '<img src="'+icon+'" class="icon-16"/>' : '<i class="glyphicon glyphicon-link"></i>'
}