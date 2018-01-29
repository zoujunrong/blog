var header = '<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">\
    <link rel="stylesheet" type="text/css" href="css/common.css">\
    <script type="text/javascript" src="js/jquery-3.2.1.min.js" ></script>\
    <script type="text/javascript" src="js/bootstrap.min.js" ></script>\
    <script type="text/javascript" src="js/config.js" ></script>\
    <script type="text/javascript" src="js/newtab/newtab.js" ></script>\
  </head>\
  <body>\
    <div class="container">\
      <div class="row">\
        <div class="col-lg-2"><a class="navbar-brand" href="#">WeUping</a></div>\
        <div class="col-lg-8">\
          <div class="input-group input-group-lg">\
            <div class="input-group-btn">\
                  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span id="searchType" role-url="https://www.baidu.com/s?ie=utf-8&wd="><img class="icon" src="https://baike.baidu.com/favicon.ico"/> 百度</span> <span class="caret"></span></button>\
                  <ul role-search class="dropdown-menu">\
                <li><a href="#" role-href="search"><i class="glyphicon glyphicon-search"></i> 站内 <ii>Alt+1</ii></a></li>\
                <li><a href="#" role-href="bookmark"><i class="glyphicon glyphicon-bookmark"></i> 书签 <ii>Alt+2</ii></a></li>\
                <li><a href="#" role-href="history"><i class="glyphicon glyphicon-eye-open"></i> 历史 <ii>Alt+3</ii></a></li>\
                <li><a href="#" role-href="https://www.baidu.com/s?ie=utf-8&wd="><img class="icon" src="https://www.baidu.com/img/favicon_1177a47fa1821047bb22235ac5f86ada.ico"/> 百度 <ii>Alt+4</ii></a></li>\
                <li><a href="#" role-href="https://cn.bing.com/search?&ie=utf-8&q="><img class="icon" src="https://cn.bing.com/sa/simg/bing_p_rr_teal_min.ico"/> 必应 <ii>Alt+5</ii></a></li>\
                <li><a href="#" role-href="https://www.sogou.com/web?ie=utf8&query="><img class="icon" src="https://www.sogou.com/images/logo/new/favicon.ico"/> 搜狗 <ii>Alt+6</ii></a></li>\
                <li><a href="#" role-href="https://www.so.com/s?ie=utf-8&q="><img class="icon" src="https://s.ssl.qhres.com/static/52166db8c450f68d.ico"/> 360搜 <ii>Alt+7</ii></a></li>\
                <li><a href="#" role-href="https://www.google.com.hk/search?ie=UTF-8&q="><i class="glyphicon glyphicon-search"></i> Google <ii>Alt+8</ii></a></li>\
                  </ul>\
              </div>\
            <input id="searchText" type="text" class="form-control" autocomplete="off" placeholder="搜我想搜的...">\
            <ul class="dropdownSearch">\
            </ul>\
            <span class="input-group-btn">\
              <button class="btn btn-default" type="button" id="startSearch">搜索</button>\
            </span>\
            </div>\
        </div>\
        <div class="col-lg-2">\
          <ul login-status="no" class="nav navbar-nav navbar-right">\
                <li class="dropdown">\
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><status>未登录</status> <span class="caret"></span></a>\
                  <ul class="dropdown-menu">\
                    <li><a target="_blank" href="login.html">登录</a></li>\
                  </ul>\
                </li>\
            </ul>\
            <ul login-status="yes" class="nav navbar-nav navbar-right hide">\
                <li class="dropdown">\
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><status>未知</status> <span class="caret"></span></a>\
                  <ul class="dropdown-menu">\
                    <li><a target="_blank" href="login.html">切换账号</a></li>\
                    <li><a id="singout" href="#">注销账号</a></li>\
                  </ul>\
                </li>\
            </ul>\
        </div>\
      </div>\
      <img id="loadingImg" src="images/loading.gif" style="position:fixed;top:40%;left:40%;z-index:1000;" class="hide" />\
      <br/>\
      <div class="row address" style="margin-bottom:-15px;"></div>\
      <hr/>\
      <div class="row">\
        <div class="col-lg-2">\
          <div class="list-group">\
            <button left-button="recommends" type="button" class="list-group-item active"><i class="glyphicon glyphicon-filter"></i> 推荐</button>\
            <button left-button="bookmarks" type="button" class="list-group-item"><i class="glyphicon glyphicon-bookmark"></i> 书签</button>\
            <button left-button="messages" type="button" class="list-group-item"><i class="glyphicon glyphicon-envelope"></i> 消息<span class="badge">4</span></button>\
            <button left-button="mines" type="button" class="list-group-item"><i class="glyphicon glyphicon-cog"></i> 我的</button>\
          </div>\
        </div>'

document.write(header);