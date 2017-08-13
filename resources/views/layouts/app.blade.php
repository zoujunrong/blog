<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<meta charset="utf-8">
    <title>{{ config('app.name', 'WeUping') }}-共同增长知识</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Weuping 提供了一个知识在线共享的平台，共同增长知识">
    <meta name="keywords" content="WeUping,传道授业解惑">
    <meta name="author" content="WeUping">
    <meta name="application-name" content="weuping.com">
    
    <!-- Site CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    
    <!-- Favicons -->
    <link rel="shortcut icon" href="{{ asset('images/favicon1.png') }}">

    <script src="{{ asset('js/jquery1.12.4.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <!-- Scripts -->
    <style>
      /*background: #FFFEF2;*/
      body { padding-top: 70px;}
      body a {
      }
      body a:hover, body a:link, body a:focus{
        text-decoration-line: none;
        border: none;
      }
      .label-daynamic{
        color: #8a8888;margin-right: 20px;
      }
      .txt-center{
        text-align: center;
      }
      .tag-label{
        margin:5px;padding: 2px 8px;border-radius: 2px;background-color: #fff;color: #118;
      }
      a {
        color:#7a8599;
      }
    </style>
  </head>

<body>
    <nav id="header" class="navbar navbar-inverse navbar-fixed-top navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            
          </button>
          <a class="navbar-brand hidden-sm" href="{{ url('/') }}">{{ config('app.name') }}</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <form class="nav navbar-nav navbar-left col-lg-3" style="margin-top:8px;" role="search"><div class="input-group ">
              <input type="text" class="form-control" placeholder="找想要的...">
              <span class="input-group-btn">
                <button type="button" class="btn btn-default">
                  <span class="glyphicon glyphicon glyphicon-search" aria-hidden="true"></span>
                </button>
              </span>
            </div></form>
          <ul class="nav navbar-nav">
          
            <li class="{{ Request::is('home') ? 'active' : '' }}"><a href="/home">首页</a></li>
            <li class="{{ Request::is('explore') ? 'active' : '' }}"><a href="/explore">发现</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right hidden-sm">
            <!-- Authentication Links -->
            @if (Auth::guest())
                <li><a href="{{ route('login') }}">登录</a></li>
                <li><a href="{{ route('register') }}">注册</a></li>
            @else
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        <img style="width:18px;padding:0px;margin:0px;" class="img-circle" src="{{ asset('images/favicon1.png') }}" alt="..."> ZOUJUNRONG <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">
                        <li><a href="/home">个人主页</a></li>
                        <li><a href="/home">通知</a></li>
                        <li><a href="/home/baseinfo">编辑资料</a></li>
                        <li role="separator" class="divider"></li>    
                        <li>    
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                退出
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
            @endif
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    @yield('content')

    <footer class="footer ">
      <div class="container">
        <hr>
        <div class="row footer-bottom">
          <ul class="list-inline text-center">
            <li><a href="http://www.miibeian.gov.cn/" target="_blank">京ICP备11008151号</a></li><li>京公网安备11010802014853</li>
          </ul>
        </div>
      </div>
    </footer>

</body></html>


