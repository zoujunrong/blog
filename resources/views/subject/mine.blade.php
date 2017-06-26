@extends('layouts.app')

@section('content')
@include('layouts.model.subject_create')
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
                      <button type="button" class="btn btn-success icon-edit" data-toggle="modal" data-target="#subject_create_model"> 新建 </button>
                    </li>
                  </ul>
                </div>
                
                <div class="media">
                  <div class="media-left">
                    <a href="">
                      <img width="65px" src="{{ asset('images/tmp/ed6a56fb4693daef5ef73dcd.jpg') }}" alt="...">
                    </a>
                  </div>
                  <div class="media-body">
                    <h4 class="media-heading"><a href="/doc" target="_blank">php 中文文档</a> <a href="/editor/doc" target="_blank" class="pull-right icon-edit"></a></h4>
                    <p>PHP，即“PHP: Hypertext Preprocessor”，是一种被广泛应用的开源通用脚本语言，尤其适用于 Web 开发并可嵌入 HTML 中去。它的语法利用了 C、Java 和 Perl，易于学习。该语言的主要目标是允许 web 开发人员快速编写动态生成的 web 页面，但 PHP 的用途远不只于此。</p>
                    
                  </div>
                </div>
                <hr/>
                <div class="media">
                  <div class="media-left">
                    <a href="">
                      <img width="65px" src="{{ asset('images/tmp/96ff1b2cccbff121dd368367.jpg') }}" alt="...">
                    </a>
                  </div>
                  <div class="media-body">
                    <h4 class="media-heading"><a href="/doc" target="_blank">tensorflow 中文文档</a> <a href="/editor/doc" target="_blank" class="pull-right icon-edit"></a></h4>
                    <p>TensorFlow™ 是一个采用数据流图（data flow graphs），用于数值计算的开源软件库。节点（Nodes）在图中表示数学操作，图中的线（edges）则表示在节点间相互联系的多维数据数组，即张量（tensor）。</p>
                    
                  </div>
                </div>
                <hr/>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">最近打开</div>

                    <div class="panel-body">
                        <div class="media">
                          <div class="media-body">
                            <h5 class="media-heading"><a class="icon-edit" href="#"> php 中文文档</a></h5>
                            <h5 class="media-heading"><a class="icon-folder-open-alt" href="#"> tensorflow 中文文档</a></h5>
                            <h5 class="media-heading"><a class="icon-folder-open-alt" href="#"> jquery在线手册</a></h5>
                            <h5 class="media-heading"><a class="icon-edit" href="#"> bootstrap 中文文档</a></h5>
                          </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">推荐专栏 <a href="#" class="pull-right"> 更多</a> <span class="pull-right">&nbsp;|&nbsp;</span><a href="#" class="pull-right"> 换一批</a></div>

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

