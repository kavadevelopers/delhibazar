<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Packages extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->auth->check_session();
        $this->load->model('package_model');
        
    }


	public function ad_index()
	{
		$data['page_title']	= 'Manage Ad Packages';
		$data['ad'] 		= $this->package_model->ad();
		$this->load->template('packages/ad_index',$data);
	}

	public function shop_index()
	{
		$data['page_title']	= 'Manage Listing Packages';
		$data['shop'] 		= $this->package_model->shop();
		$this->load->template('packages/shop_index',$data);
	}

	public function ad()
	{
		$data['page_title']	= 'Manage Packages';
		$this->load->template('packages/ad_add',$data);
	}

	public function shop()
	{
		$data['page_title']	= 'Manage Packages';
		$this->load->template('packages/shop_add',$data);
	}

	/***********************************************************
							SAVE ADS
	************************************************************/
	public function save_ad()
	{
		$this->form_validation->set_error_delimiters('<div class="my_text_error">', '</div>');
        
        $this->form_validation->set_rules('plan', 'Plan Name', 'trim|required|max_length[250]');
        $this->form_validation->set_rules('price', 'Price', 'trim|required|decimal|max_length[50]');
        $this->form_validation->set_rules('duration', 'Duration', 'trim|required|is_natural|max_length[8]');

        if ($this->form_validation->run() == FALSE)
        {
            $data['page_title']	= 'Manage Packages';
			$this->load->template('packages/ad_add',$data);
        }
        else
        {
        	$data = [
        				'plan'			=> $this->input->post('plan'),
        				'price'			=> $this->input->post('price'),
        				'duration'		=> $this->input->post('duration'),
        				'created_at'	=> date('Y-m-d H:i:s')
        			];

        		if($this->db->insert('ad_package',$data))
        		{
        			$this->session->set_flashdata('msg', 'Ad Packages Successfully Added');
	                redirect(base_url().'packages/ad_index');
        		}
        		else
        		{
        			$this->session->set_flashdata('error', 'Problem In Add Ad Packages Try Again');
	                redirect(base_url().'packages/ad');
        		}
        }

	}

	/***********************************************************
							DELETE ADS
	************************************************************/
	public function ad_delete($id = false)
	{
		if($id)
		{
			if($this->package_model->ad_where($id))
			{
				if($this->db->delete('ad_package',['id' => $id]))
				{
					$this->session->set_flashdata('msg', 'Package Successfully Deleted');
                	redirect(base_url().'packages/ad_index');
				}
				else
				{

				}
			}
			else
			{
				$this->session->set_flashdata('error', 'Package Not Found');
            	redirect(base_url().'packages/ad_index');
			}
		}
		else
		{
			$this->session->set_flashdata('error', 'Package Not Found');
            redirect(base_url().'packages/ad_index');
		}
	}

	/***********************************************************
							SAVE SHOP
	************************************************************/
	public function save_shop()
	{
		$this->form_validation->set_error_delimiters('<div class="my_text_error">', '</div>');
        
        $this->form_validation->set_rules('plan', 'Plan Name', 'trim|required|max_length[250]');
        $this->form_validation->set_rules('price', 'Price', 'trim|required|decimal|max_length[50]');
        $this->form_validation->set_rules('duration', 'Duration', 'trim|required|is_natural|max_length[8]');

        if ($this->form_validation->run() == FALSE)
        {
            $data['page_title']	= 'Manage Packages';
			$this->load->template('packages/shop_add',$data);
        }
        else
        {
        	$data = [
        				'plan'			=> $this->input->post('plan'),
        				'price'			=> $this->input->post('price'),
        				'duration'		=> $this->input->post('duration'),
        				'created_at'	=> date('Y-m-d H:i:s')
        			];

        		if($this->db->insert('shop_package',$data))
        		{
        			$this->session->set_flashdata('msg', 'Shop Packages Successfully Added');
	                redirect(base_url().'packages/shop_index');
        		}
        		else
        		{
        			$this->session->set_flashdata('error', 'Problem In Add Shop Packages Try Again');
	                redirect(base_url().'packages/shop');
        		}
        }

	}


	/***********************************************************
							DELETE SHOP
	************************************************************/
	public function shop_delete($id = false)
	{
		if($id)
		{
			if($this->package_model->shop_where($id))
			{
				if($this->db->delete('shop_package',['id' => $id]))
				{
					$this->session->set_flashdata('msg', 'Package Successfully Deleted');
                	redirect(base_url().'packages/shop_index');
				}
				else
				{

				}
			}
			else
			{
				$this->session->set_flashdata('error', 'Package Not Found');
            	redirect(base_url().'packages/shop_index');
			}
		}
		else
		{
			$this->session->set_flashdata('error', 'Package Not Found');
            redirect(base_url().'packages/shop_index');
		}
	}

}