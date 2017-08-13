@extends('layouts.app')
@section('content')
  <style>
  .masthead {
    background: #262a2d url(https://s2.open.163.com/ocb/res/img/play/playstage.jpg) center bottom no-repeat;
      height: 370px;
      padding: 20px;
  }
  
  .navBar {
    position: absolute;width:100%; height:48px; background: #fff; 
    background-color: red;
  }

  .mainwrap {
    padding: 20px;
    border-bottom: 2px solid #399466;
    background: #f4f4f4;
    height: 330px;
    width: 960px;
    margin: 0px auto;
}
.m-cdes {
    text-align: left;
    width: 520px;
    float: right;
    position: relative;
}
.mainwrap h2{
    font-size: 27px;
    text-align: left;
    line-height: 33px;
}
.mainwrap p{
    line-height: 23px;
    font-size: 14px;
    color: #000;
}
  
  </style>
    <div class="jumbotron" style="margin: -20px 0 0 0;height: 20px;">
    </div>
    
    <div class="jumbotron masthead">
      
      <div class="container mainwrap">
        <div class="m-cintro f-cb">
            <img src="http://img4.cache.netease.com/video/2013/3/6/20130306151448b9548.jpg" width="380" height="285" alt="斯坦福大学公开课：汽车：过去、现在和未来">
            <div class="m-cdes">
                <h2>汽车：过去、现在和未来</h2>
                <p>本课程共7集(缺4,5,6,7集) 翻译完 欢迎学习</p>
                <span class="blank20"></span>
                <p>课程介绍</p>
                <p>作为第二次工业革命最伟大的发明之一，汽车改变了我们的生活。本课程对汽车的过去、现在和未来进行探索和研究，架起了人文科学、社会科学、设计和工程之间的联系，同时也分析了人类在设计、制造、驾驶、被驾驶、共存和对未来汽车畅想等方面的体验。</p> <b></b>
                
                                                  <a href="http://open.163.com/movie/2012/10/0/G/M8O9BVL9J_M8OHHDU0G.html" class="plybtn"></a>
                                                                    <div class="u-cshare f-cb">
                   
                    <div class="ckcoll f-hide" id="j-collect">收藏</div>
                    <div class="ckcoll2" id="j-addYunBtn"><div class="btn"></div><div class="box"><div class="arr"></div></div></div>
                </div>
            </div>
        </div>
      </div>
      
    </div>
    <br/>
    <div class="container projects">
      <div class="row">
        <div class="col-md-3">
          <div class="panel panel-default">
            <div class="panel-body" style="padding:0px 15px;">
                <div class="row">
                  <div class="col-md-4 glaph-button {{ Request::is('orgnazation/profile*') ? 'active' : '' }}"><a href="/home"><i class="icon-home"></i> 动态</a></div>
                  <div class="col-md-4 glaph-button {{ Request::is('orgnazation/member*') ? 'active' : '' }}"><a href="/orgnazation/mine"><i class="icon-group"></i> 成员 </a></div>
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
    
    
    
