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
    	
	}
	.exp-list-top a {
		color: #000;
	}
	.exp-list-top .active, .exp-list-top li:hover {
		background-color: #eee;
		border-radius:2em;
		box-shadow: 1px 1px 1px #888888;
	}

</style>
<div class="container">
	<div class="row">
		<div class="col-md-2">
			<ul class="exp-list-top">
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
		<div class="col-md-6">
		</div>
		<div class="col-md-4">
		</div>
	</div>
</div>
@endsection