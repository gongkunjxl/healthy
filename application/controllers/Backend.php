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
        $count=$this->Common->get_count($this->article_table,'','');
        $re_data['data'] = $data;
        $re_data['count'] = $count;
        $re_data['limit'] = $this->per_page;
        $this->load->view('backend/header');
        $this->load->view('backend/articleAdmin',$re_data);
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
        $orderby='ctime';
        $order_type='desc';
        $select_field='id,name,sex,nation,school,title,major,record,address,ctime';
        $data=$this->Common->get_limit_order( $this->expert_table,$where,$start,$this->per_page,$orderby,$order_type,$select_field);
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
        $orderby='ctime';
        $order_type='desc';
        $select_field='*';
        $data=$this->Common->get_limit_order( $this->article_table,$where,$start,$this->per_page,$orderby,$order_type,$select_field);
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



}








