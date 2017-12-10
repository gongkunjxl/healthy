<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Shanghai");
// handle the ajax request
class Api extends MY_Controller {

	public function __construct() {
        parent::__construct();
    }

    // test ajax get the server data
    public function ajaxDemo()
    {
    	$postdata = $this->Common->html_filter_array($_REQUEST);
    	$data['status']=100;
    	$data['help']="test";
    	$data['postdata'] = $postdata;

    	echo json_encode($data);
    }

    // verify phone number registered
    public function veryPhone()
    {
        $postdata = $this->Common->html_filter_array($_REQUEST);
        $where = array('username' => $postdata['phoneNum']);
        $ret_count=$this->Common->get_count($this->user_table,$where);
        if($ret_count<1){
            $data['status']=200;
        }else{
            $data['status']=100;
        }
        echo  json_encode($data);
    }

    /*
        * get verify code by gongkun
    */
    public function getVeryCode()
    {
        $postdata = $this->Common->html_filter_array($_REQUEST);
        $data['status']=100;
        // 产生四位验证码
        $authnum='';
        $ychar = "0,1,2,3,4,6,7,8,9";  
        $list = explode(",",$ychar);  
        for($i=0; $i<4; $i++)
        {  
            $randnum = mt_rand( 0,8 );                            
            $authnum .= $list[$randnum];  
        }
        $this->SmsDemo->initParm($this->smsKeyId,$this->smsKeySecret);
        //调用发送函数
        $response = $this->SmsDemo->sendSms(
            $this->smsSignName,     // 短信签名
            $this->smsTemplate,      // 短信模板编号
            $postdata['phoneNum'],   // 短信接收者
            Array(     // 短信模板中字段的值
                    "code"=> $authnum,
                    "product"=>"xinshiwang"
            ),
            "123"
        );
        if($response->Code == "OK"){
            $time = time();
            $add_data=array('phone' => $postdata['phoneNum'],'code'=> $authnum,'ctime' => $time);
            $rep=$this->Common->add($this->code_table,$add_data);
            if($rep>0){
                $data['status']=200;
            }
        }
        echo json_encode($data);
    }

    /*
        *check verify code 5minutes by gongkun
    */
    public function checkVercode()
    {
        $postdata = $this->Common->html_filter_array($_REQUEST);
        $data['status']=100;
        $where=array('phone' => $postdata['phoneNum'],'code' => $postdata['verCode']);
        $select_field='id,ctime';
        $ret=$this->Common->get_one($this->code_table,$where,$select_field);
        if(count($ret)>0){
            $now=strtotime($this->code_vaild);
            if($ret['ctime'] > $now){
                $data['status']=200;
            }
        }
        echo json_encode($data);
    }

    /*
     *  get the expert
    */
    public function expert($page=1)
    {
        $page=$page;
        if($_POST){
            $postinfo= $this->Common->html_filter_array($_POST);
            $page = $postinfo['page'];
        }
        $where=array();
        $start=intval($page-1)*10;
        $orderby='ctime';
        $order_type='desc';
        $data=$this->Common->get_limit_order( $this->expert_table,$where,$start,$this->per_page,$orderby,$order_type);
        $re_data['data']=$data;
        echo json_encode($re_data);
    }


    // upload mutiple picture
    public function uploadMutiPic()
    {
    	header('Content-type: text/json; charset=UTF-8' );
    	$return=array();
    	
    	if ($_FILES["file"]["error"] > 0) {
       			$return['status']=$_FILES["file"]["error"];
		} else {           
		    $fillname = $_FILES['file']['name']; // 得到文件全名
		    $dotArray = explode('.', $fillname); // 以.分割字符串，得到数组
		    $type = end($dotArray); // 得到最后一个元素：文件后缀
		    $path = "upload/".md5(uniqid(rand())).".".$type; // 产生随机唯一的名字
		    move_uploaded_file($_FILES["file"]["tmp_name"],$path);
		    $return['status']=1;
		} 
		echo json_encode($return);
	}
}










