@extends('orgnazation.secondNav')  
  @section('header')
              <div class="bs-example" data-example-id="nav-tabs-with-dropdown">
                  <ul class="nav nav-tabs">
                    <li role="presentation" class="active"><a href="#">基本信息</a></li>
                    <li role="presentation"><a href="#">教育信息</a></li>
                    <li role="presentation"><a href="#">职业信息</a></li>
                    <li role="presentation"><a href="#">学习方向</a></li>
                    <li role="presentation"><a href="#">知识领域</a></li>
                    <li class="pull-right">
                      <button type="button" class="btn btn-success icon-edit" data-toggle="modal" data-target="#subject_create_model"> 创建 </button>
                    </li>
                  </ul>
                </div>
                <br/>
                <form class="form-horizontal">
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
                </form>
  @endsection
    
    
    
