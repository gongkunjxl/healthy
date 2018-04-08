 <?php
defined('BASEPATH') OR exit('No direct script access allowed');
if(isset($_SESSION['userid']) && $_SESSION['userid']>0){
   $userid = $_SESSION['userid'];
}else{
  $userid=0; 
}
?>
  <style type="text/css">

  .pdfShow canvas {
                margin: 20px auto;
                display: block;
            }
        </style>
<link rel="resource" type="application/l10n" href="/static/pdf/web/locale/locale.properties"/>
    <script src="/static/pdf/web/l10n.js"></script>
    <!-- This snippet is used in production (included from viewer.html) -->
    <script src="/static/pdf/build/pdf.js"></script>
<link rel="stylesheet" href="/static/css/articleinfo-page.css">
<div class="layui-container">
 	<div class="layui-row">
	  <div class="layui-col-md9">
	  	<div class="article-show">
		    <div id="pdfShow" class="article-content">
		    	
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
		    	 <div style="margin-top: 40px; margin-left: 80px;">
		    	 	<?php if($userid>0):?>
		    	 		<a style="text-decoration: none;" id="downpdf" href="/article/<?php echo $data['id']; ?>" class="layui-btn layui-btn-primary">文章下载</a>
		    	 	<?php else:?>
		    	 		<a style="text-decoration: none;" href="/main/login" class="layui-btn layui-btn-primary">文章下载</a>
		    	 	<?php endif;?>
		    	 </div>
		    	 
		    </div>
	    </div>
	  </div>
	</div>

</div>

<script type="text/javascript">
	PDFJS.imageResourcesPath = './images/';
  PDFJS.workerSrc = '/static/pdf/build/pdf.worker.js';
  PDFJS.cMapUrl = '/static/pdf/web/cmaps/';
  PDFJS.cMapPacked = true; 
	window.onload = function (){
		var pdfId = "<?php echo $data['id']; ?>";
		var m_url = '/article/'+pdfId+".pdf";
		showPdf(m_url);
	};

	function showall(url, page, id) {
            PDFJS.getDocument(url).then(function getPdfHelloWorld(pdf) {
                pdf.getPage(page).then(function getPageHelloWorld(page) {
                    var scale = 1.4;
                    var viewport = page.getViewport(scale);
                    var canvas = document.getElementById(id);
                    var context = canvas.getContext('2d');
                    canvas.height = viewport.height;
                    canvas.width = viewport.width;
                    var renderContext = {
                        canvasContext: context,
                        viewport: viewport
                    };
                    page.render(renderContext);
                });
            });
        }

        function showPdf(url) {
            
            PDFJS.getDocument(url).then(function getPdfHelloWorld(pdf) {
                pages = pdf.numPages+1;
                for(var i = 1; i < pdf.numPages; i++) {
                    var id = 'page-id-' + i;
                    $("#pdfShow").append('<canvas id="' + id + '"></canvas>');
                    showall(url, i, id);
                }
            });
        }
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
	        //ajax 获取推荐
	        var data={
					page: page
				};
				$.ajax({
					url: '/api/articleRecommend',
					type: 'post',
					dataType:'json',
					data: data,
					success: function (data) {
				     	 // alert(JSON.stringify(data));
				     	// alert(data.length);
				     	for (var i = 0; i < data.length; i++) {
				     		var litem='<a href="#" onclick="articleClick(\''+data[i].id+'.pdf\');">\
				    		<div class="content">\
				    			<h3>. '+data[i].name+'</h3>\
				    			<p class="span-left">'+data[i].read+'人阅读</p>\
				    			<p class="span-right">'+data[i].page+'页</p><div class="line"></div></div></a>';
			     		    lis.push(litem);
				     	}
				     	 next(lis.join(''), page < 6); //假设总页数为 6
				    },
				    error: function(data) {
				     	alert("Sorry error");
					}
				});

	        // alert(page);
	       //  for(var i = 0; i < 6; i++){
	       //  	var litem='<a href="#" onclick="articleClick(\'11.pdf\');">\
		    		// <div class="content">\
		    		// 	<h3>. 冠心病的预防小知识冠心病的预防小知识冠心病的预防小知识</h3>\
		    		// 	<p class="span-left">12000人阅读</p>\
		    		// 	<p class="span-right">12页</p>\
		    		// </div>\
		    		// </a>';
	       //    lis.push(litem);
	       //  }
	        
	      }, 500);
	    }
	  });
});
</script>

<script type="text/javascript">
	function articleClick(value)
	{
		// alert(value);
		var m_url = "/article/"+value;
		var userId = "<?php echo $userid; ?>";
		// alert(userId);
		if(userId>0){
			var download = document.getElementById("downpdf");
			download.setAttribute("href",m_url);
		}
		$("#pdfShow").empty();
		showPdf(m_url);		// 删除
       	// document.getElementById("video-item").innerHTML="";  
	}

</script>






