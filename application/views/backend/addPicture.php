 <?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<link rel="stylesheet" type="text/css" href="/static/css/back-useradmin.css">
<script type="text/javascript" src="/static/layui/layui.js"></script>
<script type="text/javascript" src="/static/js/province.js"></script>
<div class="layui-container" >
	<h2>增加像册页面</h2>
	<div class="add-pic">	 
		<div class="layui-upload">
		  <button type="button" class="layui-btn layui-btn-normal" id="testList">选择相册图片</button> 
		  <div class="layui-upload-list">
		    <table class="layui-table">
		      <thead>
		        <tr><th>文件名</th>
		        <th>大小</th>
		        <th>状态</th>
		        <th>操作</th>
		      </tr></thead>
		      <tbody id="demoList"></tbody>
		    </table>
		  </div>
		  <button type="button" style="margin-top: 30px;"  class="layui-btn" id="testListAction">开始上传</button>
		</div> 
	</div>

	<!-- <div class="expert-img" style="height: 100px;">
		<button type="button" class="layui-btn" style="margin-left: 40px; width:100px;  float: left;margin-top: 30px;" id="uploadArticle">上传文件</button>
		<label id="fileShow" style="float: left; margin-top: 20px; width: 300px; color: red"></label>
	</div> -->
	<div class="line" style="margin-top: 50px; margin-bottom: 50px;"></div>
	<div class="user-edit">
		<form class="layui-form">
		   <div class="layui-form-item" >
		    <label class="layui-form-label">像册标题</label>
		    <div class="layui-input-block" style="width: 40%;">
		      <input type="text" id="name" lay-verify="name|required" autocomplete="off" placeholder="请输入像册标题" class="layui-input">
		    </div>
		  </div>
		   <div class="layui-form-item" >
		    <label class="layui-form-label">像册作者</label>
		    <div class="layui-input-block" style="width: 40%;">
		      <input type="text" id="author" lay-verify="author|required" autocomplete="off" placeholder="请输入像册作者" class="layui-input">
		    </div>
		  </div>
		  <div class="layui-form-item" >
		    <label class="layui-form-label">作者职称</label>
		    <div class="layui-input-block" style="width: 40%;">
		      <input type="text" id="title" lay-verify="title|required" autocomplete="off" placeholder="请输入作者职称" class="layui-input">
		    </div>
		  </div>
		   <div class="layui-form-item">
		    <label class="layui-form-label">像册主题</label>
		    <div class="layui-input-block" style="width: 40%">
		      <input type="radio" name="theme" lay-filter="theme" value="1" checked="true" title="慢性病" >
		      <input type="radio" name="theme" lay-filter="theme" value="2"  title="健康生活方式">
		    </div>
		  </div>
		  <div class="layui-form-item">
		    <label class="layui-form-label">像册类型</label>
		    <div class="layui-input-block" style="width: 40%">
		      <select id="artType" name="artType" lay-filter="artType|required">
		        
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
		    <label class="layui-form-label">像册语言</label>
		    <div class="layui-input-block" style="width: 40%">
		      <input type="radio" name="language" value="1" checked="true" title="中文" >
		      <input type="radio" name="language" value="2"   title="English">
		    </div>
		  </div>
		  <div class="layui-form-item" >
		    <label class="layui-form-label">阅读量</label>
		    <div class="layui-input-block" style="width: 40%;">
		      <input type="number" id="read" lay-verify="number|required" autocomplete="off" placeholder="请输入阅读量 默认是0" class="layui-input">
		    </div>
		  </div>
		  <div class="layui-form-item" style="margin-top: 60px;">
		    <div class="layui-input-block">
		      <button class="layui-btn" lay-submit="" lay-filter="editSubmit">提交信息</button>
		       <a style="margin-left: 20%;" href=”#” onClick="javascript:window.history.back();return false;" class="layui-btn layui-btn-primary">返回</a>
		    </div>
		  </div>
		</form>
	</div>
	<div style="width: 100%;height: 50px;"></div>
</div>

<script type="text/javascript">
var dirId = 0;

var sickData,lifeData;
$.getJSON("/static/js/sickTheme.json",function(data){ 
	sickData = data; 
	var typeObj = document.getElementById("artType");
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
	  	typeObj.innerHTML = innerHTML;
	  	form.render('select'); 
	});  


	form.on('submit(editSubmit)', function(data){
		layer.confirm('确认提交像册信息？', { title:['提交像册信息提示','font-size:20px; text-align:center']}, function(index)
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
		  	var name = document.getElementById("name");
		  	var author = document.getElementById("author");
		  	var title = document.getElementById("title");
		  	var read = document.getElementById("read");
		  	var type = document.getElementById("artType");
		  	var province = document.getElementById("province");

			var data={
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
				url: '/api/addNewPicture',
				type: 'post',
				dataType:'json',
				data: data,
				success: function (data) {
					// alert(JSON.stringify(data));
				    if(data.status == 200){
				     	dirId = data.id;
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
  	name: 'tmp_picture'
  };

   //多文件列表示例
  var demoListView = $('#demoList')
  ,uploadListIns = upload.render({
    elem: '#testList'
    ,url: '/api/uploadPicture'
    ,data: data
    ,accept: 'images'
    ,exts: 'jpg|png|jpeg'
    ,multiple: true
    ,auto: false
    ,bindAction: '#testListAction'
    ,choose: function(obj){ 
      if(dirId >0){
      	data.name = dirId;
      }
      // alert(data.name);
      var files = this.files = obj.pushFile(); //将每次选择的文件追加到文件队列
      //读取本地文件
      obj.preview(function(index, file, result){
        var tr = $(['<tr id="upload-'+ index +'">'
          ,'<td>'+ file.name +'</td>'
          ,'<td>'+ (file.size/1014).toFixed(1) +'kb</td>'
          ,'<td>等待上传</td>'
          ,'<td>'
            ,'<button class="layui-btn layui-btn-mini demo-reload layui-hide" style="width:60px; height:38px;">重传</button>'
            ,'<button class="layui-btn layui-btn-mini layui-btn-danger demo-delete" style="width:60px; height:38px;">删除</button>'
          ,'</td>'
        ,'</tr>'].join(''));
        
        //单个重传
        tr.find('.demo-reload').on('click', function(){
          obj.upload(index, file);
        });
        
        //删除
        tr.find('.demo-delete').on('click', function(){
          delete files[index]; //删除对应的文件
          tr.remove();
          uploadListIns.config.elem.next()[0].value = ''; //清空 input file 值，以免删除后出现同名文件不可选
        });
        
        demoListView.append(tr);
      });
    }
    ,done: function(res, index, upload){
    	// alert(JSON.stringify(res));
      if(res.status == 200){ //上传成功
        var tr = demoListView.find('tr#upload-'+ index)
        ,tds = tr.children();
        tds.eq(2).html('<span style="color: #5FB878;">上传成功</span>');
        tds.eq(3).html(''); //清空操作
        return delete this.files[index]; //删除文件队列已经上传成功的文件
      }
      this.error(index, upload);
    }
    ,error: function(index, upload){
      var tr = demoListView.find('tr#upload-'+ index)
      ,tds = tr.children();
      tds.eq(2).html('<span style="color: #FF5722;">上传失败</span>');
      tds.eq(3).find('.demo-reload').removeClass('layui-hide'); //显示重传
    }
  });



  //普通图片上传
  // var uploadInst = upload.render({
  //   elem: '#uploadArticle'
  //   ,url: '/api/uploadArticle'
  //   ,data: data
  //   ,accept: 'file'
  //   ,exts: 'pdf'
  //   ,before: function(obj){
  //     if(dirId >0){
  //     	data.name = dirId;
  //     }
  //     //预读本地文件示例，不支持ie8
	 // 	obj.preview(function(index, file, result){
	 // 		article_name = file.name;
	 //    });
  //   }
  //   ,done: function(res){
  //     document.getElementById('fileShow').innerText = article_name;
  //     //alert(JSON.stringify(res));
  //     //如果上传失败
  //     if(res.status == 200){
  //       return layer.msg('上传成功');
  //     }else{
  //     	return layer.msg('上传失败');
  //     }
  //     //上传成功
  //   }
  //   ,error: function(){
  //   	document.getElementById('fileShow').innerText = article_name;
  //   }
  // });

});
</script>












