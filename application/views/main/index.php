<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- <?php //echo var_dump($count); ?> -->
<!-- <?php //echo var_dump($expert_data); ?> -->
<!-- <?php //echo var_dump($video_data); ?> -->
<!-- <?php //echo var_dump($audio_data); ?> -->
<!-- <?php //echo var_dump($article_data); ?> -->
<!-- <?php //echo var_dump($picture_data); ?> -->
<!-- <?php //echo var_dump($ppt_data); ?> -->
<!-- expert -->
<?php if(count($expert_data)>0): ?>
<div class="index-back">
  <div class="layui-container" >
	<div class="index-expert">
		<div class="expert-title">
			<a  href="/main/expert/1">
			<img src="/static/images/expert-title.png">
			<h1>科普专家</h1>
			</a>
			<!-- <p><a href="#">more >></a></p> -->
		</div>
		<div class="expert-content">
	  	  	<?php foreach($expert_data as $value ):?>
				<a target="_blank" href="/main/expertInfo/<?php echo $value['id']; ?>">
				<div class="content">
					<div class="img-border">
						<img src="/header/<?php echo $value['header']; ?>">
					</div>
					<div class="word">
						<div class="name-title">
							<h2><?php echo $value['name']; ?></h2>
							<p><?php echo $value['title']; ?></p>
							<p><?php echo $value['address']; ?></p>
						</div>
					</div>
				</div>
			   </a>
			<?php endforeach; ?>
		</div>
	 </div>
   </div>
</div>
<?php endif; ?>

<div class="layui-container" >
  <?php if(count($video_data)>0): ?>
	<!-- video -->
	<div class="video-title">
		<img src="/static/images/video-title.png">
		<h1>视频讲座</h1>
		<?php if(count($video_data)>2):?><p><a href="/main/video">more >></a></p><?php endif; ?>
	</div>
	<div class="video-line"></div>
	<div class="video-content">
	  	  <?php foreach($video_data as $value ):?>
			<div class="content">
				<div class="video-show">
					<video poster="<?php echo $value['covAddr']; ?>"  controls preload "> 
						<source src="<?php echo $value['videoAddr']; ?>"></source>
					</video>
				</div>
				<div class="video-label">
					<h3><?php echo $value['name']; ?></h3>
					<span class="left-label"><?php echo $value['type']; ?></span>
					<span class="right-label"><?php echo $value['read'];?>人观看</span>
				</div>
		  </div>		
		  <?php endforeach; ?>
	</div>
	<?php endif; ?>

	<!--  文章 -->
    <?php if(count($article_data)>0): ?>
	<div class="article-title">
		<img src="/static/images/article-title.png">
		<h1>精品文章</h1>
		<?php if(count($article_data)>7):?><p><a href="/main/article/1" style="margin-top: 5px;color: #009ACD">more >></a></p><?php endif; ?>
	</div>
	<div class="article-line"></div>
	<div class="article-content">
	  	  	<?php foreach($article_data as $value ):?>
				<div class="article-show">
					<div class="article-label">
						<a target="_blank" href="/main/articleinfo/<?php echo $value['id']; ?>">
						<div class="radius">●</div>
						<p><?php echo $value['name']; ?></p>
						<div class="time"><?php echo date("Y-m-d",$value['ctime']);?></div>
						</a>
					</div>
				</div>
			<?php endforeach; ?>
	</div>
	<?php endif; ?>

	<!-- audio -->
	<?php $i=1; if(count($audio_data)>0): ?>
	<div class="audio-title">
		<img src="/static/images/audio-title.png">
		<h1>专家音频</h1>
		<?php if(count($audio_data)>4):?><p><a href="/main/audio" style="margin-top: 5px;color: #009ACD">more >></a></p><?php endif; ?>
	</div>
	<div class="audio-line"></div>
	<div class="audio-content">
	  	  	<?php foreach($audio_data as $value ):?>
			  <div class="content">
				<div class="content-show">
					<div class="audio-btn" >
						<div class="off" onclick="audio.changeClass(this,'<?php echo "media".$i;?>')">
							<audio loop="loop" src="/<?php echo $value['source_url']; ?>" id="<?php echo 'media'.$i; $i=$i+1; ?>" preload="preload"></audio>
						</div>
					 </div>
					 <p class="pcalss1" style="text-align: center;"><?php echo $value['author'].$value['title'].$value['name']; ?></p>
					 <!-- <div class="label-detail" style="display: none;overflow: right;white-space:nowrap;">刘小光教授讲解讲述秋冬季节疾病预防注意事项小光教授讲解讲述秋冬季节疾病预防注意事项</div> -->
				</div>
			  </div>
			<?php endforeach; ?>
	</div>
	<?php endif; ?>

	<!-- picture -->
	<?php if(count($picture_data)>0): ?>
	<div class="picture-title">
		<img src="/static/images/picture-title.png">
		<h1>精选图片</h1>
		<?php if(count($picture_data)>3): ?><p><a href="/main/picture/1" style="margin-top: 5px;color: #009ACD">more >></a></p><?php endif; ?>
	</div>
	<div class="picture-line"></div>
	<div class="picture-content">
	  	  	<?php foreach($picture_data as $value ):?>
			  <div class="content">
				<div class="content-show" id="layer-photos-show1">
					<a href="/main/pictureinfo/<?php echo $value['id'];?>">
						<img src="/picture/<?php echo $value['id'];?>/<?php echo $value['index'];?>">
					<div class="label-word">
						<p><?php echo $value['name'];?></p>
					</div>
					</a>
				</div>
			  </div>
			<?php endforeach; ?>
	</div>
	<?php endif; ?>

	<!-- powerpoint -->
	<?php if(count($ppt_data)>0): ?>
	<div class="point-title">
		<img src="/static/images/point-title.png">
		<h1>幻灯片</h1>
		<?php if(count($ppt_data)>2): ?><p><a target="_blank" href="/main/powerpoint/1" style="margin-top: 5px;color: #009ACD">more >></a></p><?php endif; ?>
	</div>
	<div class="point-line"></div>
	<div class="point-content" style="margin-top: 30px;">
	    <?php foreach($ppt_data as $value ):?>
		  <a target="_blank" href="/main/powerpointinfo/<?php echo $value['id']; ?>">
			<div class="content">
				<div class="point-show">
					<img src="/<?php echo $value['pic_url'].'/1'; ?>.jpeg">
				</div>
				<div class="point-label">
					<h3><?php echo $value['name']; ?></h3>
					<span class="left-label"><?php echo $value['type']; ?></span>
					<span class="right-label"><?php echo $value['reader_num']; ?>人观看</span>
				</div>
			</div>
		 </a>	
		<?php endforeach; ?>
	</div>
	<?php endif; ?>
	<!-- about us -->
	<?php if($if_search == '0'):?>
	<div class="about-title">
		<img src="/static/images/about-title.png">
		<h1>关于我们</h1>
	</div>
	<div class="about-line"></div>
	<div class="about-content">
		<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;中华预防医学健康传播分会、中华医学心血管病分会、国家心血管病中心防治资讯部、中华疾病预防控制中心慢病z红心、中国心血管健康联盟5加专业机构联合发布《“管理胆固醇、防心梗”核心提示》、呼吁公众及高危人群从监测血脂、管理“坏胆固醇”、识别心梗前兆等方面入手、防止心梗的发生。</p>
	</div>
	<?php endif; ?>
	<!-- <div style="height: 100px; margin-top:40px;width: 100%; background-color: #F5F5F5;border: 1px;padding: 0.1px;">
		<a style="margin-top: 50px; margin-left: 60px;" href="/main/testdemo">测试按钮</a>
		<a style="margin-top: 50px; margin-left: 60px;" href="/backend/index">后台测试</a>
		<a style="margin-top: 50px; margin-left: 60px;" href="/main/message">短信测试</a>
		<a style="margin-top: 50px; margin-left: 60px;" href="/main/uploadVideo">视频测试</a>
	</div>
	<div style="height: 100px; margin-top:40px;width: 100%; background-color: #F5F5F5;border: 1px;padding: 0.1px;">
		<a style="margin-top: 50px; margin-left: 10px;" href="/main/expert">专家页面</a>
		<a style="margin-top: 50px; margin-left: 50px;" href="/main/expertInfo">专家详情</a>
		<a style="margin-top: 50px; margin-left: 50px;" href="/main/article">文章列表</a>
		<a style="margin-top: 50px; margin-left: 50px;" href="/main/articleInfo">文章详情</a>
		<a style="margin-top: 50px; margin-left: 50px;" href="/main/audio">音频列表</a>
		<a style="margin-top: 50px; margin-left: 50px;" href="/main/audioinfo">音频详情</a>
		<a style="margin-top: 50px; margin-left: 50px;" href="/main/video">视频列表</a>
		<a style="margin-top: 50px; margin-left: 50px;" href="/main/videoInfo">视频详情</a>
		<a style="margin-top: 50px; margin-left: 50px;" href="/main/picture">图片列表</a>
		<a style="margin-top: 50px; margin-left: 50px;" href="/main/pictureInfo">图片详情</a>
		<a style="margin-top: 50px; margin-left: 50px;" href="/main/powerpoint">ppt列表</a>
		<a style="margin-top: 50px; margin-left: 50px;" href="/main/powerpointInfo">ppt详情</a>
	</div> -->
</div>

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





