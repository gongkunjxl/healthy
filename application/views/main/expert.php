<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="content-search">
    <form class="layui-form search-form" action="">
            <input class="search-input" type="text" name="title" autocomplete="off" placeholder="请输入您要搜索的关键词" />

            <div style="height: 15px"></div>

            <div class="layui-form-item">
                <div class="layui-inline">
                    <div class="layui-input-inline"  style="width: 120px;">
                        <select name="modules" lay-verify="required" lay-search="">
                            <option value="">主题</option>
                            <option value="1">layer</option>
                        </select>
                    </div>
                </div>
                <div class="layui-inline">
                    <div class="layui-input-inline search-form-item"  style="width: 120px; margin-left: 20px;">
                        <select name="modules" lay-verify="required" lay-search="">
                            <option value="">类型</option>
                            <option value="1">layer</option>
                        </select>
                    </div>
                </div>
                <div class="layui-inline">
                    <div class="layui-input-inline" style="width: 120px; margin-left: 20px;">
                        <select name="modules" lay-verify="required" lay-search="">
                            <option value="">语言</option>
                            <option value="1">layer</option>
                        </select>
                    </div>
                </div>
                <div class="layui-inline">
                    <div class="layui-input-inline" style="width: 120px; margin-left: 20px;">
                        <select name="modules" lay-verify="required" lay-search="">
                            <option value="">制作省市</option>
                            <option value="1">layer</option>
                        </select>
                    </div>
                </div>
                <div class="layui-inline">
                    <div class="layui-input-inline" style="width: 120px; margin-left: 20px;">
                        <button class="layui-icon" style="width: 115px; height: 38px;" lay-submit="" lay-filter="search">&#xe615; 搜索</button>
                    </div>
                </div>
            </div>
    </form>
</div>  
<div class="layui-container">
    <div class="layui-row ">
    	<!-- 左边 -->
    	<div class="layui-col-md3" style="height: auto; padding: 1px;">
    		<div class="quick-nav">
	    		<div class="quick-nav-title">
			    		<p>&nbsp;&nbsp;快速导航</p>
			    </div>
			    <div class="site-tree">
			    	<div class="site-tree-item">
			    		<label>慢性疾病</label>
			    		<ul>
			    			<li style="width: 40%;float: left;"><a href="#">高血脂</a></li>
			    			<li><a href="#">脑卒中</a></li>
			    			<li><a href="#">高血压</a></li>
			    			<li><a href="#">糖尿病</a></li>
			    			<li><a href="#">心梗</a></li>
			    		</ul>
			    	</div>
			    	<div class="site-tree-item">
			    		<label>健康生活方式</label>
			    		<ul>
			    			<li><a href="#">情绪管理</a></li>
			    			<li><a href="#">智慧选择</a></li>
			    			<li><a href="#">吃动平衡</a></li>
			    			<li><a href="#">膳食平衡</a></li>
			    		</ul>
			    	</div>
			    	<div class="site-tree-item">
			    		<label>科普专家库</label>
			    		<ul>
			    			<li><a href="#">加入我们</a></li>		
			    		</ul>
			    	</div>
			    </div>
		    </div>
		</div>

		<!-- 中间 -->
		<div class="layui-col-md6" style="height:auto; overflow:hidden;">
		  	<!-- 视频 -->
			<div>
				<p style="text-align: center;font-size: 23px;color:#1792CD;"><b>健康科普专家库</b></p>
			</div>

			<div>
				<!-- 内容 -->
		    	<div style="width: 100%;margin-top: 3px;">
					<div class="quick-detail-item" onmouseover="javascript:addHeight(this);" onmouseleave="javascript:decreaseHeight(this);" onclick="">
						<div class="clarity">
							<p style="font-size: 16px;text-align: center; height: 100%;line-height:40px">A类专家</p>
							<p style="font-size: 16px;text-align: center; height: 100%;line-height:40px">A类专家介绍</p>
						</div>
					</div>
					<div class="quick-detail-item" onmouseover="javascript:addHeight(this);" onmouseleave="javascript:decreaseHeight(this);" onclick="">
						<div class="clarity">
							<p style="font-size: 16px;text-align: center; height: 100%;line-height:40px">B类专家</p>
							<p style="font-size: 16px;text-align: center; height: 100%;line-height:40px">B类专家介绍</p>
						</div>
					</div>

					<div class="quick-detail-item" onmouseover="javascript:addHeight(this);" onmouseleave="javascript:decreaseHeight(this);" onclick="" style="margin-top: 20px;">
						<div class="clarity">
							<p style="font-size: 16px;text-align: center; height: 100%;line-height:40px">C类专家</p>
							<p style="font-size: 16px;text-align: center; height: 100%;line-height:40px">C类专家介绍</p>
						</div>
					</div>

					<div class="quick-detail-item" onmouseover="javascript:addHeight(this);" onmouseleave="javascript:decreaseHeight(this);" onclick="" style="margin-top: 20px;">
						<div class="clarity">
							<p style="font-size: 16px;text-align: center; height: 100%;line-height:40px">D类专家</p>
							<p style="font-size: 16px;text-align: center; height: 100%;line-height:40px">D类专家介绍</p>
						</div>
					</div>
		    	</div>
			</div>	
	  	</div>

	  	<!-- 右边登录-->
	  	<div class="layui-col-md3" style="height: auto; padding: 1px;">  
		  	<!-- 用户登录 -->
		    <div class="index-login">
		    	<div class="index-login-title">
		    		<p>用户登录</p>
		    	</div>
		    	<div class="index-login-content">
			    	<form class="layui-form" action="">
					  	<div class="layui-form-item">
						    <div class="layui-input-block" style="width: 60%; margin-left: 10%;">
						       <input type="text" class="login-input" name="username" required  lay-verify="required" placeholder="用户名" autocomplete="off" class="layui-input">
						    </div>
					
						    <div class="layui-input-block" style="width: 60%; margin-left: 10%; margin-top: 20px;">
						       <input type="text" class="login-input" name="username" required  lay-verify="required" placeholder="密码" autocomplete="off" class="layui-input">
						    </div>
					  	</div>

						  <!-- 按钮 -->
						<div class="layui-form-item" style="margin-top: 30px; ">
						  	<div class="layui-inline" >
							    <div class="layui-input-block" style="margin-left: 5px;">
							     	<button class="layui-btn layui-btn-primary login-btn">&nbsp;&nbsp;登录&nbsp;&nbsp;</button>
							    </div>
							</div>
							<div class="layui-inline" >
							    <div class="layui-input-block" style="margin-left:5px;">
							     	<label class="layui-btn layui-btn-primary forget-pwd"><a href="#">忘记密码</a></label>
							    </div>
							</div>
					    </div>
					</form>
					<!-- 注册新用户 -->
					<p class="register"><a href="#" >新用户注册</a></p>
		    	</div>	
		    </div>

		    <!-- 相关链接 -->
		    <div class="index-link">
		    	<div class="index-link-title">
		    		<p>相关链接</p>
		    	</div>
		    	<div class="index-link-content">
			    	<img src="static/images/lianjie.png">
		    	</div>	
		    </div>
	  	</div>

    </div>
</div>
<script>

$(function(){
     $(".quick-detail-item").onmouseover(function() {    // 单击div元素
         $(this).find('.clarity').css('height','100%');    // 使用children('li')获取div下的li元素，然后设置颜色为red即红色
     });

     $(".quick-detail-item").onmouseleave(function() {    // 单击div元素
         $(this).find('.clarity').css('height','22%');    // 使用children('li')获取div下的li元素，然后设置颜色为red即红色
     });
 });
function addHeight(obj){
	$(obj).find('.clarity').addClass('after-clarity');
	$(obj).find('.clarity').removeClass('clarity');
	$($(obj).find('.after-clarity').children()[0]).hide();
	$($(obj).find('.after-clarity').children()[1]).show();

}

function decreaseHeight(obj){
	$(obj).find('.after-clarity').addClass('clarity');
	$(obj).find('.after-clarity').removeClass('after-clarity');
	$($(obj).find('.clarity').children()[1]).hide();
	$($(obj).find('.clarity').children()[0]).show();
}

//一般直接写在一个js文件中
layui.use(['layer', 'form'], function(){
  var layer = layui.layer
  ,form = layui.form;
 
});
</script> 