$(function(){
    createToolbars()
    createItems()
})

// 生成工具栏
function createToolbars() {
    var toolbars = '<div class="col-lg-4 pull-right">\
        <button role-name="createNotebookbar" type="button" class="btn btn-primary btn-xs pull-right"><span class="glyphicon glyphicon-plus "></span> 新建笔记</button>\
    </div>'
    $('.address').append(toolbars)

    // 点击新建笔记按钮事件
    $(document).on('click', '[role-name=createNotebookbar]', function() {
        var innerHtml = '<form id="addNewNotebookForm">\
                          <div class="form-group">\
                            <input type="hidden" value="0" name="id" />\
                            <label for="formTitle">标题</label>\
                            <input name="title" type="email" class="form-control" id="formTitle" placeholder="笔记标题">\
                          </div>\
                          <div class="form-group">\
                            <label for="formDesc">描述</label>\
                            <textarea name="desc" class="form-control" placeholder="大致描述下笔记的内容" rows="3"></textarea>\
                          </div>\
                          <div class="checkbox">\
                            <label>\
                              <input name="open_status" value=1 type="checkbox"> 开源(所有人可见)\
                            </label>\
                          </div>\
                        </form>'
        weConfirm('新建笔记', innerHtml, function() {
          checkIsRelogin(function() {
                toggleLoading()
                weupingRequest('/api/createnotebook', $("#addNewNotebookForm").serialize(), function(ret){
                    toggleLoading()
                    if (ret.code == 0 && ret.data) {
                        location.reload()
                    }
                })
          })
          
          
        })
    })
}

// 笔记Items栏
function createItems() {
    checkIsRelogin(function(){
        toggleLoading()
        weupingRequest('/api/getnotebook', {}, function(ret) {
            toggleLoading()
            if (ret.hasOwnProperty('code') && ret.code == 0) {
                var data = ret.data
                if (JSON.stringify(data.notebooks) != '[]') {
                    var notebooks = data.notebooks
                    var tags = data.tags
                    var totalTags = {}
                    for (var i in notebooks) {
                        var tagHtml = ''
                        var tagsCount = 0
                        if (tags.hasOwnProperty(i)) {
                            for (var t in tags[i]) {
                                tagsCount++
                                totalTags[tags[i][t]['tag_id']] = tags[i][t]['tag']['name']
                                tagHtml += '<span tag-map-id='+tags[i][t]['id']+' role-name="label" class="label label-success">'+tags[i][t]['tag']['name']+'<i class="glyphicon glyphicon-remove remove hide"></i></span>'
                            }
                        }
                        if (tagsCount < 5) {
                            tagHtml += '<button role-name="addTagBar" type="button" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-plus "></span> 新建标签</button>'
                        }
                        var innerHtml = '<div notebook-id='+notebooks[i]['id']+' notebook-uid='+notebooks[i]['uid']+' class="panel-body">\
                              <div class="media">\
                                <div class="media-body">\
                                    <h4>\
                                      '+(notebooks[i]['open_status'] ? '<i title="已开源" class="glyphicon glyphicon-tint"></i> ' : '')+'<a notebook-title href="#">'+notebooks[i]['title']+'</a> <a title="阅读模式" notebook-read href="#" class="hide"><i class="glyphicon glyphicon-eye-open"></i></a>\
                                      <div role="settings" class="dropdown pull-right hide" style="margin-top: -10px;">\
                                        <a class="dropdown-toggle" style="font-size:16px;" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-cog"></i><span class="caret"></span></a>\
                                        <ul class="dropdown-menu">\
                                          <li><a notebook-edit href="#"><i class="glyphicon glyphicon-pencil"></i> 修改</a></li>\
                                          <li><a notebook-delete href="#"><i class="glyphicon glyphicon-remove"></i> 删除</a></li>\
                                        </ul>\
                                      </div>\
                                    </h4>\
                                    <p>\
                                    <p notebook-desc>'+notebooks[i]['desc']+'</p>\
                                    </p>\
                                    <p style="clear: both;"></p>\
                                    <p>\
                                    '+tagHtml+'\
                                    </p>\
                                    <div class="panel-card-footer">\
                                      <span class=""><a href="#" method="post" title="引用"> 引用('+notebooks[i]['quotes']+')</a></span>\
                                      <span class=""><a href="javascript:void(0);" title="评论"> 评论('+notebooks[i]['reviews']+')</a></span>\
                                      <span class=""><a href="javascript:void(0);" title="赞"> 赞('+notebooks[i]['reviews']+')</a></span>\
                                      <span  notebook-open-status='+notebooks[i]['open_status']+'>'+(notebooks[i]['open_status'] ? '公开' : '不公开')+'</span>\
                                      <span style="font-size:12px;color:gray;">'+notebooks[i]['created_at']+'创建</span>\
                                    </div>\
                                </div>\
                              </div>\
                              <hr/>\
                            </div>'
                        $('#item-container').append(innerHtml)
                    }
                } else {
                    var innerHtml = '<div class="jumbotron">\
                                        <h2>强大的笔记本</h2>\
                                        <p>喜欢上网的你，怎能少了它</p>\
                                        <p><a class="btn btn-primary btn-lg" href="#" role-name="createNotebookbar">新建笔记本</a></p>\
                                    </div>'
                    $('#item-container').append(innerHtml)
                }

                if (JSON.stringify(totalTags) != '{}') {
                    var tagHtml = '<div style="width:100px;">'
                    for (var i in totalTags) {
                        tagHtml += '<a href="#" tag-id='+i+' role-name="label" class="label label-success">'+totalTags[i]+'</a>'
                    }
                    tagHtml += '</div>'
                    $('#left-panel [pannel-content=tags]').html(tagHtml)
                }
            }
        }, function() {
            toggleLoading()
            alert('网络异常，请检查您的网络是否可用！')
        })
    })

    // 移动事件
    $(document).on('mouseover', '#item-container .panel-body', function(){
        $(this).find('div[role=settings]').removeClass('hide')
        $(this).find('span[role-name=label] i.remove').removeClass('hide')
        $(this).find('a[notebook-read]').removeClass('hide')
    }).on('mouseout', '#item-container .panel-body', function(){
        $(this).find('div[role=settings]').addClass('hide')
        $(this).find('span[role-name=label] i.remove').addClass('hide')
        $(this).find('a[notebook-read]').addClass('hide')
    })

    // 新增标签事件
    $(document).on('click', 'button[role-name=addTagBar]', function() {
        $(this).after('<input class="tag-input" placeholder="新增标签" type="text" name="tag" value="" /> ').addClass('hide')
        $(this).next('input').focus()
    })

    // 删除标签事件
    $(document).on('click', 'i.remove', function() {
        // 发起请求删除标签
        var data = {
            tag_map_id: $.trim($(this).parents('span[tag-map-id]').attr('tag-map-id')),
            obj_id: $(this).parents('div[notebook-id]').attr('notebook-id')
        }
        if ($(this).parent().parent().find('[tag-map-id]').length <= 5) {
            $(this).parent().siblings('button').removeClass('hide')
        }
        $(this).parent().remove()

        checkIsRelogin(function() {
            toggleLoading()
            weupingRequest('/api/deletetag', data, function(ret) {
                toggleLoading()
                if (!ret.hasOwnProperty('code') || ret.code != 0 || !ret.data) {
                    weAlert('删除标签', '网络异常，标签删除失败！')
                }

            })
        })
    })

    // 标签失去焦点事件
    $(document).on('blur', '.tag-input', function() {
        var objParent = $(this).parent();
        // 新标签
        if ($.trim($(this).val())) {
            var newTag = '<span tag-map-id="" role-name="label" class="label label-success">'+ $.trim($(this).val())+'<i class="glyphicon glyphicon-remove remove hide"></i></span>'
            $(this).siblings('button[role-name=addTagBar]').before(newTag)
        }
        if ($(this).parent().find('[tag-map-id]').length <= 4) {
            $(this).prev('button').removeClass('hide')
        } 
        // 发起请求新增标签
        var data = {
            name: $.trim($(this).val()),
            type: 1,
            obj_id: $(this).parents('div[notebook-id]').attr('notebook-id')
        }
        $(this).remove()

        checkIsRelogin(function() {
            toggleLoading()
            weupingRequest('/api/createtag', data, function(ret) {
                toggleLoading()
                if (!ret.hasOwnProperty('code') || ret.code != 0) {
                    weAlert('新建标签', '网络异常标签创建失败！')
                } else {
                    if (ret.data) {
                        objParent.find('[tag-map-id]:last').attr('tag-map-id', ret.data)
                    } else {
                        objParent.find('[tag-map-id]:last').remove()
                    }
                    
                }
            })
        })
    })
    $(document).on('keyup', '.tag-input', function(e) {
        if (e.keyCode == 13) {
            $(this).blur()
        }
    })

    // 修改操作按钮
    $(document).on('click', '[notebook-edit]', function() {
        $('[role-name=createNotebookbar]').click()
        // 自动赋值
        var mediaBody = $(this).parents('[notebook-id]')
        $('#addNewNotebookForm').find('input[name=id]').val(mediaBody.attr('notebook-id'))
        $('#addNewNotebookForm').find('input[name=title]').val(mediaBody.find('[notebook-title]').text())
        $('#addNewNotebookForm').find('textarea[name=desc]').val(mediaBody.find('[notebook-desc]').text())
        if (mediaBody.find('[notebook-open-status]').attr('notebook-open-status') == '1') {
            $('#addNewNotebookForm').find('input[name=open_status]').prop('checked', true)
        } else {
            $('#addNewNotebookForm').find('input[name=open_status]').prop('checked', false)
        }
    })

    // 删除操作按钮
    $(document).on('click', '[notebook-delete]', function() {
        var objParent = $(this).parents('[notebook-id]')
        weConfirm('删除笔记', '是否确定删除该笔记，删除后将移入回收站', function() {
            checkIsRelogin(function() {
                var data = {
                    id: objParent.attr('notebook-id')
                }
                toggleLoading()
                weupingRequest('/api/deletenotebook', data, function(ret) {
                    toggleLoading()
                    if (!ret.hasOwnProperty('code') || ret.code != 0) {
                        weAlert('删除笔记', '网络异常删除笔记失败！')
                    } else {
                        if (ret.data) {
                            objParent.remove()
                            weClose()
                        }

                    }
                })
            })
        })
    })

    // 编辑笔记本内容
    $(document).on('click', 'a[notebook-title]', function() {
        var objParent = $(this).parents('[notebook-id]')
        checkIsRelogin(function() {
            window.open(weupingliburl('/api/notebookedit?id='+objParent.attr('notebook-id')+'&uid='+userDetails.id+'&token='+userDetails.token))
        })
    })
    // 查看笔记本内容
    $(document).on('click', 'a[notebook-read]', function() {
        var objParent = $(this).parents('[notebook-id]')
        checkIsRelogin(function() {
            window.open(weupingliburl('/api/notebookshow?id='+objParent.attr('notebook-id')+'&author='+objParent.attr('notebook-uid')+'&uid='+userDetails.id+'&token='+userDetails.token))
        })
    })

}



