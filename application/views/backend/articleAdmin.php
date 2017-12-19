 <?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<link rel="stylesheet" type="text/css" href="/static/css/back-useradmin.css">
<script type="text/javascript" src="/static/layui/layui.js"></script>
<div class="layui-container" >
	<!-- <?php //echo var_dump($data); ?> -->
	<!-- <?php// echo count($data); ?> -->
	<h2> 数据库中文章列表(<?php echo $count; ?>篇) </h2>
	<a  style="margin-bottom:10px; margin-top: 0; font-weight: 400" href="/backend/addArticle" class="layui-btn">新增文章</a>
	<table class="layui-table" style="">
	  <thead>
	    <tr>
	      <th width="5%">ID</th>
	      <th width="15%">文章标题</th>
	      <th width="10%">作者</th>
	      <th width="5%">作者职称</th>
	      <th width="5%">阅读量</th>
	      <th width="5%">页数</th>
	      <th width="5%">制作省份</th>
	      <th width="5%">语言</th>
	      <th width="5%">类型</th>
	      <th width="10%">主题</th>
	      <th width="15%">上传时间</th>
	       <th width="25%">操作</th>
	    </tr>
	  </thead>
	  <tbody id="table">
	  	<?php foreach ($data as $value):?>
		  	<tr>
		  		<td><?php echo $value['id'];?></td>
		  		<td><?php echo $value['name'];?></td>
		  		<td><?php echo $value['author']; ?></td>
		  		<td><?php echo $value['title'];?></td>
		  		<td><?php echo $value['read'];?></td>
		  		<td><?php echo $value['page'];?></td>
		  		<td><?php echo $value['province'];?></td>
		  		<td><?php echo ($value['language']==1)?"中文":"English";?></td>
		  		<td><?php echo $value['type'];?></td>
		  		<td><?php echo ($value['themeId']==1)?"慢性病":"健康生活";?></td>
		  		<td><?php echo date("Y-m-d H:i:s",$value['ctime']);?></td>
		  		<td>
					<a class="layui-btn layui-btn-xs" href="/backend/articleEdit/<?php echo $value['id']; ?>" >详情</a>
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

  // alert(sickData);

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
					url: '/api/articleTable',
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
				     	var language,theme;
				     	for (var i = 0; i < data.length; i++) {
				     		if(data[i].language == 1){ language = "中文";} else{language = "English";}
				     		if(data[i].themeId == 1){ theme = "慢性病";}else{ theme = "健康生活";}

				     		html=html+'<td>'+data[i].id+'</td>'+
				     		'<td>'+data[i].name+'</td>'+
				     		'<td>'+data[i].author+'</td>'+
				     		'<td>'+data[i].title+'</td>'+
				     		'<td>'+data[i].read+'</td>'+
				     		'<td>'+data[i].page+'</td>'+
				     		'<td>'+data[i].province+'</td>'+
				     		'<td>'+language+'</td>'+
				     		'<td>'+data[i].type+'</td>'+
				     		'<td>'+theme+'</td>'+
				     		'<td>'+new Date(parseInt(data[i].ctime) * 1000).toLocaleString()+'</td>'+
				     		'<td>\
								<a class="layui-btn layui-btn-xs" href="/backend/articleEdit/'+data[i].id+'" >详情</a>\
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
 	layer.confirm('确认删除该文章？', { title:['删除文章信息提示','font-size:20px; text-align:center']}, function(index)
	{
		layer.close(index);
		window.location.href="/backend/articleDelete/"+obj.getAttribute("value");
	});
}
</script>










