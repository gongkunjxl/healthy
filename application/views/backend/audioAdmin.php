 <?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<link rel="stylesheet" type="text/css" href="/static/css/back-useradmin.css">
<script type="text/javascript" src="/static/layui/layui.js"></script>
<div class="layui-container" >
	<!-- <?php //var_dump($data); ?> -->
	<!-- <?php// echo count($data); ?> -->
	<h2 >音频信息表</h2>
	<a  style="margin-bottom:10px; margin-top: 0; font-weight: 400" href="/backend/audioAdd" class="layui-btn">新增音频</a>
	<table class="layui-table" style="">
	  <thead>
	    <tr>
	      <th width="10%">音频名称</th>
	      <th width="10%">音频简介</th>
	      <th width="10%">音频时长</th>
	      <th width="10%">音频主题</th>
	      <th width="10%">音频类型</th>
	      <th width="7%">语言</th>
	      <th width="10%">制作省市</th>
	      <th width="8%">播放量</th>
	      <th width="10%">上传时间</th>
	       <th width="15%">操作</th>
	       <th width="10%">置顶</th>
	    </tr>
	  </thead>
	  <tbody id="table">
	  	<?php foreach ($data as $value):?>
		  	<tr>
		  		<td ><?php echo $value['name'];?></td>
		  		<td><?php echo $value['description'];?></td>
		  		<td><?php echo $value['seconds'];?></td>
		  		<td><?php echo ($value['themeId']==1)?"慢性病":"健康生活";?></td>
		  		<td><?php echo $value['type'];?></td>
		  		<td><?php echo ($value['language']==1)?"中文":"English";?></td>
		  		<td><?php echo $value['province'];?></td>
		  		<td><?php echo $value['listen_num'];?></td>
		  		<td><?php echo $value['create_time'];?></td>
		  		<td>
					<a class="layui-btn layui-btn-xs" href="/backend/audioEdit/<?php echo $value['id']; ?>" >详情</a>
					<a class="layui-btn layui-btn-danger layui-btn-xs" onclick="delClick(this);" value="<?php echo $value['id']; ?>">删除</a>
		  		</td>
		  		<td>
		  			<?php if($value['is_top']==1):?>
		  				<a class="layui-btn layui-btn-xs" onclick="cancelTop(this);" value="<?php echo $value['id']; ?>">取消置顶</a>
		  			<?php endif; ?>
		  			<?php if($value['is_top']==0):?>
		  				<a class="layui-btn layui-btn-xs" onclick="pushTop(this);" value="<?php echo $value['id']; ?>">置顶</a>
		  			<?php endif; ?>
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
					url: '/api/audioTable',
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
				     		if(data[i].language == 1){ language = "中文";} else{language = "English";}
				     		if(data[i].theme == 1){ theme = "慢性病";}else{ theme = "健康生活";}
				     		html=html+
				     		'<td>'+data[i].name+'</td>'+
				     		'<td>'+data[i].description+'</td>'+
				     		'<td>'+data[i].seconds+'</td>'+
				     		'<td>'+theme+'</td>'+
				     		'<td>'+data[i].type+'</td>'+
				     		'<td>'+language+'</td>'+
				     		'<td>'+data[i].province+'</td>'+
				     		'<td>'+data[i].listen_num+'</td>'+
				     		'<td>'+new Date(parseInt(data[i].create_time) * 1000).toLocaleString()+'</td>'+
				     		'<td>\
								<a class="layui-btn layui-btn-xs" href="/backend/expertEdit/'+data[i].id+'" >详情</a>\
								<a class="layui-btn layui-btn-danger layui-btn-xs" onclick="delClick(this);" value="'+data[i].id+'" >删除</a>\
		  						</td>';

		  					if (data[i].istop==1) {
		  						html=html+'<td><a class="layui-btn layui-btn-xs" onclick="cancelTop(this);" value="'+data[i].id+'">取消置顶</a></td>';
		  					}else{
		  						html=html+'<td><a class="layui-btn layui-btn-xs" onclick="pushTop(this);" value="'+data[i].id+'">置顶</a></td>';
		  					}

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
 	layer.confirm('确认删除该音频？', { title:['删除音频信息提示','font-size:20px; text-align:center']}, function(index)
	{
		layer.close(index);
		window.location.href="/backend/audioDelete/"+obj.getAttribute("value");
	});
}

function  cancelTop(obj)
{
    // alert(obj.getAttribute("value"));
    layer = layui.layer;
 	layer.confirm('确认取消置顶该音频？', { title:['取消置顶音频信息提示','font-size:20px; text-align:center']}, function(index)
	{
		layer.close(index);
		window.location.href="/backend/audioCancelTop/"+obj.getAttribute("value");
	});
}

function  pushTop(obj)
{
    // alert(obj.getAttribute("value"));
    layer = layui.layer;
 	layer.confirm('确认置顶该音频？', { title:['置顶音频信息提示','font-size:20px; text-align:center']}, function(index)
	{
		layer.close(index);

		var data={
					id: obj.getAttribute("value")
				};
		$.ajax({
					url: '/api/audioPushTop',
					type: 'post',
					dataType:'json',
					data: data,
					success: function (data) {
						if(data.count>2){
							alert("置顶项只能为3个，请先取消一个置顶项");
						}
				     	window.location.href="/backend/audioAdmin";
				    },
				    error: function(data) {
				     	
					}
				});

		//window.location.href="/backend/pptPushTop/"+obj.getAttribute("value");
	});
}
</script>














