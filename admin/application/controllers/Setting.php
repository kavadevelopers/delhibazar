<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->auth->check_session();
    }


    public function index()
    {
    	$data['page_title']	=  'Setting';
        $data['setting']    =   $this->db->get_where('setting',['id' => '1'])->result_array()[0];
		$this->load->template('setting/index',$data);
    }


    public function save()
    {
        $this->form_validation->set_error_delimiters('<div class="my_text_error">', '</div>');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|xss_clean|max_length[100]');
        $this->form_validation->set_rules('support_email', 'Support Email', 'required|trim|valid_email|xss_clean|max_length[100]');
        $this->form_validation->set_rules('mobile', 'Mobile', 'trim|required|min_length[10]|max_length[20]');
        $this->form_validation->set_rules('city', 'City', 'trim|required|max_length[40]');
        $this->form_validation->set_rules('address', 'Address', 'trim|required|max_length[200]');
        $this->form_validation->set_rules('opening_hours', 'Opening Hours', 'trim|required|max_length[20]');
        $this->form_validation->set_rules('short_about', 'Short About', 'trim|required|max_length[200]');


        if ($this->form_validation->run() == FALSE)
        {
            $data['page_title']  =  'Setting';
            $data['setting']    =   $this->db->get_where('setting',['id' => '1'])->result_array()[0];
            $this->load->template('setting/index',$data);
        }
        else
        {


            $data = [
                        'email'             =>     $this->input->post('email'),
                        'support_email'     =>     $this->input->post('support_email'),
                        'mobile'            =>     $this->input->post('mobile'),
                        'city'              =>     $this->input->post('city'),
                        'address'           =>     $this->input->post('address'),
                        'opening_hours'     =>     $this->input->post('opening_hours'),
                        'short_about'       =>     $this->input->post('short_about')
                    ];

            $this->db->where('id','1');
            $this->db->update('setting',$data);

            $this->session->set_flashdata('msg', 'Setting Successfully Saved');
            redirect(base_url().'setting');


        }
    }


}