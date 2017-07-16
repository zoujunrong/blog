@extends('layouts.app')

@section('content')
<script src="{{ asset('js/doc.min.js') }}"></script>
<link href="{{ asset('css/doc.min.css') }}" rel="stylesheet">
<script type="text/javascript" src="{{asset('lib/easyTree/jquery.easytree.min.js')}}"></script>
<link rel="stylesheet" href="{{ asset('lib/easyTree/skin-win8/ui.easytree.css') }}">
<script type="text/javascript">
  $(function(){
    $('body').css('padding-top', 0);
    $('#header').removeClass('navbar-fixed-top');
    $('#folder_list').easytree();
  })
</script>
<div class="container bodyContainer">
    <div class="row">
    	<div class="col-md-3" role="folder">
        <nav id="folder_list" class="bs-docs-sidebar" style="margin-bottom:10px;padding:0px;width: 250px;">
    		  {{ $folders }}
        </nav>
    	</div>
        <div class="col-md-7" role="main">
          {!! $content !!}
        </div>
        <div class="col-md-2">
        
        <nav class="bs-docs-sidebar hidden-print hidden-xs hidden-sm affix-top">
            {!! $menuHtml !!}
            <a class="back-to-top" style="position: fixed;bottom: 10px;" href="#top">
              返回顶部
            </a>
            
          </nav>
        </div>
    </div>
</div>
@endsection
