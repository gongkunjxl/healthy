<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <title>健康网站首页</title>
  <link rel="stylesheet" href="static/css/bootstrap.min.css">
  <link rel="stylesheet" href="/static/layui/css/layui.css">
  <link rel="stylesheet" href="/static/video/assets/hivideo.css">
  <script type="text/javascript" src="/static/layui/layui.js"></script>
  <link rel="stylesheet" href="/static/css/index-page.css">

<!-- 视频 -->
  <script type="text/javascript" src="/static/js/html5media.min.js"></script>
<!-- 音频 -->
  <!-- <script type="text/javascript" src="/static/js/jquery-2.1.4.js"></script>
  <script type="text/javascript" src="/static/js/weixinAudio.js"></script>
 -->
  <script type="text/javascript" src="/static/js/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="/static/video/hivideo.js"></script>
<style type="text/css">
        .main-wrap{
            margin: 0 auto;
            min-width: 320px;
            max-width: 640px;
        }

        .main-wrap video{
            width: 100%;
        }
    </style>
</head>
<body>
<div class="nav">

  <div class="layui-container">
    <img class="logo" src="/static/images/head_logo.png"   alt="logo">
    <ul class="layui-nav">
        <li class="layui-nav-item">
          <a href="">首页</a>
        </li>
        <li class="layui-nav-item" style="padding-right:10px;">
          <a href="javascript:;">慢性疾病</a>
          <dl class="layui-nav-child">
            <dd><a href="javascript:;">高血压</a></dd>
            <dd><a href="javascript:;">糖尿病</a></dd>
            <dd><a href="javascript:;">心血管疾病</a></dd>
          </dl>
        </li>
        <li class="layui-nav-item" style="margin-left: 1%;">
          <a href="">健康生活方式</a>
        </li>
    </ul>
    <div class="right-nav">
        <img  class="login-icon" src="/static/images/login.png">
        <span class="login-word"><a href="#">登陆</a><label>|</label><a href="#">注册</a></span>
    </div>

  </div>
</div>

<script>
//注意进度条依赖 element 模块，否则无法进行正常渲染和功能性操作
layui.use('element', function(){
  var element = layui.element;
});
</script>  


















