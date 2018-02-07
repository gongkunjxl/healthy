<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// $username = $_SESSION['username'];
if(isset($_SESSION['userid']) && $_SESSION['userid']>0){
   $userid = $_SESSION['userid'];
   $nickname = $_SESSION['nickname'];
   $type = $_SESSION['type'];
}else{
  $userid=0; 
}
?>
<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8">

        <title><?php echo $data['name']; ?></title>

        <meta name="description" content="A framework for easily creating beautiful presentations using HTML">
        <meta name="author" content="Hakim El Hattab">

        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

        <link rel="stylesheet" href="/static/reveal/css/reveal.css">
        <link rel="stylesheet" href="/static/reveal/css/theme/black.css" id="theme">

        <!-- Theme used for syntax highlighting of code -->
        <link rel="stylesheet" href="/static/reveal/lib/css/zenburn.css">

        <!-- Printing and PDF exports -->
        <script>
            var link = document.createElement( 'link' );
            link.rel = 'stylesheet';
            link.type = 'text/css';
            link.href = window.location.search.match( /print-pdf/gi ) ? '/static/reveal/css/print/pdf.css' : '/static/reveal/css/print/paper.css';
            document.getElementsByTagName( 'head' )[0].appendChild( link );
        </script>

        <!--[if lt IE 9]>
        <script src="lib/js/html5shiv.js"></script>
        <![endif]-->
    </head>

    <body>

        <div class="reveal">

            <!-- Any section element inside of this container is displayed as a slide -->
            <div class="slides">
                <?php for ($i=1; $i <= $data['page_count']; $i++){?>
                    <section>
                        <div><img src="/<?php echo $data['pic_url'].'/'.$i; ?>.jpeg" style=""></div>
                    </section>
                <?php } ?>

            </div>

        </div>

        <script src="/static/reveal/lib/js/head.min.js"></script>
        <script src="/static/reveal/js/reveal.js"></script>

        <script>

            // More info https://github.com/hakimel/reveal.js#configuration
            Reveal.initialize({
                controls: true,
                progress: true,
                history: true,
                center: true,

                transition: 'slide', // none/fade/slide/convex/concave/zoom

                // More info https://github.com/hakimel/reveal.js#dependencies
                dependencies: [
                    { src: '/static/reveal/lib/js/classList.js', condition: function() { return !document.body.classList; } },
                    { src: '/static/reveal/plugin/markdown/marked.js', condition: function() { return !!document.querySelector( '[data-markdown]' ); } },
                    { src: '/static/reveal/plugin/markdown/markdown.js', condition: function() { return !!document.querySelector( '[data-markdown]' ); } },
                    { src: '/static/reveal/plugin/highlight/highlight.js', async: true, callback: function() { hljs.initHighlightingOnLoad(); } },
                    { src: '/static/reveal/plugin/search/search.js', async: true },
                    { src: '/static/reveal/plugin/zoom-js/zoom.js', async: true },
                    { src: '/static/reveal/plugin/notes/notes.js', async: true }
                ]
            });

        </script>

    </body>
</html>
