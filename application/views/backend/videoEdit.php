 <?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<link rel="stylesheet" type="text/css" href="/static/css/back-useradmin.css">
<script type="text/javascript" src="/static/layui/layui.js"></script>
<script type="text/javascript" src="/static/js/province.js"></script>
<!-- 视频 -->
<script type="text/javascript" src="/static/js/html5media.min.js"></script>
<script src="/static/js/ugcUploader.js"></script>
<div class="layui-container" >
	<!-- <?php //var_dump($data); ?> -->
	<h2>视频《<?php echo $data['name']; ?>》的详情信息</h2>
	<div class="user-edit">
		<form class="layui-form">
		  <div class="layui-form-item">
		    <label class="layui-form-label">视频ID</label>
		    <div class="layui-input-block" style="width: 100px; height: 30px;">
		       <input class="layui-input" readonly="true"  style="border:0" id ="heaId" value="<?php echo $data['id']; ?>">
		    </div>
		   </div>
		    <div class="layui-form-item">
		    <label class="layui-form-label">腾讯ID</label>
		    <div class="layui-input-block" style="width: 200px; height: 30px;">
		       <input class="layui-input" readonly="true"  style="border:0" id ="videoId" value="<?php echo $data['videoId']; ?>">
		    </div>
		  </div>
		   <div class="layui-form-item" >
		    <label class="layui-form-label">视频标题</label>
		    <div class="layui-input-block" style="width: 40%;">
		      <input type="text" id="name" lay-verify="name" autocomplete="off" value="<?php echo $data['name']; ?>" class="layui-input">
		    </div>
		  </div>
		  <div class="layui-form-item" >
		    <label class="layui-form-label">视频作者</label>
		    <div class="layui-input-block" style="width: 40%;">
		      <input type="text" id="author" lay-verify="author" autocomplete="off" value="<?php echo $data['author']; ?>" class="layui-input">
		    </div>
		  </div>
		   <div class="layui-form-item" >
		    <label class="layui-form-label">作者职称</label>
		    <div class="layui-input-block" style="width: 40%;">
		      <input type="text" id="title" lay-verify="title" autocomplete="off" value="<?php echo $data['title']; ?>" class="layui-input">
		    </div>
		  </div>
		  <div class="layui-form-item">
		    <label class="layui-form-label">视频主题</label>
		    <div class="layui-input-block" style="width: 40%">
		      <input type="radio" lay-filter="theme" name="theme" <?php if($data['themeId']== 1):?> checked="true" <?php endif; ?> value="1"  title="慢性病" >
		      <input type="radio" name="theme" lay-filter="theme" <?php if($data['themeId']== 2):?> checked="true" <?php endif; ?> value="2"   title="健康生活方式">
		    </div>
		  </div>
		  <div class="layui-form-item">
		    <label class="layui-form-label">视频类型</label>
		    <div class="layui-input-block" style="width: 40%">
		      <select id="videoType" name="videoType" lay-filter="type">

		      </select>
		    </div>
		  </div>
		  <div class="layui-form-item">
		    <label class="layui-form-label">制作省份</label>
		    <div class="layui-input-block" style="width: 40%">
		      <select id="province" name="province" lay-filter="province|required">
		        
		      </select>
		    </div>
		  </div>
		  <div class="layui-form-item">
		    <label class="layui-form-label">视频语言</label>
		    <div class="layui-input-block" style="width: 40%">
		      <input type="radio" lay-filter="language" name="language" <?php if($data['language']== 1):?> checked="true" <?php endif; ?> value="1"  title="中文" >
		      <input type="radio" lay-filter="language" name="language" <?php if($data['language']== 2):?> checked="true" <?php endif; ?> value="2" title="English">
		    </div>
		  </div>
		  <div class="layui-form-item" >
		    <label class="layui-form-label">播放量</label>
		    <div class="layui-input-block" style="width: 40%;">
		      <input type="text" id="read" lay-verify="read" autocomplete="off" value="<?php echo $data['read']; ?>" class="layui-input">
		    </div>
		  </div>
		  <div class="layui-form-item" >
		  	<p style="color: red; margin-left: 30px;padding-bottom: 10px;">警告: 请不要轻易更改视频地址和封面地址 腾讯云自动生成</p>
		    <label class="layui-form-label">视频地址</label>
		    <div class="layui-input-block" style="width: 80%;">
		      <input type="text" id="videoAddr" lay-verify="videoAddr" autocomplete="off" value="<?php echo $data['videoAddr']; ?>" class="layui-input">
		    </div>
		  </div>
		  <div class="layui-form-item" >
		    <label class="layui-form-label">封面地址</label>
		    <div class="layui-input-block" style="width: 80%;">
		      <input type="text" id="covAddr" lay-verify="covAddr" autocomplete="off" value="<?php echo $data['covAddr']; ?>" class="layui-input">
		    </div>
		  </div>

		  <div class="layui-form-item">
		    <label class="layui-form-label">上传时间</label>
		    <div class="layui-input-block" style="width: 200px; height: 30px;">
		       <input id="ctime" class="layui-input" readonly="true" style="border:0; color: #009ACD" value="<?php echo date("Y-m-d H:i:s",$data['ctime']); ?>">
		    </div>
		  </div>
		  <!-- 视频预览和封面替换 -->
		  <p style="margin-top: 10px;">封面预览</p>
		  <div class="cover-show">
		  	<img id="covShow" src="<?php echo $data['covAddr']; ?>">
		  	<button type="button" id="changeCover" class="layui-btn  layui-btn-normal" style="margin-left: 40px; float: left;margin-top: 70px;">更换封面</button>
		  </div>
		  <p style="margin-top: 30px;">视频预览</p>
		  <div class="video-show">
		  	<div class="video-content">
		  		<video id="posterShow" poster="<?php echo $data['covAddr']; ?>" controls preload "> 
					<source src="http://1255767271.vod2.myqcloud.com/cf20188avodgzp1255767271/acae3eba4564972818825976127/3g271zmMb48A.mp4"></source>
				</video>
		  	</div>
		  </div>

		  <div class="layui-form-item layui-form-text" style="margin-top: 50px;">
			  <div class="layui-form-item">
			    <div class="layui-input-block">
			      <button class="layui-btn" lay-submit="" lay-filter="editSubmit">立即修改</button>
			      <a style="margin-left: 20%;" href=”#” onClick="javascript:window.history.back();return false;" class="layui-btn layui-btn-primary">返回</a>
			    </div>
		  </div>
		</form>	
	<!-- 替换封面form -->
	 <form id="covFrom">
		<input id="changeCover-file" type="file" style="display:none;"/>
	</form>
	</div>
	<!-- 文章详情 -->
	<!-- <div id="pdfRead" style="height: 600px; width: 80%;margin-top: 30px">
	</div> -->

	<div style="width: 100%;height: 80px;"></div>
</div>
<script type="text/javascript">
// load the data
var sickData,lifeData;
$.ajaxSettings.async = false;
$.getJSON("/static/js/sickTheme.json",function(data){ 
	sickData = data; 
	var themeId = "<?php echo $data['themeId']; ?>";
	var type = "<?php echo $data['type']; ?>";
	if(themeId == 1){
		var typeObj = document.getElementById("videoType");
		var innerHTML = '';
		for(value in sickData){
			if(sickData[value].id == type){
				innerHTML=innerHTML+'<option selected="true" value="'+sickData[value].id+'">'+sickData[value].name+"</option>";
			}else{
				innerHTML=innerHTML+'<option value="'+sickData[value].id+'">'+sickData[value].name+"</option>";
			}
		}
		typeObj.innerHTML = innerHTML;
	}
}); 
$.getJSON("/static/js/lifeTheme.json",function(data){ 
	lifeData = data; 
	var themeId = "<?php echo $data['themeId']; ?>";
	var type = "<?php echo $data['type']; ?>";
	if(themeId == 2){
		var typeObj = document.getElementById("videoType");
		var innerHTML = '';
		for(value in lifeData){
			if(lifeData[value].id == type){
				innerHTML=innerHTML+'<option selected="true" value="'+lifeData[value].id+'">'+lifeData[value].name+"</option>";
			}else{
				innerHTML=innerHTML+'<option value="'+lifeData[value].id+'">'+lifeData[value].name+"</option>";
			}
		}
		typeObj.innerHTML = innerHTML;
	}
}); 
//province
var provinceObj = document.getElementById("province");
var innerHTML = '';
var tmp_pro = "<?php echo $data['province']; ?>";
for(value in province){
	if(province[value] == tmp_pro){
		innerHTML=innerHTML+'<option selected="true" value="'+province[value]+'">'+province[value]+"</option>";
	}else{
		innerHTML=innerHTML+'<option value="'+province[value]+'">'+province[value]+"</option>";
	}
}
provinceObj.innerHTML = innerHTML;


layui.use(['form', 'layedit', 'laydate'], function(){
  var form = layui.form
  ,layedit = layui.layedit
  ,layer = layui.layer;

  	// 监听radio事件
  	form.on('radio(theme)', function(data){
  		var typeObj = document.getElementById("videoType");
  	 	var innerHTML = '';
	  	if(data.value == 1){
			for(value in sickData){
				innerHTML=innerHTML+'<option value="'+sickData[value].id+'">'+sickData[value].name+"</option>";
			}
	  	}else{
	  		for(value in lifeData){
				innerHTML=innerHTML+'<option value="'+lifeData[value].id+'">'+lifeData[value].name+"</option>";
			}
	  	}
	  	// alert(innerHTML);
	  	typeObj.innerHTML = innerHTML;
	  	form.render('select'); 
	});  

	form.on('submit(editSubmit)', function(data){
		layer.confirm('确认修改视频信息？', { title:['修改视频信息提示','font-size:20px; text-align:center']}, function(index)
		{
 		 	//do something
 		 	// alert('yes');
		  	layer.close(index);
		  	var theme='';
		  	var lang = '';
		  	var themeRadio = document.getElementsByName("theme");
		  	for (i=0; i<themeRadio.length; i++) {  
		        if (themeRadio[i].checked) {  
		           theme = themeRadio[i];
		        }  
		    } 
		    var langRadio = document.getElementsByName("language");
		  	for (i=0; i<langRadio.length; i++) {  
		        if (langRadio[i].checked) {  
		           lang = langRadio[i];
		        }  
		    } 
		  	var id = document.getElementById("heaId");
		  	var videoId = document.getElementById("videoId");
		  	var name = document.getElementById("name");
		  	var author = document.getElementById("author");
		  	var title = document.getElementById("title");
		  	var read = document.getElementById("read");
		  	var type = document.getElementById("videoType");
		  	var province = document.getElementById("province");
		  	var videoAddr = document.getElementById("videoAddr");
		  	var covAddr = document.getElementById("covAddr");
		  	
			var data={
				id: id.value,
				videoId: videoId.value,
				name: name.value,
				author: author.value,
				title: title.value,
				read: read.value,
				videoAddr: videoAddr.value,
				covAddr: covAddr.value,
				theme: theme.value,
				language: lang.value,
				type: type.value,
				province: province.value
			};
			 // alert(JSON.stringify(data));
			$.ajax({
				url: '/api/updatevideoInfo',
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
<!-- 更换封面 -->
<script type="text/javascript">
var getSignature = function(callback){
	var data = {
		action: 'signature'
	};
	$.ajax({
		//url: 'http://123.206.83.120:80/interface.php',
		url: '/api/getSignature',
		data: data,
		type: 'POST',
		dataType: 'json',
		success: function(data){
			// alert(JSON.stringify(data));
			if(data.status == 200){
				callback(data.signature);
			}		
		},
		error: function(data) {
			alert("Sorry error");
		}
	});
};

$('#changeCover').on('click', function () {
	$('#changeCover-file').click();
});
var fileId = "<?php echo $data['videoId']; ?>";
var heaId = "<?php echo $data['id']; ?>";

$('#changeCover-file').on('change', function (e) {
		var changeCoverFile = this.files[0];
		var resultMsg = qcVideo.ugcUploader.start({
		fileId: fileId,
		coverFile: changeCoverFile,
		getSignature: getSignature,
		success: function(result){
			// if(result.type == 'video') {
			// 	$('[name=videoresult'+num+']').text('上传成功');
			// } else if (result.type == 'cover') {
			// 	$('[name=coverresult'+num+']').text('上传成功');
			// }
		},
		error: function(result){
			alert("update failed");
		},
		progress: function(result){
		},
		finish: function(result){
			// alert(result.coverUrl);
			//替换数据库
			var se_data = {
				id: heaId,
				covAddr: result.coverUrl
			};
			$.ajax({
				url: '/api/updateCover',
				data: se_data,
				type: 'POST',
				dataType: 'json',
				success: function(data){
					if(data.status == 200){
						alert("替换成功");
					}
					// alert(JSON.stringify(data));			
				},
				error: function(data) {
					alert("Sorry error");
				}
			});
			var covObj = document.getElementById("covAddr");
			covObj.setAttribute("value",result.coverUrl);
			var showObj = document.getElementById("covShow");
			showObj.setAttribute("src",result.coverUrl);
			var postObj = document.getElementById("posterShow");
			postObj.setAttribute("poster",result.coverUrl);
		}
		});
	});
</script>















