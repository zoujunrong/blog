@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">登录</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">账号</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" placeholder="邮箱或手机" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">密码</label>

                            <div class="col-md-6">
                                <input id="password" type="password" placeholder="密码" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group" style="display: none;">
                            <label for="captcha" class="col-md-4 control-label">验证码</label>
                            <div class="col-md-6">
                                <label onclick="javascript:re_captcha();"><input type="text" class="form-control" name="captcha"></label>
                                <label>{!! captcha_img() !!}</label>
                            </div>
                        </div>
                        <script>  
                          function re_captcha() {
                            $url = "{{ URL('captcha/default') }}";
                                $url = $url + "?" + Math.random();
                                document.getElementById('c2c98f0de5a04167a9e427d883690ff6').src=$url;
                          }
                        </script>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <label>
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> 记住我
                                </label>
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    忘记密码?
                                </a>
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    注册
                                </a>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    登录
                                </button>
                                <label title="手机验证码登录"><span class="btn glyphicon glyphicon-phone"></span></label>
                                <label title="微信登录">
                                  <span class="btn glyphicon glyphicon-envelope"></span>
                                </label>
                                <label title="github账号登录">
                                  <span class="btn glyphicon glyphicon-cloud"></span>
                                </label>
                                <label title="QQ账号登录">
                                  <span class="btn glyphicon glyphicon-qrcode"></span>
                                </label>
                                
                            </div>
                        </div>

                    </form>
                    

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
