 <?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<link rel="stylesheet" type="text/css" href="/static/css/back-useradmin.css">
<script type="text/javascript" src="/static/layui/layui.js"></script>
<script type="text/javascript" src="/static/js/province.js"></script>
<div class="layui-container" >
	<!-- <?php //var_dump($data); ?> -->
	<h1>网站的基本信息统计</h1>
	<div class="web-show">
		<div class="content-show">
			<p>用户总数: <?php echo $data['user_count']; ?>人</p>
			<br>
			<p>专家入驻: <?php echo $data['expert_count']; ?>人</p>
			<br>
			<p>文章份数: <?php echo $data['article_count']; ?>份</p>
			<br>
			<p>相册份数: <?php echo $data['picture_count']; ?>份</p>
			<br>
			<p>视频数量: <?php echo $data['video_count']; ?>份</p>
			<br>
			<p>音频数量: <?php echo $data['audio_count']; ?>份</p>
			<br>
			<p>幻灯片数量: <?php echo $data['ppt_count']; ?>份</p>
			<br>
			<p>素材总量: <?php echo $data['count']; ?>份</p>
		</div>		
	</div>		
</div>














