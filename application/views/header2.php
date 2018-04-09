<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// $username = $_SESSION['username'];
if(isset($_SESSION['userid']) && $_SESSION['userid']>0){
   $userid = $_SESSION['userid'];
   $nickname = $_SESSION['nickname'];
   $type = $_SESSION['userType'];
}else{
  $userid=0; 
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <title>健康网站首页</title>
  <link rel="stylesheet" href="/static/css/bootstrap.min.css">
  <link rel="stylesheet" href="/static/layui/css/layui.css">
  <link rel="stylesheet" href="/static/video/assets/hivideo.css">
  <link rel="stylesheet" href="/static/css/index-page.css">

  <link rel="stylesheet" href="/static/css/video-page-condition.css">
  <script type="text/javascript" src="/static/layui/layui.js"></script>
  <script type="text/javascript" src="/static/js/jquery-3.2.1.min.js"></script>
  <!-- <script type="text/javascript" src="/static/js/jquery-2.1.4.js"></script> -->

<script type="text/javascript" src="/static/js/many-condition.js"></script> 

<!-- 视频 -->
  <script type="text/javascript" src="/static/js/html5media.min.js"></script>
<!-- ppt -->
  <script type="text/javascript" src="/static/video/hivideo.js"></script>
<!-- pdf show -->
 <script type="text/javascript" src="/static/js/pdfobject.js"></script>

<!-- select -->
<script type="text/javascript" src="/static/js/province.js"></script>
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
<body >
<div  class="div-layout">
<div class="layui-container" style="display:inline-block;height: 105px;">
    
    <ul style="display: inline;margin-left:auto;margin-right:auto;">
       <img src="/static/images/激励计划镂空.png" style="float: left;width: 100px;height: 100px;margin-top: 1px;">
       <p style="font-size:x-large;font-family: serif;font-weight: bold;color: #00B2EE;margin-top: 20px;margin-bottom: 15px;">中国健康知识传播激励计划</p>
       <p style="font-size: xx-large;font-family: serif;font-weight: bolder;color: #009ACD;">健 康 科 普 资 源 库</p>
    </ul>
    
  </div>
<div class="nav">
  <div class="layui-container">
    <div class="logo">
    </div>
    <!-- <img class="logo" src="/static/images/head_logo.png"   alt="logo"> -->
   <ul class="layui-nav" style="margin-top: 10px;" > 
        <li class="layui-nav-item" style="line-height: 30px;">
          <a style="text-decoration: none; color: white; font-size: 16px;" href="/main/index">首页</a>
        </li>
        <li class="layui-nav-item" style="padding-right:10px;line-height: 30px;">
          <a style="text-decoration: none; color: white; font-size: 16px;">慢性疾病</a>
          <dl class="layui-nav-child">
            <dd style="line-height: 36px;"><a style="text-decoration: none;" href="/main/searchIndex/1/1">高血脂</a></dd>
            <dd style="line-height: 36px;"><a style="text-decoration: none;" href="/main/searchIndex/1/2">脑卒中</a></dd>
            <dd style="line-height: 36px;"><a style="text-decoration: none;" href="/main/searchIndex/1/3">高血压</a></dd>
          </dl>
        </li>
        <li class="layui-nav-item" style="margin-left: 1%;line-height: 30px;">
          <a style="text-decoration: none; color: white; padding-right: 20px; font-size: 16px;">健康生活方式</a>
          <dl class="layui-nav-child">
            <dd style="line-height: 36px;"><a style="text-decoration: none;" href="/main/searchIndex/2/4">情绪管理</a></dd>
            <dd style="line-height: 36px;"><a style="text-decoration: none;" href="/main/searchIndex/2/5">膳食平衡</a></dd>
          </dl>
        </li>
        <!-- the login -->
    </ul>
    <div class="right-nav">
      <?php if($userid>0):?>
        <ul class="layui-nav" style="margin-top: 0;width: 100%;">
           <li class="layui-nav-item" style="max-width: 180px;line-height: 30px;">
              <a style="text-decoration: none; margin-right: 20px; max-width: 150px; overflow: hidden; white-space:nowrap;"><img src="/static/images/header_1.jpg" class="layui-nav-img"><?php echo $nickname; ?></a>
              <dl class="layui-nav-child">
                <?php if($type==2): ?>
                  <dd><a href="/main/expertUpdateInfo" style="text-decoration: none; line-height: 36px;">修改信息</a></dd>
                <?php endif; ?>
                <dd><a href="/main/logout" style="text-decoration: none; line-height: 36px;">退 出</a></dd>
              </dl>
          </li>
        </ul>
      <?php else:?>
        <span class="login-word"><a href="/main/login">登陆</a><label>|</label><a href="/main/register">注册</a></span>
      <?php endif;?>

    </div>
  </div>
</div>

<script>
//注意进度条依赖 element 模块，否则无法进行正常渲染和功能性操作
layui.use('element', function(){
  var element = layui.element;
});
</script>  

















