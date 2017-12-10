<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!--  <link rel="stylesheet" href="/static/layui/css/layui.css">
 <script type="text/javascript" src="/static/layui/layui.js"></script> -->
 <body>
<div class="layui-container">
	<?php echo var_dump($data); ?>

	 <!-- <?php //echo $data['sql_data']['nickname'];?>  -->
	<!-- <?php //echo $data['sql_data']['nickname'];?> -->

	<!-- form 参数传递和url参数传递完成 -->
	<div style="height: 50px; width: 100%;"></div>
	 <form class="layui-form" action="/main/testDemo" method="post" id="regForm" enctype="multipart/form-data">
		  <div class="layui-form-item">
		    <label class="layui-form-label">单行输入框</label>
		    <div class="layui-input-block">
		      <input type="text" name="title" lay-verify="title" autocomplete="off" placeholder="请输入标题" class="layui-input">
		    </div>
		  </div>
		  <div class="layui-form-item">
		    <label class="layui-form-label">验证必填项</label>
		    <div class="layui-input-block">
		      <input type="text" name="username" lay-verify="required" placeholder="请输入" autocomplete="off" class="layui-input">
		    </div>
		  </div>

		    <div class="layui-form-item">
			    <button class="layui-btn" lay-submit="" >提交</button>
			</div>
	 </form>

	 <!-- ajax数据请求测试 -->
	 <div style="width: 100%; height: 20px;"></div>
	 <button class="layui-btn layui-btn-normal" onclick="getData();">TestAjax</button>

	 <!-- 文件和图片的上传 -->
	 <div style="width: 100%; height: 30px;"></div>
	 <fieldset class="layui-elem-field layui-field-title" style="margin-top: 30px;">
	  <legend>上传多张图片</legend>
	</fieldset>
 
	<div class="layui-upload">
	  <button type="button" class="layui-btn" id="picupload">多图片选择</button> 
	  <blockquote class="layui-elem-quote layui-quote-nm" style="margin-top: 10px;">
	    预览图：
	    <div class="layui-upload-list" style="height: 200px;" id="picshow"></div>
	 </blockquote>
	 <button type="button" class="layui-btn" id="upbutton">开始上传</button>
	</div>



	<div style="width: 100%; height: 300px;"></div>







	<!-- <div class="layui-carousel" id="picplay" style="margin:150px auto;"> -->
	  <!-- <div carousel-item=""> -->
	   <!--  <div><img src="/picture/pic_01.png"></div>
	    <div><img src="/picture/pic_02.png"></div>
	    <div><img src="/picture/pic_03.png"></div>
	    <div><img src="/picture/pic_04.png"></div>
	    <div><img src="/picture/pic_05.png"></div>
	    <div><img src="/picture/pic_06.png"></div> -->
	  <!-- </div> -->
	  <!-- <div id="layer-photos-demo" class="layer-photos-demo">
		  <img layer-pid="图片id，可以不写" layer-src="/picture/pic_01.png" src="/picture/pic_01.png" alt="图片名">
		  <img layer-pid="图片id，可以不写" layer-src="/picture/pic_02.png" src="/picture/pic_02.png" alt="图片名">
		  <img layer-pid="图片id，可以不写" layer-src="/picture/pic_03.png" src="/picture/pic_03.png" alt="图片名">
		  <img layer-pid="图片id，可以不写" layer-src="/picture/pic_04.png" src="/picture/pic_04.png" alt="图片名">
	</div> -->
</div>


<!-- file upload -->
<script type="text/javascript">
layui.use('upload', function(){
  var $ = layui.jquery
  ,upload = layui.upload;

  upload.render({
    elem: '#picupload'
    ,url: '/api/uploadMutiPic'
    ,auto: false
    ,multiple: true
    ,bindAction: '#upbutton'
    ,choose: function(obj){
      //预读本地文件示例，不支持ie8
      obj.preview(function(index, file, result){
        	$('#picshow').append('<img src="'+ result +'" alt="'+ file.name +'" style="height:120px; width:120px; margin-left:30px; float:left" >')
      });
    }
    ,done: function(res){
    	alert("upload over");
      //上传完毕
    }
  });

});

</script>

<!-- 图片放大 -->
<script>
layui.use('layer', function(){ //独立版的layer无需执行这一句
	layer.photos({
	  photos: '#layer-photos-demo'
	  ,anim: 5 	//0-6的选择，指定弹出图片动画类型，默认随机（请注意，3.0之前的版本用shift参数）
	});
			
});
</script>

<!-- js post data -->
<script type="text/javascript">
	function getData()
	{
		var api_url = '<?php echo $data["api_url"];?>' + 'api/ajaxdemo';
		$.ajax({
               url: '/api/ajaxDemo',
               type: "post",
               dataType: 'json',
               data: {
                	action: 'getdata',
                    telephone: '1238688'
                },
                success: function(data) {
                  	// alert(data.postdata);
                  	alert(JSON.stringify(data));
            	},
            	error: function(res){
            		alert("ajax error");
            	}
         })
	}

</script>

<script type="text/javascript">
 layui.use('util', function(){
  var util = layui.util;  //固定块
  util.fixbar({
    bar1: '&#xe642'
    ,bar2: false
    ,css: {right: 50, bottom: 100}
    ,bgcolor: '#009ACD'
    ,click: function(type){
      
    }
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



