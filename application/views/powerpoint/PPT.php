<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<link rel="stylesheet" type="text/css" href="/static/css/ppt-info-page.css">

<div class="layui-container">
    <div class="layui-row ">
        <!-- ledt-->
        <div class="layui-col-md8">     
            <div class="reveal">
                <div class="slides">
                    <section>
                        <div><img src="/ppt/14.jpeg" style=""></div>
                    </section>
                </div>
            </div>              
        </div>

        <!-- 右边列表-->
        <div class="layui-col-md4">  
            <div class="ppt-list">
                <div class="ppt-title">
                    <p >相关推荐</p>
                </div>
                <ul class="flow-default" id="LAY_video">
                 <!-- <a class="apointer">
                    <li id="video" onclick="videoClick('sound.mp4');" value="sound.mp4">
                        <img class="title-image" src="/static/images/image2.png" value="100">
                        <p>管理胆固醇演讲管理胆固醇演讲管理胆固醇演讲管理胆固醇演讲</p>
                        <p class="font-set"> 播放: 100</p>
                        <p class="font-set"> 上传日期: 2017.11.12</p>               
                    </li>
                </a> -->
              <!--   <a class="apointer">
                     <li id="video">
                        <img class="title-image" src="/static/images/image2.png">
                        <p>管理胆固醇演讲管理胆固醇演讲管理胆固醇演讲管理胆固醇演讲</p>
                        <p class="font-set"> 播放: 100</p>
                        <p class="font-set"> 上传日期: 2017.11.12</p>               
                    </li>
                </a> -->
            <!--     <a class="apointer">
                     <li id="video">
                        <img class="title-image" src="/static/images/image2.png">
                        <p>管理胆固醇演讲管理胆固醇演讲管理胆固醇演讲管理胆固醇演讲</p>
                        <p class="font-set"> 播放: 100</p>
                        <p class="font-set"> 上传日期: 2017.11.12</p>               
                    </li>
                </a> -->

                </ul>
            </div>
        </div>
    </div>
</div>

<script>
//一般直接写在一个js文件中
layui.use(['layer', 'form'], function(){
  var layer = layui.layer
  ,form = layui.form;
 
});
</script> 

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

<!-- 流加载 -->
<script>
layui.use('flow', function(){
    var flow = layui.flow;
 
     flow.load({
        elem: '#LAY_video' //流加载容器
        ,scrollElem: '#LAY_video' //滚动条所在元素，一般不用填，此处只是演示需要。
        ,isAuto: false
        ,isLazyimg: true
        ,done: function(page, next){ //加载下一页
          //模拟插入
          setTimeout(function(){
            var lis = [];
            for(var i = 0; i < 6; i++){
                var litem='<a class="apointer"><li onclick="videoClick(\'sound.mp4\');" id="video" value="sound.mp4">\
                <img class="title-image" src="/static/images/image2.png" value="100">\
                <p>管理胆固醇演讲管理胆固醇演讲管理胆固醇演讲管理胆固醇演讲</p>\
                <p class="font-set"> 播放: 100</p>\
                <p class="font-set"> 上传日期: 2017.11.12</p>\
                </li></a>';
              // var litem='<a href="#"><li><img style="width:100px; height:60px;" lay-src="http://s17.mogucdn.com/p2/161011/upload_279h87jbc9l0hkl54djjjh42dc7i1_800x480.jpg?v='+ ( (page-1)*6 + i + 1 ) +'"></li></a>'
              lis.push(litem);
            }
            next(lis.join(''), page < 6); //假设总页数为 6
          }, 500);
        }
      });
});
</script>











