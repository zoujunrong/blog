@extends('layouts.app')

@section('content')
@include('layouts.model.subject_create')
<style type="text/css">
  .label-daynamic{
    color: #8a8888;margin-right: 20px;
  }
</style>
<div class="container">
    <div class="row">
        @include('personal.left')                
        <div class="col-md-6">
          <div class="row">

            
            <div class="panel panel-default">
              
              <div class="panel-body">
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

              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">最近打开</div>

                    <div class="panel-body">
                        <div class="media">
                          <div class="media-left">
                            <a href="#">
                              <img width="36px" class="media-object" src="{{ asset('images/favicon1.png') }}" alt="...">
                            </a>
                          </div>
                          <div class="media-body">
                            <h5 class="media-heading">Zoujunronge e <button type="button" class="btn btn-default btn-xs icon-plus pull-right"> 订阅</button></h5>
                            <p>Cras sit amet nibh ertr rxc...</p>
                          </div>
                        </div>
                        <div class="media">
                          <div class="media-left">
                            <a href="#">
                              <img width="36px" class="media-object" src="{{ asset('images/favicon1.png') }}" alt="...">
                            </a>
                          </div>
                          <div class="media-body">
                            <h5 class="media-heading">Zoujunronge e <button type="button" class="btn btn-default btn-xs icon-plus pull-right"> 订阅</button></h5>
                            <p>Cras sit amet nibh...</p>
                          </div>
                        </div>
                        <div class="media">
                          <div class="media-left">
                            <a href="#">
                              <img width="36px" class="media-object" src="{{ asset('images/favicon1.png') }}" alt="...">
                            </a>
                          </div>
                          <div class="media-body">
                            <h5 class="media-heading">Zoujunronge e <button type="button" class="btn btn-default btn-xs icon-plus pull-right"> 订阅</button></h5>
                            <p>Cras sit amet nibh...</p>
                          </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">推荐组织 <a href="#" class="pull-right"> 更多</a> <span class="pull-right">&nbsp;|&nbsp;</span><a href="#" class="pull-right"> 换一批</a></div>

                    <div class="panel-body">
                        <div class="media">
                          <div class="media-left">
                            <a href="#">
                              <img width="36px" class="media-object" src="{{ asset('images/favicon1.png') }}" alt="...">
                            </a>
                          </div>
                          <div class="media-body">
                            <h5 class="media-heading">Zoujunronge e <button type="button" class="btn btn-default btn-xs icon-plus pull-right"> 订阅</button></h5>
                            <p>Cras sit amet nibh...</p>
                          </div>
                        </div>
                        <div class="media">
                          <div class="media-left">
                            <a href="#">
                              <img width="36px" class="media-object" src="{{ asset('images/favicon1.png') }}" alt="...">
                            </a>
                          </div>
                          <div class="media-body">
                            <h5 class="media-heading">Zoujunronge e <button type="button" class="btn btn-default btn-xs icon-plus pull-right"> 订阅</button></h5>
                            <p>Cras sit amet nibh...</p>
                          </div>
                        </div>
                        <div class="media">
                          <div class="media-left">
                            <a href="#">
                              <img width="36px" class="media-object" src="{{ asset('images/favicon1.png') }}" alt="...">
                            </a>
                          </div>
                          <div class="media-body">
                            <h5 class="media-heading">Zoujunronge e <button type="button" class="btn btn-default btn-xs icon-plus pull-right"> 订阅</button></h5>
                            <p>Cras sit amet nibh...</p>
                          </div>
                        </div>
                    </div>
                </div>
        </div>
                    
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">引用</h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(function () {
    $('[data-toggle="popover"]').popover();
    $('[data-toggle="popover"]').on('mouseover', function(){
      $(this).popover('show');
    }).on('mouseout', function(){
      $(this).popover('hide');
    })
    $('[data-toggle="tooltip"]').tooltip();
  })
</script>
@endsection

