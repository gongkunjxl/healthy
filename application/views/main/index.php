<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="layui-container">
	<div class="index-search">
		<div class="search-bar">
			<form class="layui-form" action="">
			  <div class="layui-form-item">
			    <div class="layui-input-block search-input">
			      <input type="text" style="border:1.5px solid #009ACD; " name="title" required  lay-verify="required" placeholder="本站共收录2000份科普材料" autocomplete="off" class="layui-input">
			    </div>
			    <div class="layui-input-inline" style="width: 80px;">
                        <button class="layui-icon" style="width: 80px; height: 38px; font-size: 14px;background-color: #009ACD;border: 0;" lay-submit="" lay-filter="search">&#xe615;&nbsp;&nbsp;搜索</button>
                </div>
			  </div>
			</form>
		</div>
		<!-- 选择 -->
		<div class="search-option">
			<label>选项:</label>
			<select id="theme">
				<option value="">主题</option>
				<option value="1">主题1</option>
				<option value="2">主题2</option>
				<option value="3">主题3</option>
			</select>
			<select id="type">
				<option value="">类型</option>
				<option value="1">慢性病</option>
				<option value="2">心脏病</option>
				<option value="3">冠心病</option>
			</select>
			<select id="language">
				<option value="">语言</option>
				<option value="1">中文</option>
				<option value="2">English</option>
			</select>
			<select id="language" style="width: 80px;">
				<option value="">制作省份</option>
				<option value="1">北京</option>
				<option value="2">广州</option>
			</select>
		</div>
	</div>

	<!-- expert -->
	<div class="index-expert">
		<div class="expert-title">
			<img src="/static/images/expert-title.png">
			<h1>科普专家</h1>
		</div>
		<div class="expert-content">
			<div class="content">
				<div class="img-border">
					<!-- <img src="/static/images/header.jpg"> -->
					<img src="">
				</div>
				<div class="word">
					<div class="name-title">
						<h2>朱晓燕</h2>
						<p>内科主任医师</p>
						<p>武汉同济医学院</p>
					</div>
				</div>
			</div>
			<div class="content">
				<div class="img-border">
					<!-- <img src="/static/images/header.jpg"> -->
					<img src="">
				</div>
				<div class="word">
					<div class="name-title">
						<h2>朱晓燕</h2>
						<p>内科主任医师</p>
						<p>第三军医大学</p>
					</div>
				</div>
			</div>
			<div class="content">
				<div class="img-border">
					<!-- <img src="/static/images/header.jpg"> -->
					<img src="">
				</div>
				<div class="word">
					<div class="name-title">
						<h2>朱晓燕</h2>
						<p>内科主任医师</p>
						<p>北京协和医院</p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- video -->
	<div class="video-title">
		<img src="/static/images/video-title.png">
		<h1>视频讲座</h1>
	</div>
	<div class="video-line"></div>
	<div class="video-content">
		<div class="content">
			<video poster="/static/images/image1.png"   controls preload "> 
			<source src="/video/movie1.mp4"></source>

		</div>
		<div class="content">
			<video poster="/static/images/image2.png"   controls preload "> 
			<source src="/video/movie2.mp4"></source>
		</div>
		<div class="content">
			<video poster="/static/images/image1.png"   controls preload "> 
			<source src="/video/movie1.mp4"></source>
		</div>
	</div>



</div>
<div style="width: 100%; height: 500px;"></div>

<!-- <div class="content-search">
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
</div>  --> 

<script>
//一般直接写在一个js文件中
layui.use(['layer', 'form'], function(){
  var layer = layui.layer
  ,form = layui.form;
 
});
</script>


