<?php


class Product_model extends CI_Model
{
	

	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}


	public function products()
	{
		return $this->db->order_by('id','DESC')->get_where('product',['df' => '0'])->result_array();
	}

	public function check_product_by_id($id)
	{
		return $this->db->get_where('product',['id' => $id,'df' => '0'])->result_array();
	}




}
?>