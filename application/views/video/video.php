<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<link rel="stylesheet" href="/static/css/video-list-page.css">
<div class="layui-container" >
	<div class="video-list-title">
		<h2>视频列表</h2>
	</div>
	<!-- video -->
	<!-- <?php //var_dump($data); ?> -->
 	<div class="video-content" id="videoList">
 	  <?php if(count($data)>0): ?>
  	  	<?php foreach($data as $value ):?>
  	  	  <div class="video-list-content">
			<a href="/main/videoInfo/<?php echo $value['id']; ?>">
				<div class="content">
					<div class="video-show">
						<video poster="<?php echo $value['covAddr']; ?>" > 
						</video>
					</div>
					<div class="video-label">
						<h2><?php echo $value['name']; ?></h2>
						<div class="author"><?php echo $value['author']; ?> <?php echo $value['title']; ?></p></div>
						<div>
							<p class="left-label"><?php echo date("Y-m-d",$value['ctime']);?></p>
							<p class="right-label"><?php echo $value['read']; ?>人播放</p>
						</div>
					</div>
				</div>
			</a>
		</div>
  	  	<?php endforeach; ?>
		<?php else:?>
			<h1 style="font-size: 24px; text-align: center; color: red; margin-top: 40px; background-color: #fff"> NO Video More </h1>
	  <?php endif; ?>
   </div>
</div>
<div style="clear: both;"> </div>
<div id="pageNav" style="text-align: center;margin-top: 50px;"></div>
<script>
//一般直接写在一个js文件中
layui.use(['layer', 'form'], function(){
  var layer = layui.layer
  ,form = layui.form;
 
});
</script>

<!-- the page -->
<script type="text/javascript">
function formatDateTime(timeStamp) {   
    var date = new Date();  
    date.setTime(timeStamp * 1000);  
    var y = date.getFullYear();      
    var m = date.getMonth() + 1;      
    m = m < 10 ? ('0' + m) : m;      
    var d = date.getDate();      
    d = d < 10 ? ('0' + d) : d;          
    return y + '-' + m + '-' + d;      
};

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
					url: '/api/videoList',
					type: 'post',
					dataType:'json',
					data: data,
					success: function (data) {
				     	// alert(JSON.stringify(data));
				     	// alert(data.length);
				     	//渲染页面
				   		var obj=document.getElementById('videoList');
				     	var html='';
				     	for (var i = 0; i < data.length; i++) {
				     		html = html +'<div class="video-list-content">'+
				     		'<a href="/main/videoInfo/'+data[i].id+'">'+
				     		'<div class="content"><div class="video-show">'+
							' <video poster="'+data[i].covAddr+'"  "></video></div><div class="video-label">'+
							'<h2>'+data[i].name+'</h2>'+
							'<div class="author">'+data[i].author+' &nbsp;&nbsp;'+data[i].title+'</p></div><div>'+
							'<p class="left-label">'+formatDateTime(data[i].ctime)+'</p>'+
							'<p class="right-label">'+data[i].read+'人播放</p>'+
							'</div></div></div></a></div>';

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











