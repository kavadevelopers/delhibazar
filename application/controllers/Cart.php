<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

	function __construct(){
        parent::__construct(); 
    	$this->load->model('product_model');   
    	$this->load->model('cart_model');   
    	$this->load->model('social_user_model');   
    }

	public function index()
	{
		$data['_title']				= "DELHIBAZAR | Cart";
		$data['user_product']		= $this->cart_model->user_cart_where($this->session->userdata('id'));
		$this->load->template1('cart/cart',$data);
	}

	public function checkout()
	{
		$data['_title']				= "DELHIBAZAR";
		$data['user_product']		= $this->cart_model->user_cart_where($this->session->userdata('id'));
		$this->load->template1('cart/checkout',$data);
	}

	public function add_to_cart()
	{
		$product_id = $this->product_model->product_where($this->input->post('product_hash'))[0];
		
		if($this->input->post('qty') <= $product_id['stock'])
		{	
			$data = [
						'qty' 			=> $this->input->post('qty'),
						'product_id' 	=> $product_id['id'],
						'size' 			=> $this->input->post('size_products'),
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
		else{
			$this->session->set_flashdata('error', 'Stock Not Found');
			redirect(base_url('products/product_detail/'.$this->input->post('product_hash')));
		}
	}

	public function update_cart()
	{

		$count = count($this->input->post('amount'));
		$insert;

			$this->db->where('user_id',$this->input->post('user_id'));
		if($this->db->delete('cart'))
		{

			for($i = 0; $i < $count; $i++)
			{

				$data = [
							'qty' 			=> $this->input->post('qty')[$i],
							'product_id' 	=> $this->input->post('product_id')[$i],
							'user_id' 		=> $this->input->post('user_id'),
							'updated_at' 	=> date('Y-m-d H:i:s')
						];

				$this->db->insert('cart',$data); 
			}

			if($this->db->affected_rows() > 0)
			{
				$this->session->set_flashdata('msg', 'Successfully Updated Cart');
				redirect(base_url('cart'));	
			}
			else
			{
				$this->session->set_flashdata('error', 'Something went wrong try again');
				redirect(base_url('cart'));
			}
		}
	}

	public function delete_product($id)
	{
		if($id)
		{
			if($this->cart_model->cart_where($id))
			{
				if($this->db->delete('cart',['id' => $id]))
				{
					$this->session->set_flashdata('msg', 'Successfully Deleted');
					redirect(base_url('cart'));	
				}
				else
				{
					$this->session->set_flashdata('error', 'Product Not Deleted Please Try Again');
					redirect(base_url('cart'));
				}

			}
			else
			{
				$this->session->set_flashdata('error', 'Something went wrong try again');
				redirect(base_url('cart'));
			}
		}
		else{
			$this->session->set_flashdata('error', 'Something went wrong try again');
			redirect(base_url('cart'));
		}
	}


	public function wishlist()
	{
		$data['_title']				= "DELHIBAZAR | Wishlist";
		$data['user_product']		= $this->cart_model->get_wishlists($this->session->userdata('id'));
		$this->load->template1('cart/wishlist',$data);
	} 

	public function transferToCart($id = false)
	{
		if($id)
		{
			if($this->cart_model->wishlist_id($id))
			{
				
				$data = $this->cart_model->wishlist_id($id)[0];
				$cart = [
							'qty' 			=> '1',
							'product_id'	=> $data['product_id'],
							'user_id'		=> $data['user_id'],
							'created_at'	=> date('Y-m-d H:i:s')
						];
				$this->db->insert('cart',$cart);

				$this->db->delete('wishlist',['id' => $id]);
				redirect(base_url('cart'));	

			}
			else
			{
				$this->session->set_flashdata('error', 'Something went wrong try again');
				redirect(base_url('cart/wishlist'));
			}
		}
		else{
			$this->session->set_flashdata('error', 'Something went wrong try again');
			redirect(base_url('cart/wishlist'));
		}
	}


	public function delete_product_wishlist($id)
	{
		if($id)
		{
			if($this->cart_model->wishlist_id($id))
			{
				if($this->db->delete('wishlist',['id' => $id]))
				{
					$this->session->set_flashdata('msg', 'Successfully Deleted');
					redirect(base_url('cart/wishlist'));	
				}
				else
				{
					$this->session->set_flashdata('error', 'Product Not Deleted Please Try Again');
					redirect(base_url('cart/wishlist'));
				}

			}
			else
			{
				$this->session->set_flashdata('error', 'Something went wrong try again');
				redirect(base_url('cart/wishlist'));
			}
		}
		else{
			$this->session->set_flashdata('error', 'Something went wrong try again');
			redirect(base_url('cart/wishlist'));
		}
	}

	public function clear_wishlist()
	{
		$this->db->delete('wishlist',['user_id' => $this->session->userdata('id')]);
		$this->session->set_flashdata('msg', 'Successfully Cleared');
		redirect(base_url('cart/wishlist'));	
	}


	public function apply_coupon()
	{
		if($this->input->post()){
			$code = $this->db->get_where('coupon',['code' => $this->input->post('coupon_code'),'df' => '0','status' => '0'])->result_array();
			if($code){
				echo json_encode(['true',$code[0]]);
			}
			else{
				echo json_encode(['false']);
			}
		}
	}
}