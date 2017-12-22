<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<link rel="stylesheet" type="text/css" href="/static/css/picinfo-page.css">

<div class="layui-container">
    <!-- <?php //var_dump($reData);?> -->
    <!-- <?php// var_dump($picture);?> -->
	<div class="pic-title-show" id="nameId">
		<h2 id="picTitle"><?php echo $data['name'];?> </h2>
	</div>
    <div class="pic-content-show" >
    	<div class="left-pre">
    		<img onclick="pre_click(this)" id="preId" value="0" src="/static/images/arrow-left.jpg">
    	</div>
    	<div class="mid-content">
			<div class="pic-show" >
				<img id="picShow" src="<?php echo $data['index']; ?>">
                <p id="navShow"></p>
			</div> 
    	</div>
    	<div class="right-pre">
    		<img onclick="next_click(this)" id="nextId" value="1" src="/static/images/arrow-right.jpg">
    	</div>
    </div>

    <!-- the bottom -->
    <div class="pic-content-bottom">
    	<div class="left-title">
    		<h2>相关推荐</h2>
    	</div>
    	<div class="mid-content" id="midShow">
        <?php if(count($reData)>0): ?>
        <?php foreach($reData as $value ):?>
    	  <a onclick="pic_click(this);" value="<?php echo $value['id'];?>" >
    		<div class="pic-show">
    			<img src="/<?php echo $value['index']; ?>">
    			<div class="title">
    				<h3><?php echo $value['name']; ?></h3>
    			</div>
    		</div>
    	  </a>
        <?php endforeach; ?>
        <?php else:?>
            <h1 style="margin-top:70px;font-size:24px; text-align:center; color:red"> NO expert more</h1>
        <?php endif; ?>
    	 <!--  <a onclick="pic_click(this);">
    		<div class="pic-show">
    			<img src="/picture/pic_02.png">
    			<div class="title">
    				<h3>冬季保暖小知识冬季保暖小知识冬季保暖小知识冬季保暖小知识</h3>
    			</div>
    		</div>
    	  </a>
    	  <a onclick="pic_click(this);">
    		<div class="pic-show">
    			<img src="/picture/pic_2.png">
    			<div class="title">
    				<h3>冬季保暖小知识冬季保暖小知识冬季保暖小知识冬季保暖小知识</h3>
    			</div>
    		</div>
    	  </a> -->
    	</div>
    	<div class="right-button">
    		<img onclick="more_click()" src="/static/images/right-button.png">
    	</div>
    </div>

</div>
</div>
<div style="clear: both;"></div>
<script type="text/javascript">
    var tmpImages = '<?php echo $picture; ?>';
    var nowPics = JSON.parse(tmpImages);
    var page = 1;
    var navObj = document.getElementById("navShow");
    navObj.innerHTML = '1/'+nowPics.length;
    // alert(nowPics[0]);
    // alert(nowPics.length);
	function pre_click(obj)
	{
        if(nowPics.length<1)return false;
        var preValue = obj.getAttribute("value");
        var picObj=document.getElementById("picShow");
        var nextObj = document.getElementById("nextId");
        var navObj = document.getElementById("navShow");
        var pHtml = '';
        if(preValue == 0){
            picObj.setAttribute("src",nowPics[nowPics.length-1]);
            obj.setAttribute("value",nowPics.length-1);
            nextObj.setAttribute("value",nowPics.length);
            pHtml = nowPics.length+"/"+nowPics.length;
            // alert("左边没有了");
        }else{
            var nowValue = parseInt(preValue)-1;
            obj.setAttribute("value",nowValue);
            picObj.setAttribute("src",nowPics[nowValue]);
            nextObj.setAttribute("value",preValue);
            pHtml = preValue+"/"+nowPics.length;
        }
        navObj.innerHTML = pHtml;
	}

	function next_click(obj)
	{
        if(nowPics.length<1)return false;
        var nextValue = obj.getAttribute("value");
        var picObj=document.getElementById("picShow");
        var preObj = document.getElementById("preId");
        var navObj = document.getElementById("navShow");
        var pHtml = '';
        if(nextValue > nowPics.length-1){
            picObj.setAttribute("src",nowPics[0]);
            preObj.setAttribute("value",'0');
            obj.setAttribute("value",'1');
            pHtml = "1/"+nowPics.length;
        }else{
            var nowValue = parseInt(nextValue)+1;
            obj.setAttribute("value",nowValue);
            picObj.setAttribute("src",nowPics[nextValue]);
            preObj.setAttribute("value",nextValue);
            pHtml = nowValue+"/"+nowPics.length;
        }
         navObj.innerHTML = pHtml;
	}
    // 点击recomand
	function pic_click(obj)
	{
        var id = obj.getAttribute("value");
        var data={
            id: id
        };
        // alert(JSON.stringify(data));
        $.ajax({
            url: '/api/pictureDetail',
            type: 'post',
            dataType:'json',
            data: data,
            success: function (data) {
                 // alert(JSON.parse(data.picture));
                nowPics = JSON.parse(data.picture);
                var preObj = document.getElementById("preId");
                var picObj=document.getElementById("picShow");
                var nextObj = document.getElementById("nextId");
                var titObj = document.getElementById("picTitle");
                var navObj = document.getElementById("navShow");
                var pHtml = "1/"+nowPics.length;
                preObj.setAttribute("value",'0');
                nextObj.setAttribute("value",'1');
                picObj.setAttribute("src",nowPics[0]);
                navObj.innerHTML = pHtml;
                titObj.innerHTML = data.name;
            },
            error: function(data) {
                alert("Sorry error");
            }
        });

	}
    // get more recommend pictures
	function more_click()
	{
        page = parseInt(page)+1;
        var data={
            page: page
        };
        // alert(JSON.stringify(data));
        $.ajax({
            url: '/api/pictureRecommend',
            type: 'post',
            dataType:'json',
            data: data,
            success: function (data) {
                // alert(data.length);
                // alert(JSON.stringify(data));
                var midObj = document.getElementById("midShow");
                var html = '';
                for (var i = 0; i < data.length; i++) {
                   html = html+'<a onclick="pic_click(this);" value="'+data[i].id+'" >'+
                   '<div class="pic-show"><img src="/'+data[i].index+'">'+
                   '<div class="title"><h3>'+data[i].name+'</h3></div></div></a>';
                }
                if(data.length < 3){
                    html = html+'<h1 style="margin-top:70px;font-size:24px; text-align:center; color:red"> NO expert more</h1>';
                    page=1;
                }
                midObj.innerHTML = html;
            },
            error: function(data) {
                alert("Sorry error");
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











