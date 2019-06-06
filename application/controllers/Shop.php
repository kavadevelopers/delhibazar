<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shop extends CI_Controller {

	function __construct(){
        parent::__construct();
    	$this->load->model('shop_model');   
    	$this->load->model('rating_model');   
    }

	public function shop_detail($id)
	{
		$data['_title']				= "DELHIBAZAR";
		$data['shop'] 				= $this->shop_model->shop_where($id);
		$data['total_review'] 		= $this->rating_model->count_review($id);
		$data['ava_rating'] 		= $this->rating_model->get_avarage_rating($id);
		$this->load->template('shop/shop_detail',$data);
	}

	public function load_more()
    {
        echo json_encode($this->shop_model->load_more($this->input->post('record'),$this->input->post('shop_id')));
    }

	
	public function rating()
	{
		$data = [
					'review'		=> $this->input->post('review'),
					'rating'		=> $this->input->post('rating'),
					'user_id'		=> $this->session->userdata('id'),
					'shop_id'		=> $this->input->post('shop_id'),
					'created_at'	=> date('Y-m-d H:i:s')
				];

				if($this->db->insert('shop_rating',$data))
				{
					$this->session->set_flashdata('msg', 'Thank you for rating');
					redirect(base_url('shop/shop_detail/'.$this->input->post('shop_id')));
				}
				else
				{
					$this->session->set_flashdata('error', 'Something went wrong try again');
					redirect(base_url('shop/shop_detail/'.$this->input->post('shop_id')));
				}
	}

}