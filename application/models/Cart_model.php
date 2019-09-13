<?php
class Cart_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function user_cart_where($user_id)
	{
				$this->db->order_by('id','ASC');
		return $this->db->get_where('cart',['user_id' => $user_id,'delivered' => 0])->result_array();
	}

	public function cart_where($id)
	{
		return $this->db->get_Where('cart',['id' => $id])->result_array();
	}

	public function count_wishlist($id)
	{
		return $this->db->get_where('wishlist',['user_id' => $id,'delivered' => '0'])->num_rows();	
	}


	public function get_wishlists($id)
	{
		return $this->db->get_where('wishlist',['user_id' => $id])->result_array();	
	}

	public function wishlist_id($id)
	{
		return $this->db->get_where('wishlist',['id' => $id])->result_array();	
	}



	public function send_order_mail($order_id)
	{
		$order = $this->db->get_where('payment',['id' => $order_id])->result_array()[0];

		$this->load->library('email');
		$config['protocol']     = 'smtp';
        $config['smtp_host']    = get_setting()['smtp_host'];
        $config['smtp_port']    = get_setting()['smtp_port'];
        $config['smtp_timeout'] = '7';
        $config['smtp_user']    = get_setting()['smtp_user'];
        $config['smtp_pass']    = get_setting()['smtp_pass'];
        $config['charset']      = 'utf-8';
        $config['newline']      = "\r\n";
        $config['mailtype']     = 'html';
        $config['validation']   = TRUE; 
        
        $this->email->initialize($config);

        $this->email->from(get_setting()['smtp_user'], 'DELHIBAZAR');
        $this->email->to($order['email']); 
        $this->email->subject("Order Confirmation");
        $data['id'] = $order_id;
        $this->email->message($this->load->view('pay/order_mail',$data,TRUE));
        $this->email->send();

	}
}