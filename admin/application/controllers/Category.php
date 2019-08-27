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
		$data['categories'] = $this->db->order_by('id','DESC')->get_where('main_category',['df' => '0'])->result_array();
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
    		$category = $this->db->get_where('main_category',['id' => $id])->result_array();
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
    		$category = $this->db->get_where('main_category',['id' => $id])->result_array();
    		if($category){

				$this->db->where('id',$id);
				if($this->db->update('main_category', ['df' => '1'])){

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

			if($this->db->insert('main_category', $insert)){

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
		$this->form_validation->set_rules('status', 'id', 'trim');

		if ($this->form_validation->run() == FALSE)
		{
			$category = $this->db->get_where('main_category',['id' => $this->input->post('main_id')])->result_array();
    		$data['page_title']	= 'Edit Category';
    		$data['category']	= $category[0];
    		$this->load->template('category/edit',$data);
		}
		else
		{ 

			$update = array(
		        'name'           	  	=> 	$this->input->post('name'),
		        'status'				=>	$this->input->post('status')
		        
			);

			$this->db->where('id',$this->input->post('main_id'));
			if($this->db->update('main_category', $update)){

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



	public function sub_category()
	{
		$data['page_title']	= 'Manage Sub Category';
		$data['categories'] = $this->db->order_by('id','DESC')->get_where('category',['df' => '0'])->result_array();
		$this->load->template('category/sub_index',$data);
	}

	public function sub_category_add()
	{
		$data['page_title']	= 'Add Sub Category';
    	$this->load->template('category/sub_add',$data);
	}

	public function sub_edit($id = FALSE)
	{
		if($id)
    	{
    		$category = $this->db->get_where('category',['id' => $id])->result_array();
    		if($category){
	    		$data['page_title']	= 'Edit Sub Category';
	    		$data['category']	= $category[0];
	    		$this->load->template('category/sub_edit',$data);
	    	}else{
	    		$this->session->set_flashdata('error', 'Category Not Found');
	        	redirect(base_url().'category/sub_category');	
	    	}
    	}else{
    		$this->session->set_flashdata('error', 'Category Not Found');
	        redirect(base_url().'category/sub_category');
    	}
	}

	public function sub_delete($id = false)
    {
    	if($id)
    	{
    		$category = $this->db->get_where('category',['id' => $id])->result_array();
    		if($category){

				$this->db->where('id',$id);
				if($this->db->update('category', ['df' => '1'])){

					$this->session->set_flashdata('msg', 'Category Successfully Deleted');
					redirect(base_url().'category/sub_category');
								
				}
				else
				{
					$this->session->set_flashdata('error', 'Problem In Delete Category Try Again');
		        	redirect(base_url().'category/sub_category');
				}


	    	}else{
	    		$this->session->set_flashdata('error', 'Category Not Found');
	        	redirect(base_url().'category/sub_category');	
	    	}
    	}else{
    		$this->session->set_flashdata('error', 'Category Not Found');
	        redirect(base_url().'category/sub_category');
    	}

    }


    public function sub_save(){
		$this->form_validation->set_error_delimiters('<div class="my_text_error">', '</div>');

		$this->form_validation->set_rules('name', 'Sub Category Name', 'trim|required|min_length[2]|max_length[40]');
		$this->form_validation->set_rules('category', 'Category', 'trim|required');

		if ($this->form_validation->run() == FALSE)
		{
			$data['page_title']	= 'Add Sub Category';
    		$this->load->template('category/sub_add',$data);
		}
		else
		{ 

			$insert = array(
		        'name'           	=> 	$this->input->post('name'),
		        'category'          => 	$this->input->post('category')
		        
			);

			if($this->db->insert('category', $insert)){

				$this->session->set_flashdata('msg', 'Category Successfully Added');
				redirect(base_url().'category/sub_category');
							
			}
			else
			{
				$this->session->set_flashdata('error', 'Problem In Add Category Try Again');
	        	redirect(base_url().'category/sub_category_add');
			}
		}

	}


    public function sub_update(){
		$this->form_validation->set_error_delimiters('<div class="my_text_error">', '</div>');

		$this->form_validation->set_rules('name', 'Sub Category Name', 'trim|required|min_length[2]|max_length[40]');
		$this->form_validation->set_rules('category', 'Category', 'trim|required');
		$this->form_validation->set_rules('main_id', 'id', 'trim');
		$this->form_validation->set_rules('status', 'id', 'trim');

		if ($this->form_validation->run() == FALSE)
		{
			$category = $this->db->get_where('category',['id' => $this->input->post('main_id')])->result_array();
    		$data['page_title']	= 'Edit Sub Category';
    		$data['category']	= $category[0];
    		$this->load->template('category/sub_edit',$data);
		}
		else
		{ 

			$update = array(
		        'name'           	  => 	$this->input->post('name'),
		        'category'          => 	$this->input->post('category'),
		        'status'				=>	$this->input->post('status')
		        
			);

			$this->db->where('id',$this->input->post('main_id'));
			if($this->db->update('category', $update)){

				$this->session->set_flashdata('msg', 'Category Successfully Saved');
				redirect(base_url().'category/sub_category');
							
			}
			else
			{
				$this->session->set_flashdata('error', 'Problem In Save Category Try Again');
	        	redirect(base_url().'category/sub_category');
			}
		}

	}


	public function change_image_category($id = false)
	{
		if($id)
    	{
    		$category = $this->db->get_where('main_category',['id' => $id])->result_array();
    		if($category){

				$data['page_title']	= 'Change Category Image';
				$data['id']			= $id;
    			$this->load->template('category/change_cate_image',$data);

	    	}else{
	    		$this->session->set_flashdata('error', 'Category Not Found');
	        	redirect(base_url().'category');	
	    	}
    	}else{
    		$this->session->set_flashdata('error', 'Category Not Found');
	        redirect(base_url().'category');
    	}
	}

	public function change_image_subcategory($id = false)
	{
		if($id)
    	{
    		$category = $this->db->get_where('category',['id' => $id])->result_array();
    		if($category){

				$data['page_title']	= 'Change Category Image';
				$data['id']			= $id;
    			$this->load->template('category/change_subcate_image',$data);

	    	}else{
	    		$this->session->set_flashdata('error', 'Category Not Found');
	        	redirect(base_url().'category');	
	    	}
    	}else{
    		$this->session->set_flashdata('error', 'Category Not Found');
	        redirect(base_url().'category');
    	}
	}


	public function cate_save_banner()
    {
        $croped_image = $_POST['image'];

        list($type, $croped_image) = explode(';', $croped_image);
        list(, $croped_image)      = explode(',', $croped_image);
        $croped_image = base64_decode($croped_image);

        $imageName = md5(microtime(true)).'.png';

        if(!file_put_contents('./uploads/category/'.$imageName, $croped_image)){
            $this->session->set_flashdata('error', 'Banner Upload Error Please Try again.');
            exit;
        }
        else{

            
            $product = $this->db->get_where('main_category',['id' => $_POST['id']])->result_array()[0];
            if($product['banner'] != 'no-image.png'){
                if(file_exists(FCPATH."./uploads/category/".$product['banner'])){
                    unlink(FCPATH."./uploads/category/".$product['banner']);    
                }
            }
        

            $this->db->where('id' , $_POST['id']);
            $this->db->update('main_category',['banner' => $imageName]);

            $this->session->set_flashdata('msg', 'Banner Successfully Changed');
            
        }
        
    }

    public function subcate_save_banner()
    {
        $croped_image = $_POST['image'];

        list($type, $croped_image) = explode(';', $croped_image);
        list(, $croped_image)      = explode(',', $croped_image);
        $croped_image = base64_decode($croped_image);

        $imageName = md5(microtime(true)).'.png';

        if(!file_put_contents('./uploads/category/'.$imageName, $croped_image)){
            $this->session->set_flashdata('error', 'Banner Upload Error Please Try again.');
            exit;
        }
        else{

            
            $product = $this->db->get_where('category',['id' => $_POST['id']])->result_array()[0];
            if($product['banner'] != 'no-image.png'){
                if(file_exists(FCPATH."./uploads/category/".$product['banner'])){
                    unlink(FCPATH."./uploads/category/".$product['banner']);    
                }
            }
        

            $this->db->where('id' , $_POST['id']);
            $this->db->update('category',['banner' => $imageName]);

            $this->session->set_flashdata('msg', 'Banner Successfully Changed');
            
        }
        
    }
}
?>