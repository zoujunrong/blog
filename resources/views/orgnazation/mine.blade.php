@extends('layouts.app')

@section('content')
@include('layouts.model.subject_create')
<style type="text/css">
  .thumbnail {
    text-align: center;padding:20px 5px 5px 5px;
  }
</style>
<div class="container">
    <div class="row">
        @include('personal.left')                
        <div class="col-md-9">
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
                        <li><a href="#">分类一</a></li>
                        <li><a href="#">分类二</a></li>
                        <li><a href="#">分类三</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">新增分类</a></li>
                      </ul>
                    </li>
                    <li class="pull-right">
                      <button type="button" class="btn btn-success icon-edit" data-toggle="modal" data-target="#subject_create_model"> 创建 </button>
                    </li>
                  </ul>
                </div>
                <br/>
                <div class="row">
                  <div class="col-sm-6 col-md-3">
                    <div class="thumbnail">
                      <a href="/orgnazation/profile">
                      <img width="48px" class="img-circle" src="http://a0.att.hudong.com/61/92/20300543009208143927926724222_s.jpg" alt="...">
                      </a>
                        <h4>bootstrap</h4>
                        <p>官方提供的学习区域</p>
                    </div>
                  </div>
                  <div class="col-sm-6 col-md-3">
                    <div class="thumbnail">
                      <a href="/orgnazation/profile">
                      <img width="48px" class="img-circle" src="http://a1.mzstatic.com/us/r30/Purple6/v4/a8/d0/8e/a8d08eec-4e93-cab1-0482-a6a236c00d30/icon.512x512-75.png" alt="...">
                      </a>
                        <h4>PHP</h4>
                        <p>世界上最好的语言</p>
                    </div>
                  </div>
                  <div class="col-sm-6 col-md-3">
                    <div class="thumbnail">
                      <a href="/orgnazation/profile">
                      <img width="48px" class="img-circle" src="http://img.25pp.com/ppnews/zixun_img/1f6/41e/1465357524362467.jpg" alt="...">
                      </a>
                        <h4>tensorflow</h4>
                        <p>包含学习文档，案例，以及学习心得</p>
                    </div>
                  </div>
                  <div class="col-sm-6 col-md-3">
                    <div class="thumbnail">
                      <a href="/orgnazation/profile">
                      <img width="48px" class="img-circle" src="http://a0.att.hudong.com/61/92/20300543009208143927926724222_s.jpg" alt="...">
                      </a>
                        <h4>bootstrap</h4>
                        <p>官方提供的学习区域</p>
                    </div>
                  </div>
                  <div class="col-sm-6 col-md-3">
                    <div class="thumbnail">
                      <a href="/orgnazation/profile">
                      <img width="48px" class="img-circle" src="http://static.freepik.com/free-photo/add-more_318-26693.jpg" alt="...">
                      </a>
                        <h4>添加新组织</h4>
                        <p>官方提供的学习区域</p>
                    </div>
                  </div>
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

