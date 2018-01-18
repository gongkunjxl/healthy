 <?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<link rel="stylesheet" type="text/css" href="/static/css/expert-update.css">
<script type="text/javascript" src="/static/layui/layui.js"></script>
<script type="text/javascript" src="/backend/js/nation.js"></script>

<div class="layui-container">
	<!-- <?php //echo var_dump($data); ?> -->
	<div class="expert-img" style="margin-top: 50px;">
		<img id="headImg" src="/header/<?php echo $data['header'];?>">
		<button type="button" class="layui-btn" style="margin-left: 30px; float: left;margin-top: 80px;" id="uploadHead">上传头像</button>
	</div>
	<div class="user-edit">
		<form class="layui-form">
		   <div class="layui-form-item">
		    <label class="layui-form-label">用户名</label>
		    <div class="layui-input-block" style="width: 40%;">
		       <input class="layui-input" readonly="true" style="border:0" id ="username" value="<?php echo $data['username']; ?>">
		    </div>
		  </div>
		   <div class="layui-form-item">
		    <label class="layui-form-label">用户密码</label>
		    <div class="layui-input-block" style="width: 40%;">
		       <input class="layui-input" id ="password" value="<?php echo $data['password']; ?>">
		    </div>
		  </div>

		   <div class="layui-form-item" >
		    <label class="layui-form-label">专家姓名</label>
		    <div class="layui-input-block" style="width: 40%; min-width: 250px;">
		      <input type="text" id="name" lay-verify="title|required" autocomplete="off" <?php if(!empty($data['name'])): ?> value="<?php echo $data['name']; ?>" <?php else: ?>  placeholder="请输入专家姓名" <?php endif;?> class="layui-input">
		    </div>
		  </div>
		  <div class="layui-form-item">
		    <label class="layui-form-label">专家性别</label>
		    <div class="layui-input-block" style="width: 40% min-width: 250px;">
		      <input type="radio" name="sex" <?php if($data['sex']== 1):?> checked="true" <?php endif; ?> value="1"  title="男" >
		      <input type="radio" name="sex" value="2" <?php if($data['sex']== 2):?> checked="true" <?php endif; ?> checked="true" title="女">
		    </div>
		  </div>
		  <div class="layui-form-item">
		    <label class="layui-form-label">专家民族</label>
		    <div class="layui-input-block" style="width: 40%; min-width: 250px;">
		      <select id="nation" name="nation" lay-filter="nation|required">
		      </select>
		    </div>
		  </div>
		   <div class="layui-form-item" >
		    <label class="layui-form-label">专家职称</label>
		    <div class="layui-input-block" style="width: 40%; min-width: 250px;">
		      <input type="text" id="title" lay-verify="title|required" autocomplete="off" <?php if(!empty($data['title'])): ?> value="<?php echo $data['title']; ?>" <?php else: ?>  placeholder="请输入专家职称" <?php endif;?> class="layui-input">
		    </div>
		  </div>
		  <div class="layui-form-item" >
		    <label class="layui-form-label">毕业院校</label>
		    <div class="layui-input-block" style="width: 40%; min-width: 250px;">
		      <input type="text" id="school" lay-verify="school|required" autocomplete="off" <?php if(!empty($data['school'])): ?> value="<?php echo $data['school']; ?>" <?php else: ?>  placeholder="请输入毕业院校" <?php endif;?> class="layui-input">
		    </div>
		  </div>
		  <div class="layui-form-item" >
		    <label class="layui-form-label">所学专业</label>
		    <div class="layui-input-block" style="width: 40%; min-width: 250px;">
		      <input type="text" id="major" lay-verify="major|required" autocomplete="off" <?php if(!empty($data['major'])): ?> value="<?php echo $data['major']; ?>" <?php else: ?>  placeholder="请输入所学专业" <?php endif;?> class="layui-input">
		    </div>
		  </div>
		  <div class="layui-form-item" >
		    <label class="layui-form-label">专家学历</label>
		    <div class="layui-input-block" style="width: 40%; min-width: 250px;">
		     <select id="record" name="record" lay-filter="record|required">
		     	<option value="大专" <?php if($data['record']== "大专"):?> selected="true" <?php endif; ?>>大专</option>   
		     	<option value="本科" <?php if($data['record']== "本科"):?> selected="true" <?php endif; ?>>本科</option>  
		     	<option value="硕士" <?php if($data['record']== "硕士"):?> selected="true" <?php endif; ?>>硕士</option>  
		     	<option value="博士" <?php if($data['record']== "博士"):?> selected="true" <?php endif; ?>>博士</option>  
		     	<option value="博士后" <?php if($data['record']== "博士后"):?> selected="true" <?php endif; ?>>博士后</option>  
		     </select>
		    </div>
		  </div>
		  <div class="layui-form-item" >
		    <label class="layui-form-label">执业地址</label>
		    <div class="layui-input-block" style="width: 40%; min-width: 250px;">
		      <input type="text" id="address" lay-verify="address|required" autocomplete="off" <?php if(!empty($data['address'])): ?> value="<?php echo $data['address']; ?>" <?php else: ?>  placeholder="请输入执业地址" <?php endif;?> class="layui-input">
		    </div>
		  </div>
		  <div class="layui-form-item layui-form-text">
		    <label class="layui-form-label" style="">专家介绍</label>
		    <div class="layui-input-block" style="width: 60%;min-width: 250px; ">
		      <textarea  class="layui-textarea" id="introduce" lay-verify="introduce|required" <?php if(!empty($data['introduce'])): ?> value="<?php echo $data['introduce']; ?>" <?php else: ?>  placeholder="请输入专家介绍" <?php endif;?> style="height: 180px; line-height: 24px;"><?php if(!empty($data['introduce'])) echo $data['education'];?></textarea>
		    </div>
		  </div>
		   <div class="layui-form-item layui-form-text">
		    <label class="layui-form-label" style="">研究方向</label>
		    <div class="layui-input-block" style="width: 60%; min-width: 250px;">
		      <textarea  class="layui-textarea" lay-verify="study|required" id="study" style="height: 180px; line-height: 24px;" <?php if(!empty($data['study'])): ?> value="<?php echo $data['study']; ?>" <?php else: ?>  placeholder="请输入专家研究方向" <?php endif;?>><?php if(!empty($data['study'])) echo $data['study'];?></textarea>
		    </div>
		  </div>
		   <div class="layui-form-item layui-form-text">
		    <label class="layui-form-label" style="">教育经历</label>
		    <div class="layui-input-block" style="width: 60%; min-width: 250px; ">
		      <textarea  class="layui-textarea" id="education" lay-verify="education|required" style="height: 180px; line-height: 24px;" <?php if(!empty($data['education'])): ?> value="<?php echo $data['education']; ?>" <?php else: ?>  placeholder="请输入教育经历" <?php endif;?>><?php if(!empty($data['education'])) echo $data['education'];?></textarea>
		    </div>
		  </div>
		   <div class="layui-form-item layui-form-text">
		    <label class="layui-form-label" style="">工作经历</label>
		    <div class="layui-input-block" style="width: 60%; min-width: 250px;">
		      <textarea  class="layui-textarea"  id="work" lay-verify="work|required" style="height: 180px; line-height: 24px;" <?php if(!empty($data['work'])): ?> value="<?php echo $data['work']; ?>" <?php else: ?>  placeholder="请输入专家工作经历" <?php endif;?>><?php if(!empty($data['work'])) echo $data['work']; ?></textarea>
		    </div>
		  </div>

		  <div class="layui-form-item">
		    <div class="layui-input-block">
		      <button class="layui-btn" lay-submit="" id="subExpert" lay-filter="editSubmit">提交信息</button>
		       <a style="margin-left: 20%;" href="/main/index" class="layui-btn layui-btn-primary">返回</a>
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
var selNation = "<?php echo $data['nation']; ?>";
for(value in nation){
	if(nation[value] == selNation){
		innerHTML=innerHTML+'<option selected="true" value="'+nation[value]+'">'+nation[value]+"</option>";
	}else{
		innerHTML=innerHTML+'<option value="'+nation[value]+'">'+nation[value]+"</option>";
	}
}
nationObj.innerHTML = innerHTML;
var expert_id = "<?php echo $data['id']; ?>";

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
		  	layer.close(index);
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
		  	var username = document.getElementById("username");
		  	var password = document.getElementById("password");
		  	var major = document.getElementById("major");
		  	var recordSel = document.getElementById("record");
		  	var address = document.getElementById("address");
		  	var introduce = document.getElementById("introduce");
		  	var education = document.getElementById("education");
		  	var study = document.getElementById("study");
		  	var work = document.getElementById("work");
			var data={
				id: expert_id,
				name: name.value,
				sex: sex.value,
				username: username.value,
				password: password.value,
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
			//alert(JSON.stringify(data));
			$.ajax({
				url: '/api/expertUpdateInfo',
				type: 'post',
				dataType:'json',
				data: data,
				success: function (data) {
			     	 // alert(JSON.stringify(data));
				     if(data.status == 200){
				     	alert("更新信息成功");
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
  	name: expert_id
  };
  //普通图片上传
  var uploadInst = upload.render({
    elem: '#uploadHead'
    ,url: '/api/uploadHeader'
    ,data: data
    ,accept: 'images'
    ,exts: 'jpg|png|jpeg'
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












