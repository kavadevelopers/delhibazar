<?php
class Package_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}


	public function ad()
	{
		return $this->db->get('ad_package')->result_array();
	}

	public function ad_where($id)
	{
		return $this->db->get_where('ad_package',['id' => $id])->result_array();
	}

	public function shop()
	{
		return $this->db->get('shop_package')->result_array();
	}

	public function shop_where($id)
	{
		return $this->db->get_where('shop_package',['id' => $id])->result_array();
	}

}