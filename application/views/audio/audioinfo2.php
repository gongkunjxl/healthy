<link rel="stylesheet" type="text/css" href="/static/audio/plugin/css/style.css">
<link rel="stylesheet" type="text/css" href="/static/audio/detail/css/audio-info.css">
<script type="text/javascript" src="/static/audio/plugin/jquery-jplayer/jquery.jplayer.js"></script>
<script type="text/javascript" src="/static/audio/plugin/ttw-music-player.js"></script>
<script type="text/javascript" src="/static/audio/detail/js/myplaylist.js"></script>

<script type="text/javascript">
        $(document).ready(function(){
            var description = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce id tortor nisi. Aenean sodales diam ac lacus elementum scelerisque. Suspendisse a dui vitae lacus faucibus venenatis vel id nisl. Proin orci ante, ultricies nec interdum at, iaculis venenatis nulla. ';

            var song = [

    {
        mp3:'/static/audio/detail/mix/1.mp3',
        oga:'/static/audio/detail/mix/1.ogg',
        title:"<?php echo $data['name']; ?>",
        artist:"<?php echo $data['author']; ?>",
        rating:4,
        reader:'#',
        num: "<?php echo $data['listen_num']; ?>",
        duration:'0:30',
        cover:'/static/audio/detail/mix/1.png',
        description: "<?php echo $data['description']; ?>"
    }];
    myPlaylist.push(song);

    f(!window.localStorage){
        
    } else{
        var storage=window.localStorage;
        var songsList1 = storage.getItem("myPlaylist");
        if (songsList1==undefined||songsList1=="") {
            songsList1 = [];
        }else{
            songsList1 = JSON.parse(songsList1)
        }
        myPlaylist.push(songsList1);
        songsList1.push(song);
        storage.setItem("myPlaylist",JSON.stringify(songsList1))
    } 

            $('#jquery_jplayer').ttwMusicPlayer(myPlaylist, {
                autoPlay:true, 
                description:description,
                jPlayer:{
                    swfPath:'/static/audio/plugin/jquery-jplayer' //You need to override the default swf path any time the directory structure changes
                }
            });
            
        });


</script>
<div class="layui-container" style="background: #444 url(/static/audio/detail/images/bg.jpg) ;height: 700px;margin-top: 0px;margin-bottom: 0px; ">
    <div id="jquery_jplayer" style="padding-top: 100px;padding-bottom: 100px;"></div>    
</div>

<div class="footer" style="margin-top: 0px;">
    <div class="layui-container">
        <div class="footer-content">
            <ul>
                <li>ICP证粤B2-2000000信用中国</li>
                <li>增值电信业务许可证</li>
                <li>国家网络出版集团</li>
                <li>互联网药品信息服务资格证书</li>
            </ul>
        </div>
        <div class="footer-content">
            <ul>
                <li>国际互联网备案中心</li>
                <li>中国互联网举报中心</li>
                <li>中国互联网信息平台</li>
                <li>互联网药品信息服务资格证书</li>
            </ul>
        </div>
        <div class="footer-content">
            <ul>
                <li>南京医学院</li>
                <li>电话: 1772817181</li>
                <li>地址: 北京市海淀区双清路1号</li>
                <li>技术支持: 中国科工集团</li>
            </ul>
        </div>
    </div>
</div>

</body>
</html>
