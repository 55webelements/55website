<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home_model extends CI_Model {
	
	public function getInfo($table){
		$this->db->select('*')->from("{PRE}".$table);//->where(@str_replace("-"," ",strtolower($web[$i]->title));
		$query=$this->db->get();
		if($query->num_rows()>0){
			return $query->result();
		}else{
			return array();
		}
	}
        public function getWebDetailsByAlias($alias)
	{
		$this->db->select('*')->from("{PRE}web")->where(array("aliasTitle"=>$alias));
		$query=$this->db->get();
		if($query->num_rows()>0){
			return $query->result();
		}else{
			return array();
		}
	}
        public function getInfoByTitle($table,$webid){
		$this->db->select('*')->from("{PRE}".$table)->where(array("web_id"=>$webid));
		$query=$this->db->get();
		if($query->num_rows()>0){
			return $query->result();
		}else{
			return array();
		}
	}
	public function getInfoByTitle2($table,$mobileid){
		$this->db->select('*')->from("{PRE}".$table)->where(array("mobile_id"=>$mobileid));
		$query=$this->db->get();
		if($query->num_rows()>0){
			return $query->result();
		}else{
			return array();
		}
	}
	
	public function getInfoById($table,$pagetype){
		$this->db->select('*')->from("{PRE}".$table)->where(array("page_title"=>$pagetype));
		$query=$this->db->get();
		if($query->num_rows()>0){
			return $query->result();
		}else{
			return array();
		}
	}
	
	public function getBlogInfo($table){
		$this->db->select('*')->from("{PRE}".$table)->limit(1,0)->order_by("id","DESC");
		$query=$this->db->get();
		
		if($query->num_rows()>0){
			return $query->result();
		}else{
			return array();
		}
	}
	public function getBlogTotalInfo($table){
		$this->db->select('*')->from("{PRE}".$table)->limit(6,1)->order_by("id","DESC");
		$query=$this->db->get();
		if($query->num_rows()>0){
			return $query->result();
		}else{
			return array();
		}
	}
	public function storeInfo($params,$table)
	{
		$query=$this->db->insert("{PRE}".$table,$params);
		if($query)
		{
			return $this->db->insert_id();
		}else{
			return 0;
		}
		
		
	}
	public function getsuperadmindetails(){
		$this->db->select('*')->from("{PRE}users")->where("usertype",1);
		$query=$this->db->get();
		if($query->num_rows()>0){
			return $query->result();
		}else{
			return array();
		}
		
	}
	
	
}
	
	
	




/* End of file users.php */
/* Location: ./application/modules/users/controllers/users.php */
	