<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends MY_Controller {

	public function __construct() {
        parent::__construct();
        //在此处加载model 自定义也可以
        //$this->load->database();
 		// $this->load->helper('url_helper');
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
 		 //all count
        $expert_count = $this->Common->get_count($this->expert_table,'','');
        $article_count = $this->Common->get_count($this->article_table,'','');
        $picture_count = $this->Common->get_count($this->picture_table,'','');
        $video_count = $this->Common->get_count($this->video_table,'','');
        $audio_count = $this->Common->get_count($this->audio_table,'','');
        $ppt_count = $this->Common->get_count($this->ppt_table,'','');
        $count = $expert_count+$article_count+$picture_count+$video_count+$audio_count+$ppt_count;
        $_SESSION['count'] = $count;
    }
    //主页
	public function index()
	{
		$head_data['theme'] = 0;
		$head_data['type'] = 0;
		$head_data['media'] = 0;
		$head_data['language'] = 0;
		$head_data['province'] = 0;
		$head_data['search'] = 0;

		if(!isset($_SESSION['userid'])){
			$_SESSION['userid']=0;
		}
		//get the index data
		//all data
        $expert_count = $this->Common->get_count($this->expert_table,'','');
        $article_count = $this->Common->get_count($this->article_table,'','');
        $picture_count = $this->Common->get_count($this->picture_table,'','');
        $video_count = $this->Common->get_count($this->video_table,'','');
        $audio_count = $this->Common->get_count($this->audio_table,'','');
        $ppt_count = $this->Common->get_count($this->ppt_table,'','');
        $count = $expert_count+$article_count+$picture_count+$video_count+$audio_count+$ppt_count;
        $head_data['count'] = $count;
		//expert
		$page = 1;
    	$where=array();
    	$start=intval($page-1)*intval($this->exp_page);
    	$orderby='ctime';
    	$order_type='desc';

    	$select_field='id,name,title,address,header';
    	$expert_data=$this->Common->get_limit_order( $this->expert_table,$where,$start,3,$orderby,$order_type,$select_field);
    	$re_data['expert_data'] = $expert_data;

    	//video
    	$select_field='id,name,author,title,read,type,ctime,covAddr,videoAddr';
    	$video_data=$this->Common->get_limit_order( $this->video_table,$where,$start,3,$orderby,$order_type,$select_field);
    	foreach ($video_data as $key => $value) {
           //theme
            $type_where = array('id' => $value['type']);
            $type_data = $this->Common->get_one($this->type_table,$type_where);
            $video_data[$key]['type'] = $type_data['name'];
        }
    	$re_data['video_data'] = $video_data;

    	//article
    	$select_field='*';
    	$article_data=$this->Common->get_limit_order( $this->article_table,$where,$start,8,$orderby,$order_type,$select_field);
    	$re_data['article_data'] = $article_data;

        //picture
        $select_field='id,name,author';
    	$picture_data=$this->Common->get_limit_order( $this->picture_table,$where,$start,4,$orderby,$order_type,$select_field);
    	//获取图片的地址 判断是否有index
    	if(count($picture_data)>0){
    		foreach ($picture_data as $key => $value) {
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
	            	$picture_data[$key]['index'] = $dir."/".$index_name;
	            }else{
	            	$picture_data[$key]['index'] = $dir."/".$file_name;
	            }
    		}
    	}
    	$re_data['picture_data'] = $picture_data;

    	$orderby = "create_time";
    	//audio
    	$select_field="id,name,author,title,description,source_url,seconds,themeId,type,language,province,listen_num,date_format(create_time,'%Y-%m-%d') as create_time";
        $audio_data=$this->Common->get_limit_order( $this->audio_table,$where,$start,5,$orderby,$order_type,$select_field);
        $re_data['audio_data'] = $audio_data;

    	//ppt
    	$select_field="id,name,author,description,source_url,themeId,type,language,province,reader_num,date_format(create_time,'%Y-%m-%d') as create_time";
        $ppt_data=$this->Common->get_limit_order( $this->ppt_table,$where,$start,3,$orderby,$order_type,$select_field);
        foreach ($ppt_data as $key => $value) {
           //theme
            $type_where = array('id' => $value['type']);
            $type_data = $this->Common->get_one($this->type_table,$type_where);
            $ppt_data[$key]['type'] = $type_data['name'];
        }
        $re_data['ppt_data'] = $ppt_data;
        $re_data['if_search'] = '0';  	//判断是从搜索来的 如果是不显示about部分
		$re_head['head_data'] = $head_data;

		//setting the session
		$_SESSION['theme'] = 0;
		$_SESSION['type'] = 0;
		$_SESSION['media'] = 0;
		$_SESSION['language'] = 0;
		$_SESSION['province'] = 0;
		$_SESSION['search'] = 0;			

		$this->load->view('header',$re_head);
		$this->load->view('main/index',$re_data);
		$this->load->view('footer');
	}
	/*
	 * login by gongkun
	 */
	public function login()
	{
		if($_POST){
			$postinfo= $this->Common->html_filter_array($_POST);
			$where=array('username' => $postinfo['phone'],'password' => $postinfo['password']);
			$rep=$this->Common->get_one($this->user_table,$where);
			if(count($rep)>0){
				$_SESSION['userid']=$rep['id'];
				$_SESSION['username']=$rep['username'];
				$_SESSION['nickname']=$rep['nickname'];
				$_SESSION['userType'] = $rep['type'];
				if($rep['type'] == 2){
					$rep_where = array('userId' => $rep['id']);
					$rep_data = $this->Common->get_one($this->expert_table,$rep_where);
					$rep_data['username'] = $rep['username'];
					$rep_data['password'] = $rep['password'];
					$re_data['data'] = $rep_data;
					$this->load->view('header2');
					$this->load->view('user/expertUpdateInfo',$re_data);
					$this->load->view('footer');
				}else{
					redirect('main/index');
				}
			}else{
				$this->load->view('header2');
				$this->load->view('user/login');
				$this->load->view('footer');
			}
		}else{
			$this->load->view('header2');
			$this->load->view('user/login');
			$this->load->view('footer');	
		}
	}
	/*
	 * expertUpdateInfo by gongkun
	*/
	public function expertUpdateInfo()
	{
		$id = $_SESSION['userid'];
		$where=array('id' => $id);
		$rep=$this->Common->get_one($this->user_table,$where);
				
		$rep_where = array('userId' => $rep['id']);
		$rep_data = $this->Common->get_one($this->expert_table,$rep_where);
		$rep_data['username'] = $rep['username'];
		$rep_data['password'] = $rep['password'];
		$re_data['data'] = $rep_data;
		$this->load->view('header2');
		$this->load->view('user/expertUpdateInfo',$re_data);
		$this->load->view('footer');

	}
	/*
	 * logout by gongkun
	 */
	public function logout()
	{
		$_SESSION['userid']=0;
		$_SESSION['username'] = '';
		$_SESSION['nickname']='';
		$_SESSION['userType']=0;
		redirect('main/index');
	}
	/*
	 * register by gognkun
	 */
	public function register()
	{	
		if($_POST){
			$postinfo= $this->Common->html_filter_array($_POST);
			$time=time();
			$add_data=array('username' => $postinfo['phone'],'nickname' => $postinfo['username'],'password' => $postinfo['password'],'type' => '1','ctime' =>$time);
			$rep=$this->Common->add($this->user_table,$add_data);
			if($rep>0){
				$_SESSION['userid']=$rep;
				$_SESSION['username']=$postinfo['phone'];
				$_SESSION['nickname']=$postinfo['username'];
				$_SESSION['userType'] = 1;
				redirect('main/index');
			}else{
				$this->load->view('header2');
				$this->load->view('user/register');
				$this->load->view('footer');	
			}
		}else{
			$this->load->view('header2');
			$this->load->view('user/register');
			$this->load->view('footer');
		}
	}

	//forget password
	public function forget()
	{
		if($_POST){
			$postinfo= $this->Common->html_filter_array($_POST);
			$time=time();
			$updae_data=array('username' => $postinfo['phone'],'nickname' => $postinfo['username'],'password' => $postinfo['password'],'ctime' =>$time);
			$rep=$this->Common->update($this->user_table,$updae_data);
			if($rep>0){
				redirect('main/index');
				// $data['postinfo']=$postinfo;
				// $this->load->view('header');
				// $this->load->view('main/testdemo',$data);
				// $this->load->view('footer');
			}else{
				$this->load->view('header2');
				$this->load->view('user/forget');
				$this->load->view('footer');
			}
		}else{
			$this->load->view('header2');
			$this->load->view('user/forget');
			$this->load->view('footer');
		}
	}

	//forgetPass
	public function forgetPass()
	{
		$this->load->view('header2');
		$this->load->view('user/forget');
		$this->load->view('footer');	
	}
	/*
	 * search index(通过search 和分类跳转过来) 搜索所有的内容部分
	*/
	public function searchIndex($theme='0',$type='0',$media='0',$language='0',$province='0',$search='0')
	{
		//expert
		$page = 1;
    	$where=array();
    	$start=intval($page-1)*intval($this->exp_page);
    	$orderby='ctime';
    	$order_type='desc';
    	//条件
    	$like = array();
    	$search = urldecode($search);
    	if($search != '0'){
    		$like['name'] = $search;
    	}
    	$select_field='id,name,title,address,header';
    	$expert_data=$this->Common->get_limit_order( $this->expert_table,$where,$start,3,$orderby,$order_type,$select_field,$like);
    	$re_data['expert_data'] = $expert_data;

    	$province = urldecode($province);
    	//条件
    	if($theme>0){
    		$where['themeId'] = $theme;
    	}
    	if($type>0){
    		$where['type'] = $type;
    	}
    	if($language>0){
    		$where['language'] = $language;
    	}
    	if($province != '0'){
    		$where['province'] = $province;
    	}

    	//video
    	$select_field='id,name,author,title,read,type,ctime,covAddr,videoAddr';
    	$video_data=$this->Common->get_limit_order( $this->video_table,$where,$start,3,$orderby,$order_type,$select_field,$like);
    	foreach ($video_data as $key => $value) {
           //theme
            $type_where = array('id' => $value['type']);
            $type_data = $this->Common->get_one($this->type_table,$type_where);
            $video_data[$key]['type'] = $type_data['name'];
        }
    	$re_data['video_data'] = $video_data;

    	//article
    	$select_field='*';
    	$article_data=$this->Common->get_limit_order( $this->article_table,$where,$start,8,$orderby,$order_type,$select_field,$like);
    	$re_data['article_data'] = $article_data;

        //picture
        $select_field='id,name,author';
    	$picture_data=$this->Common->get_limit_order( $this->picture_table,$where,$start,4,$orderby,$order_type,$select_field,$like);
    	//获取图片的地址 判断是否有index
    	if(count($picture_data)>0){
    		foreach ($picture_data as $key => $value) {
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
	            	$picture_data[$key]['index'] = $dir."/".$index_name;
	            }else{
	            	$picture_data[$key]['index'] = $dir."/".$file_name;
	            }
    		}
    	}
    	$re_data['picture_data'] = $picture_data;

    	$orderby = "create_time";
    	//audio
    	$select_field="id,name,author,title,description,source_url,seconds,themeId,type,language,province,listen_num,date_format(create_time,'%Y-%m-%d') as create_time";
        $audio_data=$this->Common->get_limit_order( $this->audio_table,$where,$start,5,$orderby,$order_type,$select_field,$like);
        $re_data['audio_data'] = $audio_data;

    	//ppt
    	$select_field="id,name,author,description,source_url,themeId,type,language,province,reader_num,date_format(create_time,'%Y-%m-%d') as create_time";
        $ppt_data=$this->Common->get_limit_order( $this->ppt_table,$where,$start,3,$orderby,$order_type,$select_field,$like);
        foreach ($ppt_data as $key => $value) {
           //theme
            $type_where = array('id' => $value['type']);
            $type_data = $this->Common->get_one($this->type_table,$type_where);
            $ppt_data[$key]['type'] = $type_data['name'];
        }
        $re_data['ppt_data'] = $ppt_data;

        $head_data['count'] = $_SESSION['count'];
        $head_data['theme'] = $theme;
		$head_data['type'] = $type;
		$head_data['media'] = $media;
		$head_data['language'] = $language;
		$head_data['province'] = $province;
		$head_data['search'] = $search;
		$re_head['head_data'] = $head_data;

		//赋值
		$_SESSION['theme'] = $theme;
		$_SESSION['type'] = $type;
		$_SESSION['media'] = $media;
		$_SESSION['language'] = $language;
		$_SESSION['province'] = $province;
		$_SESSION['search'] = $search;

		$re_data['if_search'] = '1';
		$this->load->view('header',$re_head);
		$this->load->view('main/index',$re_data);
		$this->load->view('footer');

	}
	/*
	 * search expert( 通过search 和分类跳转过来) 只搜索name部分
	*/
	public function searchExpert($theme,$type,$media,$language,$province,$search)
	{
		//expert
		$page = 1;
    	$where=array();
    	$start=intval($page-1)*intval($this->exp_page);
    	$orderby='ctime';
    	$order_type='desc';
    	//条件
    	$like = array();
    	$search = urldecode($search);
    	if($search != '0'){
    		$like['name'] = $search;
    	}
    	$select_field='id,name,title,address,header';
    	$expert_data=$this->Common->get_limit_order( $this->expert_table,$where,$start,$this->exp_page,$orderby,$order_type,$select_field,$like);
    	$tmp_data=$this->Common->get_limit_order( $this->expert_table,$where,$start,'',$orderby,$order_type,$select_field,$like);
    	$re_data['count'] = count($tmp_data);
        $re_data['limit'] = $this->exp_page;
    	$re_data['data'] = $expert_data;
        
        $head_data['count'] = $_SESSION['count'];
        $head_data['theme'] = $theme;
		$head_data['type'] = $type;
		$head_data['media'] = $media;
		$head_data['language'] = $language;
		$head_data['province'] = $province;
		$head_data['search'] = $search;
		$re_head['head_data'] = $head_data;

		//赋值
		$_SESSION['theme'] = $theme;
		$_SESSION['type'] = $type;
		$_SESSION['media'] = $media;
		$_SESSION['language'] = $language;
		$_SESSION['province'] = urldecode($province);
		$_SESSION['search'] = $search;

		$this->load->view('header',$re_head);
		$this->load->view('expert/expert',$re_data);
		$this->load->view('footer');
	}
	/*
	 * search Video( 通过search 和分类跳转过来) 只搜索name部分
	*/
	public function searchVideo($theme,$type,$media,$language,$province,$search)
	{
		//expert
		$page = 1;
    	$where=array();
    	$start=intval($page-1)*intval($this->per_page);
    	$orderby='ctime';
    	$order_type='desc';
    	//条件
    	$like = array();
    	$search = urldecode($search);
    	//
    	if($search != '0'){
    		$like['name'] = $search;
    	}
    	$province = urldecode($province);
    	//条件
    	if($theme>0){
    		$where['themeId'] = $theme;
    	}
    	if($type>0){
    		$where['type'] = $type;
    	}
    	if($language>0){
    		$where['language'] = $language;
    	}
    	if($province != '0'){
    		$where['province'] = $province;
    	}
    	//video
    	$select_field='id,name,author,title,read,type,ctime,covAddr,videoAddr';
    	$video_data=$this->Common->get_limit_order( $this->video_table,$where,$start,$this->per_page,$orderby,$order_type,$select_field,$like);
    	$tmp_data=$this->Common->get_limit_order( $this->video_table,$where,$start,'',$orderby,$order_type,$select_field,$like);
    	foreach ($video_data as $key => $value) {
           //theme
            $type_where = array('id' => $value['type']);
            $type_data = $this->Common->get_one($this->type_table,$type_where);
            $video_data[$key]['type'] = $type_data['name'];
        }
        $re_data['count'] = count($tmp_data);
        $re_data['limit'] = $this->per_page;
    	$re_data['data'] = $video_data;
        
        $head_data['count'] = $_SESSION['count'];
        $head_data['theme'] = $theme;
		$head_data['type'] = $type;
		$head_data['media'] = $media;
		$head_data['language'] = $language;
		$head_data['province'] = $province;
		$head_data['search'] = $search;
		$re_head['head_data'] = $head_data;

		//赋值
		$_SESSION['theme'] = $theme;
		$_SESSION['type'] = $type;
		$_SESSION['media'] = $media;
		$_SESSION['language'] = $language;
		$_SESSION['province'] = $province;
		$_SESSION['search'] = $search;

		$this->load->view('header',$re_head);
		$this->load->view('video/video',$re_data);
		$this->load->view('footer');
	}
	/*
	 * search article( 通过search 和分类跳转过来) 只搜索name部分
	*/
	public function searchArticle($theme,$type,$media,$language,$province,$search)
	{
		//article
		$page = 1;
    	$where=array();
    	$start=intval($page-1)*intval($this->per_page);
    	$orderby='ctime';
    	$order_type='desc';
    	//条件
    	$like = array();
    	$search = urldecode($search);
    	if($search != '0'){
    		$like['name'] = $search;
    	}
    	$province = urldecode($province);
    	//条件
    	if($theme>0){
    		$where['themeId'] = $theme;
    	}
    	if($type>0){
    		$where['type'] = $type;
    	}
    	if($language>0){
    		$where['language'] = $language;
    	}
    	if($province != '0'){
    		$where['province'] = $province;
    	}
    	//article
    	$select_field='*';
    	$article_data=$this->Common->get_limit_order( $this->article_table,$where,$start,$this->per_page,$orderby,$order_type,$select_field,$like);
    	$tmp_data=$this->Common->get_limit_order( $this->article_table,$where,$start,'',$orderby,$order_type,$select_field,$like);
    	
        $re_data['count'] = count($tmp_data);
        $re_data['limit'] = $this->per_page;
    	$re_data['data'] = $article_data;
        
        $head_data['count'] = $_SESSION['count'];
        $head_data['theme'] = $theme;
		$head_data['type'] = $type;
		$head_data['media'] = $media;
		$head_data['language'] = $language;
		$head_data['province'] = $province;
		$head_data['search'] = $search;
		$re_head['head_data'] = $head_data;

		//赋值
		$_SESSION['theme'] = $theme;
		$_SESSION['type'] = $type;
		$_SESSION['media'] = $media;
		$_SESSION['language'] = $language;
		$_SESSION['province'] = $province;
		$_SESSION['search'] = $search;

		$this->load->view('header',$re_head);
		$this->load->view('article/article',$re_data);
		$this->load->view('footer');
	}
	/*
	 * search Audio( 通过search 和分类跳转过来) 只搜索name部分
	*/
	public function searchAudio($theme,$type,$media,$language,$province,$search)
	{
		//expert
		$page = 1;
    	$where=array();
    	$start=intval($page-1)*intval($this->per_page);
    	$orderby='ctime';
    	$order_type='desc';
    	//条件
    	$like = array();
    	$search = urldecode($search);
    	//限制返回结果最多十个
    	if($search != '0'){
    		$like['name'] = $search;
    	}
    	$province = urldecode($province);
    	//条件
    	if($theme>0){
    		$where['themeId'] = $theme;
    	}
    	if($type>0){
    		$where['type'] = $type;
    	}
    	if($language>0){
    		$where['language'] = $language;
    	}
    	if($province != '0'){
    		$where['province'] = $province;
    	}
    	//audio
    	$orderby = "create_time";
    	$select_field="id,name,author,title,description,source_url,seconds,themeId,type,language,province,listen_num,date_format(create_time,'%Y-%m-%d') as create_time";
        $audio_data=$this->Common->get_limit_order( $this->audio_table,$where,$start,$this->per_page,$orderby,$order_type,$select_field,$like);
        $tmp_data=$this->Common->get_limit_order( $this->audio_table,$where,$start,'',$orderby,$order_type,$select_field,$like);
        
        $re_data['count'] = count($tmp_data);
        $re_data['limit'] = $this->per_page;
    	$re_data['data'] = $audio_data;
        
        $head_data['count'] = $_SESSION['count'];
        $head_data['theme'] = $theme;
		$head_data['type'] = $type;
		$head_data['media'] = $media;
		$head_data['language'] = $language;
		$head_data['province'] = $province;
		$head_data['search'] = $search;
		$re_head['head_data'] = $head_data;

		//赋值
		$_SESSION['theme'] = $theme;
		$_SESSION['type'] = $type;
		$_SESSION['media'] = $media;
		$_SESSION['language'] = $language;
		$_SESSION['province'] = $province;
		$_SESSION['search'] = $search;

		$this->load->view('header',$re_head);
		$this->load->view('audio/audio',$re_data);
		$this->load->view('footer');
	}
	/*
	 * search picture( 通过search 和分类跳转过来) 只搜索name部分
	*/
	public function searchPicture($theme,$type,$media,$language,$province,$search)
	{
		//picture
		$page = 1;
    	$where=array();
    	$start=intval($page-1)*intval($this->per_page);
    	$orderby='ctime';
    	$order_type='desc';
    	//条件
    	$like = array();
    	$search = urldecode($search);
    	if($search != '0'){
    		$like['name'] = $search;
    	}
    	$province = urldecode($province);
    	//条件
    	if($theme>0){
    		$where['themeId'] = $theme;
    	}
    	if($type>0){
    		$where['type'] = $type;
    	}
    	if($language>0){
    		$where['language'] = $language;
    	}
    	if($province != '0'){
    		$where['province'] = $province;
    	}
    	//article
    	$select_field='*';
    	$picture_data=$this->Common->get_limit_order( $this->picture_table,$where,$start,$this->per_page,$orderby,$order_type,$select_field,$like);
    	$tmp_data=$this->Common->get_limit_order( $this->picture_table,$where,$start,'',$orderby,$order_type,$select_field,$like);
    	if(count($picture_data)>0){
    		foreach ($picture_data as $key => $value) {
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
	            	$picture_data[$key]['index'] = $dir."/".$index_name;
	            }else{
	            	$picture_data[$key]['index'] = $dir."/".$file_name;
	            }
    		}
    	}
    	
        $re_data['count'] = count($tmp_data);
        $re_data['limit'] = $this->per_page;
    	$re_data['data'] = $picture_data;
        
        $head_data['count'] = $_SESSION['count'];
        $head_data['theme'] = $theme;
		$head_data['type'] = $type;
		$head_data['media'] = $media;
		$head_data['language'] = $language;
		$head_data['province'] = $province;
		$head_data['search'] = $search;
		$re_head['head_data'] = $head_data;
		//赋值
		$_SESSION['theme'] = $theme;
		$_SESSION['type'] = $type;
		$_SESSION['media'] = $media;
		$_SESSION['language'] = $language;
		$_SESSION['province'] = $province;
		$_SESSION['search'] = $search;

		$this->load->view('header',$re_head);
		$this->load->view('picture/picture',$re_data);
		$this->load->view('footer');
	}	
	/*
	 * search PPT( 通过search 和分类跳转过来) 只搜索name部分
	*/
	public function searchPPT($theme,$type,$media,$language,$province,$search)
	{
		//expert
		$page = 1;
    	$where=array();
    	$start=intval($page-1)*intval($this->per_page);
    	$orderby='ctime';
    	$order_type='desc';
    	//条件
    	$like = array();
    	$search = urldecode($search);
    	//限制返回结果最多十个
    	if($search != '0'){
    		$like['name'] = $search;
    	}
    	$province = urldecode($province);
    	//条件
    	if($theme>0){
    		$where['themeId'] = $theme;
    	}
    	if($type>0){
    		$where['type'] = $type;
    	}
    	if($language>0){
    		$where['language'] = $language;
    	}
    	if($province != '0'){
    		$where['province'] = $province;
    	}
    	//audio
    	$orderby = "create_time";
    	$select_field="id,name,author,description,source_url,themeId,type,language,province,reader_num,date_format(create_time,'%Y-%m-%d') as create_time";
        $ppt_data=$this->Common->get_limit_order( $this->ppt_table,$where,$start,$this->per_page,$orderby,$order_type,$select_field);
        $tmp_data=$this->Common->get_limit_order( $this->ppt_table,$where,$start,'',$orderby,$order_type,$select_field,$like);
        
        $re_data['count'] = count($tmp_data);
        $re_data['limit'] = $this->per_page;
    	$re_data['data'] = $ppt_data;
        
        $head_data['count'] = $_SESSION['count'];
        $head_data['theme'] = $theme;
		$head_data['type'] = $type;
		$head_data['media'] = $media;
		$head_data['language'] = $language;
		$head_data['province'] = $province;
		$head_data['search'] = $search;
		$re_head['head_data'] = $head_data;
		//赋值
		$_SESSION['theme'] = $theme;
		$_SESSION['type'] = $type;
		$_SESSION['media'] = $media;
		$_SESSION['language'] = $language;
		$_SESSION['province'] = $province;
		$_SESSION['search'] = $search;

		$this->load->view('header',$re_head);
		$this->load->view('powerpoint/powerpoint',$re_data);
		$this->load->view('footer');
	}
	/*
	 * get the expert by gongkun
	*/
	public function expert($page=1)
	{
		//赋值
		$_SESSION['media'] = '1';
		$theme = $_SESSION['theme'];
		$type = $_SESSION['type'];
		$media = $_SESSION['media'];
		$language = $_SESSION['language'];
		$province = $_SESSION['province'];
		$search = $_SESSION['search'];
		//expert
    	$where=array();
    	$start=intval($page-1)*intval($this->exp_page);
    	$orderby='ctime';
    	$order_type='desc';
    	//条件
    	$like = array();
    	if($search != '0'){
    		$like['name'] = $search;
    	}
    	$select_field='id,name,title,address,header';
    	$expert_data=$this->Common->get_limit_order( $this->expert_table,$where,$start,$this->exp_page,$orderby,$order_type,$select_field,$like);
    	$tmp_data=$this->Common->get_limit_order( $this->expert_table,$where,$start,'',$orderby,$order_type,$select_field,$like);
    	$re_data['count'] = count($tmp_data);
        $re_data['limit'] = $this->exp_page;
    	$re_data['data'] = $expert_data;
        
        $head_data['count'] = $_SESSION['count'];
        $head_data['theme'] = $theme;
		$head_data['type'] = $type;
		$head_data['media'] = $media;
		$head_data['language'] = $language;
		$head_data['province'] = $province;
		$head_data['search'] = $search;
		$re_head['head_data'] = $head_data;

		$this->load->view('header',$re_head);
		$this->load->view('expert/expert',$re_data);
		$this->load->view('footer');
	}
	//expert info
	public function expertInfo($id=0)
	{
		$where=array('id' => $id);
		$data=$this->Common->get_one($this->expert_table,$where);
		$data['work']=str_replace("\n","<br>",$data['work']);  //换行
		$data['work']=str_replace(" ","&nbsp;",$data['work']);  //空格
		$data['introduce']=str_replace("\n","<br>",$data['introduce']);  //换行
		$data['introduce']=str_replace(" ","&nbsp;",$data['introduce']);  //空格
		$data['study']=str_replace("\n","<br>",$data['study']);  //换行
		$data['study']=str_replace(" ","&nbsp;",$data['study']);  //空格
		$data['education']=str_replace("\n","<br>",$data['education']);  //换行
		$data['education']=str_replace(" ","&nbsp;",$data['education']);  //空格
		$re_data['data']=$data;

		$this->load->view('header2');
		$this->load->view('expert/expertInfo',$re_data);
		$this->load->view('footer');
	}

	//audio
	public function audio($page=1)
	{
		//赋值
		$_SESSION['media'] = '4';
		$theme = $_SESSION['theme'];
		$type = $_SESSION['type'];
		$media = $_SESSION['media'];
		$language = $_SESSION['language'];
		$province = $_SESSION['province'];
		$search = $_SESSION['search'];

		$where=array();
    	$start=intval($page-1)*intval($this->per_page);
    	$orderby='ctime';
    	$order_type='desc';
    	//条件
    	$like = array();
    	if($search != '0'){
    		$like['name'] = $search;
    	}
    	if($theme>0){
    		$where['themeId'] = $theme;
    	}
    	if($type>0){
    		$where['type'] = $type;
    	}
    	if($language>0){
    		$where['language'] = $language;
    	}
    	if($province != '0'){
    		$where['province'] = $province;
    	}
    	//audio
    	$orderby = "create_time";
    	$select_field="id,name,author,title,description,source_url,seconds,themeId,type,language,province,listen_num,date_format(create_time,'%Y-%m-%d') as create_time";
        $audio_data=$this->Common->get_limit_order( $this->audio_table,$where,$start,$this->per_page,$orderby,$order_type,$select_field,$like);
        $tmp_data=$this->Common->get_limit_order( $this->audio_table,$where,$start,'',$orderby,$order_type,$select_field,$like);
        
        $re_data['count'] = count($tmp_data);
        $re_data['limit'] = $this->per_page;
    	$re_data['data'] = $audio_data;
        
        $head_data['count'] = $_SESSION['count'];
        $head_data['theme'] = $theme;
		$head_data['type'] = $type;
		$head_data['media'] = $media;
		$head_data['language'] = $language;
		$head_data['province'] = $province;
		$head_data['search'] = $search;
		$re_head['head_data'] = $head_data;

		$this->load->view('header',$re_head);
		$this->load->view('audio/audio',$re_data);
		$this->load->view('footer');
	}

	/* 
	 * audio info by 
	*/
	public function audioInfo($id=0)
	{
		$where = array('id' => $id);
		$data = $this->Common->get_one($this->audio_table,$where);
		$re_data['data'] = $data;
		$count = $data['listen_num'] + 1;
		$updae_data = array('listen_num' => $count);
		$this->Common->update($this->audio_table,$where,$updae_data);
		//$this->load->view('header2');
		$this->load->view('audio/audioinfo',$re_data);
		//$this->load->view('footer');	
	}	
	/*
	  * video info by gongkun
	*/
	public function video($page=1)
	{
		//赋值
		$_SESSION['media'] = '2';
		$theme = $_SESSION['theme'];
		$type = $_SESSION['type'];
		$media = $_SESSION['media'];
		$language = $_SESSION['language'];
		$province = $_SESSION['province'];
		$search = $_SESSION['search'];
    	$where=array();
    	$start=intval($page-1)*intval($this->per_page);
    	$orderby='ctime';
    	$order_type='desc';
    	//条件
    	$like = array();
    	if($search != '0'){
    		$like['name'] = $search;
    	}
    	//条件
    	if($theme>0){
    		$where['themeId'] = $theme;
    	}
    	if($type>0){
    		$where['type'] = $type;
    	}
    	if($language>0){
    		$where['language'] = $language;
    	}
    	if($province != '0'){
    		$where['province'] = $province;
    	}
    	//video
    	$select_field='id,name,author,title,read,type,ctime,covAddr,videoAddr';
    	$video_data=$this->Common->get_limit_order( $this->video_table,$where,$start,$this->per_page,$orderby,$order_type,$select_field,$like);
    	$tmp_data=$this->Common->get_limit_order( $this->video_table,$where,$start,'',$orderby,$order_type,$select_field,$like);
    	foreach ($video_data as $key => $value) {
           //theme
            $type_where = array('id' => $value['type']);
            $type_data = $this->Common->get_one($this->type_table,$type_where);
            $video_data[$key]['type'] = $type_data['name'];
        }
        $re_data['count'] = count($tmp_data);
        $re_data['limit'] = $this->per_page;
    	$re_data['data'] = $video_data;
        
        $head_data['count'] = $_SESSION['count'];
        $head_data['theme'] = $theme;
		$head_data['type'] = $type;
		$head_data['media'] = $media;
		$head_data['language'] = $language;
		$head_data['province'] = $province;
		$head_data['search'] = $search;
		$re_head['head_data'] = $head_data;

		$this->load->view('header',$re_head);
		$this->load->view('video/video',$re_data);
		$this->load->view('footer');
	}
	/*
	 * video info by gongkun
	 */
	public function videoInfo($id = 0)
	{
		$where = array('id' => $id);
		$data = $this->Common->get_one($this->video_table,$where);
		$re_data['data'] = $data;
		$count = $data['read'] + 1;
		$updae_data = array('read' => $count);
		$this->Common->update($this->video_table,$where,$updae_data);
		$this->load->view('header2');
		$this->load->view('video/videoinfo',$re_data);
		$this->load->view('footer');	
	}

	/*
	 * upload video test by gongkun
	*/
	public function uploadVideo()
	{
		$this->load->view('header2');
		$this->load->view('video/uploadVideo');
		$this->load->view('footer');	
	}

	/*
	 * get the article list by gongkun
	*/
	public function article($page=1)
	{
		//赋值
		$_SESSION['media'] = '3';
		$theme = $_SESSION['theme'];
		$type = $_SESSION['type'];
		$media = $_SESSION['media'];
		$language = $_SESSION['language'];
		$province = $_SESSION['province'];
		$search = $_SESSION['search'];

		$where=array();
    	$start=intval($page-1)*intval($this->per_page);
    	$orderby='ctime';
    	$order_type='desc';
    	//条件
    	$like = array();
    	if($search != '0'){
    		$like['name'] = $search;
    	}
    	//条件
    	if($theme>0){
    		$where['themeId'] = $theme;
    	}
    	if($type>0){
    		$where['type'] = $type;
    	}
    	if($language>0){
    		$where['language'] = $language;
    	}
    	if($province != '0'){
    		$where['province'] = $province;
    	}
    	//article
    	$select_field='*';
    	$article_data=$this->Common->get_limit_order( $this->article_table,$where,$start,$this->per_page,$orderby,$order_type,$select_field,$like);
    	$tmp_data=$this->Common->get_limit_order( $this->article_table,$where,$start,'',$orderby,$order_type,$select_field,$like);
    	
        $re_data['count'] = count($tmp_data);
        $re_data['limit'] = $this->per_page;
    	$re_data['data'] = $article_data;
        
        $head_data['count'] = $_SESSION['count'];
        $head_data['theme'] = $theme;
		$head_data['type'] = $type;
		$head_data['media'] = $media;
		$head_data['language'] = $language;
		$head_data['province'] = $province;
		$head_data['search'] = $search;
		$re_head['head_data'] = $head_data;

		$this->load->view('header',$re_head);
		$this->load->view('article/article',$re_data);
		$this->load->view('footer');
	}

	/*
	 *  articleInfo by gongkun
	*/
	public function articleInfo($id=0)
	{
		$where = array('id' => $id);
		$data = $this->Common->get_one($this->article_table,$where);
		$re_data['data'] = $data;
		$count = $data['reader_num'] + 1;
		$updae_data = array('reader_num' => $count);
		$this->Common->update($this->article_table,$where,$updae_data);
		$this->load->view('header2');
		$this->load->view('article/articleInfo',$re_data);
		$this->load->view('footer');
	}

	/*
	 * get the picture first page by gongkun
	*/
	public function picture($page=1)
	{
		//赋值
		$_SESSION['media'] = '5';
		$theme = $_SESSION['theme'];
		$type = $_SESSION['type'];
		$media = $_SESSION['media'];
		$language = $_SESSION['language'];
		$province = $_SESSION['province'];
		$search = $_SESSION['search'];
		$where=array();
    	$start=intval($page-1)*intval($this->per_page);
    	$orderby='ctime';
    	$order_type='desc';
    	//条件
    	$like = array();
    	if($search != '0'){
    		$like['name'] = $search;
    	}
    	//条件
    	if($theme>0){
    		$where['themeId'] = $theme;
    	}
    	if($type>0){
    		$where['type'] = $type;
    	}
    	if($language>0){
    		$where['language'] = $language;
    	}
    	if($province != '0'){
    		$where['province'] = $province;
    	}
    	//article
    	$select_field='*';
    	$picture_data=$this->Common->get_limit_order( $this->picture_table,$where,$start,$this->per_page,$orderby,$order_type,$select_field,$like);
    	$tmp_data=$this->Common->get_limit_order( $this->picture_table,$where,$start,'',$orderby,$order_type,$select_field,$like);
    	if(count($picture_data)>0){
    		foreach ($picture_data as $key => $value) {
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
	            	$picture_data[$key]['index'] = $dir."/".$index_name;
	            }else{
	            	$picture_data[$key]['index'] = $dir."/".$file_name;
	            }
    		}
    	}
    	
        $re_data['count'] = count($tmp_data);
        $re_data['limit'] = $this->per_page;
    	$re_data['data'] = $picture_data;
        
        $head_data['count'] = $_SESSION['count'];
        $head_data['theme'] = $theme;
		$head_data['type'] = $type;
		$head_data['media'] = $media;
		$head_data['language'] = $language;
		$head_data['province'] = $province;
		$head_data['search'] = $search;
		$re_head['head_data'] = $head_data;

		$this->load->view('header',$re_head);
		$this->load->view('picture/picture',$re_data);
		$this->load->view('footer');

	}

	/*
	 * get the picture detail info by gongkun
	*/
	public function pictureInfo($id=0)
	{
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
		                       	$pic_name[0] = "/".$dir."/".'index.jpg';
		                       	$pic_name[$i] = $tmp_name;
		                    }else{
		                       	$pic_name[$i] = "/".$dir."/index.png";
		                    }
	                    }else if($file == 'index.jpeg'){
	                        if($i>0){
		                       	$tmp_name = $pic_name[0];
		                       	$pic_name[0] = "/".$dir."/".'index.jpg';
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
	    if($i>0){
	    	$data['index'] = $pic_name[0];
	    }else{
	    	$data['index'] = '';
	    }
	    $re_data['picture'] = json_encode($pic_name);
	   	$re_data['data'] = $data;

	    // get the recomand 3 pictures
	    $page=1;
    	$where=array();
    	$start=intval($page-1)*intval($this->pic_page);
    	$orderby='ctime';
    	$order_type='desc';
    	$select_field='*';
    	$data=$this->Common->get_limit_order( $this->picture_table,$where,$start,$this->pic_page,$orderby,$order_type,$select_field);
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

    	$re_data['reData'] =$data;
  //   	$count = $data['read'] + 1;
		// $updae_data = array('read' => $count);
		// $this->Common->update($this->picture_table,$where,$updae_data);
		$this->load->view('header2');
		$this->load->view('picture/pictureInfo',$re_data);
		$this->load->view('footer');

	}


	public function powerpoint($page=1)
	{
		//赋值
		$_SESSION['media'] = '6';
		$theme = $_SESSION['theme'];
		$type = $_SESSION['type'];
		$media = $_SESSION['media'];
		$language = $_SESSION['language'];
		$province = $_SESSION['province'];
		$search = $_SESSION['search'];	
		$where=array();
    	$start=intval($page-1)*intval($this->per_page);
    	$orderby='ctime';
    	$order_type='desc';
    	//条件
    	$like = array();
    	if($search != '0'){
    		$like['name'] = $search;
    	}
    	if($theme>0){
    		$where['themeId'] = $theme;
    	}
    	if($type>0){
    		$where['type'] = $type;
    	}
    	if($language>0){
    		$where['language'] = $language;
    	}
    	if($province != '0'){
    		$where['province'] = $province;
    	}
    	//audio
    	$orderby = "create_time";
    	$select_field="id,name,author,description,source_url,themeId,type,language,province,reader_num,date_format(create_time,'%Y-%m-%d') as create_time";
        $ppt_data=$this->Common->get_limit_order( $this->ppt_table,$where,$start,$this->per_page,$orderby,$order_type,$select_field);
        $tmp_data=$this->Common->get_limit_order( $this->ppt_table,$where,$start,'',$orderby,$order_type,$select_field,$like);
        
        $re_data['count'] = count($tmp_data);
        $re_data['limit'] = $this->per_page;
    	$re_data['data'] = $ppt_data;
        
        $head_data['count'] = $_SESSION['count'];
        $head_data['theme'] = $theme;
		$head_data['type'] = $type;
		$head_data['media'] = $media;
		$head_data['language'] = $language;
		$head_data['province'] = $province;
		$head_data['search'] = $search;
		$re_head['head_data'] = $head_data;
		//赋值
		$_SESSION['theme'] = $theme;
		$_SESSION['type'] = $type;
		$_SESSION['media'] = $media;
		$_SESSION['language'] = $language;
		$_SESSION['province'] = $province;
		$_SESSION['search'] = $search;

		$this->load->view('header',$re_head);
		$this->load->view('powerpoint/powerpoint',$re_data);
		$this->load->view('footer');
	}

	public function powerpointInfo($id=0)
	{
		$where = array('id' => $id);
		$data = $this->Common->get_one($this->ppt_table,$where);
		$re_data['data'] = $data;

		$count = $data['reader_num'] + 1;
		$updae_data = array('reader_num' => $count);
		$this->Common->update($this->ppt_table,$where,$updae_data);
		
		$this->load->view('powerpoint/powerpointinfo',$re_data);
	}
	// 测试函数
	public function testdemo($pic_id=1)
	{
		//测试全局变量和model
		$data = array(
		    'title' => 'My Title',
		    'heading' => 'My Heading',
		    'message' => 'My Message',
		    'username' => $_SESSION['username'],
		    'pic_id' => $pic_id,
		    'api_url' => $this->api_url,
		    'url' => $this->per_page,
		    'data'=> $this->Common->testModel()
		);
		if($_POST){
			$postinfo= $this->Common->html_filter_array($_POST);
			$data['postinfo']=$postinfo;

			// $where=array('id' => '10');
			// $sql_data=$this->Common->get_all($this->user_table,$where);
			$select_field='id,username,nickname';
			// $sql_data=$this->Common->get_one($this->user_table,$where,$select_field);
			// $where=array();
			$start=0;	
			$like=array('nickname' => '张');
			$orderby='id';
			//$sql_data=$this->Common->get_limit_order( $this->user_table, $where, $start,$this->per_page,'ctime','DESC',$like);
			
			// $where=array('id' => '100','offPrice'=>'200');
			// $sql_data=$this->Common->delete($this->user_table,$where);
			// $where=array('id' => '100');
			$up_data=array('offPrice' => '300','weixin'=>'gongkun');
			// $sql_data=$this->Common->update($this->user_table,$where,$up_data);

			$insert_data=array('username' => '18910111135','password'=>'123456','nickname'=>'fuck123','user_type'=>'2','weixin'=>'gongkun123','if_check'=>'0');
			// $sql_data = $this->Common->add($this->user_table,$insert_data);
			$where=array();
			// $sql_data = $this->Common->get_count($this->user_table,$where,$like);

			// $sql_data = $this->Common->save($this->user_table,$insert_data);



			$data['sql_data'] = $sql_data;
		}

		$data['data']=$data;
		$this->load->view('header');
		$this->load->view('main/testdemo',$data);
		// $this->load->view('footer');
	}


	//测试跳转
	public function message()
	{
		$data['title']='message';
		$this->load->view('welcome_message');
	}

	// //视频链接
	// public function video()
	// {
	// 	$data['title'] ='video';
	// 	$this->load->view('header');
	// 	$this->load->view('video/video');
	// 	$this->load->view('footer');
	// }

	

	public function chronic_disease(){
		$this->load->view('header');
		$this->load->view("main/chronic_disease");
		$this->load->view('footer');
	}

	public function testPPT(){
		$this->load->view('main/testPPT');
	}
}








