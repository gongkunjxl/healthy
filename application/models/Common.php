<?php

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


}
?>