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
</div>

	<!-- expert -->
<div class="index-back">
  <div class="layui-container" >
	<div class="index-expert">
		<div class="expert-title">
			<img src="/static/images/expert-title.png">
			<h1>科普专家</h1>
		</div>
		<div class="expert-content">
			<div class="content">
				<div class="img-border">
					<img src="/static/images/header.jpg">
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
					<img src="/static/images/header.jpg">
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
					<img src="/static/images/header.jpg">
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
   </div>
</div>
<div class="layui-container" >
	<!-- video -->
	<div class="video-title">
		<img src="/static/images/video-title.png">
		<h1>视频讲座</h1>
	</div>
	<div class="video-line"></div>
	<div class="video-content">
		<div class="content">
			<div class="video-show">
				<video poster="/static/images/image1.png"   controls preload "> 
					<source src="/video/movie1.mp4"></source>
				</video>
			</div>
			<div class="video-label">
				<h3>管理胆固醇预防心梗讲座</h3>
				<span class="left-label">慢性病</span>
				<span class="right-label">1350人观看</span>
			</div>
		</div>
		<div class="content">
			<div class="video-show">
				<video poster="/static/images/image2.png"   controls preload "> 
					<source src="/video/movie2.mp4"></source>
				</video>
			</div>
			<div class="video-label">
				<h3>管理胆固醇预防心梗讲座</h3>
				<span class="left-label">慢性病</span>
				<span class="right-label">1350人观看</span>
			</div>
		</div>
		<div class="content">
			<div class="video-show">
				<video poster="/static/images/image1.png"   controls preload "> 
					<source src="/video/movie1.mp4"></source>
				</video>
			</div>
			<div class="video-label">
				<h3>管理胆固醇预防心梗讲座</h3>
				<span class="left-label">慢性病</span>
				<span class="right-label">1350人观看</span>
			</div>
		</div>
	</div>

	<!--  文章 -->
	<div class="article-title">
		<img src="/static/images/article-title.png">
		<h1>精品文章</h1>
	</div>
	<div class="article-line"></div>
	<div class="article-content">
		<div class="article-left">
			<div class="article-label">
				<div class="radius">●</div>
				<p><a href="#">管理胆固醇 预防心梗管理胆固醇 预防心梗管理胆固醇管理胆固醇 预防心梗管理胆固醇 预防心梗管理胆固醇</a></p>
			</div>
			<div class="article-label">
				<div class="radius">●</div>
				<p><a href="#">管理胆固醇 预防心梗管理胆固醇 预防心梗管理胆固醇管理胆固醇 预防心梗管理胆固醇 预防心梗管理胆固醇</a></p>
			</div>
			<div class="article-label">
				<div class="radius">●</div>
				<p><a href="#">管理胆固醇 预防心梗管理胆固醇 预防心梗管理胆固醇管理胆固醇 预防心梗管理胆固醇 预防心梗管理胆固醇</a></p>
			</div>
			<div class="article-label">
				<div class="radius">●</div>
				<p><a href="#">管理胆固醇 预防心梗管理胆固醇 预防心梗管理胆固醇管理胆固醇 预防心梗管理胆固醇 预防心梗管理胆固醇</a></p>
			</div>
		</div>

		<div class="article-right">
			<div class="article-label">
				<div class="radius">●</div>
				<p><a href="#">管理胆固醇 预防心梗管理胆固醇 预防心梗管理胆固醇管理胆固醇 预防心梗管理胆固醇 预防心梗管理胆固醇</a></p>
			</div>
			<div class="article-label">
				<div class="radius">●</div>
				<p><a href="#">管理胆固醇 预防心梗管理胆固醇 预防心梗管理胆固醇管理胆固醇 预防心梗管理胆固醇 预防心梗管理胆固醇</a></p>
			</div>
			<div class="article-label">
				<div class="radius">●</div>
				<p><a href="#">管理胆固醇 预防心梗管理胆固醇 预防心梗管理胆固醇管理胆固醇 预防心梗管理胆固醇 预防心梗管理胆固醇</a></p>
			</div>
			<div class="article-label">
				<div class="radius">●</div>
				<p><a href="#">管理胆固醇 预防心梗管理胆固醇 预防心梗管理胆固醇管理胆固醇 预防心梗管理胆固醇 预防心梗管理胆固醇</a></p>
			</div>
		</div>
	</div>
	<!-- audio -->
	<div class="audio-title">
		<img src="/static/images/audio-title.png">
		<h1>专家音频</h1>
	</div>
	<div class="audio-line"></div>
	<div class="audio-content">
		<div class="content">
			<div class="content-show">
				<div class="audio-btn" >
					<div class="off" onclick="audio.changeClass(this,'media1')">
						<audio loop="loop" src="/audio/audio2.mp3" id="media1" preload="preload"></audio>
					</div>
				 </div>
				 <p>刘小光教授讲解讲述秋冬季节疾病预防注意事项小光教授讲解讲述秋冬季节疾病预防注意事项</p>
			</div>
		</div>
		<div class="content">
			<div class="content-show">
				<div class="audio-btn" >
					<div class="off" onclick="audio.changeClass(this,'media2')">
						<audio loop="loop" src="/audio/audio1.mp3" id="media2" preload="preload"></audio>
					</div>
				 </div>
				 <p>刘小光教授讲解讲述秋冬季节疾病预防注意事项小光教授讲解讲述秋冬季节疾病预防注意事项</p>
			</div>
		</div>
		<div class="content">
			<div class="content-show">
				<div class="audio-btn" >
					<div class="off" onclick="audio.changeClass(this,'media3')">
						<audio loop="loop" src="/audio/audio2.mp3" id="media3" preload="preload"></audio>
					</div>
				 </div>
				 <p>刘小光教授讲解讲述秋冬季节疾病预防注意事项小光教授讲解讲述秋冬季节疾病预防注意事项</p>
			</div>
		</div>
		<div class="content">
			<div class="content-show">
				<div class="audio-btn" >
					<div class="off" onclick="audio.changeClass(this,'media4')">
						<audio loop="loop" src="/audio/audio1.mp3" id="media4" preload="preload"></audio>
					</div>
				 </div>
				 <p>刘小光教授讲解讲述秋冬季节疾病预防注意事项小光教授讲解讲述秋冬季节疾病预防注意事项</p>
			</div>
		</div>
		<div class="content">
			<div class="content-show">
				<div class="audio-btn" >
					<div class="off" onclick="audio.changeClass(this,'media5')">
						<audio loop="loop" src="/audio/audio2.mp3" id="media5" preload="preload"></audio>
					</div>
				 </div>
				 <p>刘小光教授讲解讲述秋冬季节疾病预防注意事项小光教授讲解讲述秋冬季节疾病预防注意事项</p>
			</div>
		</div>

	</div>

	<!-- picture -->
	<div class="picture-title">
		<img src="/static/images/picture-title.png">
		<h1>精选图片</h1>
	</div>
	<div class="picture-line"></div>
	<div class="picture-content">
		<div class="content">
			<div class="content-show">
				<a href="#"><img src="/picture/pic_1.png">
				<div class="label-word">
					<p>冬季养生知识</p>
				</div>
				</a>
			</div>
		</div>
		<div class="content">
			<div class="content-show">
				<a href="#"><img src="/picture/pic_2.png">
				<div class="label-word">
					<p>冬季养生知识</p>
				</div>
				</a>
			</div>
		</div>
		<div class="content">
			<div class="content-show">
				<a href="#"><img src="/picture/pic_3.png">
				<div class="label-word">
					<p>冬季养生知识</p>
				</div>
				</a>
			</div>
		</div>
		<div class="content">
			<div class="content-show">
				<a href="#"><img src="/picture/pic_1.png">
				<div class="label-word">
					<p>冬季养生知识</p>
				</div>
				</a>
			</div>
		</div>
	</div>

	<!-- powerpoint -->
	<div class="point-title">
		<img src="/static/images/point-title.png">
		<h1>幻灯片</h1>
	</div>
	<div class="point-line"></div>
	<div class="point-content">
		<div class="content">
			<div class="content-show">
				
			</div>
		</div>
		<div class="content">
			<div class="content-show">
				
			</div>
		</div>
		<div class="content">
			<div class="content-show">
				
			</div>
		</div>
	</div>

	<!-- about us -->
	<div class="about-title">
		<img src="/static/images/about-title.png">
		<h1>关于我们</h1>
	</div>
	<div class="about-line"></div>
	<div class="about-content">
		<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;中华预防医学健康传播分会、中华医学心血管病分会、国家心血管病中心防治资讯部、中华疾病预防控制中心慢病z红心、中国心血管健康联盟5加专业机构联合发布《“管理胆固醇、防心梗”核心提示》、呼吁公众及高危人群从监测血脂、管理“坏胆固醇”、识别心梗前兆等方面入手、防止心梗的发生。</p>
	</div>

</div>
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

<!-- <script>
layui.use('layer', function(){ //独立版的layer无需执行这一句
	$.getJSON('/jquery/layer/test/photos.json', function(json){
	  layer.photos({
	    photos: json
	    ,anim: 5 //0-6的选择，指定弹出图片动画类型，默认随机（请注意，3.0之前的版本用shift参数）
	  });
	});
		
});
</script> -->













