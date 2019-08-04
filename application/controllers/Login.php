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

	
}