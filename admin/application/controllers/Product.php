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
        $this->form_validation->set_rules('list_price', 'List Price', 'trim|max_length[10]|decimal');
        $this->form_validation->set_rules('category[]', 'Category', 'trim|required');
        $this->form_validation->set_rules('short_desc', 'Short Description', 'trim|required');
        $this->form_validation->set_rules('editor1', 'Description', 'trim|required');
        $this->form_validation->set_rules('keywords', 'Description', 'trim');
        $this->form_validation->set_rules('description', 'Description', 'trim');
        $this->form_validation->set_rules('tax', 'Tax', 'trim|required|max_length[2]|numeric');
        $this->form_validation->set_rules('stock', 'Stock', 'trim|required|max_length[10]|numeric');
        $this->form_validation->set_rules('amount_without_tax', 'Amount without tax', 'trim|required|max_length[10]|decimal');
        $this->form_validation->set_rules('cash_on_delivery', 'Cash On Delivery', 'trim|required');
        $this->form_validation->set_rules('sizes', 'Sizes', 'trim');
        $this->form_validation->set_rules('featured', 'Featured Product', 'trim');

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
                            'list_price'    =>  $this->input->post('list_price'),
                            'short_desc'    =>  trim($this->input->post('short_desc')),
                            'desc'          =>  trim($this->input->post('editor1')),
                            'category'      =>  implode(',', $this->input->post('category')),
                            'description'   =>  $this->input->post('description'),
                            'tax'           =>  $this->input->post('tax'),
                            'amount_without_tax'   =>  $this->input->post('amount_without_tax'),
                            'keyword'       =>  $this->input->post('keywords'),
                            'created_by'    =>  $this->session->userdata('id'),
                            'updated_by'    =>  $this->session->userdata('id'),
                            'created_at'    =>  _now_dt(),
                            'updated_at'    =>  _now_dt(),
                            'cod'           =>  $this->input->post('cash_on_delivery'),
                            'stock'         =>  $this->input->post('stock'),
                            'sizes'         =>  $this->input->post('sizes'),
                            'featured'      =>  $this->input->post('featured')
                        ];

                if($this->db->insert('product', $product)){

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
        $this->form_validation->set_rules('list_price', 'List Price', 'trim|max_length[10]|decimal');
        $this->form_validation->set_rules('category[]', 'Category', 'trim|required');
        $this->form_validation->set_rules('short_desc', 'Short Description', 'trim|required');
        $this->form_validation->set_rules('editor1', 'Description', 'trim|required');
        $this->form_validation->set_rules('keywords', 'Description', 'trim');
        $this->form_validation->set_rules('description', 'Description', 'trim');
        $this->form_validation->set_rules('status', 'Description', 'trim');
        $this->form_validation->set_rules('tax', 'Tax', 'trim|required|max_length[2]|numeric');
        $this->form_validation->set_rules('amount_without_tax', 'Amount without tax', 'trim|required|max_length[10]|decimal');
        $this->form_validation->set_rules('cash_on_delivery', 'Cash On Delivery', 'trim|required');
        $this->form_validation->set_rules('stock', 'Stock', 'trim|required|max_length[10]|numeric');
        $this->form_validation->set_rules('sizes', 'Sizes', 'trim');
        $this->form_validation->set_rules('featured', 'Featured Product', 'trim');

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
                            'status'        =>  $this->input->post('status'),
                            'list_price'    =>  $this->input->post('list_price'),
                            'short_desc'    =>  trim($this->input->post('short_desc')),
                            'desc'          =>  trim($this->input->post('editor1')),
                            'tax'           =>  $this->input->post('tax'),
                            'amount_without_tax'   =>  $this->input->post('amount_without_tax'),
                            'category'      =>  implode(',', $this->input->post('category')),
                            'description'   =>  $this->input->post('description'),
                            'keyword'       =>  $this->input->post('keywords'),
                            'updated_by'    =>  $this->session->userdata('id'),
                            'updated_at'    =>  _now_dt(),
                            'cod'           =>  $this->input->post('cash_on_delivery'),
                            'stock'         =>  $this->input->post('stock'),
                            'sizes'         =>  $this->input->post('sizes'),
                            'featured'      =>  $this->input->post('featured')
                        ];
                $this->db->where('id',$this->input->post('product_id'));
                if($this->db->update('product', $product)){


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

                $data   =   ['df' => '1', 'updated_at' => date('Y-m-d H:i:s')];

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

    public function change_image($id = false)
    {
        if($id)
        { 
            if($this->product_model->check_product_by_id($id))
            {

                $data['page_title'] = 'Manage Images';
                $data['product']    = $this->product_model->product_id_where($id)[0];
                $this->load->template('product/change_images',$data);

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


    public function save_banner()
    {
        $croped_image = $_POST['image'];

        list($type, $croped_image) = explode(';', $croped_image);
        list(, $croped_image)      = explode(',', $croped_image);
        $croped_image = base64_decode($croped_image);

        $imageName = md5(microtime(true)).'.jpg';

        if(!file_put_contents('./uploads/product/banner/'.$imageName, $croped_image)){
            $this->session->set_flashdata('error', 'Banner Upload Error Please Try again.');
            exit;
        }
        else{

            $product = $this->product_model->product_id_where($_POST['product_id'])[0];

            if($product['bannner'] != 'no-image.png'){
                if(file_exists(FCPATH."./uploads/product/banner/".$product['bannner'])){
                    unlink(FCPATH."./uploads/product/banner/".$product['bannner']);    
                }
            }
        

            $this->db->where('id' , $_POST['product_id']);
            $this->db->update('product',['bannner' => $imageName]);

            $this->session->set_flashdata('msg', 'Banner Successfully Changed');
            
        }
        
    }

    public function save_image()
    {
        $croped_image = $_POST['image'];

        list($type, $croped_image) = explode(';', $croped_image);
        list(, $croped_image)      = explode(',', $croped_image);
        $croped_image = base64_decode($croped_image);

        $imageName = md5(microtime(true)).'.jpg';

        if(!file_put_contents('./uploads/product/'.$imageName, $croped_image)){
            $this->session->set_flashdata('error', 'Banner Upload Error Please Try again.');
            exit;
        }
        else{
        
            $this->db->insert('product_images',['image' => $imageName , 'p_id' => $_POST['product_id']]);

            $this->session->set_flashdata('msg', 'Banner Successfully Changed');
            
        }
        
    }


    public function delete_image(){

        $image = $this->db->get_where('product_images',['id' => $this->input->post('id')])->result_array()[0];

        if(file_exists(FCPATH."./uploads/product/".$image['image'])){
            unlink(FCPATH."./uploads/product/".$image['image']);    
        }

        $this->db->where('id' , $this->input->post('id'));
        $this->db->delete('product_images');
    }

    public function save_Chart()
    {
        $croped_image = $_POST['image'];

        list($type, $croped_image) = explode(';', $croped_image);
        list(, $croped_image)      = explode(',', $croped_image);
        $croped_image = base64_decode($croped_image);

        $imageName = md5(microtime(true)).'.jpg';

        if(!file_put_contents('./uploads/product/sizechart/'.$imageName, $croped_image)){
            $this->session->set_flashdata('error', 'Banner Upload Error Please Try again.');
            exit;
        }
        else{

            $product = $this->product_model->product_id_where($_POST['product_id'])[0];

            if($product['chart'] != ''){
                if(file_exists(FCPATH."./uploads/product/sizechart/".$product['chart'])){
                    unlink(FCPATH."./uploads/product/sizechart/".$product['chart']);    
                }
            }
        

            $this->db->where('id' , $_POST['product_id']);
            $this->db->update('product',['chart' => $imageName]);

            $this->session->set_flashdata('msg', 'Size Chart Successfully Uploaded');
            
        }
        
    }


    public function deleteChart_Image($id = false)
    {
        if($id)
        { 
            if($this->product_model->check_product_by_id($id))
            {
                $product = $this->product_model->product_id_where($id)[0];
                if($product['chart'] != ''){
                    if(file_exists(FCPATH."./uploads/product/sizechart/".$product['chart'])){
                        unlink(FCPATH."./uploads/product/sizechart/".$product['chart']);    
                    }
                }
            

                $this->db->where('id' , $product['id']);
                $this->db->update('product',['chart' => '']);

                $this->session->set_flashdata('msg', 'Size Chart Successfully Deleted');
                redirect(base_url().'product/change_image/'.$product['id']);
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