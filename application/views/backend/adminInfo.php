 <?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<link rel="stylesheet" type="text/css" href="/static/css/back-useradmin.css">
<script type="text/javascript" src="/static/layui/layui.js"></script>
<!-- pdf show -->
 <script type="text/javascript" src="/static/js/pdfobject.js"></script>
 <script type="text/javascript" src="/static/js/province.js"></script>
<div class="layui-container" >
	<!-- <?php //var_dump($data); ?> -->
	<h1>管理员基本信息</h1>
	<div class="user-edit">
		<form class="layui-form">
		  <div class="layui-form-item">
		    <label class="layui-form-label">管理员ID</label>
		    <div class="layui-input-block" style="width: 100px; height: 30px;">
		       <input class="layui-input" readonly="true"  style="border:0" id ="adminId" value="<?php echo $data['adminId']; ?>">
		    </div>
		  </div>
		   <div class="layui-form-item" >
		    <label class="layui-form-label">管理员账号</label>
		    <div class="layui-input-block" style="width: 40%;">
		      <input type="text" id="adminName" lay-verify="adminName" autocomplete="off" value="<?php echo $data['adminName']; ?>" class="layui-input">
		    </div>
		  </div>
		  <div class="layui-form-item" >
		    <label class="layui-form-label">管理员密码</label>
		    <div class="layui-input-block" style="width: 40%;">
		      <input type="text" id="adminPassword" lay-verify="adminPassword" autocomplete="off" value="<?php echo $data['adminPassword']; ?>" class="layui-input">
		    </div>
		  </div>
		  <div class="layui-form-item layui-form-text">
			  <div class="layui-form-item">
			    <div class="layui-input-block">
			      <button class="layui-btn" lay-submit="" lay-filter="editSubmit">立即修改</button>
			    </div>
		  </div>
		</form>	
	</div>
	<div style="width: 100%;height: 80px;"></div>
</div>
<script type="text/javascript">

layui.use('form', function(){
  var form = layui.form;
	form.on('submit(editSubmit)', function(data){
		var adminId = document.getElementById("adminId"); 
		var adminName = document.getElementById("adminName");
		var adminPassword = document.getElementById("adminPassword");

		var data={
			adminId: adminId.value,
			adminName: adminName.value,
			adminPassword: adminPassword.value
		};
		// alert(JSON.stringify(data));
		$.ajax({
			url: '/api/updateAdminInfo',
			type: 'post',
			dataType:'json',
			data: data,
			success: function (data) {
		     	 // alert(JSON.stringify(data));
			    if(data.status == 200){
			     	alert("更新成功");
			    }
			},
			error: function(data) {
		    	alert("Sorry error");
			}
		}); 
    	return false;
  });
});
</script>

















