<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends MY_Controller {

	public function __construct() {
        parent::__construct();
        //在此处加载model 自定义也可以
        //$this->load->database();
 		// $this->load->helper('url_helper');

    }

    //主页
	public function index()
	{
		
		if(!isset($_SESSION['userid'])){
			$_SESSION['userid']=0;
		}
		$this->load->view('header');
		$this->load->view('main/index');
		$this->load->view('footer');
	}

	//login
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
				redirect('main/index');
			}
		}
		$this->load->view('header');
		$this->load->view('user/login');
		$this->load->view('footer');
	}
	//logout
	public function logout()
	{
		$_SESSION['userid']=0;
		$_SESSION['username'] = '';
		$_SESSION['nickname']='';
		redirect('main/index');
	}

	//register
	public function register()
	{	
		if($_POST){
			$postinfo= $this->Common->html_filter_array($_POST);
			$time=time();
			$add_data=array('username' => $postinfo['phone'],'nickname' => $postinfo['username'],'password' => $postinfo['password'],'ctime' =>$time);
			$rep=$this->Common->add($this->user_table,$add_data);
			if($rep>0){
				$_SESSION['userid']=$rep;
				$_SESSION['username']=$postinfo['phone'];
				$_SESSION['nickname']=$postinfo['username'];
				redirect('main/index');
				// $data['postinfo']=$postinfo;
				// $this->load->view('header');
				// $this->load->view('main/testdemo',$data);
				// $this->load->view('footer');
			}
		}
		$this->load->view('header');
		$this->load->view('user/register');
		$this->load->view('footer');
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
			}
		}
		$this->load->view('header');
		$this->load->view('user/forget');
		$this->load->view('footer');
	}

	//forgetPass
	public function forgetPass()
	{
		$this->load->view('header');
		$this->load->view('user/forget');
		$this->load->view('footer');	
	}

	//expert
	public function expert($page=1)
	{
		//get the expert
		$page=$page;
    	$where=array();
    	$start=intval($page-1)*10;
    	$orderby='ctime';
    	$order_type='desc';
    	$select_field='id,name,title,address';
    	$data=$this->Common->get_limit_order( $this->expert_table,$where,$start,$this->per_page,$orderby,$order_type,$select_field);		
    	$re_data['data']= $data;

		$this->load->view('header');
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
		$this->load->view('header');
		$this->load->view('expert/expertInfo',$re_data);
		$this->load->view('footer');
	}

	//audio
	public function audio()
	{
		$this->load->view('header');
		$this->load->view('audio/audio');
		$this->load->view('footer');	
	}

	//audioinfo
	public function audioInfo()
	{
		$this->load->view('header');
		$this->load->view('audio/audioinfo');
	}

	//视频链接
	public function video()
	{
		$data['title'] ='video';
		$this->load->view('header');
		$this->load->view('video/video');
		$this->load->view('footer');
	}
	//video info
	public function videoInfo()
	{
		$this->load->view('header');
		$this->load->view('video/videoinfo');
		$this->load->view('footer');	
	}

	//article
	public function article()
	{
		$this->load->view('header');
		$this->load->view('article/article');
		$this->load->view('footer');
	}

	//articleInfo
	public function articleInfo()
	{
		$this->load->view('header');
		$this->load->view('article/articleInfo');
		$this->load->view('footer');
	}

	//picture
	public function picture()
	{
		$this->load->view('header');
		$this->load->view('picture/picture');
		$this->load->view('footer');

	}

	//picture info
	public function pictureInfo()
	{
		$this->load->view('header');
		$this->load->view('picture/pictureInfo');
		$this->load->view('footer');

	}

	public function powerpoint()
	{
		$this->load->view('header');
		$this->load->view('powerpoint/powerpoint');
		$this->load->view('footer');

	}

	public function powerpointInfo()
	{
		$this->load->view('header');
		$this->load->view('powerpoint/powerpointinfo');
		$this->load->view('footer');

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








