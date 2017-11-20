<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<link rel="stylesheet" type="text/css" href="/static/css/video-page.css">
<div class="content-search">
    <form class="layui-form search-form" action="">
            <input class="search-input" type="text" name="title" autocomplete="off" placeholder="请输入您要搜索的关键词" />

            <div style="height: 15px"></div>

            <div class="layui-form-item">
                <div class="layui-inline">
                    <div class="layui-input-inline"  style="width: 120px;">
                        <select name="modules" lay-verify="required" lay-search="">
                            <option value="">主题</option>
                            <option value="1">layer</option>
                        </select>
                    </div>
                </div>
                <div class="layui-inline">
                    <div class="layui-input-inline search-form-item"  style="width: 120px; margin-left: 20px;">
                        <select name="modules" lay-verify="required" lay-search="">
                            <option value="">类型</option>
                            <option value="1">layer</option>
                        </select>
                    </div>
                </div>
                <div class="layui-inline">
                    <div class="layui-input-inline" style="width: 120px; margin-left: 20px;">
                        <select name="modules" lay-verify="required" lay-search="">
                            <option value="">语言</option>
                            <option value="1">layer</option>
                        </select>
                    </div>
                </div>
                <div class="layui-inline">
                    <div class="layui-input-inline" style="width: 120px; margin-left: 20px;">
                        <select name="modules" lay-verify="required" lay-search="">
                            <option value="">制作省市</option>
                            <option value="1">layer</option>
                        </select>
                    </div>
                </div>
                <div class="layui-inline">
                    <div class="layui-input-inline" style="width: 120px; margin-left: 20px;">
                        <button class="layui-icon" style="width: 115px; height: 38px;" lay-submit="" lay-filter="search">&#xe615; 搜索</button>
                    </div>
                </div>
            </div>
    </form>
</div>  
<div class="layui-container">
    <div class="layui-row ">
    	<!-- 左边 -->
    	<div class="layui-col-md3" style="height: auto; padding: 1px;">
    		<div class="quick-nav">
	    		<div class="quick-nav-title">
			    		<p>&nbsp;&nbsp;快速导航</p>
			    </div>
			    <div class="site-tree">
			    	<div class="site-tree-item">
			    		<label>慢性疾病</label>
			    		<ul>
			    			<li style="width: 40%;float: left;"><a href="#">高血脂</a></li>
			    			<li><a href="#">脑卒中</a></li>
			    			<li><a href="#">高血压</a></li>
			    			<li><a href="#">糖尿病</a></li>
			    			<li><a href="#">心梗</a></li>
			    		</ul>
			    	</div>
			    	<div class="site-tree-item">
			    		<label>健康生活方式</label>
			    		<ul>
			    			<li><a href="#">情绪管理</a></li>
			    			<li><a href="#">智慧选择</a></li>
			    			<li><a href="#">吃动平衡</a></li>
			    			<li><a href="#">膳食平衡</a></li>
			    		</ul>
			    	</div>
			    	<div class="site-tree-item">
			    		<label>科普专家库</label>
			    		<ul>
			    			<li><a href="#">加入我们</a></li>		
			    		</ul>
			    	</div>
			    </div>
		    </div>
		</div>

		<!-- 中间 -->
		<div class="layui-col-md6" style="height:auto; overflow:hidden;">
		  	<!-- 视频 -->
			<div class="video-video">
		    	<div class="video-title">
		    		<p>视频播放</p>
		    	</div>
		    	<!-- 内容 -->
		    	<div class="video-content">
					<div class="video-item" id="video-item">
						<video poster="/static/images/image1.png" controls preload style="background-color: black"> 
							<source src="/video/movie.mp4"></source>
						</video>
						<p>管理胆固醇预防心梗演讲</p>
					</div>
		    	</div>
		    </div>			    
	  	</div>

	  	<!-- 右边登录-->
	  	<div class="layui-col-md3">  

	  		<!-- <div style="height: auto; padding: 1px; border:1px;background-color: #F5F5F5; padding-bottom: 20px;"> -->
			    
			 <!-- </div> -->
	  		<div class="video-list">
		  		<div class="video-title">
			    	<p >视频列表</p>
			    </div>

			    <!-- <ul class="flow-default" style="height: 300px;" id="LAY_demo2"></ul> -->
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
<div style="height: 40px;width: 100%;"></div>
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
       			<source src="/video/movie.mp4"></source></video>\
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









