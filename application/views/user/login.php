 <?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- <link rel="stylesheet" href="/static/css/video-list-page.css"> -->
<link rel="stylesheet" href="/static/css/user-page.css">
<div class="layui-container">
	<div class="login-show">
		<h1>中国健康知识科普网欢迎您</h1>
		<div class="login-content">
			<form class="layui-form" action="">
			  <div class="layui-form-item">
			    <label class="layui-form-label">用户名</label>
			    <div class="layui-input-block">
			     	 <input type="tel" name="phone" lay-verify="required|phone" autocomplete="off" placeholder="请输入手机号" class="layui-input">
			    </div>
			  </div>
			  <div class="layui-form-item">
			    <label class="layui-form-label">密 码</label>
			    <div class="layui-input-block">
			     	 <input type="password" name="password" lay-verify="required|phone" autocomplete="off" placeholder="请输入密码" class="layui-input">
			    </div>
			  </div>
			  <div class="layui-form-item" style="margin-top: 40px;">
			  	 <div class="layui-inline">
				    <div class="layui-input-block" style="margin-left: 10px; width: 100px;">
				       <button class="layui-btn" style="background-color: #009ACD" lay-submit="" lay-filter="demo1">立即登陆</button>
				    </div>
				</div>
				<div class="layui-inline">
			      <div class="layui-input-inline" style="width: 230px;">
			        <a  href="/main/forgetPass" class="layui-btn layui-btn-primary" style="float: right;  border:0">忘记密码?</a>
			         <a  href="/main/register" class="layui-btn layui-btn-primary" style="float: right;  border:0">免费注册</a>
			      </div>
			    </div>
			  </div>

			</form>
		</div>
		

	</div>
</div>




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









