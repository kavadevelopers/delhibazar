<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->auth->check_session();
        $this->load->model('order_model');
        $this->load->model('product_model');
        $this->load->model('social_user_model');
    }


    public function pending_order(){
    	$data['page_title']		= 'Manage Pending Orders';
    	$this->load->template('order/pending_order',$data);
    } 

    public function order_view($id)
    {
        if($id)
        {
            if($this->order_model->order_where($id))
            {
                $data['page_title'] = 'Order View';
                $data['order']      = $this->order_model->order_where($id);
                $this->load->template('order/order_view',$data);
            }
            else{
                $this->session->set_flashdata('error', 'Order Not Found');
                redirect(base_url().'error404');
            }

        }
        else{
            $this->session->set_flashdata('error', 'Order Not Found');
            redirect(base_url().'error404');
        }
    }

    public function delivered_order(){
        $data['page_title']     = 'Manage Delivered Orders';
        $this->load->template('order/delivered_order',$data);
    } 

    public function deleted_order(){
        $data['page_title']     = 'Deleted Orders';
        $this->load->template('order/deleted_order',$data);
    } 

    public function shipped_order(){
        $data['page_title']     = 'Shipped Orders';
        $this->load->template('order/shipped_order',$data);
    }

    public function pending_order_edit($id)
    {
        $data['page_title']     = 'Edit Order';
        $data['order']          = $this->order_model->order_where($id);
        $this->load->template('order/pending_order_edit',$data);
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
                $order_row = $this->order_model->order_where($id);
                $data   =   ['delete_flag' => '1', 'deleted_at' => date('Y-m-d H:i:s')];

                    $this->db->where('id',$id);
                if($this->db->update('payment',$data))
                { 

                    $qty_array          = explode(',', $order_row[0]['quantity']);
                    $pro_id_Array       = explode(',', explode('^~^', $order_row[0]['product_id'])[0]);

                    foreach ($pro_id_Array as $key => $value) {
                        $product_id = $this->product_model->product_id_where($value)[0];

                        $stock = $product_id['stock'] + $qty_array[$key];

                        $this->db->where('id',$product_id['id']);
                        $this->db->update('product',['stock' => $stock]);
                    }

                    $this->session->set_flashdata('msg', 'Order Successfully Deleted');
                    redirect(base_url().'order/pending_order');
                }   
            }
            else
            {

                $this->session->set_flashdata('error', 'Order Not Found');
                redirect(base_url().'error404');
            }
        }
        else
        {
            $this->session->set_flashdata('error', 'Order Not Found');
            redirect(base_url().'error404');
        }
    }


    public function traking($id = false)
    {
        if($id)
        {
            if($this->order_model->pending_order($id))
            {
                $data['page_title']     = 'Tracking';
                $data['order']      = $this->order_model->order_where($id)[0];
                $data['link']       = ['trakingsave','pending_order'];
                $this->load->template('order/traking',$data);
            }
            else
            {
                $this->session->set_flashdata('error', 'Order Not Found');
                redirect(base_url().'order/pending_order');
            }
        }
        else{
            $this->session->set_flashdata('error', 'Order Not Found');
            redirect(base_url().'order/pending_order');
        }
    }

    public function trakingsave()
    {   
        if($this->input->post('traking'))
        {
            foreach ($this->input->post('traking') as $key => $value) {
                $this->db->insert('traking',['detail' => $value,'order_id' => $this->input->post('Ord_Id'),'date' => _now_dt()]);
            }
        }

        if($this->input->post('shipped') && $this->input->post('shipped') == '1')
        {   
            $this->db->where('id',$this->input->post('Ord_Id'));
            $this->db->update('payment',['delivered' => '2']);
        }
        else{
            $this->db->where('id',$this->input->post('Ord_Id'));
            $this->db->update('payment',['delivered' => '0']);
        }

        if($this->input->post('delivered') && $this->input->post('delivered') == '1')
        {   
            $this->db->where('id',$this->input->post('Ord_Id'));
            $this->db->update('payment',['delivered' => '1']);

            $this->session->set_flashdata('msg', 'Order Successfully Delivered');
            redirect(base_url().'order/delivered_order');
        }

        $this->session->set_flashdata('msg', 'Order Successfully Updated');
        redirect(base_url().'order/traking/'.$this->input->post('Ord_Id'));

    }

    public function delete_traking()
    {
        $this->db->where('id',$this->input->post('id'));
        $this->db->delete('traking');
        echo "ok";
    }


    public function traking_shipped($id = false)
    {
        if($id)
        {
            if($this->order_model->pending_order($id))
            {
                $data['page_title']     = 'Tracking';
                $data['order']      = $this->order_model->order_where($id)[0];
                $data['link']       = ['traking_shipped_save','shipped_order'];
                $this->load->template('order/traking',$data);
            }
            else
            {
                $this->session->set_flashdata('error', 'Order Not Found');
                redirect(base_url().'order/shipped_order');
            }
        }
        else{
            $this->session->set_flashdata('error', 'Order Not Found');
            redirect(base_url().'order/shipped_order');
        }
    }

    public function traking_shipped_save(){
        if($this->input->post('traking'))
        {
            foreach ($this->input->post('traking') as $key => $value) {
                $this->db->insert('traking',['detail' => $value,'order_id' => $this->input->post('Ord_Id'),'date' => _now_dt()]);
            }
        }

        if($this->input->post('shipped') && $this->input->post('shipped') == '1')
        {   
            $this->db->where('id',$this->input->post('Ord_Id'));
            $this->db->update('payment',['delivered' => '2']);
        }
        else{
            $this->db->where('id',$this->input->post('Ord_Id'));
            $this->db->update('payment',['delivered' => '0']);
        }

        if($this->input->post('delivered') && $this->input->post('delivered') == '1')
        {   
            $this->db->where('id',$this->input->post('Ord_Id'));
            $this->db->update('payment',['delivered' => '1']);

            $this->session->set_flashdata('msg', 'Order Successfully Delivered');
            redirect(base_url().'order/delivered_order');
        }

        $this->session->set_flashdata('msg', 'Order Successfully Updated');
        redirect(base_url().'order/traking_shipped/'.$this->input->post('Ord_Id'));
    }
}