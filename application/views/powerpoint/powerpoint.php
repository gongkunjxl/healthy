<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<link rel="stylesheet" href="/static/css/powerpoint-page.css">
<script type="text/javascript" src="/static/js/province.js"></script>

<div class="layui-container" >
	<div class="powerpoint-title">
		<h2>慢性疾病</h2>
	</div>
	
	<div class="powerpoint-content" id="pptList">
		<?php if(count($data)>0): ?>
  	  	<?php foreach($data as $value ):?>
			<a target="_blank" href="/main/powerpointinfo/<?php echo $value['id']; ?>">
			  	<div class="powerpoint-show">
			  		<div class="content-show">
			  			<div class="powerpoint-img">
							<img src="/<?php echo $value['pic_url'].'/1'; ?>.jpeg" style="width: 100%;height: 100%;">
						</div>
						<div class="show-right">
							<h2><?php echo $value['name']; ?></h2>
		 					<p><?php echo $value['author']; ?></p>
		 					<span class="left-date"><?php echo $value['create_time']; ?></span>
		 					<span class="right-date"><?php echo $value['reader_num']; ?>次浏览</span>
						</div>
			  		</div>
				</div>
		    </a>
		<?php endforeach; ?>
		<?php else:?>
			<h1 style="font-size: 24px; text-align: center; color: red; margin-top: 40px; background-color: #fff"> NO PoerPoint More </h1>
		<?php endif; ?>
	</div>
	
</div>

<div id="pageNavi" style="text-align: center;margin-top: 50px;"></div>

<script type="text/javascript">
	var sickData,lifeData;
	$.getJSON("/static/js/sickTheme.json",function(data){ 
		sickData = data; 
		var typeObj = document.getElementById("type");
		var innerHTML = '';
		for(value in sickData){
			innerHTML=innerHTML+'<option value="'+sickData[value].id+'">'+sickData[value].name+"</option>";
		}
		typeObj.innerHTML = innerHTML;
	});  

	//province
	var provinceObj = document.getElementById("province");
	var innerHTML = '';
	for(value in province){
		innerHTML=innerHTML+'<option value="'+province[value]+'">'+province[value]+"</option>";
	}
	provinceObj.innerHTML = innerHTML;

	$("select#theme").change(function(){
		var themeId = $(this).val();
		$.getJSON("/static/js/sickTheme.json",function(data){ 
			sickData = data; 
			if(themeId == 1){
				var typeObj = document.getElementById("type");
				var innerHTML = '';
				for(value in sickData){
					innerHTML=innerHTML+'<option value="'+sickData[value].id+'">'+sickData[value].name+"</option>";
				}
				typeObj.innerHTML = innerHTML;
			}
		}); 
	}

</script>

<script>
//一般直接写在一个js文件中
layui.use(['layer', 'form'], function(){
  var layer = layui.layer
  ,form = layui.form;
 
});
</script>

<!-- the page -->
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
	    ,groups: 7
	    ,limit: limit
	    ,jump: function(obj,first){
	       if(!first){
	   //  		//console.log(obj);
	    		var data={
					page: obj.curr
				};
				$.ajax({
					url: '/api/pptList',
					type: 'post',
					dataType:'json',
					data: data,
					success: function (data) {
				     	// alert(JSON.stringify(data));
				     	// alert(data.length);
				     	//渲染页面
				     	var obj=document.getElementById('pptList');
				     	// obj.innerHTML="";
				     	var html='';
				     	for (var i = 0; i < data.length; i++) {
				     		html = html+'<a href="/main/powerpointinfo/'+data[i].id+'">'+
				     		'<div class="powerpoint-show">'+
			  				'<div class="content-show">'+
			  				'<div class="powerpoint-img">'+
							'<img src="/static/images/image1.png" style="width: 100%;height: 100%;">'+
							'</div>'+
							'<div class="show-right">'+
							'<h2>'+data[i].name+'</h2>'+
		 					'<p>'+data[i].author+'</p>'+
		 					'<span class="left-date">'+data[i].create_time+'</span>'+
		 					'<span class="right-date">'+data[i].reader_num+'次浏览'+'</span>'+
							'</div></div></div>'+
				     		'</a>';
				     	}
				     	console.log(html)
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










