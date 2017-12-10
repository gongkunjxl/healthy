 <?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<link rel="stylesheet" href="/static/css/expert-page.css">
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

<!-- title -->
<div class="layui-container">
	<div class="expert-title">
		<h2>科普专家</h2>
		<span class="instrt">(注：本次排名以名字姓氏首字母排序)</span>
	</div>
	<!-- <?php //var_dump($data); ?> -->
  	<div class="expert-show">
  	  <?php if(count($data)>0): ?>
  	  	<?php foreach($data as $value ):?>
		  	<a href=/main/expertInfo/<?php echo $value['id']; ?>>
			  	<div class="expert-content">
					<div class="img-border">
						<img src="/static/images/header.jpg">
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
	<?php else:?>
		<h1> NO expert more</h1>
	<?php endif; ?>
	   <!--  <a href=/main/expertInfo>
		  	<div class="expert-content">
				<div class="img-border">
					<img src="/static/images/header.jpg">
				</div>
				<div class="word">
					<div class="name-title">
					<h2>周又芳</h2>
					<p>内科主任医师</p>
					<p>武汉同济医学院</p>
					</div>
				</div>
			</div>
	    </a>
	    -->

  	</div>
</div>
<div style="width: 100%; height: 1px; clear: both;"></div>
<div id="pageNavi" style="text-align: center;margin-top: 50px; "></div>

<script type="text/javascript">
	layui.use(['laypage', 'layer'], function(){
	  var laypage = layui.laypage
	  ,layer = layui.layer;
	 
	  
	  //总页数大于页码总数
	  laypage.render({
	    elem: 'pageNavi'
	    ,count: 100 //数据总数
	    ,groups: 7
	    ,limit: 10
	    ,jump: function(obj){
	      console.log(obj)
	    }
	  });
	  
	});
</script>



















