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

	//global variables
	public $per_page = '10'; 
	public $api_url = '';
    
    public function __construct() {
        parent::__construct();
        // $this->per_page = $this->config->item('per_page');
        // 加载model和其他类库
       	$this->load->helper(array('form', 'url'));
       	$this->load->model('Common');
       	$this->api_url = base_url();
        // $this->load->model(array("Common","Quguoren"));
		
     }

     //other global functions
	
}
?>