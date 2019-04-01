<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sql extends CI_Model {
	public function __construct() 
    {
        parent::__construct(); 
        $this->load->database();
    }
	
	public function getSiteInfo()
	{
		$this->db->select("*")->from("configurations")->where(array('status' => 1));
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
	
	public function checkLogin($email,$password)
	{
		$this->db->select("*")->from("users")->where(array("email" => $email, "password" => $password, 'status' => 1,"usertype" => 1));
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
	public function checkUserLogin($email,$password)
	{
		$this->db->select("*")->from("users")->where(array("email" => $email, "password" => $password, 'status' => 1))->where_not_in("usertype",array(1));
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
	
	public function updateItems($table,$params,$where)
	{
		$query = $this->db->update($table,$params,$where);
		//echo $this->db->last_query();
		if($query)
		{
			return 1;
		}
		else{
			return 0;
		}
	}
	
	public function storeItems($table,$params)
	{
		$query = $this->db->insert($table,$params);
		//echo $this->db->last_query();
		if($query)
		{
			return $this->db->insert_id();
		}
		else{
			return 0;
		}
	}
	public function storeBatchItems($table,$params)
	{
		$query = $this->db->insert_batch($table,$params);
		//echo $this->db->last_query();
		if($query)
		{
			return $this->db->insert_id();
		}
		else{
			return 0;
		}
	}
	
	public function getTableAllData($table)
	{
		$this->db->select("*")->from($table)->order_by("id","DESC");
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
	public function getTableAllDataOrder($table,$column,$order)
	{
		$this->db->select("*")->from($table)->order_by($column,$order);
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
	
	public function getTableRowData($table,$where)
	{
		$this->db->select("*")->from($table)->where($where)->order_by("id","DESC");
		$query = $this->db->get();
		//echo $this->db->last_query();
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
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
	public function getTableRowDataOrderLimit($table,$where,$limit,$column,$order)
	{
		$this->db->select("*")->from($table)->where($where)->limit($limit,0)->order_by($column,$order);
		$query = $this->db->get();
		//echo $this->db->last_query();
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return array();
		}
	}
	public function getTableRowDataOrderLimitStart($table,$where,$start,$end,$column,$order)
	{
		$this->db->select("*")->from($table)->where($where)->limit($end,$start)->order_by($column,$order);
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
	public function getTableRowDataArray($table,$where,$array,$column)
	{
		$this->db->select("*")->from($table)->where($where)->where_in($column,$array)->order_by("id","DESC");
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
	public function getTableRowDataArrayLimit($table,$where,$array,$column,$limit)
	{
		$this->db->select("*")->from($table)->where($where)->where_in($column,$array)->order_by("id","DESC");
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
	public function getTableRowDataNoWhereArray($table,$array,$column)
	{
		$this->db->select("*")->from($table)->where_in($column,$array)->order_by("id","DESC");
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
	public function getTableLimitData($table,$where,$limit,$column,$order)
	{
		$this->db->select("*")->from($table)->where($where)->limit($limit,0)->order_by($column,$order);
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
	
	public function getTableRowDataNotIn($table,$where,$column,$array)
	{
		$this->db->select("*")->from($table)->where($where)->where_not_in($column,$array);
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
	public function getTableRowDataWhereOrderArray($table,$where,$arrayCol,$arrayVals,$column,$order)
	{
		if(@sizeOf($arrayVals) > 0)
		{
			$this->db->select("*")->from($table)->where($where)->where_in($arrayCol,$arrayVals)->order_by($column,$order);
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
		else{
			return array();
		}
	}
	public function getTableRowDataOrderArray($table,$arrayCol,$arrayVals,$column,$order)
	{
		if(@sizeOf($arrayVals) > 0)
		{
			$this->db->select("*")->from($table)->where_in($arrayCol,$arrayVals)->order_by($column,$order);
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
		else{
			return array();
		}
	}
	public function getTableRowDataGroupOrder($table,$where,$column,$order,$groupColumn)
	{
		$this->db->select("*")->from($table)->where($where)->order_by($column,$order)->group_by($groupColumn);
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
	public function getTableRowDataGroupOrderParams($table,$groupcol,$where,$column,$order,$groupColumn)
	{
		$this->db->select($groupcol)->from($table)->where($where)->order_by($column,$order)->group_by($groupColumn);
		$query = $this->db->get();
		//echo $this->db->last_query();
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return array();
		}
	}
	
	public function removeOldItem($table,$column, $where, $folderpath)
	{
		$this->db->select("*")->from($table)->where($where);
		$query = $this->db->get();
		//echo $this->db->last_query();
		if($query->num_rows() > 0)
		{
			$res=$query->result();
			if(@sizeOf($res) > 0)
			{
				//echo FCPATH."".$folderpath.$res[0]->$column;
				unlink(FCPATH."".$folderpath.$res[0]->$column);
				return 1;
			}
		}
		else
		{
			return 0;
		}
	}
	public function removeProductImageItem($table,$column, $where, $folderpath)
	{
		$this->db->select("*")->from($table)->where($where);
		$query = $this->db->get();
		//echo $this->db->last_query();
		if($query->num_rows() > 0)
		{
			$res=$query->result();
			if(@sizeOf($res) > 0)
			{
				$exp = @explode(".",$res[0]->$column);
				$f=$exp[0]."_thumb.".@end($exp);
				//echo FCPATH."".$folderpath.$res[0]->$column;
				unlink(FCPATH."".$folderpath.$res[0]->$column);
				unlink(FCPATH."".$folderpath."180_140/".$f);
				unlink(FCPATH."".$folderpath."360_410/".$f);
				return 1;
			}
		}
		else
		{
			return 0;
		}
	}
	public function removeOldFolderItem($table,$column, $where, $folderpath)
	{
		$this->db->select("*")->from($table)->where($where);
		$query = $this->db->get();
		//echo $this->db->last_query();
		if($query->num_rows() > 0)
		{
			$res=$query->result();
			if(@sizeOf($res) > 0)
			{
				//echo FCPATH."".$folderpath.$res[0]->$column;
				unlink(FCPATH."".$folderpath.$res[0]->$column);
				return 1;
			}
		}
		else
		{
			return 0;
		}
	}
	
	public function removeItems($table,$where)
	{
		$query = $this->db->delete($table,$where);
		if($query)
		{
			return 1;
		}
		else{
			return 0;
		}
	}
	public function removeRowItems($table,$where)
	{
		$query = $this->db->delete($table,$where);
		if($query)
		{
			return 1;
		}
		else{
			return 0;
		}
	}
	
	public function checkItemExists($table,$where)
	{
		$this->db->select("*")->from($table)->where($where);
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
		
	public function getTableRowMinMaxData($table,$where)
	{
		$this->db->select("min(pSellPrice) as minprice, max(pSellPrice) as maxprice")->from($table)->where($where);
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
	public function getProductsByParams($categories,$subcategories,$childcategories,$attr,$price,$vendor,$order,$chidlcats)
	{
		if(@sizeOf($categories) > 0)
		{
			$this->db->where_in("cat_id",$categories);
		}
		if(@sizeOf($subcategories) > 0)
		{
			$this->db->where_in("subcat_id",$subcategories);
		}
		if(@sizeOf($chidlcats) > 0)
		{
			if(@sizeOf($childcategories) > 0)
			{
				$this->db->where_in("childcat_id",$childcategories);
				
			}
		}
		if(@sizeOf($attr) > 0)
		{
			$this->db->where_in("id",$attr);
		}
		if(@sizeOf($vendor) > 0)
		{
			$this->db->where_in("vendorid",$vendor);
		}
		/* if(@sizeOf($price) > 0)
		{
			$this->db->where(array("product_price >=" => (float)$price[0],"product_price <=" => (float)$price[1]));
		} */
		/*if(@$order != '')
		{
			//$this->db->order_by("product_price",trim($order));
			$this->db->order_by("id",trim($order));
		}*/
		//else{
			$this->db->order_by("id","DESC");
		//}
		$this->db->select("*")->from("products")->where(array("status" => 1));
		$query = $this->db->get();
		//echo $this->db->last_query();
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return array();
		}
	}
	public function getProductsByParamsLimit($categories,$subcategories,$childcategories,$attr,$price,$vendor,$order,$start,$end,$chidlcats)
	{
		if(@sizeOf($categories) > 0)
		{
			$this->db->where_in("cat_id",$categories);
		}
		if(@sizeOf($subcategories) > 0)
		{
			$this->db->where_in("subcat_id",$subcategories);
		}
		if(@sizeOf($chidlcats) > 0)
		{
			if(@sizeOf($childcategories) > 0)
			{
				$this->db->where_in("childcat_id",$childcategories);
				/* $chprids=array();
				if(@sizeOf($prods) > 0)
				{
					for($p=0;$p<sizeOf($prods);$p++)
					{
						$chprids[]=$prods[$p]->id;
					}
				}
				if(@sizeOf($chprids) > 0)
				{
					$this->db->where_in("id",$chprids);
				} */
			}
		}
		
		if(@sizeOf($attr) > 0)
		{
			$this->db->where_in("id",$attr);
		}
		if(@sizeOf($vendor) > 0)
		{
			$this->db->where_in("vendorid",$vendor);
		}
		/* if(@sizeOf($price) > 0)
		{
			$this->db->where(array("product_price >=" => (float)$price[0],"product_price <=" => (float)$price[1]));
		} */
		/* if(@$order != '')
		{
			//$this->db->order_by("id",trim($order));
			$this->db->order_by("product_price",trim($order));
		}
		else{
			$this->db->order_by("id","DESC");
		} */
		$this->db->select("*")->from("products")->where(array("status" => 1))->limit($end,$start);
		$query = $this->db->get();
		//echo $this->db->last_query();
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return array();
		}
	}
	
	public function getChildCatProducts($childcats)
	{
		$this->db->select("*")->from("products")->where(array("status" => 1))->where_in("childcat_id",$childcats);
		$query = $this->db->get();
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else{
			return array();
		}
	}
	
	public function getLists($attr)
	{
		if(@sizeOf($attr) > 0)
		{
			$this->db->where_in("attr_id",$attr);
		
			$qr=$this->db->select("*")->from("product_attributes")->get();
			//echo $this->db->last_query();
			if($qr->num_rows() > 0)
			{
				return $qr->result();
			}
			else{
				return array();
			}
		}
		else
		{
			return array();
		}
	}
	public function getTableRowDataNotWhereLimit($table,$where,$col,$value,$limit)
	{
		$this->db->select("*")->from($table)->where($where)->where_not_in($col,$value)->limit($limit,0)->order_by("id","DESC");
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
	
	
	public function removeItemWithImage($table,$where,$column,$folder)
	{
		$this->db->select("*")->from($table)->where($where);
		$query = $this->db->get();
		//echo $this->db->last_query();
		if($query->num_rows() > 0)
		{
			$res=$query->result();
			if(@sizeOf($res) > 0)
			{
				unlink(FCPATH.$folder.$res[0]->$column);
				$query = $this->db->delete($table,$where);
				if($query)
				{
					return 1;
				}
				else{
					return 0;
				}
			}
		}
		else
		{
			return 0;
		}
		
	}
	public function removeItemImage($column,$folder)
	{
		unlink(FCPATH.$folder.$column);
	}
}