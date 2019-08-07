<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Other extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->auth->check_session();
        $this->load->model('user_model');
        $this->load->model('other_model');

        if($this->session->userdata('id') != '1'){
        	redirect(base_url('error404'));
        }
    }


    public function search_keywords()
    {
    	$data['page_title']	= 'Search Keywords';
    	$this->db->order_by("id", "DESC");
		$data['keywords'] = $this->db->get('search_keywords')->result_array();
		$this->load->template('other/keywords/index',$data);
    }

    public function delete_keyword($id = false)
    {
    	if($id)
		{
			if($this->other_model->keyword($id))
			{

				$this->db->where('id',$id);
				if($this->db->delete('search_keywords'))
				{
					$this->session->set_flashdata('msg', 'Keyword Successfully Deleted');
	        		redirect(base_url().'other/search_keywords');
				}
				else{
					$this->session->set_flashdata('error', 'Keyword Not Deleted Try Again');
	        		redirect(base_url().'other/search_keywords');
				}
			}
			else{
				$this->session->set_flashdata('error', 'Keyword Not Found');
	        	redirect(base_url().'other/search_keywords');
			}

		}
		else{
			$this->session->set_flashdata('error', 'Keyword Not Found');
	        redirect(base_url().'other/search_keywords');
		}
    }

    public function delete_all_keyword()
    {
    	$this->db->truncate('search_keywords');
    	$this->session->set_flashdata('msg', 'Keywords Successfully Deleted');
	    redirect(base_url().'other/search_keywords');
    }


    public function customer_email()
    {
    	$data['page_title']	= 'Customer Email';
    	$this->load->template('other/customer_email',$data);
    }


    public function customer_mail_Send()
	{	
		$image_name = "";
		if(!empty($_FILES['image']['name']))
	    {
        	
	    	
            $config['upload_path']      = './uploads/email/';
            $config['allowed_types']    = 'gif|jpg|png|jpeg';
            $config['max_size']         = 2000000;
            $config['file_name']        = "IMAGE.jpg";
            $this->load->library('upload', $config);
            $this->upload->do_upload('image');
            $image_name = "IMAGE.jpg";
        }


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


		
		
		foreach ($this->db->get_where('social_user',['delete_flag' => '0'])->result_array() as $key => $value) {
			$this->email->from(get_setting()['smtp_user'], 'DELHIBAZAR');
	        $this->email->to($value['email']); 
	        $this->email->subject($this->input->post('subject'));
	        $this->email->message($this->input->post('msg')); 

	        
	        if(!empty($image_name))
		    {
				$this->email->attach(base_url()."uploads/email/".$image_name);
			}

	    	$this->email->send();
		}
			






    	if(!empty($image_name))
	    {
	    	if(file_exists(FCPATH."./uploads/email/".$image_name)){
	            unlink(FCPATH."./uploads/email/".$image_name);    
	        }
    	}
    	
        
        $this->session->set_flashdata('msg', 'Message Successfully Sent');
        redirect(base_url('other/customer_email'));
    

	}
}