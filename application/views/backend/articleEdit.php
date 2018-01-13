 <?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<link rel="stylesheet" type="text/css" href="/static/css/back-useradmin.css">
<script type="text/javascript" src="/static/layui/layui.js"></script>
<!-- pdf show -->
 <script type="text/javascript" src="/static/js/pdfobject.js"></script>
 <script type="text/javascript" src="/static/js/province.js"></script>
<div class="layui-container" >
	<!-- <?php//var_dump($data); ?> -->
	<h2>文章《<?php echo $data['name']; ?>》的详情信息</h2>
	<div class="user-edit">
		<form class="layui-form">
		  <div class="layui-form-item">
		    <label class="layui-form-label">文章ID</label>
		    <div class="layui-input-block" style="width: 100px; height: 30px;">
		       <input class="layui-input" readonly="true"  style="border:0" id ="articleId" value="<?php echo $data['id']; ?>">
		    </div>
		  </div>
		   <div class="layui-form-item" >
		    <label class="layui-form-label">文章标题</label>
		    <div class="layui-input-block" style="width: 40%;">
		      <input type="text" id="name" lay-verify="name" autocomplete="off" value="<?php echo $data['name']; ?>" class="layui-input">
		    </div>
		  </div>
		  <div class="layui-form-item" >
		    <label class="layui-form-label">文章作者</label>
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
		    <label class="layui-form-label">文章主题</label>
		    <div class="layui-input-block" style="width: 40%">
		      <input type="radio" lay-filter="theme" name="theme" <?php if($data['themeId']== 1):?> checked="true" <?php endif; ?> value="1"  title="慢性病" >
		      <input type="radio" name="theme" lay-filter="theme" <?php if($data['themeId']== 2):?> checked="true" <?php endif; ?> value="2"   title="健康生活方式">
		    </div>
		  </div>
		  <div class="layui-form-item">
		    <label class="layui-form-label">文章类型</label>
		    <div class="layui-input-block" style="width: 40%">
		      <select id="artType" name="artType" lay-filter="type">

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
		    <label class="layui-form-label">文章语言</label>
		    <div class="layui-input-block" style="width: 40%">
		      <input type="radio" lay-filter="language" name="language" <?php if($data['language']== 1):?> checked="true" <?php endif; ?> value="1"  title="中文" >
		      <input type="radio" lay-filter="language" name="language" <?php if($data['language']== 2):?> checked="true" <?php endif; ?> value="2" title="English">
		    </div>
		  </div>
		  <div class="layui-form-item" >
		    <label class="layui-form-label">点击量</label>
		    <div class="layui-input-block" style="width: 40%;">
		      <input type="text" id="read" lay-verify="read" autocomplete="off" value="<?php echo $data['read']; ?>" class="layui-input">
		    </div>
		  </div>
		  <div class="layui-form-item" >
		    <label class="layui-form-label">文章页数</label>
		    <div class="layui-input-block" style="width: 40%;">
		      <input type="text" id="page" lay-verify="page" autocomplete="off" value="<?php echo $data['page']; ?>" class="layui-input">
		    </div>
		  </div>
		  <div class="layui-form-item">
		    <label class="layui-form-label">上传时间</label>
		    <div class="layui-input-block" style="width: 200px; height: 30px;">
		       <input id="ctime" class="layui-input" readonly="true" style="border:0; color: #009ACD" value="<?php echo date("Y-m-d H:i:s",$data['ctime']); ?>">
		    </div>
		  </div>
		  <div id="pdfRead" style="height: 400px; width: 80%;margin-top: 30px; border-bottom: 2px solid #009ACD; border-top: 2px solid #009ACD;">
		  </div>

		 <div class="expert-img" style="height: 100px; background-color: #fff">
			<button type="button" class="layui-btn" style="margin-left: 40px; width:100px;  float: left;margin-top: 30px;" id="uploadArticle">替换文章</button>
			<label id="fileShow" style="float: left; margin-top: 20px; width: 300px; color: red"></label>
		</div>

		  <div class="layui-form-item layui-form-text">
			  <div class="layui-form-item">
			    <div class="layui-input-block">
			      <button class="layui-btn" lay-submit="" lay-filter="editSubmit">立即修改</button>
			      <a style="margin-left: 20%;" href=”#” onClick="javascript:window.history.back();return false;" class="layui-btn layui-btn-primary">返回</a>
			    </div>
		  </div>
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
		var typeObj = document.getElementById("artType");
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
		var typeObj = document.getElementById("artType");
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

var title = "/article/"+"<?php echo $data['id'];?>"+".pdf";
var success = new PDFObject({ url: title ,pdfOpenParams: { scrollbars: '0', toolbar: '0', statusbar: '0'}}).embed("pdfRead");

layui.use(['form', 'layedit', 'laydate'], function(){
  var form = layui.form
  ,layedit = layui.layedit
  ,layer = layui.layer;

  	// 监听radio事件
  	form.on('radio(theme)', function(data){
  		var typeObj = document.getElementById("artType");
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
		layer.confirm('确认修改文章信息？', { title:['修改文章信息提示','font-size:20px; text-align:center']}, function(index)
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
		  	var id = document.getElementById("articleId");
		  	var name = document.getElementById("name");
		  	var author = document.getElementById("author");
		  	var title = document.getElementById("title");
		  	var read = document.getElementById("read");
		  	var page = document.getElementById("page");
		  	var type = document.getElementById("artType");
		  	var province = document.getElementById("province");
		  	
			var data={
				id: id.value,
				name: name.value,
				author: author.value,
				title: title.value,
				read: read.value,
				page: page.value,
				theme: theme.value,
				language: lang.value,
				type: type.value,
				province: province.value
			};
			// alert(JSON.stringify(data));
			$.ajax({
				url: '/api/updateArticleInfo',
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
  	name: id
  };
  //普通图片上传
  var uploadInst = upload.render({
    elem: '#uploadArticle'
    ,url: '/api/uploadArticle'
    ,data: data
    ,accept: 'file'
    ,exts: 'pdf'
    ,before: function(obj){
      //预读本地文件示例，不支持ie8
	 	obj.preview(function(index, file, result){
	 		// article_name = file.name;
	    });
    }
    ,done: function(res){
      // document.getElementById('fileShow').innerText = article_name;
      alert(JSON.stringify(res));
      //如果上传失败
      if(res.status == 200){
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



















