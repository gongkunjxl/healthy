 <?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<link rel="stylesheet" type="text/css" href="/static/css/back-useradmin.css">
<script type="text/javascript" src="/static/layui/layui.js"></script>
<script type="text/javascript" src="/static/js/province.js"></script>
<script type="text/javascript" src="/static/js/ugcUploader.js"></script>
<style type="text/css">
	[act=cancel-upload]{
		text-decoration: none;
		cursor:pointer;
	}
</style>
<div class="layui-container" >
	<h2>增加视频页面</h2>
	<div class="user-edit">
		<form class="layui-form">
		   <div class="layui-form-item" >
		    <label class="layui-form-label">视频标题</label>
		    <div class="layui-input-block" style="width: 40%;">
		      <input type="text" id="name" lay-verify="name|required" autocomplete="off" placeholder="请输入视频标题" class="layui-input">
		    </div>
		  </div>
		   <div class="layui-form-item" >
		    <label class="layui-form-label">视频作者</label>
		    <div class="layui-input-block" style="width: 40%;">
		      <input type="text" id="author" lay-verify="author|required" autocomplete="off" placeholder="请输入视频作者" class="layui-input">
		    </div>
		  </div>
		  <div class="layui-form-item" >
		    <label class="layui-form-label">作者职称</label>
		    <div class="layui-input-block" style="width: 40%;">
		      <input type="text" id="title" lay-verify="title|required" autocomplete="off" placeholder="请输入作者职称" class="layui-input">
		    </div>
		  </div>
		   <div class="layui-form-item">
		    <label class="layui-form-label">视频主题</label>
		    <div class="layui-input-block" style="width: 40%">
		      <input type="radio" name="theme" lay-filter="theme" value="1" checked="true" title="慢性病" >
		      <input type="radio" name="theme" lay-filter="theme" value="2"  title="健康生活方式">
		    </div>
		  </div>
		  <div class="layui-form-item">
		    <label class="layui-form-label">视频类型</label>
		    <div class="layui-input-block" style="width: 40%">
		      <select id="videoType" name="videoType" lay-filter="videoType|required">
		        
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
		      <input type="radio" name="language" value="1" checked="true" title="中文" >
		      <input type="radio" name="language" value="2"   title="English">
		    </div>
		  </div>
		  <div class="layui-form-item" >
		    <label class="layui-form-label">点播量</label>
		    <div class="layui-input-block" style="width: 40%;">
		      <input type="number" id="read" lay-verify="number|required" autocomplete="off" placeholder="请输入阅读量 默认是0" class="layui-input">
		    </div>
		  </div>
		  <div class="add-content">
		  	<p style="color: red;">封面上传</p>
		  	<div class="add-cover">
		  		<img id="uploadCover" src="">
		  		<button type="button" id="addCover" class="layui-btn  layui-btn-normal" style="margin-left: 40px; float: left;margin-top: 70px;">封面选择</button>
		  	</div>
		  	<p style="color: red; margin-top: 30px;">视频上传(警告: 请先确保视频上传成功后再提交其他信息)</p>
		  	<div class="add-video">
		  		<button type="button" id="addVideo" class="layui-btn  layui-btn-normal" style="margin-left: 20px; float: left;margin-top: 20px;">视频选择</button>
		  		<p id="videoName"></p>
		  	</div>
		  	<p style="color: red; margin-top: 30px;">上传提交</p>
		  	<div class="upload-all">
		  		<button type="button" id="uploadAll" class="layui-btn  layui-btn-danger" style="margin-left: 40%; float: left;margin-top: 20px;">提交上传</button>
		  	</div>
		  </div>
		  <div style="width:80%;" id="resultBox"></div>

		  <div class="layui-form-item" style="margin-top: 100px; width: 60%; padding-top: 10px; border-top: 1px solid #F5F5F5">
		    <div class="layui-input-block">
		      <button class="layui-btn" lay-submit="" lay-filter="editSubmit">提交信息</button>
		       <a style="margin-left: 20%;" href=”#” onClick="javascript:window.history.back();return false;" class="layui-btn layui-btn-primary">返回</a>
		    </div>
		  </div>
		</form>
	</div>
	<form id="uploadForm">
		<input id="addVideo-file" type="file" style="display:none;"/>
		<input id="addCover-file" type="file" style="display:none;"/>
	</form>
	<div style="width: 100%;height: 50px;"></div>
</div>

<script type="text/javascript">
var videoAddr = '';
var covAddr = '';
var videoId = '';

var sickData,lifeData;
$.ajaxSettings.async = false;
$.getJSON("/static/js/sickTheme.json",function(data){ 
	sickData = data; 
	var typeObj = document.getElementById("videoType");
	var innerHTML = '';
	for(value in sickData){
		innerHTML=innerHTML+'<option value="'+sickData[value].id+'">'+sickData[value].name+"</option>";
	}
	typeObj.innerHTML = innerHTML;
}); 
$.getJSON("/static/js/lifeTheme.json",function(data){ 
	lifeData = data; 
}); 
//province
var provinceObj = document.getElementById("province");
var innerHTML = '';
for(value in province){
	innerHTML=innerHTML+'<option value="'+province[value]+'">'+province[value]+"</option>";
}
provinceObj.innerHTML = innerHTML;


layui.use(['form', 'layedit', 'laydate'], function(){
   var form = layui.form
   ,layedit = layui.layedit
   ,layer = layui.layer;

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
	  	typeObj.innerHTML = innerHTML;
	  	form.render('select'); 
	});  

	form.on('submit(editSubmit)', function(data){
		layer.confirm('确认提交视频信息？', { title:['提交视频信息提示','font-size:20px; text-align:center']}, function(index)
		{
 		 	//do something
 		 	// alert('yes');
		  	layer.close(index);
		  	if(videoId == ''){
		  		layer.msg("请先确保视频上传成功后再提交其他信息");
		  		return;
		  	}
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
		  	var name = document.getElementById("name");
		  	var author = document.getElementById("author");
		  	var title = document.getElementById("title");
		  	var read = document.getElementById("read");
		  	var type = document.getElementById("videoType");
		  	var province = document.getElementById("province");

			var data={
				name: name.value,
				videoId: videoId,
				author: author.value,
				title: title.value,
				read: read.value,
				theme: theme.value,
				language: lang.value,
				type: type.value,
				province: province.value,
				videoAddr: videoAddr,
				covAddr: covAddr
			};
			//alert(JSON.stringify(data));
			$.ajax({
				url: '/api/addNewVideo',
				type: 'post',
				dataType:'json',
				data: data,
				success: function (data) {
					// alert(JSON.stringify(data));
				    if(data.status == 200){
				     	alert("添加成功");
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

<!-- 上传视频和封面 -->
<script type="text/javascript">
	var index = 0;
	var cosBox = [];
	var getSignature = function(callback){
		var data = {
			action: 'signature'
		};
		$.ajax({
			url: '/api/getSignature',
			data: data,
			type: 'POST',
			dataType: 'json',
			success: function(data){
				if(data.status == 200){
					callback(data.signature);
				}		
			},
			error: function(data) {
				alert("Sorry error");
			}
		});
	};
	/* 添加上传信息模块*/
	var addUploaderMsgBox = function(type){
		var html = '<div class="uploaderMsgBox" name="box'+index+'">';
		if(!type || type == 'hasVideo') {
			html += '视频名称：<span name="videoname'+index+'"></span>；' + 
				'计算sha进度：<span name="videosha'+index+'">0%</span>；' + 
				'上传进度：<span name="videocurr'+index+'">0%</span>；' + 
				'fileId：<span name="videofileId'+index+'">   </span>；' + 
				'上传结果：<span name="videoresult'+index+'">   </span>；' + 
				'地址：<span name="videourl'+index+'">   </span>；<br>'+
				'<a href="javascript:void(0);" style="color: red" name="cancel'+index+'" cosnum='+index+' act="cancel-upload">取消上传</a><br>';
		}
		if(!type || type == 'hasCover') {
			html += '封面名称：<span name="covername'+index+'"></span>；' + 
			'计算sha进度：<span name="coversha'+index+'">0%</span>；' + 
			'上传进度：<span name="covercurr'+index+'">0%</span>；' + 
			'上传结果：<span name="coverresult'+index+'">   </span>；' + 
			'地址：<span name="coverurl'+index+'">   </span>；<br>' + 
			'</div>'
		}
		html += '</div>';
		
		$('#resultBox').append(html);
		return index++;
	};	
	/* 取消上传绑定事件 */
	$('#resultBox').on('click', '[act=cancel-upload]', function() {
		var cancelresult = qcVideo.ugcUploader.cancel({
			cos: cosBox[$(this).attr('cosnum')],
			taskId: $(this).attr('taskId')
		});
		console.log(cancelresult);
	});

	/* 上传视频+封面 */
	var videoFileList = [];
	var coverFileList = [];
	// 给addVideo添加监听事件
	$('#addVideo-file').on('change', function (e) {
		var videoFile = this.files[0];
		videoFileList[0] = videoFile;
		var videoObj = document.getElementById('videoName');
		videoObj.innerHTML = videoFile.name;
		$('#result').append(videoFile.name +　'\n');
	});
	$('#addVideo').on('click', function () {
		$('#addVideo-file').click();
	});
	// 给addCover添加监听事件
	$('#addCover-file').on('change', function (e) {
		var coverFile = this.files[0];
		coverFileList[0] = coverFile;
		//preView cover images
		var covObj = document.getElementById("uploadCover");
		var reader = new FileReader();  
	    reader.onload = function(evt){covObj.setAttribute("src",evt.target.result);};  
	    reader.readAsDataURL(coverFile);  
		$('#result').append(coverFile.name +　'\n');
	});
	$('#addCover').on('click', function () {
		$('#addCover-file').click();
	});

	var startUploader = function(){
		if(videoFileList.length){
			var num = addUploaderMsgBox();
			if(!coverFileList[0]){
				$('[name=covername'+num+']').text('没有上传封面');
				alert("没有上传封面");
				return;
			}
			var resultMsg = qcVideo.ugcUploader.start({
				videoFile: videoFileList[0],
				coverFile: coverFileList[0],
				getSignature: getSignature,
				allowAudio: 1,
				success: function(result){
					if(result.type == 'video') {
						$('[name=videoresult'+num+']').text('上传成功');
						$('[name=cancel'+num+']').remove();
						cosBox[num] = null;
					} else if (result.type == 'cover') {
						$('[name=coverresult'+num+']').text('上传成功');
					}
				},
				error: function(result){
					if(result.type == 'video') {
						$('[name=videoresult'+num+']').text('上传失败>>'+result.msg);
					} else if (result.type == 'cover') {
						$('[name=coverresult'+num+']').text('上传失败>>'+result.msg);
					}
				},
				progress: function(result){
					if(result.type == 'video') {
						$('[name=videoname'+num+']').text(result.name);
						$('[name=videosha'+num+']').text(Math.floor(result.shacurr*100)+'%');
						$('[name=videocurr'+num+']').text(Math.floor(result.curr*100)+'%');
						$('[name=cancel'+num+']').attr('taskId', result.taskId);
						cosBox[num] = result.cos;
					} else if (result.type == 'cover') {
						$('[name=covername'+num+']').text(result.name);
						$('[name=coversha'+num+']').text(Math.floor(result.shacurr*100)+'%');
						$('[name=covercurr'+num+']').text(Math.floor(result.curr*100)+'%');
					}
				},
				finish: function(result){
					$('[name=videofileId'+num+']').text(result.fileId);
					$('[name=videourl'+num+']').text(result.videoUrl);
					videoAddr = result.videoUrl;
					videoId = result.fileId;
					if(result.coverUrl) {
						$('[name=coverurl'+num+']').text(result.coverUrl);
						covAddr = result.coverUrl;
					}
					if(result.message) {
						$('[name=videofileId'+num+']').text(result.message);
					}
				}
			});
			if(resultMsg){
				$('[name=box'+num+']').text(resultMsg);
			}
		} else {
			alert("请添加视频");
			$('#result').append('请添加视频！\n');
		}
		
	}
	// 上传按钮点击事件
	$('#uploadAll').on('click', function () {
		startUploader();
		$('#uploadForm')[0].reset();
	});

</script>











