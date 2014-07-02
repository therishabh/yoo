<?php 

/**
* 
*/
class Model extends CI_Model
{
	
	function __construct()
	{
		# code...
		parent::__construct();
	}

	function check_login($username,$password)
	{
		$this->db->select('password');
		$this->db->where('username',$username);
		$this->db->where('status','1');
		$query = $this->db->get('admin');
		$row = $query->row();
		if($query->num_rows() > 0)
		{
			if(md5($password) == $row->password)
			{
				return TRUE;
			}
			else
			{
				return False;
			}
		}
		else
		{
			return false;
		}
	}


// **************** start comman functions ****************
	
	function fetchbyid($id,$table)
	{
		$this->db->where('status','1');
		$this->db->where('id',$id);
		$query = $this->db->get($table);
		if($query->num_rows() > 0)
		{
			return $query->row_array();
		}
		else
		{
			return false;
		}
	}

	function fetchbyfield($field,$value,$table)
	{

		$this->db->where('status','1');
		$this->db->where($field,$value);
		$query = $this->db->get($table);
		if($query->num_rows() > 0)
		{
			return $query->row_array();
		}
		else
		{
			return false;
		}
	}

	function fetchalldata($table)
	{
		$this->db->where('status','1');
		$query = $this->db->get($table);
		if($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		else
		{
			return false;
		}
	}

	function fetchalldatadesc($table)
	{
		$this->db->where('status','1');
		$this->db->order_by('id','desc');
		$query = $this->db->get($table);
		if($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		else
		{
			return false;
		}
	}

	function fetchlastactivedata($table)
	{
		$this->db->where('status','1');
		$this->db->order_by('id','desc');
		$this->db->limit('1');
		$query = $this->db->get($table);
		if($query->num_rows() > 0)
		{
			return $query->row_array();
		}
		else
		{
			return false;
		}
	}

	function fetchlastdata($table)
	{
		$this->db->order_by('id','desc');
		$this->db->limit('1');
		$query = $this->db->get($table);
		if($query->num_rows() > 0)
		{
			return $query->row_array();
		}
		else
		{
			return false;
		}
	}

	function updatedata($data,$id,$table)
	{
		$this->db->where('id',$id);
		$query = $this->db->update($table,$data);
		if($query)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	// function for insert data into table
	function insertdata($data,$table)
	{
		$query = $this->db->insert($table,$data);
		if($query)
		{
			return true;
		}
		else
		{
			return false;
		}
	}


// end create some comman functions....
//************ end comman Functions *******************

	//function for create random string..
	function generateRandomString($length = 3) {
	      $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
	      $randomString = '';
	      for ($i = 0; $i < $length; $i++) {
	          $randomString .= $characters[rand(0, strlen($characters) - 1)];
	      }
	      return $randomString.rand(0,9);
	  }

	// function for fetch Campaign details from database for display into index page and footer.
	function fetchcampaign()
	{
		date_default_timezone_set('Asia/Calcutta');
		$today_date = date('d/m/Y');
		$this->db->where('status','1');
		$this->db->where('active','true');
		$this->db->order_by('id','desc');
		$this->db->where('active','true');
		$query = $this->db->get('campaign');
		// echo $query->num_rows();
		// echo "<br>";
		// echo $this->db->last_query();
		if($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		else
		{
			return false;
		}
	}


	function fetch_number_of_campaign()
	{
		date_default_timezone_set('Asia/Calcutta');
		$today_date = date('d/m/Y');
		$this->db->where('status','1');
		$this->db->where('active','true');
		$this->db->order_by('id','desc');
		$this->db->where('active','true');
		$query = $this->db->get('campaign');
		// echo $query->num_rows();
		// echo "<br>";
		// echo $this->db->last_query();
		if($query->num_rows() > 0)
		{
			return $query->num_rows();
		}
		else
		{
			return false;
		}
	}

	function fetch_campaign_with_limit($limit)
	{
		$this->db->limit($limit);
		$this->db->where('status','1');
		$this->db->where('active','true');
		$this->db->order_by('id','desc');
		$this->db->where('active','true');
		$query = $this->db->get('campaign');
		if($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		else
		{
			return false;
		}
	}

	function fetch_campaign_limit($i,$j)
	{
		$this->db->limit($j,$i);
		$this->db->where('status','1');
		$this->db->where('active','true');
		$this->db->order_by('id','desc');
		$this->db->where('active','true');
		$query = $this->db->get('campaign');
		// echo $this->db->last_query();
		if($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		else
		{
			return false;
		}
	}


	// function for fetch product details from database for display into index page and footer.
	function fetchproduct()
	{
		$this->db->where("status",'1');
		$this->db->where('active','true');
		$this->db->order_by('id','desc');
		$query = $this->db->get('product');
		if($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		else
		{
			return false;
		}
	}

	function fetch_number_of_product()
	{
		// $this->db->where("status",'1');
		// $this->db->where('active','true');
		// $this->db->order_by('id','desc');
		// $query = $this->db->get('product');
		$query = $this->db->query("SELECT product.name as name FROM product LEFT JOIN campaign ON campaign.id = product.campaign WHERE campaign.active = 'true' AND product.active = 'true' AND  product.status = '1'");
		if($query->num_rows() > 0)
		{
			return $query->num_rows();
		}
		else
		{
			return false;
		}
	}

	function fetch_product_with_limit($limit)
	{
		$query = $this->db->query("SELECT product.name as name, product.sub_desc as sub_desc, product.code as code, product.code_2 as code_2, product.type as type, product.image as image, product.description as description, product.amount as amount, product.campaign as campaign, product.sell as sell, product.date as date, product.delivery as delivery FROM product LEFT JOIN campaign ON campaign.id = product.campaign WHERE campaign.active = 'true' AND product.active = 'true' AND  product.status = '1' ORDER BY product.id DESC LIMIT $limit ");
		// $this->db->limit($limit);
		// $this->db->where("status",'1');
		// $this->db->where('active','true');
		// $this->db->order_by('id','desc');
		// $query = $this->db->get('product');
		// echo $this->db->last_query();
		if($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		else
		{
			return false;
		}
	}

	function fetch_product_limit($i,$j)
	{
		// $this->db->limit($j,$i);
		// $this->db->where("status",'1');
		// $this->db->where('active','true');
		// $this->db->order_by('id','desc');
		// $query = $this->db->get('product');
		// echo $this->db->last_query();
		$query = $this->db->query("SELECT product.name as name, product.sub_desc as sub_desc, product.code as code, product.code_2 as code_2, product.type as type, product.image as image, product.description as description, product.amount as amount, product.campaign as campaign, product.sell as sell, product.date as date, product.delivery as delivery FROM product LEFT JOIN campaign ON campaign.id = product.campaign WHERE campaign.active = 'true' AND product.active = 'true' AND  product.status = '1' ORDER BY product.id DESC LIMIT $i,$j"); 
		if($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		else
		{
			return false;
		}
	}



	function fetchcampaignproduct($campaign_id)
	{
		$this->db->where("status",'1');
		$this->db->where('active','true');
		$this->db->where('campaign',$campaign_id);
		$this->db->order_by('id','desc');
		$query = $this->db->get('product');
		if($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		else
		{
			return false;
		}
	}

	function number_of_campaign()
	{
		$this->db->where('status','1');
		$query = $this->db->get('campaign');
		if($query->num_rows() > 0)
		{
			return $query->num_rows();
		}
		else
		{
			return false;
		}
	}

	function fetch_campaign_details()
	{
		$this->db->where('status','1');
		$this->db->order_by('id','desc');
		$query = $this->db->get('campaign');
		if($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		else
		{
			return false;
		}
	}

	function search_campaign($campaign_name,$campaign_amount)
	{
		$this->db->like('name',$campaign_name);
		$this->db->like('amount',$campaign_amount);
		$this->db->where('status','1');
		$this->db->order_by('id','desc');
		$query = $this->db->get('campaign');
		// echo $this->db->last_query();
		if($query->num_rows() > 0)
		{

			return $query->result_array();
		}
		else
		{
			return false;
		}
	}

	function fetchproductview()
	{
		$this->db->where("status",'1');
		$this->db->order_by('id','desc');
		$query = $this->db->get('product');
		if($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		else
		{
			return false;
		}
	}

	function countproduct($campaign_id)
	{
		$this->db->where("status",'1');
		$this->db->where('active','true');
		$this->db->where('campaign',$campaign_id);
		$query = $this->db->get('product');
		return $query->num_rows();
	}
	function search_product($product_name,$campaign,$active_status)
	{
		$this->db->where("status",'1');
		$this->db->like('name',$product_name);
		$this->db->like('campaign',$campaign);
		$this->db->like('active',$active_status);
		$this->db->order_by('id','desc');
		$query = $this->db->get('product');
		// echo $this->db->last_query();
		if($query->num_rows() > 0)
		{

			return $query->result_array();
		}
		else
		{
			return false;
		}
	}
	
	function IND_money_format($money){
	    $len = strlen($money);
	    $m = '';
	    $money = strrev($money);
	    for($i=0;$i<$len;$i++){
	        if(( $i==3 || ($i>3 && ($i-1)%2==0) )&& $i!=$len){
	            $m .=',';
	        }
	        $m .=$money[$i];
	    }
	    return strrev($m);
	}

}//end class..
?>