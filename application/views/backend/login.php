<!DOCTYPE html>

<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<title>登录</title>
		<link rel="stylesheet" href="/backend/plugins/layui/css/layui.css" media="all" />
		<script type="text/javascript" src="/backend/plugins/layui/layui.js"></script>
		<link rel="stylesheet" href="/backend/css/login.css" />
	</head>

	<body class="beg-login-bg">
		<div class="beg-login-box">
			<!-- <?php// echo var_dump($data); ?> -->
			<header>
				<h1 style="color: #fff; font-weight: 500">后台登录</h1>
			</header>
			<div class="beg-login-main">
				<form class="layui-form" action="/backend/login" method="post" id="regForm" enctype="multipart/form-data">
					<div class="layui-form-item">
						<label class="beg-login-icon">
                        <i class="layui-icon">&#xe612;</i>
                    </label>
						<input type="text" name="username" lay-verify="username" autocomplete="off" placeholder="这里输入登录名" class="layui-input">
					</div>
					<div class="layui-form-item">
						<label class="beg-login-icon">
                        <i class="layui-icon">&#xe642;</i>
                    </label>
						<input type="password" name="password" lay-verify="password" autocomplete="off" placeholder="这里输入密码" class="layui-input">
					</div>
					<div class="layui-form-item">
						<div class="beg-pull-left beg-login-remember">
							<label>记住帐号？</label>
							<input type="checkbox" name="rememberMe" value="true" lay-skin="switch" title="记住帐号">
						</div>
						<div class="beg-pull-right">
							<button class="layui-btn layui-btn-primary" lay-submit lay-filter="login">
                            <i class="layui-icon">&#xe650;</i> 登录
                        </button>
						</div>
						<div class="beg-clear"></div>
					</div>
				</form>
			</div>
			<footer>
				<p>Healthy @ www.healthy.com</p>
			</footer>
		</div>
		<script>
			layui.use(['layer', 'form'], function() {
				var layer = layui.layer,
					$ = layui.jquery,
					form = layui.form();					
				form.on('submit(login)',function(data){

				});
			});
		</script>
	</body>

</html>