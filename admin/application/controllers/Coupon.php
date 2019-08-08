<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coupon extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->auth->check_session();
        $this->load->model('user_model');
        $this->load->model('general_model');

        if($this->session->userdata('id') != '1'){
        	redirect(base_url('error404'));
        }
    }

    public function index(){

    	$data['page_title']	= 'Coupon Management';
		$data['coupon'] = $this->db->order_by('id','DESC')->get_where('coupon',['df' => '0'])->result_array();
		$this->load->template('coupon/index',$data);

    }

    public function add()
    {
    	$data['page_title']	= 'Add Coupon';
    	$this->load->template('coupon/add',$data);
    }

    public function edit($id = false)
    {
    	if($id){
    		if($this->general_model->get_coupon($id)){
    			$data['page_title']	= 'Edit Coupon';
    			$data['coupon']		= $this->general_model->get_coupon($id)[0];
    			$this->load->template('coupon/edit',$data);
    		}
    		else{
    			$this->session->set_flashdata('error', 'Code not found');
            	redirect(base_url().'coupon');
    		}
    	}
    	else{
    		$this->session->set_flashdata('error', 'Code not found');
            redirect(base_url().'coupon');
    	}
    }

    public function delete($id = false)
    {
    	if($id){
    		if($this->general_model->get_coupon($id)){
    			$this->db->where('id',$id);
				$this->db->update('coupon', ['df' => '1','updated_at' => _now_dt()]);

				$this->session->set_flashdata('msg', 'Coupon Successfully Deleted');
				redirect(base_url().'coupon');
    		}
    		else{
    			$this->session->set_flashdata('error', 'Code not found');
            	redirect(base_url().'coupon');
    		}
    	}
    	else{
    		$this->session->set_flashdata('error', 'Code not found');
            redirect(base_url().'coupon');
    	}
    }


    public function save()
    {
    	$this->form_validation->set_error_delimiters('<div class="my_text_error">', '</div>');

		$this->form_validation->set_rules('code', 'Code', 'trim|required|min_length[5]|max_length[40]|callback_unique');
		$this->form_validation->set_rules('expire_date', '', 'trim');
		$this->form_validation->set_rules('disccount_type', 'Discount Type', 'trim|required');
		$this->form_validation->set_rules('value', 'Discount Value', 'trim|required|decimal');	

		if ($this->form_validation->run() == FALSE)
		{
			$data['page_title']	= 'Add Coupon';
    		$this->load->template('coupon/add',$data);
		}
		else
		{ 
			if(empty($this->input->post('expire_date'))){
				$exp_date = NULL;
			}else{
				$exp_date = date('Y-m-d',strtotime($this->input->post('expire_date')));
			}
			$insert = array(
		        'code'           	  => 	strtoupper($this->input->post('code')),
		        'expire_date'         => 	$exp_date,
		        'off_type'         	  => 	$this->input->post('disccount_type'),
		        'value'         	  => 	$this->input->post('value'),
		        'created_at'       	  => 	_now_dt()
		        
			);

			if($this->db->insert('coupon', $insert)){

				$this->session->set_flashdata('msg', 'Coupon Successfully Added');
				redirect(base_url().'coupon');
							
			}
			else
			{
				$this->session->set_flashdata('error', 'Problem In Add Coupon Try Again');
	        	redirect(base_url().'coupon/add');
			}
		}
    }

    public function update()
    {

    	$this->form_validation->set_error_delimiters('<div class="my_text_error">', '</div>');

		$this->form_validation->set_rules('code', 'Code', 'trim|required|min_length[5]|max_length[40]|callback_edit_unique['.$this->input->post('main_id').']');
		$this->form_validation->set_rules('expire_date', '', 'trim');
		$this->form_validation->set_rules('main_id', '', 'trim');
		$this->form_validation->set_rules('disccount_type', 'Discount Type', 'trim|required');
		$this->form_validation->set_rules('value', 'Discount Value', 'trim|required|decimal');	
		$this->form_validation->set_rules('status', 'Discount Value', 'trim');	

		if ($this->form_validation->run() == FALSE)
		{
			$data['page_title']	= 'Edit Coupon';
			$data['coupon']		= $this->general_model->get_coupon($this->input->post('main_id'))[0];
			$this->load->template('coupon/edit',$data);
		}
		else
		{ 
			if(empty($this->input->post('expire_date'))){
				$exp_date = NULL;
			}else{
				$exp_date = date('Y-m-d',strtotime($this->input->post('expire_date')));
			}
			$insert = array(
		        'code'           	  => 	strtoupper($this->input->post('code')),
		        'expire_date'         => 	$exp_date,
		        'off_type'         	  => 	$this->input->post('disccount_type'),
		        'value'         	  => 	$this->input->post('value'),
		        'status'			  =>	$this->input->post('status'),
		        'updated_at'       	  => 	_now_dt(),
		        
			);
			$this->db->where('id',$this->input->post('main_id'));
			if($this->db->update('coupon', $insert)){

				$this->session->set_flashdata('msg', 'Coupon Successfully Updated');
				redirect(base_url().'coupon');
							
			}
			else
			{
				$this->session->set_flashdata('error', 'Problem In Add Coupon Try Again');
	        	redirect(base_url().'coupon/add');
			}
		}
    }

    public function unique($code)
	{
	
		if ($this->db->get_where('coupon',['code' => $code,'df' => '0'])->result_array()) {      
		  	$this->form_validation->set_message('unique', 'Code Already Exists');
		    return false;
		}
		else{
			return true;	
		}
	
	}

	public function edit_unique($code,$id)
	{
	
		if ($this->db->get_where('coupon',['code' => $code,'df' => '0','id !=' => $id])->result_array()) {      
		  	$this->form_validation->set_message('edit_unique', 'Code Already Exists');
		    return false;
		}
		else{
			return true;	
		}
	
	}


}
?>