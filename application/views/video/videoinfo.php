<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<link rel="stylesheet" type="text/css" href="/static/css/videoinfo-page.css">

<div class="layui-container">
	<!-- <?php //var_dump($data); ?> -->
    <div class="layui-row ">
		<!-- ledt-->
		<div class="layui-col-md8">		
		  	<!-- 视频 -->
			<div class="video-video">
		    	<div class="video-title">
		    		<h2><?php echo $data['name']; ?></h2>
		    	</div>	
		    	<!-- 内容 -->
		    	<div class="video-content">
					<div class="video-item" id="video-item">
						<video poster="<?php echo $data['covAddr']; ?>" controls preload style="background-color: black"> 
							<source src="<?php echo $data['videoAddr']; ?>"></source>
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
function formatDateTime(timeStamp) {   
    var date = new Date();  
    date.setTime(timeStamp * 1000);  
    var y = date.getFullYear();      
    var m = date.getMonth() + 1;      
    m = m < 10 ? ('0' + m) : m;      
    var d = date.getDate();      
    d = d < 10 ? ('0' + d) : d;          
    return y + '-' + m + '-' + d;      
};
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
	        var data={
					page: page
				};
				$.ajax({
					url: '/api/videoRecommend',
					type: 'post',
					dataType:'json',
					data: data,
					success: function (data) {
				     	 // alert(JSON.stringify(data));
				     	// alert(data.length);
				     	 for (var i = 0; i < data.length; i++) {
				         	var litem='<a class="apointer"><li onclick="videoClick(\''+data[i].id+'\');" id="'+data[i].id+'">\
	         				<img class="title-image" src="'+data[i].covAddr+'">\
				         	<p>'+data[i].name+'</p>\
				         	<p class="font-set"> 播放: '+data[i].read+'</p>\
				         	<p class="font-set"> 上传日期: '+formatDateTime(data[i].ctime)+'</p>\
				         	</li></a>';
			     		    lis.push(litem);
				     	 }
				     	 next(lis.join(''), page < 6); //假设总页数为 6
				    },
				    error: function(data) {
				     	alert("Sorry error");
					}
				});
	      }, 500);
	    }
	  });
});
</script>

<script type="text/javascript">
	function videoClick(id)
	{
		alert(id);
		//request and update the read data
		var data={
			id: id
		};
		$.ajax({
		    url: '/api/videoPlay',
     		type: 'post',
     		dataType:'json',
     		data: data,
     		success: function (data) {
               alert(JSON.stringify(data));
         	},
         	error: function(data) {
               alert("Sorry error");
    		 }
     	});


		// 删除
      // 	document.getElementById("video-item").innerHTML="";

       	// // add
       	// document.getElementById("video-item").innerHTML='<video poster="/static/images/image2.png" controls preload style="background-color: black">\
       	// 		<source src="/video/movie2.mp4"></source></video>\
       	// 		<p>这个真的好难</p>';
       	// alert(document.getElementById("video-item").innerHTML);
	}

</script>









