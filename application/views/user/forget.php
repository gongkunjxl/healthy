 <?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- <link rel="stylesheet" href="/static/css/video-list-page.css"> -->
<link rel="stylesheet" href="/static/css/user-page.css">
<div class="layui-container">
	<div class="register-show">
		<h1>密码找回页面</h1>
		<div class="register-content">
			<form class="layui-form" action="/main/forget" method="post" id="regForm" enctype="multipart/form-data">
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
//verfy phone  status: 200代表手机号未注册  100已经注册
function veryPhone(phoneNum)
{	
	var data={
		phoneNum: phoneNum,
	};
	var re_status=100;
	$.ajax({
		url: '/api/veryPhone',
		type: 'post',
		dataType:'json',
		async: false,
		data: data,
		success: function (data) {
		 	re_status = data.status;
		 	// alert(JSON.stringify(data));
		},
		error: function(data) {
	      	alert("Sorry error");
		}
	});
	return re_status;
}

// get verify code 200:success  100:failed
function getVercode(phoneNum)
{
	var data={
		phoneNum: phoneNum,
	};
	var re_status=100;
	$.ajax({
		url: '/api/getVeryCode',
		type: 'post',
		dataType:'json',
		async: false,
		data: data,
		success: function (data) {
		 	re_status = data.status;
		},
		error: function(data) {
	      	alert("Sorry error");
		}
	});
	return re_status;
}

//get the code
function getCode(obj)
{
	//先判断手机号是否注册
	var phoneNum = document.getElementById("phoneNum").value;
	var myreg = /^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1}))+\d{8})$/; 
	if(!myreg.test(phoneNum)) 
	{ 
		alert('请输入有效的手机号码！'); 
		return false; 
	}
	var status = veryPhone(phoneNum);
	if(status == 200){
		settime(obj);
	}else{
		alert('手机号已经注册 请直接登录');
		return;
	}
	//获取验证码函数
	var re_status = getVercode(phoneNum);
	if(re_status == 200){
		alert('验证码发送成功');
	}
}

//check code 5minutes 200:success  100:failed
function checkVercode(phoneNum,verCode)
{
	var data={
		phoneNum: phoneNum,
		verCode: verCode
	};
	var re_status=100;
	$.ajax({
		url: '/api/checkVercode',
		type: 'post',
		async: false,
		dataType:'json',
		data: data,
		success: function (data) {
	     	re_status = data.status;
	    },
	    error: function(data) {
	     	alert("Sorry error");
		}
	});
	return re_status;
}

</script>

<script>
layui.use(['form', 'layedit', 'laydate'], function(){
  var form = layui.form;
  //监听提交
  form.on('submit(subReg)', function(data){
  	var phoneNum=document.getElementById("phoneNum").value;
  	var verCode=document.getElementById("veryCode").value;
  	var pass=document.getElementById("Password").value;
  	var verPass=document.getElementById("veryPassword").value;
  	if(pass.length <6  || verPass.length <6){
			alert('密码长度至少6个字符');
			return false;
	}
	if(pass != verPass){
		alert('两次输入不一样');
		return false;
	}
	var check = checkVercode(phoneNum,verCode);
	// alert(check);
	if(check == 200){
		// return true;
	}else{
		return false;
	}

    // layer.alert(JSON.stringify(data.field), {
    //   title: '最终的提交信息'
    // })
  });
  
});
</script>









