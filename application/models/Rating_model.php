<?php
class Rating_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function product_review_list_with_limit($hash,$limit,$start)
	{
				$this->db->limit($limit,$start);
		return $this->db->get_where('product_rating',['hash' => $hash])->result_array();

	}

	public function review_list_with_limit($shop_id,$limit,$start)
	{
				$this->db->limit($limit,$start);
		return $this->db->get_where('shop_rating',['shop_id' => $shop_id])->result_array();

	}
	
	/**************************************************
						Product Rating
	***************************************************/

			////////////  STAR RATING  ////////////
			public function star_rating_1($hash)
			{
				$data = $this->db->get_where('product_rating',['hash' => $hash,'rating' => 1])->result_array();
				if(count($data) <= 9){ return '0'.count($data); } else{ count($data); }
			}

			public function star_rating_2($hash)
			{
				$data = $this->db->get_where('product_rating',['hash' => $hash,'rating' => 2])->result_array();
				if(count($data) <= 9){ return '0'.count($data); } else{ count($data); }
			}
			public function star_rating_3($hash)
			{
				$data = $this->db->get_where('product_rating',['hash' => $hash,'rating' => 3])->result_array();
				if(count($data) <= 9){ return '0'.count($data); } else{ count($data); }
			}

			public function star_rating_4($hash)
			{
				$data = $this->db->get_where('product_rating',['hash' => $hash,'rating' => 4])->result_array();
				if(count($data) <= 9){ return '0'.count($data); } else{ count($data); }
			}

			public function star_rating_5($hash)
			{
				$data = $this->db->get_where('product_rating',['hash' => $hash,'rating' => 5])->result_array();
				if(count($data) <= 9){ return '0'.count($data); } else{ count($data); }
			}
			////////////  STAR RATING  ////////////

	

	public function product_where_hash($hash)
	{
		return $this->db->get_where('product_rating',['hash' => $hash])->result_array();
	}

	public function product_rating_where($hash,$user_id)
	{
		return $this->db->get_where('product_rating',['hash' => $hash,'user_id' => $user_id])->result_array();
	}

	public function product_rating_load_more($start,$product_id)
	{
		$this->db->limit(5,$start);
		$data = $this->db->get_where('product_rating',['product_id' => $product_id])->result_array();
		$record = '';
		foreach ($data as $key => $value) {
				$user = $this->rating_model->user_where($value['user_id'])[0];

			$record .= '<div class="review_item">
							<div class="media">
								<div class="d-flex">
									<img src="'.base_url().'image/social_user_uploads/'.$user['image'].'" alt="" style="height: 50px;width: 50px;border-radius: 25px;">
								</div>
								<div class="media-body">
									<h4>'.$user['first_name'].' '.$user['last_name'].'</h4>'
									.product_rating_star($value['rating']).
								'</div>
							</div>
							<p>'.nl2br($value['review']).'</p>
						</div>';
            
		}
		return [count($data),$record,$this->db->get_where('product_rating',['product_id' => $product_id])->num_rows()];
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
				$this->db->select('AVG(rating) as average');
		return $this->db->get_where('shop_rating',['shop_id' => $shop_id])->result_array();
	}

	public function get_product_avarage_rating($hash)
	{
				$this->db->select('AVG(rating) as average');
		return $this->db->get_where('product_rating',['hash' => $hash])->result_array();
	}
}