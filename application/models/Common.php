<?php
date_default_timezone_set("Asia/Shanghai");
class Common extends CI_Model 
{
	public $title;

    function __construct() 
	{
        parent::__construct();
    }

    // test model
    public function testModel()
    {
    	$title="model";
    	$per_page=$this->per_page;
    	$data['title']=$title;
    	$data['per_page']=$per_page;
    	return $data;
    }
    // get the form request paramters
    function html_filter_array($array){
		foreach($array as $key=>$one){
			if(!is_array($one)){
				$array[$key] = htmlspecialchars($one,ENT_QUOTES);
			}else{
				$array[$key] = $this->html_filter_array($one);
			}
		}
		return $array;
	}

    /*
        * get all the data (where)  by gongkun
    */
    public function get_all($table, $where=array())
    {
        if(!empty($where)){
            $this->db->where($where);
        }
        $select_field='*';
        $this->db->select($select_field);
        $query = $this->db->get($table);
        if($query){
            return $query->result_array();
        }else{
            return '';
        }
    }

    /*
        * get one data by (where,filed) by gongkun
    */
    public function get_one($table,$where=array(),$select_field='*')
    {
        if(!empty($where)){
            $this->db->where($where);
        }
        $this->db->select($select_field);
        $query = $this->db->get($table);
        if($query){
            return $query->row_array();
        }else{
            return '';
        }
    }

     /*
        * get one data by (where,filed) by gongkun used for search and limit pages
    */
    function get_limit_order( $table='',$where=array(),$start=0,$limit=10,$orderby='id',$order_type='desc',$select_field='*',$like = array())
    {
      
        if( !empty($table) ){   
            $this->db->from($table);
            $this->db->where($where);   
            $this->db->select($select_field);
            if( $like )
            {
                $this->db->like($like);
            }               
            if( $limit )
            {
                $this->db->limit($limit,$start);
            }
            $this->db->order_by($orderby,$order_type);                      
            $query = $this->db->get();
            return $query->result_array();
        }else{
            return '';
        }
    }
    /*
        *delete data form table by gongkun
    */
    function delete($table, $where=array() )
    {
        if( !empty($where) )
        {
            $res = $this->db->delete($table, $where);
            return $res;
        }
        else{
            return false;
        }
    }

    /*
        *get the num of results by gongkun
    */
    function get_count( $table ,$where=array(),$like = array()){
        if( !empty($where) )
            $this->db->where($where);
        if($like)
        {
            $this->db->like($like );
        }       
        $this->db->from($table);
        return $this->db->count_all_results();
    }

    /*
        * update table  by gongkun
    */
    function update( $table, $where=array(),$data=array())
    {
        $this->db->where($where );
        $res = $this->db->update($table,$data); 
        return $res;
    }

    /*
        * insert data  by gongkun (不会判断数据是否重复)
    */
    function add( $table, $data=array() )
    {
        $res = $this->db->insert($table, $data);
        $res = $this->db->insert_id();
        return $res;
    }    

     /*
        * insert data  by gongkun (先判断数据是否重复 不重复则插入)
    */ 
    function save( $table, $data=array() )
    {
        $res = $this->get_count($table, $data);
        if($res<=0){
            // $data['ctime'] = time();
            $res = $this->db->insert($table, $data);
            $res = $this->db->insert_id();
            return $res;
        }else{
            return 0;
        }
        
    }
     /*
        * select data by sql language  gongkun (通过纯sql语句执行操作 传入操作类型)  
    */
    function get_sql($sql, $action='')
    {
        $query = $this->db->query($sql);
        if($action == 'update' || $action == 'insert' )
        {
            return $query;
        }
        else
        {
            return $query->result_array();
        }
    }

    /*
     * get the pdf pages by gongkun
    */
    public function getPdfPage($path){
        if (!$fp = @fopen($path,"r")) {
          $error = "打开文件{$path}失败";
          return false;
        }
        else {
          $max=0;
          while(!feof($fp)) {
            $line = fgets($fp,255);
            if (preg_match('/\/Count [0-9]+/', $line, $matches)){
              preg_match('/[0-9]+/',$matches[0], $matches2);
              if ($max<$matches2[0]) $max=$matches2[0];
            }
          }
          fclose($fp);
          // 返回页数
          return $max;
        }
    }

}
?>










