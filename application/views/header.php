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
<html >
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
<body>
<div class="nav">
  <div class="layui-container">
    <img class="logo" src="/static/images/head_logo.png"   alt="logo">
    <ul class="layui-nav">
        <li class="layui-nav-item">
          <a style="text-decoration: none;" href="/main/index">首页</a>
        </li>
        <li class="layui-nav-item" style="padding-right:10px;">
          <a style="text-decoration: none;">慢性疾病</a>
          <dl class="layui-nav-child">
            <dd style="line-height: 36px;"><a style="text-decoration: none;" href="/main/searchIndex/1/1">高血脂</a></dd>
            <dd style="line-height: 36px;"><a style="text-decoration: none;" href="/main/searchIndex/1/2">脑卒中</a></dd>
            <dd style="line-height: 36px;"><a style="text-decoration: none;" href="/main/searchIndex/1/3">高血压</a></dd>
          </dl>
        </li>
        <li class="layui-nav-item" style="margin-left: 1%;">
          <a style="text-decoration: none; padding-right: 20px;">健康生活方式</a>
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
           <li class="layui-nav-item" style="max-width: 180px;">
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
        <span class="login-word"><a style="text-decoration: none;" href="/main/login">登陆</a><label>|</label><a href="/main/register">注册</a></span>
      <?php endif;?>

    </div>
  </div>
</div>
<div class="layui-container">
  <div class="index-search">
    <div class="search-bar">
      <form class="layui-form" >
        <div class="layui-form-item">
          <div class="layui-input-block search-input">
            <input type="text" id="search"  style="border:1.5px solid #009ACD;border-radius:0px;" name="search"  <?php if($head_data['search'] == '0'):?> placeholder="本站共收<?php echo $head_data['count']; ?>份科普材料" <?php else: ?> value="<?php echo $head_data['search']; ?>" <?php endif; ?> autocomplete="off" class="layui-input">
          </div>
          <div class="layui-input-inline" style="width: 80px;">
                    <button  style="width: 80px; height: 38px; font-size: 14px;background-color: #009ACD;border: 0;border-radius:0px;" lay-submit="" lay-filter="searchData"><i class="layui-icon" style="margin-right:7px;">&#xe615;</i>搜索</button>
                </div>
        </div>
      </form>
    </div>
    <!-- <?php //echo var_dump($head_data); ?> -->
    <!-- 选择 -->
    <div class="search-option">
      <label>选项:</label>
      <select id="theme" onchange="selTheme();" style="width: 80px;">
        <option value="0"  <?php if($head_data['theme']== 0):?> selected="true" <?php endif; ?>>主题</option>
        <option value="1"  <?php if($head_data['theme']== 1):?> selected="true" <?php endif; ?>>慢性病</option>
        <option value="2"  <?php if($head_data['theme']== 2):?> selected="true" <?php endif; ?>>健康生活</option>
      </select>
      <select id="type" onchange="selType();" style="width: 80px;" >
      <!--  <option value="0">类型</option> -->
  <!--      <option value="1">慢性病</option>
        <option value="2">心脏病</option>
        <option value="3">冠心病</option> -->
      </select>
      <select id="media" onchange="selMedia();" style="width: 80px;" >
        <option value="0" <?php if($head_data['media']== 0):?> selected="true" <?php endif; ?>>素材</option>
        <option value="1" <?php if($head_data['media']== 1):?> selected="true" <?php endif; ?>>专家</option>
        <option value="2" <?php if($head_data['media']== 2):?> selected="true" <?php endif; ?>>视频</option>
        <option value="3" <?php if($head_data['media']== 3):?> selected="true" <?php endif; ?>>文章</option>
        <option value="4" <?php if($head_data['media']== 4):?> selected="true" <?php endif; ?>>音频</option>
        <option value="5" <?php if($head_data['media']== 5):?> selected="true" <?php endif; ?>>图片</option>
        <option value="6" <?php if($head_data['media']== 6):?> selected="true" <?php endif; ?>>PPT</option>
      </select>
      
      <select id="language" onchange="selLanguage();" style="width: 80px; ">
        <option value="0" <?php if($head_data['language']== 0):?> selected="true" <?php endif; ?>>语言</option>
        <option value="1" <?php if($head_data['language']== 1):?> selected="true" <?php endif; ?>>中文</option>
        <option value="2" <?php if($head_data['language']== 2):?> selected="true" <?php endif; ?>>English</option>
      </select>
      <select id="province" onchange="selProvince();" style="width: 80px;">
        <!-- <option value="0">制作省份</option>
        <option value="1">北京</option>
        <option value="2">广州</option> -->
      </select>
    </div>
  </div>
</div>

<script>
  // the province
var provinceObj = document.getElementById("province");
var proHTML = '';
var provData = "<?php echo $head_data['province']; ?>";
//alert(provData);
proHTML=proHTML+'<option value="0">省份</option>';
for(value in province){
    if(province[value] == provData){
      proHTML=proHTML+'<option selected="true" value="'+province[value]+'">'+province[value]+"</option>";
    }else{
      proHTML=proHTML+'<option value="'+province[value]+'">'+province[value]+"</option>";
    }
}
provinceObj.innerHTML = proHTML;

var sickData,lifeData;
$.ajaxSettings.async = false;
$.getJSON("/static/js/sickTheme.json",function(data){ 
    sickData = data; 
}); 
$.getJSON("/static/js/lifeTheme.json",function(data){ 
  lifeData = data; 
});

// the type 
var theme = "<?php echo $head_data['theme']; ?>";
var type = "<?php echo $head_data['type']; ?>"
var typeObj = document.getElementById("type");
// alert(theme);
// alert(type);
var innerHTML = '';
innerHTML=innerHTML+'<option value="0">类型</option>';
if(theme == '1'){
    for(value in sickData){
      if(sickData[value].id == type){
        innerHTML=innerHTML+'<option selected="true" value="'+sickData[value].id+'">'+sickData[value].name+"</option>";
      }else{
        innerHTML=innerHTML+'<option value="'+sickData[value].id+'">'+sickData[value].name+"</option>";
      }
    }
}
if(theme == '2'){
  for(value in lifeData){
    if(lifeData[value].id == type){
      innerHTML=innerHTML+'<option selected="true" value="'+lifeData[value].id+'">'+lifeData[value].name+"</option>";
    }else{
      innerHTML=innerHTML+'<option value="'+lifeData[value].id+'">'+lifeData[value].name+"</option>";
    }
  }
}
typeObj.innerHTML = innerHTML; 

//注意进度条依赖 element 模块，否则无法进行正常渲染和功能性操作
layui.use('element', function(){
  var element = layui.element;
});
</script>  
<!-- The index.js -->
<script type="text/javascript" src="/static/js/index.js"></script>

















