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
        $start=intval($page-1)*intval($this->per_page);
        $orderby='ctime';
        $order_type='desc';
        $select_field='*';
        $data=$this->Common->get_limit_order( $this->expert_table,$where,$start,$this->per_page,$orderby,$order_type,$select_field,'');
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




    /*
      *以下部分是后台的API函数  by gongkun
    */
    public function userTable($page=1)
    {
        if($_POST){
            $postinfo= $this->Common->html_filter_array($_POST);
            $page = $postinfo['page'];
        }
        $where=array();
        $start=intval($page-1)*intval($this->per_page);
        $orderby='ctime';
        $order_type='desc';
        $select_field='*';
        $data=$this->Common->get_limit_order( $this->user_table,$where,$start,$this->per_page,$orderby,$order_type,$select_field,'');
        // $re_data['data']=$data;
        //$re_data['status'] = '200';
        echo json_encode($data);
    }

     /*
     *  update user info by gongkun 
    */
    public function updateUserInfo()
    {
        if($_POST){
            $re_data['status'] = 100;
            $postinfo= $this->Common->html_filter_array($_POST);
            $where=array('id' => $postinfo['id']);
            $data=array('username' => $postinfo['username'],'nickname' => $postinfo['nickname'],'password' => $postinfo['password']);

            $rep=$this->Common->update($this->user_table,$where,$data);
            if($rep>0){
                $re_data['status'] =200;
            }
            echo json_encode($re_data);
        }
    }
    
    /*
      *expert table list by gongkun
    */
    public function expertTable($page=1)
    {
        if($_POST){
            $postinfo= $this->Common->html_filter_array($_POST);
            $page = $postinfo['page'];
        }
        $where=array();
        $start=intval($page-1)*intval($this->per_page);
        $orderby='ctime';
        $order_type='desc';
        $select_field='id,name,sex,nation,school,title,major,record,address,ctime';
        $data=$this->Common->get_limit_order( $this->expert_table,$where,$start,$this->per_page,$orderby,$order_type,$select_field);
        
        echo json_encode($data);
    }
     /*
     *  update expert info by gongkun 
    */
    public function updateExpertInfo()
    {
        if($_POST){
            $re_data['status'] = 100;
            $postinfo= $this->Common->html_filter_array($_POST);
            $where=array('id' => $postinfo['id']);

            $data=array(
                    'name' => $postinfo['name'],'sex' => $postinfo['sex'],'nation' => $postinfo['nation'],
                    'school' => $postinfo['school'],'title' => $postinfo['title'],'major' => $postinfo['major'],
                    'record' => $postinfo['record'],'address' => $postinfo['address'],'introduce' => $postinfo['introduce'],
                    'study' => $postinfo['study'],'education' => $postinfo['education'],'work' => $postinfo['work']
            );
            $rep=$this->Common->update($this->expert_table,$where,$data);
            if($rep>0){
                $re_data['status'] =200;
            }
            echo json_encode($re_data);
        }
    }
     /*
     *  Add  a new expert by gongkun 
    */
    public function addNewExpert()
    {
        if($_POST){
            $re_data['status'] = 100;
            $postinfo= $this->Common->html_filter_array($_POST);
            $ctime = time();
            $header = "header.jpg";
            $data=array(
                    'name' => $postinfo['name'],'sex' => $postinfo['sex'],'nation' => $postinfo['nation'],
                    'school' => $postinfo['school'],'title' => $postinfo['title'],'major' => $postinfo['major'],
                    'record' => $postinfo['record'],'address' => $postinfo['address'],'introduce' => $postinfo['introduce'],
                    'study' => $postinfo['study'],'education' => $postinfo['education'],'work' => $postinfo['work'],
                    'header' => $header,'ctime' => $ctime
            );
            $rep = $this->Common->add($this->expert_table,$data);
            if($rep>0){
                //如果已经上传了临时头像 需要更名头像
                if(file_exists("header/tmp_header.jpg")){
                    $header = "header_".$rep.".jpg";
                    rename("header/tmp_header.jpg", "header/".$header);
                }
                if(file_exists("header/tmp_header.png")){
                    $header = "header_".$rep.".png";
                    rename("header/tmp_header.png", "header/".$header);
                }  
                if(file_exists("header/tmp_header.jpeg")){
                    $header = "header_".$rep.".jpeg";
                    rename("header/tmp_header.jpeg", "header/".$header);
                }
                if($header != "header.jpg"){
                    $where=array('id' => $rep);
                    $up_data = array('header' => $header);
                    $this->Common->update($expert_table,$where,$up_data);
                }
                $re_data['status'] =200;
                $re_data['id'] = $rep;
            }
            echo json_encode($re_data);
        }
    }
    /*
     * upload expert header image by gongkun
    */
    public function uploadHeader()
    {
        $return=array();
        $postinfo= $this->Common->html_filter_array($_POST);
        if ($_FILES["file"]["error"] > 0) {
            $return['status']=$_FILES["file"]["error"];
        } else {           
            $fillname = $_FILES['file']['name']; // 得到文件全名
            $dotArray = explode('.', $fillname); // 以.分割字符串，得到数组
            $type = end($dotArray); // 得到最后一个元素：文件后缀
            if($postinfo['name'] == "tmp_header"){
                $path = "header/".$postinfo['name'].".".$type;

            }else{
                $path = "header/header_".$postinfo['name'].".".$type; // 产生随机唯一的名字
            }
            move_uploaded_file($_FILES["file"]["tmp_name"],$path);
            //将文件存入数据库
            if($postinfo['name'] != "tmp_header"){
                $header = "header_".$postinfo['name'].".".$type;
                $where=array('id' => $postinfo['name']);
                $data = array('header' => $header);
                $rep = $this->Common->update($this->expert_table,$where,$data);
                if($rep>0){
                     $return['status']=200;
                }
            }else{
                $return['status']=200;
            }
        } 
        // $return['postinfo'] = $postinfo;
        echo json_encode($return);
    }
    


}

























