<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
    <div class="layui-layout layui-layout-admin" style="border-bottom: solid 2px #009ACD ">
      <div class="layui-header header header-demo" style="height: 70px; background-color: #f0f8ff">
        <div class="layui-main" >
          <div class="admin-login-box">
            <a class="logo" style="left: 0;" href="#">
              <span style="font-size: 20px; color: #009ACD">健康网站管理系统</span>
            </a>
            <div class="admin-side-toggle" style="background-color: #009ACD;">
              <i class="fa fa-bars" aria-hidden="true"></i>
            </div>
            <div class="admin-side-full" style="background-color: #009ACD;">
              <i class="fa fa-life-bouy" aria-hidden="true"></i>
            </div>
          </div>
          <ul class="layui-nav admin-header-item">
            <!-- <li class="layui-nav-item" id="pay">
                <a href="javascript:;">捐赠我</a>
            </li> -->
           <!--  <li class="layui-nav-item">
              <a href="javascript:;">清除缓存</a>
            </li>
            <li class="layui-nav-item" id="pay">
                <a href="javascript:;">捐赠我</a>
            </li>
            <li class="layui-nav-item">
              <a href="javascript:;">浏览网站</a>
            </li>
            <li class="layui-nav-item" id="video1">
              <a href="javascript:;">视频</a>
            </li> -->
            <li class="layui-nav-item" style="margin-right: 150px; ">
              <a href="javascript:;" class="admin-header-user">
                <img src="/backend/images/0.jpg" />
                <span style="margin-left: 10px;">beginner</span>
              </a>
              <dl class="layui-nav-child">
                <!-- <dd>
                  <a href="javascript:;"><i class="fa fa-user-circle" aria-hidden="true"></i> 个人信息</a>
                </dd>
                <dd>
                  <a href="javascript:;"><i class="fa fa-gear" aria-hidden="true"></i> 设置</a>
                </dd> -->
                <dd >
                  <a href="#">
                    <i class="fa fa-lock" aria-hidden="true" style="padding-right: 3px;padding-left: 1px;"></i> 锁屏 (Alt+L)
                  </a>
                </dd>
                <dd>
                  <a href="/backend/logout"><i class="fa fa-sign-out" aria-hidden="true"></i> 注销</a>
                </dd>
              </dl>
            </li>
          </ul>
        </div>
      </div>

      <!-- left side -->
      <div class="layui-side layui-bg-black" id="admin-side">
        <div class="layui-side-scroll" id="admin-navbar-side" style="margin-top: 40px;" lay-filter="side"></div>
      </div>

      <!-- menu content -->
      <div class="layui-body" style="bottom: 0;border-left: solid 2px #009ACD;" id="admin-body">
        <div class="layui-tab admin-nav-card layui-tab-brief" lay-filter="admin-tab">
          <ul class="layui-tab-title">
            <li class="layui-this">
              <i class="fa fa-dashboard" aria-hidden="true"></i>
              <cite>content</cite>
            </li>
          </ul>
          <div class="layui-tab-content" style="min-height: 150px; padding: 5px 0 0 0;">
            <div class="layui-tab-item layui-show">
              <iframe src="/backend/main"></iframe>
            </div>
          </div>
        </div>
      </div>

      <!-- copyright -->
      <div class="layui-footer footer footer-demo" id="admin-footer">
        <div class="layui-main">
          <p>2017 &copy;
            copyright by 科学健康管理公司
          </p>
        </div>
      </div>


</div>


    <!--   <div class="site-tree-mobile layui-hide">
        <i class="layui-icon">&#xe602;</i>
      </div>
      <div class="site-mobile-shade"></div>
       -->
      <!--锁屏模板 start-->
    <!--   <script type="text/template" id="lock-temp">
        <div class="admin-header-lock" id="lock-box">
          <div class="admin-header-lock-img">
            <img src="/backend/images/0.jpg"/>
          </div>
          <div class="admin-header-lock-name" id="lockUserName">beginner</div>
          <input type="text" class="admin-header-lock-input" value="输入密码解锁.." name="lockPwd" id="lockPwd" />
          <button class="layui-btn layui-btn-small" id="unlock">解锁</button>
        </div>
      </script> -->
      <!--锁屏模板 end -->
      
     <!--  <script type="text/javascript" src="/backend/plugins/layui/layui.js"></script>
      <script type="text/javascript" src="/backend/datas/nav.js"></script>
      <script src="/backend/js/index.js"></script>
      <script>
        layui.use('layer', function() {
          var $ = layui.jquery,
            layer = layui.layer;

          $('#video1').on('click', function() {
            layer.open({
              title: 'YouTube',
              maxmin: true,
              type: 2,
              content: 'video.html',
              area: ['800px', '500px']
            });
                    });
                    $('#pay').on('click', function () {
                        layer.open({
                            title: false,
                            type: 1,
                            content: '<img src="images/xx.png" />',
                            area: ['500px', '250px'],
                            shadeClose: true
                        });
                    });
        });
      </script> -->


