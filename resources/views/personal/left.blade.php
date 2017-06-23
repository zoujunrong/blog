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
  .header-panel-footer span{
    display: inline-block;
    color:#808080;width: 50px;
    margin: 0px 5px;
  }
  .header-panel-footer span label{
    font-weight: bold;
    color:#000;
  }
</style>
<div class="col-md-3">
    <div class="panel panel-default center-block">
      <div style="text-align: center;padding: 20px 10px;"><a href="/profile" title="个人主页"><img class="img-circle" style="width:100px; cursor: pointer;"  src="{{ asset('images/favicon1.png') }}" alt="头像" data-toggle="tooltip" data-placement="top"></a>
        <h4><a href="/profile">zoujunrong</a></h4>
        <div>道欲道，学欲学。</div><br/>
        <div class="header-panel-footer"><span data-toggle="tooltip" data-placement="top" title="充电量（° 度）">充电 <label>23423</label></span><span data-toggle="tooltip" data-placement="top" title="供电量（° 度）">供电 <label>23333</label></span><span data-toggle="tooltip" data-placement="top" title="功率（W 瓦）">功率 <label>233</label></span></div>
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