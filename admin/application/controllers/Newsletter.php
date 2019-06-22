<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Newsletter extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->auth->check_session();
        $this->load->model('user_model');
        $this->load->model('general_model');
	}


	public function index()
	{
		$data['page_title']		= 'Manage Newsletter';
		$data['news'] 			= $this->general_model->newsletter();
		$this->load->template('newsletter/index',$data);
	}

	public function sendmail()
	{
		$data['page_title']		= 'Newsletter Mail';
		$this->load->template('newsletter/send_mail',$data);
	}

	/****************************************
					SEND MAIL
	****************************************/
	public function send()
	{	
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


		$data 	= $this->db->get_where('newsletter',['active' => 0])->result_array();

		foreach ($data as $key => $value) {
			
			$this->email->from(get_setting()['smtp_user'], 'DELHIBAZAR');
	        $this->email->to($value['email']); 
	        $this->email->subject(ucfirst($this->input->post('subject')));
	        $this->email->message(ucfirst($this->input->post('msg'))); 
        	$this->email->send();
        }

        
        $this->session->set_flashdata('msg', 'Message Successfully Sent');
        redirect(base_url('newsletter'));
    

	}


	public function delete($id = false)
	{	
		if($id)
		{
			if($this->general_model->newsletter_where($id))
			{

				$this->db->where('id',$id);
				if($this->db->delete('newsletter'))
				{
					$this->session->set_flashdata('msg', 'Newsletter Successfully Deleted');
	        		redirect(base_url().'newsletter');
				}
				else{
					$this->session->set_flashdata('error', 'Newsletter Not Deleted Try Again');
	        		redirect(base_url().'newsletter');
				}
			}
			else{
				$this->session->set_flashdata('error', 'Newsletter Not Found');
	        	redirect(base_url().'newsletter');
			}

		}
		else{
			$this->session->set_flashdata('error', 'Newsletter Not Found');
	        redirect(base_url().'newsletter');
		}
	}		

}