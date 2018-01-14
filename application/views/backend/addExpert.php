 <?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<link rel="stylesheet" type="text/css" href="/static/css/back-useradmin.css">
<script type="text/javascript" src="/static/layui/layui.js"></script>
<script type="text/javascript" src="/backend/js/nation.js"></script>
<div class="layui-container" >
	<h2>增加专家账号页面</h2>
	<div class="user-edit">
		<form class="layui-form">
		   <div class="layui-form-item">
			    <label class="layui-form-label">手机号</label>
			    <div class="layui-input-block" style="width: 40%;">
			     	 <input type="tel" name="phone" id="username" lay-verify="required|phone" autocomplete="off" placeholder="请输入手机号" class="layui-input">
			    </div>
			</div>
			<div class="layui-form-item">
			    <label class="layui-form-label">密 码</label>
			    <div class="layui-input-block" style="width: 40%;">
			     	 <input type="password" name="password" id="password" lay-verify="pass|required" autocomplete="off" placeholder="请输入新密码 至少6个字符" class="layui-input">
			    </div>
			</div>
		  <div class="layui-form-item">
		    <div class="layui-input-block">
		      <button class="layui-btn" lay-submit="" id="subExpert" lay-filter="editSubmit">立即增加</button>
		       <a style="margin-left: 20%;" href=”#” onClick="javascript:window.history.back();return false;" class="layui-btn layui-btn-primary">返回</a>
		    </div>
		  </div>
		    
		</form>
	</div>
	<div style="width: 100%;height: 50px;"></div>
</div>

<script type="text/javascript">

layui.use(['form', 'layedit', 'laydate'], function(){
  var form = layui.form
  ,layedit = layui.layedit
  ,layer = layui.layer;
   
	form.on('submit(editSubmit)', function(data){
	   
		layer.confirm('确认增加专家账号？', { title:['增加专家账号提示','font-size:20px; text-align:center']}, function(index)
		{
 		 	//do something
 		 	// alert('yes');
		  	layer.close(index);
		 
		  	var username = document.getElementById("username");
		  	var password = document.getElementById("password");
			var data={
				username: username.value,
				password: password.value
			};
			// alert(JSON.stringify(data));
			$.ajax({
				url: '/api/addNewExpert',
				type: 'post',
				dataType:'json',
				data: data,
				success: function (data) {
				     if(data.status == 200){
				     	alert("添加成功");
				     	window.history.go(-1);
				     }
				},
				error: function(data) {
			     	alert("Sorry error");
				}
			});  	
		});
    	return false;
 	});
});
</script>










