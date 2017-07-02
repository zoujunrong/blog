@extends('orgnazation.secondNav')  
  @section('header')
              <div class="bs-example" data-example-id="nav-tabs-with-dropdown">
                  <ul class="nav nav-tabs">
                    <li role="presentation" class="active"><a href="#">全部</a></li>
                    <li role="presentation"><a href="#">已订阅</a></li>
                    <li role="presentation"><a href="#">已审核</a></li>
                    <li role="presentation"><a href="#">待审核</a></li>
                    <li class="pull-right">
                      <button type="button" class="btn btn-success icon-edit" data-toggle="modal" data-target="#subject_create_model"> 开通专栏 </button>
                    </li>
                  </ul>
                </div>
                
                <div class="media">
                  <div class="media-left">
                    <a href="/column/profile">
                      <img width="48px" class="img-circle" src="https://pic2.zhimg.com/ec7c6dcab134dcaaac8eab5367a2f42d_xl.jpg" alt="...">
                    </a>
                  </div>
                  <div class="media-body">
                    <h4 class="media-heading"><a href="/doc" target="_blank">工程师侃汽车行业</a><span class="pull-right" title="今日供电1234度" style="font-size: 12px;font-weight: bold;">1234°</span></h4>
                    <p>从零开始设计纯电动车动力系统</p>
                    <span class="label-daynamic">更新：刚刚</span>
                    <span class="label-daynamic">总供电：1234k°</span>
                    <span class="label-daynamic">订阅量：1234W</span>
                    
                  </div>
                </div>
                <hr/>
                <div class="media">
                  <div class="media-left">
                    <a href="/column/profile">
                      <img width="48px" class="img-circle" src="https://pic2.zhimg.com/bed1688c7c00827028513ee149d4dc65_xl.jpeg" alt="...">
                    </a>
                  </div>
                  <div class="media-body">
                    <h4 class="media-heading"><a href="/doc" target="_blank">心理碎片</a><span class="pull-right" title="今日供电1663度" style="font-size: 12px;font-weight: bold;">1663°</span></h4>
                    <p>在我们风头正劲的时候，做事是不是也会更顺利呢?</p>
                    <span class="label-daynamic">更新：刚刚</span>
                    <span class="label-daynamic">总供电：1234k°</span>
                    <span class="label-daynamic">订阅量：1234W</span>
                  </div>
                </div>
                <hr/>
                <div class="media">
                  <div class="media-left">
                    <a href="/column/profile">
                      <img width="48px" class="img-circle" src="http://a1.mzstatic.com/us/r30/Purple6/v4/a8/d0/8e/a8d08eec-4e93-cab1-0482-a6a236c00d30/icon.512x512-75.png" alt="...">
                    </a>
                  </div>
                  <div class="media-body">
                    <h4 class="media-heading"><a href="/doc" target="_blank">php有关的那些事</a><span class="pull-right" title="今日供电134度" style="font-size: 12px;font-weight: bold;">134°</span></h4>
                    <p>PHP（外文名:PHP: Hypertext Preprocessor，中文名：“超文本预处理器”）是一种通用开源脚本语言</p>
                    <span class="label-daynamic">更新：刚刚</span>
                    <span class="label-daynamic">总供电：1234k°</span>
                    <span class="label-daynamic">订阅量：1234W</span>
                  </div>
                </div>
                <hr/>
                <div class="media">
                  <div class="media-left">
                    <a href="/column/profile">
                      <img width="48px" class="img-circle" src="https://pic1.zhimg.com/0264a22c3aa2093f40b58efb38dfbb64_xl.jpg" alt="...">
                    </a>
                  </div>
                  <div class="media-body">
                    <h4 class="media-heading"><a href="/doc" target="_blank">聊聊这个世界</a><span class="pull-right" title="今日供电234度" style="font-size: 12px;font-weight: bold;">234°</span></h4>
                    
                    <p>有时候是生产，还是消费，取决于执念有时候是生产，还是消费，取决于执念有时候是生产，还是消费，取决于执念</p>
                    <span class="label-daynamic">更新：刚刚</span>
                    <span class="label-daynamic">总供电：1234k°</span>
                    <span class="label-daynamic">订阅量：1234W</span>
                  </div>
                </div>
  @endsection
    
    
    
