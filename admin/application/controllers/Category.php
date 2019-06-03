<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->auth->check_session();
        $this->load->model('user_model');

        if($this->session->userdata('id') != '1'){
        	redirect(base_url('error404'));
        }
    }

    public function index(){

    	$data['page_title']	= 'Manage Category';
		$data['categories'] = $this->db->order_by('id','DESC')->get_where('category',['df' => '0'])->result_array();
		$this->load->template('category/index',$data);

    }

    public function add()
    {
    	$data['page_title']	= 'Add Category';
    	$this->load->template('category/add',$data);
    }

    public function edit($id = false)
    {
    	if($id)
    	{
    		$category = $this->db->get_where('category',['id' => $id])->result_array();
    		if($category){
	    		$data['page_title']	= 'Edit Category';
	    		$data['category']	= $category[0];
	    		$this->load->template('category/edit',$data);
	    	}else{
	    		$this->session->set_flashdata('error', 'Category Not Found');
	        	redirect(base_url().'category');	
	    	}
    	}else{
    		$this->session->set_flashdata('error', 'Category Not Found');
	        redirect(base_url().'category');
    	}

    }

    public function delete($id = false)
    {
    	if($id)
    	{
    		$category = $this->db->get_where('category',['id' => $id])->result_array();
    		if($category){

				$this->db->where('id',$id);
				if($this->db->update('category', ['df' => '1'])){

					$this->session->set_flashdata('msg', 'Category Successfully Deleted');
					redirect(base_url().'category');
								
				}
				else
				{
					$this->session->set_flashdata('error', 'Problem In Delete Category Try Again');
		        	redirect(base_url().'category');
				}


	    	}else{
	    		$this->session->set_flashdata('error', 'Category Not Found');
	        	redirect(base_url().'category');	
	    	}
    	}else{
    		$this->session->set_flashdata('error', 'Category Not Found');
	        redirect(base_url().'category');
    	}

    }

    public function save(){
		$this->form_validation->set_error_delimiters('<div class="my_text_error">', '</div>');

		$this->form_validation->set_rules('name', 'Category Name', 'trim|required|min_length[2]|max_length[40]');

		if ($this->form_validation->run() == FALSE)
		{
			$data['page_title']	= 'Add Category';
    		$this->load->template('category/add',$data);
		}
		else
		{ 

			$insert = array(
		        'name'           	  => 	$this->input->post('name')
		        
			);

			if($this->db->insert('category', $insert)){

				$this->session->set_flashdata('msg', 'Category Successfully Added');
				redirect(base_url().'category');
							
			}
			else
			{
				$this->session->set_flashdata('error', 'Problem In Add Category Try Again');
	        	redirect(base_url().'category/add');
			}
		}

	}

	public function update(){
		$this->form_validation->set_error_delimiters('<div class="my_text_error">', '</div>');

		$this->form_validation->set_rules('name', 'Category Name', 'trim|required|min_length[2]|max_length[40]');
		$this->form_validation->set_rules('main_id', 'id', 'trim');

		if ($this->form_validation->run() == FALSE)
		{
			$category = $this->db->get_where('category',['id' => $this->input->post('main_id')])->result_array();
    		$data['page_title']	= 'Edit Category';
    		$data['category']	= $category[0];
    		$this->load->template('category/edit',$data);
		}
		else
		{ 

			$update = array(
		        'name'           	  => 	$this->input->post('name')
		        
			);

			$this->db->where('id',$this->input->post('main_id'));
			if($this->db->update('category', $update)){

				$this->session->set_flashdata('msg', 'Category Successfully Saved');
				redirect(base_url().'category');
							
			}
			else
			{
				$this->session->set_flashdata('error', 'Problem In Save Category Try Again');
	        	redirect(base_url().'category');
			}
		}

	}







}
?>