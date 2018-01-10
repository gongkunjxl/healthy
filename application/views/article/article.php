 <?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<link rel="stylesheet" href="/static/css/article-page.css">
<div class="layui-container">
	<div class="article-title">
		<h2>文章列表</h2>
	</div>
	
	<!-- content -->
 	<div class="article-content" id="articleList">
 		<?php if(count($data)>0): ?>
  	  	<?php foreach($data as $value ):?>
  	  	  <div class="article-show">
		   <a href="/main/articleInfo/<?php echo $value['id']; ?>">
 			<div class="content-show">
 				<img src="/static/images/pdf-logo.png">
 				<div class="show-right">
 					<h3><?php echo $value['name'];?></h3>
 					<p><?php echo $value['author']; ?> <?php echo $value['title']; ?></p>
 					<span class="left-date"><?php echo date("Y-m-d",$value['ctime']);?></span>
 					<span class="right-date"><?php echo $value['read']; ?>人阅读</span>
 				</div>
 			</div>
 		  </a>
 		 </div>
		<?php endforeach; ?>
		<?php else:?>
			<h1 style="font-size: 24px; text-align: center; color: red; margin-top: 40px; background-color: #fff"> NO Article More </h1>
		<?php endif; ?>
 		<!-- <div class="article-show">
 		  <a href="/main/articleInfo">
 			<div class="content-show">
 				<img src="/static/images/pdf-logo.png">
 				<div class="show-right">
 					<h3>慢性疾病讲座慢性疾病讲座慢性疾病讲座慢性疾病讲座慢性疾病讲座慢性疾病讲座</h3>
 					<p>刘晓燕 教授</p>
 					<span class="left-date">2017-11-30</span>
 					<span class="right-date">1121人阅读</span>
 				</div>
 			</div>
 		  </a>
 		</div> -->

 	</div>

</div>

<div style="clear: both;"> </div>
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
					url: '/api/articleList',
					type: 'post',
					dataType:'json',
					data: data,
					success: function (data) {
				     	// alert(JSON.stringify(data));
				     	// alert(data.length);
				     	//渲染页面
				     	var obj=document.getElementById('articleList');
				     	var html='';
				     	for (var i = 0; i < data.length; i++) {
				     		html = html+'<div class="article-show"><a href="/main/articleInfo/'+data[i].id+'">'+
				     		'<div class="content-show"><img src="/static/images/pdf-logo.png">'+
				     		'<div class="show-right">'+
				     		'<h3>'+data[i].name+'</h3>'+
				     		'<p>'+data[i].author+ data[i].title+'</p>'+'<span class="left-date">'+formatDateTime(data[i].ctime)+'</span>'+
				     		'<span class="right-date">'+data[i].read+'人阅读</span>'+
				     		'</div></div></a></div>'; 
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














