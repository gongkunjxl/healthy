<?php
/*
*
* 作者：gongkun
*
* 创建日期：2017年12月1日
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

  //mysql table
  public $user_table = 'hea_user';
    
    public function __construct() {
        parent::__construct();
        // $this->per_page = $this->config->item('per_page');
        // 加载model和其他类库
       	$this->load->helper(array('form', 'url'));
       	$this->load->model(array('Common','SmsDemo'));
       	$this->api_url = base_url();
       	$this->load->database();
        // $this->load->model(array("Common","Quguoren"));
		
     }

     //other global functions
	
}
?>













