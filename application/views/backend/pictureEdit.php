 <?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<link rel="stylesheet" type="text/css" href="/static/css/back-useradmin.css">
<script type="text/javascript" src="/static/layui/layui.js"></script>
<script type="text/javascript" src="/static/js/province.js"></script>
<div class="layui-container" >
	<!-- <?php //var_dump($images); ?> -->
	<h2>相册《<?php echo $data['name']; ?>》的详情信息</h2>
	<div class="pic-show" id="picShow">
	  <?php foreach ($images as $key => $value): 
	  	$dotArray = explode('.', $value);
	  ?>
	  	<div class="pic-content"  id="contentShow" style="display: none;"></div>
		<div class="pic-content" id="pic_<?php echo $key; ?>">
			<img src="/picture/<?php echo $data['id']."/".$value; ?>">
			<button class="layui-btn layui-btn-danger" onclick="delImage('pic_<?php echo $key; ?>','<?php echo $value; ?>');" style="margin-left: 10px;float: left;">
			  <i class="layui-icon">&#xe640;</i>
			</button>
			<button class="layui-btn" id="<?php echo $dotArray[0]; ?>" onclick="indexImage('<?php echo $dotArray[0]; ?>','<?php echo $value; ?>');" style="margin-left: 50px;width:50px;float: left;"><?php echo ($dotArray[0] == "index")?"封面图":"设为封面"; ?></button>
		</div>
	  <?php endforeach; ?>	
<!-- 
		<div class="pic-content" id="pic_01">
			<img src="/picture/pic_01.png">
			<button class="layui-btn layui-btn-danger" onclick="delImage('imgae');" style="margin-left: 10px;float: left;">
			  <i class="layui-icon">&#xe640;</i>
			</button>
			<button class="layui-btn" onclick="indexImage('index');" style="margin-left: 50px;width:50px;float: left;">设为封面</button>
		</div>
	-->
		<div class="pic-content">
			<img style="height: 100%;" id="uploadNew" src="/static/images/pic_add.png">
		</div>
	</div>
	<div class="line"></div>
	<div class="user-edit">
		<form class="layui-form">
		  <div class="layui-form-item">
		    <label class="layui-form-label">相册ID</label>
		    <div class="layui-input-block" style="width: 100px; height: 30px;">
		       <input class="layui-input" readonly="true"  style="border:0" id ="articleId" value="<?php echo $data['id']; ?>">
		    </div>
		  </div>
		   <div class="layui-form-item" >
		    <label class="layui-form-label">相册标题</label>
		    <div class="layui-input-block" style="width: 40%;">
		      <input type="text" id="name" lay-verify="name" autocomplete="off" value="<?php echo $data['name']; ?>" class="layui-input">
		    </div>
		  </div>
		  <div class="layui-form-item" >
		    <label class="layui-form-label">相册作者</label>
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
		    <label class="layui-form-label">相册主题</label>
		    <div class="layui-input-block" style="width: 40%">
		      <input type="radio" lay-filter="theme" name="theme" <?php if($data['themeId']== 1):?> checked="true" <?php endif; ?> value="1"  title="慢性病" >
		      <input type="radio" name="theme" lay-filter="theme" <?php if($data['themeId']== 2):?> checked="true" <?php endif; ?> value="2"   title="健康生活方式">
		    </div>
		  </div>
		  <div class="layui-form-item">
		    <label class="layui-form-label">相册类型</label>
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
		    <label class="layui-form-label">相册语言</label>
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
		  <div class="layui-form-item">
		    <label class="layui-form-label">上传时间</label>
		    <div class="layui-input-block" style="width: 200px; height: 30px;">
		       <input id="ctime" class="layui-input" readonly="true" style="border:0; color: #009ACD" value="<?php echo date("Y-m-d H:i:s",$data['ctime']); ?>">
		    </div>
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
	<!-- 相册详情 -->
	<!-- <div id="pdfRead" style="height: 600px; width: 80%;margin-top: 30px">
	</div> -->

	<div style="width: 100%;height: 80px;"></div>
</div>
<!-- picture delete -->
<script type="text/javascript">
	var dirId = "<?php echo $data['id']; ?>";
	function delImage(imageId,imageName){
		layer.confirm('确认删除这张图片？', { title:['删除图片信息提示','font-size:20px; text-align:center']}, function(index)
		{
			layer.close(index);
			var data={
				dirId: dirId,
				imageName: imageName
			};
			// alert(JSON.stringify(data));
			$.ajax({
				url: '/api/deleteImage',
				type: 'post',
				dataType:'json',
				data: data,
				success: function (data) {
			     	 // alert(JSON.stringify(data));
				     if(data.status == 200){
				     	var imgObj = document.getElementById(imageId);
						if(imgObj){
							imgObj.parentNode.removeChild(imgObj);
						}   	
				     }
				},
				error: function(data) {
			     	alert("Sorry error");
				}
			});  
		});
	}

	function indexImage(buttonId,imageName){
		layer.confirm('确认设置这张图片为封面？', { title:['设置封面图片信息提示','font-size:20px; text-align:center']}, function(index)
		{
			layer.close(index);
			var data={
				dirId: dirId,
				imageName: imageName
			};
			// alert(JSON.stringify(data));
			$.ajax({
				url: '/api/indexImage',
				type: 'post',
				dataType:'json',
				data: data,
				success: function (data) {
			     	 // alert(JSON.stringify(data));
				     if(data.status == 200){
				     	var btnObj = document.getElementById(buttonId);
						if(btnObj){
							// alert(btnObj.innerText);
							btnObj.innerText = "封面图";
						} 
						var indexObj = document.getElementById('index');
						if(indexObj){
							indexObj.innerText = "设为封面";
						}
				     }
				},
				error: function(data) {
			     	alert("Sorry error");
				}
			});  
		});
	}
</script>



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
		layer.confirm('确认修改相册信息？', { title:['修改相册信息提示','font-size:20px; text-align:center']}, function(index)
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
		  	var type = document.getElementById("artType");
		  	var province = document.getElementById("province");
		  	
			var data={
				id: id.value,
				name: name.value,
				author: author.value,
				title: title.value,
				read: read.value,
				theme: theme.value,
				language: lang.value,
				type: type.value,
				province: province.value
			};
			// alert(JSON.stringify(data));
			$.ajax({
				url: '/api/updatePictureInfo',
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
  var dirId = "<?php echo $data['id']; ?>";
  var data ={
  	dirId: dirId
  };
  //普通图片上传
  var uploadInst = upload.render({
    elem: '#uploadNew'
    ,url: '/api/updatePicture'
    ,data: data
    ,accept: 'images'
    ,exts: 'jpg|png|jpeg'
    ,before: function(obj){
  	  obj.preview(function(index, file, result){
	     //$('#headImg').attr('src', result); //图片链接（base64）
	   });
    }
    ,done: function(data){
      // alert(JSON.stringify(data));
      //如果上传失败
      if(data.status == 200){

      	var id = 'pic_'+parseInt(Math.random()*100);
		var src = "/picture/"+dirId+"/"+data.filename; 
		buttonId = (data.filename).split(".")[0];
		var picObj = document.getElementById('contentShow');
		var newObj = document.createElement("div");
		newObj.setAttribute('class','pic-content');
		newObj.setAttribute('id',id);
		var cHtml = '';
		 cHtml = '<img src="'+src+'">'+
		 '<button class="layui-btn layui-btn-danger" onclick="delImage(\''+id+'\','+'\''+data.filename+'\');" style="margin-left: 10px;float: left;"> <i class="layui-icon">&#xe640;</i></button>'+
			'<button class="layui-btn" id="'+buttonId+'" onclick="indexImage(\''+buttonId+'\','+'\''+data.filename+'\');" style="margin-left: 50px;width:50px;float: left;">'+'设为封面</button>';
		newObj.innerHTML = cHtml;
		picObj.parentNode.insertBefore(newObj,picObj);
        return layer.msg('上传成功');
      }else{
      	return layer.msg('上传失败');
      }

    }
    ,error: function(){
    }
  });

});
</script>














