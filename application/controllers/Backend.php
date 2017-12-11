<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backend extends MY_Controller {

	public function __construct() {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('backend/header');
        $this->load->view('backend/index');

        // $this->load->view('backend/footer');
    }

    public function login()
    {
    	$this->load->view('backend/login');
    }

    //main
    public function main()
    {
    	// $this->load->view('backend/main');	
        $data=$this->Common->get_all($this->user_table);
        $re_data['data'] = $data;
        $this->load->view('backend/header');
        $this->load->view('backend/userAdmin',$re_data);
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

    //其他的类似更改

    /*
     *  user Admin by gongkun 
    */
    public function userAdmin()
    {
        $data=$this->Common->get_all($this->user_table);
        $re_data['data'] = $data;

        $this->load->view('backend/header');
        $this->load->view('backend/userAdmin',$re_data);
        $this->load->view('backend/footer');
    }
}








