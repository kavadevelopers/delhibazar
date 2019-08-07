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
		return $this->db->get_where('payment',['delete_flag' => 0, 'delivered' => 0])->result_array();
	}

	public function order_where($id)
	{			
		return $this->db->get_where('payment',['id' => $id])->result_array();
	}

	public function delivered_order()
	{			
				$this->db->order_by('id','ASC');
				$this->db->where('delivered','1');
				// $this->db->group_start();
				// 	$this->db->where('delete_flag','0');
				// 	$this->db->or_where('delete_flag','1');
				// $this->db->group_end();
		return $this->db->get('payment')->result_array();
	}

	public function deleted_order()
	{			
				$this->db->order_by('id','ASC');
		return $this->db->get_where('payment',['delete_flag' => 1])->result_array();
	}

	public function pending_order($id)
	{	
		$this->db->or_where('delivered','0'); 
		$this->db->or_where('delivered','2'); 
		return $this->db->get_where("payment",['delete_flag' => '0','id' => $id])->result_array();
	}

	public function get_traking($id)
	{
		return $this->db->get_where('traking',['order_id' => $id])->result_array();
	}
}