<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backend extends MY_Controller {

	public function __construct() {
        parent::__construct();
        //load the all data
        $where = array('themeId' => '1');
        $data = $this->Common->get_all($this->type_table,$where);
        $file = fopen("static/js/sickTheme.json","w");
        fwrite($file,json_encode($data));
        fclose($file);

        $where = array('themeId' => '2');
        $data = $this->Common->get_all($this->type_table,$where);
        $file = fopen("static/js/lifeTheme.json","w");
        fwrite($file,json_encode($data));
        fclose($file);
    }

    public function index()
    {
        if(isset($_SESSION['adminId']) && $_SESSION['adminId']>0){
            $this->load->view('backend/header');
            $this->load->view('backend/index');
        }else{
            $this->load->view('backend/login');
        }
    }
    /*
     * login admin by gongkun
    */
    public function login()
    {
         if($_POST){
            $postinfo= $this->Common->html_filter_array($_POST);
            $where=array('username' => $postinfo['username'],'password' => $postinfo['password']);
            $rep=$this->Common->get_one($this->admin_table,$where);
            if(count($rep)>0){
                $_SESSION['adminId']=$rep['id'];
                $_SESSION['adminName']=$rep['username'];
                $_SESSION['adminPassword']=$rep['password'];
                redirect('backend/index');
            }
        }
    	$this->load->view('backend/login');
    }
    /*
     * logout admin by gongkun
    */
    public function logout()
    {
        unset($_SESSION['adminId']);
        unset($_SESSION['adminName']);
        unset($_SESSION['adminPassword']);
        $this->load->view('backend/login');
    }
    /*
     * main content
     */
    public function main($page=1)
    {	
        $user_count = $this->Common->get_count($this->user_table,'','');
        $expert_count = $this->Common->get_count($this->expert_table,'','');
        $article_count = $this->Common->get_count($this->article_table,'','');
        $picture_count = $this->Common->get_count($this->picture_table,'','');
        $video_count = $this->Common->get_count($this->video_table,'','');
        $audio_count = $this->Common->get_count($this->audio_table,'','');
        $ppt_count = $this->Common->get_count($this->ppt_table,'','');

        $data['user_count'] = $user_count;
        $data['expert_count'] = $expert_count;
        $data['article_count'] = $article_count;
        $data['picture_count'] = $picture_count;
        $data['video_count'] = $video_count;
        $data['audio_count'] = $audio_count;
        $data['ppt_count'] = $ppt_count;
        $count = intval($article_count)+intval($picture_count)+intval($video_count)+intval($audio_count)+intval($ppt_count);
        $data['count'] = $count;
        $re_data['data'] = $data;
  
        $this->load->view('backend/header');
        $this->load->view('backend/webInfo',$re_data);
        $this->load->view('backend/footer');  
    }

    //button 
    public function buttonShow()
    {
    	$this->load->view('backend/button');
    }

    //table
	public function tableShow()
    {
    	$this->load->view('backend/form');
    }    

    /*
     * web info by gongkun
    */
    public function webInfo()
    {
        $user_count = $this->Common->get_count($this->user_table,'','');
        $expert_count = $this->Common->get_count($this->expert_table,'','');
        $article_count = $this->Common->get_count($this->article_table,'','');
        $picture_count = $this->Common->get_count($this->picture_table,'','');
        $video_count = $this->Common->get_count($this->video_table,'','');
        $audio_count = $this->Common->get_count($this->audio_table,'','');
        $ppt_count = $this->Common->get_count($this->ppt_table,'','');

        $data['user_count'] = $user_count;
        $data['expert_count'] = $expert_count;
        $data['article_count'] = $article_count;
        $data['picture_count'] = $picture_count;
        $data['video_count'] = $video_count;
        $data['audio_count'] = $audio_count;
        $data['ppt_count'] = $ppt_count;
        $count = intval($article_count)+intval($picture_count)+intval($video_count)+intval($audio_count)+intval($ppt_count);
        $data['count'] = $count;
        $re_data['data'] = $data;
  
        $this->load->view('backend/header');
        $this->load->view('backend/webInfo',$re_data);
        $this->load->view('backend/footer');  
    }
    /*
     * user info by gongkun
    */
    public function adminInfo()
    {
        if(isset($_SESSION['adminId']) && $_SESSION['adminId']>0){
            $data['adminId'] = $_SESSION['adminId'];
            $data['adminName'] = $_SESSION['adminName'];
            $data['adminPassword'] = $_SESSION['adminPassword'];
            $re_data['data'] = $data;
            $this->load->view('backend/header');
            $this->load->view('backend/adminInfo',$re_data);
            $this->load->view('backend/footer');  
        }else{
            $this->load->view('backend/login');
        }
    }


    /*
     *  user Admin by gongkun 
    */
    public function userAdmin($page=1)
    {
        $page=$page;
        $where=array();
        $start=intval($page-1)*intval($this->per_page);
        $orderby='ctime';
        $order_type='desc';
        $select_field='*';
        $data=$this->Common->get_limit_order( $this->user_table,$where,$start,$this->per_page,$orderby,$order_type,$select_field);
        $count=$this->Common->get_count($this->user_table,'','');
        $re_data['data'] = $data;
        $re_data['count'] = $count;
        $re_data['limit'] = $this->per_page;
        $this->load->view('backend/header');
        $this->load->view('backend/userAdmin',$re_data);
        $this->load->view('backend/footer');
    }
    /*
     *  user Edit by gongkun 
    */
    public  function userEdit($id=0)
    {
        if($id>0){
            $where = array('id' => $id);
            $data = $this->Common->get_one($this->user_table,$where);
            $re_data['data'] =$data;
            $this->load->view('backend/header');
            $this->load->view('backend/userEdit',$re_data);
            $this->load->view('backend/footer');
        }else{
            redirect('backend/userAdmin/1');
        }
    }
    /*
     *  user delete by gongkun 
    */
    public function userDelete($id=0)
    {
        if($id>0){
            $where = array('id' => $id);
            $rep = $this->Common->delete($this->user_table,$where);
        }
        redirect('backend/userAdmin/1');
    }


    /*
     * expert Admin by gongkun
    */
    public function expertAdmin($page=1)
    {
        $page=$page;
        $where=array();
        $start=intval($page-1)*intval($this->per_page);
        $orderby='ctime,is_top';
        $order_type='desc';
        $select_field='id,userId,name,sex,nation,school,title,major,record,address,ctime,is_top';
        $data=$this->Common->get_limit_order( $this->expert_table,$where,$start,$this->per_page,$orderby,$order_type,$select_field);
        //get the account from user table
         foreach ($data as $key => $value) {
            $user_field = 'username,password';
            $user_where = array('id' => $value['userId']);
            $user_data = $this->Common->get_one($this->user_table,$user_where,$user_field);
            $data[$key]['username'] = $user_data['username'];
            $data[$key]['password'] = $user_data['password'];
        }

        $count=$this->Common->get_count($this->expert_table,'','');
        $re_data['data'] = $data;
        $re_data['count'] = $count;
        $re_data['limit'] = $this->per_page;
        $this->load->view('backend/header');
        $this->load->view('backend/expertAdmin',$re_data);
        $this->load->view('backend/footer');    
    }
     /*
     *  expert Edit by gongkun 
    */
    public  function expertEdit($id=0)
    {
        if($id>0){
            $where = array('id' => $id);
            $data = $this->Common->get_one($this->expert_table,$where);
            $user_where = array('id' => $data['userId']);
            $user_field = 'username,password';
            $user_data = $this->Common->get_one($this->user_table,$user_where,$user_field);
            $data['username'] = $user_data['username'];
            $data['password'] = $user_data['password'];
            
            $re_data['data'] =$data;
            $this->load->view('backend/header');
            $this->load->view('backend/expertEdit',$re_data);
            $this->load->view('backend/footer');
        }else{
            redirect('backend/expertAdmin/1');
        }
    }
    /*
      * add a new expert by gongkun
    */
    public function addExpert()
    {
        $this->load->view('backend/header');
        $this->load->view('backend/addExpert');
        $this->load->view('backend/footer');
    }
    /*
     *  expert delete by gongkun 
    */
    public function expertDelete($id=0)
    {
        $header = "";
        if($id>0){
            $where = array('id' => $id);
            $select_field='header';
            $data = $this->Common->get_one($this->expert_table,$where,$select_field);
            $header = $data['header'];
            $rep = $this->Common->delete($this->expert_table,$where);
        }
        $tmp_header = "header/".$header;
        if(file_exists($tmp_header)){
            unlink($tmp_header);
        }
        redirect('backend/expertAdmin/1');
    }


    /*
      * article Admin(文章的相关操作) by gongkun
    */
    public function articleAdmin($page=1){
        $page=$page;
        $where=array();
        $start=intval($page-1)*intval($this->per_page);
        $orderby='ctime,is_top';
        $order_type='desc';
        $select_field='*';
        $data=$this->Common->get_limit_order( $this->article_table,$where,$start,$this->per_page,$orderby,$order_type,$select_field);
        foreach ($data as $key => $value) {
           //theme
            $type_where = array('id' => $value['type']);
            $type_data = $this->Common->get_one($this->type_table,$type_where);
            $data[$key]['type'] = $type_data['name'];
        }
        $count=$this->Common->get_count($this->article_table,'','');
        $re_data['data'] = $data;
        $re_data['count'] = $count;
        $re_data['limit'] = $this->per_page;
        $this->load->view('backend/header');
        $this->load->view('backend/articleAdmin',$re_data);
        $this->load->view('backend/footer');   
    }
    /*
     * article edit by gongkun
    */
    public  function articleEdit($id=0)
    {
        if($id>0){
            $where = array('id' => $id);
            $data = $this->Common->get_one($this->article_table,$where);
            $re_data['data'] =$data;
            $this->load->view('backend/header');
            $this->load->view('backend/articleEdit',$re_data);
            $this->load->view('backend/footer');
        }else{
            redirect('backend/articleAdmin/1');
        }
    }
    /*
      * add new article by gongkun
    */
    public function addArticle()
    {
        $this->load->view('backend/header');
        $this->load->view('backend/addArticle');
        $this->load->view('backend/footer');
    }
    /*
     *  article delete by gongkun 
    */
    public function articleDelete($id=0)
    {
        if($id>0){
            $where = array('id' => $id);
            $rep = $this->Common->delete($this->article_table,$where);
        }
        $tmp_article = "article/".$id.".pdf";
        if(file_exists($tmp_article)){
            unlink($tmp_article);
        }
        redirect('backend/articleAdmin/1');
    }

    /*
     * picture section admin by gongkun
    */
    public function pictureAdmin($page=1)
    {
        $page=$page;
        $where=array();
        $start=intval($page-1)*intval($this->per_page);
        $orderby='ctime,is_top';
        $order_type='desc';
        $select_field='*';
        $data=$this->Common->get_limit_order( $this->picture_table,$where,$start,$this->per_page,$orderby,$order_type,$select_field);
        
        foreach ($data as $key => $value) {
           //theme
            $type_where = array('id' => $value['type']);
            $type_data = $this->Common->get_one($this->type_table,$type_where);
            $data[$key]['type'] = $type_data['name'];
        }
        $count=$this->Common->get_count($this->picture_table,'','');
        $re_data['data'] = $data;
        $re_data['count'] = $count;
        $re_data['limit'] = $this->per_page;
        $this->load->view('backend/header');
        $this->load->view('backend/pictureAdmin',$re_data);
        $this->load->view('backend/footer');  
    }
    /*
     * picture edit by gongkun
    */
    public  function pictureEdit($id=0)
    {
        if($id>0){
            $where = array('id' => $id);
            $data = $this->Common->get_one($this->picture_table,$where);
            $dir = 'picture/'.$id;
            $file_name = array();
            if(is_dir($dir)){
                if($handle = opendir($dir)){  
                    while (($file = readdir($handle)) !== false ) {  
                        if($file != ".." && $file != "." && $file != ".DS_Store"){  
                            $file_name[] = $file;  
                        }  
                    }  
                }  
                closedir($handle); 
            }
            $re_data['data'] =$data;
            $re_data['images'] = $file_name;
            $this->load->view('backend/header');
            $this->load->view('backend/pictureEdit',$re_data);
            $this->load->view('backend/footer');
        }else{
            redirect('backend/pictureAdmin/1');
        }
    }
    /*
      * add new  picture by gongkun
    */
    public function addPicture()
    {
        $this->load->view('backend/header');
        $this->load->view('backend/addPicture');
        $this->load->view('backend/footer');
    }
     /*
     *  picture delete by gongkun 
    */
    public function pictureDelete($id=0)
    {
        if($id>0){
            $where = array('id' => $id);
            $rep = $this->Common->delete($this->picture_table,$where);
        }
        $tmp_picture = "picture/".$id;
        if(strtoupper(substr(PHP_OS, 0, 3)) == 'WIN') {
            $str = "rmdir /s/q " . $tmp_picture;
        } else {
           $str = "rm -Rf " . $tmp_picture;
        }
        exec($str);
        redirect('backend/pictureAdmin/1');
    }

    /*
      * add a new audio by liuzuobin
    */
    public function audioAdmin($page=1)
    {
        $page=$page;
        $where=array();
        $start=intval($page-1)*intval($this->per_page);
        $orderby='create_time,is_top';
        $order_type='desc';
        $select_field='id,name,description,seconds,themeId,type,language,province,listen_num,create_time,is_top';
        $data=$this->Common->get_limit_order( $this->audio_table,$where,$start,$this->per_page,$orderby,$order_type,$select_field);
        foreach ($data as $key => $value) {
           //theme
            $type_where = array('id' => $value['type']);
            $type_data = $this->Common->get_one($this->type_table,$type_where);
            $data[$key]['type'] = $type_data['name'];
        }
        $count=$this->Common->get_count($this->audio_table,'','');
        $re_data['data'] = $data;
        $re_data['count'] = $count;
        $re_data['limit'] = $this->per_page;
        $this->load->view('backend/header');
        $this->load->view('backend/audioAdmin',$re_data);
        $this->load->view('backend/footer');
    }

    public function audioAdd()
    {
        $this->load->view('backend/header');
        $this->load->view('backend/audioAdd');
        $this->load->view('backend/footer');
    }

    public  function audioEdit($id=0)
    {
        if($id>0){
            $where = array('id' => $id);
            $data = $this->Common->get_one($this->audio_table,$where);
            $re_data['data'] =$data;
            $this->load->view('backend/header');
            $this->load->view('backend/audioEdit',$re_data);
            $this->load->view('backend/footer');
        }else{
            redirect('backend/audioAdmin/1');
        }
    }

    public function audioDelete($id=0)
    {
        $pic_url = "";
        if($id>0){
            $where = array('id' => $id);
            $select_field='pic_url,source_url';
            $data = $this->Common->get_one($this->audio_table,$where,$select_field);
            $pic_url = $data['pic_url'];
            $source_url = $data['source_url'];
            $rep = $this->Common->delete($this->audio_table,$where);
        }
        $tmp_header = "sound/".$pic_url;
        if(file_exists($tmp_header)){
            unlink($tmp_header);
        }
        redirect('backend/audioAdmin/1');
    }

    /*
      * add a new ppt by liuzuobin
    */
    public function pptAdmin($page=1)
    {
        $page=$page;
        $where=array();
        $start=intval($page-1)*intval($this->per_page);
        $orderby='create_time,is_top';
        $order_type='desc';
        $select_field='id,name,description,author_id,author,page_count,themeId,type,language,province,reader_num,pic_url,source_url,create_time,is_top';
        $data=$this->Common->get_limit_order( $this->ppt_table,$where,$start,$this->per_page,$orderby,$order_type,$select_field);
        foreach ($data as $key => $value) {
           //theme
            $type_where = array('id' => $value['type']);
            $type_data = $this->Common->get_one($this->type_table,$type_where);
            $data[$key]['type'] = $type_data['name'];
        }
        $count=$this->Common->get_count($this->ppt_table,'','');
        $re_data['data'] = $data;
        $re_data['count'] = $count;
        $re_data['limit'] = $this->per_page;
        $this->load->view('backend/header');
        $this->load->view('backend/pptAdmin',$re_data);
        $this->load->view('backend/footer');
    }

    public function pptAdd()
    {
        $this->load->view('backend/header');
        $this->load->view('backend/pptAdd');
        $this->load->view('backend/footer');
    }

    public  function pptEdit($id=0)
    {
        if($id>0){
            $where = array('id' => $id);
            $data = $this->Common->get_one($this->ppt_table,$where);
            $re_data['data'] =$data;
            $this->load->view('backend/header');
            $this->load->view('backend/pptEdit',$re_data);
            $this->load->view('backend/footer');
        }else{
            redirect('backend/pptAdmin/1');
        }
    }

    public function pptDelete($id=0)
    {
        $pic_url = "";
        if($id>0){
            $where = array('id' => $id);
            $select_field='pic_url,source_url';
            $data = $this->Common->get_one($this->ppt_table,$where,$select_field);
            $pic_url = $data['pic_url'];
            $source_url = $data['source_url'];
            $rep = $this->Common->delete($this->ppt_table,$where);
        }
        $tmp_header = "sound/".$pic_url;
        if(file_exists($tmp_header)){
            unlink($tmp_header);
        }
        redirect('backend/pptAdmin/1');
    }

     /*
      * video Admin(视频的相关操作) by gongkun
    */
    public function videoAdmin($page=1)
    {
        $page=$page;
        $where=array();
        $start=intval($page-1)*intval($this->per_page);
        $orderby='ctime,is_top';
        $order_type='desc';
        $select_field='*';
        $data=$this->Common->get_limit_order( $this->video_table,$where,$start,$this->per_page,$orderby,$order_type,$select_field);
        foreach ($data as $key => $value) {
           //theme
            $type_where = array('id' => $value['type']);
            $type_data = $this->Common->get_one($this->type_table,$type_where);
            $data[$key]['type'] = $type_data['name'];
        }
        $count=$this->Common->get_count($this->video_table,'','');
        $re_data['data'] = $data;
        $re_data['count'] = $count;
        $re_data['limit'] = $this->per_page;
        $this->load->view('backend/header');
        $this->load->view('backend/videoAdmin',$re_data);
        $this->load->view('backend/footer');
    }
    /*
     * video edit by gongkun
    */
    public function videoEdit($id=0)
    {
        if($id>0){
            $where = array('id' => $id);
            $data = $this->Common->get_one($this->video_table,$where);
            $re_data['data'] =$data;
            $this->load->view('backend/header');
            $this->load->view('backend/videoEdit',$re_data);
            $this->load->view('backend/footer');
        }else{
            redirect('backend/articleAdmin/1');
        }
    }
    /*
     * add and upload video by gongkun
    */
    public function addVideo()
    {
        $this->load->view('backend/header');
        $this->load->view('backend/addVideo');
        $this->load->view('backend/footer');
    }
    /*
     *  video delete by gongkun 
    */
    public function videoDelete($id=0)
    {
        if($id>0){
            $where = array('id' => $id);
            $rep = $this->Common->delete($this->video_table,$where);
        }
        redirect('backend/videoAdmin/1');
    }


    public function pptCancelTop($id=0)
    {
        if($id>0){
            $where=array('id' => $id);
            $data = array('is_top' => 0);
            $rep = $this->Common->update($this->ppt_table,$where,$data);
        }
        redirect('backend/pptAdmin/1');
    }

    public function pptPushTop($id=0)
    {
        $topwhere = array('is_top' => 1);
        $count=$this->Common->get_count($this->ppt_table,$topwhere,'');
        if ($count == 3) {
            echo "string";
        }
        if($id>0){
            $where=array('id' => $id);
            $data = array('is_top' => 1);
            $rep = $this->Common->update($this->ppt_table,$where,$data);
        }
        redirect('backend/pptAdmin/1');
    }


    public function audioCancelTop($id=0)
    {
        if($id>0){
            $where=array('id' => $id);
            $data = array('is_top' => 0);
            $rep = $this->Common->update($this->audio_table,$where,$data);
        }
        redirect('backend/audioAdmin/1');
    }

    public function audioPushTop($id=0)
    {
        if($id>0){
            $where=array('id' => $id);
            $data = array('is_top' => 1);
            $rep = $this->Common->update($this->audio_table,$where,$data);
            
        }
        redirect('backend/audioAdmin/1');
    }

    public function videoCancelTop($id=0)
    {
        if($id>0){
            $where=array('id' => $id);
            $data = array('is_top' => 0);
            $rep = $this->Common->update($this->video_table,$where,$data);
        }
        redirect('backend/videoAdmin/1');
    }

    public function videoPushTop($id=0)
    {
        if($id>0){
            $where=array('id' => $id);
            $data = array('is_top' => 1);
            $rep = $this->Common->update($this->video_table,$where,$data);
        }
        redirect('backend/videoAdmin/1');
    }

    public function expertCancelTop($id=0)
    {
        if($id>0){
            $where=array('id' => $id);
            $data = array('is_top' => 0);
            $rep = $this->Common->update($this->expert_table,$where,$data);
        }
        redirect('backend/expertAdmin/1');
    }

    public function expertPushTop($id=0)
    {
        if($id>0){
            $where=array('id' => $id);
            $data = array('is_top' => 1);
            $rep = $this->Common->update($this->expert_table,$where,$data);
        }
        redirect('backend/expertAdmin/1');
    }

    public function pictureCancelTop($id=0)
    {
        if($id>0){
            $where=array('id' => $id);
            $data = array('is_top' => 0);
            $rep = $this->Common->update($this->picture_table,$where,$data);
        }
        redirect('backend/pictureAdmin/1');
    }

    public function picturePushTop($id=0)
    {
        if($id>0){
            $where=array('id' => $id);
            $data = array('is_top' => 1);
            $rep = $this->Common->update($this->picture_table,$where,$data);
            if($rep>0){
                $re_data['status'] = 200;
            }
        }
        redirect('backend/pictureAdmin/1');
    }

    public function articleCancelTop($id=0)
    {
        if($id>0){
            $where=array('id' => $id);
            $data = array('is_top' => 0);
            $rep = $this->Common->update($this->article_table,$where,$data);
            if($rep>0){
                $re_data['status'] = 200;
            }
        }
        redirect('backend/articleAdmin/1');
    }

    public function articlePushTop($id=0)
    {
        if($id>0){
            $where=array('id' => $id);
            $data = array('is_top' => 1);
            $rep = $this->Common->update($this->article_table,$where,$data);
            if($rep>0){
                $re_data['status'] = 200;
            }
        }
        redirect('backend/articleAdmin/1');
    }
}








