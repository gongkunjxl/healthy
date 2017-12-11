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
    public function main($page=1)
    {
    	// $this->load->view('backend/main');	
         
        $page=$page;
        $where=array();
        $start=intval($page-1)*10;
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








