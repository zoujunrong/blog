@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        @include('personal.left')
        <div class="col-md-6">
          <div class="row">
            <div class="panel panel-default">
              <div class="panel-heading" style="background-color: #fff;">
                <div class="row">
                  <div class="col-md-2"><span class="icon-home" style="line-height: 32px;"> 动态</span></div>
                  <div class="col-md-5"></div>
                  <div class="col-md-5">
                    <div class="btn-group pull-right" role="group">
                      <button type="button" class="btn btn-success dropdown-toggle icon-edit" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 新建 
                        <span class="caret"></span>
                      </button>
                      <ul class="dropdown-menu">
                        <li><a href="/editor/doc" target="_blank" class="icon-file-alt"> 文档</a></li>
                        <li><a href="#" class="icon-book"> 专题</a></li>
                        <li><a href="#" class="icon-reorder"> 专栏</a></li>
                        <li><a href="#" class="icon-group"> 组织</a></li>
                      </ul>
                    </div>

                  </div>
                </div>

              </div>
              <div class="panel-body">
                <div class="media">
                  <div class="media-left">
                    <a href="#" data-toggle="popover" title="Dismissible popover" data-content="And here's some amazing content. It's very engaging. Right?">
                      <img width="48px" class="media-object" src="{{ asset('images/favicon1.png') }}" alt="..."><span class="label label-default">&nbsp;专&nbsp;题&nbsp;</span>
                    </a>
                  </div>
                  <div class="media-body">
                    <div class="row"><span class="col-md-10">人工智能人工智能人工智能</span><span class="col-md-2 pull-right">10天前</span></div>
                    <h4>Middle aligned media</h4>
                    <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
                    <p>Donec sed odio dui. Nullam quis risus eget urna mollis ornare vel eu leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. <a class="icon-double-angle-down" href="#"> 全文</a></p>
                    <div class="row">
                      <span class="col-md-3"><a href="#" method="post" title="引用" class="icon-quote-left" data-toggle="modal" data-target="#myModal"> 534k</a></span>
                      <span class="col-md-3"><a href="javascript:void(0);" title="收藏" class="icon-folder-open-alt"> </a></span>
                      <span class="col-md-3"><a href="javascript:void(0);"  title="评论" class="icon-comment-alt"> </a></span>
                      <span class="col-md-3"><a href="javascript:void(0);" title="阅读" class="icon-eye-open"> 3454k</a></span>
                    </div>
                  </div>
                </div>
                <hr/>
                <div class="media">
                  <div class="media-left">
                    <a href="#">
                      <img width="48px" class="media-object" src="{{ asset('images/favicon1.png') }}" alt="..."><span class="label label-info">&nbsp;100k&nbsp;</span>
                    </a>
                  </div>
                  <div class="media-body">
                    <h4 class="media-heading">Middle aligned media</h4>
                    <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
                    <p>Donec sed odio dui. Nullam quis risus eget urna mollis ornare vel eu leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                  </div>
                </div>
                <hr/>
                <div class="media">
                  <div class="media-left">
                    <a href="#">
                      <img width="48px;" class="media-object" src="{{ asset('images/favicon1.png') }}" alt="..."><span class="label label-success">&nbsp;组 织&nbsp;</span>
                    </a>
                  </div>
                  <div class="media-body">
                    <h4 class="media-heading">Middle aligned media</h4>
                    <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
                    <p>Donec sed odio dui. Nullam quis risus eget urna mollis ornare vel eu leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">推荐专栏<a href="#" class="pull-right"> 更多</a> <span class="pull-right">&nbsp;|&nbsp;</span><a href="#" class="pull-right"> 换一批</a></div>

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

