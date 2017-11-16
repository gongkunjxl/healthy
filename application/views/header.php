<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <title>健康网站首页</title>
<!--   <link rel="stylesheet" href="static/css/bootstrap.min.css"> -->
  <link rel="stylesheet" href="static/layui/css/layui.css">
  <script type="text/javascript" src="static/layui/layui.js"></script>
</head>
<body>
<div style="height: 130px;width: 100%; background-color: #1792CD;">
  <div class="layui-container">
    <img src="static/images/head_logo.png" style="height: 60px; margin-top: 10px; "  alt="logo">
    <ul class="layui-nav" style="height: 60px; background-color:#1792CD;"  lay-filter="">
      <li class="layui-nav-item layui-this" ><a href="main/message" style="font-weight: 300; color: #fff;">首页&nbsp;&nbsp;&nbsp;&nbsp;|</a></li>
      <li class="layui-nav-item"><a href="" style="font-weight: 300; color: #fff;">慢性疾病&nbsp;&nbsp;&nbsp;&nbsp;|</a></li>
      <li class="layui-nav-item"><a href="" style="font-weight: 300; color: #fff;">健康生活方式&nbsp;&nbsp;&nbsp;&nbsp;|</a></li>
      <li class="layui-nav-item"><a href="" style="font-weight: 300; color: #fff;">健康专家库&nbsp;&nbsp;&nbsp;&nbsp;|</a></li>

     <!-- 右边导航 -->
      <li class="layui-nav-item" style="float: right;"><a href="" style="font-weight: 300; color: #fff;">幻灯&nbsp;&nbsp;&nbsp;&nbsp;|</a></li>
      <li class="layui-nav-item" style="float: right;"><a href="" style="font-weight: 300; color: #fff;">文章&nbsp;&nbsp;&nbsp;&nbsp;|</a></li>
      <li class="layui-nav-item" style="float: right;"><a href="" style="font-weight: 300; color: #fff;">音频&nbsp;&nbsp;&nbsp;&nbsp;|</a></li>
      <li class="layui-nav-item" style="float: right;"><a href="" style="font-weight: 300; color: #fff;">视频&nbsp;&nbsp;&nbsp;&nbsp;|</a></li>
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


















