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
			<div class="index-video">
		    	<div class="index-video-title">
		    		<p>视频&nbsp;&nbsp;(354)</p>
		    		<a href="#">more</a>
		    	</div>
		    	<!-- 内容 -->
		    	<div class="index-video-content">
					<div class="index-video-item" >
						<!-- <img src="/static/images/image1.png"/> -->
						<video poster="/static/images/image1.png"   controls preload "> 
							<source src="/video/movie.mp4"></source>
						</video>

						<p><a href="#">管理胆固醇预防心梗演讲</a></p>
					</div>
					<div class="index-video-item">
						<!-- <img src="/static/images/image2.png"/> -->
						<video  poster="/static/images/image2.png" controls preload "> 
							<source src="/video/movie.mp4"></source>
						</video>
						<p><a href="#">管理好胆固醇、预防心梗</a></p>
					</div>
		    	</div>
		    </div>			    

		    <!-- 文章 -->
		    <div class="index-article">
		    	<div class="index-article-title">
		    		<p>文章&nbsp;&nbsp;(547)</p>
		    		<a href="#">more</a>
		    	</div>
		    	<!-- 文章-->
		    	<div class="index-article-content">
					<div class="index-article-item">
						<p><a href="#">1.胆固醇小知识 </a></p>
						<p><a href="#">2.管理胆固醇预防心梗 </a></p>
						<p><a href="#">3.关于胆固醇你知道多少？ </a></p>
						<p><a href="#">4.胆固醇摄入量不在设限，可以放心吃了么?胆固醇摄入量不在设限，可以放心吃了么? </a></p>
					</div>
					<div class="article-item-more">
						<p><a href="#">查看更多 </a></p>
						<p><a href="#">查看更多 </a></p>
						<p><a href="#">查看更多 </a></p>
						<p><a href="#">查看更多 </a></p>
					</div>
		    	</div>
		    </div>	
		    <!-- 音频 -->
		    <div class="index-voice">
		    	<div class="index-voice-title">
		    		<p>音频&nbsp;&nbsp;(147)</p>
		    		<a href="#">more</a>
		    	</div>
		    	<!-- 文章-->
		    	<div class="index-voice-content">
					<div class="index-voice-item">
						<p><a href="#">1.胆固醇小知识 </a></p>
						<p><a href="#">2.管理胆固醇预防心梗 </a></p>
						<p><a href="#">3.关于胆固醇你知道多少？ </a></p>
						
					</div>
					<div style="width: 35%; float: left; margin-left: 5%; height: 120px;">
						<p class="weixinAudio">
							<audio src="sound/sound1.mp3" id="media" width="1" height="1" preload></audio>
							<span id="audio_area" class="db audio_area">
							<span class="audio_wrp db">
							<span class="audio_play_area">
								<i class="icon_audio_default"></i>
								<i class="icon_audio_playing"></i>
				            </span>
							<span id="audio_length" class="audio_length tips_global">1:07</span>
							<span id="audio_progress" class="progress_bar" style="width: 0%;"></span>
							</span>
							</span>
						</p>
						<p class="weixinAudio">
							<audio src="sound/sound2.mp3" id="media" width="1" height="1" preload></audio>
							<span id="audio_area" class="db audio_area">
							<span class="audio_wrp db">
							<span class="audio_play_area">
								<i class="icon_audio_default"></i>
								<i class="icon_audio_playing"></i>
				            </span>
							<span id="audio_length" class="audio_length tips_global">1:07</span>
							<span id="audio_progress" class="progress_bar" style="width: 0%;"></span>
							</span>
							</span>
						</p>
						<p class="weixinAudio">
							<audio src="sound/sound2.mp3" id="media" width="1" height="1" preload></audio>
							<span id="audio_area" class="db audio_area">
							<span class="audio_wrp db">
							<span class="audio_play_area">
								<i class="icon_audio_default"></i>
								<i class="icon_audio_playing"></i>
				            </span>
							<span id="audio_length" class="audio_length tips_global">1:07</span>
							<span id="audio_progress" class="progress_bar" style="width: 0%;"></span>
							</span>
							</span>
						</p>

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
			    	<img src="/static/images/lianjie.png">
		    	</div>	
		    </div>
	  	</div>

    </div>
</div>
<script>
//一般直接写在一个js文件中
layui.use(['layer', 'form'], function(){
  var layer = layui.layer
  ,form = layui.form;
 
});
</script> 
<!-- 调用音频 -->
<!-- <script type="text/javascript">
	$('.weixinAudio').weixinAudio({
		autoplay:'false',
		src:'sound/sound.mp3',
	});

	</script> -->
<script type="text/javascript">
	// 修改了返回的对象,以前的无法接收
	var weixinAudioObj = $('.weixinAudio').weixinAudio();
	// 添加单一播放的逻辑
	$('.weixinAudio').on('click',function(event) {
	    var $this = $(this);
	    var currentIndex = $this.index();
	    // 遍历所有对象，找到非当前点击，执行pause()方法;
	    $.each(weixinAudioObj,function(i, el) {
	        if(i != 'weixinAudio'+currentIndex){
	            el.pause();
	        }
	    });
	});
</script>




