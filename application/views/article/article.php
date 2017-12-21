 <?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<link rel="stylesheet" href="/static/css/article-page.css">
<div class="layui-container">
	<div class="index-search">
		<div class="search-bar">
			<form class="layui-form" action="">
			  <div class="layui-form-item">
			    <div class="layui-input-block search-input">
			      <input type="text" style="border:1.5px solid #009ACD;border-radius:0px;" name="title" required  lay-verify="required" placeholder="本站共收录2000份科普材料" autocomplete="off" class="layui-input">
			    </div>
			    <div class="layui-input-inline" style="width: 80px;">
                        <button  style="width: 80px; height: 38px; font-size: 14px;background-color: #009ACD;border: 0;border-radius:0px;" lay-submit="" lay-filter="search"><i class="layui-icon" style="margin-right:7px;">&#xe615;</i>搜索</button>
                </div>
			  </div>
			</form>
		</div>
		<!-- 选择 -->
		<div class="search-option">
			<label>选项:</label>
			<select id="theme">
				<option value="">主题</option>
				<option value="1">主题1</option>
				<option value="2">主题2</option>
				<option value="3">主题3</option>
			</select>
			<select id="type">
				<option value="">类型</option>
				<option value="1">慢性病</option>
				<option value="2">心脏病</option>
				<option value="3">冠心病</option>
			</select>
			<select id="language">
				<option value="">语言</option>
				<option value="1">中文</option>
				<option value="2">English</option>
			</select>
			<select id="language" style="width: 80px;">
				<option value="">制作省份</option>
				<option value="1">北京</option>
				<option value="2">广州</option>
			</select>
		</div>
	</div>
</div>


<div class="layui-container">
	<div class="article-title">
		<h2>慢性疾病</h2>
	</div>
	<!-- <?php //var_dump($data); ?> -->
	<ul class="select" style="margin-left: 8%;"> 
        <li class="select-list"> 
            <dl id="select1"> 
                <dt><b>分类：</b></dt> 
                <dd class="select-all selected"><a href="#">冠心病</a></dd> 
                <dd><a href="#">高血压</a></dd> 
                <dd><a href="#">心脏病</a></dd> 
                <dd><a href="#">糖尿病</a></dd> 
  				<dd><a href="#">高血压</a></dd>
            </dl> 
        </li> 
        <li class="select-list" style="margin-top: 20px;"> 
            <dl id="select2"> 
                <dt><b>属性：</b></dt> 
                <dd class="select-all selected"><a href="#">视频</a></dd> 
                <dd><a href="#">文章</a></dd> 
                <dd><a href="#">图片</a></dd> 
                <dd><a href="#">音频</a></dd> 
                <dd><a href="#">幻灯片</a></dd> 
            </dl> 
        </li> 
    </ul> 
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
			<h1> NO expert more</h1>
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














