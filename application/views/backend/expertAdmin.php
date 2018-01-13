 <?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<link rel="stylesheet" type="text/css" href="/static/css/back-useradmin.css">
<script type="text/javascript" src="/static/layui/layui.js"></script>
<div class="layui-container" >
	<!-- <?php //var_dump($data); ?> -->
	<!-- <?php// echo count($data); ?> -->
	<h2 >专家注册信息表<?php echo $count; ?></h2>
	<a  style="margin-bottom:10px; margin-top: 0; font-weight: 400" href="/backend/addExpert" class="layui-btn">新增专家</a>
	<table class="layui-table" style="">
	  <thead>
	    <tr>
	      <th width="5%">ID</th>
	      <th width="10%">用户名</th>
	      <th width="5%">密码</th>
	      <th width="5%">姓名</th>
	      <th width="5%">性别</th>
	      <th width="5%">民族</th>
	      <th width="5%">职称</th>
	      <th width="10%">毕业学校</th>
	      <th width="5%">专业</th>
	      <th width="5%">学历</th>
	      <th width="10%">执业地址</th>
	      <th width="10%">注册时间</th>
	       <th width="20%">操作</th>
	      <!-- <th width="12%">个人介绍</th>
	      <th width="12%">研究经历</th>
	      <th width="12%">教育经历</th>
	      <th width="12%">工作经历</th> -->
	    </tr>
	  </thead>
	  <tbody id="table">
	  	<?php foreach ($data as $value):?>
		  	<tr>
		  		<td><?php echo $value['id'];?></td>
		  		<td ><?php echo $value['username'];?></td>
		  		<td ><?php echo $value['password'];?></td>
		  		<td ><?php echo $value['name'];?></td>
		  		<td><?php echo ($value['sex']==1)?"男":"女";?></td>
		  		<td><?php echo $value['nation'];?></td>
		  		<td><?php echo $value['title'];?></td>
		  		<td><?php echo $value['school'];?></td>
		  		<td><?php echo $value['major'];?></td>
		  		<td><?php echo $value['record'];?></td>
		  		<td><?php echo $value['address'];?></td>
		  		<td><?php echo date("Y-m-d H:i:s",$value['ctime']);?></td>
		  		<td>
					<a class="layui-btn layui-btn-xs" href="/backend/expertEdit/<?php echo $value['id']; ?>" >详情</a>
					<a class="layui-btn layui-btn-danger layui-btn-xs" onclick="delClick(this);" value="<?php echo $value['id']; ?>">删除</a>
		  		</td>
		  	</tr>
		 <?php endforeach; ?>
	  </tbody>
	</table> 
	<div id="pageNav" class="page-nav"></div>
	
</div>

<script>
layui.use(['laypage', 'layer'], function(){
  var laypage = layui.laypage
  ,layer = layui.layer;
  var count="<?php echo $count;?>";
  var limit = "<?php echo $limit; ?>";
	  //总页数大于页码总数
	laypage.render({
	    elem: 'pageNav'
	    ,count: count //数据总数
	    ,limit: limit
	    ,groups: 6
	    ,jump: function(obj,first){
	    	if(!first){
	    		//console.log(obj);
	    		var data={
					page: obj.curr
				};
				$.ajax({
					url: '/api/expertTable',
					type: 'post',
					dataType:'json',
					data: data,
					success: function (data) {
				     	//alert(JSON.stringify(data));
				     	//alert(data.length);
				     	//渲染页面
				     	var obj=document.getElementById('table');
				     	obj.innerHTML="";
				     	var html='<tr>';
				     	for (var i = 0; i < data.length; i++) {
				     		var sex="男";
				     		if(data[i].sex==2){
				     			sex="女";
				     		}
				     		html=html+'<td>'+data[i].id+'</td>'+
				     		'<td>'+data[i].username+'</td>'+
				     		'<td>'+data[i].password+'</td>'+
				     		'<td>'+data[i].name+'</td>'+
				     		'<td>'+sex+'</td>'+
				     		'<td>'+data[i].nation+'</td>'+
				     		'<td>'+data[i].title+'</td>'+
				     		'<td>'+data[i].school+'</td>'+
				     		'<td>'+data[i].major+'</td>'+
				     		'<td>'+data[i].record+'</td>'+
				     		'<td>'+data[i].address+'</td>'+
				     		'<td>'+new Date(parseInt(data[i].ctime) * 1000).toLocaleString()+'</td>'+
				     		'<td>\
								<a class="layui-btn layui-btn-xs" href="/backend/expertEdit/'+data[i].id+'" >详情</a>\
								<a class="layui-btn layui-btn-danger layui-btn-xs" onclick="delClick(this);" value="'+data[i].id+'" >删除</a>\
		  						</td>';
		  						html=html+'</tr>';
				     	}
				     	obj.innerHTML=html;
				    },
				    error: function(data) {
				     	alert("Sorry error");
					}
				});
	    	}
	    }
	  });

  });
</script>
<script type="text/javascript">
function  delClick(obj)
{
    // alert(obj.getAttribute("value"));
    layer = layui.layer;
 	layer.confirm('确认删除该专家？', { title:['删除专家信息提示','font-size:20px; text-align:center']}, function(index)
	{
		layer.close(index);
		window.location.href="/backend/expertDelete/"+obj.getAttribute("value");
	});
}
</script>














