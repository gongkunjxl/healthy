 <?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<link rel="stylesheet" type="text/css" href="/static/css/back-useradmin.css">
<script type="text/javascript" src="/static/layui/layui.js"></script>
<script type="text/javascript" src="/static/js/province.js"></script>
<div class="layui-container" >
	<h2>增加幻灯片页面</h2>
	<div class="user-edit">
		<form id = "audioForm" class="layui-form">
		   <div class="layui-form-item" >
		    <label class="layui-form-label">幻灯片名称</label>
		    <div class="layui-input-block" style="width: 40%;">
		      <input type="text" id="name" lay-verify="title|required" autocomplete="off" placeholder="请输入音频名称" class="layui-input">
		    </div>
		  </div>
		  <div class="layui-form-item layui-form-text">
		    <label class="layui-form-label" style="">幻灯片介绍</label>
		    <div class="layui-input-block" style="width: 60%; ">
		      <textarea  class="layui-textarea" id="introduce" lay-verify="introduce|required" placeholder="请输入幻灯片介绍" style="height: 180px; line-height: 24px;"></textarea>
		    </div>
		  </div>

		  <div class="layui-form-item" >
		    <label class="layui-form-label">作者</label>
		    <div class="layui-input-block" style="width: 40%;">
		      <input type="text" id="author" lay-verify="author|required" autocomplete="off" placeholder="请输入作者" class="layui-input">
		    </div>
		  </div>
		 
		  <div class="layui-form-item" pane="">
		    <label class="layui-form-label">主题</label>
		    <div class="layui-input-block">
		      <input type="radio" name="theme" lay-filter="theme" value="1" title="慢性疾病" checked="">
		      <input type="radio" name="theme" lay-filter="theme" value="2" title="健康生活方式">
		    </div>
		  </div>

		  <div class="layui-form-item" >
		    <label class="layui-form-label">类型</label>
		    <div class="layui-input-block" style="width: 40%;">
		     <select id="type" name="type" lay-filter="type|required">
		     	<option value="1">慢性病</option>   
		     	<option value="2" selected="">冠心病</option>  
		     </select>
		    </div>
		  </div>

		 <div class="layui-form-item" >
		    <label class="layui-form-label">语言</label>
		    <div class="layui-input-block" style="width: 40%;">
		     <select id="language" name="language" lay-filter="language|required">
		     	<option value="1" selected="">中文</option>
		        <option value="2">英文</option>
		     </select>
		    </div>
		  </div>

		  <div class="layui-form-item" >
		    <label class="layui-form-label">制作省市</label>
		    <div class="layui-input-block" style="width: 40%;">
		     <select id="city" name="city" lay-filter="city|required">
		        <option value="杭州" selected="">杭州</option>
		        <option value="宁波">宁波</option>
		        <option value="温州">温州</option>
		        <option value="温州">台州</option>
		        <option value="温州">绍兴</option>
		     </select>
		    </div>
		  </div>

		  <div style="background-color: #FFFFFF;margin-left: 0.1px;">
		  	<input type="" name="ppt_name" id="ppt_name" style="width: 33%;height: 33px;margin-left: 100px;" readonly="readonly">
			<button type="button" class="layui-btn" id="uploadPPTFront">上传幻灯片</button>
		 </div>

		  <!--<div class="expert-img">
			<button type="button" class="layui-btn" style="margin-left: 30px; float: left;margin-top: 80px;" id="uploadPPTFront">上传幻灯片</button>
		 </div>-->
		  

		  <div class="layui-form-item">
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
var sickData,lifeData;
$.ajaxSettings.async = false;
$.getJSON("/static/js/sickTheme.json",function(data){ 
	sickData = data; 
	var themeId = '';
		  	var themeRadio = document.getElementsByName("theme");
		  	for (i=0; i<themeRadio.length; i++) {  
		        if (themeRadio[i].checked) {  
		           themeId = themeRadio[i];
		           break;
		        }  
		    }
	if(themeId == 1){
		var typeObj = document.getElementById("type");
		var innerHTML = '';
		for(value in sickData){
			innerHTML=innerHTML+'<option value="'+sickData[value].id+'">'+sickData[value].name+"</option>";
		}
		typeObj.innerHTML = innerHTML;
	}
}); 
$.getJSON("/static/js/lifeTheme.json",function(data){ 
	lifeData = data; 
	var themeId = '';
		  	var themeRadio = document.getElementsByName("theme");
		  	for (i=0; i<themeRadio.length; i++) {  
		        if (themeRadio[i].checked) {  
		           themeId = themeRadio[i];
		           break;
		        }  
		    }
	
	if(themeId == 2){
		var typeObj = document.getElementById("type");
		var innerHTML = '';
		for(value in lifeData){
			innerHTML=innerHTML+'<option value="'+lifeData[value].id+'">'+lifeData[value].name+"</option>";
		}
		typeObj.innerHTML = innerHTML;
	}
});



var ppt_id = 0;
var url = "";
layui.use(['form', 'layedit', 'laydate'], function(){
  var form = layui.form
  ,layedit = layui.layedit
  ,layer = layui.layer;

  	form.on('radio(theme)', function(data){
  		var typeObj = document.getElementById("type");
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
	   
		layer.confirm('确认提交幻灯片信息？', { title:['提交幻灯片信息提示','font-size:20px; text-align:center']}, function(index)
		{
 		 	//do something
 		 	// alert('yes');
		  	layer.close(index);
		  	var name = document.getElementById("name");
		  	var introduce = document.getElementById("introduce");
		  	var author = document.getElementById("author");
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
		  	var city = document.getElementById("city");
		  	
			var data={
				name: name.value,
				introduce: introduce.value,
				author: author.value,
				theme: theme.value,
				type: type.value,
				language: language.value,
				city: city.value,
				url: url
			};
			// alert(JSON.stringify(data));
			$.ajax({
				url: '/api/addNewPPTInfo',
				type: 'post',
				dataType:'json',
				data: data,
				success: function (data) {
			     	 // alert(JSON.stringify(data));
				     if(data.status == "200"){
				     	ppt_id = data.id;
				     	alert("添加成功");
				     	window.history.go(-1);
				     }
				},
				error: function(data) {
					if(data.status == "200"){
						ppt_id = data.id;
				     	alert("添加成功");
				     	window.history.go(-1);
					}else{
						alert("Sorry error");
					}
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
  	name: 'tmp_header',
  	url: url
  };
  //普通图片上传
  var uploadInst = upload.render({
    elem: '#uploadPPTFront'
    ,url: '/api/addNewPPT'
    ,data: data
    ,accept: 'file'
    ,before: function(obj){
      if(ppt_id >0){
      	data.name = ppt_id;
      }
      //预读本地文件示例，不支持ie8
	  obj.preview(function(index, file, result){
	  	 document.getElementById("ppt_name").value = file.name;
	     $('#headImg').attr('src', result); //图片链接（base64）
	   });
    }
    ,done: function(res){
      //alert(JSON.stringify(res));
      //如果上传失败
      if(res.status == 200){
      	url = res.url;
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











