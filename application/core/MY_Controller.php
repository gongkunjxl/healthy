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
  public $smsKeyId = "rr1dgd1Wgxph5bRq";
  public $smsKeySecret = "7rhZmvfWNhhZkB5R3hF4TOPxZfAdfM";
  public $smsSignName = "健康科普资源库";
  public $smsTemplate = "SMS_116567263";

	public $per_page = '10'; 
  public $rem_page = '6';  //推荐的文章加载数量
  public $exp_page = '12';  //专家数量
  public $back_page = '30';
	public $api_url = '';
  public $code_vaild='-30 minute'; //验证码有效时间

  //mysql table
  public $user_table = 'hea_user';
  public $code_table = 'hea_code';
  public $admin_table = 'hea_admin';
  public $expert_table = 'hea_expert';
  public $article_table = 'hea_article';
  public $type_table = 'hea_type';
  public $picture_table = 'hea_picture';
    
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













