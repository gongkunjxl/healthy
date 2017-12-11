 <?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<link rel="stylesheet" type="text/css" href="/static/css/back-useradmin.css">
<div class="layui-container" >
	<!-- <?php var_dump($data); ?> -->
	<h2>用户注册信息表</h2>
	<table class="layui-table" style="">
	  <thead>
	    <tr>
	      <th width="10%">ID</th>
	      <th width="15%">用户名</th>
	      <th width="15%">密码</th>
	       <th width="15%">电话</th>
	      <th width="20%">注册时间</th>
	      <th width="25%"></th>
	    </tr>
	  </thead>
	  <tbody>
	  	<?php foreach ($data as $value):?>
		  	<tr>
		  		<td><?php echo $value['id'];?></td>
		  		<td ><?php echo $value['nickname'];?></td>
		  		<td><?php echo $value['password'];?></td>
		  		<td><?php echo $value['username'];?></td>
		  		<td><?php echo date("Y-m-d H:i:s",$value['ctime']);?></td>
		  		<td>
					<a class="layui-btn layui-btn-xs" >编辑</a>
					<a class="layui-btn layui-btn-danger layui-btn-xs">删除</a>
		  		</td>
		  	</tr>
		 <?php endforeach; ?>
	  </tbody>
	</table>
	<fieldset class="layui-elem-field layui-field-title" style="margin-top: 30px;">
  <legend>总页数大于页码总数</legend>
</fieldset>
	<div id="demo1"></div>
	<div style="height: 100px;width: 100%;background-color: red;"> </div>
</div>

<script>
layui.use(['laypage', 'layer'], function(){
  var laypage = layui.laypage
  ,layer = layui.layer;
  
	  //总页数大于页码总数
	laypage.render({
	    elem: 'demo1'
	    ,count: 70 //数据总数
	    ,jump: function(obj){
	      console.log(obj)
	    }
	  });

  });
</script>








