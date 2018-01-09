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
     *  get the expert  by gongkun
    */
    public function expertList($page=1)
    {
        $page=$page;
        if($_POST){
            $postinfo= $this->Common->html_filter_array($_POST);
            $page = $postinfo['page'];
        }
        $where=array();
        $start=intval($page-1)*intval($this->exp_page);
        $orderby='ctime';
        $order_type='desc';
        $select_field='id,name,title,address,header';
        $data=$this->Common->get_limit_order( $this->expert_table,$where,$start,$this->exp_page,$orderby,$order_type,$select_field,'');
        echo json_encode($data);
    }
     /*
     *  get the article list by gongkun
    */
    public function articleList($page=1)
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
        $data=$this->Common->get_limit_order( $this->article_table,$where,$start,$this->per_page,$orderby,$order_type,$select_field,'');
        echo json_encode($data);
    }
    /*
     * the recommend articles by gongkun
    */
     public function articleRecommend($page=1)
    {
        $page=$page;
        if($_POST){
            $postinfo= $this->Common->html_filter_array($_POST);
            $page = $postinfo['page'];
        }
        $where=array();
        $start=intval($page-1)*intval($this->rem_page);
        $orderby='ctime';
        $order_type='desc';
        $select_field='*';
        $data=$this->Common->get_limit_order( $this->article_table,$where,$start,$this->rem_page,$orderby,$order_type,$select_field,'');
        echo json_encode($data);
    }
    /*
     * get the picture list by gongkun
    */
    public function pictureList($page=1)
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
        $data=$this->Common->get_limit_order( $this->picture_table,$where,$start,$this->per_page,$orderby,$order_type,$select_field);
        //获取图片的地址 判断是否有index
        if(count($data)>0){
            foreach ($data as $key => $value) {
                $dir = 'picture/'.$value['id'];
                $file_name = '';
                $index_name = '';
                if(is_dir($dir)){
                    if($handle = opendir($dir)){  
                        while (($file = readdir($handle)) !== false ) {  
                            if($file != ".." && $file != "." && $file != ".DS_Store"){  
                                if(empty($file_name)){
                                    $file_name = $file; 
                                }
                                if($file == 'index.jpg'){
                                    $index_name = 'index.jpg';
                                }
                                if($file == 'index.png'){
                                    $index_name = 'index.png';
                                }
                                if($file == 'index.jpeg'){
                                    $index_name = 'index.jpeg';
                                }
                            }  
                        }  
                    }  
                    closedir($handle); 
                }
                if(!empty($index_name)){
                    $data[$key]['index'] = $dir."/".$index_name;
                }else{
                    $data[$key]['index'] = $dir."/".$file_name;
                }
            }
        }
        echo json_encode($data);
    }
    /*
     * get the picture detail info by gongkun
    */
    public function pictureDetail()
    {
        $id=0;
        if($_POST){
            $postinfo= $this->Common->html_filter_array($_POST);
            $id = $postinfo['id'];
        }
        $where = array('id' => $id);
        $data = $this->Common->get_one($this->picture_table,$where);
        $dir = 'picture/'.$data['id'];
        $pic_name = array();
        $i=0;
        if(is_dir($dir)){
            if($handle = opendir($dir)){  
                while (($file = readdir($handle)) !== false ) {  
                    if($file != ".." && $file != "." && $file != ".DS_Store"){  
                        if($file == 'index.jpg'){
                            if($i>0){
                                $tmp_name = $pic_name[0];
                                $pic_name[0] = "/".$dir."/".'index.jpg';
                                $pic_name[$i] = $tmp_name;
                            }else{
                                $pic_name[$i] = "/".$dir."/index.jpg";
                            }
                        }else if($file == 'index.png'){
                            if($i>0){
                                $tmp_name = $pic_name[0];
                                $pic_name[0] = "/".$dir."/".'index.png';
                                $pic_name[$i] = $tmp_name;
                            }else{
                                $pic_name[$i] = "/".$dir."/index.png";
                            }
                        }else if($file == 'index.jpeg'){
                            if($i>0){
                                $tmp_name = $pic_name[0];
                                $pic_name[0] = "/".$dir."/".'index.jpeg';
                                $pic_name[$i] = $tmp_name;
                            }else{
                                $pic_name[$i] = "/".$dir."/index.jpeg";
                            }
                        }else{
                            $pic_name[$i] = "/".$dir."/".$file;
                        }
                        $i=$i+1;
                    }  
                }
            }
           closedir($handle); 
        }
        $re_data['picture'] = json_encode($pic_name);
        $re_data['name'] = $data['name'];
        echo json_encode($re_data);
    }
    /*
     * the recommend pictures by gongkun
    */
    public function pictureRecommend($page=1)
    {
        $page=$page;
        if($_POST){
            $postinfo= $this->Common->html_filter_array($_POST);
            $page = $postinfo['page'];
        }
        $where=array();
        $start=intval($page-1)*intval($this->pic_page);
        $orderby='ctime';
        $order_type='desc';
        $select_field='*';
        $data=$this->Common->get_limit_order($this->picture_table,$where,$start,$this->pic_page,$orderby,$order_type,$select_field);
        //获取图片的地址 判断是否有index
        if(count($data)>0){
            foreach ($data as $key => $value) {
                $dir = 'picture/'.$value['id'];
                $file_name = '';
                $index_name = '';
                if(is_dir($dir)){
                    if($handle = opendir($dir)){  
                        while (($file = readdir($handle)) !== false ) {  
                            if($file != ".." && $file != "." && $file != ".DS_Store"){  
                                if(empty($file_name)){
                                    $file_name = $file; 
                                }
                                if($file == 'index.jpg'){
                                    $index_name = 'index.jpg';
                                }
                                if($file == 'index.png'){
                                    $index_name = 'index.png';
                                }
                                if($file == 'index.jpeg'){
                                    $index_name = 'index.jpeg';
                                }
                            }  
                        }  
                    }  
                    closedir($handle); 
                }
                if(!empty($index_name)){
                    $data[$key]['index'] = $dir."/".$index_name;
                }else{
                    $data[$key]['index'] = $dir."/".$file_name;
                }
            }
        }
        echo json_encode($data);
    }
      /*
     *  get the video list by gongkun
    */
    public function videoList($page=1)
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
        $select_field='id,name,author,title,read,ctime,covAddr';
        $data=$this->Common->get_limit_order( $this->video_table,$where,$start,$this->per_page,$orderby,$order_type,$select_field,'');
        echo json_encode($data);
    }
    /*
     * the recommend video by gongkun
    */
    public function videoRecommend($page=1)
    {
        $page=$page;
        if($_POST){
            $postinfo= $this->Common->html_filter_array($_POST);
            $page = $postinfo['page'];
        }
        $where=array();
        $start=intval($page-1)*intval($this->rem_page);
        $orderby='ctime';
        $order_type='desc';
        $select_field='*';
        $data=$this->Common->get_limit_order( $this->video_table,$where,$start,$this->rem_page,$orderby,$order_type,$select_field,'');
        echo json_encode($data);
    }
    /*
     * video play by gongkun(update read)
    */
    public function videoPlay($id=0)
    {
        $id = $id;
        if($_POST){
            $postinfo = $this->Common->html_filter_array($_POST);
            $id = $postinfo['id'];
        }
        $where = array('id' => $id);
        $data = $this->Common->get_one($this->video_table,$where);
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
     /*
      *专家自己更新信息  by gongkun
    */
    public function expertUpdateInfo()
    {
        if($_POST){
            $re_data['status'] = 100;
            $postinfo= $this->Common->html_filter_array($_POST);
            $ctime = time();
            $data=array(
                    'name' => $postinfo['name'],'sex' => $postinfo['sex'],'nation' => $postinfo['nation'],
                    'school' => $postinfo['school'],'title' => $postinfo['title'],'major' => $postinfo['major'],
                    'record' => $postinfo['record'],'address' => $postinfo['address'],'introduce' => $postinfo['introduce'],
                    'study' => $postinfo['study'],'education' => $postinfo['education'],'work' => $postinfo['work'],'ctime' => $ctime
            );
            $where = array('id' => $postinfo['id']);
            $rep = $this->Common->update($this->expert_table,$where,$data);
            if($rep>0){
                $user_where = array('username' => $postinfo['username']);
                $user_data = array('password' => $postinfo['password']);
                $user_rep = $this->Common->update($this->user_table,$user_where,$user_data);

                $re_data['status'] =200;
            }
            echo json_encode($re_data);
        }
    }

    /*
     * get signature by gongkun valid one day
    */
    public function getSignature()
    {
        if($_POST){
            $re_data['status'] = 100;
            $postinfo= $this->Common->html_filter_array($_POST);
            if($postinfo['action'] == 'signature'){
                $where = array('id' => '1');
                $rep_data = $this->Common->get_one($this->sig_table,$where);
                $current = time();
                $old_time = intval($rep_data['ctime'])+intval($this->secretVaile);
                //expired
                if($current > $old_time){ 
                    $expired = $current + intval($this->secretVaile)+400;
                    $arg_list = array(
                    "secretId" => $this->secretId,
                    "currentTimeStamp" => $current,
                    "expireTime" => $expired,
                    "random" => rand()
                    );
                    $orignal = http_build_query($arg_list);
                    $signature = base64_encode(hash_hmac('SHA1', $orignal, $this->secretKey, true).$orignal);
                    $up_data = array('signature' => $signature,'ctime' => $current);
                    $rep = $this->Common->update($this->sig_table,$where,$up_data);
                    if($rep>0){
                        $re_data['status'] = 200;
                        $re_data['signature'] = $signature;
                    }
                }else{
                    $re_data['status'] = 200;
                    $re_data['signature'] = $rep_data['signature'];
                }
            }
            echo  json_encode($re_data);
        }
    }
    /*
     * search the index page
    */
    public function searchIndex()
    {
        if($_POST){
            $re_data['status'] = 100;
            $postinfo= $this->Common->html_filter_array($_POST);

            $re_data['status'] = 200;
            // $re_data['data'] = $postinfo;
            echo  json_encode($re_data);
        }
    }



    /*************  以下部分是后台的API函数  by gongkun **************/

    /*
     * update admin info by gongkun
    */
    public function updateAdminInfo()
    {
        if($_POST){
            $re_data['status'] = 100;
            $postinfo= $this->Common->html_filter_array($_POST);
            $where=array('id' => $postinfo['adminId']);
            $data=array('username' => $postinfo['adminName'],'password' => $postinfo['adminPassword']);
            $rep=$this->Common->update($this->admin_table,$where,$data);
            if($rep>0){
                $re_data['status'] =200;
            }
            echo json_encode($re_data);
        }
    }
    /*
     * user table info by gongkun
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
        $select_field='id,userId,name,sex,nation,school,title,major,record,address,ctime';
        $data=$this->Common->get_limit_order( $this->expert_table,$where,$start,$this->per_page,$orderby,$order_type,$select_field);
        
        foreach ($data as $key => $value) {
            $user_field = 'username,password';
            $user_where = array('id' => $value['userId']);
            $user_data = $this->Common->get_one($this->user_table,$user_where,$user_field);
            $data[$key]['username'] = $user_data['username'];
            $data[$key]['password'] = $user_data['password'];
        }
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
                $user_where = array('username' => $postinfo['username']);
                $user_data = array('password' => $postinfo['password']);
                $user_rep = $this->Common->update($this->user_table,$user_where,$user_data);
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
            $nickname = 'healthy';
            $data=array(
                    'username' => $postinfo['username'],'password' => $postinfo['password'],'nickname' => 'healthy','type' => '2','ctime' => $ctime
            );
            $rep = $this->Common->add($this->user_table,$data);
            if($rep>0){
                //增加专家的表
                $header = 'header.jpg';
                $exp_data = array(
                    'userId' => $rep,'ctime' => $ctime,'header' => $header
                );
                $exp_rep = $this->Common->add($this->expert_table,$exp_data);
                if($exp_rep>0){
                    $re_data['status'] =200;
                    $re_data['id'] = $exp_rep;
                }
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
    

    /*
     * get more article by gongkun
    */
    public function articleTable($page=1)
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
        $data=$this->Common->get_limit_order( $this->article_table,$where,$start,$this->per_page,$orderby,$order_type,$select_field);
        foreach ($data as $key => $value) {
           //theme
            $type_where = array('id' => $value['type']);
            $type_data = $this->Common->get_one($this->type_table,$type_where);
            $data[$key]['type'] = $type_data['name'];
        }
        echo json_encode($data);
    }
    /*
     * update article info by gongkun
    */
    public function updateArticleInfo()
    {
        if($_POST){
            $re_data['status'] = 100;
            $postinfo= $this->Common->html_filter_array($_POST);
            $where=array('id' => $postinfo['id']);
            $data=array('name' => $postinfo['name'],'author' => $postinfo['author'],'title' => $postinfo['title'],'read' => $postinfo['read'],'page' => $postinfo['page'],'type' => $postinfo['type'],'themeId' => $postinfo['theme'],'language'=>$postinfo['language'],'province' => $postinfo['province']);
            $rep=$this->Common->update($this->article_table,$where,$data);
            if($rep>0){
                $re_data['status'] =200;
            }
            echo json_encode($re_data);
        }
    }
    /*
     * add new article by gongkun
    */
    public function addNewArticle()
    {
        if($_POST){
            $re_data['status'] = 100;
            $postinfo= $this->Common->html_filter_array($_POST);
            $ctime = time();
            $data=array(
                    'name' => $postinfo['name'],'author' => $postinfo['author'],'title' => $postinfo['title'],
                    'read' => $postinfo['read'],'page' => $postinfo['page'],'type' => $postinfo['type'],'themeId' => $postinfo['theme'],'language'=>$postinfo['language'],'province' => $postinfo['province'],'ctime' => $ctime
            );
            $rep = $this->Common->add($this->article_table,$data);
            if($rep>0){
                //如果已经上传了临时文章 需要更名文章
                if(file_exists("article/tmp_article.pdf")){
                    $article = $rep.".pdf";
                    rename("article/tmp_article.pdf", "article/".$article);
                }
                $re_data['status'] =200;
                $re_data['id'] = $rep;
            }
            echo json_encode($re_data);
        }
    }
     /*
     * upload article pdf by gongkun
    */
    public function uploadArticle()
    {
        $return=array();
        $postinfo= $this->Common->html_filter_array($_POST);
        if ($_FILES["file"]["error"] > 0) {
            $return['status']=$_FILES["file"]["error"];
        } else {           
            $fillname = $_FILES['file']['name']; // 得到文件全名
            $dotArray = explode('.', $fillname); // 以.分割字符串，得到数组
            $type = end($dotArray); // 得到最后一个元素：文件后缀
            if($postinfo['name'] == "tmp_article"){
                $path = "article/".$postinfo['name'].".".$type;
            }else{
                $path = "article/".$postinfo['name'].".".$type; // 产生随机唯一的名字
            }
            move_uploaded_file($_FILES["file"]["tmp_name"],$path);
            $return['status']=200;
        } 
        // $return['postinfo'] = $postinfo;
        echo json_encode($return);
    }

    /*
     * picture admin by gongkun
    */
    function pictureTable($page=1)
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
        $data=$this->Common->get_limit_order( $this->picture_table,$where,$start,$this->per_page,$orderby,$order_type,$select_field);
        foreach ($data as $key => $value) {
           //theme
            $type_where = array('id' => $value['type']);
            $type_data = $this->Common->get_one($this->type_table,$type_where);
            $data[$key]['type'] = $type_data['name'];
        }
        echo json_encode($data); 
    }
    /*
      * deleteImage by gongkun
    */
    function deleteImage()
    {
        if($_POST){
            $re_data['status'] = 100;
            $postinfo= $this->Common->html_filter_array($_POST);
            $dirId = $postinfo['dirId'];
            $imageName = $postinfo['imageName'];
            $dir = 'picture/'.$dirId;
            if(is_dir($dir)){
                if($handle = opendir($dir)){  
                    while (($file = readdir($handle)) !== false ) {  
                        if($file == $imageName){  
                           $path = $dir."/".$imageName;
                           if(file_exists($path)){
                                unlink($path);
                          }
                           $re_data['status'] =200;
                        }  
                    }  
                }  
                closedir($handle); 
            }
            echo json_encode($re_data);
        }
    }
     /*
      * indexImage by gongkun
    */
    function indexImage()
    {
        if($_POST){
            $re_data['status'] = 100;
            $postinfo= $this->Common->html_filter_array($_POST);
            $dirId = $postinfo['dirId'];
            $imageName = $postinfo['imageName'];
            $dir = 'picture/'.$dirId;
            $indexPath = $dir."/"."index.jpg";
            if(file_exists($indexPath)){
                $new_path = $dir."/".md5(uniqid(rand())).".jpg";
                rename($indexPath, $new_path);
            }
            $indexPath = $dir."/"."index.jpeg";
            if(file_exists($indexPath)){
                $new_path = $dir."/".md5(uniqid(rand())).".jpeg";
                rename($indexPath, $new_path);
            }
            $indexPath = $dir."/"."index.png";
            if(file_exists($indexPath)){
                $new_path = $dir."/".md5(uniqid(rand())).".png";
                rename($indexPath, $new_path);
            }
            if(is_dir($dir)){
                if($handle = opendir($dir)){  
                    while (($file = readdir($handle)) !== false ) {  
                        if($file == $imageName){  
                           $path = $dir."/".$imageName;
                           if(file_exists($path)){
                            $dotArray = explode('.', $imageName);
                            $new_path = $dir."/index".".".end($dotArray);
                            rename($path, $new_path);
                          }
                            $re_data['status'] =200;
                        }  
                    }  
                }  
                closedir($handle); 
            }
            echo json_encode($re_data);
        }
    }
    /*
     * 上传图片
    */
    public function updatePicture()
    {
        $return=array();
        $postinfo= $this->Common->html_filter_array($_POST);
        if ($_FILES["file"]["error"] > 0) {
            $return['status']=$_FILES["file"]["error"];
        } else {           
            $fillname = $_FILES['file']['name']; // 得到文件全名
            $dotArray = explode('.', $fillname); // 以.分割字符串，得到数组
            $type = end($dotArray); // 得到最后一个元素：文件后缀
            $file_name = md5(uniqid(rand())).".".$type;
            $path = "picture/".$postinfo['dirId']."/".$file_name;
            move_uploaded_file($_FILES["file"]["tmp_name"],$path);

            $return['filename'] = $file_name;
            $return['status'] = 200;
        } 
        // $return['postinfo'] = $postinfo;
        echo json_encode($return);
    }
     /*
     * update article info by gongkun
    */
    public function updatePictureInfo()
    {
        if($_POST){
            $re_data['status'] = 100;
            $postinfo= $this->Common->html_filter_array($_POST);
            $where=array('id' => $postinfo['id']);
            $data=array('name' => $postinfo['name'],'author' => $postinfo['author'],'title' => $postinfo['title'],'read' => $postinfo['read'],'type' => $postinfo['type'],'themeId' => $postinfo['theme'],'language'=>$postinfo['language'],'province' => $postinfo['province']);
            $rep=$this->Common->update($this->picture_table,$where,$data);
            if($rep>0){
                $re_data['status'] =200;
            }
            echo json_encode($re_data);
        }
    }
    /*
     * add new picture by gongkun
    */
    public function addNewPicture()
    {
        if($_POST){
            $re_data['status'] = 100;
            $postinfo= $this->Common->html_filter_array($_POST);
            $ctime = time();
            $data=array(
                    'name' => $postinfo['name'],'author' => $postinfo['author'],'title' => $postinfo['title'],
                    'read' => $postinfo['read'],'type' => $postinfo['type'],'themeId' => $postinfo['theme'],'language'=>$postinfo['language'],'province' => $postinfo['province'],'ctime' => $ctime
            );
            $rep = $this->Common->add($this->picture_table,$data);
            if($rep>0){
                //如果已经上传了临时文章 需要更名文章
                if(file_exists("picture/tmp_picture")){
                    $picture = "picture/".$rep;
                    rename("picture/tmp_picture",$picture);
                }
                $re_data['status'] =200;
                $re_data['id'] = $rep;
            }
            echo json_encode($re_data);
        }
    }
     /*
     * upload picture  by gongkun
    */
    public function uploadPicture()
    {
        $return=array();
        $postinfo= $this->Common->html_filter_array($_POST);
        if ($_FILES["file"]["error"] > 0) {
            $return['status']=$_FILES["file"]["error"];
        } else {           
            $fillname = $_FILES['file']['name']; // 得到文件全名
            $dotArray = explode('.', $fillname); // 以.分割字符串，得到数组
            $type = end($dotArray); // 得到最后一个元素：文件后缀
            
            if($postinfo['name'] == "tmp_picture"){
                $pic_dir = "picture/".$postinfo['name'];
                if(!is_dir($pic_dir)){
                   mkdir($pic_dir,0777,true);
                }
            }
            $path = "picture/".$postinfo['name']."/".md5(uniqid(rand())).".".$type;
            move_uploaded_file($_FILES["file"]["tmp_name"],$path);
            $return['status']=200;
        } 
        // $return['postinfo'] = $postinfo;
        echo json_encode($return);
    }

    /*
     *by liuzuobin
    **/
    public function addNewAudioInfo()
    {
        if($_POST){

            $re_data['status'] = 100;
            $postinfo= $this->Common->html_filter_array($_POST);

            $data=array(
                    'name' => $postinfo['name'],'description' => $postinfo['introduce'],'theme' => $postinfo['theme'],'author'=>$postinfo['author'],'title'=>$postinfo['title'],
                    'type' => $postinfo['type'],'language' => $postinfo['language'],'province' => $postinfo['province'],'pic_url' => $postinfo['pic_url'],'source_url' => $postinfo['source_url']
                );
                $rep = $this->Common->add($this->audio_table,$data);

                if($rep>0){
                    $re_data['status'] =200;
                    $re_data['id'] = $rep;
                }
            echo json_encode($re_data);
        }
    }

    public function uploadAudioFront(){
        $return=array();
        $postinfo= $this->Common->html_filter_array($_POST);
        if ($_FILES["file"]["error"] > 0) {
            $return['status']=$_FILES["file"]["error"];
        } else {           
            $fillname = $_FILES['file']['name']; // 得到文件全名
            $dotArray = explode('.', $fillname); // 以.分割字符串，得到数组
            $type = end($dotArray); // 得到最后一个元素：文件后缀
            $file_name = md5(uniqid(rand())).".".$type;
            $path = "audio/".$file_name;
            move_uploaded_file($_FILES["file"]["tmp_name"],$path);
            //将文件存入数据库
            if($postinfo['name'] != "tmp_header"){
                $header = "header_".$postinfo['name'].".".$type;
                $where=array('id' => $postinfo['name']);
                $data = array('pic_url' => $header);
                $rep = $this->Common->update($this->audio_table,$where,$data);
                if($rep>0){
                     $return['status']=200;
                }
            }else{
                $return['status']=200;
            }
            $return['pic_url'] = $path;
        } 
        // $return['postinfo'] = $postinfo;
        echo json_encode($return);
    }

    public function addNewAudio()
    {
        $return=array();
        $postinfo= $this->Common->html_filter_array($_POST);
        if ($_FILES["file"]["error"] > 0) {
            $return['status']=$_FILES["file"]["error"];
        } else {           
            $fillname = $_FILES['file']['name']; // 得到文件全名
            $dotArray = explode('.', $fillname); // 以.分割字符串，得到数组
            $type = end($dotArray); // 得到最后一个元素：文件后缀
            $file_name = md5(uniqid(rand())).".".$type;
            $path = "audio/".$file_name;
            move_uploaded_file($_FILES["file"]["tmp_name"],$path);

            $return['url'] = $path;
            $return['status'] = 200;
        } 
        $url = $postinfo['source_url'];
        if(!empty($url)){
            unlink($url);
        }
        
        // $return['postinfo'] = $postinfo;
        echo json_encode($return);
    }

    public function uploadAudio(){
        $return=array();
        $postinfo= $this->Common->html_filter_array($_POST);
        if ($_FILES["file"]["error"] > 0) {
            $return['status']=$_FILES["file"]["error"];
        } else {           
            $fillname = $_FILES['file']['name']; // 得到文件全名
            $dotArray = explode('.', $fillname); // 以.分割字符串，得到数组
            $type = end($dotArray); // 得到最后一个元素：文件后缀
            $file_name = md5(uniqid(rand())).".".$type;
            $path = "audio/".$file_name;
            move_uploaded_file($_FILES["file"]["tmp_name"],$path);

            $return['source_url'] = $path;
            //将文件存入数据库
            if($postinfo['name'] != "tmp_header"){
                
                $where=array('id' => $postinfo['name']);
                $data = array('source_url' => $path);
                $rep = $this->Common->update($this->ppt_table,$where,$data);
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

    public function updateAudioInfo()
    {
        if($_POST){
            $re_data['status'] = 100;
            $postinfo= $this->Common->html_filter_array($_POST);
            $where=array('id' => $postinfo['id']);
            $data=array('name' => $postinfo['name'],'description' => $postinfo['introduce'],'type' => $postinfo['type'],'theme' => $postinfo['theme'],'language'=>$postinfo['language'],'province' => $postinfo['province'],'pic_url' => $postinfo['pic_url'],'source_url' => $postinfo['source_url'],'author'=>$postinfo['author'],'title'=>$postinfo['title']
                );
            $rep=$this->Common->update($this->audio_table,$where,$data);
            if($rep>0){
                $re_data['status'] =200;
            }
            echo json_encode($re_data);
        }
    }

    public function audioTable(){
        if($_POST){
            $postinfo= $this->Common->html_filter_array($_POST);
            $page = $postinfo['page'];
        }
        $where=array();
        $start=intval($page-1)*intval($this->per_page);
        $orderby='create_time';
        $order_type='desc';
        $select_field='id,name,description,seconds,theme,type,language,province,listen_num,create_time';
        $data=$this->Common->get_limit_order( $this->audio_table,$where,$start,$this->per_page,$orderby,$order_type,$select_field);
        foreach ($data as $key => $value) {
           //theme
            $type_where = array('id' => $value['type']);
            $type_data = $this->Common->get_one($this->type_table,$type_where);
            $data[$key]['type'] = $type_data['name'];
        }
        echo json_encode($data);
    }

    public function pptTable(){
        if($_POST){
            $postinfo= $this->Common->html_filter_array($_POST);
            $page = $postinfo['page'];
        }
        $where=array();
        $start=intval($page-1)*intval($this->per_page);
        $orderby='create_time';
        $order_type='desc';
        $select_field='id,name,description,author_id,author,page_count,theme,type,language,province,reader_num,pic_url,source_url,create_time';
        $data=$this->Common->get_limit_order( $this->ppt_table,$where,$start,$this->per_page,$orderby,$order_type,$select_field);
        foreach ($data as $key => $value) {
           //theme
            $type_where = array('id' => $value['type']);
            $type_data = $this->Common->get_one($this->type_table,$type_where);
            $data[$key]['type'] = $type_data['name'];
        }
        echo json_encode($data);
    }

    public function addNewPPTInfo()
    {
        if($_POST){

            $re_data['status'] = 100;
            $postinfo= $this->Common->html_filter_array($_POST);

            $data=array(
                    'name' => $postinfo['name'],'description' => $postinfo['introduce'],'theme' => $postinfo['theme'],
                    'type' => $postinfo['type'],'language' => $postinfo['language'],'province' => $postinfo['city'],
                    'source_url' => $postinfo['url'],'author' => $postinfo['author']
                );
                $rep = $this->Common->add($this->ppt_table,$data);

                if($rep>0){
                    $re_data['status'] =200;
                    $re_data['id'] = $rep;
                }
            echo json_encode($re_data);
        }
    }

    public function addNewPPT()
    {
        $return=array();
        $postinfo= $this->Common->html_filter_array($_POST);
        if ($_FILES["file"]["error"] > 0) {
            $return['status']=$_FILES["file"]["error"];
        } else {           
            $fillname = $_FILES['file']['name']; // 得到文件全名
            $dotArray = explode('.', $fillname); // 以.分割字符串，得到数组
            $type = end($dotArray); // 得到最后一个元素：文件后缀
            $file_name = md5(uniqid(rand())).".".$type;
            $path = "ppt/".$file_name;
            move_uploaded_file($_FILES["file"]["tmp_name"],$path);

            $return['url'] = $path;
            $return['status'] = 200;
        } 
        $url = $postinfo['url'];
        if(!empty($url)){
            unlink($url);
        }
        
        // $return['postinfo'] = $postinfo;
        echo json_encode($return);
    }

    public function uploadPPT(){
        $return=array();
        $postinfo= $this->Common->html_filter_array($_POST);
        if ($_FILES["file"]["error"] > 0) {
            $return['status']=$_FILES["file"]["error"];
        } else {           
            $fillname = $_FILES['file']['name']; // 得到文件全名
            $dotArray = explode('.', $fillname); // 以.分割字符串，得到数组
            $type = end($dotArray); // 得到最后一个元素：文件后缀
            $file_name = md5(uniqid(rand())).".".$type;
            $path = "ppt/".$file_name;
            move_uploaded_file($_FILES["file"]["tmp_name"],$path);

            $return['url'] = $path;
            //将文件存入数据库
            if($postinfo['name'] != "tmp_header"){
                
                $where=array('id' => $postinfo['name']);
                $data = array('source_url' => $path);
                $rep = $this->Common->update($this->ppt_table,$where,$data);
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

    public function updatePPTInfo()
    {
        if($_POST){
            $re_data['status'] = 100;
            $postinfo= $this->Common->html_filter_array($_POST);
            $where=array('id' => $postinfo['id']);
            $data=array('name' => $postinfo['name'],'author' => $postinfo['author'],'description' => $postinfo['description'],'type' => $postinfo['type'],'theme' => $postinfo['theme'],'language'=>$postinfo['language'],'province' => $postinfo['province'],'source_url' => $postinfo['url']
                );
            $rep=$this->Common->update($this->ppt_table,$where,$data);
            if($rep>0){
                $re_data['status'] =200;
            }
            echo json_encode($re_data);
        }
    }

    public function audioList($page=1)
    {
        $page=$page;
        if($_POST){
            $postinfo= $this->Common->html_filter_array($_POST);
            $page = $postinfo['page'];
        }
        $where=array();
        $start=intval($page-1)*intval($this->per_page);
        $orderby='create_time';
        $order_type='desc';
        $select_field="id,name,author,title,description,source_url,seconds,theme,type,language,province,listen_num,date_format(create_time,'%Y-%m-%d') as create_time";
        $data=$this->Common->get_limit_order( $this->audio_table,$where,$start,$this->per_page,$orderby,$order_type,$select_field,'');
        echo json_encode($data);
    }

    public function pptList($page=1)
    {
        $page=$page;
        if($_POST){
            $postinfo= $this->Common->html_filter_array($_POST);
            $page = $postinfo['page'];
        }
        $where=array();
        $start=intval($page-1)*intval($this->per_page);
        $orderby='create_time';
        $order_type='desc';
        $select_field="id,name,author,description,source_url,theme,type,language,province,reader_num,date_format(create_time,'%Y-%m-%d') as create_time";
        $data=$this->Common->get_limit_order( $this->ppt_table,$where,$start,$this->per_page,$orderby,$order_type,$select_field,'');
        echo json_encode($data);
    }

    /*
     * get more video by gongkun
    */
    public function videoTable($page=1)
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
        $data=$this->Common->get_limit_order( $this->video_table,$where,$start,$this->per_page,$orderby,$order_type,$select_field);
        foreach ($data as $key => $value) {
           //theme
            $type_where = array('id' => $value['type']);
            $type_data = $this->Common->get_one($this->type_table,$type_where);
            $data[$key]['type'] = $type_data['name'];
        }
        echo json_encode($data);
    }
    /*
     * update cover address by gongkun
    */
    public function updateCover()
    {
        if($_POST){
            $re_data['status'] =100;
            $postinfo = $this->Common->html_filter_array($_POST);
            $where=array('id' => $postinfo['id']);
            $data = array('covAddr' => $postinfo['covAddr']);
            $rep = $this->Common->update($this->video_table,$where,$data);
            if($rep>0){
                $re_data['status'] = 200;
            }
            echo json_encode($re_data);
        }
    }
     /*
     * update video info by gongkun
    */
    public function updateVideoInfo()
    {
        if($_POST){
            $re_data['status'] = 100;
            $postinfo= $this->Common->html_filter_array($_POST);
            $where=array('id' => $postinfo['id']);
            $data=array('videoId' => $postinfo['videoId'],'name' => $postinfo['name'],'author' => $postinfo['author'],'title' => $postinfo['title'],'read' => $postinfo['read'],'videoAddr' => $postinfo['videoAddr'],'covAddr' => $postinfo['covAddr'],'type' => $postinfo['type'],'themeId' => $postinfo['theme'],'language'=>$postinfo['language'],'province' => $postinfo['province']);
            $rep=$this->Common->update($this->video_table,$where,$data);
            if($rep>0){
                $re_data['status'] =200;
            }
            echo json_encode($re_data);
        }
    }
      /*
     * add new video by gongkun
    */
    public function addNewVideo()
    {
        if($_POST){
            $re_data['status'] = 100;
            $postinfo= $this->Common->html_filter_array($_POST);
            $ctime = time();
            $data=array(
                    'name' => $postinfo['name'],'videoId' => $postinfo['videoId'],'author' => $postinfo['author'],'title' => $postinfo['title'],
                    'read' => $postinfo['read'],'type' => $postinfo['type'],'themeId' => $postinfo['theme'],'language'=>$postinfo['language'],'province' => $postinfo['province'],'videoAddr' => $postinfo['videoAddr'],'covAddr' => $postinfo['covAddr'],'ctime' => $ctime
            );
            $rep = $this->Common->add($this->video_table,$data);
            if($rep>0){
                $re_data['status'] =200;
            }
            echo json_encode($re_data);
        }
    }
    
}


























