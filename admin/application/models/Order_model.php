<?php
class Order_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function order()
	{			
				$this->db->order_by('id','ASC');
		return $this->db->get_where('payment')->result_array();
	}

}