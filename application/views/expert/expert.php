 <?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<link rel="stylesheet" href="/static/css/expert-page.css">
<!-- <?php// var_dump($test); ?> -->
<!-- title -->
<div class="layui-container">
	<div class="expert-title">
		<h2>科普专家</h2>
		<span class="instrt">(注：本次排名以名字姓氏首字母排序)</span>
	</div>
	<!-- <?php //var_dump($data); ?> -->
  	<div class="expert-show" id="expertList">
  	  <?php if(count($data)>0): ?>
  	  	<?php foreach($data as $value ):?>
		  	<a href="/main/expertInfo/<?php echo $value['id']; ?>">
			  	<div class="expert-content">
					<div class="img-border">
						<img src="/header/<?php echo $value['header']; ?>">
					</div>
					<div class="word">
						<div class="name-title">
						<h2><?php echo $value['name']; ?></h2>
						<p><?php echo $value['title']; ?></p>
						<p><?php echo $value['address']; ?></p>
						</div>
					</div>
				</div>
		    </a>
		<?php endforeach; ?>
	<?php else:?>
		<h1 style="font-size: 24px; text-align: center; color: red; margin-top: 40px; background-color: #fff"> NO Experts</h1>
	<?php endif; ?>

  	</div>
</div>
<div style="width: 100%; height: 1px; clear: both;"></div>
<div id="pageNavi" style="text-align: center;margin-top: 30px; "></div>

<script type="text/javascript">
	layui.use(['laypage', 'layer'], function(){
	  var laypage = layui.laypage
	  ,layer = layui.layer;
	  var count="<?php echo $count;?>";
  	  var limit = "<?php echo $limit; ?>";
  
	  //总页数大于页码总数
	  laypage.render({
	    elem: 'pageNavi'
	    ,count: count //数据总数
	    ,groups: 6
	    ,limit: limit
	    ,jump: function(obj,first){
	       if(!first){
	   //  		//console.log(obj);
	    		var data={
					page: obj.curr
				};
				$.ajax({
					url: '/api/expertList',
					type: 'post',
					dataType:'json',
					data: data,
					success: function (data) {
				     	// alert(JSON.stringify(data));
				     	// alert(data.length);
				     	//渲染页面
				     	var obj=document.getElementById('expertList');
				     	// obj.innerHTML="";
				     	var html='';
				     	for (var i = 0; i < data.length; i++) {
				     		html = html+'<a href="/main/expertInfo/'+data[i].id+'">'+
				     		'<div class="expert-content">'+
				     		'<div class="img-border">'+
				     		'<img src="/header/'+data[i].header+'">'+
				     		'</div><div class="word"><div class="name-title">'+
				     		'<h2>'+data[i].name+'</h2>'+
				     		'<p>'+data[i].title+'</p>'+
				     		'<p>'+data[i].address+'</p>'+
				     		'</div></div></div></a>';
				     	}
				     	// alert(html);
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



















