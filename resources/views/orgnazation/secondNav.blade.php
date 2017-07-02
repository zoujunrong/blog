@extends('layouts.app')
@section('content')
<style>
  .masthead {
    background-color: #06406c;
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
    <div class="jumbotron masthead" style="margin-top: -40px;">
      <div class="container header-pic">
        <a href="/profile"><img style="max-width: 100px;" class="img-circle" title="主页"  src="http://a0.att.hudong.com/61/92/20300543009208143927926724222_s.jpg" alt="头像" data-toggle="tooltip" data-placement="top"></a><span style="position: absolute;" class="icon-edit" title="编辑头像"></span>
        <h3>Bootstrap</h3>
        <p>简洁、直观、强悍的前端开发框架，让web开发更迅速、简单。</p>
        <label class="icon-tag tag-label"> 前端开发</label>
        <label class="icon-tag tag-label"> 互联网</label>
      </div>
      <div class="navBar">
        <a href="/orgnazation/energyFlows"><span>供 电<br/>100k°</span></a>
        <a href="/orgnazation/energyFlows"><span>充 电<br/>300k°</span></a>
        <a href="/orgnazation/discuz"><span>互 动<br/>64</span></a>
      </div>
    </div>
    <br/>
    <div class="container projects">
      <div class="row">
        <div class="col-md-3">
          <div class="panel panel-default">
            <div class="panel-body" style="padding:0px 15px;">
                <div class="row">
                  <div class="col-md-4 glaph-button {{ Request::is('orgnazation/profile*') ? 'active' : '' }}"><a href="/orgnazation/profile"><i class="icon-home"></i> 动态</a></div>
                  <div class="col-md-4 glaph-button {{ Request::is('/orgnazation/subjects*') ? 'active' : '' }}"><a href="/orgnazation/subjects"><i class="icon-book"></i> 能源库 <span class="badge">14</span></a></div>
                  <div class="col-md-4 glaph-button {{ Request::is('/orgnazation/columns*') ? 'active' : '' }}"><a href="/orgnazation/columns"><i class="icon-reorder"></i> 专栏 </a></div>
                  <div class="col-md-4 glaph-button {{ Request::is('orgnazation/members*') ? 'active' : '' }}"><a href="/orgnazation/members"><i class="icon-group"></i> 成员 </a></div>
                  <div class="col-md-4 glaph-button {{ Request::is('/orgnazation/settings') ? 'active' : '' }}"><a href="/orgnazation/settings"><i class="icon-user"></i> 设置 </a></div>
                </div>
            </div>
          </div>
        </div>
        <div class="col-md-9">
          <div class="panel panel-default">
            <div class="panel-body">
              @yield('header')
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection