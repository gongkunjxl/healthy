 <?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<link rel="stylesheet" type="text/css" href="/static/css/back-useradmin.css">
<script type="text/javascript" src="/static/layui/layui.js"></script>
<div class="layui-container" >
	<!-- <?php //var_dump($data); ?> -->
	<!-- <?php// echo count($data); ?> -->

	<h2>用户注册信息表</h2>
	<table class="layui-table" style="">
	  <thead>
	    <tr>
	      <th width="10%">ID</th>
	      <th width="15%">用户名</th>
	      <th width="15%">密码</th>
	       <th width="15%">电话</th>
	      <th width="20%">注册时间</th>
	      <th width="25%"></th>
	    </tr>
	  </thead>
	  <tbody id="table">
	  	<?php foreach ($data as $value):?>
		  	<tr>
		  		<td><?php echo $value['id'];?></td>
		  		<td ><?php echo $value['nickname'];?></td>
		  		<td><?php echo $value['password'];?></td>
		  		<td><?php echo $value['username'];?></td>
		  		<td><?php echo date("Y-m-d H:i:s",$value['ctime']);?></td>
		  		<td>
					<a class="layui-btn layui-btn-xs" >编辑</a>
					<a class="layui-btn layui-btn-danger layui-btn-xs">删除</a>
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
  var limit = "<?php echo $limit; ?>"
	  //总页数大于页码总数
	laypage.render({
	    elem: 'pageNav'
	    ,count: count //数据总数
	    ,limit: limit
	    ,groups: 6
	    ,jump: function(obj,first){
	    	if(!first){
	    		console.log(obj);
	    		var data={
					page: obj.curr
				};
				$.ajax({
					url: '/api/userTable',
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
				     		html=html+'<td>'+data[i].id+'</td>'+
				     		'<td>'+data[i].nickname+'</td>'+
				     		'<td>'+data[i].password+'</td>'+
				     		'<td>'+data[i].username+'</td>'+
				     		'<td>'+new Date(parseInt(data[i].ctime) * 1000).toLocaleString()+'</td>'+
				     		'<td>\
								<a class="layui-btn layui-btn-xs" >编辑</a>\
								<a class="layui-btn layui-btn-danger layui-btn-xs">删除</a>\
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








