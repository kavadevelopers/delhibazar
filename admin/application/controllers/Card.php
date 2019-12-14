<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Card extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->auth->check_session();
    }


    public function index(){
    	$data['page_title']		= 'Virtual Cards';
    	$data['cards']	= $this->db->order_by('id','DESC')->get_where('cards',['df' => ''])->result_array();
    	$this->load->template('card/index',$data);
    } 

    public function add()
    {
        $data['page_title']     = 'Add Virtual Cards';
        $this->load->template('card/add',$data);
    }

    public function edit($id)
    {
        $data['page_title']     = 'Edit Virtual Cards';
        $data['card']           = $this->db->get_where('cards',['id' => $id])->row_array();
        $this->load->template('card/edit',$data);
    }

    public function save()
    {
        $this->form_validation->set_error_delimiters('<div class="my_text_error">', '</div>');

        $this->form_validation->set_rules('amount', 'Amount', 'trim|decimal|required');
        $this->form_validation->set_rules('validity', 'Validity', 'trim|numeric|required');
        $this->form_validation->set_rules('total_usage', 'Total Usage', 'trim|numeric|required');

        if($this->form_validation->run() == FALSE){
            $data['page_title']     = 'Add Virtual Cards';
            $this->load->template('card/add',$data);
        }else{

            if(!empty($_FILES['image']['name']))
            {
                $path       = $_FILES['image']['name'];
                $newName    = md5(microtime(true)).".".pathinfo($path, PATHINFO_EXTENSION); 
                $config['upload_path']      = './uploads/virtual_card';
                $config['allowed_types']    = 'gif|jpg|png|jpeg';
                $config['max_size']         = 2000000;
                
                $config['file_name']        = $newName;
                $this->load->library('upload', $config);
                $this->upload->do_upload('image');

            }
            else{
                $newName = "";
            }


            // $this->load->library('ciqrcode');
            // $config['size']         = 256;
            // $this->ciqrcode->initialize($config);
            // $params['data'] = 'This is a text to encode become QR Code';
            // $params['level'] = 'H';
            // $params['savename'] = FCPATH.'/uploads/qr/'.md5(microtime(true)).'.jpg';
            // $this->ciqrcode->generate($params);



            $data = array(
                'price'                 =>  $this->input->post('amount'),
                'validity'              =>  $this->input->post('validity'),
                'total_usage'           =>  $this->input->post('total_usage'),
                'image'                 =>  $newName,
            );

            if($this->db->insert('cards', $data)){

                $this->session->set_flashdata('msg', 'Card Successfully Added');
                redirect(base_url().'card');
                            
            }
            else
            {
                $this->session->set_flashdata('error', 'Problem In Add Card Try Again');
                redirect(base_url().'card/add');
            }
        }
    }

    public function update()
    {
        $this->form_validation->set_error_delimiters('<div class="my_text_error">', '</div>');

        $this->form_validation->set_rules('amount', 'Amount', 'trim|decimal|required');
        $this->form_validation->set_rules('validity', 'Validity', 'trim|numeric|required');
        $this->form_validation->set_rules('total_usage', 'Total Usage', 'trim|numeric|required');

        if($this->form_validation->run() == FALSE){
            $data['page_title']     = 'Edit Virtual Cards';
            $data['card']           = $this->db->get_where('cards',['id' => $this->input->post('main_id')])->row_array();
            $this->load->template('card/edit',$data);
        }else{

            if(!empty($_FILES['image']['name']))
            {
                $path       = $_FILES['image']['name'];
                $newName    = md5(microtime(true)).".".pathinfo($path, PATHINFO_EXTENSION); 
                $config['upload_path']      = './uploads/virtual_card';
                $config['allowed_types']    = 'gif|jpg|png|jpeg';
                $config['max_size']         = 2000000;
                
                $config['file_name']        = $newName;
                $this->load->library('upload', $config);
                $this->upload->do_upload('image');

                $data = array(
                    'image'                 =>  $newName
                );

                $this->db->where('id',$this->input->post('main_id'));
                $this->db->update('cards', $data);
            }


            $data = array(
                'price'                 =>  $this->input->post('amount'),
                'validity'              =>  $this->input->post('validity'),
                'total_usage'           =>  $this->input->post('total_usage'),
            );

            $this->db->where('id',$this->input->post('main_id'));
            if($this->db->update('cards', $data)){

                $this->session->set_flashdata('msg', 'Card Successfully Saved');
                redirect(base_url().'card');
                            
            }
            else
            {
                $this->session->set_flashdata('error', 'Problem In Add Card Try Again');
                redirect(base_url().'card');
            }
        }
    }


    public function delete($id)
    {
        $this->db->where('id',$id);
        $this->db->update('cards',['df' => '1']);
        $this->session->set_flashdata('msg', 'Card Successfully Deleted');
        redirect(base_url().'card');
    }




    public function usage()
    {
        $data['page_title']     = 'Virtual Card usage';
        $this->load->template('card/card_usage',$data);
    }

    public function search()
    {
        $from = $this->input->post('from');
        $to = $this->input->post('to');
        if($from != ""){
            $this->db->where('created_at >=', date('Y-m-d',strtotime($from)));
        }
        if($to != ""){
            $this->db->where('created_at <=', date('Y-m-d',strtotime($to)));
        }
        $this->db->where('vendor',$this->input->post('vendor'));
        $this->db->limit(100);
        $this->db->order_by('id','desc');
        $list = $this->db->get('card_usage')->result_array();

        $data['page_title']     = 'Virtual Card Usage Result';
        $data['list']           = $list;
        $this->load->template('card/result',$data);
    }


    public function qrtest()
    {
        $this->load->library('ciqrcode');
        $config['size']         = 256;
        $this->ciqrcode->initialize($config);
        $params['data'] = 'This is a text to encode become QR Code';
        $params['level'] = 'H';
        $params['savename'] = FCPATH.'/uploads/qr/ates.png';
        $this->ciqrcode->generate($params);

        echo '<img src="'.base_url().'/uploads/qr/ates.png" />';
    }


}
?>