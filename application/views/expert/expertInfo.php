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
				<p>周又芳、女、武汉市中医院名医堂妇科主任医师、自1963年中医学院本科毕业后一直从事临床医疗工作、同时也参加“西学中”及进修实习生的教学工作、直至1997年退休。武汉市中医院名医堂妇科主任医师、自1963年中医学院本科毕业后一直从事临床医疗工作、同时也参加“西学中”及进修实习生的教学工作、直至1997年退休。</p>
				<br>
				<p>中文名称：周又芳</p>
				<p>民 族：汉</p>
				<p>毕业院校：武汉中医院</p>
				<p>临床职称：主任医师</p>
				<p>专 业：中医</p>
				<p>学 历：本科</p>
				<p>执业地点：武汉市中医院</p>
			</div>
		</div>
		<div class="left-content">
			<img src="/static/images/header_1.jpg">
		</div>
	</div>

	<!-- study direction -->
	<div class="expert-study">
		<div class="study-show">
			<div class="study-flag"></div>
			<h2>研究方向</h2>
			<div class="line"></div>
			<p>积累五十余年的临床实践经验、对妇、幼、儿科的常规疑难杂症尤其是妇科方面有很深的造诣。积累五十余年的临床实践经验、对妇、幼、儿科的常规疑难杂症尤其是妇科方面有很深的造诣。积累五十余年的临床实践经验、对妇、幼、儿科的常规疑难杂症尤其是妇科方面有很深的造诣。</p>
		</div>
	</div>
	<!-- study experience -->
	<div class="expert-study">
		<div class="study-show">
			<div class="study-flag"></div>
			<h2>教育经历</h2>
			<div class="line"></div>
			<p>1958年进入武汉中医院、本科学习五年、于1963年7月毕业、分配至湖北省蓟春县人民医院工作、1976年选派至湖北省首届医师学习班学习一年、1978年参加汉阳卫生局奉办的高级医师提高班进修一年。1958年进入武汉中医院、本科学习五年、于1963年7月毕业、分配至湖北省蓟春县人民医院工作、1976年选派至湖北省首届医师学习班学习一年、1978年参加汉阳卫生局奉办的高级医师提高班进修一年。</p>
		</div>
	</div>
	<!-- work experience -->
	<div class="expert-study" style="padding-bottom: 50px;">
		<div class="study-show">
			<div class="study-flag"></div>
			<h2>工作经历</h2>
			<div class="line"></div>
			<p style="text-indent: 0;">1963年8月至1974年10月、湖北省蓟县人民医院工作
				<br>
				1974年10月至1997年12月任职武汉市第五医院中医科
				<br>
				1966年退休至今
			</p>
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









