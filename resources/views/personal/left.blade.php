<style type="text/css">
  .glaph-button {
    height: 40px;
    width: 100%;
    background-color: #fff;
    border: 0px;
    display:table;
  }
  .glaph-button:hover,.active{
    background-color: #eee;
  }
  .glaph-button a{
    vertical-align:middle;    
    display:table-cell;
    text-decoration-line: none;
    color:#000;
  }
</style>
<div class="col-md-3">
    <div class="panel panel-default center-block">
      <div style="text-align: center;padding: 20px 10px;"><a href="#" title="修改个人资料"><img class="img-circle" style="width:100px; cursor: pointer;"  src="{{ asset('images/favicon1.png') }}" alt="头像" data-toggle="tooltip" data-placement="top"></a>
        <h4>zoujunrong</h4>
        <div>道欲道，学欲学。</div><br/>
        <div><span class="icon-adjust icon-large" data-toggle="tooltip" data-placement="top" title="充电量"> 23423</span>&nbsp;&nbsp; | &nbsp;&nbsp;<span class="icon-lightbulb icon-large" data-toggle="tooltip" data-placement="top" title="供电量"> 233</span></div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-body" style="padding:0px 15px;">
          <div class="row">
            <div class="col-md-4 glaph-button {{ Request::is('home') ? 'active' : '' }}"><a href="/home"><i class="icon-home"></i> 动态</a></div>
            <div class="col-md-4 glaph-button {{ Request::is('subject/*') ? 'active' : '' }}"><a href="/subject/mine"><i class="icon-book"></i> 专题 <span class="badge">14</span></a></div>
            <div class="col-md-4 glaph-button {{ Request::is('column/*') ? 'active' : '' }}"><a href="/column/mine"><i class="icon-reorder"></i> 专栏 </a></div>
            <div class="col-md-4 glaph-button {{ Request::is('orgnazation/*') ? 'active' : '' }}"><a href="/orgnazation/mine"><i class="icon-group"></i> 组织 </a></div>
            <div class="col-md-4 glaph-button {{ Request::is('settings') ? 'active' : '' }}"><a href="/settings"><i class="icon-cogs"></i> 设置 </a></div>
          </div>
      </div>
    </div>
          
</div>