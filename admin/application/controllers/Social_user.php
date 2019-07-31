<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Social_user extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->auth->check_session();
        $this->load->model('social_user_model');
        $this->load->model('product_model');
        $this->load->model('general_model');
    }


    public function index()
    {
        $data['page_title'] = 'Manage Customer';
        $data['user']       = $this->social_user_model->user();
        $this->load->template('social_user/index',$data);
    }

    public function review($id)
    {
        if($id)
        {
            if($this->social_user_model->customer_review_where($id))
            {

                $data['page_title'] = 'User Review';
                $data['user']       = $this->social_user_model->customer_review_where($id);
                $this->load->template('social_user/review_index',$data);
            }
            else{
                $this->session->set_flashdata('error', 'Review Not Found');
                redirect(base_url().'social_user');
            }

        }
        else{
            $this->session->set_flashdata('error', 'Review Not Found');
            redirect(base_url().'social_user');
        }

    }

    public function delete($id = false)
    {   
        if($id) 
        {
            if($this->social_user_model->customer_where($id))
            {

                $this->db->where('id',$id);
                if($this->db->update('social_user',array('delete_flag' => '1','deleted_at' => date('Y-m-d H:i:s'))))
                {
                    $this->session->set_flashdata('msg', 'Customer Successfully Deleted');
                    redirect(base_url().'social_user');
                }
                else{
                    $this->session->set_flashdata('error', 'Customer Not Deleted Try Again');
                    redirect(base_url().'social_user');
                }
            }
            else{
                $this->session->set_flashdata('error', 'Customer Not Found');
                redirect(base_url().'social_user');
            }

        }
        else{
            $this->session->set_flashdata('error', 'Customer Not Found');
            redirect(base_url().'social_user');
        }
    }       

    public function order($id = false)
    {   
        if($id) 
        {
            if($this->social_user_model->customer_order_where($id))
            {
                $data['page_title'] = 'User Order';
                $data['order']      = $this->social_user_model->customer_order_where($id);
                $this->load->template('social_user/order_index',$data);
            }
            else{
                $this->session->set_flashdata('error', 'Order Not Found');
                redirect(base_url().'social_user');
            }

        }
        else{
            $this->session->set_flashdata('error', 'Order Not Found');
            redirect(base_url().'social_user');
        }
    }       

    public function order_view($id)
    {
        $data['page_title'] = 'Order View';
        $data['order']      = $this->db->get_where('payment',['id' => $id])->result_array();
        $this->load->template('social_user/order_view',$data);
    }

}