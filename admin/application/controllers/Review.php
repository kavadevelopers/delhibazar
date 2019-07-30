<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Review extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->auth->check_session();
        $this->load->model('user_model');
        $this->load->model('product_model');
        $this->load->model('social_user_model');
        $this->load->model('shop_model');

        if($this->session->userdata('id') != '1'){
            redirect(base_url('error404'));
        }
    }


    /**************************************************************
                            PRODUCT RATING
    **************************************************************/
    
    public function product_review()
    {
        $data['page_title']     = 'Product Review';
        $data['product']        = $this->product_model->products();
        $this->load->template('product_review/index',$data);
    }

    public function product_review_subindex($id)
    {
        if($id)
        {
            if($this->product_model->product_rating_where($id))
            {
                $data['page_title']     = 'Product Review';
                $data['product']        = $this->product_model->product_rating_where($id);
                $this->load->template('product_review/sub_index',$data);
            }   
            else
            {
                $this->session->set_flashdata('error', 'Review Not Found');
                redirect(base_url().'review/product_review');
            }
            
        }
        else
        {
            $this->session->set_flashdata('error', 'Review Not Found');
            redirect(base_url().'review/product_review');
        }
    }

    public function product_review_delete($id = false)
    {   
        if($id)
        {
            if($this->product_model->rating_where($id))
            {

                $this->db->where('id',$id);
                if($this->db->delete('product_rating'))
                {
                    $this->session->set_flashdata('msg', 'Product Review Successfully Deleted');
                    redirect(base_url().'review/product_review');
                }
                else{
                    $this->session->set_flashdata('error', 'Product Review Not Deleted Try Again');
                    redirect(base_url().'review/product_review');
                }
            }
            else{
                $this->session->set_flashdata('error', 'Review Not Found');
                redirect(base_url().'review/product_review');
            }

        }
        else{
            $this->session->set_flashdata('error', 'Review Not Found');
            redirect(base_url().'review/product_review');
        }
    }       

    /**************************************************************
                            SHOP RATING
    **************************************************************/

    public function listing_review()
    {
        $data['page_title']     = 'Listing Review';
        $data['shop']           = $this->shop_model->shops();
        $this->load->template('listing_review/index',$data);
    }

    public function listing_review_subindex($id)
    {
        if($id)
        {
            if($this->shop_model->shop_rating_where($id))
            {
                $data['page_title']     = 'Listing Review';
                $data['shop']           = $this->shop_model->shop_rating_where($id);
                $this->load->template('listing_review/sub_index',$data);
            }   
            else
            {
                $this->session->set_flashdata('error', 'Review Not Found');
                redirect(base_url().'review/listing_review');
            }
            
        }
        else
        {
            $this->session->set_flashdata('error', 'Review Not Found');
            redirect(base_url().'review/listing_review');
        }
    }

    public function listing_review_delete($id = false)
    {   
        if($id)
        {
            if($this->shop_model->shop_rating_id_where($id))
            {

                $this->db->where('id',$id);
                if($this->db->delete('shop_rating'))
                {
                    $this->session->set_flashdata('msg', 'Listing Review Successfully Deleted');
                    redirect(base_url().'review/listing_review');
                }
                else{
                    $this->session->set_flashdata('error', 'Listing Review Not Deleted Try Again');
                    redirect(base_url().'review/listing_review');
                }
            }
            else{
                $this->session->set_flashdata('error', 'Review Not Found');
                redirect(base_url().'review/listing_review');
            }

        }
        else{
            $this->session->set_flashdata('error', 'Review Not Found');
            redirect(base_url().'review/listing_review');
        }

    }
}