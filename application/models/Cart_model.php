<?php
class Cart_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function user_cart_where($user_id)
	{
				$this->db->order_by('id','ASC');
		return $this->db->get_where('cart',['user_id' => $user_id,'delivered' => 0])->result_array();
	}

	public function cart_where($id)
	{
		return $this->db->get_Where('cart',['id' => $id])->result_array();
	}

}