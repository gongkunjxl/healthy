<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<link rel="stylesheet" type="text/css" href="/static/css/ppt-info-page.css">

<div class="layui-container">
	<div class="ppt-title-show">
		<h2 id="ppt_title">心脑血管的预防和注意事项 </h2>
	</div>
    <div class="ppt-content-show" >
    	<div class="left-pre">
    		<img onclick="pre_click(this)" value="1" src="/static/images/arrow-left.jpg">
    	</div>
    	<div class="mid-content">
			<div class="ppt-show" >
				<img id="ppt_show" src="/picture/pic_02.png">
			</div> 
    	</div>
    	<div class="right-pre">
    		<img onclick="next_click(this)" value="2" src="/static/images/arrow-right.jpg">
    	</div>
    </div>

    <!-- the bottom -->
    <div class="ppt-content-bottom">
    	<div class="left-title">
    		<h2>相关推荐</h2>
    	</div>
    	<div class="mid-content">
    	  <a onclick="ppt_click(this);">
    		<div class="ppt-show">
    			<img src="/picture/pic_1.png">
    			<div class="title">
    				<h3>冬季保暖小知识冬季保暖小知识冬季保暖小知识冬季保暖小知识</h3>
    			</div>
    		</div>
    	  </a>
    	  <a onclick="ppt_click(this);">
    		<div class="ppt-show">
    			<img src="/picture/pic_02.png">
    			<div class="title">
    				<h3>冬季保暖小知识冬季保暖小知识冬季保暖小知识冬季保暖小知识</h3>
    			</div>
    		</div>
    	  </a>
    	  <a onclick="ppt_click(this);">
    		<div class="ppt-show">
    			<img src="/picture/pic_2.png">
    			<div class="title">
    				<h3>冬季保暖小知识冬季保暖小知识冬季保暖小知识冬季保暖小知识</h3>
    			</div>
    		</div>
    	  </a>
    	</div>
    	<div class="right-button">
    		<img onclick="more_click(this)" src="/static/images/right-button.png">
    	</div>
    </div>

</div>
</div>
<div style="clear: both;"></div>
<script type="text/javascript">

	function pre_click(obj)
	{
		// alert(obj.getAttribute("value"));
		// alert(obj.getAttribute("src"));
		var ppt_obj=document.getElementById("ppt_show");
		// alert(ppt_obj.getAttribute("src"));
		ppt_obj.setAttribute("src","/picture/pic_2.png");
		// alert(ppt_obj.getAttribute("src"));
	}

	function next_click(obj)
	{
		// alert(obj.getAttribute("value"));
		var ppt_obj=document.getElementById("ppt_show");
		// alert(ppt_obj.getAttribute("src"));
		ppt_obj.setAttribute("src","/picture/pic_1.png");
	}

	function ppt_click()
	{
		alert("ppt click");
	}

	function more_click()
	{
		alert("more click");
	}

</script>




<script>
//一般直接写在一个js文件中
layui.use(['layer', 'form'], function(){
  var layer = layui.layer
  ,form = layui.form;
 
});
</script> 











