<?php
  class Helpers{

  	public static function sample_helper(){
  		return "hello";
  	}
    /*-------------- Generate Slug ----*/
	public static function Slug($string){
	   $CI = &get_instance();
		return strtolower(trim(preg_replace('~[^0-9a-z]+~i', '-', html_entity_decode(preg_replace('~&([a-z]{1,2})(?:acute|cedil|circ|grave|lig|orn|ring|slash|th|tilde|uml);~i', '$1', htmlentities($string, ENT_QUOTES, 'UTF-8')), ENT_QUOTES, 'UTF-8')), '-'));

	}
	public static function check_slug_exists($slug,$table_name,$field_name,$id,$field_id){
	   $CI = &get_instance();
		$cond=($id!='' && $id > 0) ? " AND ".$field_id."!='".$id."'" : "";		
		$qry=$CI->Common_model->selRowData($table_name,"",$field_name."='$slug' AND status !=2 ".$cond."");
		// $qry=mysql_query("SELECT * FROM ".$table_name." WHERE ".$field_name."='$slug' ".$cond."");
		if($qry)
			return true;		
		else		
			return false;					
	}

	public static function create_unique_slug($val,$table_name,$field_name,$id,$fieldid,$counter=0)	{	
	   $CI = &get_instance();	
		if($counter>0)		
			$slug = $this->Slug($val).'-'.$counter;		
		else		
			$slug = $this->Slug($val);	
		$check_slug_exists =$this->check_slug_exists($slug,$table_name,$field_name,$id,$fieldid);
		if($check_slug_exists){
			$counter++;
			 return $this->create_unique_slug($val,$table_name,$field_name,$id,$fieldid, $counter);	
		}
		return $slug;		
	}
	public function skills()
    {
        return "asssss";

       
    }
     	
  }
