<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<link rel="stylesheet" type="text/css" href="/static/css/video-page.css">

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

<script type="text/javascript">
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









