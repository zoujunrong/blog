@extends('layouts.app')
@section('content')
  <style>
  .masthead {
    background-color: #2188b6;
    color: #fff;
    text-align: center;
    min-height: 200px;
  }
  .masthead p {
    font-size: 14px;
  }
  .navBar {
    position: absolute;width:100%; height:48px;background: #fff;margin-top:20px;
    box-shadow: 0 1px 3px 0 rgba(0,0,0,0.25);
  }
  .masthead span {
    width: 100px;height:48px;display: inline-block;
    cursor: pointer;color:#000;padding:3px;font-size: 15px;
  }
  .masthead span:hover{
    border-bottom:3px solid #2188b6;
  }
  .masthead span.active{
    border-bottom:3px solid #2188b6;font-weight: bold;color: #2188b6;
  }
  .glaph-button {
    height: 40px;
    width: 100%;
    background-color: #fff;
    border: 0px;
    display:table;
  }
  .glaph-button:hover,.active{
    background-color: #eee;
  }
  .glaph-button a{
    vertical-align:middle;    
    display:table-cell;
    text-decoration-line: none;
    color:#000;
  }
  .header-pic:hover {
    color: #fff;
  }
  </style>
    <div class="jumbotron masthead" style="margin-top: -20px;">
      <div class="container header-pic">
        <a href="/profile"><img style="max-width: 100px;" class="img-circle" title="主页"  src="http://a0.att.hudong.com/61/92/20300543009208143927926724222_s.jpg" alt="头像" data-toggle="tooltip" data-placement="top"></a><span style="position: absolute;" class="icon-edit" title="编辑头像"></span>
        <h3>Bootstrap</h3>
        <p>简洁、直观、强悍的前端开发框架，让web开发更迅速、简单。</p>
      </div>
      <div class="navBar">
        <span>供 电<br/>100k°</span>
        <span>充 电<br/>300k°</span>
        <span>作 品<br/>64</span>
      </div>
    </div>
    <br/>
    <div class="container projects">
      <div class="row">
        <div class="col-md-3">
          <div class="panel panel-default">
            <div class="panel-body" style="padding:0px 15px;">
                <div class="row">
                  <div class="col-md-4 glaph-button {{ Request::is('profile') ? 'active' : '' }}"><a href="/home"><i class="icon-home"></i> 动态</a></div>
                  <div class="col-md-4 glaph-button {{ Request::is('subject/*') ? 'active' : '' }}"><a href="/subject/mine"><i class="icon-book"></i> 知识库 <span class="badge">14</span></a></div>
                  <div class="col-md-4 glaph-button {{ Request::is('column/*') ? 'active' : '' }}"><a href="/column/mine"><i class="icon-reorder"></i> 专栏 </a></div>
                  <div class="col-md-4 glaph-button {{ Request::is('orgnazation/*') ? 'active' : '' }}"><a href="/orgnazation/mine"><i class="icon-group"></i> 成员 </a></div>
                  <div class="col-md-4 glaph-button {{ Request::is('settings') ? 'active' : '' }}"><a href="/settings"><i class="icon-user"></i> 基本资料 </a></div>
                </div>
            </div>
          </div>
        </div>
        <div class="col-md-9">
          <div class="panel panel-default">
            <div class="panel-body">
              <div class="media">
                  <div class="media-left">
                    <a href="#">
                      <img width="48px" class="media-object" src="{{ asset('images/favicon1.png') }}" alt="..."><span class="label label-info">&nbsp;100°&nbsp;</span>
                    </a>
                  </div>
                  <div class="media-body">
                    <div class="row"><span class="col-md-10"><h4 class="media-heading"><a href="/doc" target="_blank">Sublime Text 全程指南</a></h4></span><span class="col-md-2 pull-right">10天前</span></div>
                    
                    <p>Sublime Text 全程指南 2014年 9月27日|评论 作者：Lucida 微博：@peng_gong 豆瓣：@figure9 原文链接：http://lucida.me/blog……/sublime-text-complete-guide/ 摘要（Abstract） 本文系统全面的介绍了Sublime Text，旨在成为最优秀的Sublime Text中文教程。 更新记录 2014/09……/27：完成初稿 2014/09/28： 更正打开控制台的快捷键为Ctrl + ` 更正全局替换的快捷键为Ctrl + Alt + Enter 前言</p>
                    
                  </div>
                </div>
                <hr/>
                <div class="media">
                  <div class="media-left">
                    <a href="#" >
                      <img width="48px" class="media-object" src="{{ asset('images/favicon1.png') }}" alt="..."><span class="label label-info">&nbsp;50k°&nbsp;</span>
                    </a>
                  </div>
                  <div class="media-body">
                    <h4 class="media-heading">如何优雅地使用Sublime Text3</h4>
                    <p>Sublime Text：一款具有代码高亮、语法提示、自动完成且反应快速的编辑器软件，不仅具有华丽的界面，还支持插件扩展机制，用她来写代码，绝对是一种享受。相比于难于上手的Vim，浮肿沉重的Eclipse，VS，即便体积轻巧迅速启动的Editplus、Notepad++，在SublimeText面前大略显失色，无疑这款性感无比的编辑器是Coding和Writing最佳的选择，没有之一。</p>
                  </div>
                </div>
                <hr/>
            </div>
          </div>
        </div>
        </div>
      </div>
    </div>

@endsection
    
    
    
