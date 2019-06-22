<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->auth->check_session();
        $this->load->model('order_model');
        $this->load->model('product_model');
    }


    public function pending_order(){
    	$data['page_title']		= 'Manage Order';
    	$data['order']	        = $this->order_model->order();
    	$this->load->template('order/pending_order',$data);
    } 

    public function delivered_order(){
        $data['page_title']     = 'Delivered Order';
        $data['order']          = $this->order_model->delivered_order();
        $this->load->template('order/delivered_order',$data);
    } 

    public function deleted_order(){
        $data['page_title']     = 'Deleted Order';
        $data['order']          = $this->order_model->deleted_order();
        $this->load->template('order/deleted_order',$data);
    } 

    public function pending_order_edit($id)
    {
        $data['page_title']     = 'Edit Order';
        $data['order']          = $this->order_model->order_where($id);
        $this->load->template('order/pending_order_edit',$data);
    }

    public function pending_order_view($id)
    {
        $data['page_title']     = 'View Order';
        $data['order']          = $this->order_model->order_where($id);
        $this->load->template('order/pending_order_view',$data);
    }
    /********************************************
                PENDING ORDER UPDATE
    ********************************************/
    public function update_pendin_order()
    {

        $this->form_validation->set_error_delimiters('<div class="my_text_error">', '</div>');

        $this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[2]|max_length[500]');
        $this->form_validation->set_rules('city', 'City', 'trim|required|min_length[2]|max_length[500]');
        $this->form_validation->set_rules('district', 'District', 'trim|required|min_length[2]|max_length[500]');
        $this->form_validation->set_rules('country', 'Country', 'trim|required|min_length[2]|max_length[500]');
        $this->form_validation->set_rules('zipcode', 'Zipcode', 'trim|required|is_natural|min_length[4]|max_length[6]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[2]|max_length[500]');
        $this->form_validation->set_rules('phone', 'Phone', 'trim|required|is_natural|min_length[10]|max_length[12]');
        $this->form_validation->set_rules('address1', 'Address1', 'trim|required|min_length[2]|max_length[500]');
        $this->form_validation->set_rules('address2', 'Address2', 'trim|min_length[2]|max_length[500]');
        
        if($this->form_validation->run() == FALSE)
        {
            $data['page_title']     = 'Edit Order';
            $data['order']          = $this->order_model->order_where($this->input->post('id'));
            $this->load->template('order/pending_order_edit',$data);
        }
        else
        { 

            $data = [
                        'name'          => $this->input->post('name'),
                        'city'          => $this->input->post('city'),
                        'district'      => $this->input->post('district'),
                        'country'       => $this->input->post('country'),
                        'zipcode'       => $this->input->post('zipcode'),
                        'email'         => $this->input->post('email'),
                        'address1'      => $this->input->post('address1'),
                        'address2'      => $this->input->post('address2'),
                        'updated_at'    => date('Y-m-d H:i:s')
                    ];

                $this->db->where('id',$this->input->post('id'));
            if($this->db->update('payment',$data))
            {
                $this->session->set_flashdata('msg', 'Order Successfully Saved');
                redirect(base_url('order/pending_order'));
            }
            else
            {
                $this->session->set_flashdata('error', 'Something went wrong try again');
                redirect(base_url('order/pending_order_edit/'.$this->input->post('id')));
            }
        }
    }

    /********************************************
               DELETE PENDING ORDER 
    ********************************************/
    public function delete($id = false)
    { 
        if($id)
        { 
            if($this->order_model->order_where($id))
            {

                $data   =   ['delete_flag' => '1', 'deleted_at' => date('Y-m-d H:i:s')];

                    $this->db->where('id',$id);
                if($this->db->update('payment',$data))
                { 
                    $this->session->set_flashdata('msg', 'Order Successfully Deleted');
                    redirect(base_url().'order/pending_order');
                }   
            }
            else
            {

                $this->session->set_flashdata('error', 'Order Not Found');
                redirect(base_url().'order');
            }
        }
        else
        {
            $this->session->set_flashdata('error', 'Order Not Found');
            redirect(base_url().'order');
        }
    }
}