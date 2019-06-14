<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

	function __construct(){
        parent::__construct(); 
    	$this->load->model('product_model');   
    	$this->load->model('cart_model');   
    }

	public function index()
	{
		$data['_title']				= "DELHIBAZAR";
		$data['user_product']		= $this->cart_model->user_cart_where($this->session->userdata('id'));
		$this->load->template1('cart/cart',$data);
	}

	public function add_to_cart()
	{
		pre_print($_POST);
		$product_id = $this->product_model->product_where($this->input->post('product_hash'))[0]['id'];
		
		$data = [
					'qty' 			=> $this->input->post('qty'),
					'product_id' 	=> $product_id,
					'user_id' 		=> $this->input->post('user_id'),
					'created_at' 	=> date('Y-m-d H:i:s')
				];

			if($this->db->insert('cart',$data))
			{
				$this->session->set_flashdata('msg', 'Successfully Added Cart');
				redirect(base_url('cart'));	
			}
			else
			{
				$this->session->set_flashdata('error', 'Something went wrong try again');
				redirect(base_url('products/product_detail/'.$this->input->post('product_hash')));
			}

	}

}