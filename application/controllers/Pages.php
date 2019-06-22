<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

	function __construct(){
        parent::__construct(); 
        $this->load->model('general_model');
    }

    public function contact()
    {
    	$data['_title']		= "DELHIBAZAR | contact us";
    	$this->load->template1('pages/contact',$data);
    }

    public function about()
    {
    	$data['_title']		= "DELHIBAZAR | about us";
    	$this->load->template1('pages/about',$data);
    }

    public function terms()
    {
        $data['_title']     = "DELHIBAZAR | Terms";
        $this->load->template1('pages/terms',$data);
    }

    public function privacy()
    {
        $data['_title']     = "DELHIBAZAR | Privacy";
        $this->load->template1('pages/privacy',$data);
    }



    public function contact_email()
    {
        $this->load->library('email');

        $this->email->from($this->input->post('email'),ucfirst($this->input->post('name')));
        $this->email->to(get_setting()['contact_email']);
        $this->email->reply_to('no-reply@example.com', 'No Reply');
        $this->email->subject(ucfirst($this->input->post('subject')));
        $this->email->set_mailtype('html');
        $this->email->message(ucfirst($this->input->post('message')));
        
        if($this->email->send()){
            $this->session->set_flashdata('msg', 'Message Successfully Sent');
            redirect(base_url('pages/contact'));
        }
        else
        {
            $this->session->set_flashdata('error', 'Message Not Sent !');
            redirect(base_url('pages/contact'));
        }
    }
}