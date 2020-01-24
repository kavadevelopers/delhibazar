<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct(){
        parent::__construct();
    	$this->load->model('shop_model');   
    	$this->load->model('social_user_model');   
    }

	public function index()
	{
		$data['_title']		= "DELHIBAZAR";
		$this->load->template1('user_login/login',$data);
	}

	public function check_login()
	{
		$user = $this->social_user_model->login($this->input->post('email'),md5($this->input->post('password')));

		if($user)
		{

			$this->session->set_userdata('id',$user[0]['id']);
			redirect(base_url().'welcome');
		}
		else
		{
			$this->session->set_flashdata('error', 'Invalid Login Details Please try again.');
            redirect(base_url().'login');
		}
	}

	public function modal_login()
	{
		$user = $this->social_user_model->login($this->input->post('email'),md5($this->input->post('password')));

		if($user)
		{
			$this->session->set_userdata('id',$user[0]['id']);
			echo json_encode(['true']);	
		}
		else
		{
            echo json_encode(['false','Invalid Login Details']);
		}
	}

	public function forgot()
	{
		$data['_title']		= "DELHIBAZAR";
		$data['error']		= "0";
		$this->load->template1('user_login/forget',$data);
	}

	public function forget_post()
	{
		$user = $this->db->get_where('social_user',['email' => $this->input->post('email')])->result_array();
		if($user){

			$data = ['reset' => 1];
			$this->db->where('email',$this->input->post('email'));
			$this->db->update('social_user',$data);

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
	        $this->email->to($this->input->post('email'));
	        $this->email->subject("Forgot Password");
	        $data['id']		= $user[0]['id'];
	        $this->email->message($this->load->view('user_login/email_reset_pass',$data,TRUE));
	        $this->email->send();
	        
	        $this->session->set_flashdata('ok', 'Password Reset Link Sended To your Email');
			redirect(base_url().'login');

		}
		else{
			$data['_title']		= "DELHIBAZAR";
			$data['error']		= "1";
			$this->load->template1('user_login/forget',$data);
		}
	}

	public function reset_pass($id)
	{
		$user = $this->db->get_where('social_user',['id' => $id])->result_array();	
		if($user){
			if($user[0]['reset'] == 1){
				$data['_title']		= "DELHIBAZAR";
				$data['id']			= $id;
				$this->load->template1('user_login/reset',$data);
			}else{
				redirect(base_url().'login');	
			}
		}else{
			redirect(base_url().'login');
		}
	}

	public function change()
	{
		$data = ['password' => md5($this->input->post('password')),'reset' => 0];
		$this->db->where('id',$this->input->post('id'));
		$this->db->update('social_user',$data);
		$this->session->set_flashdata('ok', 'Password Changed');
		redirect(base_url().'login');
	}

}