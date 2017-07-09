@extends('layouts.app')

@section('content')
@include('layouts.model.subject_create')
<style type="text/css">
  .hr-devide{
    border-bottom: 1px solid #eee; padding: 5px 15px;
    font-size: 14px;font-weight: bold;color: #5cb85c;
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
                    <li role="presentation" class="active"><a href="#base-info">基本信息</a></li>
                    <li role="presentation"><a href="#edu-info">教育信息</a></li>
                    <li role="presentation"><a href="#">职业信息</a></li>
                    <li role="presentation"><a href="#">学习方向</a></li>
                    <li role="presentation"><a href="#">知识领域</a></li>
                    <li class="pull-right">
                      <button type="button" class="btn btn-success icon-edit" data-toggle="modal" data-target="#subject_create_model"> 修改 </button>
                    </li>
                  </ul>
                </div>
                <br/>
                <form class="form-horizontal">
                  <h4 class="hr-devide" id="base-info">基本信息</h4>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">账号</label>
                    <div class="col-sm-3">
                      <p class="form-control-static">email@example.com</p>
                    </div>
                    <label class="col-sm-1 control-label"><a href="#">修改</a></label>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">*昵称</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" placeholder="昵称">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword" class="col-sm-2 control-label">密码</label>
                    <div class="col-sm-4">
                      <input type="password" class="form-control" id="inputPassword" placeholder="Password">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">真实姓名</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control">
                    </div>
                    <div class="col-sm-2 col-sm-offset-2">
                      <select class="form-control">
                        <option value="">仅自己可见</option>
                        <option value="">所有人可见</option>
                        <option value="">组织成员可见</option>
                        <option value="">我关注的人可见</option>
                      </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">手机</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" placeholder="cellphone">
                    </div>
                    <div class="col-sm-2 col-sm-offset-2">
                      <select class="form-control">
                        <option value="">仅自己可见</option>
                        <option value="">所有人可见</option>
                        <option value="">组织成员可见</option>
                        <option value="">我关注的人可见</option>
                      </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">简介</label>
                    <div class="col-sm-5">
                      <textarea class="form-control"></textarea>
                    </div>
                  </div>

                  <h4 id="edu-info" class="hr-devide">教育信息</h4>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">学历</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" placeholder="cellphone">
                    </div>
                    <div class="col-sm-2 col-sm-offset-2">
                      <select class="form-control">
                        <option value="">仅自己可见</option>
                        <option value="">所有人可见</option>
                        <option value="">组织成员可见</option>
                        <option value="">我关注的人可见</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">学校</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" placeholder="cellphone">
                    </div>
                    <div class="col-sm-2 col-sm-offset-2">
                      <select class="form-control">
                        <option value="">仅自己可见</option>
                        <option value="">所有人可见</option>
                        <option value="">组织成员可见</option>
                        <option value="">我关注的人可见</option>
                      </select>
                    </div>
                  </div>

                </form>
                
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

