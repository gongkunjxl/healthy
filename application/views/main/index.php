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

	<!-- expert -->
<div class="index-back">
  <div class="layui-container" >
	<div class="index-expert">
		<div class="expert-title">
			<a href="/main/expert">
			<img src="/static/images/expert-title.png">
			<h1>科普专家</h1>
			</a>
			<!-- <p><a href="#">more >></a></p> -->
		</div>
		<div class="expert-content">
		   <a href="/main/expertInfo">
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
		   </a>
		   <a href="/main/expertInfo">
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
		   </a>
		   <a href="/main/expertInfo">
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
		  </a>

		</div>
	 </div>
   </div>
</div>
<div class="layui-container" >
	<!-- video -->
	<div class="video-title">
		<img src="/static/images/video-title.png">
		<h1>视频讲座</h1>
		<p><a href="/main/video">more >></a></p>
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
		<p><a href="/main/article" style="margin-top: 5px;color: #009ACD">more >></a></p>
	</div>
	<div class="article-line"></div>
	<div class="article-content">
		<div class="article-left">
			<div class="article-label">
				<div class="radius">●</div>
				<p><a href="/main/articleinfo">管理胆固醇 预防心梗管理胆固醇 预防心梗管理胆固醇管理胆固醇 预防心梗管理胆固醇 预防心梗管理胆固醇</a></p>
			</div>
			<div class="article-label">
				<div class="radius">●</div>
				<p><a href="/main/articleinfo">管理胆固醇 预防心梗管理胆固醇 预防心梗管理胆固醇管理胆固醇 预防心梗管理胆固醇 预防心梗管理胆固醇</a></p>
			</div>
			<div class="article-label">
				<div class="radius">●</div>
				<p><a href="/main/articleinfo">管理胆固醇 预防心梗管理胆固醇 预防心梗管理胆固醇管理胆固醇 预防心梗管理胆固醇 预防心梗管理胆固醇</a></p>
			</div>
			<div class="article-label">
				<div class="radius">●</div>
				<p><a href="/main/articleinfo">管理胆固醇 预防心梗管理胆固醇 预防心梗管理胆固醇管理胆固醇 预防心梗管理胆固醇 预防心梗管理胆固醇</a></p>
			</div>
		</div>

		<div class="article-right">
			<div class="article-label">
				<div class="radius">●</div>
				<p><a href="/main/articleinfo">管理胆固醇 预防心梗管理胆固醇 预防心梗管理胆固醇管理胆固醇 预防心梗管理胆固醇 预防心梗管理胆固醇</a></p>
			</div>
			<div class="article-label">
				<div class="radius">●</div>
				<p><a href="/main/articleinfo">管理胆固醇 预防心梗管理胆固醇 预防心梗管理胆固醇管理胆固醇 预防心梗管理胆固醇 预防心梗管理胆固醇</a></p>
			</div>
			<div class="article-label">
				<div class="radius">●</div>
				<p><a href="/main/articleinfo">管理胆固醇 预防心梗管理胆固醇 预防心梗管理胆固醇管理胆固醇 预防心梗管理胆固醇 预防心梗管理胆固醇</a></p>
			</div>
			<div class="article-label">
				<div class="radius">●</div>
				<p><a href="/main/articleinfo">管理胆固醇 预防心梗管理胆固醇 预防心梗管理胆固醇管理胆固醇 预防心梗管理胆固醇 预防心梗管理胆固醇</a></p>
			</div>
		</div>
	</div>
	<!-- audio -->
	<div class="audio-title">
		<img src="/static/images/audio-title.png">
		<h1>专家音频</h1>
		<p><a href="/main/audio" style="margin-top: 5px;color: #009ACD">more >></a></p>
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
				 <p class="pcalss1">刘小光教授讲解讲述秋冬季节疾病预防注意事项小光教授讲解讲述秋冬季节疾病预防注意事项</p>
				 <div class="label-detail" style="display: none;overflow: right;white-space:nowrap;">刘小光教授讲解讲述秋冬季节疾病预防注意事项小光教授讲解讲述秋冬季节疾病预防注意事项</div>
			</div>
		</div>
		<div class="content">
			<div class="content-show">
				<div class="audio-btn" >
					<div class="off" onclick="audio.changeClass(this,'media2')">
						<audio loop="loop" src="/audio/audio1.mp3" id="media2" preload="preload"></audio>
					</div>
				 </div>
				 <p class="pcalss1">刘小光教授讲解讲述秋冬季节疾病预防注意事项小光教授讲解讲述秋冬季节疾病预防注意事项</p>
			</div>
		</div>
		<div class="content">
			<div class="content-show">
				<div class="audio-btn" >
					<div class="off" onclick="audio.changeClass(this,'media3')">
						<audio loop="loop" src="/audio/audio2.mp3" id="media3" preload="preload"></audio>
					</div>
				 </div>
				 <p class="pcalss1">刘小光教授讲解讲述秋冬季节疾病预防注意事项小光教授讲解讲述秋冬季节疾病预防注意事项</p>
			</div>
		</div>
		<div class="content">
			<div class="content-show">
				<div class="audio-btn" >
					<div class="off" onclick="audio.changeClass(this,'media4')">
						<audio loop="loop" src="/audio/audio1.mp3" id="media4" preload="preload"></audio>
					</div>
				 </div>
				 <p class="pcalss1">刘小光教授讲解讲述秋冬季节疾病预防注意事项小光教授讲解讲述秋冬季节疾病预防注意事项</p>
			</div>
		</div>
		<div class="content">
			<div class="content-show">
				<div class="audio-btn" >
					<div class="off" onclick="audio.changeClass(this,'media5')">
						<audio loop="loop" src="/audio/audio2.mp3" id="media5" preload="preload"></audio>
					</div>
				 </div>
				 <p class="pcalss1">刘小光教授讲解讲述秋冬季节疾病预防注意事项小光教授讲解讲述秋冬季节疾病预防注意事项</p>
			</div>
		</div>

	</div>

	<!-- picture -->
	<div class="picture-title">
		<img src="/static/images/picture-title.png">
		<h1>精选图片</h1>
		<p><a href="#" style="margin-top: 5px;color: #009ACD">more >></a></p>
	</div>
	<div class="picture-line"></div>
	<div class="picture-content">
		<div class="content">
			<div class="content-show" id="layer-photos-show1">
				<a>
					<img src="/picture/pic_1.png">
					<img style="display: none;" src="/picture/pic_01.png">
					<img style="display: none;" src="/picture/pic_02.png">
				<div class="label-word">
					<p>冬季养生知识</p>
				</div>
				</a>
			</div>
		</div>
		<div class="content">
			<div class="content-show" id="layer-photos-show2">
				<a>
					<img src="/picture/pic_2.png">
					<img style="display: none;" src="/picture/pic_03.png">
					<img style="display: none;" src="/picture/pic_04.png">
				<div class="label-word">
					<p>冬季养生知识</p>
				</div>
				</a>
			</div>
		</div>
		<div class="content">
			<div class="content-show" id="layer-photos-show3">
				<a>
					<img src="/picture/pic_3.png">
					<img style="display: none;" src="/picture/pic_06.png">
					<img style="display: none;" src="/picture/pic_05.png">
				<div class="label-word">
					<p>冬季养生知识</p>
				</div>
				</a>
			</div>
		</div>
		<div class="content">
			<div class="content-show" id="layer-photos-show4">
				<a>
					<img src="/picture/pic_1.png">
					<img style="display: none;" src="/picture/pic_01.png">
					<img style="display: none;" src="/picture/pic_02.png">
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
		<p><a href="#" style="margin-top: 5px;color: #009ACD">more >></a></p>
	</div>
	<div class="point-line"></div>
	<div class="point-content" style="margin-top: 30px;">
		<div class="content">
			<video ishivideo="true" autoplay="true" isrotate="false" autoHide="true">
			            <source src="http://www.html5videoplayer.net/videos/madagascar3.mp4" type="video/mp4">
			        </video>
		</div>
		<div class="content">
			<video ishivideo="true" autoplay="true" isrotate="false" autoHide="true">
			            <source src="http://www.html5videoplayer.net/videos/madagascar3.mp4" type="video/mp4">
			        </video>
		</div>
		<div class="content">
			<video ishivideo="true" autoplay="true" isrotate="false" autoHide="true">
			            <source src="http://www.html5videoplayer.net/videos/madagascar3.mp4" type="video/mp4">
			        </video>
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
<!-- 	 <div id="layer-photos-demo" >
		  <img layer-pid="图片id，可以不写" layer-src="/picture/pic_01.png" src="/picture/pic_01.png" alt="图片名">
		  <img layer-pid="图片id，可以不写" layer-src="/picture/pic_02.png" src="/picture/pic_02.png" alt="图片名">
		  <img layer-pid="图片id，可以不写" layer-src="/picture/pic_03.png" src="/picture/pic_03.png" alt="图片名">
		  <img layer-pid="图片id，可以不写" layer-src="/picture/pic_04.png" src="/picture/pic_04.png" alt="图片名">
	</div> -->
	<div style="height: 100px; margin-top:40px;width: 100%; background-color: #F5F5F5;border: 1px;padding: 0.1px;">
		<a style="margin-top: 50px; margin-left: 60px;" href="/main/testdemo">测试按钮</a>
		<a style="margin-top: 50px; margin-left: 60px;" href="/backend/index">后台测试</a>
		<a style="margin-top: 50px; margin-left: 60px;" href="/main/message">短信测试</a>
	</div>
	<div style="height: 100px; margin-top:40px;width: 100%; background-color: #F5F5F5;border: 1px;padding: 0.1px;">
		<a style="margin-top: 50px; margin-left: 60px;" href="/main/expert">专家页面</a>
		<a style="margin-top: 50px; margin-left: 60px;" href="/main/expertInfo">专家详情</a>
		<a style="margin-top: 50px; margin-left: 60px;" href="/main/article">文章列表</a>
		<a style="margin-top: 50px; margin-left: 60px;" href="/main/articleInfo">文章详情</a>
		<a style="margin-top: 50px; margin-left: 60px;" href="/main/audio">音频列表</a>
		<a style="margin-top: 50px; margin-left: 60px;" href="/main/video_list">视频列表</a>
		<a style="margin-top: 50px; margin-left: 60px;" href="/main/videoInfo">视频详情</a>
		<a style="margin-top: 50px; margin-left: 60px;" href="/main/pictureInfo">图片详情</a>
		
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

	 suspendLayer($('.pcalss1'));
	 function suspendLayer(obj) {
	 	var width = $('.content-show')[0].offsetWidth; 
	 	obj.each(function(){ 
	 		var text = $(this).text();
	 		var length =  text.length;
	 		 if (width > length){
	 		 	//$(this).text(text.substring(0, length-5) + "...");
	 		 	var current = $(this);
	 		 	$(this).on("mouseover", function () {  
	 		 			$(this).removeClass('pcalss1');
	 		 			$(this).addClass('pcalss2');
		                //$(this).parent('.content-show').find(".label-detail").show();
		                //var informDiv = $(this).parent('.content-show').find(".label-detail");  
		            }).on("mouseout", function (event) { 
		            	$(this).removeClass('pcalss2');
	 		 			$(this).addClass('pcalss1'); 
		            	/*var informDiv = $(this).parent('.content-show').find(".label-detail");
				    	var evt = event || window.event;
						var x=evt.pageX;    
				        var y=evt.pageY;  
						var divx1 = informDiv.offset().left;    
						var divy1 = informDiv.offset().top;   
						var divx2 = informDiv.offset().left + informDiv.width();    
						var divy2 = informDiv.offset().top + informDiv.height(); 
				        
						if( x < divx1 || x > divx2 || y < divy1 || y > divy2){    
							$(this).parent('.content-show').find(".label-detail").hide();  
						}*/
		            });

	 		 } 
	 	 });
		
		 //$($(obj).children()[0]).hide();
		 //$($(obj).children()[1]).show(); 
    }

    $(document).ready(function () {
            $(".MALL").hide();
            $(".title").mouseover(function (e) {
                $(".MALL").css({"position":"absolute","top":e.pageY+5,"left":e.pageX+5}).show();
            });
            $(".title").mousemove(function (e) {
                $(this).next(".MALL").css({ "color": "fff", "position": "absolute", "opacity": "0.7", "background-color": "666", "top": e.pageY + 5, "left": e.pageX + 5 });
            });
            $(".title").mouseout(function () {
                $(this).next(".MALL").hide();
            });
        });  

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

$(this).parent('.content-show').find(".label-detail").on("mouseover", function () {  
		                $(this).parent('.content-show').find(".label-detail").show();  
		            }).on("mouseout", function (event) {  
		            	var informDiv = $(this).parent('.content-show').find(".label-detail");
				    	var evt = event || window.event;
						var x=evt.pageX;    
				        var y=evt.pageY;  
						var divx1 = informDiv.offset().left;    
						var divy1 = informDiv.offset().top;   
						var divx2 = informDiv.offset().left + informDiv.width();    
						var divy2 = informDiv.offset().top + informDiv.height(); 
								        
						if( x < divx1 || x > divx2 || y < divy1 || y > divy2){    
							$(this).parent('.content-show').find(".label-detail").hide();  
						}
		            });
</script> -->










