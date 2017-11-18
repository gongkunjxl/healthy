<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="content-search">
    <form class="layui-form search-form" action="">
            <input class="search-input" type="text" name="title" autocomplete="off" placeholder="请输入您要搜索的关键词" />

            <div style="height: 15px"></div>

            <div class="layui-form-item">
                <div class="layui-inline">
                    <div class="layui-input-inline"  style="width: 120px;">
                        <select name="modules" lay-verify="required" lay-search="">
                            <option value="">主题</option>
                            <option value="1">layer</option>
                        </select>
                    </div>
                </div>
                <div class="layui-inline">
                    <div class="layui-input-inline search-form-item"  style="width: 120px; margin-left: 20px;">
                        <select name="modules" lay-verify="required" lay-search="">
                            <option value="">类型</option>
                            <option value="1">layer</option>
                        </select>
                    </div>
                </div>
                <div class="layui-inline">
                    <div class="layui-input-inline" style="width: 120px; margin-left: 20px;">
                        <select name="modules" lay-verify="required" lay-search="">
                            <option value="">语言</option>
                            <option value="1">layer</option>
                        </select>
                    </div>
                </div>
                <div class="layui-inline">
                    <div class="layui-input-inline" style="width: 120px; margin-left: 20px;">
                        <select name="modules" lay-verify="required" lay-search="">
                            <option value="">制作省市</option>
                            <option value="1">layer</option>
                        </select>
                    </div>
                </div>
                <div class="layui-inline">
                    <div class="layui-input-inline" style="width: 120px; margin-left: 20px;">
                        <button class="layui-icon" style="width: 115px; height: 38px;" lay-submit="" lay-filter="search">&#xe615; 搜索</button>
                    </div>
                </div>
            </div>
    </form>
</div>  
<div class="layui-container">
    <div class="layui-row">
    	<!-- 左边 -->
    	<div class="layui-col-md2" style="height: auto; padding: 1px;">
    		<div class="quick-nav" style="width: 90%">
	    		<div class="quick-nav-title">
			    		<p>&nbsp;&nbsp;快速导航</p>
			    </div>
			    <div class="site-tree">
			    	<div class="site-tree-item">
			    		<label>慢性疾病</label>
			    		<ul>
			    			<li style="width: 40%;float: left;"><a href="#">高血脂</a></li>
			    			<li><a href="#">脑卒中</a></li>
			    			<li><a href="#">高血压</a></li>
			    			<li><a href="#">糖尿病</a></li>
			    			<li><a href="#">心梗</a></li>
			    		</ul>
			    	</div>
			    	<div class="site-tree-item">
			    		<label>健康生活方式</label>
			    		<ul>
			    			<li><a href="#">情绪管理</a></li>
			    			<li><a href="#">智慧选择</a></li>
			    			<li><a href="#">吃动平衡</a></li>
			    			<li><a href="#">膳食平衡</a></li>
			    		</ul>
			    	</div>
			    	<div class="site-tree-item">
			    		<label>科普专家库</label>
			    		<ul>
			    			<li><a href="#">加入我们</a></li>		
			    		</ul>
			    	</div>
			    </div>
		    </div>
		</div>

		<!-- 中间 -->
		<div class="layui-col-md8" style="height:auto; overflow:hidden;background-color: #E0FFFF; min-height: 630px;">
			<div style="margin-left: 1px;">
				<div style="width: 100%;text-align: center;">
					<div style="width: 18%;height: 50px; margin: 5px;">
						<img src="static/images/image2.png" style="width: 100%;" />
						<p><a href="#">作者及文章简介</a></p>
					</div>
					<div style="width: 79%;height:100%;text-align: center;" >
						<p style="font-size: 18px;text-align: center;height:100%;line-height:0px;"><b>文章标题</b></p>
					</div>
				</div>
			  	<div style="background-color: #FFFFFF; margin: 5px;border-color:#E8E8E8;margin-top: 40px;">
					<p style="font-size: 16px;text-align: center; width:100%;height: 100%;line-height:40px;height: 520px;overflow:scroll;">package com.github.prontera.controller;

import com.github.prontera.Delay;
import com.github.prontera.RandomlyThrowsException;
import com.github.prontera.domain.ProductStockTcc;
import com.github.prontera.model.Participant;
import com.github.prontera.model.request.StockReservationRequest;
import com.github.prontera.model.response.ReservationResponse;
import com.github.prontera.service.ProductStockTccService;
import io.swagger.annotations.ApiOperation;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.beans.factory.annotation.Value;
import org.springframework.http.HttpStatus;
import org.springframework.http.MediaType;
import org.springframework.validation.BindingResult;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.bind.annotation.ResponseStatus;
import org.springframework.web.bind.annotation.RestController;

import javax.validation.Valid;
import java.time.OffsetDateTime;

/**
 * @author Zhao Junjian
 */
@RestController
@RequestMapping(value = ProductStockReservationController.API_PREFIX, produces = {MediaType.APPLICATION_JSON_UTF8_VALUE}, consumes = {MediaType.APPLICATION_JSON_UTF8_VALUE})
public class ProductStockReservationController {

    private static final String RESERVATION_URI = "/stocks/reservation";
    public static final String API_PREFIX = "/api/v1";

    @Value("${spring.application.name}")
    private String applicationName;
    @Autowired
    private ProductStockTccService tccService;

    @Delay
    @RandomlyThrowsException
    @ApiOperation(value = "预留库存", notes = "")
    @RequestMapping(value = RESERVATION_URI, method = RequestMethod.POST)
    public ReservationResponse reserve(@Valid @RequestBody StockReservationRequest request, BindingResult error) {
        final ProductStockTcc stockTcc = tccService.trying(request.getProductId());
        final Long tccId = stockTcc.getId();
        final OffsetDateTime expireTime = stockTcc.getExpireTime();
        final Participant participant = new Participant("http://" + applicationName + API_PREFIX + RESERVATION_URI + "/" + tccId, expireTime);
        return new ReservationResponse(participant);
    }

    @Delay
    @RandomlyThrowsException
    @ApiOperation(value = "确认预留库存", notes = "")
    @ResponseStatus(HttpStatus.NO_CONTENT)
    @RequestMapping(value = RESERVATION_URI + "/{reservationId}", method = RequestMethod.PUT)
    public void confirm(@PathVariable Long reservationId) {
        tccService.confirmReservation(reservationId);
    }

    @Delay
    @RandomlyThrowsException
    @ApiOperation(value = "撤销预留库存", notes = "")
    @ResponseStatus(HttpStatus.NO_CONTENT)
    @RequestMapping(value = RESERVATION_URI + "/{reservationId}", method = RequestMethod.DELETE)
    public void cancel(@PathVariable Long reservationId) {
        tccService.cancelReservation(reservationId);
    }

}
</p>
				</div>
			</div>
	  	</div>

	  	<!-- 右边登录-->
	  	<div class="layui-col-md2" style="height: 630px; padding: 1px; overflow:scroll;">
	  		<div style="width: 100%;margin-left: 1px; height: 100%;background-color: #E0EEEE;">
	  			<ul>
			    	<img src="static/images/image2.png" style="width: 30%;height: 40px;margin: 5px;" />
			    	<a href="#">文章1</a>
			    </ul>
	  		</div>  
		    
	  	</div>

    </div>
</div>
<script>

$(function(){
     $(".quick-detail-item").onmouseover(function() {    // 单击div元素
         $(this).find('.clarity').css('height','100%');    // 使用children('li')获取div下的li元素，然后设置颜色为red即红色
     });

     $(".quick-detail-item").onmouseleave(function() {    // 单击div元素
         $(this).find('.clarity').css('height','22%');    // 使用children('li')获取div下的li元素，然后设置颜色为red即红色
     });
 });
function addHeight(obj){
	$(obj).find('.clarity').addClass('after-clarity');
	$(obj).find('.clarity').removeClass('clarity');
	$($(obj).find('.after-clarity').children()[0]).hide();
	$($(obj).find('.after-clarity').children()[1]).show();

}

function decreaseHeight(obj){
	$(obj).find('.after-clarity').addClass('clarity');
	$(obj).find('.after-clarity').removeClass('after-clarity');
	$($(obj).find('.clarity').children()[1]).hide();
	$($(obj).find('.clarity').children()[0]).show();
}

//一般直接写在一个js文件中
layui.use(['layer', 'form'], function(){
  var layer = layui.layer
  ,form = layui.form;
 
});
</script> 