<?php
class Social_user_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function user()
	{			
				$this->db->order_by('id','DESC');
		return $this->db->get_where('social_user',['delete_flag' => 0])->result_array();
	}

    public function customer_where($id){
        return $this->db->get_where('social_user',['id' => $id])->result_array();
    }

    public function customer_review_where($customer_id){
        return $this->db->get_where('product_rating',['user_id' => $customer_id])->result_array();
    }

    public function customer_order_where($customer_id){
        return $this->db->get_where('payment',['user_id' => $customer_id])->result_array();
    }
    
}