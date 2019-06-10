<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->auth->check_session();
    }


    public function about()
    {
        $data['page_title'] = 'About';
        $data['content']    = $this->db->get_where('pages',['id' => '1'])->result_array();
        $this->load->template('pages/about',$data);
    }

    public function about_save()
    {
        $this->db->where('id','1');
        $this->db->update('pages',['content' => $this->input->post('editor1')]);

        $this->session->set_flashdata('msg', 'Page Successfully Saved');
        redirect(base_url().'pages/about');
    }


    public function terms()
    {
        $data['page_title'] = 'Terms';
        $data['content']    = $this->db->get_where('pages',['id' => '2'])->result_array();
        $this->load->template('pages/terms',$data);
    }

    public function terms_save()
    {
        $this->db->where('id','2');
        $this->db->update('pages',['content' => $this->input->post('editor1')]);

        $this->session->set_flashdata('msg', 'Page Successfully Saved');
        redirect(base_url().'pages/terms');
    }

    public function privacy()
    {
        $data['page_title'] = 'Privacy';
        $data['content']    = $this->db->get_where('pages',['id' => '3'])->result_array();
        $this->load->template('pages/privacy',$data);
    }

    public function privacy_save()
    {
        $this->db->where('id','3');
        $this->db->update('pages',['content' => $this->input->post('editor1')]);

        $this->session->set_flashdata('msg', 'Page Successfully Saved');
        redirect(base_url().'pages/privacy');
    }

}