 <?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- <link rel="stylesheet" href="/static/css/video-list-page.css"> -->
<link rel="stylesheet" href="/static/css/user-page.css">
<div class="layui-container">
	<div class="register-show">
		<h1>密码找回页面</h1>
		<div class="register-content">
			<form class="layui-form" action="">
			  <div class="layui-form-item">
			    <label class="layui-form-label">手机号</label>
			    <div class="layui-input-block">
			     	 <input type="tel" name="phone" lay-verify="required|phone" autocomplete="off" placeholder="请输入手机号" class="layui-input">
			    </div>
			  </div>
			  <div class="layui-form-item">
			  	 <div class="layui-inline" style="width: 200px;margin-right: 0;">
			  	 	 <label class="layui-form-label">验证码</label>
				    <div class="layui-input-block" style="width: 120px;">
				       	<input type="text" name="number" lay-verify="required|number" autocomplete="off" class="layui-input">
				    </div>
				</div>
				 <div class="layui-inline" style="width: 120px;">
				    <div class="layui-input-block" style="width: 100px; margin-left: 0;">
				       	 <label class="layui-btn" id="veryCode" onclick="getCode(this)" style="background-color: #009ACD; padding: 0 10px">获取验证码</label>
				    </div>
				</div>
			</div>
			  <div class="layui-form-item">
			    <label class="layui-form-label">新密码</label>
			    <div class="layui-input-block">
			     	 <input type="password" name="password" lay-verify="pass" autocomplete="off" placeholder="请输入新密码 至少6个字符" class="layui-input">
			    </div>
			  </div>
			  <div class="layui-form-item">
			    <label class="layui-form-label" style="padding-left:10px">确认密码</label>
			    <div class="layui-input-block">
			     	 <input type="password" name="password" lay-verify="pass" autocomplete="off" placeholder="请确认新密码 至少6个字符" class="layui-input">
			    </div>
			  </div>

			  <div class="layui-form-item" style="margin-top: 40px;">
			  	<div class="layui-inline">
				    <div class="layui-input-block" style="margin-left: 10px; width: 100px;">
				       <button class="layui-btn" style="background-color: #009ACD" lay-submit="" lay-filter="demo1">提交修改</button>
				    </div>
				</div>
				<div class="layui-inline">
			      <div class="layui-input-inline" style="width: 230px;">
			        <a  href="/main/login" class="layui-btn layui-btn-primary" style="float: right;  border:0">返回登录？</a>
			      </div>
			    </div>
			  </div>

			</form>
		</div>
		

	</div>
</div>

<script type="text/javascript">
	/* 短信验证码获取 */
	//设置验证码获取的倒计时
var countdown=60; 
function settime(obj) { 
	if (countdown == 0) { 
		obj.removeAttribute("disabled");    
		// obj.value="获取验证码"; 
		obj.innerText="获取验证码";
		countdown = 60; 
	    return;
	} else { 
	   	obj.setAttribute("disabled", true); 
	    obj.innerText="重新发送(" + countdown + ")"; 
	    countdown--; 
	} 
	setTimeout(function() { 
		settime(obj) }
		,1000) 
}

//get the code
function getCode(obj)
{
	//先判断手机号是否注册
	var status =200;
	if(status == 200){
		settime(obj);
	}else{
		alert('手机号已经注册 请直接登录');
		return;
	}

	//获取验证码函数
}

</script>



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









