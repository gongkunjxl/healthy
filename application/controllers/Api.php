<?php
defined('BASEPATH') OR exit('No direct script access allowed');
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








