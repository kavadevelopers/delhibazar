<?php
class Rating_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function review_list_with_limit($shop_id,$limit,$start)
	{
				$this->db->limit($limit,$start);
		return $this->db->get_where('shop_rating',['shop_id' => $shop_id])->result_array();

	}
	
	/**************************************************
						Product Rating
	***************************************************/
	public function product_where_hash($hash)
	{
		return $this->db->get_where('product_rating',['hash' => $hash])->result_array();
	}

	public function product_rating_where($hash,$user_id)
	{
		return $this->db->get_where('product_rating',['hash' => $hash,'user_id' => $user_id])->result_array();
	}
	/**************************************************
						Product Rating
	***************************************************/


	public function review_list($shop_id)
	{
		return $this->db->get_where('shop_rating',['shop_id' => $shop_id])->result_array();
	}

	public function user_where($user_id)
	{
		return $this->db->get_where('social_user',['id' => $user_id])->result_array();
	}

	public function rating_where($shop_id,$user_id)
	{
		return $this->db->get_where('shop_rating',['shop_id' => $shop_id,'user_id' => $user_id])->result_array();
	}

	public function count_review($shop_id)
	{
		return $this->db->get_where('shop_rating',['shop_id' => $shop_id])->num_rows();

	}

	public function count_user_review($user_id)
	{
		return $this->db->get_where('shop_rating',['user_id' => $user_id])->num_rows();

	}

	public function get_avarage_rating($shop_id)
	{
				//$this->db->select_avg('rating');
		$this->db->select('AVG(rating) as average');
		return $this->db->get_where('shop_rating',['shop_id' => $shop_id])->result_array();

	}
}