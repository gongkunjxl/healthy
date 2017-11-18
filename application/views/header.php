<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <title>健康网站首页</title>
<!--   <link rel="stylesheet" href="static/css/bootstrap.min.css"> -->
  <link rel="stylesheet" href="/static/layui/css/layui.css">
  <link rel="stylesheet" href="/static/css/index-page.css">
  <script type="text/javascript" src="/static/layui/layui.js"></script>
<!-- 视频 -->
  <script type="text/javascript" src="/static/js/html5media.min.js"></script>
<!-- 音频 -->
  <script type="text/javascript" src="/static/js/jquery-2.1.4.js"></script>
  <script type="text/javascript" src="/static/js/weixinAudio.js"></script>
</head>
<body>
<div class="nav">
  <div class="container">
    <img class="headerimg" src="/static/images/head_logo.png"   alt="logo">
  </div>
  <div class="container">
    <ul class="nav2">
        <li class="layui-breadcrumb" lay-separator="|" style="top: 100px;">
          <a href="">首页</a>
          <a href="">慢性疾病</a>
          <a href="">健康生活方式</a>
          <a href="">健康科普专家库</a>
        </li>
    </ul>

    <ul class="nav3">
      <li class="layui-breadcrumb" lay-separator="|">
          <a href="/main/video">视频</a>
          <a href="">音频</a>
          <a href="">文章</a>
          <a href="">幻灯</a>
          <a href="">其他</a>
      </li>
    </ul>
  </div>
</div>


<!-- <ul class="layui-nav"  lay-filter="">
  <li class="layui-nav-item"><a href="main/message">最新活动</a></li>
  <li class="layui-nav-item layui-this"><a href="">产品</a></li>
  <li class="layui-nav-item layui-hide-xs"><a href="">大数据</a></li>
  <li class="layui-nav-item layui-hide-xs">
    <a href="javascript:;">解决方案</a>
    <dl class="layui-nav-child"> 
      <dd><a href="">移动模块</a></dd>
      <dd><a href="">后台模版</a></dd>
      <dd><a href="">电商平台</a></dd>
    </dl>
  </li>
  <li class="layui-nav-item layui-hide-xs"><a href="">社区</a></li>
</ul> --> 
  <!-- <ul class="layui-nav" lay-filter="" >
      <li class="layui-nav-item ">
        <a href="http://www.layui.com/doc/">文档</a> 
      </li>
      <li class="layui-nav-item">
        <a href="http://www.layui.com/demo/">示例</a>
      </li> 
      <li class="layui-nav-item layui-hide-xs">
        <a href="http://fly.layui.com/" target="_blank">社区</a>
      </li>
      
      <li class="layui-nav-item layui-hide-xs">
        <a href="javascript:;">周边</span></a>
        <dl class="layui-nav-child">
          <dd><a href="http://layim.layui.com/" target="_blank">即时聊天</a></dd>
          <dd><a href="http://www.layui.com/alone.html" target="_blank">独立组件</a></dd>
          <dd><a href="http://fly.layui.com/jie/8157/" target="_blank">社区模板</a></dd>
          <dd><a href="http://fly.layui.com/jie/9842/" target="_blank">Axure组件</a></dd>
        </dl>
      </li>
      <li class="layui-nav-item layui-hide-xs">
        <a href="http://www.layui.com/v1/" target="_blank">旧版</a>
      </li>
      <li class="layui-nav-item layui-hide-sm layui-show-xs">
        <a href="javascript:;">更多<span class="layui-nav-more"></span></a>
        <dl class="layui-nav-child layui-anim layui-anim-upbit">
          <dd class="layui-this"><a href="http://fly.layui.com/" target="_blank">社区</a></dd>
           <dd class="layui-this"><a href="http://fly.layui.com/" target="_blank">社区</a></dd>
            <dd class="layui-this"><a href="http://fly.layui.com/" target="_blank">社区</a></dd>
        </dl>
      </li>
    
</ul> -->


<script>
//注意进度条依赖 element 模块，否则无法进行正常渲染和功能性操作
layui.use('element', function(){
  var element = layui.element;
});
</script>  


















