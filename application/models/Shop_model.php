<?php
class Shop_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function shops()
	{			
				$this->db->order_by('id','DESC');
		return $this->db->get('shop')->result_array();
	}

	
	
	public function shop_where($id)
	{
		return $this->db->get_where('shop',['id' => $id])->result_array();
	}

	public function shop_search($search)
	{
				$this->db->like('shop_name',$search);
    			$this->db->or_like('owner_name',$search);
    			$this->db->or_like('mobile',$search);
    			$this->db->or_like('wp_no',$search);
    			$this->db->or_like('address',$search);
    			$this->db->or_like('landmark',$search);
    			$this->db->or_like('hour_operation',$search);
    			$this->db->or_like('pro_or_servi',$search);
    			$this->db->or_like('info',$search);
    			$this->db->or_like('hour_operation',$search);
    			$this->db->or_like('detail_desc',$search);
		return	$this->db->get_Where('shop')->result_array();


	}


	public function get_add_top()
	{	
				$this->db->order_by('id','asc');
				$this->db->limit(5, 0);
		return 	$this->db->get('advertising')->result_array();
	}


	public function get_add_bottom()
	{	
				$this->db->order_by('id','asc');
				$this->db->limit(5, 5);
		return 	$this->db->get('advertising')->result_array();
	}
}	