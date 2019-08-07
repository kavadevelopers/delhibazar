<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Social_user extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->auth->check_session();
        $this->load->model('social_user_model');
        $this->load->model('product_model');
        $this->load->model('general_model');
        $this->load->model('shop_model');
        $this->load->model('order_model');
    }


    public function index()
    {
        $data['page_title'] = 'Manage Customer';
        $data['user']       = $this->social_user_model->user();
        $this->load->template('social_user/index',$data);
    }

    public function product_reviews($id)
    {
        if($id)
        {
            if($this->social_user_model->customer_where($id))
            {
                $data['page_title'] = 'Product Reviews';
                $data['customer']   = $this->social_user_model->customer_where($id)[0];
                $this->load->template('social_user/product_review_index',$data);
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

    public function shop_reviews($id)
    {
        if($id)
        {
            if($this->social_user_model->customer_where($id))
            {

                $data['page_title'] = 'Shop Reviews';
                $data['customer']   = $this->social_user_model->customer_where($id)[0];
                $this->load->template('social_user/shop_review_index',$data);
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
            if($this->social_user_model->customer_where($id))
            {
                $data['page_title'] = 'User Order';
                $data['customer']   = $this->social_user_model->customer_where($id)[0];
                $this->load->template('social_user/order_index',$data);
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
                redirect(base_url().'social_user');
            }

        }
        else{
            $this->session->set_flashdata('error', 'Order Not Found');
            redirect(base_url().'social_user');
        }
    }


    public function listing_review_delete()
    {   
        $this->db->where('id',$this->input->get('r_id'));
        if($this->db->delete('shop_rating'))
        {
            $this->session->set_flashdata('msg', 'Review Successfully Deleted');
            redirect(base_url().'social_user/shop_reviews/'.$this->input->get('u_id'));
        }
        else{
            $this->session->set_flashdata('error', 'Review Not Deleted Try Again');
            redirect(base_url().'social_user/shop_reviews/'.$this->input->get('u_id'));
        }

    }

    public function delete_product_review()
    {   
        

        $this->db->where('id',$this->input->get('r_id'));
        if($this->db->delete('product_rating'))
        {
            $this->session->set_flashdata('msg', 'Product Review Successfully Deleted');
            redirect(base_url().'social_user/product_reviews/'.$this->input->get('u_id'));
        }
        else{
            $this->session->set_flashdata('error', 'Product Review Not Deleted Try Again');
            redirect(base_url().'social_user/product_reviews/'.$this->input->get('u_id'));
        }
            
    }    

}