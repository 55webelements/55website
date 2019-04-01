<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home_model extends CI_Model {

	public function checkUser($params)
	{
		$this->db->select("*")->from("users")->where(array("email" => $params["email"],"password" => $params["password"], "status" => 1))->where_in("usertype",array(1));
		$query=$this->db->get();
		//echo $query->num_rows();die();
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return array();
		}
	}
	
	public function getUserDetailsByEmail($email)
	{
		$this->db->select("*")->from('users')->where("email",$email);
		$query = $this->db->get();
		//echo $this->db->last_query();die();
		if($query->num_rows() == 1)
		{
			return $query->result();
		}
		else
		{
			return array();
		}
	}
	
	public function getUserDetails($email)
	{
		$this->db->select("*")->from("users")->where(array("usertype" => 1,"email" => $email));
		$query=$this->db->get();
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else{
			return array();
		}
	}
	
	public function updateNewPassword($params,$email)
	{
		$query=$this->db->update("users",$params,array("email" => $email));
		if($query)
		{
			return 1;
		}
		else{
			return 0;
		}
	}
	
	public function getSuperAdminUserDetails()
	{
		$this->db->select("email,mobile")->from("users")->where(array("usertype" => 1,"status" => 1));
		$query=$this->db->get();
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else{
			return array();
		}
	}	
	
	public function getSitename()
	{
		$query = $this->db->select("*")->from("configurations")->where(array("configTitle" => "sitename"))->get();
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else{
			return array();
		}
	}
	
	public function getAllInfo($table,$orderBy=null)
	{
		if($orderBy !='')
		{
			$this->db->order_by($orderBy,"ASC");
		}
		$query = $this->db->select("*")->from($table)->get();
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else{
			return array();
		}
	}
	
	public function getConferences($table,$orderBy=null)
	{
		if($orderBy !='')
		{
			$this->db->order_by($orderBy,"ASC");
		}
		$this->db->join("regions b","a.country_id = b.id","LEFT");
		$query = $this->db->select("a.*,b.region_title")->from($table." a")->get();
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else{
			return array();
		}
	}
	
	public function getInfobyId($table,$bannerid)
	{
		$query = $this->db->select("*")->from($table)->where("id",$bannerid)->get();
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else{
			return array();
		}
	}
	
	public function getPageInfobyId($table,$column,$bannerid)
	{
		$query = $this->db->select("*")->from($table)->where($column,$bannerid)->get();
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else{
			return array();
		}
	}
	
	public function storeItems($table,$params)
	{
		$query=$this->db->insert($table,$params);
		if($query)
		{
			return 1;
		}
		else{
			return 0;
		}
	}
	
	public function removeBannerimage($bannerid)
	{
		$this->db->select("*")->from("banners")->where(array("id" => $bannerid));
		$query=$this->db->get();
		//echo $this->db->last_query();die();
		if($query->num_rows() > 0)
		{
			$result=$query->result();
			$delete=@unlink(FCPATH . 'uploads/banners/' . $result[0]->banner_img);
			if($delete)
			{
				return 1;
			}
			else
			{
				return 0;
			}
		}
	}
	
	public function removeFeatureimage($bannerid)
	{
		$this->db->select("*")->from("web_cms")->where(array("id" => $bannerid));
		$query=$this->db->get();
		//echo $this->db->last_query();die();
		if($query->num_rows() > 0)
		{
			$result=$query->result();
			$delete=@unlink(FCPATH . 'uploads/banners/' . $result[0]->cms_img);
			if($delete)
			{
				return 1;
			}
			else
			{
				return 0;
			}
		}
	}
	
	public function removeConferenceimage($bannerid)
	{
		$this->db->select("*")->from("conferences")->where(array("id" => $bannerid));
		$query=$this->db->get();
		//echo $this->db->last_query();die();
		if($query->num_rows() > 0)
		{
			$result=$query->result();
			$delete=@unlink(FCPATH . 'uploads/conferences/' . $result[0]->conference_img);
			if($delete)
			{
				return 1;
			}
			else
			{
				return 0;
			}
		}
	}
	
	public function removeSpeakerimage($bannerid)
	{
		$this->db->select("*")->from("scientific_committee")->where(array("id" => $bannerid));
		$query=$this->db->get();
		//echo $this->db->last_query();die();
		if($query->num_rows() > 0)
		{
			$result=$query->result();
			$delete=@unlink(FCPATH . 'uploads/committee/' . $result[0]->speaker_img);
			if($delete)
			{
				return 1;
			}
			else
			{
				return 0;
			}
		}
	}
	
	public function updateItems($table,$params,$bannerid)
	{
		$query=$this->db->update($table,$params,array("id" => $bannerid));
		if($query)
		{
			return 1;
		}
		else{
			return 0;
		}
	}
	
	public function deletebanners($bannerid)
	{		
		$this->db->select("*")->from("banners")->where(array("id" => $bannerid));		
		$query=$this->db->get();
		
		if($query->num_rows() == 1)
		{
			$result=$query->result();
			@unlink(FCPATH . 'uploads/banners/' . $result[0]->banner_img);								
		}
		$deletequery=$this->db->delete("banners",array("id" => $bannerid));
		if($deletequery)
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}
	
	public function deleteUniquefeatures($bannerid)
	{		
		$this->db->select("*")->from("web_cms")->where(array("id" => $bannerid));		
		$query=$this->db->get();
		
		if($query->num_rows() == 1)
		{
			$result=$query->result();
			@unlink(FCPATH . 'uploads/banners/' . $result[0]->banner_img);								
		}
		$deletequery=$this->db->delete("web_cms",array("id" => $bannerid));
		if($deletequery)
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}
	
	public function deletecommittee($bannerid)
	{		
		$this->db->select("*")->from("scientific_committee")->where(array("id" => $bannerid));		
		$query=$this->db->get();
		
		if($query->num_rows() == 1)
		{
			$result=$query->result();
			@unlink(FCPATH . 'uploads/committee/' . $result[0]->speaker_img);								
		}
		$deletequery=$this->db->delete("scientific_committee",array("id" => $bannerid));
		if($deletequery)
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}
	
	public function deleteconferences($bannerid)
	{		
		$this->db->select("*")->from("conferences")->where(array("id" => $bannerid));		
		$query=$this->db->get();
		
		if($query->num_rows() == 1)
		{
			$result=$query->result();
			@unlink(FCPATH . 'uploads/conferences/' . @$result[0]->conference_img);
			if(@$result[0]->folder_name !='')
			{
				//$path=$_SERVER["DOCUMENT_ROOT"].'/'."conferences/". @$result[0]->folder_name;
				//$this->deleteDirectory($path);
			}			
		}
		$deletequery=$this->db->delete("conferences",array("id" => $bannerid));
		if($deletequery)
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}
	
	public function deleteDirectory($dirPath) {
		if (is_dir($dirPath)) {
			$objects = scandir($dirPath);
			foreach ($objects as $object) {
				if ($object != "." && $object !="..") {
					if (filetype($dirPath . DIRECTORY_SEPARATOR . $object) == "dir") {
						$this->deleteDirectory($dirPath . DIRECTORY_SEPARATOR . $object);
					} else {
						unlink($dirPath . DIRECTORY_SEPARATOR . $object);
					}
				}
			}
		reset($objects);
		rmdir($dirPath);
		}
	}	
	
	public function deletemeta($bannerid)
	{		
		$deletequery=$this->db->delete("meta_data",array("id" => $bannerid));
		if($deletequery)
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}
	
	public function deleteContentByPage($page)
	{
		$deletequery=$this->db->delete("web_cms",array("page_type" => $page));
		if($deletequery)
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}
	
	public function removeUploadedImage($table,$rowId,$folder,$coloumn)
	{
		$this->db->select("*")->from($table)->where(array("id" => $rowId));
		$query=$this->db->get();
		//echo $this->db->last_query();die();
		if($query->num_rows() > 0)
		{
			$result=$query->result();
			$delete=@unlink(FCPATH . 'uploads/'.@$folder.'/' . $result[0]->$coloumn);
			if($delete)
			{
				return 1;
			}
			else
			{
				return 0;
			}
		}
	}
	
	public function deleteDatawithMedia($table,$rowId,$folder,$coloumn)
	{
		$this->db->select("*")->from($table)->where(array("id" => $rowId));
		$query=$this->db->get();
		//echo $this->db->last_query();die();
		if($query->num_rows() > 0)
		{
			$result=$query->result();
			$delete=$this->db->delete($table,array("id" => $rowId));
			if($delete)
			{
				@unlink(FCPATH . 'uploads/'.@$folder.'/' . $result[0]->$coloumn);
				return 1;
			}
			else
			{
				return 0;
			}
		}
	}
	
	public function deleteInfoByTableAndId($table,$id)
	{
		$deletequery=$this->db->delete($table,array("id" => $id));
		if($deletequery)
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}
	
	public function getInfoByPage($table,$page)
	{
		$query = $this->db->select("*")->from($table)->where("page_type",$page)->get();
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else{
			return array();
		}
	}
	
	public function chkConferenceExistsOrNot($enterVal)
	{
		$query = $this->db->select("*")->from("conferences")->where("folder_name",$enterVal)->get();
		if($query->num_rows() > 0)
		{
			return 1;
		}
		else{
			return 0;
		}
	}
	
	public function chkConferenceExistsOrNotin($enterVal,$bannersid)
	{
		$query = $this->db->select("*")->from("conferences")->where("folder_name",$enterVal)->where_not_in("id",array($bannersid))->get();
		if($query->num_rows() > 0)
		{
			return 1;
		}
		else{
			return 0;
		}
	}
	
	public function getConferenceUsers($conferenceId)
	{
		$query = $this->db->select("*")->from("users")->where("conference_id",$conferenceId)->get();
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else{
			return array();
		}
	}
	
	public function checkPageExistsOrnot($pageTitle)
	{
		$query = $this->db->select("*")->from("pages")->where("page_title",$pageTitle)->get();
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else{
			return array();
		}
	}
	
	public function deletepages($pageId)
	{
		$query = $this->db->select("*")->from("pages")->where("id",$pageId)->get();
		if($query->num_rows() > 0)
		{
			$bhanu=$query->result();
			$pageTitle=$bhanu[0]->page_title;
			$tej=@unlink($_SERVER["DOCUMENT_ROOT"]."/".$pageTitle.'.php');
			if($tej)
			{
				$deletequery=$this->db->delete("pages",array("id" => $pageId));
				if($deletequery)
				{
					$this->db->delete("pages_content",array("page_id" => $pageId));
				}
			}
		}
		else{
			return array();
		}
	}
	
	public function getTableRowDataOrder($table,$where,$column,$order)
	{
		$this->db->select("*")->from($table)->where($where)->order_by($column,$order);
		$query = $this->db->get();
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return array();
		}

	}
	
	public function getAllInfobyType($table,$coloumn,$type,$ordBy=null)
	{
		if($ordBy !='')
		{
			$this->db->order_by("id",$ordBy);
		}
		$this->db->where(array($coloumn => $type));
		$conferenceId=$this->session->userdata("conferenceId");
		$query = $this->db->select("*")->from($table)->where(array("status" => 1))->get();
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else{
			return array();
		}
	}
}