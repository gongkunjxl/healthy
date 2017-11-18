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
					<div class="video-item" >
						<!-- <img src="/static/images/image1.png"/> -->
						<video poster="/static/images/image1.png" controls preload style="background-color: black"> 
							<source src="/vedio/movie.mp4"></source>
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
			    <ul class="flow-default" id="LAY_video1">
			    	<li >
			    		<img class="title-image" src="/static/images/image2.png">
			    		<p>管理胆固醇演讲管理胆固醇演讲管理胆固醇演讲管理胆固醇演讲</p>
			    		<p class="font-set"> 播放: 100</p>
			    		<p class="font-set"> 上传日期: 2017.11.12</p>			    
			    	</li>
			    	 <li >
			    		<img class="title-image" src="/static/images/image2.png">
			    		<p>管理胆固醇演讲管理胆固醇演讲管理胆固醇演讲管理胆固醇演讲</p>
			    		<p class="font-set"> 播放: 100</p>
			    		<p class="font-set"> 上传日期: 2017.11.12</p>			    
			    	</li>
			    	 <li >
			    		<img class="title-image" src="/static/images/image2.png">
			    		<p>管理胆固醇演讲管理胆固醇演讲管理胆固醇演讲管理胆固醇演讲</p>
			    		<p class="font-set"> 播放: 100</p>
			    		<p class="font-set"> 上传日期: 2017.11.12</p>			    
			    	</li>

			    </ul>
		    </div>

		  
		   <!--  <div class="index-login">
		    	<div class="index-login-title">
		    		<p>用户登录</p>
		    	</div>
		    	<div class="index-login-content">
			    	<form class="layui-form" action="">
					  	<div class="layui-form-item">
						    <div class="layui-input-block" style="width: 60%; margin-left: 10%;">
						       <input type="text" class="login-input" name="username" required  lay-verify="required" placeholder="用户名" autocomplete="off" class="layui-input">
						    </div>
					
						    <div class="layui-input-block" style="width: 60%; margin-left: 10%; margin-top: 20px;">
						       <input type="text" class="login-input" name="username" required  lay-verify="required" placeholder="密码" autocomplete="off" class="layui-input">
						    </div>
					  	</div>

					
						<div class="layui-form-item" style="margin-top: 30px; ">
						  	<div class="layui-inline" >
							    <div class="layui-input-block" style="margin-left: 5px;">
							     	<button class="layui-btn layui-btn-primary login-btn">&nbsp;&nbsp;登录&nbsp;&nbsp;</button>
							    </div>
							</div>
							<div class="layui-inline" >
							    <div class="layui-input-block" style="margin-left:5px;">
							     	<label class="layui-btn layui-btn-primary forget-pwd"><a href="#">忘记密码</a></label>
							    </div>
							</div>
					    </div>
					</form>
					<p class="register"><a href="#" >新用户注册</a></p>
		    	</div>	
		    </div> -->

		 

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
	          lis.push('<li><img style="width: 120px; height:60px; margin-left:20px;" lay-src="/static/images/image2.png"></li>')
	        }
	        next(lis.join(''), page < 6); //假设总页数为 6
	      }, 500);
	    }
	  });
});
</script>











