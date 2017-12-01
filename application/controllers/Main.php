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
		$this->load->view('header');
		$this->load->view('main/index');
		$this->load->view('footer');
	}

	// 图片预览
	public function testdemo($pic_id=1)
	{
		$data = array(
		    'title' => 'My Title',
		    'heading' => 'My Heading',
		    'message' => 'My Message',
		    'pic_id' => $pic_id,
		    'url' => $this->per_page
		);
		$data['data']=$data;
		// $this->load->view('header');
		$this->load->view('main/testdemo',$data);
		// $this->load->view('footer');
	}


	//测试跳转
	public function message()
	{
		$data['title']='message';
		$this->load->view('welcome_message');
	}



	//视频链接
	public function video()
	{
		$data['title'] ='video';
		$this->load->view('header');
		$this->load->view('video/video');
		$this->load->view('footer');
	}
	public function chronic_disease(){
		$this->load->view('header');
		$this->load->view("main/chronic_disease");
		$this->load->view('footer');
	}
}








