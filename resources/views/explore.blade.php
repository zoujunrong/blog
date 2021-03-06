@extends('layouts.app')

@section('content')
<style>
	.exp-list-top {
		list-style: none;
	}
	.exp-list-top > li {
		width: 100px;
		height: 40px;
		display: inline-block;
    	font-size: 16px;
    	line-height: 40px;
    	text-align: center;
    	margin-bottom: 2px;
	}
	.exp-list-top a {
		color: #000;
	}
	.exp-list-top .active, .exp-list-top li:hover {
		border-radius:4px;
		box-shadow: 1px 1px 1px #888888;
		background: linear-gradient(128deg, #fa2f2f 0%, #ff5b36 90%);
	}
	.exp-list-top>.active a,.exp-list-top>li:hover a{
		color: #fff;
	}

	.panel {
		margin: 10px 0;
	}

	h4 a{
		font-size: 18px;
	    font-weight: 700;
	    line-height: 1.6;
	    color: #1e1e1e;
	}
	.media-body p {
		font-size: 15px;
		line-height: 25px;
	}
	.top-label{
		font-size: 12px;
		color:gray;
		margin-left: 10px;
	}
	.label {
	}
</style>
<div class="container">
	<div class="row">
		<div class="col-md-2 col-md-offset-1">
			<ul class="exp-list-top" style="border-right:1px solid #e1e1e1;">
				<li class="active"><a href="#">热门</a></li>
				<li><a href="#">文学</a></li>
				<li><a href="#">哲学</a></li>
				<li><a href="#">经济学</a></li>
				<li><a href="#">法学</a></li>
				<li><a href="#">教育学</a></li>
				<li><a href="#">历史学</a></li>
				<li><a href="#">理学</a></li>
				<li><a href="#">工学</a></li>
				<li><a href="#">艺术学</a></li>
				<li><a href="#">管理学</a></li>
				<li><a href="#">医学</a></li>
				<li><a href="#">军事学</a></li>
				<li><a href="#">农学</a></li>
			</ul>
		</div>
		<div class="col-md-8">
			<ul class="nav nav-tabs">
			  <li role="presentation" class="active"><a href="#">全部</a></li>
			  <li role="presentation"><a href="#">知识</a></li>
			  <li role="presentation"><a href="#">知识体</a></li>
			  <li role="presentation"><a href="#">组织</a></li>
			</ul>
			<div class="media">
              <div class="media-body">
                <div class="row"><span class="col-md-10"><a style="margin: 5px;height: 25px;" href="#" data-toggle="popover" title="Dismissible popover" data-content="And here's some amazing content. It's very engaging. Right?">
                  <img width="25px" class="img-rounded" src="http://upload.jianshu.io/collections/images/279834/1473388229.jpg?imageMogr2/auto-orient/strip|imageView2/1/w/240/h/240" alt="...">
                 逻辑学</a><span class="top-label">1小时前</span></span><span class="col-md-2"><button type="button" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> 关注</button></span></div>
                <h4><a href="/doc" target="_blank">你曾经哪一瞬间觉得人是愚蠢的？</a></h4>
                <p>
                <img class="pull-left" style="width: 190px; margin: 5px 10px 0 0" src="//upload-images.jianshu.io/upload_images/1950577-98f475c00a46ea69.jpg?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240" alt="cover">
                <p>我以前在超市做兼职的时候遇到一个女孩，她跟我一样做酸奶推销，八十一天，但是一天要站十个小时，而且还不包吃，这个姑娘特别喜欢林峰，她为了林峰学习粤语，看很多港片，买了很多林峰的海报，杂志封面是林峰的她也全买，林峰到内地有活动她总是赶到现场支持，她说她最大的愿望是有一天去香港看林峰的演唱会，但是重点来了，她今年已经二十八岁...<a class="icon-double-angle-right" href="http://mp.weixin.qq.com/s?src=3&timestamp=1498400942&ver=1&signature=03fn-njMA86IJDUqXKfESWNqLKF7upPf3dImAJFl*Z9SEwDFlLCRnBVjXMZ*sJrM9Hva7sVIXKBTqJpuePCG4U0ljspTe1qQPZ4KkkWWYCJ7na-QBRtnuz4vfV2v14iF4pATxq7nlxG0f9na895s9pWNyPcsjYfjDw6hrDwQFno="> 阅读</a></p>
                </p>
                <p style="clear: both;"></p>
                <p>
                <span class="label label-warning">逻辑学</span>
                <span class="label label-warning">哲学</span>
                <span class="label label-warning">心理学</span>
                </p>
                <div class="row">
                  <span class="col-xs-2 col-sm-2"><a href="javascript:void(0);" title="阅读" class="icon-eye-open"> 3454K</a></span>
                  <span class="col-xs-2 col-sm-2"><a href="#" method="post" title="引用" class="icon-quote-left" data-toggle="modal" data-target="#myModal"> 534K</a></span>
                  <span class="col-xs-2 col-sm-2"><a href="javascript:void(0);"  title="评论" class="icon-comment"> 评论</a></span>
                  <span class="col-xs-2 col-sm-2"><a href="javascript:void(0);" title="分享" class="icon-share-alt"> 分享</a></span>
                  <span class="col-xs-2 col-sm-2"><a href="javascript:void(0);" title="举报" class="icon-legal"> 举报</a></span>
                </div>
              </div>
            </div>
            <hr/>
            <div class="media">
              <div class="media-body">
                <div class="row"><span class="col-md-10"><a style="margin: 5px;height: 25px;" href="#" data-toggle="popover" title="Dismissible popover" data-content="And here's some amazing content. It's very engaging. Right?">
                  <img width="25px" class="img-rounded" src="http://upload.jianshu.io/collections/images/279834/1473388229.jpg?imageMogr2/auto-orient/strip|imageView2/1/w/240/h/240" alt="...">
                 人工智能</a><span class="top-label">1小时前</span></span><span class="col-md-2"><button type="button" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> 关注</button></span></div>
                <h4><a href="/doc" target="_blank">如何使用深度学习重建高分辨率音频？</a></h4>

                <p><img class="pull-left" style="width: 190px; margin: 5px 10px 0 0" src="//upload-images.jianshu.io/upload_images/188908-1abaa0f397a52175.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240"><p>机器人圈」导览：关于高分辨率音频的炫酷想必大家都清楚，那么管如何构建呢？物理博士Jeffrey Hetherly在受到深度学习成功应用于图像超分辨率的启发后，开始使用深度神经网络在这一领域探索，下面就和机器人圈一起来学习一下吧。<a class="icon-double-angle-right" href="http://mp.weixin.qq.com/s?src=3&timestamp=1498400942&ver=1&signature=03fn-njMA86IJDUqXKfESWNqLKF7upPf3dImAJFl*Z9SEwDFlLCRnBVjXMZ*sJrM9Hva7sVIXKBTqJpuePCG4U0ljspTe1qQPZ4KkkWWYCJ7na-QBRtnuz4vfV2v14iF4pATxq7nlxG0f9na895s9pWNyPcsjYfjDw6hrDwQFno="> 阅读</a></p>
                </p>
                <p style="clear: both;"></p>
                <p>
	                <span class="label label-warning">工学</span>
	                <span class="label label-warning">计算机</span>
	                <span class="label label-warning">神经网络</span>
	                <span class="label label-warning">深度学习</span>
                </p>
                <div class="row">
                  <span class="col-xs-2 col-sm-2"><a href="javascript:void(0);" title="阅读" class="icon-eye-open"> 3454K</a></span>
                  <span class="col-xs-2 col-sm-2"><a href="#" method="post" title="引用" class="icon-quote-left" data-toggle="modal" data-target="#myModal"> 534K</a></span>
                  <span class="col-xs-2 col-sm-2"><a href="javascript:void(0);"  title="评论" class="icon-comment"> 评论</a></span>
                  <span class="col-xs-2 col-sm-2"><a href="javascript:void(0);" title="分享" class="icon-share-alt"> 分享</a></span>
                  <span class="col-xs-2 col-sm-2"><a href="javascript:void(0);" title="举报" class="icon-legal"> 举报</a></span>
                </div>
              </div>
            </div>
            <hr/>
            <div class="media">
              <div class="media-body">
                <div class="row"><span class="col-md-10"><a style="margin: 5px;height: 25px;" href="#" data-toggle="popover" title="Dismissible popover" data-content="And here's some amazing content. It's very engaging. Right?">
                  <img width="25px" class="img-rounded" src="http://upload.jianshu.io/collections/images/279834/1473388229.jpg?imageMogr2/auto-orient/strip|imageView2/1/w/240/h/240" alt="...">
                 人工智能</a><span class="top-label">1小时前</span></span><span class="col-md-2"><button type="button" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> 关注</button></span></div>
                <h4><a href="/doc" target="_blank">如何使用深度学习重建高分辨率音频？</a></h4>

                <p><img class="pull-left" style="width: 190px; margin: 5px 10px 0 0" src="//upload-images.jianshu.io/upload_images/188908-1abaa0f397a52175.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240"><p>机器人圈」导览：关于高分辨率音频的炫酷想必大家都清楚，那么管如何构建呢？物理博士Jeffrey Hetherly在受到深度学习成功应用于图像超分辨率的启发后，开始使用深度神经网络在这一领域探索，下面就和机器人圈一起来学习一下吧。<a class="icon-double-angle-right" href="http://mp.weixin.qq.com/s?src=3&timestamp=1498400942&ver=1&signature=03fn-njMA86IJDUqXKfESWNqLKF7upPf3dImAJFl*Z9SEwDFlLCRnBVjXMZ*sJrM9Hva7sVIXKBTqJpuePCG4U0ljspTe1qQPZ4KkkWWYCJ7na-QBRtnuz4vfV2v14iF4pATxq7nlxG0f9na895s9pWNyPcsjYfjDw6hrDwQFno="> 阅读</a></p>
                </p>
                <p style="clear: both;"></p>
                <p>
	                <span class="label label-warning">工学</span>
	                <span class="label label-warning">计算机</span>
	                <span class="label label-warning">神经网络</span>
	                <span class="label label-warning">深度学习</span>
                </p>
                <div class="row">
                  <span class="col-xs-2 col-sm-2"><a href="javascript:void(0);" title="阅读" class="icon-eye-open"> 3454K</a></span>
                  <span class="col-xs-2 col-sm-2"><a href="#" method="post" title="引用" class="icon-quote-left" data-toggle="modal" data-target="#myModal"> 534K</a></span>
                  <span class="col-xs-2 col-sm-2"><a href="javascript:void(0);"  title="评论" class="icon-comment"> 评论</a></span>
                  <span class="col-xs-2 col-sm-2"><a href="javascript:void(0);" title="分享" class="icon-share-alt"> 分享</a></span>
                  <span class="col-xs-2 col-sm-2"><a href="javascript:void(0);" title="举报" class="icon-legal"> 举报</a></span>
                </div>
              </div>
            </div>
            <hr/>
            <div class="media">
              <div class="media-body">
                <div class="row"><span class="col-md-10"><a style="margin: 5px;height: 25px;" href="#" data-toggle="popover" title="Dismissible popover" data-content="And here's some amazing content. It's very engaging. Right?">
                  <img width="25px" class="img-rounded" src="http://upload.jianshu.io/collections/images/279834/1473388229.jpg?imageMogr2/auto-orient/strip|imageView2/1/w/240/h/240" alt="...">
                 人工智能</a><span class="top-label">1小时前</span></span><span class="col-md-2"><button type="button" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> 关注</button></span></div>
                <h4><a href="/doc" target="_blank">如何使用深度学习重建高分辨率音频？</a></h4>

                <p><img class="pull-left" style="width: 190px; margin: 5px 10px 0 0" src="//upload-images.jianshu.io/upload_images/188908-1abaa0f397a52175.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240"><p>机器人圈」导览：关于高分辨率音频的炫酷想必大家都清楚，那么管如何构建呢？物理博士Jeffrey Hetherly在受到深度学习成功应用于图像超分辨率的启发后，开始使用深度神经网络在这一领域探索，下面就和机器人圈一起来学习一下吧。<a class="icon-double-angle-right" href="http://mp.weixin.qq.com/s?src=3&timestamp=1498400942&ver=1&signature=03fn-njMA86IJDUqXKfESWNqLKF7upPf3dImAJFl*Z9SEwDFlLCRnBVjXMZ*sJrM9Hva7sVIXKBTqJpuePCG4U0ljspTe1qQPZ4KkkWWYCJ7na-QBRtnuz4vfV2v14iF4pATxq7nlxG0f9na895s9pWNyPcsjYfjDw6hrDwQFno="> 阅读</a></p>
                </p>
                <p style="clear: both;"></p>
                <p>
	                <span class="label label-warning">工学</span>
	                <span class="label label-warning">计算机</span>
	                <span class="label label-warning">神经网络</span>
	                <span class="label label-warning">深度学习</span>
                </p>
                <div class="row">
                  <span class="col-xs-2 col-sm-2"><a href="javascript:void(0);" title="阅读" class="icon-eye-open"> 3454K</a></span>
                  <span class="col-xs-2 col-sm-2"><a href="#" method="post" title="引用" class="icon-quote-left" data-toggle="modal" data-target="#myModal"> 534K</a></span>
                  <span class="col-xs-2 col-sm-2"><a href="javascript:void(0);"  title="评论" class="icon-comment"> 评论</a></span>
                  <span class="col-xs-2 col-sm-2"><a href="javascript:void(0);" title="分享" class="icon-share-alt"> 分享</a></span>
                  <span class="col-xs-2 col-sm-2"><a href="javascript:void(0);" title="举报" class="icon-legal"> 举报</a></span>
                </div>
              </div>
            </div>
            <hr/>
            <div class="media">
              <div class="media-body">
                <div class="row"><span class="col-md-10"><a style="margin: 5px;height: 25px;" href="#" data-toggle="popover" title="Dismissible popover" data-content="And here's some amazing content. It's very engaging. Right?">
                  <img width="25px" class="img-rounded" src="http://upload.jianshu.io/collections/images/279834/1473388229.jpg?imageMogr2/auto-orient/strip|imageView2/1/w/240/h/240" alt="...">
                 人工智能</a><span class="top-label">1小时前</span></span><span class="col-md-2"><button type="button" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> 关注</button></span></div>
                <h4><a href="/doc" target="_blank">如何使用深度学习重建高分辨率音频？</a></h4>

                <p><img class="pull-left" style="width: 190px; margin: 5px 10px 0 0" src="//upload-images.jianshu.io/upload_images/188908-1abaa0f397a52175.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240"><p>机器人圈」导览：关于高分辨率音频的炫酷想必大家都清楚，那么管如何构建呢？物理博士Jeffrey Hetherly在受到深度学习成功应用于图像超分辨率的启发后，开始使用深度神经网络在这一领域探索，下面就和机器人圈一起来学习一下吧。<a class="icon-double-angle-right" href="http://mp.weixin.qq.com/s?src=3&timestamp=1498400942&ver=1&signature=03fn-njMA86IJDUqXKfESWNqLKF7upPf3dImAJFl*Z9SEwDFlLCRnBVjXMZ*sJrM9Hva7sVIXKBTqJpuePCG4U0ljspTe1qQPZ4KkkWWYCJ7na-QBRtnuz4vfV2v14iF4pATxq7nlxG0f9na895s9pWNyPcsjYfjDw6hrDwQFno="> 阅读</a></p>
                </p>
                <p style="clear: both;"></p>
                <p>
	                <span class="label label-warning">工学</span>
	                <span class="label label-warning">计算机</span>
	                <span class="label label-warning">神经网络</span>
	                <span class="label label-warning">深度学习</span>
                </p>
                <div class="row">
                  <span class="col-xs-2 col-sm-2"><a href="javascript:void(0);" title="阅读" class="icon-eye-open"> 3454K</a></span>
                  <span class="col-xs-2 col-sm-2"><a href="#" method="post" title="引用" class="icon-quote-left" data-toggle="modal" data-target="#myModal"> 534K</a></span>
                  <span class="col-xs-2 col-sm-2"><a href="javascript:void(0);"  title="评论" class="icon-comment"> 评论</a></span>
                  <span class="col-xs-2 col-sm-2"><a href="javascript:void(0);" title="分享" class="icon-share-alt"> 分享</a></span>
                  <span class="col-xs-2 col-sm-2"><a href="javascript:void(0);" title="举报" class="icon-legal"> 举报</a></span>
                </div>
              </div>
            </div>
            <hr/>
            <div class="media">
              <div class="media-body">
                <div class="row"><span class="col-md-10"><a style="margin: 5px;height: 25px;" href="#" data-toggle="popover" title="Dismissible popover" data-content="And here's some amazing content. It's very engaging. Right?">
                  <img width="25px" class="img-rounded" src="http://upload.jianshu.io/collections/images/279834/1473388229.jpg?imageMogr2/auto-orient/strip|imageView2/1/w/240/h/240" alt="...">
                 人工智能</a><span class="top-label">1小时前</span></span><span class="col-md-2"><button type="button" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> 关注</button></span></div>
                <h4><a href="/doc" target="_blank">如何使用深度学习重建高分辨率音频？</a></h4>

                <p><img class="pull-left" style="width: 190px; margin: 5px 10px 0 0" src="//upload-images.jianshu.io/upload_images/188908-1abaa0f397a52175.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240"><p>机器人圈」导览：关于高分辨率音频的炫酷想必大家都清楚，那么管如何构建呢？物理博士Jeffrey Hetherly在受到深度学习成功应用于图像超分辨率的启发后，开始使用深度神经网络在这一领域探索，下面就和机器人圈一起来学习一下吧。<a class="icon-double-angle-right" href="http://mp.weixin.qq.com/s?src=3&timestamp=1498400942&ver=1&signature=03fn-njMA86IJDUqXKfESWNqLKF7upPf3dImAJFl*Z9SEwDFlLCRnBVjXMZ*sJrM9Hva7sVIXKBTqJpuePCG4U0ljspTe1qQPZ4KkkWWYCJ7na-QBRtnuz4vfV2v14iF4pATxq7nlxG0f9na895s9pWNyPcsjYfjDw6hrDwQFno="> 阅读</a></p>
                </p>
                <p style="clear: both;"></p>
                <p>
	                <span class="label label-warning">工学</span>
	                <span class="label label-warning">计算机</span>
	                <span class="label label-warning">神经网络</span>
	                <span class="label label-warning">深度学习</span>
                </p>
                <div class="row">
                  <span class="col-xs-2 col-sm-2"><a href="javascript:void(0);" title="阅读" class="icon-eye-open"> 3454K</a></span>
                  <span class="col-xs-2 col-sm-2"><a href="#" method="post" title="引用" class="icon-quote-left" data-toggle="modal" data-target="#myModal"> 534K</a></span>
                  <span class="col-xs-2 col-sm-2"><a href="javascript:void(0);"  title="评论" class="icon-comment"> 评论</a></span>
                  <span class="col-xs-2 col-sm-2"><a href="javascript:void(0);" title="分享" class="icon-share-alt"> 分享</a></span>
                  <span class="col-xs-2 col-sm-2"><a href="javascript:void(0);" title="举报" class="icon-legal"> 举报</a></span>
                </div>
              </div>
            </div>
            <hr/>
            <div class="media">
              <div class="media-body">
                <div class="row"><span class="col-md-10"><a style="margin: 5px;height: 25px;" href="#" data-toggle="popover" title="Dismissible popover" data-content="And here's some amazing content. It's very engaging. Right?">
                  <img width="25px" class="img-rounded" src="http://upload.jianshu.io/collections/images/279834/1473388229.jpg?imageMogr2/auto-orient/strip|imageView2/1/w/240/h/240" alt="...">
                 人工智能</a><span class="top-label">1小时前</span></span><span class="col-md-2"><button type="button" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> 关注</button></span></div>
                <h4><a href="/doc" target="_blank">如何使用深度学习重建高分辨率音频？</a></h4>

                <p><img class="pull-left" style="width: 190px; margin: 5px 10px 0 0" src="//upload-images.jianshu.io/upload_images/188908-1abaa0f397a52175.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240"><p>机器人圈」导览：关于高分辨率音频的炫酷想必大家都清楚，那么管如何构建呢？物理博士Jeffrey Hetherly在受到深度学习成功应用于图像超分辨率的启发后，开始使用深度神经网络在这一领域探索，下面就和机器人圈一起来学习一下吧。<a class="icon-double-angle-right" href="http://mp.weixin.qq.com/s?src=3&timestamp=1498400942&ver=1&signature=03fn-njMA86IJDUqXKfESWNqLKF7upPf3dImAJFl*Z9SEwDFlLCRnBVjXMZ*sJrM9Hva7sVIXKBTqJpuePCG4U0ljspTe1qQPZ4KkkWWYCJ7na-QBRtnuz4vfV2v14iF4pATxq7nlxG0f9na895s9pWNyPcsjYfjDw6hrDwQFno="> 阅读</a></p>
                </p>
                <p style="clear: both;"></p>
                <p>
	                <span class="label label-warning">工学</span>
	                <span class="label label-warning">计算机</span>
	                <span class="label label-warning">神经网络</span>
	                <span class="label label-warning">深度学习</span>
                </p>
                <div class="row">
                  <span class="col-xs-2 col-sm-2"><a href="javascript:void(0);" title="阅读" class="icon-eye-open"> 3454K</a></span>
                  <span class="col-xs-2 col-sm-2"><a href="#" method="post" title="引用" class="icon-quote-left" data-toggle="modal" data-target="#myModal"> 534K</a></span>
                  <span class="col-xs-2 col-sm-2"><a href="javascript:void(0);"  title="评论" class="icon-comment"> 评论</a></span>
                  <span class="col-xs-2 col-sm-2"><a href="javascript:void(0);" title="分享" class="icon-share-alt"> 分享</a></span>
                  <span class="col-xs-2 col-sm-2"><a href="javascript:void(0);" title="举报" class="icon-legal"> 举报</a></span>
                </div>
              </div>
            </div>
            <hr/>
            <div class="media">
              <div class="media-body">
                <div class="row"><span class="col-md-10"><a style="margin: 5px;height: 25px;" href="#" data-toggle="popover" title="Dismissible popover" data-content="And here's some amazing content. It's very engaging. Right?">
                  <img width="25px" class="img-rounded" src="http://upload.jianshu.io/collections/images/279834/1473388229.jpg?imageMogr2/auto-orient/strip|imageView2/1/w/240/h/240" alt="...">
                 人工智能</a><span class="top-label">1小时前</span></span><span class="col-md-2"><button type="button" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> 关注</button></span></div>
                <h4><a href="/doc" target="_blank">如何使用深度学习重建高分辨率音频？</a></h4>

                <p><img class="pull-left" style="width: 190px; margin: 5px 10px 0 0" src="//upload-images.jianshu.io/upload_images/188908-1abaa0f397a52175.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240"><p>机器人圈」导览：关于高分辨率音频的炫酷想必大家都清楚，那么管如何构建呢？物理博士Jeffrey Hetherly在受到深度学习成功应用于图像超分辨率的启发后，开始使用深度神经网络在这一领域探索，下面就和机器人圈一起来学习一下吧。<a class="icon-double-angle-right" href="http://mp.weixin.qq.com/s?src=3&timestamp=1498400942&ver=1&signature=03fn-njMA86IJDUqXKfESWNqLKF7upPf3dImAJFl*Z9SEwDFlLCRnBVjXMZ*sJrM9Hva7sVIXKBTqJpuePCG4U0ljspTe1qQPZ4KkkWWYCJ7na-QBRtnuz4vfV2v14iF4pATxq7nlxG0f9na895s9pWNyPcsjYfjDw6hrDwQFno="> 阅读</a></p>
                </p>
                <p style="clear: both;"></p>
                <p>
	                <span class="label label-warning">工学</span>
	                <span class="label label-warning">计算机</span>
	                <span class="label label-warning">神经网络</span>
	                <span class="label label-warning">深度学习</span>
                </p>
                <div class="row">
                  <span class="col-xs-2 col-sm-2"><a href="javascript:void(0);" title="阅读" class="icon-eye-open"> 3454K</a></span>
                  <span class="col-xs-2 col-sm-2"><a href="#" method="post" title="引用" class="icon-quote-left" data-toggle="modal" data-target="#myModal"> 534K</a></span>
                  <span class="col-xs-2 col-sm-2"><a href="javascript:void(0);"  title="评论" class="icon-comment"> 评论</a></span>
                  <span class="col-xs-2 col-sm-2"><a href="javascript:void(0);" title="分享" class="icon-share-alt"> 分享</a></span>
                  <span class="col-xs-2 col-sm-2"><a href="javascript:void(0);" title="举报" class="icon-legal"> 举报</a></span>
                </div>
              </div>
            </div>
            
		</div>
		<div class="col-md-3">
		</div>
	</div>
</div>
@endsection