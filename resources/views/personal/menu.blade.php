<style type="text/css">
  .panel{margin-bottom: 10px;}
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
  .attention{
    background-color: #fff;border:none;border-bottom: 1px solid silver;border-right: 1px solid silver;padding:3px 10px;outline:none;
  }
  .attention:hover{
    background-color: #eee;
  }
  .attention:active{
    background-color: #ddd;
  }
  .huan-label-info{
    background-color: #ff5b36;color:#fff;margin:0px;padding:2px 5px;
  }
</style>
<div class="col-md-3">
    <div class="panel panel-default center-block">
      @if ( Request::is('profile') )
      <button type="button" class="attention"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> 关注</button>
      @endif
      <div style="text-align: center;padding: 20px 10px;">
      <a href="/profile" title="个人主页"><img class="img-circle" style="width:100px;height: 100px; cursor: pointer;"  src="http://upload.jianshu.io/collections/images/279834/1473388229.jpg?imageMogr2/auto-orient/strip|imageView2/1/w/240/h/240" alt="头像" data-toggle="tooltip" data-placement="top"></a>
        <h4><a href="/profile">zoujunrong</a></h4>
        <div>道欲道，学欲学。</div><br/>
        <div class="header-panel-footer"><span data-toggle="tooltip" data-placement="top" title="充电量（° 度）">老师 <label>23423</label></span><span data-toggle="tooltip" data-placement="top" title="供电量（° 度）">学生 <label>23333</label></span><span data-toggle="tooltip" data-placement="top" title="功率（W 瓦）">影响力 <label>233</label></span></div>
      </div>
    </div>
    
    @if ( Request::is('home') )
    <div class="panel panel-default">
      <div class="panel-body" style="padding:0px 15px;">
          <div class="row">
            <div class="col-md-4 glaph-button {{ Request::is('home') ? 'active' : '' }}"><a href="/home"><i class="icon-home"></i> 动态 <span class="badge"></span></a></div>
            <div class="col-md-4 glaph-button {{ Request::is('subject/*') ? 'active' : '' }}"><a href="/subject/mine"><i class="icon-book"></i> 我的知识库 <span class="badge">14</span></a></div>
            <div class="col-md-4 glaph-button {{ Request::is('column/*') ? 'active' : '' }}"><a href="/column/mine"><i class="icon-reorder"></i> 我的订阅 </a></div>
            <div class="col-md-4 glaph-button {{ Request::is('orgnazation/*') ? 'active' : '' }}"><a href="/orgnazation/mine"><i class="icon-group"></i> 我的阅读 <span class="badge">5</span></a></div>
            <div class="col-md-4 glaph-button {{ Request::is('home/baseinfo') ? 'active' : '' }}"><a href="/home/baseinfo"><i class="icon-cogs"></i> 基本资料 </a></div>
          </div>
      </div>
    </div>
    @elseif ( Request::is('profile') )
    <div class="panel panel-default" style="padding:0px">
      <b class="huan-label-info">14</b>
      <div class="panel-body" style="padding:0px">
        <div class="row" id="chart">
        </div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
              <p><a href="#">环境科学</a>、<a href="#">环境化学</a></p>
              <p>归属: <a href="#">南昌大学环境与化学工程学院</a></p>
              <p>职位: <a href="#">工学教授</a></p>
              <p>学历: <a href="#">上海交通大学博士</a></p>
            </div>
          </div>
      </div>
    </div>
    @endif
    </div>
          
</div>
<script src="{{ asset('js/statistic_graph.js') }}"></script>
<script type="text/javascript">
  $(function(){
  $('#chart').radarChart({
    size: [280, 250],
    step: 1,
    title: "涉及领域",
    values: {
      "经济学(4.1)": 4.1,
      "金融学(3.5)": 3.5,
      "历史学(4)": 4,
      "数学(3)": 3,
      "海洋科学(2.5)": 2.5,
      "心理学(13.5)": 13.5,
    },
    showAxisLabels: false
  });
});


</script>