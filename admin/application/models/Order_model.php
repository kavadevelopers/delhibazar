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
        $this->email->subject("Order Delivered");
        $data['id'] = $order_id;
        $this->email->message($this->load->view('order/delivered_order_email',$data,TRUE));
        $this->email->send();

	}
}