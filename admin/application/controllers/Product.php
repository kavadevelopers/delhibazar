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
                            'short_desc'    =>  $this->input->post('short_desc'),
                            'desc'          =>  $this->input->post('editor1'),
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
                        $path = $_FILES['image']['name'];
                        $newName = md5(microtime(true)).".".pathinfo($path, PATHINFO_EXTENSION); 
                        $config['upload_path']      = './uploads/product';
                        $config['allowed_types']    = 'gif|jpg|png|jpeg';
                        $config['max_size']         = 2000000;
                        
                        $config['file_name']        = $newName;
                        $this->load->library('upload', $config);

                        $image = [ 'image'       =>    $newName ];

                        if($this->upload->do_upload('image'))
                        {
                            $image = [ 
                                        'p_id'        =>  $insert_id, 
                                        'image'       =>  $newName 
                                      ];

                            if($this->db->insert('product_images', $image))
                            {
                                $this->session->set_flashdata('msg', 'Product Successfully Added');
                                redirect(base_url().'product');
                            }
                            else
                            {
                                $this->session->set_flashdata('error', 'Problem In Upload Image');
                                redirect(base_url().'product/add');
                            }
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
                            'short_desc'    =>  $this->input->post('short_desc'),
                            'desc'          =>  $this->input->post('editor1'),
                            'category'      =>  $this->input->post('category'),
                            'updated_by'    =>  $this->session->userdata('id'),
                            'updated_at'    =>  _now_dt()
                        ];
                $this->db->where('id',$this->input->post('product_id'));
                if($this->db->update('product', $product)){
                    

                    if(!empty($_FILES['image']['name']))
                    {
                        $path       = $_FILES['image']['name'];
                        $newName    = md5(microtime(true)).".".pathinfo($path, PATHINFO_EXTENSION); 
                        $config['upload_path']      = './uploads/product';
                        $config['allowed_types']    = 'gif|jpg|png|jpeg';
                        $config['max_size']         = 2000000;
                        
                        $config['file_name']        = $newName;
                        $this->load->library('upload', $config);

                        $image = [ 'image'       =>    $newName ];

                        if($this->upload->do_upload('image'))
                        {
                            $product    = $this->product_model->product_image_where($this->input->post('product_id'));

                            if($product[0]['image'] != '')
                            {
                                unlink('./uploads/product/'.$product[0]['image']);
                            }

                            $image = [
                                        'p_id'        =>    $this->input->post('product_id'),
                                        'image'       =>    $newName 
                                      ];

                                $this->db->where('p_id',$this->input->post('product_id'));
                            if($this->db->update('product_images', $image))
                            {
                                $this->session->set_flashdata('msg', 'Product Successfully Saved');
                                redirect(base_url().'product');
                            }
                            else
                            {
                                $this->session->set_flashdata('error', 'Problem In Upload Image');
                                redirect(base_url().'product/add');
                            }
                        }
                        else
                        {
                            $this->session->set_flashdata('error', $this->upload->display_errors());
                            redirect(base_url().'product/add');
                        }
                    }


                    $this->session->set_flashdata('msg', 'Product Successfully Saved');
                    redirect(base_url().'product');
                                
                }
                else
                {
                    $this->session->set_flashdata('error', 'Problem In Save Product Try Again');
                    redirect(base_url().'product');
                }

        }

    }


    public function change_image($id = false)
    {
        
    }
}
?>