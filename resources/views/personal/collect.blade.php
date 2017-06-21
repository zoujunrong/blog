@extends('layouts.app')

@section('content')
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
                  </ul>
                </div>
                
                <div class="media">
                  <div class="media-left">
                    <a href="#">
                      <img width="48px" class="media-object" src="{{ asset('images/favicon1.png') }}" alt="...">
                    </a>
                  </div>
                  <div class="media-body">
                    <h4 class="media-heading">Middle aligned media</h4>
                    <p>Cras sit amet nibh libero...</p>
                    
                  </div>
                </div>
                <hr/>
                <div class="media">
                  <div class="media-left">
                    <a href="#">
                      <img width="48px;" class="media-object" src="{{ asset('images/favicon1.png') }}" alt="...">
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

