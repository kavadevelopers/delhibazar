<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App_setting extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->auth->check_session();

        if($this->session->userdata('id') != '1'){
        	redirect(base_url('error404'));
        }
    }


    public function index()
    {
    	$data['page_title']	= 'Vendor App Settings';
    	$data['data']		= $this->db->get_where('app_setting',['id' => '1'])->row_array();
		$this->load->template('app/index',$data);
    }


    public function save()
    {
    	$this->load->library('upload');
    	if(!empty($_FILES['home_image']['name']))
        {
            $path       = $_FILES['home_image']['name'];
            $newName    = md5(microtime(true)).".".pathinfo($path, PATHINFO_EXTENSION); 
            $config['upload_path']      = './uploads/app';
            $config['allowed_types']    = 'gif|jpg|png|jpeg';
            $config['max_size']         = 2000000;
            
            $config['file_name']        = $newName;
            
            $this->upload->initialize($config);
            $image = [ 
                        'home'       =>    $newName,
                    ];

            $this->upload->do_upload('home_image');
            $this->db->where('id','1');
            $this->db->update('app_setting', $image);    
        }

        if(!empty($_FILES['sidebar_image']['name']))
        {
            $path       = $_FILES['sidebar_image']['name'];
            $newName    = md5(microtime(true)).".".pathinfo($path, PATHINFO_EXTENSION); 
            $config2['upload_path']      = './uploads/app';
            $config2['allowed_types']    = 'gif|jpg|png|jpeg';
            $config2['max_size']         = 2000000;
            
            $config2['file_name']        = $newName;
            $this->upload->initialize($config2);

            $image = [ 
                        'sidebar'       =>    $newName,
                    ];

            $this->upload->do_upload('sidebar_image');
            $this->db->where('id','1');
            $this->db->update('app_setting', $image);    
        }

        if($this->input->post('home_d')){
            $this->db->where('id','1');
            $this->db->update('app_setting', ['home_d' => '1']);  
        }else{
        	$this->db->where('id','1');
            $this->db->update('app_setting', ['home_d' => '']);  
        }

        if($this->input->post('sidebar_d')){
            $this->db->where('id','1');
            $this->db->update('app_setting', ['sidebar_d' => '1']);  
        }else{
        	$this->db->where('id','1');
            $this->db->update('app_setting', ['sidebar_d' => '']);  
        }

        $this->session->set_flashdata('msg', 'Setting Saved');
        redirect(base_url().'app_setting');
    }

}