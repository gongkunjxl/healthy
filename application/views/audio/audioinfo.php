<link rel="stylesheet" type="text/css" href="/static/audio/plugin/css/style.css">
<link rel="stylesheet" type="text/css" href="/static/audio/detail/css/audio-info.css">
<script type="text/javascript" src="/static/audio/plugin/jquery-jplayer/jquery.jplayer.js"></script>
<script type="text/javascript" src="/static/audio/plugin/ttw-music-player.js"></script>
<script type="text/javascript" src="/static/audio/detail/js/myplaylist.js"></script>

<script type="text/javascript">
        $(document).ready(function(){
            var description = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce id tortor nisi. Aenean sodales diam ac lacus elementum scelerisque. Suspendisse a dui vitae lacus faucibus venenatis vel id nisl. Proin orci ante, ultricies nec interdum at, iaculis venenatis nulla. ';
            $('#audio-player').ttwMusicPlayer(myPlaylist, {
                autoPlay:false, 
                description:description,
                jPlayer:{
                    swfPath:'/static/audio/plugin/jquery-jplayer' //You need to override the default swf path any time the directory structure changes
                }
            });
            
        });


</script>
<div class="layui-container" style="background: #444 url(/static/audio/detail/images/bg.jpg) ;height: 700px;margin-top: 0px;margin-bottom: 0px; ">
    <div id="audio-player" style="padding-top: 100px;padding-bottom: 100px;"></div>    
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