<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agent extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->auth->check_session();
        $this->load->model('user_model');

        if($this->session->userdata('id') != '1'){
        	redirect(base_url('error404'));
        }
    }


	public function index()
	{
		$data['page_title']	= 'Manage Agents';
		$data['agents'] = $this->user_model->users();
		$this->load->template('agent/index',$data);
	}


	public function add()
	{	
	    $data['page_title']	= 'Add Agent';
		$this->load->template('agent/register',$data);
	}

	
	public function save(){
		$this->form_validation->set_error_delimiters('<div class="my_text_error">', '</div>');
		
		$this->form_validation->set_rules('user_name', 'Username', 'trim|required|min_length[5]|max_length[30]|alpha_dash|is_unique[user.user_name]',array('is_unique' => 'Username Is Already Exists'));
		
		$this->form_validation->set_rules('pass', 'Password', 'min_length[5]|required');
		$this->form_validation->set_rules('con_pass', 'Confirm Password', 'required|matches[pass]');
	
		$this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[3]|max_length[200]');
		
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|xss_clean|max_length[100]');
		$this->form_validation->set_rules('mobile', 'Mobile', 'required|regex_match[/^[0-9]{10}$/]|min_length[10]|max_length[10]');
		 
		if ($this->form_validation->run() == FALSE)
		{
			$data['page_title']	= 'Add Agent';
			$this->load->template('agent/register',$data);
		}
		else
		{ 

			$user_insert = array(
		        'user_name'           => 	strtolower($this->input->post('user_name')),
		        'name'           	  => 	$this->input->post('name'),
		        'pass'                => 	md5($this->input->post('pass')),
		        'email'               => 	$this->input->post('email'),
		        'mobile'              => 	$this->input->post('mobile'),
		        'created_by'		  => 	$this->session->userdata('id'),
		        'updated_by'		  => 	$this->session->userdata('id'),
		        'created_at' 		  => 	date('Y-m-d H:i:s'),
		        'updated_at' 		  => 	date('Y-m-d H:i:s')
		        
			);

			if($this->db->insert('user', $user_insert)){

				$this->session->set_flashdata('msg', 'Agent Successfully Added');
				redirect(base_url().'agent');
							
			}
			else
			{
				$this->session->set_flashdata('error', 'Problem In Add Agent Try Again');
	        	redirect(base_url().'agent/add');
			}
		}
	}

	public function edit($id = false)
	{	
		if($id)
		{
			if($this->user_model->agent_get($id))
			{
				$data['page_title']	= 'Edit Agent';
				$data['agent'] = $this->user_model->agent_get($id)[0];
				$this->load->template('agent/edit',$data);
			}	
			else
			{
				$this->session->set_flashdata('error', 'Agent Not Found');
	        	redirect(base_url().'agent');
			}
			
		}
		else
		{
			$this->session->set_flashdata('error', 'Agent Not Found');
	        redirect(base_url().'agent');
		}
	}	


	public function update(){
		$this->form_validation->set_error_delimiters('<div class="my_text_error">', '</div>');

		$this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[3]|max_length[200]');
		
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|xss_clean|max_length[100]');
		$this->form_validation->set_rules('mobile', 'Mobile', 'required|regex_match[/^[0-9]{10}$/]|min_length[10]|max_length[10]');
		$this->form_validation->set_rules('agent_id', 'agent_id', 'trim');
 
		if ($this->form_validation->run() == FALSE)
		{
			$data['page_title']	= 'Edit Agent';
			$data['agent'] = $this->user_model->agent_get($this->input->post('agent_id'))[0];
			$this->load->template('agent/edit',$data);
		}
		else
		{
			
			$user = array(
		        'name'           	  => 	$this->input->post('name'),
		        'email'               => 	$this->input->post('email'),
		        'mobile'              => 	$this->input->post('mobile'),
		        'updated_by'		  => 	$this->session->userdata('id'),
		        'updated_at' 		  => 	date('Y-m-d H:i:s')
			);

			$this->db->where('id',$this->input->post('agent_id'));
			if($this->db->update('user', $user)){

				$this->session->set_flashdata('msg', 'Agent Successfully Saved');
				redirect(base_url().'agent');
							
			}
			else
			{
				$this->session->set_flashdata('error', 'Problem In Save Agent Try Again');
	        	redirect(base_url().'agent');
			}
			
		}
	}

	public function reset_pass($id = false)
	{
		if($id){
			if($this->user_model->agent_get($id)){
				
				$data['_title']		= "Reset Password";
				$data['user']		= $this->user_model->agent_get($id)[0];
 				$this->load->template('agent/reset_pass',$data);

			}
			else{
				$this->session->set_flashdata('error', 'User Not Found Try Again');
		        redirect(base_url().'agent');
			}
		}else{
			$this->session->set_flashdata('error', 'User Not Found Try Again');
	        redirect(base_url().'agent');
		}
	}

	
	public function delete($id = false)
	{	
		if($id)
		{
			if($this->user_model->agent_get($id))
			{

				$this->db->where('id',$id);
				if($this->db->update('user',array('updated_by'  => 	$this->session->userdata('id'),'delete_flag' => '1','deleted_at' => date('Y-m-d H:i:s'))))
				{
					$this->session->set_flashdata('msg', 'Agent Successfully Deleted');
	        		redirect(base_url().'agent');
				}
				else{
					$this->session->set_flashdata('error', 'Agent Not Deleted Try Again');
	        		redirect(base_url().'agent');
				}
			}
			else{
				$this->session->set_flashdata('error', 'Agent Not Found');
	        	redirect(base_url().'agent');
			}

		}
		else{
			$this->session->set_flashdata('error', 'Agent Not Found');
	        redirect(base_url().'agent');
		}
	}		


	public function pass_save()
	{

		$this->form_validation->set_error_delimiters('<div class="my_text_error">', '</div>');
		
		$this->form_validation->set_rules('pass', 'Password', 'min_length[5]|max_length[20]|required');
		$this->form_validation->set_rules('con_pass', 'Confirm Password', 'required|matches[pass]');
		
		$this->form_validation->set_rules('user_id', 'user_id', 'trim');

		if ($this->form_validation->run() == FALSE)
		{
			$data['_title']		= "Reset Password";
			$data['user']		= $this->user_model->agent_get($this->input->post('user_id'))[0];
			$this->load->template('agent/reset_pass',$data);
		}
		else
		{

			$user_insert = array(
		        'pass'                => 	md5($this->input->post('pass')),
		        'updated_by'		  => 	$this->session->userdata('id'),
		        'updated_at' 		  => 	date('Y-m-d H:i:s')
		        
			);


			$this->db->where('id',$this->input->post('user_id'));
			if($this->db->update('user', $user_insert)){

				$this->session->set_flashdata('msg', 'Password Successfully Save');
	        	redirect(base_url().'agent');

			}
			else{

				$this->session->set_flashdata('error', 'Error In Reset Password Please Try Again');
	        	redirect(base_url().'agent');

			}

		}
	}



}