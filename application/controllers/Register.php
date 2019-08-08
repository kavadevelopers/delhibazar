<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	function __construct(){
        parent::__construct();
    	$this->load->model('shop_model');   
    }

	public function index()
	{
		$data['_title']		= "DELHIBAZAR";
		$this->load->template1('user_register/register',$data);
	}

	public function register()
	{
		
		
		$data	=	[
						'first_name'	=>	$this->input->post('first_name'),
						'last_name'		=>	$this->input->post('last_name'),
						'email'			=>	$this->input->post('email'),
						'mobile'		=>	$this->input->post('mobile'),
						'password'		=>	md5($this->input->post('password')),
						'created_at'	=>  date('Y-m-d H:i:s')
					]; 

				if($this->db->insert('social_user', $data))
            	{
				
					$id = $this->db->insert_id();

					if($this->input->post('newsletter')){
						$this->db->insert('newsletter',['email' => $this->input->post('email'),'created_at' => date('Y-m-d H:i:s')]);
					}

	                if(!empty($_FILES['image']['name']))
	                {
	                    $path    = $_FILES['image']['name'];
	                    $newName = md5(microtime(true)).".".pathinfo($path, PATHINFO_EXTENSION); 
	                    $config['upload_path']      = './image/social_user_uploads';
	                    $config['allowed_types']    = 'gif|jpg|png|jpeg';
	                    $config['max_size']         = 2000000;
	                    
	                    $config['file_name']        = $newName;
	                    $this->load->library('upload', $config);

	                    $image = [ 'image'       =>    $newName ];

	                    if($this->upload->do_upload('image'))
	                    {
	                        $image = [ 'image'       =>    $newName ];

	                            $this->db->where('id',$id);
	                        if($this->db->update('social_user', $image))
	                        {
	                        	$this->session->set_userdata('id',$id);

	                            $this->session->set_flashdata('msg', 'Registration Successfull');
	                            redirect(base_url().'welcome');
	                        }
	                        else
	                        {
	                            $this->session->set_flashdata('error', 'Problem In Upload Image');
	                            redirect(base_url().'register');
	                        }
	                    }
	                    else
	                    {
	                        $this->session->set_flashdata('error', $this->upload->display_errors());
	                        redirect(base_url().'register');
	                    }
	                }
                
                $this->session->set_flashdata('msg', 'Registration Successfull');
                redirect(base_url().'welcome');
            }
            else
            {
                $this->session->set_flashdata('error', 'Problem In Registration Try Again');
                redirect(base_url().'register');
            }

	} 
}

