 <?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head lang="en">
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="/static/audio2/css/index.css">
<script type="text/javascript" src="/static/audio2/js/jquery-1.11.2.js"></script>
<script type="text/javascript" src="/static/audio2/js/index.js"></script>
</head>
<body>
<script type="text/javascript">
 var songsList = [];
 var song = {
        "musicURL":'/static/audio/detail/mix/1.mp3',
        "oga":'/static/audio/detail/mix/1.ogg',
        "title":"<?php echo $data['name']; ?>",
        "artist":"<?php echo $data['author']; ?>",
        "rating":4,
        "reader":'#',
        "num": "<?php echo $data['listen_num']; ?>",
        "duration":'0:30',
        "coverURL":'/static/audio/detail/mix/1.png',
        "description": "<?php echo $data['description']; ?>"
 };
 songsList.push(song);

 $(document).ready(function(){
    
    if(!window.localStorage){
    	
    } else{
    	var storage=window.localStorage;
    	var songsList1 = storage.getItem("audios");
    	if (songsList1==undefined||songsList1=="") {
    		songsList1 = [];
    	}else{
            songsList1 = JSON.parse(songsList1)
        }
        songsList.push(songsList1);
    	songsList1.push(song);
    	storage.setItem("audios",JSON.stringify(songsList1))
    } 

})
</script>

<audio id="myAudio" preload="auto">
	
</audio>
<div id="cdPlayer">
	<div id="myConsole">曲名</div>
	<div id="CD">
		<div id="cdDisk"></div>
		<div id="cdCover"></div>
	</div>
	<div id="cdControllerArm"></div>
	<div id="playMode">
		<div id="shuffleMode" class="mode" title="随机播放"><i class="iconfontPlayMode">&#xe85e;</i>&nbsp;</div>
		<div id="listMode" class="mode" title="顺序播放"><i class="iconfontPlayMode">&#xe7ec;</i>&nbsp;</div>
		<div id="loopMode" class="mode" title="单曲循环"><i class="iconfontPlayMode">&#xe7df;</i>&nbsp;</div>
	</div>
	<div id="controllerButton">
		<div id="playBtn" class="button" title="播放"><i class="iconfont">&#xe830;</i>&nbsp;</div>
		<div id="pauseBtn" class="button" title="暂停"><i class="iconfont">&#xe81f;</i>&nbsp;</div>
		<div id="nextBtn" class="button" title="下一曲"><i class="iconfont">&#xe811;</i>&nbsp;</div>
		<div id="preBtn" class="button" title="上一曲"><i class="iconfont">&#xe826;</i>&nbsp;</div>
		<div id="stopBtn" class="button" title="停止"><i class="iconfont">&#xe875;</i>&nbsp;</div>
		<div id="muteBtn" class="button" title="静音"><i class="iconfont">&#xe8b1;</i>&nbsp;</div>
		<div id="firstBtn" class="button" title="首曲"><i class="iconfont">&#xe787;</i>&nbsp;</div>
		<div id="lastBtn" class="button" title="末曲"><i class="iconfont">&#xe7cc;</i>&nbsp;</div>
	</div>
</div>

<div style="text-align:center;margin:50px 0; font:normal 14px/24px 'MicroSoft YaHei';color:#ffffff">
</div>
</body>
</html>