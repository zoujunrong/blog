@extends('layouts.app')

@section('content')
@include('layouts.model.subject_create')
<style>
  .subject-img{  
    border:1px solid #ddd;
    width:65px;
  }
</style>
<div class="container">
    <div class="row">
        @include('personal.left')                
        <div class="col-md-8">
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
                      <button type="button" class="btn btn-success icon-edit" data-toggle="modal" data-target="#subject_create_model" title="创造一个新的能源"> 创建 </button>
                    </li>
                  </ul>
                </div>
                
                <div class="media">
                  <div class="media-left txt-center">
                    <a href="">
                      <img class="subject-img" src="{{ asset('images/tmp/ed6a56fb4693daef5ef73dcd.jpg') }}" alt="...">
                    </a>
                    <label class="label label-success">3K°</label>
                  </div>
                  <div class="media-body">
                    <p style="font-size:12px;color:gray;"><span>人工智能</span><span class="pull-right">刚刚</span></p>
                    <h4 class="media-heading"><a href="/doc" target="_blank">tensorflow 中文文档</a></h4>
                    <p>TensorFlow™ 是一个采用数据流图（data flow graphs），用于数值计算的开源软件库。节点（Nodes）在图中表示数学操作，图中的线（edges）则表示在节点间相互联系的多维数据数组，即张量（tensor）。<a class="icon-double-angle-down" href="#"> 展开</a></p>
                    <span class="label-daynamic"><a href="#">引用：34W</a></span>
                    <span class="label-daynamic"><a href="#">评论：34W</a></span>
                    <span class="label-daynamic"><a href="#">收藏：12</a></span>
                    <span class="label-daynamic"><a href="#">供电：34k°</a></span>

                  </div>

                </div>
                <hr/>
                <div class="media">
                  <div class="media-left txt-center">
                    <a href="">
                      <img class="subject-img" src="{{ asset('images/tmp/96ff1b2cccbff121dd368367.jpg') }}" alt="...">
                    </a>
                    <label class="label label-success">3K°</label>
                  </div>
                  <div class="media-body">
                    <p style="font-size:12px;color:gray;"><span>人工智能</span><span class="pull-right">刚刚</span></p>
                    <h4 class="media-heading"><a href="/doc" target="_blank">tensorflow 中文文档</a></h4>
                    <p>TensorFlow™ 是一个采用数据流图（data flow graphs），用于数值计算的开源软件库。节点（Nodes）在图中表示数学操作，图中的线（edges）则表示在节点间相互联系的多维数据数组，即张量（tensor）<a class="icon-double-angle-right" href="/doc"> 阅读</a></p>
                    <span class="label-daynamic"><a href="#">引用：34W</a></span>
                    <span class="label-daynamic"><a href="#">评论：34W</a></span>
                    <span class="label-daynamic"><a href="#">收藏：12</a></span>
                    <span class="label-daynamic"><a href="#">供电：34k°</a></span>

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

