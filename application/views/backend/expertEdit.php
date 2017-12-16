 <?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<link rel="stylesheet" type="text/css" href="/static/css/back-useradmin.css">
<script type="text/javascript" src="/static/layui/layui.js"></script>
<div class="layui-container" >
	<!-- <?php// var_dump($data); ?> -->
	<h2>专家<?php echo $data['name']; ?>的详情信息</h2>
	<div class="expert-img">
		<img id="headImg" src="/header/<?php echo $data['header'];?>">
		<button type="button" class="layui-btn" style="margin-left: 30px; float: left;margin-top: 80px;" id="uploadHead">更换头像</button>
	</div>
	<div class="user-edit">
		<form class="layui-form">
		  <div class="layui-form-item">
		    <label class="layui-form-label">专家ID</label>
		    <div class="layui-input-block" style="width: 100px; height: 30px;">
		       <input class="layui-input" readonly="true" style="border:0" id ="userId" value="<?php echo $data['id']; ?>">
		    </div>
		  </div>

		   <div class="layui-form-item" >
		    <label class="layui-form-label">专家姓名</label>
		    <div class="layui-input-block" style="width: 40%;">
		      <input type="text" id="name" lay-verify="title" autocomplete="off" value="<?php echo $data['name']; ?>" class="layui-input">
		    </div>
		  </div>

		  <div class="layui-form-item" >
		    <label class="layui-form-label">(1:男 2:女)</label>
		    <div class="layui-input-block" style="width: 40%;">
		      <input type="text" id="sex" lay-verify="title" autocomplete="off" value="<?php echo $data['sex']; ?>" class="layui-input">
		    </div>
		  </div>

		  <div class="layui-form-item" >
		    <label class="layui-form-label">专家民族</label>
		    <div class="layui-input-block" style="width: 40%;">
		      <input type="text" id="nation" lay-verify="title" autocomplete="off" value="<?php echo $data['nation']; ?>" class="layui-input">
		    </div>
		  </div>
		   <div class="layui-form-item" >
		    <label class="layui-form-label">专家职称</label>
		    <div class="layui-input-block" style="width: 40%;">
		      <input type="text" id="title" lay-verify="title" autocomplete="off" value="<?php echo $data['title']; ?>" class="layui-input">
		    </div>
		  </div>
		  <div class="layui-form-item" >
		    <label class="layui-form-label">毕业院校</label>
		    <div class="layui-input-block" style="width: 40%;">
		      <input type="text" id="school" lay-verify="title" autocomplete="off" value="<?php echo $data['school']; ?>" class="layui-input">
		    </div>
		  </div>
		  <div class="layui-form-item" >
		    <label class="layui-form-label">所学专业</label>
		    <div class="layui-input-block" style="width: 40%;">
		      <input type="text" id="major" lay-verify="title" autocomplete="off" value="<?php echo $data['major']; ?>" class="layui-input">
		    </div>
		  </div>
		  <div class="layui-form-item" >
		    <label class="layui-form-label">专家学历</label>
		    <div class="layui-input-block" style="width: 40%;">
		      <input type="text" id="record" lay-verify="title" autocomplete="off" value="<?php echo $data['record']; ?>" class="layui-input">
		    </div>
		  </div>
		  <div class="layui-form-item" >
		    <label class="layui-form-label">执业地址</label>
		    <div class="layui-input-block" style="width: 40%;">
		      <input type="text" id="address" lay-verify="title" autocomplete="off" value="<?php echo $data['address']; ?>" class="layui-input">
		    </div>
		  </div>
		  <div class="layui-form-item">
		    <label class="layui-form-label">注册时间</label>
		    <div class="layui-input-block" style="width: 200px; height: 30px;">
		       <input id="ctime" readonly="true" class="layui-input" style="border:0; color: #009ACD" value="<?php echo date("Y-m-d H:i:s",$data['ctime']); ?>">
		    </div>
		  </div>
		  <div class="layui-form-item layui-form-text">
		    <label class="layui-form-label" style="">专家介绍</label>
		    <div class="layui-input-block" style="width: 60%; ">
		      <textarea  class="layui-textarea" id="introduce" style="height: 180px; line-height: 24px;"><?php echo $data['introduce'];?></textarea>
		    </div>
		  </div>
		   <div class="layui-form-item layui-form-text">
		    <label class="layui-form-label" style="">研究方向</label>
		    <div class="layui-input-block" style="width: 60%; ">
		      <textarea  class="layui-textarea" id="study" style="height: 180px; line-height: 24px;"><?php echo $data['study'];?></textarea>
		    </div>
		  </div>
		   <div class="layui-form-item layui-form-text">
		    <label class="layui-form-label" style="">教育经历</label>
		    <div class="layui-input-block" style="width: 60%; ">
		      <textarea  class="layui-textarea" id="education" style="height: 180px; line-height: 24px;"><?php echo $data['education'];?></textarea>
		    </div>
		  </div>
		   <div class="layui-form-item layui-form-text">
		    <label class="layui-form-label" style="">工作经历</label>
		    <div class="layui-input-block" style="width: 60%; ">
		      <textarea  class="layui-textarea"  id="work" style="height: 180px; line-height: 24px;"><?php echo $data['work'];?></textarea>
		    </div>
		  </div>

		  <div class="layui-form-item">
		    <div class="layui-input-block">
		      <button class="layui-btn" lay-submit="" lay-filter="editSubmit">立即修改</button>
		      <a style="margin-left: 20%;" href=”#” onClick="javascript:window.history.back();return false;" class="layui-btn layui-btn-primary">返回</a>
		    </div>
		  </div>

		</form>
	</div>
	<div style="width: 100%;height: 50px;"></div>
</div>

<script type="text/javascript">
layui.use(['form', 'layedit', 'laydate'], function(){
  var form = layui.form
  ,layer = layui.layer;
      

	form.on('submit(editSubmit)', function(data){
		layer.confirm('确认修改专家信息？', { title:['修改专家信息提示','font-size:20px; text-align:center']}, function(index)
		{
 		 	//do something
 		 	// alert('yes');
		  	layer.close(index);
		  	var id = document.getElementById("userId");
		  	var name = document.getElementById("name");
		  	var sex = document.getElementById("sex");
		  	var nation = document.getElementById("nation");
		  	var school = document.getElementById("school");
		  	var title = document.getElementById("title");
		  	var major = document.getElementById("major");
		  	var record = document.getElementById("record");
		  	var address = document.getElementById("address");
		  	var introduce = document.getElementById("introduce");
		  	var education = document.getElementById("education");
		  	var study = document.getElementById("study");
		  	var work = document.getElementById("work");
		  	
			var data={
				id: id.value,
				name: name.value,
				sex: sex.value,
				nation: nation.value,
				school: school.value,
				title: title.value,
				major: major.value,
				record: record.value,
				address: address.value,
				introduce: introduce.value,
				education: education.value,
				study: study.value,
				work: work.value
			};
			// alert(JSON.stringify(data));
			$.ajax({
				url: '/api/updateExpertInfo',
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
		  //	layer.close(index);
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
  var id = document.getElementById("userId").value;
  var data ={
  	name:id
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
    	// alert("upload failed!");
      //演示失败状态，并实现重传
      // var demoText = $('#demoText');
      // demoText.html('<span style="color: #FF5722;">上传失败</span> <a class="layui-btn layui-btn-mini demo-reload">重试</a>');
      // demoText.find('.demo-reload').on('click', function(){
      //   uploadInst.upload();
      // });
    }
  });

});
</script>




















