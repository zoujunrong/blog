@extends('layouts.app')
@section('content')
<link href="{{ asset('css/body-penel.css') }}" rel="stylesheet">
<div class="container">
    <div class="row">
        <div class="col-md-7 col-md-offset-1">
          <div class="row">
            <div class="panel panel-default">
              <div class="panel-heading" style="background-color: #fff;">
                <div class="row">
                  <div class="col-xs-3 col-sm-3"><span class="icon-home" style="line-height: 32px;"> 动态</span></div>
                  <div class="col-xs-4 col-sm-4"></div>
                  <div class="col-xs-5 col-sm-5">
                    <div class="btn-group pull-right" role="group">
                      
                      <!-- Button trigger modal -->
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#bokModal">
                        创建知识体
                      </button>
                    </div>

                  </div>
                </div>

              </div>
              <div class="panel-body">
                <div class="media">
                  
                  <div class="media-body">
                    <div class="row">
                      <span class="col-md-10"><a style="margin: 5px;height: 25px;" href="/profile" data-toggle="popover" title="Dismissible popover" data-content="And here's some amazing content. It's very engaging. Right?">
                        <img width="25px" class="img-rounded" src="http://upload.jianshu.io/collections/images/279834/1473388229.jpg?imageMogr2/auto-orient/strip|imageView2/1/w/240/h/240" alt="...">&nbsp;风清扬</a>&nbsp;&nbsp;&nbsp;&nbsp;来源：<a href="/subject/info">人工智能</a></span>
                      <span class="col-md-2 pull-right"> <b class="affact-label" title="影响了5.1千人"> 5.1K</b></span>
                    </div>
                    <h4><a href="/doc" target="_blank">如何使用深度学习重建高分辨率音频？</a></h4>
                    <p>
                    <img class="pull-left" style="width: 190px; margin: 5px 10px 0 0" src="//upload-images.jianshu.io/upload_images/1950577-98f475c00a46ea69.jpg?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240" alt="cover">
                    <p>我以前在超市做兼职的时候遇到一个女孩，她跟我一样做酸奶推销，八十一天，但是一天要站十个小时，而且还不包吃，这个姑娘特别喜欢林峰，她为了林峰学习粤语，看很多港片，买了很多林峰的海报，杂志封面是林峰的她也全买，林峰到内地有活动她总是赶到现场支持，她说她最大的愿望是有一天去香港看林峰的演唱会，但是重点来了，她今年已经二十八岁...<a class="icon-double-angle-right" href="http://mp.weixin.qq.com/s?src=3&timestamp=1498400942&ver=1&signature=03fn-njMA86IJDUqXKfESWNqLKF7upPf3dImAJFl*Z9SEwDFlLCRnBVjXMZ*sJrM9Hva7sVIXKBTqJpuePCG4U0ljspTe1qQPZ4KkkWWYCJ7na-QBRtnuz4vfV2v14iF4pATxq7nlxG0f9na895s9pWNyPcsjYfjDw6hrDwQFno="> 阅读</a></p>
                    </p>
                    <p style="clear: both;"></p>
                    <div class="panel-card-footer">
                      
                      <span class=""><a href="#" method="post" title="引用" class="icon-quote-left" data-toggle="modal" data-target="#myModal"> 534K</a></span>
                      <span class=""><a href="javascript:void(0);"  title="评论" class="icon-comment"> 评论</a></span>
                      <span class=""><a href="javascript:void(0);" title="分享" class="icon-share-alt"> 分享</a></span>
                      <span class=""><a href="javascript:void(0);" title="举报" class="icon-legal"> 举报</a></span>
                    </div>
                  </div>
                </div>
                <hr/>
                <div class="media">
                  
                  <div class="media-body">
                    <div class="row">
                      <span class="col-md-10"><a style="margin: 5px;height: 25px;" href="/profile" data-toggle="popover" title="Dismissible popover" data-content="And here's some amazing content. It's very engaging. Right?">
                        <img width="25px" class="img-rounded" src="http://upload.jianshu.io/collections/images/279834/1473388229.jpg?imageMogr2/auto-orient/strip|imageView2/1/w/240/h/240" alt="...">&nbsp;风清扬</a>&nbsp;&nbsp;&nbsp;&nbsp;来源：<a href="/subject/info">人工智能</a></span>
                      <span class="col-md-2 pull-right"> <b class="affact-label" title="影响了5.1千人"> 5000</b></span>
                    </div>
                    <h4><a href="/doc" target="_blank">如何使用深度学习重建高分辨率音频？</a></h4>
                    <p>
                    <img class="pull-left" style="width: 190px; margin: 5px 10px 0 0" src="//upload-images.jianshu.io/upload_images/1950577-98f475c00a46ea69.jpg?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240" alt="cover">
                    <p>我以前在超市做兼职的时候遇到一个女孩，她跟我一样做酸奶推销，八十一天，但是一天要站十个小时，而且还不包吃，这个姑娘特别喜欢林峰，她为了林峰学习粤语，看很多港片，买了很多林峰的海报，杂志封面是林峰的她也全买，林峰到内地有活动她总是赶到现场支持，她说她最大的愿望是有一天去香港看林峰的演唱会，但是重点来了，她今年已经二十八岁...<a class="icon-double-angle-right" href="http://mp.weixin.qq.com/s?src=3&timestamp=1498400942&ver=1&signature=03fn-njMA86IJDUqXKfESWNqLKF7upPf3dImAJFl*Z9SEwDFlLCRnBVjXMZ*sJrM9Hva7sVIXKBTqJpuePCG4U0ljspTe1qQPZ4KkkWWYCJ7na-QBRtnuz4vfV2v14iF4pATxq7nlxG0f9na895s9pWNyPcsjYfjDw6hrDwQFno="> 阅读</a></p>
                    </p>
                    <p style="clear: both;"></p>
                    <div class="panel-card-footer">
                      
                      <span class=""><a href="#" method="post" title="引用" class="icon-quote-left" data-toggle="modal" data-target="#myModal"> 534K</a></span>
                      <span class=""><a href="javascript:void(0);"  title="评论" class="icon-comment"> 评论</a></span>
                      <span class=""><a href="javascript:void(0);" title="分享" class="icon-share-alt"> 分享</a></span>
                      <span class=""><a href="javascript:void(0);" title="举报" class="icon-legal"> 举报</a></span>
                    </div>
                  </div>
                </div>
                <hr/>
                <div class="media">
                  
                  <div class="media-body">
                    <div class="row">
                      <span class="col-md-10"><a style="margin: 5px;height: 25px;" href="/profile" data-toggle="popover" title="Dismissible popover" data-content="And here's some amazing content. It's very engaging. Right?">
                        <img width="25px" class="img-rounded" src="http://upload.jianshu.io/collections/images/279834/1473388229.jpg?imageMogr2/auto-orient/strip|imageView2/1/w/240/h/240" alt="...">&nbsp;风清扬</a>&nbsp;&nbsp;&nbsp;&nbsp;来源：<a href="/subject/info">人工智能</a></span>
                      <span class="col-md-2 pull-right"> <b class="affact-label" title="影响了5.1千人"> 5000</b></span>
                    </div>
                    <h4><a href="/doc" target="_blank">如何使用深度学习重建高分辨率音频？</a></h4>
                    <p>
                    <img class="pull-left" style="width: 190px; margin: 5px 10px 0 0" src="//upload-images.jianshu.io/upload_images/1950577-98f475c00a46ea69.jpg?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240" alt="cover">
                    <p>我以前在超市做兼职的时候遇到一个女孩，她跟我一样做酸奶推销，八十一天，但是一天要站十个小时，而且还不包吃，这个姑娘特别喜欢林峰，她为了林峰学习粤语，看很多港片，买了很多林峰的海报，杂志封面是林峰的她也全买，林峰到内地有活动她总是赶到现场支持，她说她最大的愿望是有一天去香港看林峰的演唱会，但是重点来了，她今年已经二十八岁...<a class="icon-double-angle-right" href="http://mp.weixin.qq.com/s?src=3&timestamp=1498400942&ver=1&signature=03fn-njMA86IJDUqXKfESWNqLKF7upPf3dImAJFl*Z9SEwDFlLCRnBVjXMZ*sJrM9Hva7sVIXKBTqJpuePCG4U0ljspTe1qQPZ4KkkWWYCJ7na-QBRtnuz4vfV2v14iF4pATxq7nlxG0f9na895s9pWNyPcsjYfjDw6hrDwQFno="> 阅读</a></p>
                    </p>
                    <p style="clear: both;"></p>
                    <div class="panel-card-footer">
                      
                      <span class=""><a href="#" method="post" title="引用" class="icon-quote-left" data-toggle="modal" data-target="#myModal"> 534K</a></span>
                      <span class=""><a href="javascript:void(0);"  title="评论" class="icon-comment"> 评论</a></span>
                      <span class=""><a href="javascript:void(0);" title="分享" class="icon-share-alt"> 分享</a></span>
                      <span class=""><a href="javascript:void(0);" title="举报" class="icon-legal"> 举报</a></span>
                    </div>
                  </div>
                </div>
                <hr/>
                <div class="media">
                  
                  <div class="media-body">
                    <div class="row">
                      <span class="col-md-10"><a style="margin: 5px;height: 25px;" href="/profile" data-toggle="popover" title="Dismissible popover" data-content="And here's some amazing content. It's very engaging. Right?">
                        <img width="25px" class="img-rounded" src="http://upload.jianshu.io/collections/images/279834/1473388229.jpg?imageMogr2/auto-orient/strip|imageView2/1/w/240/h/240" alt="...">&nbsp;风清扬</a>&nbsp;&nbsp;&nbsp;&nbsp;来源：<a href="/subject/info">人工智能</a></span>
                      <span class="col-md-2 pull-right"> <b class="affact-label" title="影响了5.1千人"> 5000</b></span>
                    </div>
                    <h4><a href="/doc" target="_blank">如何使用深度学习重建高分辨率音频？</a></h4>
                    <p>
                    <img class="pull-left" style="width: 190px; margin: 5px 10px 0 0" src="//upload-images.jianshu.io/upload_images/1950577-98f475c00a46ea69.jpg?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240" alt="cover">
                    <p>我以前在超市做兼职的时候遇到一个女孩，她跟我一样做酸奶推销，八十一天，但是一天要站十个小时，而且还不包吃，这个姑娘特别喜欢林峰，她为了林峰学习粤语，看很多港片，买了很多林峰的海报，杂志封面是林峰的她也全买，林峰到内地有活动她总是赶到现场支持，她说她最大的愿望是有一天去香港看林峰的演唱会，但是重点来了，她今年已经二十八岁...<a class="icon-double-angle-right" href="http://mp.weixin.qq.com/s?src=3&timestamp=1498400942&ver=1&signature=03fn-njMA86IJDUqXKfESWNqLKF7upPf3dImAJFl*Z9SEwDFlLCRnBVjXMZ*sJrM9Hva7sVIXKBTqJpuePCG4U0ljspTe1qQPZ4KkkWWYCJ7na-QBRtnuz4vfV2v14iF4pATxq7nlxG0f9na895s9pWNyPcsjYfjDw6hrDwQFno="> 阅读</a></p>
                    </p>
                    <p style="clear: both;"></p>
                    <div class="panel-card-footer">
                      
                      <span class=""><a href="#" method="post" title="引用" class="icon-quote-left" data-toggle="modal" data-target="#myModal"> 534K</a></span>
                      <span class=""><a href="javascript:void(0);"  title="评论" class="icon-comment"> 评论</a></span>
                      <span class=""><a href="javascript:void(0);" title="分享" class="icon-share-alt"> 分享</a></span>
                      <span class=""><a href="javascript:void(0);" title="举报" class="icon-legal"> 举报</a></span>
                    </div>
                  </div>
                </div>
                <hr/>
                <div class="media">
                  
                  <div class="media-body">
                    <div class="row">
                      <span class="col-md-10"><a style="margin: 5px;height: 25px;" href="/profile" data-toggle="popover" title="Dismissible popover" data-content="And here's some amazing content. It's very engaging. Right?">
                        <img width="25px" class="img-rounded" src="http://upload.jianshu.io/collections/images/279834/1473388229.jpg?imageMogr2/auto-orient/strip|imageView2/1/w/240/h/240" alt="...">&nbsp;风清扬</a>&nbsp;&nbsp;&nbsp;&nbsp;来源：<a href="/subject/info">人工智能</a></span>
                      <span class="col-md-2 pull-right"> <b class="affact-label" title="影响了5.1千人"> 5000</b></span>
                    </div>
                    <h4><a href="/doc" target="_blank">如何使用深度学习重建高分辨率音频？</a></h4>
                    <p>
                    <img class="pull-left" style="width: 190px; margin: 5px 10px 0 0" src="//upload-images.jianshu.io/upload_images/1950577-98f475c00a46ea69.jpg?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240" alt="cover">
                    <p>我以前在超市做兼职的时候遇到一个女孩，她跟我一样做酸奶推销，八十一天，但是一天要站十个小时，而且还不包吃，这个姑娘特别喜欢林峰，她为了林峰学习粤语，看很多港片，买了很多林峰的海报，杂志封面是林峰的她也全买，林峰到内地有活动她总是赶到现场支持，她说她最大的愿望是有一天去香港看林峰的演唱会，但是重点来了，她今年已经二十八岁...<a class="icon-double-angle-right" href="http://mp.weixin.qq.com/s?src=3&timestamp=1498400942&ver=1&signature=03fn-njMA86IJDUqXKfESWNqLKF7upPf3dImAJFl*Z9SEwDFlLCRnBVjXMZ*sJrM9Hva7sVIXKBTqJpuePCG4U0ljspTe1qQPZ4KkkWWYCJ7na-QBRtnuz4vfV2v14iF4pATxq7nlxG0f9na895s9pWNyPcsjYfjDw6hrDwQFno="> 阅读</a></p>
                    </p>
                    <p style="clear: both;"></p>
                    <div class="panel-card-footer">
                      
                      <span class=""><a href="#" method="post" title="引用" class="icon-quote-left" data-toggle="modal" data-target="#myModal"> 534K</a></span>
                      <span class=""><a href="javascript:void(0);"  title="评论" class="icon-comment"> 评论</a></span>
                      <span class=""><a href="javascript:void(0);" title="分享" class="icon-share-alt"> 分享</a></span>
                      <span class=""><a href="javascript:void(0);" title="举报" class="icon-legal"> 举报</a></span>
                    </div>
                  </div>
                </div>
                <hr/>
                <div class="media">
                  
                  <div class="media-body">
                    <div class="row">
                      <span class="col-md-10"><a style="margin: 5px;height: 25px;" href="/profile" data-toggle="popover" title="Dismissible popover" data-content="And here's some amazing content. It's very engaging. Right?">
                        <img width="25px" class="img-rounded" src="http://upload.jianshu.io/collections/images/279834/1473388229.jpg?imageMogr2/auto-orient/strip|imageView2/1/w/240/h/240" alt="...">&nbsp;风清扬</a>&nbsp;&nbsp;&nbsp;&nbsp;来源：<a href="/subject/info">人工智能</a></span>
                      <span class="col-md-2 pull-right"> <b class="affact-label" title="影响了5.1千人"> 5000</b></span>
                    </div>
                    <h4><a href="/doc" target="_blank">如何使用深度学习重建高分辨率音频？</a></h4>
                    <p>
                    <img class="pull-left" style="width: 190px; margin: 5px 10px 0 0" src="//upload-images.jianshu.io/upload_images/1950577-98f475c00a46ea69.jpg?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240" alt="cover">
                    <p>我以前在超市做兼职的时候遇到一个女孩，她跟我一样做酸奶推销，八十一天，但是一天要站十个小时，而且还不包吃，这个姑娘特别喜欢林峰，她为了林峰学习粤语，看很多港片，买了很多林峰的海报，杂志封面是林峰的她也全买，林峰到内地有活动她总是赶到现场支持，她说她最大的愿望是有一天去香港看林峰的演唱会，但是重点来了，她今年已经二十八岁...<a class="icon-double-angle-right" href="http://mp.weixin.qq.com/s?src=3&timestamp=1498400942&ver=1&signature=03fn-njMA86IJDUqXKfESWNqLKF7upPf3dImAJFl*Z9SEwDFlLCRnBVjXMZ*sJrM9Hva7sVIXKBTqJpuePCG4U0ljspTe1qQPZ4KkkWWYCJ7na-QBRtnuz4vfV2v14iF4pATxq7nlxG0f9na895s9pWNyPcsjYfjDw6hrDwQFno="> 阅读</a></p>
                    </p>
                    <p style="clear: both;"></p>
                    <div class="panel-card-footer">
                      
                      <span class=""><a href="#" method="post" title="引用" class="icon-quote-left" data-toggle="modal" data-target="#myModal"> 534K</a></span>
                      <span class=""><a href="javascript:void(0);"  title="评论" class="icon-comment"> 评论</a></span>
                      <span class=""><a href="javascript:void(0);" title="分享" class="icon-share-alt"> 分享</a></span>
                      <span class=""><a href="javascript:void(0);" title="举报" class="icon-legal"> 举报</a></span>
                    </div>
                  </div>
                </div>
                <hr/>
                <div class="media">
                  
                  <div class="media-body">
                    <div class="row">
                      <span class="col-md-10"><a style="margin: 5px;height: 25px;" href="/profile" data-toggle="popover" title="Dismissible popover" data-content="And here's some amazing content. It's very engaging. Right?">
                        <img width="25px" class="img-rounded" src="http://upload.jianshu.io/collections/images/279834/1473388229.jpg?imageMogr2/auto-orient/strip|imageView2/1/w/240/h/240" alt="...">&nbsp;风清扬</a>&nbsp;&nbsp;&nbsp;&nbsp;来源：<a href="/subject/info">人工智能</a></span>
                      <span class="col-md-2 pull-right"> <b class="affact-label" title="影响了5.1千人"> 5000</b></span>
                    </div>
                    <h4><a href="/doc" target="_blank">如何使用深度学习重建高分辨率音频？</a></h4>
                    <p>
                    <img class="pull-left" style="width: 190px; margin: 5px 10px 0 0" src="//upload-images.jianshu.io/upload_images/1950577-98f475c00a46ea69.jpg?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240" alt="cover">
                    <p>我以前在超市做兼职的时候遇到一个女孩，她跟我一样做酸奶推销，八十一天，但是一天要站十个小时，而且还不包吃，这个姑娘特别喜欢林峰，她为了林峰学习粤语，看很多港片，买了很多林峰的海报，杂志封面是林峰的她也全买，林峰到内地有活动她总是赶到现场支持，她说她最大的愿望是有一天去香港看林峰的演唱会，但是重点来了，她今年已经二十八岁...<a class="icon-double-angle-right" href="http://mp.weixin.qq.com/s?src=3&timestamp=1498400942&ver=1&signature=03fn-njMA86IJDUqXKfESWNqLKF7upPf3dImAJFl*Z9SEwDFlLCRnBVjXMZ*sJrM9Hva7sVIXKBTqJpuePCG4U0ljspTe1qQPZ4KkkWWYCJ7na-QBRtnuz4vfV2v14iF4pATxq7nlxG0f9na895s9pWNyPcsjYfjDw6hrDwQFno="> 阅读</a></p>
                    </p>
                    <p style="clear: both;"></p>
                    <div class="panel-card-footer">
                      
                      <span class=""><a href="#" method="post" title="引用" class="icon-quote-left" data-toggle="modal" data-target="#myModal"> 534K</a></span>
                      <span class=""><a href="javascript:void(0);"  title="评论" class="icon-comment"> 评论</a></span>
                      <span class=""><a href="javascript:void(0);" title="分享" class="icon-share-alt"> 分享</a></span>
                      <span class=""><a href="javascript:void(0);" title="举报" class="icon-legal"> 举报</a></span>
                    </div>
                  </div>
                </div>
                <hr/>
                <div class="media">
                  
                  <div class="media-body">
                    <div class="row">
                      <span class="col-md-10"><a style="margin: 5px;height: 25px;" href="/profile" data-toggle="popover" title="Dismissible popover" data-content="And here's some amazing content. It's very engaging. Right?">
                        <img width="25px" class="img-rounded" src="http://upload.jianshu.io/collections/images/279834/1473388229.jpg?imageMogr2/auto-orient/strip|imageView2/1/w/240/h/240" alt="...">&nbsp;风清扬</a>&nbsp;&nbsp;&nbsp;&nbsp;来源：<a href="/subject/info">人工智能</a></span>
                      <span class="col-md-2 pull-right"> <b class="affact-label" title="影响了5.1千人"> 5000</b></span>
                    </div>
                    <h4><a href="/doc" target="_blank">如何使用深度学习重建高分辨率音频？</a></h4>
                    <p>
                    <img class="pull-left" style="width: 190px; margin: 5px 10px 0 0" src="//upload-images.jianshu.io/upload_images/1950577-98f475c00a46ea69.jpg?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240" alt="cover">
                    <p>我以前在超市做兼职的时候遇到一个女孩，她跟我一样做酸奶推销，八十一天，但是一天要站十个小时，而且还不包吃，这个姑娘特别喜欢林峰，她为了林峰学习粤语，看很多港片，买了很多林峰的海报，杂志封面是林峰的她也全买，林峰到内地有活动她总是赶到现场支持，她说她最大的愿望是有一天去香港看林峰的演唱会，但是重点来了，她今年已经二十八岁...<a class="icon-double-angle-right" href="http://mp.weixin.qq.com/s?src=3&timestamp=1498400942&ver=1&signature=03fn-njMA86IJDUqXKfESWNqLKF7upPf3dImAJFl*Z9SEwDFlLCRnBVjXMZ*sJrM9Hva7sVIXKBTqJpuePCG4U0ljspTe1qQPZ4KkkWWYCJ7na-QBRtnuz4vfV2v14iF4pATxq7nlxG0f9na895s9pWNyPcsjYfjDw6hrDwQFno="> 阅读</a></p>
                    </p>
                    <p style="clear: both;"></p>
                    <div class="panel-card-footer">
                      
                      <span class=""><a href="#" method="post" title="引用" class="icon-quote-left" data-toggle="modal" data-target="#myModal"> 534K</a></span>
                      <span class=""><a href="javascript:void(0);"  title="评论" class="icon-comment"> 评论</a></span>
                      <span class=""><a href="javascript:void(0);" title="分享" class="icon-share-alt"> 分享</a></span>
                      <span class=""><a href="javascript:void(0);" title="举报" class="icon-legal"> 举报</a></span>
                    </div>
                  </div>
                </div>
                <hr/>
                <div class="media">
                  
                  <div class="media-body">
                    <div class="row">
                      <span class="col-md-10"><a style="margin: 5px;height: 25px;" href="/profile" data-toggle="popover" title="Dismissible popover" data-content="And here's some amazing content. It's very engaging. Right?">
                        <img width="25px" class="img-rounded" src="http://upload.jianshu.io/collections/images/279834/1473388229.jpg?imageMogr2/auto-orient/strip|imageView2/1/w/240/h/240" alt="...">&nbsp;风清扬</a>&nbsp;&nbsp;&nbsp;&nbsp;来源：<a href="/subject/info">人工智能</a></span>
                      <span class="col-md-2 pull-right"> <b class="affact-label" title="影响了5.1千人"> 5000</b></span>
                    </div>
                    <h4><a href="/doc" target="_blank">如何使用深度学习重建高分辨率音频？</a></h4>
                    <p>
                    <img class="pull-left" style="width: 190px; margin: 5px 10px 0 0" src="//upload-images.jianshu.io/upload_images/1950577-98f475c00a46ea69.jpg?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240" alt="cover">
                    <p>我以前在超市做兼职的时候遇到一个女孩，她跟我一样做酸奶推销，八十一天，但是一天要站十个小时，而且还不包吃，这个姑娘特别喜欢林峰，她为了林峰学习粤语，看很多港片，买了很多林峰的海报，杂志封面是林峰的她也全买，林峰到内地有活动她总是赶到现场支持，她说她最大的愿望是有一天去香港看林峰的演唱会，但是重点来了，她今年已经二十八岁...<a class="icon-double-angle-right" href="http://mp.weixin.qq.com/s?src=3&timestamp=1498400942&ver=1&signature=03fn-njMA86IJDUqXKfESWNqLKF7upPf3dImAJFl*Z9SEwDFlLCRnBVjXMZ*sJrM9Hva7sVIXKBTqJpuePCG4U0ljspTe1qQPZ4KkkWWYCJ7na-QBRtnuz4vfV2v14iF4pATxq7nlxG0f9na895s9pWNyPcsjYfjDw6hrDwQFno="> 阅读</a></p>
                    </p>
                    <p style="clear: both;"></p>
                    <div class="panel-card-footer">
                      
                      <span class=""><a href="#" method="post" title="引用" class="icon-quote-left" data-toggle="modal" data-target="#myModal"> 534K</a></span>
                      <span class=""><a href="javascript:void(0);"  title="评论" class="icon-comment"> 评论</a></span>
                      <span class=""><a href="javascript:void(0);" title="分享" class="icon-share-alt"> 分享</a></span>
                      <span class=""><a href="javascript:void(0);" title="举报" class="icon-legal"> 举报</a></span>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="bokModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="关闭"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">创建知识体</h4>
              </div>
              <div class="modal-body">
                <form id="bokForm">
                  <div class="form-group">
                    <label for="exampleInputEmail1">标题</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="知识体标题（不超过255字符）">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">描述</label>
                    <textarea class="form-control" placeholder="简单描述一下你的知识体（不超过255字符）"></textarea>
                  </div>
                  <div class="form-inline">
                    <div class="form-group">
                      <label for="exampleInputEmail1">所属领域</label>
                      <select class="form-control">
                        <option>计算机</option>
                      </select>
                      <select class="form-control">
                        <option>人工智能</option>
                      </select>
                    </div>
                  </div>
                  <br/>
                  <div class="form-group">
                    <label for="exampleInputFile">知识体头像</label>
                    <input type="file" id="exampleInputFile" accept="image/jpeg">
                    <img id="showThumb" style="display: none;width: 100px;height: 100px;margin: 10px 0px;border:1px solid silver;" src="" >
                    <p class="help-block">使用高度符合知识体的封面，能够提高关注度.</p>
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                <button id="bokSubmit" type="button" class="btn btn-primary">开始创建</button>
              </div>
            </div>
          </div>
        </div>

        @include('personal.menu')
        
</div>

<script type="text/javascript">
  $(function () {
    $('[data-toggle="popover"]').popover();
    $('[data-toggle="popover"]').on('mouseover', function(){
      $(this).popover('show');
    }).on('mouseout', function(){
      $(this).popover('hide');
    });
    $('[data-toggle="tooltip"]').tooltip();

    $('#exampleInputFile').on('change', function() {
      var url = window.URL.createObjectURL($(this)[0].files[0])
      $("#showThumb").attr('src', url).show();
    });

    // bokForm表单处理事件
    $('#bokSubmit').on('click', function() {
      $.ajax({
          type: "POST",
          url: "/editor/doc",
          data: $('#form').serialize(),
          dataType: 'json',
          success: function(msg) {
           alert( "Data Saved: " + JSON.stringify(msg) );
          }
      });
    });
  });
</script>
@endsection

