<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<link rel="stylesheet" href="/static/css/picture-page.css">
<div class="layui-container" >
	<div class="picture-list-title">
		<h2>慢性疾病</h2>
	</div>
<!-- pic show -->
<!-- <?php //var_dump($data); ?> -->
 <div class="picture-content" id="pictureList">
  <?php if(count($data)>0): ?>
  <?php foreach($data as $value ):?>
	<div class="picture-list-content">
		<a>
			<div class="content">
				<div class="picture-show" id="<?php echo 'picture'.$value['id'];?>" onclick="displayPic('<?php echo 'picture'.$value['id'];?>');">
					<img src="/picture/<?php echo $value['id'];?>/<?php echo $value['index'];?>">
					<?php foreach($value['pics'] as $pic_value ):?>
						<img style="display: none;" src="<?php echo $pic_value;?>">
					<?php endforeach;?>
				</div>
				<div class="picture-label">
					<h2><?php echo $value['name'];?></h2>
					<div class="author"><?php echo $value['author'];?> &nbsp;&nbsp;<?php echo $value['title'];?></p></div>
					<div>
						<p class="left-label"><?php echo date("Y-m-d",$value['ctime']);?></p>
						<p class="right-label"><?php echo $value['read'];?>人浏览</p>
					</div>
				</div>
			</div>
		</a>	
	</div>
	<?php endforeach; ?>
	<?php else:?>
		<h1 style="font-size: 24px; text-align: center; color: red; margin-top: 40px; background-color: #fff"> NO Picture More </h1>
	<?php endif; ?>
  </div>
</div>
<div style="clear: both;"> </div>
<div id="pageNav" style="text-align: center; margin-top: 50px;"></div>
<script>
//一般直接写在一个js文件中
layui.use(['layer', 'form'], function(){
  var layer = layui.layer
  ,form = layui.form;
 
});
</script>

<script type="text/javascript">
	function displayPic(picId){
		var galley = document.getElementById(picId);
		var viewer = new Viewer(galley, {
        url: 'data-original',
        toolbar: {
          oneToOne: true,
          prev: function() {
            viewer.prev(true);
          },
          play: true,
          next: function() {
            viewer.next(true);
          },
          download: function() {
            const a = document.createElement('a');
            a.href = viewer.image.src;
            a.download = viewer.image.alt;
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
          },
        },
       });
    }	
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
					url: '/api/pictureList',
					type: 'post',
					dataType:'json',
					data: data,
					success: function (data) {
				     	// alert(JSON.stringify(data));
				     	// alert(data.length);
				     	//渲染页面
				   		var obj=document.getElementById('pictureList');
				     	var html='';
				     	for (var i = 0; i < data.length; i++) {
				     		html = html +'<div class="picture-list-content">'+
				     		'<a>'+
				     		'<div class="content"><div class="picture-show" id="picture'+data[i].id+'" onclick="displayPic(\'picture'+data[i].id+'\');">'+'<img src="/picture/'+data[i].id+"/"+data[i].index+'"></div><div class="picture-label">';
				     		for (var j = 0; j<data[i].pics.length; j++) {
				     			html = html + '<img style="display: none;" src="'+data[i].pics[j]+'">';
				     		}
							html=html+'<h2>'+data[i].name+'</h2>'+
							'<div class="author">'+data[i].author+' &nbsp;&nbsp;'+data[i].title+'</p></div><div>'+
							'<p class="left-label">'+formatDateTime(data[i].ctime)+'</p>'+
							'<p class="right-label">'+data[i].read+'人浏览</p>'+
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










