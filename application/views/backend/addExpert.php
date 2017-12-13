 <?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<link rel="stylesheet" type="text/css" href="/static/css/back-useradmin.css">
<script type="text/javascript" src="/static/layui/layui.js"></script>
<script type="text/javascript" src="/backend/js/nation.js"></script>
<div class="layui-container" >
	<h2>增加专家页面</h2>
	<div class="expert-img">
		<img id="headImg" src="/header/">
		<button type="button" class="layui-btn" style="margin-left: 30px; float: left;margin-top: 80px;" id="uploadHead">更换头像</button>
	</div>
	<div class="user-edit">
		<form class="layui-form">
		   <div class="layui-form-item" >
		    <label class="layui-form-label">专家姓名</label>
		    <div class="layui-input-block" style="width: 40%;">
		      <input type="text" id="name" lay-verify="title|required" autocomplete="off" placeholder="请输入专家姓名" class="layui-input">
		    </div>
		  </div>
		  <div class="layui-form-item">
		    <label class="layui-form-label">专家性别</label>
		    <div class="layui-input-block" style="width: 40%">
		      <input type="radio" name="sex" value="1"  title="男" >
		      <input type="radio" name="sex" value="2"  checked="true" title="女">
		    </div>
		  </div>
		  <div class="layui-form-item">
		    <label class="layui-form-label">专家民族</label>
		    <div class="layui-input-block" style="width: 40%">
		      <select id="nation" name="nation" lay-filter="nation|required">
		        
		      </select>
		    </div>
		  </div>
		   <div class="layui-form-item" >
		    <label class="layui-form-label">专家职称</label>
		    <div class="layui-input-block" style="width: 40%;">
		      <input type="text" id="title" lay-verify="title|required" autocomplete="off" placeholder="请输入专家职称" class="layui-input">
		    </div>
		  </div>
		  <div class="layui-form-item" >
		    <label class="layui-form-label">毕业院校</label>
		    <div class="layui-input-block" style="width: 40%;">
		      <input type="text" id="school" lay-verify="school|required" autocomplete="off" placeholder="请输入专家毕业院校" class="layui-input">
		    </div>
		  </div>
		  <div class="layui-form-item" >
		    <label class="layui-form-label">所学专业</label>
		    <div class="layui-input-block" style="width: 40%;">
		      <input type="text" id="major" lay-verify="major|required" autocomplete="off" placeholder="请输入专家所学专业" class="layui-input">
		    </div>
		  </div>
		  <div class="layui-form-item" >
		    <label class="layui-form-label">专家学历</label>
		    <div class="layui-input-block" style="width: 40%;">
		     <select id="record" name="record" lay-filter="record|required">
		     	<option value="大专">大专</option>   
		     	<option value="本科" selected="">本科</option>  
		     	<option value="硕士">硕士</option>  
		     	<option value="博士">博士</option>  
		     	<option value="博士后">博士后</option>  
		     </select>
		    </div>
		  </div>
		  <div class="layui-form-item" >
		    <label class="layui-form-label">执业地址</label>
		    <div class="layui-input-block" style="width: 40%;">
		      <input type="text" id="address" lay-verify="address|required" autocomplete="off" placeholder="请输入专家执业地址" class="layui-input">
		    </div>
		  </div>
		  <div class="layui-form-item layui-form-text">
		    <label class="layui-form-label" style="">专家介绍</label>
		    <div class="layui-input-block" style="width: 60%; ">
		      <textarea  class="layui-textarea" id="introduce" lay-verify="introduce|required" placeholder="请输入专家介绍" style="height: 180px; line-height: 24px;"></textarea>
		    </div>
		  </div>
		   <div class="layui-form-item layui-form-text">
		    <label class="layui-form-label" style="">研究方向</label>
		    <div class="layui-input-block" style="width: 60%; ">
		      <textarea  class="layui-textarea" lay-verify="study|required" id="study" style="height: 180px; line-height: 24px;" placeholder="请输入专家研究方向"></textarea>
		    </div>
		  </div>
		   <div class="layui-form-item layui-form-text">
		    <label class="layui-form-label" style="">教育经历</label>
		    <div class="layui-input-block" style="width: 60%; ">
		      <textarea  class="layui-textarea" id="education" lay-verify="education|required" style="height: 180px; line-height: 24px;" placeholder="请输入专家教育经历"></textarea>
		    </div>
		  </div>
		   <div class="layui-form-item layui-form-text">
		    <label class="layui-form-label" style="">工作经历</label>
		    <div class="layui-input-block" style="width: 60%; ">
		      <textarea  class="layui-textarea"  id="work" lay-verify="work|required" style="height: 180px; line-height: 24px;" placeholder="请输入专家工作经历"></textarea>
		    </div>
		  </div>

		  <div class="layui-form-item">
		    <div class="layui-input-block">
		      <button class="layui-btn" lay-submit="" lay-filter="editSubmit">提交信息</button>
		      <a style="margin-left: 20%;" href=”#” onClick="javascript:history.back(-1)" class="layui-btn layui-btn-primary">返回</a>
		    </div>
		  </div>
		    
		</form>
	</div>
	<div style="width: 100%;height: 50px;"></div>
</div>

<script type="text/javascript">
// nation
var nationObj = document.getElementById("nation");
var innerHTML = '';
for(value in nation){
	innerHTML=innerHTML+'<option value="'+nation[value]+'">'+nation[value]+"</option>";
}
nationObj.innerHTML = innerHTML;

layui.use(['form', 'layedit', 'laydate'], function(){
  var form = layui.form
  ,layedit = layui.layedit
  ,layer = layui.layer;
   // var work = layedit.build('work');
   // var introduce = layedit.build('introduce');
   // var study = layedit.build('study');
   // var education = layedit.build('education');

	form.on('submit(editSubmit)', function(data){
		layer.confirm('确认提交专家信息？', { title:['提交专家信息提示','font-size:20px; text-align:center']}, function(index)
		{
 		 	//do something
 		 	// alert('yes');
		  	// layer.close(index);
		  	var name = document.getElementById("name");
		  	var sex = '';
		  	var sexRadio = document.getElementsByName("sex");
		  	for (i=0; i<sexRadio.length; i++) {  
		        if (sexRadio[i].checked) {  
		           sex = sexRadio[i];
		        }  
		    } 
		  	var nationSel = document.getElementById("nation");
		  	// var options = nationSel.options;
		  	// alert(options[nationSel.selectedIndex].text);
		  	var school = document.getElementById("school");
		  	var title = document.getElementById("title");
		  	var major = document.getElementById("major");
		  	var recordSel = document.getElementById("record");
		  	var address = document.getElementById("address");
		  	var introduce = document.getElementById("introduce");
		  	var education = document.getElementById("education");
		  	var study = document.getElementById("study");
		  	var work = document.getElementById("work");
			var data={
				name: name.value,
				sex: sex.value,
				nation: nationSel.value,
				school: school.value,
				title: title.value,
				major: major.value,
				record: recordSel.value,
				address: address.value,
				introduce: introduce.value,
				education: education.value,
				study: study.value,
				work: work.value
			};
			alert(JSON.stringify(data));
			$.ajax({
				url: '/api/addExpert',
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
  	name: 'tmp_header'
  };
  //普通图片上传
  var uploadInst = upload.render({
    elem: '#uploadHead'
    ,url: '/api/uploadHeader'
    ,data: data
    ,accept: 'images'
    ,before: function(obj){
      //预读本地文件示例，不支持ie8
    obj.preview(function(index, file, result){
        $('#headImg').attr('src', result); //图片链接（base64）
      });
    }
    ,done: function(res){
      //alert(JSON.stringify(res));
      //如果上传失败
      if(res.status == 200){
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




















