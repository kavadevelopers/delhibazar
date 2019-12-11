<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shop_offer extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->auth->check_session();
        $this->load->model('shop_model');

        if($this->session->userdata('id') != '1'){
        	redirect(base_url('error404'));
        }
    }

    public function index()
    {
    	$data['page_title']	= 'Manage Offers';
		$data['offers'] = $this->shop_model->get_offers();
		$this->load->template('offer/index',$data);
    }

    public function add()
    {
    	$data['page_title']	= 'Add Offer';
		$this->load->template('offer/add',$data);
    }

	public function edit($id = false)
    {
    	$data['page_title']	= 'Edit Offer';
    	$data['data']		= $this->shop_model->offer_id($id)[0];
		$this->load->template('offer/edit',$data);
    }    

    public function save()
    {
    	$this->form_validation->set_error_delimiters('<div class="my_text_error">', '</div>');

    	$this->form_validation->set_rules('type', 'Type', 'trim|required');
    	$this->form_validation->set_rules('amount', 'Amount', 'trim|decimal|required');
    	$this->form_validation->set_rules('description', 'Description', 'trim|required');
    	$this->form_validation->set_rules('shop', 'Shop', 'trim|required');
    	$this->form_validation->set_rules('from', 'From', 'trim|required');
    	$this->form_validation->set_rules('to', 'To', 'trim|required');

    	if($this->form_validation->run() == FALSE){
    		$data['page_title']	= 'Add Offer';
			$this->load->template('offer/add',$data);
    	}else{

    		if(!empty($_FILES['image']['name']))
	        {
	            $path       = $_FILES['image']['name'];
	            $newName    = md5(microtime(true)).".".pathinfo($path, PATHINFO_EXTENSION); 
	            $config['upload_path']      = './uploads/offer';
	            $config['allowed_types']    = 'gif|jpg|png|jpeg';
	            $config['max_size']         = 2000000;
	            
	            $config['file_name']        = $newName;
	            $this->load->library('upload', $config);
	            $this->upload->do_upload('image');

	        }
	        else{
	        	$newName = "";
	        }


    		$data = array(
		        'type'           		=> 	$this->input->post('type'),
		        'amount'           		=> 	$this->input->post('amount'),
		        'description'         	=> 	$this->input->post('description'),
		        'shop'         			=> 	$this->input->post('shop'),
		        'date_from'         	=> 	_ddate($this->input->post('from')),
		        'date_to'         		=> 	_ddate($this->input->post('to')),
		        'image'         		=> 	$newName
			);

			if($this->db->insert('offers', $data)){

				$this->session->set_flashdata('msg', 'Offer Successfully Added');
				redirect(base_url().'shop_offer');
							
			}
			else
			{
				$this->session->set_flashdata('error', 'Problem In Add Offer Try Again');
	        	redirect(base_url().'shop_offer/add');
			}
    	}
    }

    public function update()
    {
    	$this->form_validation->set_error_delimiters('<div class="my_text_error">', '</div>');

    	$this->form_validation->set_rules('type', 'Type', 'trim|required');
    	$this->form_validation->set_rules('amount', 'Amount', 'trim|decimal|required');
    	$this->form_validation->set_rules('description', 'Description', 'trim|required');
    	$this->form_validation->set_rules('shop', 'Shop', 'trim|required');
    	$this->form_validation->set_rules('from', 'From', 'trim|required');
    	$this->form_validation->set_rules('to', 'To', 'trim|required');

    	if($this->form_validation->run() == FALSE){
    		$data['page_title']	= 'Edit Offer';
	    	$data['data']		= $this->shop_model->offer_id($this->input->post('id'))[0];
			$this->load->template('offer/edit',$data);
    	}else{

    		if(!empty($_FILES['image']['name']))
	        {
	            $path       = $_FILES['image']['name'];
	            $newName    = md5(microtime(true)).".".pathinfo($path, PATHINFO_EXTENSION); 
	            $config['upload_path']      = './uploads/offer';
	            $config['allowed_types']    = 'gif|jpg|png|jpeg';
	            $config['max_size']         = 2000000;
	            
	            $config['file_name']        = $newName;
	            $this->load->library('upload', $config);
	            $this->upload->do_upload('image');

	            $this->db->where('id',$this->input->post('id'));
	            $this->db->update('offers', ['image' => $newName]);
	        }


    		$data = array(
		        'type'           		=> 	$this->input->post('type'),
		        'amount'           		=> 	$this->input->post('amount'),
		        'description'         	=> 	$this->input->post('description'),
		        'shop'         			=> 	$this->input->post('shop'),
		        'date_from'         	=> 	_ddate($this->input->post('from')),
		        'date_to'         		=> 	_ddate($this->input->post('to'))
			);

    		$this->db->where('id',$this->input->post('id'));
			if($this->db->update('offers', $data)){

				$this->session->set_flashdata('msg', 'Offer Successfully Updated');
				redirect(base_url().'shop_offer');
							
			}
			else
			{
				$this->session->set_flashdata('error', 'Problem In Add Offer Try Again');
	        	redirect(base_url().'shop_offer/add');
			}
    	}
    }

    public function delete($id)
    {
    	$this->db->where('id',$id);
    	$this->db->delete('offers');
    	$this->session->set_flashdata('msg', 'Offer Successfully Deleted');
		redirect(base_url().'shop_offer');
    }

}