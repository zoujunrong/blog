@extends('layouts.app')

@section('content')
<style>
  .exp-list-top {
    list-style: none;
  }
  .exp-list-top > li {
    width: 100px;
    height: 40px;
    display: inline-block;
      font-size: 16px;
      line-height: 40px;
      text-align: center;
      margin-bottom: 2px;
  }
  .exp-list-top a {
    color: #000;
  }
  .exp-list-top .active, .exp-list-top li:hover {
    border-radius:4px;
    box-shadow: 1px 1px 1px #888888;
    background: linear-gradient(128deg, #fa2f2f 0%, #ff5b36 90%);
  }
  .exp-list-top>.active a,.exp-list-top>li:hover a{
    color: #fff;
  }

  .panel {
    margin: 10px 0;
  }

  h4 a{
    font-size: 18px;
      font-weight: 700;
      line-height: 1.6;
      color: #1e1e1e;
  }
  .media-body p {
    font-size: 15px;
    line-height: 25px;
  }
  .top-label{
    font-size: 12px;
    color:gray;
    margin-left: 10px;
  }
  .label {
  }

  .dropdown-submenu {  
    position: relative;  
}  
  
.dropdown-submenu>.dropdown-menu {  
    top: 0;  
    left: 100%;  
    margin-top: -6px;  
    margin-left: -1px;  
    -webkit-border-radius: 0 6px 6px 6px;  
    -moz-border-radius: 0 6px 6px;  
    border-radius: 0 6px 6px 6px;  
}  
  
.dropdown-submenu:hover>.dropdown-menu {  
    display: block;  
}  
  
.dropdown-submenu>a:after {  
    display: block;  
    content: " ";  
    float: right;  
    width: 0;  
    height: 0;  
    border-color: transparent;  
    border-style: solid;  
    border-width: 5px 0 5px 5px;  
    border-left-color: #ccc;  
    margin-top: 5px;  
    margin-right: -10px;  
}  
  
.dropdown-submenu:hover>a:after {  
    border-left-color: #fff;  
}  
  
.dropdown-submenu.pull-left {  
    float: none;  
}  
  
.dropdown-submenu.pull-left>.dropdown-menu {  
    left: -100%;  
    margin-left: 10px;  
    -webkit-border-radius: 6px 0 6px 6px;  
    -moz-border-radius: 6px 0 6px 6px;  
    border-radius: 6px 0 6px 6px;  
} 

</style>

<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-1">
      <ul class="nav nav-tabs">
      <li role="presentation" class="active"><a href="#">最新</a></li>
      <li role="presentation"><a href="#">影响力</a></li>
      <li role="presentation" class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
          目录 <span class="caret"></span>
        </a>
        <ul class="dropdown-menu">
          <li><a href="#">Some action</a></li>  
              <li><a href="#">Some other action</a></li>  
              <li class="divider"></li>  
              <li class="dropdown-submenu">  
                <a tabindex="-1" href="#">Hover me for more options</a>  
                <ul class="dropdown-menu open">  
                  <li><a tabindex="-1" href="#">Second level</a></li>  
                  <li class="dropdown-submenu">  
                    <a href="#">Even More..</a>  
                    <ul class="dropdown-menu">  
                        <li><a href="#">3rd level</a></li>  
                        <li><a href="#">3rd level</a></li>  
                    </ul>  
                  </li>  
                  <li><a href="#">Second level</a></li>  
                  <li><a href="#">Second level</a></li>  
                </ul>  
              </li>  
        </ul>
      </li>
      </ul>
      <div class="media">
              <div class="media-body">
                <div class="row"><span class="col-md-10"><a style="margin: 5px;height: 25px;" href="#" data-toggle="popover" title="Dismissible popover" data-content="And here's some amazing content. It's very engaging. Right?">
                  <img width="25px" class="img-rounded" src="http://upload.jianshu.io/collections/images/279834/1473388229.jpg?imageMogr2/auto-orient/strip|imageView2/1/w/240/h/240" alt="...">
                 风清扬</a><span class="top-label">1小时前</span></span></div>
                <h4><a href="/doc" target="_blank">你曾经哪一瞬间觉得人是愚蠢的？</a></h4>
                <p>
                <img class="pull-left" style="width: 190px; margin: 5px 10px 0 0" src="//upload-images.jianshu.io/upload_images/1950577-98f475c00a46ea69.jpg?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240" alt="cover">
                <p>我以前在超市做兼职的时候遇到一个女孩，她跟我一样做酸奶推销，八十一天，但是一天要站十个小时，而且还不包吃，这个姑娘特别喜欢林峰，她为了林峰学习粤语，看很多港片，买了很多林峰的海报，杂志封面是林峰的她也全买，林峰到内地有活动她总是赶到现场支持，她说她最大的愿望是有一天去香港看林峰的演唱会，但是重点来了，她今年已经二十八岁...<a class="icon-double-angle-right" href="http://mp.weixin.qq.com/s?src=3&timestamp=1498400942&ver=1&signature=03fn-njMA86IJDUqXKfESWNqLKF7upPf3dImAJFl*Z9SEwDFlLCRnBVjXMZ*sJrM9Hva7sVIXKBTqJpuePCG4U0ljspTe1qQPZ4KkkWWYCJ7na-QBRtnuz4vfV2v14iF4pATxq7nlxG0f9na895s9pWNyPcsjYfjDw6hrDwQFno="> 阅读</a></p>
                </p>
                <p style="clear: both;"></p>
                <div class="row">
                  <span class="col-xs-2 col-sm-2"> <b style="font-size: 20px;color:#ff5b36;line-height: 20px;" title="影响了5.1千人"> 5.1K</b></span>
                  <span class="col-xs-2 col-sm-2"><a href="#" method="post" title="引用" class="icon-quote-left" data-toggle="modal" data-target="#myModal"> 534K</a></span>
                  <span class="col-xs-2 col-sm-2"><a href="javascript:void(0);"  title="评论" class="icon-comment"> 评论</a></span>
                  <span class="col-xs-2 col-sm-2"><a href="javascript:void(0);" title="分享" class="icon-share-alt"> 分享</a></span>
                  <span class="col-xs-2 col-sm-2"><a href="javascript:void(0);" title="举报" class="icon-legal"> 举报</a></span>
                </div>
              </div>
            </div>
            
    </div>
    <div class="col-md-3">
      <div class="row">
        <div class="col-md-12">
          <div class="pull-left" style="margin: 0 10px 8px 0;">
          <img src="{{ asset('tmp/header01.jpg') }}"/>          
          </div>
          <div>
          <p><b>《 旅行 》</b></p>       
          <p><b style="color: #ff5b36;">影响力：6345K</b></p>          
          </div>
          <p style="clear: both;"></p>
          <p>
          <button type="button" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> 订阅</button><span class="top-label"><a href="#"><b>72341</b></a> 人订阅了该知识体</span>
          </p>
          <p>
            最美的景色永远在远方，再远的脚步也走不出心房
          </p>
          <hr/>
          
        </div>
        

      </div>
    </div>
  </div>
</div>
@endsection