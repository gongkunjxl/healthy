<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
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

<div class="layui-container" >
	<!-- video -->
	<div class="video-title">
		<h2>慢性疾病</h2>
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
</script>










