 <?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<link rel="stylesheet" href="/static/css/articleinfo-page.css">

<div class="layui-container">
 	<div class="layui-row">
	  <div class="layui-col-md9">
	  	<div class="article-show">
		    <div id="pdf1" class="article-content">
		    	
		    </div>
		</div>
	  </div>
	  <div class="layui-col-md3">
	  	<div class="article-left">
		  	<div class="left-show">
		    	<h1>相关文章推荐</h1>
		    	<div class="line"></div>
		    	
		    	 <div style="height: 480px;overflow: auto;" id="LAY_Article">
		    	 	<!-- <a href="#">
		    		<div class="content">
		    			<h3>. 冠心病的预防小知识冠心病的预防小知识冠心病的预防小知识</h3>
		    			<p class="span-left">12000人阅读</p>
		    			<p class="span-right">12页</p>
		    		</div>
		    		</a> -->
		    	 </div>
		    </div>
	    </div>
	  </div>
	</div>

</div>

<script type="text/javascript"> 
	window.onload = function (){
	    var success = new PDFObject({ url: "/article/yii2.pdf" ,pdfOpenParams: { scrollbars: '0', toolbar: '0', statusbar: '0'}}).embed("pdf1");
	};
</script>
<!-- 流加载 -->
<script>
layui.use('flow', function(){
  	var flow = layui.flow;
 
	 flow.load({
	    elem: '#LAY_Article' 	//流加载容器
	    ,scrollElem: '#LAY_Article' //滚动条所在元素，一般不用填，此处只是演示需要。
	    ,isAuto: false
	    ,isLazyimg: true
	    ,done: function(page, next){ //加载下一页
	      //模拟插入
	      setTimeout(function(){
	        var lis = [];
	        for(var i = 0; i < 6; i++){
	        	var litem='<a href="#" onclick="articleClick(\'11.pdf\');">\
		    		<div class="content">\
		    			<h3>. 冠心病的预防小知识冠心病的预防小知识冠心病的预防小知识</h3>\
		    			<p class="span-left">12000人阅读</p>\
		    			<p class="span-right">12页</p>\
		    		</div>\
		    		</a>';
	          lis.push(litem);
	        }
	        next(lis.join(''), page < 6); //假设总页数为 6
	      }, 500);
	    }
	  });
});
</script>

<script type="text/javascript">
	function articleClick(value)
	{
		// alert(value);
 		var success = new PDFObject({ url: "/article/11.pdf" ,pdfOpenParams: { scrollbars: '0', toolbar: '0', statusbar: '0'}}).embed("pdf1");
		// 删除
       	// document.getElementById("video-item").innerHTML="";

       	// add
       	// document.getElementById("video-item").innerHTML='<video poster="/static/images/image2.png" controls preload style="background-color: black">\
       	// 		<source src="/video/movie.mp4"></source></video>\
       	// 		<p>这个真的好难</p>';
	}

</script>






