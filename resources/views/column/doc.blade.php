<!DOCTYPE HTML>
<html lang="zh">

<head>
    <meta charset="UTF-8">
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <title>HTTP/网络 · Front-end Developer HandBook</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="generator" content="GitBook 3.2.2">
    <meta name="author" content="Pomy">
    <link rel="stylesheet" href="https://dwqs.gitbooks.io/frontenddevhandbook/content/gitbook/style.css">
    <link rel="stylesheet" href="https://dwqs.gitbooks.io/frontenddevhandbook/content/gitbook/gitbook-plugin-comment/plugin.css">
    <link rel="stylesheet" href="https://dwqs.gitbooks.io/frontenddevhandbook/content/gitbook/gitbook-plugin-highlight/website.css">
    <link rel="stylesheet" href="https://dwqs.gitbooks.io/frontenddevhandbook/content/gitbook/gitbook-plugin-search/search.css">
    <link rel="stylesheet" href="https://dwqs.gitbooks.io/frontenddevhandbook/content/gitbook/gitbook-plugin-fontsettings/website.css">
    <link rel="stylesheet" href="https://dwqs.gitbooks.io/frontenddevhandbook/content/styles/website.css">
    <meta name="HandheldFriendly" content="true">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <link rel="next" href="code-editor.html">
    <link rel="prev" href="diagram.html">
</head>

<body class="with-search">
    <div class="book without-animation font-size-4 font-family-1">
      <div class="book-summary">
          <div id="book-search-input" role="search">
              <input type="text" placeholder="输入并搜索">
          </div>
          <nav role="navigation">
              {!! $folderHtml !!}
          </nav>
      </div>
      <div class="book-body">
          <div class="body-inner">
              <div class="book-header" role="navigation">
                  <!-- Title -->
                  <a class="btn pull-left js-toolbar-action" aria-label="" href="#"><i class="fa fa-align-justify"></i></a>
                  <div class="dropdown pull-right js-toolbar-action"><a class="btn toggle-dropdown" aria-label="Share" href="#"><i class="fa fa-share-alt"></i></a>
                      <div class="dropdown-menu dropdown-left">
                          <div class="dropdown-caret"><span class="caret-outer"></span><span class="caret-inner"></span></div>
                          <div class="buttons">
                              <button class="button size-5 ">Facebook</button>
                              <button class="button size-5 ">Google+</button>
                              <button class="button size-5 ">Twitter</button>
                              <button class="button size-5 ">Weibo</button>
                              <button class="button size-5 ">Instapaper</button>
                          </div>
                      </div>
                  </div><a class="btn pull-right js-toolbar-action" aria-label="" href="#"><i class="fa fa-facebook"></i></a><a class="btn pull-right js-toolbar-action" aria-label="" href="#"><i class="fa fa-twitter"></i></a>
                  <div class="dropdown pull-left font-settings js-toolbar-action"><a class="btn toggle-dropdown" aria-label="Font Settings" href="#"><i class="fa fa-font"></i></a>
                      <div class="dropdown-menu dropdown-right">
                          <div class="dropdown-caret"><span class="caret-outer"></span><span class="caret-inner"></span></div>
                          <div class="buttons">
                              <button class="button size-2 font-reduce">A</button>
                              <button class="button size-2 font-enlarge">A</button>
                          </div>
                          <div class="buttons">
                              <button class="button size-2 ">Serif</button>
                              <button class="button size-2 ">Sans</button>
                          </div>
                          <div class="buttons">
                              <button class="button size-3 ">White</button>
                              <button class="button size-3 ">Sepia</button>
                              <button class="button size-3 ">Night</button>
                          </div>
                      </div>
                  </div>
                  <h1>
                  <i class="fa fa-circle-o-notch fa-spin"></i>
                  <a href="..">HTTP/网络</a>
              </h1>
              </div>
              <div class="page-wrapper" tabindex="-1" role="main">
                  <div class="page-inner">
                      <div id="book-search-results" class="open no-results">
                          <div class="search-noresults">
                              <section class="normal markdown-section">
                                  {!! $content !!}
                              </section>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <a href="diagram.html" class="navigation navigation-prev " aria-label="Previous page: 图表">
                      <i class="fa fa-angle-left"></i>
                  </a>
          <a href="code-editor.html" class="navigation navigation-next " aria-label="Next page: 代码编辑" style="margin-right: 0px;">
                      <i class="fa fa-angle-right"></i>
                  </a>
      </div>
      <script>
        var gitbook = gitbook || [];
        gitbook.push(function() {
            gitbook.page.hasChanged({ "page": { "title": "HTTP/网络", "level": "1.5.6", "depth": 2, "next": { "title": "代码编辑", "level": "1.5.7", "depth": 2, "path": "tools/code-editor.md", "ref": "tools/code-editor.md", "articles": [] }, "previous": { "title": "图表", "level": "1.5.5", "depth": 2, "path": "tools/diagram.md", "ref": "tools/diagram.md", "articles": [] }, "dir": "ltr" }, "config": { "plugins": ["comment"], "styles": { "website": "styles/website.css", "pdf": "styles/pdf.css", "epub": "styles/epub.css", "mobi": "styles/mobi.css", "ebook": "styles/ebook.css", "print": "styles/print.css" }, "pluginsConfig": { "comment": { "highlightCommented": true }, "highlight": {}, "search": {}, "lunr": { "maxIndexSize": 1000000, "ignoreSpecialCharacters": false }, "sharing": { "facebook": true, "twitter": true, "google": false, "weibo": false, "instapaper": false, "vk": false, "all": ["facebook", "google", "twitter", "weibo", "instapaper"] }, "fontsettings": { "theme": "white", "family": "sans", "size": 2 }, "theme-default": { "styles": { "website": "styles/website.css", "pdf": "styles/pdf.css", "epub": "styles/epub.css", "mobi": "styles/mobi.css", "ebook": "styles/ebook.css", "print": "styles/print.css" }, "showLevel": false } }, "github": "dwqs/fedHandlebook", "theme": "default", "author": "Pomy", "pdf": { "pageNumbers": true, "fontSize": 16, "fontFamily": "Arial", "paperSize": "a4", "chapterMark": "pagebreak", "pageBreaksBefore": "/", "margin": { "right": 62, "left": 62, "top": 56, "bottom": 56 } }, "structure": { "langs": "LANGS.md", "readme": "README.md", "glossary": "GLOSSARY.md", "summary": "SUMMARY.md" }, "variables": {}, "title": "Front-end Developer HandBook", "language": "zh", "links": { "sidebar": { "Front-end Developer HandBook": "https://www.gitbook.com/book/dwqs/frontenddevhandbook" }, "gitbook": true }, "gitbook": "*", "description": "Chinese of Front-end Developer HandBook" }, "file": { "path": "tools/http.md", "mtime": "2017-06-03T06:01:09.000Z", "type": "markdown" }, "gitbook": { "version": "3.2.2", "time": "2017-06-03T06:01:43.581Z" }, "basePath": "..", "book": { "language": "" } });
        });
      </script>
    </div>
    <script src="{{ asset('js/doc/docbook.js') }}"></script>
    <script src="{{ asset('js/doc/theme.js') }}"></script>
    <script src="{{ asset('js/doc/book_plugin.js') }}"></script>
    <script src="{{ asset('js/doc/search-engine.js') }}"></script>
    <script src="{{ asset('js/doc/search.js') }}"></script>
    <script src="{{ asset('js/doc/lunr.min.js') }}"></script>
    <script src="{{ asset('js/doc/sharing_button.js') }}"></script>
    <script src="{{ asset('js/doc/font_settings.js') }}"></script>
</body>

</html>