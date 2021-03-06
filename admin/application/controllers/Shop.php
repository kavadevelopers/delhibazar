<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shop extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->auth->check_session();
        $this->load->model('shop_model');
        $this->load->model('package_model');
    }


    public function index()
    {
        $data['page_title'] = 'Manage Shop';
        $data['shop']       = $this->shop_model->shops();
        $this->load->template('shop/index',$data);
    }

    public function categories($id = false)
    {
        if(!$id){
            $data['flad']       = '';
            $data['page_title'] = 'Manage Shop Categories';
            $data['shop']       = $this->shop_model->categories();
            $this->load->template('shop/categories/index',$data);
        }
        else{
            if($this->shop_model->categories_where($id)){
                $data['flad']       = '1';
                $data['page_title'] = 'Manage Shop Categories';
                $data['shop']       = $this->shop_model->categories();
                $data['shop_one']   = $this->shop_model->categories_where($id)[0];
                $this->load->template('shop/categories/index',$data);   
            }
            else{
                $data['flad']       = '';
                $data['page_title'] = 'Manage Shop Categories';
                $data['shop']       = $this->shop_model->categories();
                $this->load->template('shop/categories/index',$data);
            }
        }
    }

    public function area($id = false)
    {
        if(!$id){
            $data['flad']       = '';
            $data['page_title'] = 'Manage Area';
            $data['shop']       = $this->shop_model->area();
            $this->load->template('shop/categories/area',$data);
        }
        else{
            if($this->shop_model->area_where($id)){
                $data['flad']       = '1';
                $data['page_title'] = 'Manage Area';
                $data['shop']       = $this->shop_model->area();
                $data['shop_one']   = $this->shop_model->area_where($id)[0];
                $this->load->template('shop/categories/area',$data);   
            }
            else{
                $data['flad']       = '';
                $data['page_title'] = 'Manage Area';
                $data['shop']       = $this->shop_model->area();
                $this->load->template('shop/categories/area',$data);
            }
        }
    }

    public function delete_cate($id)
    {
        $this->db->where('id',$id);
        $this->db->update('shop_categories', ['df' => '1']);
        $this->session->set_flashdata('msg', 'Shop Categories Successfully Deleted');
        redirect(base_url().'shop/categories');
    }

    public function delete_area($id)
    {
        $this->db->where('id',$id);
        $this->db->update('shop_area', ['df' => '1']);
        $this->session->set_flashdata('msg', 'Shop Area Successfully Deleted');
        redirect(base_url().'shop/area');
    }

    public function add()
    {
    	$data['page_title']	        = 'Add Shop';
        $data['shop_package']       = $this->package_model->shop();
		$this->load->template('shop/add',$data);
    }


    public function slider($id)
    {
        $data['page_title']         = 'Add Slider';
        $data['shop_slider_image']  = $this->shop_model->get_slider_image($id);
        $data['id']                 = $id;    
        $this->load->template('shop/slider_upload',$data);
    }

    public function edit($id)
    {
        $data['page_title']         = 'Edit Shop';
        $data['shop']               = $this->shop_model->shop_where($id);
        $data['shop_package']       = $this->package_model->shop();
        $this->load->template('shop/edit',$data);
    }



    public function view($id = false)
    {
        if($id)
        {
            if($this->shop_model->shop_where($id))
            {
                $data['page_title'] = 'View Shop';
                $data['shop']       = $this->shop_model->shop_where($id);
                $this->load->template('shop/view',$data);
            }   
            else
            {
                $this->session->set_flashdata('error', 'Shop Not Found');
                redirect(base_url().'shop');
            }
            
        }
        else
        {
            $this->session->set_flashdata('error', 'Shop Not Found');
            redirect(base_url().'shop');
        }
    }

    /**********************************************************************
                                SAVE(INSERT)
    **********************************************************************/
    public function save_category()
    {
        $this->form_validation->set_error_delimiters('<div class="my_text_error">', '</div>');
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        if ($this->form_validation->run() == FALSE)
        {
            $data['flad']       = '';
            $data['page_title'] = 'Manage Shop Categories';
            $data['shop']       = $this->shop_model->categories();
            $this->load->template('shop/categories/index',$data);
        }
        else{
            $data = [
                        'name'      =>  $this->input->post('name')
                    ];

    
            if($this->db->insert('shop_categories', $data))
            {
                $this->session->set_flashdata('msg', 'Shop Categories Successfully Added');
                redirect(base_url().'shop/categories');
            }
            else
            {
                $this->session->set_flashdata('error', 'Problem In Add Shop Try Again');
                redirect(base_url().'shop/categories');
            }
        }

    }

    public function save_area()
    {
        $this->form_validation->set_error_delimiters('<div class="my_text_error">', '</div>');
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        if ($this->form_validation->run() == FALSE)
        {
            $data['flad']       = '';
            $data['page_title'] = 'Manage Shop Area';
            $data['shop']       = $this->shop_model->area();
            $this->load->template('shop/categories/area',$data);
        }
        else{
            $data = [
                        'name'      =>  $this->input->post('name')
                    ];

    
            if($this->db->insert('shop_area', $data))
            {
                $this->session->set_flashdata('msg', 'Shop Area Successfully Added');
                redirect(base_url().'shop/area');
            }
            else
            {
                $this->session->set_flashdata('error', 'Problem In Add Shop Try Again');
                redirect(base_url().'shop/area');
            }
        }

    }

    public function update_category()
    {
        $this->form_validation->set_error_delimiters('<div class="my_text_error">', '</div>');
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        if ($this->form_validation->run() == FALSE)
        {
            $data['flad']       = '1';
            $data['page_title'] = 'Manage Shop Categories';
            $data['shop']       = $this->shop_model->categories();
            $data['shop_one']   = $this->shop_model->categories_where($this->input->post('main_id'))[0];
            $this->load->template('shop/categories/index',$data);  
        }
        else{
            $data = [
                        'name'      =>  $this->input->post('name')
                    ];

            $this->db->where('id',$this->input->post('main_id'));
            if($this->db->update('shop_categories', $data))
            {
                $this->session->set_flashdata('msg', 'Shop Categories Successfully Saved');
                redirect(base_url().'shop/categories');
            }
            else
            {
                $this->session->set_flashdata('error', 'Problem In Add Shop Try Again');
                redirect(base_url().'shop/categories');
            }
        }
    }

    public function update_area()
    {
        $this->form_validation->set_error_delimiters('<div class="my_text_error">', '</div>');
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        if ($this->form_validation->run() == FALSE)
        {
            $data['flad']       = '1';
            $data['page_title'] = 'Manage Shop Area';
            $data['shop']       = $this->shop_model->area();
            $data['shop_one']   = $this->shop_model->area_where($this->input->post('main_id'))[0];
            $this->load->template('shop/categories/area',$data);  
        }
        else{
            $data = [
                        'name'      =>  $this->input->post('name')
                    ];

            $this->db->where('id',$this->input->post('main_id'));
            if($this->db->update('shop_area', $data))
            {
                $this->session->set_flashdata('msg', 'Shop Area Successfully Saved');
                redirect(base_url().'shop/area');
            }
            else
            {
                $this->session->set_flashdata('error', 'Problem In Add Shop Try Again');
                redirect(base_url().'shop/area');
            }
        }
    }

    public function save()
    {
        $this->form_validation->set_error_delimiters('<div class="my_text_error">', '</div>');
        
        $this->form_validation->set_rules('shop_name', 'Shop Name', 'trim|required|min_length[2]|max_length[30]|is_unique[shop.shop_name]',array('is_unique' => 'Shop Name Is Already Exists'));
        $this->form_validation->set_rules('owner_name', 'Owner Name', 'trim|required|min_length[3]|max_length[200]');
        $this->form_validation->set_rules('employee_name', 'Employee Name', 'trim|min_length[3]|max_length[200]');
        $this->form_validation->set_rules('mobile', 'Mobile', 'trim|is_natural|min_length[10]|max_length[12]');
        $this->form_validation->set_rules('wp_no', 'Watsapp No', 'trim|is_natural|min_length[10]|max_length[12]');
        
        $this->form_validation->set_rules('mobile_in_website', 'Display Mobile in Website', 'trim');
        $this->form_validation->set_rules('whats_in_website', 'Display Whastapp no. in Website', 'trim');

        $this->form_validation->set_rules('address', 'Address', 'trim|required|min_length[10]|max_length[250]');
        $this->form_validation->set_rules('landmark', 'Landmark', 'trim|required|min_length[3]|max_length[100]');
        $this->form_validation->set_rules('email', 'Email', 'trim|valid_email|xss_clean|max_length[100]');
        $this->form_validation->set_rules('hour_operation', 'Hours of Operation', 'trim|required|min_length[2]|max_length[200]');
        $this->form_validation->set_rules('pro_or_servi', 'Products/Services', 'trim|required|min_length[2]|max_length[1000]');
        $this->form_validation->set_rules('payment_mode', 'Mode of Payment', 'trim|required|min_length[2]|max_length[240]');
        $this->form_validation->set_rules('info', 'Information', 'trim|min_length[2]|max_length[1000]');
        $this->form_validation->set_rules('detail_desc', 'Detail Description Section', 'trim|min_length[2]|max_length[1000]');
        $this->form_validation->set_rules('category', 'Category', 'required|trim|min_length[2]|max_length[3000]');
        $this->form_validation->set_rules('shop_plan', 'Plan', 'required|trim');
        $this->form_validation->set_rules('dis_in_listing', 'Display in Listing', 'required|trim');
        $this->form_validation->set_rules('keywords', 'Search Keywords', 'trim');

        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[30]|alpha_dash|is_unique[shop.username]',array('is_unique' => 'Username Is Already Exists'));
        $this->form_validation->set_rules('password', 'Password', 'min_length[5]|required');
        $this->form_validation->set_rules('_category', 'Category', 'required|trim');
        $this->form_validation->set_rules('_area', 'Area', 'required|trim');

        

        if ($this->form_validation->run() == FALSE)
        {
            $data['page_title']         = 'Add Shop';
            $data['shop_package']       = $this->package_model->shop();
            $this->load->template('shop/add',$data);
        }
        else
        { 
            $shop_pkg   = $this->package_model->shop_where($this->input->post('shop_plan'))[0];
            $date       = date('Y-m-d H:i:s');
            $exp_date   = date('Y-m-d', strtotime($date. ' +'.$shop_pkg['duration'].'days'));
            
            

            $data = [
                        'shop_name'      =>  $this->input->post('shop_name'),
                        'owner_name'     =>  $this->input->post('owner_name'),
                        'employee_name'  =>  $this->input->post('employee_name'),
                        'mobile'         =>  $this->input->post('mobile'),
                        'wp_no'          =>  $this->input->post('wp_no'),
                        'mobile_in_website' =>  $this->input->post('mobile_in_website'),
                        'whats_in_website'  =>  $this->input->post('whats_in_website'),
                        'address'        =>  $this->input->post('address'),
                        'landmark'       =>  $this->input->post('landmark'),
                        'email'          =>  $this->input->post('email'),
                        'hour_operation' =>  $this->input->post('hour_operation'),
                        'pro_or_servi'   =>  $this->input->post('pro_or_servi'),
                        'payment_mode'   =>  $this->input->post('payment_mode'),
                        'info'           =>  $this->input->post('info'),
                        'detail_desc'    =>  $this->input->post('detail_desc'),
                        'category'       =>  $this->input->post('category'),
                        'shop_plan'      =>  $this->input->post('shop_plan'),
                        'dis_in_listing' =>  $this->input->post('dis_in_listing'),
                        'exp_date'       =>  $exp_date,
                        'created_by'     =>  $this->session->userdata('id'),
                        'created_at'     =>  date('Y-m-d H:i:s'),
                        'keywords'       =>  $this->input->post('keywords'),
                        'username'       =>  $this->input->post('username'),
                        'password'       =>  $this->input->post('password'),
                        '_category'      =>  $this->input->post('_category'),
                        '_area'          =>  $this->input->post('_area'),
                    ];

    
            if($this->db->insert('shop', $data))
            {

                $id = $this->db->insert_id();
                
                $this->session->set_flashdata('msg', 'Shop Successfully Added');
                redirect(base_url().'shop');
            }
            else
            {
                $this->session->set_flashdata('error', 'Problem In Add Shop Try Again');
                redirect(base_url().'shop/add');
            }

        }
    }

    public function save_banner()
    {
        $croped_image = $_POST['image'];

        list($type, $croped_image) = explode(';', $croped_image);
        list(, $croped_image)      = explode(',', $croped_image);
        $croped_image = base64_decode($croped_image);

        $imageName = md5(microtime(true)).'.jpg';

        if(!file_put_contents('./uploads/shop/'.$imageName, $croped_image)){
            $this->session->set_flashdata('error', 'Banner Upload Error Please Try again.');
            exit;
        }
        else{

            $product = $this->shop_model->shop_where($_POST['id'])[0];

            if($product['bannner'] != 'no-image.png'){
                if(file_exists(FCPATH."./uploads/shop/".$product['bannner'])){
                    unlink(FCPATH."./uploads/shop/".$product['bannner']);    
                }
            }
        

            $this->db->where('id' , $_POST['id']);
            $this->db->update('shop',['photo' => $imageName]);

            $this->session->set_flashdata('msg', 'Photo Successfully Changed');
            
        }
        
    }

    /**********************************************************************
                                UPDATE
    **********************************************************************/

    public function update()
    {
        $this->form_validation->set_error_delimiters('<div class="my_text_error">', '</div>');
        
        $this->form_validation->set_rules('shop_name', 'Shop Name', 'trim|required|min_length[2]|max_length[30]');
        $this->form_validation->set_rules('owner_name', 'Owner Name', 'trim|required|min_length[3]|max_length[200]');
        $this->form_validation->set_rules('employee_name', 'Employee Name', 'trim|min_length[3]|max_length[200]');
        $this->form_validation->set_rules('mobile', 'Mobile', 'trim|is_natural|min_length[10]|max_length[12]');
        $this->form_validation->set_rules('wp_no', 'Watsapp No', 'trim|is_natural|min_length[10]|max_length[12]');
        
        $this->form_validation->set_rules('mobile_in_website', 'Display Mobile in Website', 'trim');
        $this->form_validation->set_rules('whats_in_website', 'Display Whastapp no. in Website', 'trim');

        $this->form_validation->set_rules('address', 'Address', 'trim|required|min_length[10]|max_length[250]');
        $this->form_validation->set_rules('landmark', 'Landmark', 'trim|required|min_length[3]|max_length[100]');
        $this->form_validation->set_rules('email', 'Email', 'trim|valid_email|xss_clean|max_length[100]');
        $this->form_validation->set_rules('hour_operation', 'Hours of Operation', 'trim|required|min_length[2]|max_length[200]');
        $this->form_validation->set_rules('pro_or_servi', 'Products/Services', 'trim|required|min_length[2]|max_length[1000]');
        $this->form_validation->set_rules('payment_mode', 'Mode of Payment', 'trim|required|min_length[2]|max_length[240]');
        $this->form_validation->set_rules('info', 'Information', 'trim|min_length[2]|max_length[1000]');
        $this->form_validation->set_rules('detail_desc', 'Detail Description Section', 'trim|min_length[2]|max_length[1000]');
        $this->form_validation->set_rules('category', 'Category', 'required|trim|min_length[2]|max_length[3000]');
        $this->form_validation->set_rules('shop_plan', 'Plan', 'required|trim');
        $this->form_validation->set_rules('dis_in_listing', 'Display in Listing', 'required|trim');
        $this->form_validation->set_rules('keywords', 'Search Keywords', 'trim');

        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[30]|alpha_dash|callback_username');
        $this->form_validation->set_rules('password', 'Password', 'min_length[5]|required');
        $this->form_validation->set_rules('_category', 'Category', 'required|trim');
        $this->form_validation->set_rules('_area', 'Area', 'required|trim');
        

        if ($this->form_validation->run() == FALSE)
        {
            $data['page_title']     = 'Edit Shop';
            $data['shop']           = $this->shop_model->shop_where($this->input->post('id'));
            $data['shop_package']   = $this->package_model->shop();
            $this->load->template('shop/edit',$data);
        }
        else
        { 
            $shop   = $this->shop_model->shop_where($this->input->post('id'));

            $shop_pkg   = $this->package_model->shop_where($this->input->post('shop_plan'))[0];
            $date       = date('Y-m-d H:i:s');
            $exp_date   = date('Y-m-d', strtotime($date. ' +'.$shop_pkg['duration'].'days'));

            $data = [
                        'shop_name'      =>  $this->input->post('shop_name'),
                        'owner_name'     =>  $this->input->post('owner_name'),
                        'employee_name'  =>  $this->input->post('employee_name'),
                        'mobile'         =>  $this->input->post('mobile'),
                        'wp_no'          =>  $this->input->post('wp_no'),
                        'mobile_in_website' =>  $this->input->post('mobile_in_website'),
                        'whats_in_website'  =>  $this->input->post('whats_in_website'),
                        'address'        =>  $this->input->post('address'),
                        'landmark'       =>  $this->input->post('landmark'),
                        'email'          =>  $this->input->post('email'),
                        'hour_operation' =>  $this->input->post('hour_operation'),
                        'pro_or_servi'   =>  $this->input->post('pro_or_servi'),
                        'payment_mode'   =>  $this->input->post('payment_mode'),
                        'info'           =>  $this->input->post('info'),
                        'category'       =>  $this->input->post('category'),
                        'shop_plan'      =>  $this->input->post('shop_plan'),
                        'dis_in_listing' =>  $this->input->post('dis_in_listing'),
                        'exp_date'       =>  $exp_date,
                        'detail_desc'    =>  $this->input->post('detail_desc'),
                        'updated_at'     =>  date('Y-m-d H:i:s'),
                        'keywords'       =>  $this->input->post('keywords'),
                        'username'       =>  $this->input->post('username'),
                        'password'       =>  $this->input->post('password'),
                        '_category'      =>  $this->input->post('_category'),
                        '_area'          =>  $this->input->post('_area'),
                    ];
                        

                $this->db->where('id',$this->input->post('id'));
            if($this->db->update('shop', $data))
            {   
                $this->session->set_flashdata('msg', 'Shop Successfully Saved');
                redirect(base_url().'shop');
            }
            else
            {
                $this->session->set_flashdata('error', 'Problem In Save Shop Try Again');
                redirect(base_url().'shop/edit');
            }

        }
    }

    /**********************************************************************
                                DELETE
    **********************************************************************/

    public function delete($id = false)
    {
        if($id)
        {
            if($this->shop_model->shop_where($id))
            {
                $this->db->where('id',$id);
                $this->db->delete('shop');

                $this->session->set_flashdata('msg', 'Shop Successfully Deleted');
                redirect(base_url().'shop');
            }   
            else
            {
                $this->session->set_flashdata('error', 'Shop Not Found');
                redirect(base_url().'shop');
            }
            
        }
        else
        {
            $this->session->set_flashdata('error', 'Shop Not Found');
            redirect(base_url().'shop');
        }
    }

    public function status_e($id)
    {
        $this->db->where('id',$id);
        $this->db->update('shop',['status' => '0']);

        $this->session->set_flashdata('msg', 'Shop Enabled');
        redirect(base_url().'shop');
    }

    public function status_d($id)
    {
        $this->db->where('id',$id);
        $this->db->update('shop',['status' => '1']);

        $this->session->set_flashdata('msg', 'Shop Disabled');
        redirect(base_url().'shop');
    }

    /**********************************************************************
                                SLIDER UPLOAD
    **********************************************************************/
    public function slider_upload()
    {
        if(!empty($_FILES['image']['name']))
        {
            $path       = $_FILES['image']['name'];
            $newName    = md5(microtime(true)).".".pathinfo($path, PATHINFO_EXTENSION); 
            $config['upload_path']      = './uploads/slider';
            $config['allowed_types']    = 'gif|jpg|png|jpeg';
            $config['max_size']         = 2000000;
            
            $config['file_name']        = $newName;
            $this->load->library('upload', $config);

            $image = [ 
                        'image'       =>    $newName,
                        'shop_id'     =>    $this->input->post('shop_id'),
                        'created_by'  =>    $this->session->userdata('id'),
                        'created_at'  =>    date('Y-m-d H:i:s')

                    ];

            if($this->upload->do_upload('image'))
            {
                if($this->db->insert('shop_slider', $image))
                {
                    $this->session->set_flashdata('msg', 'Slider Successfully Added');
                    redirect(base_url().'shop/slider/'.$this->input->post('shop_id'));
                }
                else
                {
                    $this->session->set_flashdata('error', 'Problem In Upload Slider');
                    redirect(base_url().'shop');
                }
            }
            else
            {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect(base_url().'shop');
            }

        }
    }
   

    /**********************************************************************
                               SLIDER DELETE
    **********************************************************************/

    public function slider_delete($id = false)
    {
        if($id)
        {
            if($this->shop_model->slider_where($id))
            {
                $slider = $this->shop_model->slider_where($id);
                if($slider[0]['image'] != '')
                {
                    unlink('./uploads/slider/'.$slider[0]['image']);
                }

                $this->db->where('id',$id);
                $this->db->delete('shop_slider');

                $this->session->set_flashdata('msg', 'Slider Successfully Deleted');
                redirect(base_url().'shop/slider/'.$slider[0]['shop_id']);
            }   
            else
            {
                $this->session->set_flashdata('error', 'Slider Not Found');
                redirect(base_url().'shop');
            }
            
        }
        else
        {
            $this->session->set_flashdata('error', 'Slider Not Found');
            redirect(base_url().'shop');
        }
    }

    public function username($user)
    {
        if($this->db->get_where('shop',['username' => $user,'id !=' => $this->input->post('id')])->result_array()){
            $this->form_validation->set_message('username', 'Username Already Exists.');
            return false;
        }
        else{
            return true;
        }
    }

}