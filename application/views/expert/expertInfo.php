 <?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<link rel="stylesheet" href="/static/css/expertinfo-page.css">

<div class="layui-container">
	<div class="expert-intr">
		<div class="right-content">
			<div class="intr-content">
				<div class="expert-flag"></div>
				<h2>专家介绍</h2>
				<div class="line"></div>
				<p><?php echo $data['introduce']; ?></p>
				<br>
				<p>中文名称：<?php echo $data['name']; ?></p>
				<p>民 族：<?php echo $data['nation']; ?></p>
				<p>毕业院校：<?php echo $data['school']; ?></p>
				<p>临床职称：<?php echo $data['title']; ?></p>
				<p>专 业：<?php echo $data['major']; ?></p>
				<p>学 历：<?php echo $data['record']; ?></p>
				<p>执业地点：<?php echo $data['address']; ?></p>
			</div>
		</div>
		<div class="left-content">
			<img src="/header/<?php echo $data['header']; ?>">
		</div>
	</div>

	<!-- study direction -->
	<div class="expert-study">
		<div class="study-show">
			<div class="study-flag"></div>
			<h2>研究方向</h2>
			<div class="line"></div>
			<p><?php echo $data['study']; ?></p>
		</div>
	</div>
	<!-- study experience -->
	<div class="expert-study">
		<div class="study-show">
			<div class="study-flag"></div>
			<h2>教育经历</h2>
			<div class="line"></div>
			<p><?php echo $data['education']; ?></p>
		</div>
	</div>
	<!-- work experience -->
	<div class="expert-study" style="padding-bottom: 50px;">
		<div class="study-show">
			<div class="study-flag"></div>
			<h2>工作经历</h2>
			<div class="line"></div>
			<p style="text-indent: 0"> <?php echo $data['work']; ?></p>
			<!-- <p style="text-indent: 0;">1963年8月至1974年10月 湖北省蓟县人民医院工作
				<br>
				1974年10月至1997年12月 任职武汉市第五医院中医科
				<br>
				1966年退休至今
			</p> -->
		</div>
	</div>
	

</div>


<div style="clear: both;"></div>
<script>
layui.use(['form', 'layedit', 'laydate'], function(){
  var form = layui.form;
  //监听提交
  form.on('submit(demo1)', function(data){
    layer.alert(JSON.stringify(data.field), {
      title: '最终的提交信息'
    })
    return false;
  });
  
});
</script>









