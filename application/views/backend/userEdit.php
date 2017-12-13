 <?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<link rel="stylesheet" type="text/css" href="/static/css/back-useradmin.css">
<script type="text/javascript" src="/static/layui/layui.js"></script>
<div class="layui-container" >
	<!-- <?php //var_dump($data); ?> -->
	<h2>用户<?php echo $data['nickname']; ?>的详情信息</h2>
	<div class="user-edit">
		<form class="layui-form">
		  <div class="layui-form-item">
		    <label class="layui-form-label">用户ID</label>
		    <div class="layui-input-block" style="width: 100px; height: 30px;">
		       <input class="layui-input" style="border:0" id ="userId" value="<?php echo $data['id']; ?>">
		    </div>
		  </div>

		   <div class="layui-form-item" >
		    <label class="layui-form-label">用户昵称</label>
		    <div class="layui-input-block" style="width: 40%;">
		      <input type="text" id="nickname" lay-verify="title" autocomplete="off" value="<?php echo $data['nickname']; ?>" class="layui-input">
		    </div>
		  </div>

		  <div class="layui-form-item" >
		    <label class="layui-form-label">电话号码</label>
		    <div class="layui-input-block" style="width: 40%;">
		      <input type="text" id="username" lay-verify="title" autocomplete="off" value="<?php echo $data['username']; ?>" class="layui-input">
		    </div>
		  </div>

		  <div class="layui-form-item" >
		    <label class="layui-form-label">用户密码</label>
		    <div class="layui-input-block" style="width: 40%;">
		      <input type="text" id="password" lay-verify="title" autocomplete="off" value="<?php echo $data['password']; ?>" class="layui-input">
		    </div>
		  </div>
		  
		  <div class="layui-form-item">
		    <label class="layui-form-label">注册时间</label>
		    <div class="layui-input-block" style="width: 200px; height: 30px;">
		       <input id="ctime" class="layui-input" style="border:0; color: #009ACD" value="<?php echo date("Y-m-d H:i:s",$data['ctime']); ?>">
		    </div>
		  </div>

		  <div class="layui-form-item">
		    <div class="layui-input-block">
		      <button class="layui-btn" lay-submit="" lay-filter="editSubmit">立即修改</button>
		      <a style="margin-left: 20%;" href=”#” onClick="javascript:history.back(-1)" class="layui-btn layui-btn-primary">返回</a>
		    </div>
		  </div>

		</form>
	</div>
	
</div>

<script type="text/javascript">
layui.use(['form', 'layedit', 'laydate'], function(){
  var form = layui.form
  ,layer = layui.layer;

//eg2
// layer.confirm('is not?', function(index){
//   //do something
  
//   layer.close(index);
// });       

	form.on('submit(editSubmit)', function(data){
		layer.confirm('确认修改用户信息？', { title:['修改用户信息提示','font-size:20px; text-align:center']}, function(index)
		{
 		 	//do something
 		 	// alert('yes');
		  	layer.close(index);
		  	var id = document.getElementById("userId");
		  	var username = document.getElementById("username");
		  	var nickname = document.getElementById("nickname");
		  	var password = document.getElementById("password");
		  	
			var data={
				id: id.value,
				username: username.value,
				nickname: nickname.value,
				password: password.value
			};
			$.ajax({
				url: '/api/updateUserInfo',
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
		});
    	return false;
  });
});

</script>






















