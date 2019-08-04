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

}