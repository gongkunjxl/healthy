 <?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<link rel="stylesheet" type="text/css" href="/static/css/back-useradmin.css">
<script type="text/javascript" src="/static/layui/layui.js"></script>
<script type="text/javascript" src="/backend/js/jquery.form.js"></script>
<script type="text/javascript" src="/static/js/province.js"></script>
<div class="layui-container" >
	<h2>修改音频页面</h2>
	<div class="user-edit">
		<form id = "audioForm" class="layui-form">
		   <input class="layui-input" readonly="true"  style="border:0;display:none;" id ="id" value="<?php echo $data['id']; ?>" >
		   <div class="layui-form-item" >
		    <label class="layui-form-label">音频名称</label>
		    <div class="layui-input-block" style="width: 40%;">
		      <input type="text" id="name" value="<?php echo $data['name']; ?>" lay-verify="title|required" autocomplete="off" placeholder="请输入音频名称" class="layui-input">
		    </div>
		  </div>
		  <div class="layui-form-item layui-form-text">
		    <label class="layui-form-label" style="">音频介绍</label>
		    <div class="layui-input-block" style="width: 60%; ">
		      <textarea  class="layui-textarea" id="introduce" lay-verify="introduce|required" placeholder="请输入专家介绍" style="height: 180px; line-height: 24px;"><?php echo $data['description']; ?></textarea>
		    </div>
		  </div>
		 
		  <div class="layui-form-item" pane="">
		    <label class="layui-form-label">主题</label>
		    <div class="layui-input-block">
		      <input type="radio" name="theme" value="1" <?php if($data['theme']== 1):?> checked="true" <?php endif; ?> title="慢性疾病" checked="">
		      <input type="radio" name="theme" value="2" <?php if($data['theme']== 2):?> checked="true" <?php endif; ?> title="健康生活方式">
		    </div>
		  </div>

		  <div class="layui-form-item" >
		    <label class="layui-form-label">类型</label>
		    <div class="layui-input-block" style="width: 40%;">
		     <select id="type" name="type" lay-filter="type|required">
		     	
		     </select>
		    </div>
		  </div>

		 <div class="layui-form-item" >
		    <label class="layui-form-label">语言</label>
		    <div class="layui-input-block" style="width: 40%;">
		     <select id="language" name="language" lay-filter="language|required">
		     	<option value="1" <?php if($data['language']== 1):?> selected="true" <?php endif; ?> >中文</option>
		        <option value="2" <?php if($data['language']== 2):?> selected="true" <?php endif; ?> >English</option>
		     </select>
		    </div>
		  </div>

		  <div class="layui-form-item" >
		    <label class="layui-form-label">制作省市</label>
		    <div class="layui-input-block" style="width: 40%;">
		     <select id="province" name="province" lay-filter="province|required">
		        
		     </select>
		    </div>
		  </div>

		  <div style="background-color: #FFFFFF;margin-left: 0.1px;">
		  	<input type="" name="audio_name" id="audio_name" style="width: 33%;height: 33px;margin-left: 100px;" readonly="readonly" value="<?php echo $data['name'].'.mp3'; ?>">
			<button type="button" class="layui-btn" id="uploadAudio">上传音频</button>
		 </div>
		  
		  <div class="expert-img" style="background-color:#FFFFFF;height: 50px;">
			<img id="headImg" src="<?php echo '/'.$data['pic_url']; ?>">
			<button type="button" class="layui-btn" style="margin-left: 30px; float: left;margin-top: 80px;" id="uploadAudioFront">上传音频封面</button>
		 </div>
		  

		  <div class="layui-form-item" style="margin-top: 200px;">
		    <div class="layui-input-block">
		      <button class="layui-btn" lay-submit="" id="subExpert" lay-filter="editSubmit">提交信息</button>
		       <a style="margin-left: 20%;" href=”#” onClick="javascript:window.history.back();return false;" class="layui-btn layui-btn-primary">返回</a>
		    </div>
		  </div>
		    
		</form>

		<p id="return-data"></p>
	</div>
	<div style="width: 100%;height: 50px;"></div>
</div>
<script type="text/javascript">
var id = "<?php echo $data['id']; ?>";
var pic_url = "<?php echo $data['pic_url']; ?>";
var source_url = "<?php echo $data['source_url']; ?>";
// load the data
var sickData,lifeData;
$.getJSON("/static/js/sickTheme.json",function(data){ 
	sickData = data; 
	var themeId = "<?php echo $data['theme']; ?>";
	var type = "<?php echo $data['type']; ?>";
	if(themeId == 1){
		var typeObj = document.getElementById("type");
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
	var themeId = "<?php echo $data['theme']; ?>";
	var type = "<?php echo $data['type']; ?>";
	if(themeId == 2){
		var typeObj = document.getElementById("type");
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


var audio_id = 0;
layui.use(['form', 'layedit', 'laydate'], function(){
  var form = layui.form
  ,layedit = layui.layedit
  ,layer = layui.layer;
   // var work = layedit.build('work');
   // var introduce = layedit.build('introduce');
   // var study = layedit.build('study');
   // var education = layedit.build('education');
	form.on('submit(editSubmit)', function(data){
	   
		layer.confirm('确认提交音频信息？', { title:['提交音频信息提示','font-size:20px; text-align:center']}, function(index)
		{
 		 	//do something
 		 	// alert('yes');
		  	layer.close(index);
		  	var name = document.getElementById("name");
		  	var introduce = document.getElementById("introduce");
		  	var theme = '';
		  	var themeRadio = document.getElementsByName("theme");
		  	for (i=0; i<themeRadio.length; i++) {  
		        if (themeRadio[i].checked) {  
		           theme = themeRadio[i];
		           break;
		        }  
		    } 
		  	
		  	var type = document.getElementById("type");
		  	var language = document.getElementById("language");
		  	var province = document.getElementById("province");
		  	var id = document.getElementById("id");
			var data={
				id: id.value,
				name: name.value,
				introduce: introduce.value,
				theme: theme.value,
				type: type.value,
				language: language.value,
				province: province.value,
				pic_url: pic_url,
				source_url: source_url
			};
			// alert(JSON.stringify(data));
			$.ajax({
				url: '/api/updateAudioInfo',
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

<!-- 更换头像 -->
<script type="text/javascript">
layui.use('upload', function(){
  var $ = layui.jquery
  ,upload = layui.upload;
  var data ={
  	name: id,
  	pic_url: pic_url
  };
  //普通图片上传
  var uploadInst = upload.render({
    elem: '#uploadAudioFront'
    ,url: '/api/uploadAudioFront'
    ,data: data
    ,accept: 'images'
    ,exts: 'jpg|png|jpeg'
    ,before: function(obj){
      if(id >0){
      	data.name = id;
      }
      //预读本地文件示例，不支持ie8
	  obj.preview(function(index, file, result){
	     $('#headImg').attr('src', result); //图片链接（base64）
	     document.getElementById("audio_name").value = file.name;
	   });
    }
    ,done: function(res){
      //alert(JSON.stringify(res));
      //如果上传失败
      if(res.status == 200){
      	pic_url = res.pic_url;
        return layer.msg('上传成功');
      }else{
      	return layer.msg('上传失败');
      }
      //上传成功
    }
    ,error: function(){
    }
  });

});
</script>

<script type="text/javascript">
layui.use('upload', function(){
  var $ = layui.jquery
  ,upload = layui.upload;
  var data ={
  	name: id,
  	source_url: source_url
  };
  //普通图片上传
  var uploadInst = upload.render({
    elem: '#uploadAudio'
    ,url: '/api/uploadAudio'
    ,data: data
    ,accept: 'file'
    ,before: function(obj){
      if(id >0){
      	data.name = id;
      }
      //预读本地文件示例，不支持ie8
	  obj.preview(function(index, file, result){
	  	 document.getElementById("audio_name").value = file.name;
	     $('#headImg').attr('src', result); //图片链接（base64）
	   });
    }
    ,done: function(res){
      //alert(JSON.stringify(res));
      //如果上传失败
      if(res.status == 200){
      	source_url = res.source_url;
        return layer.msg('上传成功');
      }else{
      	return layer.msg('上传失败');
      }
      //上传成功
    }
    ,error: function(){
    }
  });

});
</script>











