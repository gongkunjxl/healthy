 <?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<link rel="stylesheet" href="/static/css/audio-page.css">
<div class="layui-container">
	<div class="index-search">
		<div class="search-bar">
			<form class="layui-form" action="">
			  <div class="layui-form-item">
			    <div class="layui-input-block search-input">
			      <input type="text" style="border:1.5px solid #009ACD;border-radius:0px;" name="title" required  lay-verify="required" placeholder="本站共收录2000份科普材料" autocomplete="off" class="layui-input">
			    </div>
			    <div class="layui-input-inline" style="width: 80px;">
                        <button  style="width: 80px; height: 38px; font-size: 14px;background-color: #009ACD;border: 0;border-radius:0px;" lay-submit="" lay-filter="search"><i class="layui-icon" style="margin-right:7px;">&#xe615;</i>搜索</button>
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


<div class="layui-container">
	<div class="audio-title">
		<h2>慢性疾病</h2>
	</div>

	<!-- content -->
 	<div class="audio-content">
 		<div class="audio-show">
 			<div class="content-show">
 				<!-- <img src="/static/images/audio-logo.png"> -->
 				<div class="audio-btn" >
					<div class="off" onclick="audio.changeClass(this,'media1')">
						<audio loop="loop" src="/audio/audio2.mp3" id="media1" preload="preload"></audio>
					</div>
				</div>
 				<div class="show-right">
 					<h3>慢性疾病讲座慢性疾病讲座慢性疾病讲座慢性疾病讲座慢性疾病讲座慢性疾病讲座</h3>
 					<p>刘晓燕 教授</p>
 					<span class="left-date">2017-11-30</span>
 					<span class="right-date">1121次播放</span>
 				</div>
 			</div>
 		</div>
 		<div class="audio-show">
 			<div class="content-show">
 				<!-- <img src="/static/images/audio-logo.png"> -->
 				<div class="audio-btn" >
					<div class="off" onclick="audio.changeClass(this,'mediaw')">
						<audio loop="loop" src="/audio/audio1.mp3" id="mediaw" preload="preload"></audio>
					</div>
				</div>
 				<div class="show-right">
 					<h3>慢性疾病讲座慢性疾病讲座慢性疾病讲座慢性疾病讲座慢性疾病讲座慢性疾病讲座</h3>
 					<p>刘晓燕 教授</p>
 					<span class="left-date">2017-11-30</span>
 					<span class="right-date">1121次播放</span>
 				</div>
 			</div>
 		</div>
 		<div class="audio-show">
 			<div class="content-show">
 				<!-- <img src="/static/images/audio-logo.png"> -->
 				<div class="audio-btn" >
					<div class="off" onclick="audio.changeClass(this,'media1')">
						<audio loop="loop" src="/audio/audio2.mp3" id="media1" preload="preload"></audio>
					</div>
				</div>
 				<div class="show-right">
 					<h3>慢性疾病讲座慢性疾病讲座慢性疾病讲座慢性疾病讲座慢性疾病讲座慢性疾病讲座</h3>
 					<p>刘晓燕 教授</p>
 					<span class="left-date">2017-11-30</span>
 					<span class="right-date">1121次播放</span>
 				</div>
 			</div>
 		</div>
 		<div class="audio-show">
 			<div class="content-show">
 				<!-- <img src="/static/images/audio-logo.png"> -->
 				<div class="audio-btn" >
					<div class="off" onclick="audio.changeClass(this,'media1')">
						<audio loop="loop" src="/audio/audio2.mp3" id="media1" preload="preload"></audio>
					</div>
				</div>
 				<div class="show-right">
 					<h3>慢性疾病讲座慢性疾病讲座慢性疾病讲座慢性疾病讲座慢性疾病讲座慢性疾病讲座</h3>
 					<p>刘晓燕 教授</p>
 					<span class="left-date">2017-11-30</span>
 					<span class="right-date">1121次播放</span>
 				</div>
 			</div>
 		</div>
 		<div class="audio-show">
 			<div class="content-show">
 				<!-- <img src="/static/images/audio-logo.png"> -->
 				<div class="audio-btn" >
					<div class="off" onclick="audio.changeClass(this,'media1')">
						<audio loop="loop" src="/audio/audio2.mp3" id="media1" preload="preload"></audio>
					</div>
				</div>
 				<div class="show-right">
 					<h3>慢性疾病讲座慢性疾病讲座慢性疾病讲座慢性疾病讲座慢性疾病讲座慢性疾病讲座</h3>
 					<p>刘晓燕 教授</p>
 					<span class="left-date">2017-11-30</span>
 					<span class="right-date">1121次播放</span>
 				</div>
 			</div>
 		</div>
 		<div class="audio-show">
 			<div class="content-show">
 				<!-- <img src="/static/images/audio-logo.png"> -->
 				<div class="audio-btn" >
					<div class="off" onclick="audio.changeClass(this,'media1')">
						<audio loop="loop" src="/audio/audio2.mp3" id="media1" preload="preload"></audio>
					</div>
				</div>
 				<div class="show-right">
 					<h3>慢性疾病讲座慢性疾病讲座慢性疾病讲座慢性疾病讲座慢性疾病讲座慢性疾病讲座</h3>
 					<p>刘晓燕 教授</p>
 					<span class="left-date">2017-11-30</span>
 					<span class="right-date">1121次播放</span>
 				</div>
 			</div>
 		</div>
 		<div class="audio-show">
 			<div class="content-show">
 				<!-- <img src="/static/images/audio-logo.png"> -->
 				<div class="audio-btn" >
					<div class="off" onclick="audio.changeClass(this,'media1')">
						<audio loop="loop" src="/audio/audio2.mp3" id="media1" preload="preload"></audio>
					</div>
				</div>
 				<div class="show-right">
 					<h3>慢性疾病讲座慢性疾病讲座慢性疾病讲座慢性疾病讲座慢性疾病讲座慢性疾病讲座</h3>
 					<p>刘晓燕 教授</p>
 					<span class="left-date">2017-11-30</span>
 					<span class="right-date">1121次播放</span>
 				</div>
 			</div>
 		</div>

 	</div>

</div>

<div style="clear: both;"> </div>
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


















