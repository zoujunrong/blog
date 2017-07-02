@extends('orgnazation.secondNav')  
  @section('header')

              <div class="bs-example" data-example-id="nav-tabs-with-dropdown">
                <ul class="nav nav-tabs">
                  <li role="presentation" class="active"><a href="#">全部</a></li>
                  <li role="presentation"><a href="#">我的</a></li>
                  <li role="presentation" class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                      分类 <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                      <li><a href="#">Action</a></li>
                      <li><a href="#">Another action</a></li>
                      <li><a href="#">Something else here</a></li>
                      <li role="separator" class="divider"></li>
                      <li><a href="#">新增分类</a></li>
                    </ul>
                  </li>
                  <li class="pull-right">
                    <button type="button" class="btn btn-success icon-edit" data-toggle="modal" data-target="#subject_create_model" title="创造一块新的能源电池组"> 创造 </button>
                  </li>
                </ul>
              </div>

              <div class="media">
                  <div class="media-left txt-center">
                    <a href="">
                      <img width="65px" src="{{ asset('images/tmp/ed6a56fb4693daef5ef73dcd.jpg') }}" alt="...">
                    </a>
                    <label class="label label-default">未投稿</label>
                  </div>
                  <div class="media-body">
                    <h4 class="media-heading"><a href="/doc" target="_blank"> php 中文文档</a> <a href="/editor/doc" target="_blank" class="pull-right icon-edit"></a></h4>
                    <p>PHP，即“PHP: Hypertext Preprocessor”，是一种被广泛应用的开源通用脚本语言，尤其适用于 Web 开发并可嵌入 HTML 中去。它的语法利用了 C、Java 和 Perl，易于学习。该语言的主要目标是允许 web 开发人员快速编写动态生成的 web 页面，但 PHP 的用途远不只于此。</p>
                    <span class="label-daynamic">更新：刚刚</span>
                    <span class="label-daynamic">供电：1234k°</span>
                    <span class="label-daynamic">阅读：1234W</span>
                    <span class="label-daynamic">收藏：1234W</span>
                  </div>
                </div>
                <hr/>
                <div class="media">
                  <div class="media-left txt-center">
                    <a href="">
                      <img width="65px" src="{{ asset('images/tmp/96ff1b2cccbff121dd368367.jpg') }}" alt="...">
                    </a>
                    <label class="label label-success">已投稿</label>
                  </div>
                  <div class="media-body">
                    <h4 class="media-heading"><a href="/doc" target="_blank">tensorflow 中文文档</a> <a href="/editor/doc" target="_blank" class="pull-right icon-edit"></a></h4>
                    <p>TensorFlow™ 是一个采用数据流图（data flow graphs），用于数值计算的开源软件库。节点（Nodes）在图中表示数学操作，图中的线（edges）则表示在节点间相互联系的多维数据数组，即张量（tensor）。</p>
                    <span class="label-daynamic">更新：刚刚</span>
                    <span class="label-daynamic">供电：34k°</span>
                    <span class="label-daynamic">阅读：34W</span>
                    <span class="label-daynamic">收藏：12</span>
                  </div>
                </div>
                <hr/>
  @endsection
    
    
    
