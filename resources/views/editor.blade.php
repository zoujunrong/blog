<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script type="text/javascript" src="{{asset('lib/ueditor/ueditor.config.js')}}"></script>
        <script type="text/javascript" src="{{asset('lib/ueditor/ueditor.all.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('lib/ueditor/ueditor.js')}}"></script>
        <title>Laravel</title>
    </head>
    <body>
        <div>
            <script id="editor" type="text/plain" style=""></script>
        </div>

        <script type="text/javascript">
            //实例化编辑器
            //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
            var ue = UE.getEditor('editor');

        </script>
    </body>
</html>
