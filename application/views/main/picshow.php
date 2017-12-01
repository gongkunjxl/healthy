<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
 <link rel="stylesheet" href="/static/layui/css/layui.css">
 <script type="text/javascript" src="/static/layui/layui.js"></script>
 <body>
<div class="layui-container">
	<!-- <div class="layui-carousel" id="picplay" style="margin:150px auto;"> -->
	  <!-- <div carousel-item=""> -->
	   <!--  <div><img src="/picture/pic_01.png"></div>
	    <div><img src="/picture/pic_02.png"></div>
	    <div><img src="/picture/pic_03.png"></div>
	    <div><img src="/picture/pic_04.png"></div>
	    <div><img src="/picture/pic_05.png"></div>
	    <div><img src="/picture/pic_06.png"></div> -->
	  <!-- </div> -->
	  <div id="layer-photos-demo" class="layer-photos-demo">
		  <img layer-pid="图片id，可以不写" layer-src="/picture/pic_01.png" src="/picture/pic_01.png" alt="图片名">
		  <img layer-pid="图片id，可以不写" layer-src="/picture/pic_02.png" src="/picture/pic_02.png" alt="图片名">
		  <img layer-pid="图片id，可以不写" layer-src="/picture/pic_03.png" src="/picture/pic_03.png" alt="图片名">
		  <img layer-pid="图片id，可以不写" layer-src="/picture/pic_04.png" src="/picture/pic_04.png" alt="图片名">
	</div>
</div>
<script>
layui.use('layer', function(){ //独立版的layer无需执行这一句
	layer.photos({
	  photos: '#layer-photos-demo'
	  ,anim: 5 	//0-6的选择，指定弹出图片动画类型，默认随机（请注意，3.0之前的版本用shift参数）
	});
			
});
</script>






<!-- <script>
layui.use(['carousel', 'form'], function(){
  var carousel = layui.carousel
  ,form = layui.form;
  //图片轮播
  carousel.render({
    elem: '#picplay'
    ,width: '60%'
    ,height: '40%'
    ,interval: 5000
  });

});
</script>
 -->
</body>



