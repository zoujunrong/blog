
var _env = 'test';
// 搜索引擎配置
var searchConfig = {
  baidu: 'https://www.baidu.com/s?ie=utf-8&wd=',
  bing: 'https://cn.bing.com/search?&ie=utf-8&q=',
  sogou: 'https://www.sogou.com/web?ie=utf8&query=',
  so: 'https://www.so.com/s?ie=utf-8&q=',
  google: 'https://www.google.com.hk/search?ie=UTF-8&q='
}
// 翻译
var translateConfig = {
  baidu: 'http://fanyi.baidu.com/#auto/auto/',
  youdao: 'http://fanyi.baidu.com/#auto/auto/',
  google: ''
}

function getEnv() {
  return _env;
}

function weupingHost() {
  if(getEnv()=='test') {
    return 'local.weuping';
  } else {
    return 'www.weuping.com';
  }
}

function httpGet(url, callback){
    var xhr = new XMLHttpRequest();
    xhr.open("GET", url, false);
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4) {
            callback(xhr.responseText);
        }
    }
    xhr.send();
}

function httpPost(url, params={}, callback) {
  $.ajax({
      async: false,
      url: url,
      type: 'POST',
      dataType: 'json',
      data: params,
      timeout: 5000,
      success: function(data) {
        callback(data)
      }
  })
  
}


function weupingliburl(path) {
  return 'http://' + weupingHost() + '' +path;
}

function weupingRequest(path, data, success, error=null) {

  if (path != '/api/login') {
    if (typeof(data) == 'string') {
      data += '&uid='+userDetails.id+'&token='+userDetails.token
    } else {
      data['token'] = userDetails.token
      data['uid'] = userDetails.id
    }
  }
  $.ajax({
      async: true,
      url: weupingliburl(path),
      type: 'POST',
      dataType: 'json',
      data: data,
      timeout: 5000,
      success: success,
      error: error
  })
}

function toggleLoading() {
  if ($('#loadingImg').hasClass('hide')) {
    $('#loadingImg').removeClass('hide')
  } else {
    $('#loadingImg').addClass('hide')
  }
}

function versionCompare(v1, v2) {
  if(v1==v2) {
    return 0;
  }
  v1s = v1.split('.');
  v2s = v2.split('.');
  for(var i=0; i<v1s.length; ++i) {
    if( parseInt(v1s[i]) < parseInt(v2s[i]) ) {
      return -1;
    } else if ( parseInt(v1s[i]) > parseInt(v2s[i]) ) {
      return 1;
    }
  }
  return 0;
}

/*
document.oncontextmenu = function (event){
    if (window.event) {
        event = window.event;
    } try {
        var the = event.srcElement;
        if (!((the.tagName == "INPUT" && the.type.toLowerCase() == "text") || the.tagName == "TEXTAREA")) {
        return false;
    }
    return true;
    } catch (e) {
        return false;
    }
}

document.onkeydown = function() {
    if(window.event && window.event.keyCode == 123) {
        event.keyCode=0;
        event.returnValue=false;
    }
    if(window.event && window.event.keyCode == 13) {
        window.event.keyCode = 505;
    }
    if(window.event && window.event.keyCode == 8) {
        window.event.returnValue=false;
    }
}
*/


// 重新登录
function reLogin(callback) {
  var data = {
        email: userDetails.email,
        password: userDetails.passwordtrue
    }
  weupingRequest('/api/login', data, function(ret) {
    if (ret.hasOwnProperty('code') && ret.code == 0) {
      userDetails = ret.data
      userDetails.passwordtrue = data.password
      userDetails.logintime = String(Date.parse(new Date())).substr(0, 10)
      localStorage.setItem('userDetails', JSON.stringify(userDetails))
      if (callback) callback()
    } else {
      window.open('login.html')
    }
  }, function() {
    weAlert('访问异常', '请检查网络是否异常')
  })

}

// 注销用户
function singout() {
    userDetails = null
    localStorage.removeItem('userDetails')
    localStorage.removeItem('bookmark.synctime')
}

function checkIsRelogin(callback) {
    userDetails = JSON.parse(localStorage.getItem('userDetails'))
    var currentTime = String(Date.parse(new Date())).substr(0, 10)
    // 登录时间超过5分钟， 重新登录一次
    if (userDetails && currentTime - userDetails.logintime > 300) {
        reLogin(callback)
    } else if (callback) {
      callback()
    }
}


