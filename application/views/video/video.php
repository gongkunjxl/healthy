<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<link rel="stylesheet" href="/static/css/video-page.css">
<div class="layui-container">
    <div class="layui-row ">
		<!-- ledt-->
		<div class="layui-col-md8">		
		  	<!-- 视频 -->
			<div class="video-video">
		    	<div class="video-title">
		    		<h2>刘教授讲解冬季保暖技巧</h2>
		    	</div>	
		    	<!-- 内容 -->
		    	<div class="video-content">
					<div class="video-item" id="video-item">
						<video poster="/static/images/image1.png" controls preload style="background-color: black"> 
							<source src="/video/movie1.mp4"></source>
						</video>
					</div>
		    	</div>
		    </div>			    
	  	</div>

	  	<!-- 右边列表-->
	  	<div class="layui-col-md4">  
	  		<div class="video-list">
		  		<div class="video-title">
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
<div style="clear: both;"></div>
<script>
//一般直接写在一个js文件中
layui.use(['layer', 'form'], function(){
  var layer = layui.layer
  ,form = layui.form;
 
});
</script>
<!-- audio -->
<script>
	var audio = {
		changeClass: function (target,id) {
	       	var className = $(target).attr('class');
	       	var ids = document.getElementById(id);
	       	(className == 'on')
	           	? $(target).removeClass('on').addClass('off')
	           	: $(target).removeClass('off').addClass('on');
	       	(className == 'on')
	           	? ids.pause()
	           	: ids.play();
	   	},
		play:function(){
			document.getElementById('media').play();
		}
	}
	// audio.play();
</script>
<script>
	// var piclayer = {
	// 	changeClass: function (target,id) {
	// 		id='#'+id;
	//     	alert(id);
	// 		layui.use('layer', function(){ //独立版的layer无需执行这一句
	// 			alert(id);
	// 			layer.photos({
	// 			  photos: id
	// 			  ,anim: 5 	//0-6的选择，指定弹出图片动画类型，默认随机（请注意，3.0之前的版本用shift参数）
	// 			});		
	// 	   });
	//    	}
	// }
layui.use('layer', function(){ //独立版的layer无需执行这一句
	layer.photos({
	  photos: '#layer-photos-show1'
	  ,anim: 5 	//0-6的选择，指定弹出图片动画类型，默认随机（请注意，3.0之前的版本用shift参数）
	});
	layer.photos({
	  photos: '#layer-photos-show2'
	  ,anim: 5 	//0-6的选择，指定弹出图片动画类型，默认随机（请注意，3.0之前的版本用shift参数）
	});
	layer.photos({
	  photos: '#layer-photos-show3'
	  ,anim: 5 	//0-6的选择，指定弹出图片动画类型，默认随机（请注意，3.0之前的版本用shift参数）
	});
	layer.photos({
	  photos: '#layer-photos-show4'
	  ,anim: 5 	//0-6的选择，指定弹出图片动画类型，默认随机（请注意，3.0之前的版本用shift参数）
	});
		
			
});
</script>
<!-- the flex -->
<script type="text/javascript">
	 layui.use('util', function(){
	  var util = layui.util;  //固定块
	  util.fixbar({
	    bar1: '&#xe642'
	    ,bar2: false
	    ,css: {right: 50, bottom: 250}
	    ,bgcolor: '#009ACD'
	    ,click: function(type){
	      
	    }
	  });
	});
	function videoClick(value)
	{
		// alert(value);
		// 删除
       	document.getElementById("video-item").innerHTML="";

       	// add
       	document.getElementById("video-item").innerHTML='<video poster="/static/images/image2.png" controls preload style="background-color: black">\
       			<source src="/video/movie2.mp4"></source></video>\
       			<p>这个真的好难</p>';
       	// alert(document.getElementById("video-item").innerHTML);
	}
	// $("ul li").on("click",function(){      //只需要找到你点击的是哪个ul里面的就行

 //     alert($(this).text());
 //       // alert($(this).attr("img",$(this).val()));
 //       // alert($(this).attr("value"));
 //       //删除div 
 //       // var video=document.getElementById("video-item"); 
 //       // video.remove('video','p');

 //     // alert($(this).arrt("value"));
 // });
</script>










