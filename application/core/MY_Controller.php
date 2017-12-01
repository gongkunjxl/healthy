<?php
/*
*
* 作者：杨国良
*
* 创建日期：2015年10月4日10:45:12
*
* 目的：超类，公共方法
*
* TODO：集成一些常用方法
*
*/
if (!defined('BASEPATH'))exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	//此处定义全局变量 
	public $per_page = '10'; 
    
    public function __construct() {
        parent::__construct();
        // $this->per_page = $this->config->item('per_page');
        // 加载model和其他类库
       	$this->load->helper('url_helper');
        // $this->load->model(array("Common","Quguoren"));
		
     }
	
	
}
?>