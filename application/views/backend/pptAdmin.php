 <?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<link rel="stylesheet" type="text/css" href="/static/css/back-useradmin.css">
<script type="text/javascript" src="/static/layui/layui.js"></script>
<div class="layui-container" >
	<!-- <?php //var_dump($data); ?> -->
	<!-- <?php// echo count($data); ?> -->
	<h2 >幻灯片信息表</h2>
	<a  style="margin-bottom:10px; margin-top: 0; font-weight: 400" href="/backend/pptAdd" class="layui-btn">新增幻灯片</a>
	<table class="layui-table" style="overflow:scroll;">
	  <thead>
	    <tr>
	      <th width="10%;">名称</th>
	      <th width="10%">简介</th>
	      <th width="8%">作者</th>
	      <th width="7%">页数</th>
	      <th width="7%">主题</th>
	      <th width="10%">类型</th>
	      <th width="6%">语言</th>
	      <th width="10%">制作省市</th>
	      <th width="7%">阅读量</th>
	      <th width="10%">上传时间</th>
	       <th width="20%">操作</th>
	    </tr>
	  </thead>
	  <tbody id="table">
	  	<?php foreach ($data as $value):?>
		  	<tr>
		  		<td ><?php echo $value['name'];?></td>
		  		<td><?php echo $value['description'];?></td>
		  		<td><?php echo $value['author'];?></td>
		  		<td><?php echo $value['page_count'];?></td>
		  		<td><?php echo $value['theme'];?></td>
		  		<td><?php echo $value['type'];?></td>
		  		<td><?php echo $value['language'];?></td>
		  		<td><?php echo $value['province'];?></td>
		  		<td><?php echo $value['reader_num'];?></td>
		  		<td><?php echo $value['create_time'];?></td>
		  		<td>
					<a class="layui-btn layui-btn-xs" href="/backend/pptEdit/<?php echo $value['id']; ?>" >详情</a>
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
					url: '/api/pptTable',
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
				     		html=html+
				     		'<td>'+data[i].name+'</td>'+
				     		'<td>'+data[i].description+'</td>'+
				     		'<td>'+data[i].author+'</td>'+
				     		'<td>'+data[i].page_count+'</td>'+
				     		'<td>'+data[i].theme+'</td>'+
				     		'<td>'+data[i].type+'</td>'+
				     		'<td>'+data[i].language+'</td>'+
				     		'<td>'+data[i].province+'</td>'+
				     		'<td>'+data[i].reader_num+'</td>'+
				     		'<td>'+new Date(parseInt(data[i].create_time) * 1000).toLocaleString()+'</td>'+
				     		'<td>\
								<a class="layui-btn layui-btn-xs" href="/backend/pptEdit/'+data[i].id+'" >详情</a>\
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
 	layer.confirm('确认删除该ppt？', { title:['删除PPT信息提示','font-size:20px; text-align:center']}, function(index)
	{
		layer.close(index);
		window.location.href="/backend/pptDelete/"+obj.getAttribute("value");
	});
}
</script>














