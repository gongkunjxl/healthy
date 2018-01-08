 <?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<link rel="stylesheet" type="text/css" href="/static/css/back-useradmin.css">
<script type="text/javascript" src="/static/layui/layui.js"></script>
<script type="text/javascript" src="/backend/js/jquery.form.js"></script>
<script type="text/javascript" src="/static/js/province.js"></script>
<div class="layui-container" >
	<h2>修改幻灯片页面</h2>
	<div class="user-edit">
		<form id = "audioForm" class="layui-form">
		   <input class="layui-input" readonly="true"  style="border:0;display:none;" id ="id" value="<?php echo $data['id']; ?>" >
		   <div class="layui-form-item" >
		    <label class="layui-form-label">幻灯片名称</label>
		    <div class="layui-input-block" style="width: 40%;">
		      <input type="text" id="name" value="<?php echo $data['name']; ?>" lay-verify="title|required" autocomplete="off" placeholder="请输入幻灯片名称" class="layui-input">
		    </div>
		  </div>
		  <div class="layui-form-item layui-form-text">
		    <label class="layui-form-label" style="">幻灯片介绍</label>
		    <div class="layui-input-block" style="width: 60%; ">
		      <textarea  class="layui-textarea" id="introduce" lay-verify="introduce|required" placeholder="请输入幻灯片介绍" style="height: 180px; line-height: 24px;"><?php echo $data['description']; ?></textarea>
		    </div>
		  </div>
		 <div class="layui-form-item" >
		    <label class="layui-form-label">作者</label>
		    <div class="layui-input-block" style="width: 40%;">
		      <input type="text" id="author" value="<?php echo $data['author']; ?>" lay-verify="title|required" autocomplete="off" placeholder="请输入作者" class="layui-input">
		    </div>
		  </div>
		  <div class="layui-form-item" pane="">
		    <label class="layui-form-label">主题</label>
		    <div class="layui-input-block">
		      <input type="radio" name="theme" lay-filter="theme" value="1" <?php if($data['theme']== 1):?> checked="true" <?php endif; ?> title="慢性疾病" checked="">
		      <input type="radio" name="theme" lay-filter="theme" value="2" <?php if($data['theme']== 2):?> checked="true" <?php endif; ?> title="健康生活方式">
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

		  
		  <div class="expert-img" style="background-color: 	#FFFFFF;margin-left: 0.1px;height: 50px;">
		  	<input type="" name="ppt_name" id="ppt_name" style="width: 33%;height: 33px;" readonly="readonly" value="<?php echo $data['name'].'.ppt'; ?>">
			<button type="button" class="layui-btn" id="uploadPPT">上传幻灯片</button>
		 </div>
		  

		  <div class="layui-form-item" style="height: 60px;">
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
var url = "<?php echo $data['source_url']; ?>";
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

layui.use(['form', 'layedit', 'laydate'], function(){
  var form = layui.form
  ,layedit = layui.layedit
  ,layer = layui.layer;

  	// 监听radio事件
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
		layer.confirm('确认修改幻灯片信息？', { title:['修改幻灯片信息提示','font-size:20px; text-align:center']}, function(index)
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
		    var lang = document.getElementById("language"); 
		  	var name = document.getElementById("name");
		  	var author = document.getElementById("author");
		  	var description = document.getElementById("introduce");
		  	var type = document.getElementById("type");
		  	var province = document.getElementById("province");
		  	var id = document.getElementById("id");
			var data={
				id: id.value,
				name: name.value,
				author: author.value,
				description: description.value,
				theme: theme.value,
				language: lang.value,
				type: type.value,
				province: province.value,
				url: url
			};
			// alert(JSON.stringify(data));
			$.ajax({
				url: '/api/updatePPTInfo',
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
		  	// $("#eidtForm").submit();
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
  var id = "<?php echo $data['id']; ?>";
  var data ={
  	name: id,
  	url: url
  };
  //普通图片上传
  var uploadInst = upload.render({
    elem: '#uploadPPT'
    ,url: '/api/uploadPPT'
    ,data: data
    ,accept: 'file'
    ,exts: 'pptx|ppt'
    ,before: function(obj){
      //预读本地文件示例，不支持ie8
	 	obj.preview(function(index, file, result){
	 		document.getElementById("ppt_name").value = file.name;
	 		// article_name = file.name;
	    });
    }
    ,done: function(res){
      // document.getElementById('fileShow').innerText = article_name;
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
    	// document.getElementById('fileShow').innerText = article_name;
    }
  });

});
</script>











