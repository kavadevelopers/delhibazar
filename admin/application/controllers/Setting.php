<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->auth->check_session();
    }


    public function site_setting()
    {
    	$data['page_title']	=  'Setting';
        $data['setting']    =   $this->db->get_where('setting',['id' => '1'])->result_array()[0];
		$this->load->template('setting/index',$data);
    }


    public function save()
    {
        $this->form_validation->set_error_delimiters('<div class="my_text_error">', '</div>');
        
        $this->form_validation->set_rules('ad_number', 'Ad Number', 'trim|required|is_natural|min_length[10]|max_length[12]');
        
        $this->form_validation->set_rules('smtp_host', 'Smtp Host', 'trim|required|max_length[240]');
        $this->form_validation->set_rules('smtp_port', 'Smtp Port', 'trim|required|max_length[240]');
        $this->form_validation->set_rules('smtp_user', 'Smtp User', 'trim|required|max_length[240]');
        $this->form_validation->set_rules('smtp_pass', 'Smtp Password', 'trim|required|max_length[240]');
        
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|xss_clean|max_length[100]');
        $this->form_validation->set_rules('support_email', 'Support Email', 'required|trim|valid_email|xss_clean|max_length[100]');
        $this->form_validation->set_rules('contact_email', 'Contact Form Email', 'required|trim|valid_email|xss_clean|max_length[100]');

        $this->form_validation->set_rules('newsletter_email', 'Newsletter Email', 'required|trim|valid_email|xss_clean|max_length[100]');


        $this->form_validation->set_rules('mobile', 'Mobile', 'trim|required|min_length[10]|max_length[20]');
        $this->form_validation->set_rules('city', 'City', 'trim|required|max_length[40]');
        $this->form_validation->set_rules('address', 'Address', 'trim|required|max_length[200]');
        $this->form_validation->set_rules('opening_hours', 'Opening Hours', 'trim|required|max_length[20]');
        $this->form_validation->set_rules('short_about', 'Short About', 'trim|required|max_length[200]');
        $this->form_validation->set_rules('meta_keywords', 'Meta Keywords', 'trim|required');
        $this->form_validation->set_rules('meta_description', 'Meta Description', 'trim|required');
        $this->form_validation->set_rules('merchent_key', 'Payumoney Merchent Key', 'trim|required');
        $this->form_validation->set_rules('salt', 'SALT', 'trim|required');


        if ($this->form_validation->run() == FALSE)
        {
            $data['page_title']  =  'Setting';
            $data['setting']    =   $this->db->get_where('setting',['id' => '1'])->result_array()[0];
            $this->load->template('setting/index',$data);
        }
        else
        {


            $data = [
                        'ad_number'         =>     $this->input->post('ad_number'),
                        'smtp_host'         =>     $this->input->post('smtp_host'),
                        'smtp_port'         =>     $this->input->post('smtp_port'),
                        'smtp_user'         =>     $this->input->post('smtp_user'),
                        'smtp_pass'         =>     $this->input->post('smtp_pass'),
                        'email'             =>     $this->input->post('email'),
                        'support_email'     =>     $this->input->post('support_email'),
                        'contact_email'     =>     $this->input->post('contact_email'),
                        'newsletter_email'  =>     $this->input->post('newsletter_email'),
                        'mobile'            =>     $this->input->post('mobile'),
                        'city'              =>     $this->input->post('city'),
                        'address'           =>     $this->input->post('address'),
                        'opening_hours'     =>     $this->input->post('opening_hours'),
                        'short_about'       =>     $this->input->post('short_about'),
                        'meta_keywords'     =>     $this->input->post('meta_keywords'),
                        'meta_description'  =>     $this->input->post('meta_description'),
                        'merchent_key'      =>     $this->input->post('merchent_key'),
                        'salt'              =>     $this->input->post('salt')
                    ];

            $this->db->where('id','1');
            $this->db->update('setting',$data);

            $this->session->set_flashdata('msg', 'Setting Successfully Saved');
            redirect(base_url().'setting/site_setting');


        }
    }


    /*****************************************************
                    CHANGE PASSWORD
    *****************************************************/
    public function change_password()
    {
        $data['page_title']        =  'Change Password';
        $data['change_pass']       =   $this->db->get_where('user',['id' => '1'])->result_array()[0];
        $this->load->template('change_password/index',$data);
    }

    public function update_password()
    {

        $this->form_validation->set_error_delimiters('<div class="my_text_error">', '</div>');
        $this->form_validation->set_rules('pass', 'Password', 'required|trim|min_length[8]|max_length[100]');
        $this->form_validation->set_rules('con_pass', 'Confirm Password', 'required|trim|min_length[8]|matches[pass]|max_length[100]');

        if ($this->form_validation->run() == FALSE)
        {
            $data['page_title']        =  'Change Password';
            $data['change_pass']       =   $this->db->get_where('user',['id' => '1'])->result_array()[0];
            $this->load->template('change_password/index',$data);
        }
        else
        {

            $data  = [
                        'pass'           =>  md5($this->input->post('pass')),
                        'updated_by'     =>  $this->session->userdata('id'),
                        'updated_at'     =>  date('Y-m-d H:i:s'),
                     ];

            $this->db->where('id',$this->input->post('id'));
            $this->db->update('user',$data);

            $this->session->set_flashdata('msg', 'Password Successfully Saved');
            redirect(base_url().'setting/change_password');
        }
    }

    /*****************************************************
                    PER SHOP COMMISSSION
    *****************************************************/
    public function shop_commission()
    {
        $data['page_title']        =  'Change Commission';
        $data['commission']        =   $this->db->get_where('setting',['id' => '1'])->result_array()[0];
        $this->load->template('shop_commission/index',$data);
    }

    public function shop_commission_save()
    {

        $this->form_validation->set_error_delimiters('<div class="my_text_error">', '</div>');
        $this->form_validation->set_rules('shop_commission', 'Per Shop Commission', 'required|trim|decimal|max_length[40]');

        if ($this->form_validation->run() == FALSE)
        {
            $data['page_title']        =  'Change Commission';
            $data['commission']        =   $this->db->get_where('setting',['id' => '1'])->result_array()[0];
            $this->load->template('shop_commission/index',$data);
        }
        else
        {

            $data  =    ['shop_commission'  => $this->input->post('shop_commission')];


            $this->db->where('id',$this->input->post('id'));
            $this->db->update('setting',$data);

            $this->session->set_flashdata('msg', 'Shop Commission Successfully Saved');
            redirect(base_url().'setting/shop_commission');
        }



    }

}
