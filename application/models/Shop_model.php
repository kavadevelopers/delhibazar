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

	public function load_more($start,$shop_id)
	{
		$this->db->limit(2,$start);
		$data = $this->db->get_where('shop_rating',['shop_id' => $shop_id])->result_array();
		$record = '';
		foreach ($data as $key => $value) {
				$user = $this->rating_model->user_where($value['user_id'])[0];

			$record .= '<div class="customer-review_wrap">
                            <div class="customer-img">
                                <img src="'.base_url().'image/social_user_uploads/'.$user['image'].'" class="img-fluid" alt="#">
                                <p>'. cut_string($user['first_name'].' '.$user['last_name'],13,'...').'</p>
                                <span>'. $this->rating_model->count_user_review($value['user_id']) .' Reviews</span>
                            </div>
                            <div class="customer-content-wrap">
                                <div class="customer-content">
                                    <div class="customer-review">
                                        <h6>'. cut_string($value['subject'],45,'...').'</h6>
                                        '. rating_dot($value['rating']).'
                                        <p>'. diff_date($value['created_at']).'</p>
                                    </div>
                                    <div class="customer-rating">'. round($value['rating'],1) .'.0</div>
                                </div>
                                <p class="customer-text">
                                    '. nl2br($value['review']).'
                                </p>
                            </div>
                        </div><hr>';
            
		}
		return [count($data),$record,$this->db->get_where('shop_rating',['shop_id' => $shop_id])->num_rows()];

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