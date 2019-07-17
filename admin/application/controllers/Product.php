<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->auth->check_session();
        $this->load->model('general_model');
        $this->load->model('product_model');
    }


    public function index()
    {
    	$data['page_title']	=  'Manage Product';
        $data['products']   =  $this->product_model->products(); 
		$this->load->template('product/index',$data);
    }


    public function add()
    {
        $data['page_title'] = 'Add Product';
    	$data['categories']	= $this->general_model->get_categories();
		$this->load->template('product/add',$data);
    }

    public function edit($id = false)
    {
        if($id)
        {
            if($this->product_model->check_product_by_id($id))
            {
                $data['page_title'] = 'Edit Product';
                $data['product']    = $this->product_model->check_product_by_id($id)[0];
                $data['categories'] = $this->general_model->get_categories();
                $this->load->template('product/edit',$data);
            }
            else{
                $this->session->set_flashdata('error', 'Product not found');
                redirect(base_url().'product');    
            }
        }
        else{
            $this->session->set_flashdata('error', 'Product not found');
            redirect(base_url().'product');
        }
    }

    public function save()
    {
        $this->form_validation->set_error_delimiters('<div class="my_text_error">', '</div>');

        $this->form_validation->set_rules('name', 'Product Name', 'trim|required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('price', 'Price', 'trim|required|max_length[10]|decimal');
        $this->form_validation->set_rules('category', 'Category', 'trim|required');
        $this->form_validation->set_rules('short_desc', 'Short Description', 'trim|required');
        $this->form_validation->set_rules('editor1', 'Description', 'trim|required');


        if ($this->form_validation->run() == FALSE)
        {
            $data['page_title'] = 'Add Product';
            $data['categories'] = $this->general_model->get_categories();
            $this->load->template('product/add',$data);
        }
        else
        {

            $product =  [
                            'hash'          =>  md5(microtime(true)),
                            'name'          =>  ucfirst($this->input->post('name')),
                            'amount'        =>  $this->input->post('price'),
                            'short_desc'    =>  trim($this->input->post('short_desc')),
                            'desc'          =>  trim($this->input->post('editor1')),
                            'category'      =>  $this->input->post('category'),
                            'created_by'    =>  $this->session->userdata('id'),
                            'updated_by'    =>  $this->session->userdata('id'),
                            'created_at'    =>  _now_dt(),
                            'updated_at'    =>  _now_dt()
                        ];

                if($this->db->insert('product', $product)){
                    $insert_id = $this->db->insert_id();

                    if(!empty($_FILES['image']['name']))
                    {
                        $filesCount = count($_FILES['image']['name']);
                        for($i = 0; $i < $filesCount; $i++){
                            $_FILES['file']['name']     = $_FILES['image']['name'][$i];
                            $_FILES['file']['type']     = $_FILES['image']['type'][$i];
                            $_FILES['file']['tmp_name'] = $_FILES['image']['tmp_name'][$i];
                            $_FILES['file']['error']    = $_FILES['image']['error'][$i];
                            $_FILES['file']['size']     = $_FILES['image']['size'][$i];
                            
                            // File upload configuration
                            $config['file_name']        = md5(microtime(true)).".".pathinfo($_FILES['image']['name'][$i], PATHINFO_EXTENSION);
                            $uploadPath = './uploads/product';
                            $config['upload_path'] = $uploadPath;
                            $config['allowed_types'] = 'jpg|jpeg|png|gif';
                            
                            // Load and initialize upload library
                            $this->load->library('upload', $config);
                            $this->upload->initialize($config);
                            
                            // Upload file to server
                            if($this->upload->do_upload('file')){
                             
                                $image = [ 
                                            'p_id'        =>  $insert_id, 
                                            'image'       =>  $config['file_name'] 
                                          ];

                                $this->db->insert('product_images', $image);
                                
                            }
                            else
                            {
                                $this->session->set_flashdata('error', $this->upload->display_errors());
                                redirect(base_url().'product/add');
                            }
                        }
                        $this->session->set_flashdata('msg', 'Product Successfully Added');
                        redirect(base_url().'product');
                    }

                    $this->session->set_flashdata('msg', 'Product Successfully Added');
                    redirect(base_url().'product');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Problem In Add Product Try Again');
                    redirect(base_url().'product/add');
                }

        }

    }


    public function update()
    {
        $this->form_validation->set_error_delimiters('<div class="my_text_error">', '</div>');

        $this->form_validation->set_rules('name', 'Product Name', 'trim|required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('price', 'Price', 'trim|required|max_length[10]|decimal');
        $this->form_validation->set_rules('category', 'Category', 'trim|required');
        $this->form_validation->set_rules('short_desc', 'Short Description', 'trim|required');
        $this->form_validation->set_rules('editor1', 'Description', 'trim|required');


        if ($this->form_validation->run() == FALSE)
        {
            $data['page_title'] = 'Edit Product';
            $data['product']    = $this->product_model->check_product_by_id($this->input->post('product_id'))[0];
            $data['categories'] = $this->general_model->get_categories();
            $this->load->template('product/edit',$data);
        }
        else
        {

            $product =  [
                            'name'          =>  ucfirst($this->input->post('name')),
                            'amount'        =>  $this->input->post('price'),
                            'short_desc'    =>  trim($this->input->post('short_desc')),
                            'desc'          =>  trim($this->input->post('editor1')),
                            'category'      =>  $this->input->post('category'),
                            'updated_by'    =>  $this->session->userdata('id'),
                            'updated_at'    =>  _now_dt()
                        ];
                $this->db->where('id',$this->input->post('product_id'));
                if($this->db->update('product', $product)){
                    

                    if(!empty($_FILES['image']['name'][0]))
                    {

                        $product    = $this->product_model->product_image_where($this->input->post('product_id'));

                        foreach ($product as $key => $value) {
                        
                            if($value['image'] != '')
                            {
                                if(file_exists('./uploads/product/'.$value['image']))
                                {
                                    
                                    $this->db->where('id',$value['id']);
                                    $this->db->delete('product_images');
                                    
                                    unlink('./uploads/product/'.$value['image']);
                                }
                                else
                                {
                                    $this->db->where('id',$value['id']);
                                    $this->db->delete('product_images');
                                }
                            }
                        }

                        $filesCount = count($_FILES['image']['name']);
                        for($i = 0; $i < $filesCount; $i++){
                            $_FILES['file']['name']     = $_FILES['image']['name'][$i];
                            $_FILES['file']['type']     = $_FILES['image']['type'][$i];
                            $_FILES['file']['tmp_name'] = $_FILES['image']['tmp_name'][$i];
                            $_FILES['file']['error']    = $_FILES['image']['error'][$i];
                            $_FILES['file']['size']     = $_FILES['image']['size'][$i];
                            
                            // File upload configuration
                            $config['file_name']        = md5(microtime(true)).".".pathinfo($_FILES['image']['name'][$i], PATHINFO_EXTENSION);
                            $uploadPath = './uploads/product';
                            $config['upload_path'] = $uploadPath;
                            $config['allowed_types'] = 'jpg|jpeg|png|gif';
                            
                            // Load and initialize upload library
                            $this->load->library('upload', $config);
                            $this->upload->initialize($config);
                            
                            // Upload file to server
                            if($this->upload->do_upload('file')){
                             
                                $image = [ 
                                            'p_id'        =>  $this->input->post('product_id'), 
                                            'image'       =>  $config['file_name'] 
                                          ];

                                $this->db->insert('product_images', $image);
                                
                            }
                            else
                            {
                                $this->session->set_flashdata('error', $this->upload->display_errors());
                                redirect(base_url().'product/edit/'.$this->input->post('product_id'));
                            }
                        }
                    
                        $this->session->set_flashdata('msg', 'Product Successfully Saved');
                        redirect(base_url().'product');
                    }


                    $this->session->set_flashdata('msg', 'Product Successfully Saved');
                    redirect(base_url().'product');
                                
                }
                else
                {
                    $this->session->set_flashdata('error', 'Problem In Save Product Try Again');
                    redirect(base_url().'product/'.$this->input->post('product_id'));
                }

        }

    }

    public function delete($id = false)
    { 
        if($id)
        { 
            if($this->product_model->check_product_by_id($id))
            {

                $data   =   ['df' => '1', 'deleted_at' => date('Y-m-d H:i:s')];

                    $this->db->where('id',$id);
                if($this->db->update('product',$data))
                { 
                    $this->session->set_flashdata('msg', 'Product Successfully Deleted');
                    redirect(base_url().'product');
                }   
            }
            else
            {

                $this->session->set_flashdata('error', 'Product Not Found');
                redirect(base_url().'product');
            }
        }
        else
        {
            $this->session->set_flashdata('error', 'Product Not Found');
            redirect(base_url().'product');
        }
    }

}
?>