<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="layui-container" style="margin-top: 60px; height: auto; background-color: #fff">
	<div style="width: 100%;height: 240px; background-color: #F5F5F5;padding: 1px;">
		<div style="width: 80%; height: 140px; margin-left: 10%; margin-top: 60px; ">
			<form class="layui-form" action="">
			  <div class="layui-form-item">
			    <div class="layui-input-block" style="width: 60%;">
			      <input type="text" name="title" required  lay-verify="required" placeholder="请输入您的关键字" autocomplete="off" class="layui-input">
			    </div>
			  </div>

			  <!-- 主题 -->
			  <div class="layui-form-item" style="margin-top: 40px; ">
			  	<div class="layui-inline">
				    <div class="layui-input-block" style="width: 100px; margin-left: 80px;">
				      <select name="theme" lay-verify="required">
				        <option value="">主题</option>
				        <option value="0">北京</option>
				        <option value="1">上海</option>
				        <option value="2">广州</option>
				        <option value="3">深圳</option>
				        <option value="4">杭州</option>
				      </select>
				    </div>
			    </div>
			    <!-- 类型 -->
			    <div class="layui-inline">
				    <div class="layui-input-block" style="width: 100px; margin-left: 20px; ">
				      <select name="type" lay-verify="required">
				        <option value="">类型</option>
				        <option value="0">北京</option>
				        <option value="1">上海</option>
				        <option value="2">广州</option>
				        <option value="3">深圳</option>
				        <option value="4">杭州</option>
				      </select>
				    </div>
				</div>
				<!--  语言 -->
				<div class="layui-inline">
				    <div class="layui-input-block" style="width: 100px; margin-left: 20px; ">
				      <select name="type" lay-verify="required">
				        <option value="">语言</option>
				        <option value="0">北京</option>
				        <option value="1">上海</option>
				        <option value="2">广州</option>
				        <option value="3">深圳</option>
				        <option value="4">杭州</option>
				      </select>
				    </div>
				</div>

				<!-- 制作省份 -->
				<div class="layui-inline">
				    <div class="layui-input-block" style="width: 100px; margin-left: 20px; ">
				      <select name="type" lay-verify="required">
				        <option value="">制作省份</option>
				        <option value="0">北京</option>
				        <option value="1">上海</option>
				        <option value="2">广州</option>
				        <option value="3">深圳</option>
				        <option value="4">杭州</option>
				      </select>
				    </div>
				</div>
				<!-- 搜索按钮 -->
				<div class="layui-inline" >
				    <div class="layui-input-block" style="width: 100px; margin-left: 20px;">
				     <button class="layui-btn layui-btn-primary" ><i class="layui-icon">&#xe615;</i>&nbsp;&nbsp;搜索&nbsp;&nbsp;</button>
				    </div>
				</div>
	
			  </div>
			</form>
		</div>
	</div>	

	<!-- 内容布局 -->
	<div style="width: 100%;height: 60px;"></div>
	<div class="layui-row ">
	<!--  左边 -->
	  <div class="layui-col-md3" style="height: auto; padding: 1px; ">
	    <div style="width: 75%;margin-left: 10%; height: 100%; background-color: #F5F5F5;padding-bottom: 60px;">
	    	<div style="height: 25px;  background-color: #1792CD; padding: 0.1px; border: 0.1px;">
	    		<p style="margin-top: 4px; font-size: 12px; color: #fff; font-weight: 400" >&nbsp;&nbsp;快速导航</p>
	    	</div>

	    	<div style="height: auto;width: 100%;margin-top: 30px; margin-left: 30px;">
	    		<label style="font-weight: 400">慢性疾病</label>
	    		<ul style="line-height: 30px; font-weight: 300">
	    			<li style="width: 40%;float: left;"><a href="#">高血脂</a></li>
	    			<li><a href="#">脑卒中</a></li>
	    			<li><a href="#">高血压</a></li>
	    			<li><a href="#">糖尿病</a></li>
	    			<li><a href="#">心梗</a></li>
	    		</ul>
	    	</div>
	    	<div style="height: auto;width: 100%;margin-top: 30px; margin-left: 30px;">
	    		<label style="font-weight: 400">健康生活方式</label>
	    		<ul style="line-height: 30px; font-weight: 300">
	    			<li><a href="#">情绪管理</a></li>
	    			<li><a href="#">智慧选择</a></li>
	    			<li><a href="#">高血压</a></li>
	    			<li><a href="#">吃动平衡</a></li>
	    			<li><a href="#">膳食平衡</a></li>
	    		</ul>
	    	</div>
	    	<div style="height: auto;width: 100%;margin-top: 30px; margin-left: 30px;">
	    		<label style="font-weight: 400">科普专家库</label>
	    		<ul style="line-height: 30px; font-weight: 300">
	    			<li><a href="#">加入我们</a></li>		
	    		</ul>
	    	</div>
	    </div>
	  </div>

	  <!-- 中间 -->
	  <div class="layui-col-md6" style="height:auto; overflow:hidden;">
	  	<!-- 视频 -->
		<div style="height: 100%; background-color: #F5F5F5; overflow:hidden; ">
	    	<div style="height: 25px;  background-color: #1792CD; padding: 0.1px; border: 0.1px;">
	    		<p style="margin-top: 4px; font-size: 12px; color: #fff; font-weight: 400;width:50%; float: left;" >&nbsp;&nbsp;视频&nbsp;&nbsp;(354)</p>
	    		<a href="#" style="margin-top: 4px; font-size: 12px; font-style: oblique; color: #fff; text-align: right; font-weight: 400;width:50%; float: right;">more&nbsp;&nbsp;&nbsp;&nbsp;</a>
	    	</div>
	    	<!-- 内容 -->
	    	<div style="width: 100%;margin-top: 30px;">
				<div style="width: 40%; float: left; margin-left: 5%; height: 190px;" >
					<img src="static/images/image1.png" style="width: 100%; height: 150px;" />
					<p style="text-align: center; overflow: hidden; white-space: nowrap; text-overflow: ellipsis;margin-top: 10px; padding: 0 5px 0 5px"><a href="#">管理胆固醇预防心梗演讲</a></p>
				</div>
				<div style="width: 40%; float: left; margin-left: 10%; height: 190px; background-color: #FDF5E6">
					<img src="static/images/image2.png" style="width: 100%; height: 150px;" />
					<p style="text-align: center; overflow: hidden; white-space: nowrap; text-overflow: ellipsis;margin-top: 10px; padding: 0 5px 0 5px"><a href="#">管理好胆固醇、预防心梗</a></p>
				</div>
	    	</div>
	    </div>			    

	    <!-- 文章 -->
	    <div style="height: 100%; background-color: #F5F5F5; overflow:hidden;  margin-top:40px;">
	    	<div style="height: 25px;  background-color: #1792CD; padding: 0.1px; border: 0.1px;">
	    		<p style="margin-top: 4px; font-size: 12px; color: #fff; font-weight: 400;width:50%; float: left;" >&nbsp;&nbsp;文章&nbsp;&nbsp;(547)</p>
	    		<a href="#" style="margin-top: 4px; font-size: 12px; font-style: oblique; color: #fff; text-align: right; font-weight: 400;width:50%; float: right;">more&nbsp;&nbsp;&nbsp;&nbsp;</a>
	    	</div>
	    	<!-- 文章-->
	    	<div style="width: 100%;margin-top: 20px;">
				<div style="width: 65%; float: left; margin-left: 10%; height: 120px; ">
					<p style="line-height: 25px; text-decoration: underline; font-style: oblique; overflow: hidden; white-space: nowrap; text-overflow: ellipsis;"><a href="#">1.胆固醇小知识 </a></p>
					<p style="line-height: 25px; text-decoration: underline; font-style: oblique; overflow: hidden; white-space: nowrap; text-overflow: ellipsis;"><a href="#">2.管理胆固醇预防心梗 </a></p>
					<p style="line-height: 25px; text-decoration: underline; font-style: oblique; overflow: hidden; white-space: nowrap; text-overflow: ellipsis;"><a href="#">3.关于胆固醇你知道多少？ </a></p>
					<p style="line-height: 25px; text-decoration: underline; font-style: oblique; overflow: hidden; white-space: nowrap; text-overflow: ellipsis;"><a href="#">4.胆固醇摄入量不在设限，可以放心吃了么?胆固醇摄入量不在设限，可以放心吃了么? </a></p>
				</div>
				<div style="width: 20%; float: left; margin-left: 5%; height: 120px;">
					<p style="line-height: 25px; text-decoration: underline; font-style: oblique; overflow: hidden; white-space: nowrap; text-overflow: ellipsis;"><a href="#">查看更多 </a></p>
					<p style="line-height: 25px; text-decoration: underline; font-style: oblique; overflow: hidden; white-space: nowrap; text-overflow: ellipsis;"><a href="#">查看更多 </a></p>
					<p style="line-height: 25px; text-decoration: underline; font-style: oblique; overflow: hidden; white-space: nowrap; text-overflow: ellipsis;"><a href="#">查看更多 </a></p>
					<p style="line-height: 25px; text-decoration: underline; font-style: oblique; overflow: hidden; white-space: nowrap; text-overflow: ellipsis;"><a href="#">查看更多 </a></p>
				</div>
	    	</div>
	    </div>	
	     <!-- 音频 -->
	    <div style="height: 100%; background-color: #F5F5F5; overflow:hidden;  margin-top:40px;">
	    	<div style="height: 25px;  background-color: #1792CD; padding: 0.1px; border: 0.1px;">
	    		<p style="margin-top: 4px; font-size: 12px; color: #fff; font-weight: 400;width:50%; float: left;" >&nbsp;&nbsp;音频&nbsp;&nbsp;(147)</p>
	    		<a href="#" style="margin-top: 4px; font-size: 12px; font-style: oblique; color: #fff; text-align: right; font-weight: 400;width:50%; float: right;">more&nbsp;&nbsp;&nbsp;&nbsp;</a>
	    	</div>
	    	<!-- 文章-->
	    	<div style="width: 100%;margin-top: 20px;">
				<div style="width: 50%; float: left; margin-left: 10%; height: 120px; ">
					<p style="line-height: 35px; text-decoration: underline; font-style: oblique; overflow: hidden; white-space: nowrap; text-overflow: ellipsis;"><a href="#">1.胆固醇小知识 </a></p>
					<p style="line-height: 35px; text-decoration: underline; font-style: oblique; overflow: hidden; white-space: nowrap; text-overflow: ellipsis;"><a href="#">2.管理胆固醇预防心梗 </a></p>
					<p style="line-height: 35px; text-decoration: underline; font-style: oblique; overflow: hidden; white-space: nowrap; text-overflow: ellipsis;"><a href="#">3.关于胆固醇你知道多少？ </a></p>
					
				</div>
				<div style="width: 35%; float: left; margin-left: 5%; height: 120px;">
					<p style="line-height: 35px; text-decoration: underline; font-style: oblique; overflow: hidden; white-space: nowrap; text-overflow: ellipsis;"><a href="#">查看更多 </a></p>
					<p style="line-height: 35px; text-decoration: underline; font-style: oblique; overflow: hidden; white-space: nowrap; text-overflow: ellipsis;"><a href="#">查看更多 </a></p>
					<p style="line-height: 35px; text-decoration: underline; font-style: oblique; overflow: hidden; white-space: nowrap; text-overflow: ellipsis;"><a href="#">查看更多 </a></p>
				</div>
	    	</div>
	    </div>	
	  </div>

	  <!-- 右边登录-->
	  <div class="layui-col-md3" style="height: auto; padding: 1px;">
	  
	  	<!-- 用户登录 -->
	    <div style="width: 75%;margin-left: 15%; height: 100%; background-color: #F5F5F5; padding-bottom: 10px;">
	    	<div style="height: 25px;  background-color: #1792CD; padding: 0.1px; border: 0.1px;">
	    		<p style="margin-top: 4px; font-size: 12px; color: #fff; font-weight: 400" >&nbsp;&nbsp;用户登录</p>
	    	</div>
	    	<div style="height: auto;width: 100%;margin-top: 60px; margin-left: 20px; padding: 0.1px;border:0.1px;">
		    	<form class="layui-form" action="">
				  <div class="layui-form-item">
				    <div class="layui-input-block" style="width: 60%; margin-left: 10%;">
				      <input type="text" style="height: 30px; font-size: 12px;" name="username" required  lay-verify="required" placeholder="用户名" autocomplete="off" class="layui-input">
				    </div>
			
				    <div class="layui-input-block" style="width: 60%; margin-left: 10%; margin-top: 20px;">
				      <input type="text" style="height: 30px; font-size: 12px;" name="username" required  lay-verify="required" placeholder="密码" autocomplete="off" class="layui-input">
				    </div>
				  </div>

				  <!-- 按钮 -->
				  <div class="layui-form-item" style="margin-top: 30px; ">
				  	<div class="layui-inline" >
					    <div class="layui-input-block" style="margin-left: 5px;">
					     	<button class="layui-btn layui-btn-primary" style="height: 30px; width: 60px; padding: 0; text-align: center; line-height: 0; font-size: 12px;" >&nbsp;&nbsp;登录&nbsp;&nbsp;</button>
					    </div>
					</div>
					<div class="layui-inline" >
					    <div class="layui-input-block" style="margin-left:5px;">
					     	<label class="layui-btn layui-btn-primary" style="height: 30px; width: 60px; padding: 0;font-weight: 400; line-height:30px; font-size: 12px;" ><a href="#">忘记密码</a></label>
					    </div>
					</div>
			      </div>
				</form>
				<!-- 注册新用户 -->
				<p style="font-size: 12px; font-weight: 400; width: 85%; text-align:right;"><a href="#" >新用户注册</a></p>
	    	</div>	
	    </div>

	    <!-- 用户登录 -->
	    <div style="width: 75%;margin-left: 15%; height: 100%; background-color: #F5F5F5; padding-bottom: 10px; margin-top: 30px; padding-bottom: 200px;">
	    	<div style="height: 25px;  background-color: #1792CD; padding: 0.1px; border: 0.1px;">
	    		<p style="margin-top: 4px; font-size: 12px; color: #fff; font-weight: 400" >&nbsp;&nbsp;相关链接</p>
	    	</div>
	    	<div style="height: auto;width: 100%;margin-top: 30px; margin-left: 20px; padding: 0.1px;border:0.1px;">
		    	<img src="static/images/lianjie.png" style="width: 80%; text-align: center;height: 25px;">

	    	</div>	
	    </div>



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













