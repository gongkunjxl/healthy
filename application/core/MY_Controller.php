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
  // 短信验证
  public $smsKeyId = "LTAI9M8T8TBHLxH4";
  public $smsKeySecret = "50Gk84Q42Pr6AcBmeG7D13faZMWXuv";
  public $smsSignName = "心事网";
  public $smsTemplate = "SMS_102295009";

	public $per_page = '10'; 
	public $api_url = '';
  public $code_vaild='-30 minute'; //验证码有效时间

  //mysql table
  public $user_table = 'hea_user';
  public $code_table = 'hea_code';
  public $expert_table = 'hea_expert';
    
    public function __construct() {
        parent::__construct();
        // $this->per_page = $this->config->item('per_page');
        // 加载model和其他类库
       	$this->load->helper(array('form', 'url'));
       	$this->load->model(array('Common','SmsDemo'));
        $this->load->library('session');
       	$this->api_url = base_url();
       	$this->load->database();
		
     }

     //other global functions
	
}
?>













