<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Advertising extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->auth->check_session();
        $this->load->model('advertising_model');
        $this->load->model('package_model');

    }


    public function index(){
    	$data['page_title']		= 'Advertising';
    	$data['advertising']	= $this->db->order_by('id','DESC')->get_where('advertising',['df' => '0'])->result_array();
    	$this->load->template('advertising/index',$data);
    } 

    public function add(){

    	$data['page_title']	       = 'Add Advertising';
        $data['ad_package']        = $this->package_model->ad();
        $this->load->template('advertising/add',$data);


    }

    public function save(){


    	$this->form_validation->set_error_delimiters('<div class="my_text_error">', '</div>');
        
        $this->form_validation->set_rules('business_name', 'Business Name', 'trim|required|min_length[3]|max_length[200]');
        $this->form_validation->set_rules('mobile', 'Mobile', 'trim|required|is_natural|min_length[10]|max_length[12]');
        $this->form_validation->set_rules('intro', 'Intro', 'trim|required');
        $this->form_validation->set_rules('address', 'Address', 'trim|required');
        $this->form_validation->set_rules('web_link', 'Website Link', 'trim|required|callback_valid_url');
        $this->form_validation->set_rules('plan_name', 'Plan', 'required|trim');


        if ($this->form_validation->run() == FALSE)
        {
            $data['page_title']	       = 'Add Advertising';
            $data['ad_package']        = $this->package_model->ad();
            $this->load->template('advertising/add',$data);
        }
        else
        { 
            $ad_pkg     = $this->package_model->ad_where($this->input->post('plan_name'))[0];
            $date       = date('Y-m-d H:i:s');
            $exp_date   = date('Y-m-d', strtotime($date. ' +'.$ad_pkg['duration'].'days'));

            $data = [
                        'business_name'      	=>  $this->input->post('business_name'),
                        'intro'     			=>  $this->input->post('intro'),
                        'mobile'  				=>  $this->input->post('mobile'),
                        'address'         		=>  $this->input->post('address'),
                        'link'                  =>  $this->input->post('web_link'),
                        'plan_name'          	=>  $this->input->post('plan_name'),
                        'exp_date'              =>  $exp_date,
                        'created_by'     		=>  $this->session->userdata('id'),
                        'updated_by'     		=>  $this->session->userdata('id'),
                        'created_at'     		=>  date('Y-m-d H:i:s'),
                        'updated_at'     		=>  date('Y-m-d H:i:s')
                    ];



                if($this->db->insert('advertising', $data))
	            {

	                $id = $this->db->insert_id();

	                if(!empty($_FILES['photo']['name']))
	                {
	                    $path = $_FILES['photo']['name'];
	                    $newName = md5(microtime(true)).".".pathinfo($path, PATHINFO_EXTENSION); 
	                    $config['upload_path']      = './uploads/add';
	                    $config['allowed_types']    = 'gif|jpg|png|jpeg';
	                    $config['max_size']         = 2000000;
	                    
	                    $config['file_name']        = $newName;
	                    $this->load->library('upload', $config);

	                    $image = [ 'photo'       =>    $newName ];

	                    if($this->upload->do_upload('photo'))
	                    {
	                        $image = [ 'photo'       =>    $newName ];

	                            $this->db->where('id',$id);
	                        if($this->db->update('advertising', $image))
	                        {
	                            $this->session->set_flashdata('msg', 'Advertising Successfully Added');
	                            redirect(base_url().'advertising');
	                        }
	                        else
	                        {
	                            $this->session->set_flashdata('error', 'Problem In Upload Image');
	                            redirect(base_url().'advertising/add');
	                        }
	                    }
	                    else
	                    {
	                        $this->session->set_flashdata('error', $this->upload->display_errors());
	                        redirect(base_url().'advertising/add');
	                    }
	                }
	                
	                $this->session->set_flashdata('msg', 'Advertising Successfully Added');
	                redirect(base_url().'advertising');
	            }
	            else
	            {
	                $this->session->set_flashdata('error', 'Problem In Add Advertising Try Again');
	                redirect(base_url().'advertising/add');
	            }

        }
    }

    public function delete($id = false)
    {
        if($id)
        {
            if($this->advertising_model->advertising_where($id))
            {
                $this->db->where('id',$id);
                $this->db->delete('advertising');	

                $this->session->set_flashdata('msg', 'Advertising Successfully Deleted');
                redirect(base_url().'advertising');
            }   
            else
            {
                $this->session->set_flashdata('error', 'Advertising Not Found');
                redirect(base_url().'advertising');
            }
            
        }
        else
        {
            $this->session->set_flashdata('error', 'Advertising Not Found');
            redirect(base_url().'advertising');
        }
    }


    function valid_url($url){
       	if($url == '#'){

       		return TRUE;

       	}else{

	       	if (filter_var($url, FILTER_VALIDATE_URL))
	       	{
	          	return TRUE;
	       	}
	       	else 
	       	{
	          	return FALSE;    
	       	}

       	}
    }

}