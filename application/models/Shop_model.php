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

	public function is_offer($id)
	{
		if($this->db->get_where('offers',['shop' => $id,'status' => '','date_from <=' => date('Y-m-d'),'date_to >=' => date('Y-m-d')])->result_array()){
			return true;
		}
		else{
			return false;
		}
	}

	public function get_offers($id)
	{
		return $this->db->get_where('offers',['shop' => $id,'status' => '','date_from <=' => date('Y-m-d'),'date_to >=' => date('Y-m-d')])->result_array();
	}

	public function slider_where($shop_id)
	{
		return $this->db->get_where('shop_slider',['shop_id' => $shop_id])->result_array();
	}

	public function load_more($start,$shop_id)
	{
		$this->db->limit(5,$start);
		$this->db->order_by('id','DESC');
		$data = $this->db->get_where('shop_rating',['shop_id' => $shop_id])->result_array();
		$record = '';
		foreach ($data as $key => $value) {
				$user = $this->rating_model->user_where($value['user_id'])[0];

            if($this->session->userdata('id') && $this->session->userdata('id') == $value['user_id']){
                    $edit = '<p class="text-right" style="margin: 3px;">
                                    <a href="#" class="edit_button" data-subject="'.$value["subject"].'" data-review="'. $value["review"].'" data-rating="'.$value["rating"].'" data-id="'.$value["id"].'">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                </p>';
            }else{
            	$edit = "";
            }

			$record .= '<div class="customer-review_wrap">
							'.$edit.'	
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
			
			$this->db->group_start();
			$this->db->like('keywords',$search);
			$this->db->group_end();


			if($this->session->userdata('listing_filter')){
				if($this->session->userdata('listing_filter') == 'new'){
					$this->db->order_by('id','DESC');
				}else if($this->session->userdata('listing_filter') == 'old'){
					$this->db->order_by('id','ASC');
				}else if($this->session->userdata('listing_filter') == 'rating'){
					$this->db->order_by('rating','DESC');
				}else if($this->session->userdata('listing_filter') == 'comment'){
					$this->db->order_by('comment','DESC');
				}
			}


		return	$this->db->get_where('shop',[ 'exp_date >=' => date('Y-m-d'),'dis_in_listing' => '0'])->result_array();
	}

	public function get_shop_offers()
	{

		
		$this->db->trans_start();
		if($this->session->userdata('_offer_category')){
			if($this->session->userdata('_offer_category') != ''){
				$this->db->where('_category',$this->session->userdata('_offer_category'));
			}
		}

		if($this->session->userdata('_offer_area')){
			if($this->session->userdata('_offer_area') != ''){
				$this->db->where('_area',$this->session->userdata('_offer_area'));
			}
		}

		$shops = $this->db->get_where('shop',[ 'exp_date >=' => date('Y-m-d'),'dis_in_listing' => '0'])->result_array();
		$this->db->trans_complete(); 
		$array = [];
		foreach ($shops as $key => $value) {
			array_push($array, $value['id']);
		}
		if(count($shops) == 0){
			$array = [0];
		}	


		$this->db->select("*");
		if($this->session->userdata('_offer_order')){
			if($this->session->userdata('_offer_order') == 'new'){
				$this->db->order_by('id','DESC');
			}else if($this->session->userdata('_offer_order') == 'old'){
				$this->db->order_by('id','ASC');
			}
		}

		$this->db->where('status', '');
		$this->db->where('date_from <=', date('Y-m-d'));
		$this->db->where('date_to >=', date('Y-m-d'));
		$this->db->where_in('shop', $array);
		return $this->db->get('offers')->result_array();
	}

	public function get_shop_categories()
	{
		$this->db->where('df','');
		return 	$this->db->get('shop_categories')->result_array();
	}

	public function get_shop_area()
	{
		$this->db->where('df','');
		return 	$this->db->get('shop_area')->result_array();
	}

	public function hash_dynamic_add($position)
	{	
		
				$this->db->order_by('id','asc');
				$this->db->where('exp_date >=',date('Y-m-d'));
				$this->db->where('position',$position);
				$this->db->where('page','Home');
		return 	$this->db->get('advertising')->result_array();
	}

	public function listing_ad($position)
	{
				$this->db->order_by('id','asc');
				$this->db->where('exp_date >=',date('Y-m-d'));
				$this->db->where('position',$position);
				$this->db->where('page','Listing');
		return 	$this->db->get('advertising')->result_array();	
	}

	public function business_detail_ad($position)
	{
				$this->db->order_by('id','asc');
				$this->db->where('exp_date >=',date('Y-m-d'));
				$this->db->where('position',$position);
				$this->db->where('page','Business Detail');
		return 	$this->db->get('advertising')->result_array();	
	}


}	