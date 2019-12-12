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

    public function return_policy()
    {
        $data['_title']     = "DELHIBAZAR | Return Policy";
        $this->load->template1('pages/return_policy',$data);
    }

    public function faq()
    {
        $data['_title']     = "DELHIBAZAR | FAQ";
        $this->load->template1('pages/faq',$data);
    }

    public function order_traking()
    {
        $data['_title']     = "DELHIBAZAR | Track Your Order";
        $this->load->template1('pages/traking',$data);
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

    public function faq_load_more()
    {
        $this->db->limit($this->input->post('limit'),$this->input->post('record'));
        $data = $this->db->get('faq')->result_array();
        $record = '';
        foreach ($data as $key => $value) {

            $record .= '<div class="panel panel-default">
                                    <div class="panel-heading p-3 mb-3" role="tab" id="heading0">
                                        <h3 class="panel-title">
                                            <a class="collapsed" role="button" title="" data-toggle="collapse" data-parent="#accordion" href="#collapse'.$value['id'].'" aria-expanded="true" aria-controls="collapse0">
                                                '.$value['que'].'
                                            </a>
                                        </h3>
                                    </div>
                                    <div id="collapse'.$value['id'].'" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading0">
                                        <div class="panel-body px-3 mb-4">
                                            '.$value['ans'].'
                                        </div>
                                    </div>
                                </div>';
            
        }
        echo json_encode([count($data),$record,$this->db->get('faq')->num_rows()]);
    }


    public function traking_check()
    {
        if($this->input->post())
        {
            $record = $this->db->get_where('payment',['orderid' => $this->input->post('order_id'),'email' => $this->input->post('email_id'),'delete_flag' => '0'])->result_array();

            if($record){
                $data['_title']     = "DELHIBAZAR | Track Package";
                $this->db->order_by('id','desc');
                $data['data']       = $this->db->get_where('traking',['order_id' => $record[0]['id']])->result_array();
                $this->load->template1('pages/traking_data',$data);
            }
            else{
                redirect(base_url().'pages/order_traking/?error=1');
            }
        }
        else{
            redirect(base_url().'pages/order_traking/?error=1');
        }
    }

    public function cards()
    {
        if($this->session->userdata('id') && $this->session->userdata('id') != ''){
            $data['_title']     = "DELHIBAZAR | Virtual Cards";
            $this->load->template1('pages/cards',$data);
        }
        else{
            redirect(base_url());
        }
    }
}