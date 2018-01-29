var userDetails = localStorage.getItem('userDetails')
    if (userDetails && userDetails != 'undefined') {
        userDetails = JSON.parse(userDetails)
    } else {
        userDetails = null
    }
$(function() {

    $('#loginSubmit').on('click', function() {
        var data = {
            email: $.trim($('input[name=email]').val()),
            password: $.trim($('input[name=password]').val())
        }
        post(data)
    })

    $('#register').attr('href', weupingliburl('/register'))

    $('input[name=password]').on('keyup', function(e) {
        if (e.keyCode == 13) {
            var data = {
                email: $.trim($('input[name=email]').val()),
                password: $.trim($(this).val())
            }
            post(data)
        }
    })

    var post = function(data) {
        weupingRequest('/api/login', data, function(ret){
            if (ret.hasOwnProperty('code') && ret.code == 0) {
                ret.data.passwordtrue = data.password
                ret.data.logintime = String(Date.parse(new Date())).substr(0, 10)
                // 保存token信息
                localStorage.setItem('userDetails', JSON.stringify(ret.data))
                chrome.runtime.sendMessage({type: 'refresh'}, function(response) {
                    if (response == 'ok') {
                        window.close()
                    }
                })
            } else {
                alert(ret.msg)
            }
        }, function() {
            alert('网络异常')
        })
    }

})
