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
                  <div class="media-left text-center">
                    <a href="#" data-toggle="popover" title="Dismissible popover" data-content="And here's some amazing content. It's very engaging. Right?">
                      <img width="48px" class="img-circle" src="http://upload.jianshu.io/collections/images/279834/1473388229.jpg?imageMogr2/auto-orient/strip|imageView2/1/w/240/h/240" alt="...">
                    </a>
                    <span class="label label-default">专题</span>
                  </div>
                  <div class="media-body">
                    <div class="row"><span class="col-md-10">人工智能</span><span class="col-md-2 pull-right">刚刚</span></div>
                    <h4><a href="/doc" target="_blank">如何使用深度学习重建高分辨率音频？</a></h4>
                    <p>机器人圈」导览：关于高分辨率音频的炫酷想必大家都清楚，那么管如何构建呢？物理博士Jeffrey Hetherly在受到深度学习成功应用于图像超分辨率的启发后，开始使用深度神经网络在这一领域探索，下面就和机器人圈一起来学习一下吧。<a class="icon-double-angle-down" href="http://mp.weixin.qq.com/s?src=3&timestamp=1498400942&ver=1&signature=03fn-njMA86IJDUqXKfESWNqLKF7upPf3dImAJFl*Z9SEwDFlLCRnBVjXMZ*sJrM9Hva7sVIXKBTqJpuePCG4U0ljspTe1qQPZ4KkkWWYCJ7na-QBRtnuz4vfV2v14iF4pATxq7nlxG0f9na895s9pWNyPcsjYfjDw6hrDwQFno="> 全文</a></p>

                    <div class="row">
                      <span class="col-md-4">
                        <a href="#" class="thumbnail">
                          <img src="//upload-images.jianshu.io/upload_images/1950577-98f475c00a46ea69.jpg?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240" />
                        </a>
                      </span>
                      <span class="col-md-4">
                        <a href="#" class="thumbnail">
                          <img src="//upload-images.jianshu.io/upload_images/188908-1abaa0f397a52175.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240" />
                        </a>
                      </span>
                      <span class="col-md-4">
                        <a href="#" class="thumbnail">
                          <img src="//upload-images.jianshu.io/upload_images/188908-c0d2aa9aa12919c0.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240" />
                        </a>
                      </span>
                    </div>
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
                  <div class="media-left text-center">
                    <a href="#" data-toggle="popover" title="Dismissible popover" data-content="And here's some amazing content. It's very engaging. Right?">
                      <img width="48px" class="img-circle" src="//upload.jianshu.io/users/upload_avatars/1415547/d358b4661b26?imageMogr2/auto-orient/strip|imageView2/1/w/144/h/144" alt="...">
                    </a>
                    <span class="label label-default">专题</span>
                  </div>
                  <div class="media-body">
                    <div class="row"><span class="col-md-10">人工智能</span><span class="col-md-2 pull-right">10分钟</span></div>
                    <h4><a href="/doc" target="_blank">学习函数——将命令打包</a></h4>
                    <p>在上一节中，小Ian已经熟悉了使用命令来解决一些简单的编程挑战。虽然只是在Playground中将moveFoward()、collectGem()、toggleSwitch()这些简单的命令进行组合并执行，但看得出，在每一次完成一项编程挑战游戏的过程中，孩子的编程思维也正被逐渐地构建起来。而在这一节里，我们将介绍编程学习中另一个重要工具——函数。<a class="icon-double-angle-down" href="http://www.jianshu.com/p/e04ec74ceb4a"> 全文</a></p>
                    <div class="row">
                      <span class="col-md-4">
                        <a href="#" class="thumbnail">
                          <img src="//upload-images.jianshu.io/upload_images/1950577-98f475c00a46ea69.jpg?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240" />
                        </a>
                      </span>
                      <span class="col-md-4">
                        <a href="#" class="thumbnail">
                          <img src="//upload-images.jianshu.io/upload_images/188908-1abaa0f397a52175.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240" />
                        </a>
                      </span>
                      <span class="col-md-4">
                        <a href="#" class="thumbnail">
                          <img src="//upload-images.jianshu.io/upload_images/188908-c0d2aa9aa12919c0.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240" />
                        </a>
                      </span>
                    </div>
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
                    <a href="#" data-toggle="popover" title="Dismissible popover" data-content="And here's some amazing content. It's very engaging. Right?">
                      <img width="48px" class="img-circle" src="http://upload.jianshu.io/collections/images/279834/1473388229.jpg?imageMogr2/auto-orient/strip|imageView2/1/w/240/h/240" alt="..."><span class="label label-default">&nbsp;专&nbsp;题&nbsp;</span>
                    </a>
                  </div>
                  <div class="media-body">
                    <div class="row"><span class="col-md-10">人工智能</span><span class="col-md-2 pull-right">10天前</span></div>
                    <h4><a href="/doc" target="_blank">学习命令——像计算机一样思考</a></h4>
                    <p>这篇文章是“为孩子写一本编程书”连载中的第三篇文章。上一篇《学习编程从“玩”开始》中谈了如何引导孩子学习编程，以及开始之前的准备工作，有兴趣的读者可以参考。 我们已经做好了学<a class="icon-double-angle-down" href="http://upload-images.jianshu.io/upload_images/1399853-dae5bfb181017486.png?imageMogr2/auto-orient/strip|imageView2/1/w/150/h/120"> 全文</a></p>

                    <div class="row">
                      <span class="col-md-4">
                        <a href="#" class="thumbnail">
                          <img src="//upload-images.jianshu.io/upload_images/1950577-98f475c00a46ea69.jpg?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240" />
                        </a>
                      </span>
                      <span class="col-md-4">
                        <a href="#" class="thumbnail">
                          <img src="//upload-images.jianshu.io/upload_images/188908-1abaa0f397a52175.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240" />
                        </a>
                      </span>
                      <span class="col-md-4">
                        <a href="#" class="thumbnail">
                          <img src="//upload-images.jianshu.io/upload_images/188908-c0d2aa9aa12919c0.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240" />
                        </a>
                      </span>
                    </div>
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
                    <a href="#" data-toggle="popover" title="Dismissible popover" data-content="And here's some amazing content. It's very engaging. Right?">
                      <img width="48px" class="img-circle" src="//upload.jianshu.io/collections/images/22657/Img220657988.jpg?imageMogr2/auto-orient/strip|imageView2/1/w/144/h/144" alt="..."><span class="label label-default">&nbsp;专&nbsp;题&nbsp;</span>
                    </a>
                  </div>
                  <div class="media-body">
                    <div class="row"><span class="col-md-10">人工智能</span><span class="col-md-2 pull-right">10天前</span></div>
                    <h4><a href="/doc" target="_blank">如何使用深度学习重建高分辨率音频？</a></h4>
                    <p>机器人圈」导览：关于高分辨率音频的炫酷想必大家都清楚，那么管如何构建呢？物理博士Jeffrey Hetherly在受到深度学习成功应用于图像超分辨率的启发后，开始使用深度神经网络在这一领域探索，下面就和机器人圈一起来学习一下吧。<a class="icon-double-angle-down" href="http://mp.weixin.qq.com/s?src=3&timestamp=1498400942&ver=1&signature=03fn-njMA86IJDUqXKfESWNqLKF7upPf3dImAJFl*Z9SEwDFlLCRnBVjXMZ*sJrM9Hva7sVIXKBTqJpuePCG4U0ljspTe1qQPZ4KkkWWYCJ7na-QBRtnuz4vfV2v14iF4pATxq7nlxG0f9na895s9pWNyPcsjYfjDw6hrDwQFno="> 全文</a></p>

                    <div class="row">
                      <span class="col-md-4">
                        <a href="#" class="thumbnail">
                          <img src="//upload-images.jianshu.io/upload_images/1950577-98f475c00a46ea69.jpg?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240" />
                        </a>
                      </span>
                      <span class="col-md-4">
                        <a href="#" class="thumbnail">
                          <img src="//upload-images.jianshu.io/upload_images/188908-1abaa0f397a52175.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240" />
                        </a>
                      </span>
                      <span class="col-md-4">
                        <a href="#" class="thumbnail">
                          <img src="//upload-images.jianshu.io/upload_images/188908-c0d2aa9aa12919c0.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240" />
                        </a>
                      </span>
                    </div>
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
                    <a href="#" data-toggle="popover" title="Dismissible popover" data-content="And here's some amazing content. It's very engaging. Right?">
                      <img width="48px" class="img-circle" src="//upload.jianshu.io/collections/images/1931/135040.61491772.jpg?imageMogr2/auto-orient/strip|imageView2/1/w/144/h/144" alt="..."><span class="label label-default">&nbsp;专&nbsp;题&nbsp;</span>
                    </a>
                  </div>
                  <div class="media-body">
                    <div class="row"><span class="col-md-10">人工智能</span><span class="col-md-2 pull-right">10天前</span></div>
                    <h4><a href="/doc" target="_blank">如何使用深度学习重建高分辨率音频？</a></h4>
                    <p>机器人圈」导览：关于高分辨率音频的炫酷想必大家都清楚，那么管如何构建呢？物理博士Jeffrey Hetherly在受到深度学习成功应用于图像超分辨率的启发后，开始使用深度神经网络在这一领域探索，下面就和机器人圈一起来学习一下吧。<a class="icon-double-angle-down" href="http://mp.weixin.qq.com/s?src=3&timestamp=1498400942&ver=1&signature=03fn-njMA86IJDUqXKfESWNqLKF7upPf3dImAJFl*Z9SEwDFlLCRnBVjXMZ*sJrM9Hva7sVIXKBTqJpuePCG4U0ljspTe1qQPZ4KkkWWYCJ7na-QBRtnuz4vfV2v14iF4pATxq7nlxG0f9na895s9pWNyPcsjYfjDw6hrDwQFno="> 全文</a></p>

                    <div class="row">
                      <span class="col-md-4">
                        <a href="#" class="thumbnail">
                          <img src="//upload-images.jianshu.io/upload_images/1950577-98f475c00a46ea69.jpg?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240" />
                        </a>
                      </span>
                      <span class="col-md-4">
                        <a href="#" class="thumbnail">
                          <img src="//upload-images.jianshu.io/upload_images/188908-1abaa0f397a52175.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240" />
                        </a>
                      </span>
                      <span class="col-md-4">
                        <a href="#" class="thumbnail">
                          <img src="//upload-images.jianshu.io/upload_images/188908-c0d2aa9aa12919c0.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240" />
                        </a>
                      </span>
                    </div>
                    <div class="row">
                      <span class="col-md-3"><a href="#" method="post" title="引用" class="icon-quote-left" data-toggle="modal" data-target="#myModal"> 534k</a></span>
                      <span class="col-md-3"><a href="javascript:void(0);" title="收藏" class="icon-folder-open-alt"> </a></span>
                      <span class="col-md-3"><a href="javascript:void(0);"  title="评论" class="icon-comment-alt"> </a></span>
                      <span class="col-md-3"><a href="javascript:void(0);" title="阅读" class="icon-eye-open"> 3454k</a></span>
                    </div>
                  </div>
                </div>
                <hr/>

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
                              <img width="36px" class="img-circle" src="//upload.jianshu.io/users/upload_avatars/4105511/9d387f167dc4?imageMogr2/auto-orient/strip|imageView2/1/w/96/h/96" alt="...">
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
                              <img width="36px" class="img-circle" src="//upload.jianshu.io/users/upload_avatars/113479/3e1f96720ff8.JPG?imageMogr2/auto-orient/strip|imageView2/1/w/96/h/96" alt="...">
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
                              <img width="36px" class="img-circle" src="{{ asset('images/favicon1.png') }}" alt="...">
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
                              <img width="36px" class="img-circle" src="//upload.jianshu.io/users/upload_avatars/4171107/4e91e36376a6.jpg?imageMogr2/auto-orient/strip|imageView2/1/w/96/h/96" alt="...">
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
                              <img width="36px" class="img-circle" src="//upload.jianshu.io/users/upload_avatars/530449/adef2ba9e0cc.jpg?imageMogr2/auto-orient/strip|imageView2/1/w/96/h/96" alt="...">
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
                              <img width="36px" class="img-circle" src="//upload.jianshu.io/users/upload_avatars/1950577/86457b78-6b63-4ecc-84e4-8ec86987e90c.jpg?imageMogr2/auto-orient/strip|imageView2/1/w/96/h/96" alt="...">
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

