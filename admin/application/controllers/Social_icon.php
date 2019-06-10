<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Social_icon extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->auth->check_session();
        
    }


    public function index()
    {
        $data['page_title'] = 'Manage Social Links';
        $data['icon']		= $this->db->order_by('id','ASC')->get('social_icon')->result_array();
        $this->load->template('social_icon/index',$data);
    }



    public function insert()
    {
    	

    	$data = [
                    'title'         => ucfirst($this->input->post('title')),
					'class'			=> $this->input->post('class'),
    				'link'			=> $this->input->post('link'),
    				'created_at'	=> date('Y-m-d')
    			];

    		if($this->db->insert('social_icon',$data))
    		{
    			$this->session->set_flashdata('msg', 'Link Successfully Added');
				redirect(base_url().'social_icon');
    		}
    		else
    		{
    			$this->session->set_flashdata('error', 'Problem In Add Link Try Again');
	        	redirect(base_url().'social_icon');
    		}

    }

    public function update()
    {
    	

    	$data = [
                    'title'         => ucfirst($this->input->post('title')),
                    'class'			=> $this->input->post('class'),
    				'link'			=> $this->input->post('link')
    			];

    			$this->db->where('id',$this->input->post('id'));
    		if($this->db->update('social_icon',$data))
    		{
    			$this->session->set_flashdata('msg', 'Link Successfully updated');
				redirect(base_url().'social_icon');
    		}
    		else
    		{
    			$this->session->set_flashdata('error', 'Problem In Update Link Try Again');
	        	redirect(base_url().'social_icon');
    		}

    }


    public function delete($id = false)
    {
    	if($id)
    	{
    		$this->db->where('id',$id);
			if($this->db->delete('social_icon')){

				$this->session->set_flashdata('msg', 'Link Successfully Deleted');
				redirect(base_url().'social_icon');
							
			}
			else
			{
				$this->session->set_flashdata('error', 'Problem In Delete Link Try Again');
	        	redirect(base_url().'social_icon');
			}

		}
		else
		{
    		$this->session->set_flashdata('error', 'Link Not Found');
	        redirect(base_url().'social_icon');
    	}

    }

}
