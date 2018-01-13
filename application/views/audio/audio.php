 <?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<link rel="stylesheet" href="/static/css/audio-page.css">
<div class="layui-container">
	<div class="audio-title">
		<h2>慢性疾病</h2>
	</div>
	<!-- content -->
 	<div class="audio-content" id="audioList">
 		<?php if(count($data)>0): ?>
  	  	<?php foreach($data as $value ):?>
			<a target="_blank" href="/main/audioinfo/<?php echo $value['id']; ?>" >
			  	<div class="audio-show">
		 			<div class="content-show">
		 				<!-- <img src="/static/images/audio-logo.png"> -->
		 				<div class="audio-btn" >
							<div class="off" onclick="audio.changeClass(this,'media1')">
								<audio loop="loop" src="/<?php echo $value['source_url']; ?>" id="media1" preload="preload"></audio>
							</div>
						</div>
		 				<div class="show-right">
		 					<h3><?php echo $value['name']; ?></h3>
		 					<p><?php echo $value['author']; ?>  <?php echo $value['title']; ?></p>
		 					<span class="left-date"><?php echo $value['create_time']; ?></span>
		 					<span class="right-date"><?php echo $value['listen_num']; ?>次播放</span>
		 				</div>
		 			</div>
		 		</div>
		    </a>
		<?php endforeach; ?>
		<?php else:?>
			<h1 style="font-size: 24px; text-align: center; color: red; margin-top: 40px; background-color: #fff"> NO Audio More </h1>
		<?php endif; ?>
 	</div>

</div>

<div style="clear: both;"> </div>
<!-- audio -->
<script>
	// var audio = {
	// 	changeClass: function (target,id) {
	//        	var className = $(target).attr('class');
	//        	var ids = document.getElementById(id);
	//        	(className == 'on')
	//            	? $(target).removeClass('on').addClass('off')
	//            	: $(target).removeClass('off').addClass('on');
	//        	(className == 'on')
	//            	? ids.pause()
	//            	: ids.play();
	//    	},
	// 	play:function(){
	// 		document.getElementById('media').play();
	// 	}
	// }
	// audio.play();
</script>

<div id="pageNavi" style="text-align: center;margin-top: 50px;"></div>
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
					url: '/api/audioList',
					type: 'post',
					dataType:'json',
					data: data,
					success: function (data) {
				     	// alert(JSON.stringify(data));
				     	// alert(data.length);
				     	//渲染页面
				     	var obj=document.getElementById('audioList');
				     	// obj.innerHTML="";
				     	var html='';
				     	for (var i = 0; i < data.length; i++) {
				     		html = html+'<a href="/main/audioinfo/'+data[i].id+'">'+
				     		'<div class="audio-show">'+
		 					'<div class="content-show">'+
		 					'<div class="audio-btn" >'+
							'<div class="off" onclick="audio.changeClass(this,\'media1\')">'+
							'<audio loop="loop" src="/'+ data[i].source_url + '" id="media1" preload="preload"></audio>'+
							'</div>'+
							'</div>'+
		 					'<div class="show-right">'+
		 					'<h3>'+data[i].name+'</h3>'+
		 					'<p>'+data[i].author+data[i].title+'</p>'+
		 					'<span class="left-date">'+data[i].create_time+'</span>'+
		 					'<span class="right-date">'+data[i].listen_num+'次播放</span>'+
		 					'</div>'+
		 					'</div>'+
		 					'</div>'+
				     		'</a>';
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



















