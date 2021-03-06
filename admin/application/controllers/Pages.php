<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->auth->check_session();
        $this->load->model('general_model');
    }

    public function home()
    {
        $data['page_title'] = 'Home';
        $data['content']    = $this->db->get_where('pages',['id' => '5'])->result_array();
        $this->load->template('pages/home',$data);
    }    

    public function home_meta_save()
    {
        $this->db->where('id','5');
        $this->db->update('pages',['keyword' =>  $this->input->post('keywords'),'description'   =>  $this->input->post('description')]);

        $this->session->set_flashdata('msg', 'Meta Successfully Saved');
        redirect(base_url().'pages/home');
    }

    public function home_add_save()
    {
        $this->form_validation->set_error_delimiters('<div class="my_text_error">', '</div>');
        $this->form_validation->set_rules('category', 'Category', 'trim|required|callback_category_check');

        if ($this->form_validation->run() == FALSE)
        {
            $data['page_title'] = 'Home';
            $data['content']    = $this->db->get_where('pages',['id' => '5'])->result_array();
            $this->load->template('pages/home',$data);
        }
        else
        {
            
            $this->db->limit(1);
            $this->db->order_by('id','DESC');
            $last = $this->db->get('home_categories')->result_array();
            if($last)
            {
                $order = $last[0]['order'] + 1;

            }else{
                $order = 1;
            }

            $this->db->insert('home_categories',['cate_id' => $this->input->post('category'),'order' => $order]);
            $this->session->set_flashdata('msg', 'Category Successfully Added');
            redirect(base_url().'pages/home');
        }
    }

    public function change_order()
    {
        $list = json_decode($this->input->post('data'));

        foreach ($list as $key => $value) {
            $this->db->where('id',$value);
            $this->db->update('home_categories',['order' => ($key + 1)]);
        }

        $this->session->set_flashdata('msg', 'Order Changed Successfully');
    }

    public function delete_category(){

        $this->db->where('id' , $this->input->post('id'));
        $this->db->delete('home_categories');
    }

    public function category_check($id)
    {
        if($this->db->get_where('home_categories',['cate_id' => $id])->result_array()){
            $this->form_validation->set_message('category_check', 'Category Already Exists');
            return false;
        }
        else{
            return true;
        }
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
        $this->db->update('pages',['content' => $this->input->post('editor1'),'keyword'       =>  $this->input->post('keywords'),'description'   =>  $this->input->post('description')]);

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
        $this->db->update('pages',['content' => $this->input->post('editor1'),'keyword'       =>  $this->input->post('keywords'),'description'   =>  $this->input->post('description')]);

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
        $this->db->update('pages',['content' => $this->input->post('editor1'),'keyword'       =>  $this->input->post('keywords'),'description'   =>  $this->input->post('description')]);

        $this->session->set_flashdata('msg', 'Page Successfully Saved');
        redirect(base_url().'pages/privacy');
    }

    public function return_policy()
    {
        $data['page_title'] = 'Return/Exchange Policy';
        $data['content']    = $this->db->get_where('pages',['id' => '4'])->result_array();
        $this->load->template('pages/return_policy',$data);
    }

    public function return_policy_save()
    {
        $this->db->where('id','4');
        $this->db->update('pages',['content' => $this->input->post('editor1'),'keyword'       =>  $this->input->post('keywords'),'description'   =>  $this->input->post('description')]);

        $this->session->set_flashdata('msg', 'Page Successfully Saved');
        redirect(base_url().'pages/return_policy');
    }

    public function faq()
    {
        $data['page_title'] = "FAQ";
        $this->load->template('pages/faq_index',$data);
    }

    public function faq_add()
    {
        $data['page_title'] = "FAQ Add";
        $this->load->template('pages/faq_add',$data);
    }

    public function faq_save(){
        $this->form_validation->set_error_delimiters('<div class="my_text_error">', '</div>');

        $this->form_validation->set_rules('que', 'Question', 'trim|required');
        $this->form_validation->set_rules('editor1', 'Answer', 'trim|required');

        if ($this->form_validation->run() == FALSE)
        {
            $data['page_title'] = 'FAQ Add';
            $this->load->template('pages/faq_add',$data);
        }
        else
        {

            $faq =  [
                            'que'        =>  $this->input->post('que'),
                            'ans'        =>  $this->input->post('editor1')
                        ];

            if($this->db->insert('faq', $faq)){
                $this->session->set_flashdata('msg', 'FAQ Successfully Added');
                redirect(base_url().'pages/faq');
            }
            else{
                $this->session->set_flashdata('error', 'Problem In Add FAQ Try Again');
                redirect(base_url().'pages/faq_add');
            }

        }
    }

    public function delete_faq($id = false)
    {
        if($id){
            if($this->db->get_where('faq',['id' => $id])->result_array()){
                $this->db->where('id',$id);
                $this->db->delete('faq');

                $this->session->set_flashdata('msg', 'FAQ Successfully Deleted');
                redirect(base_url().'pages/faq');
            }
            else{
                $this->session->set_flashdata('error', 'Product Not Found');
                redirect(base_url().'pages/faq');
            }
        }
        else{
            $this->session->set_flashdata('error', 'Product Not Found');
            redirect(base_url().'pages/faq');
        }
    }


    public function edit_faq($id = false)
    {
        if($id){
            if($this->db->get_where('faq',['id' => $id])->result_array()){
                
                $data['page_title'] = "FAQ Edit";
                $data['faq'] = $this->db->get_where('faq',['id' => $id])->result_array()[0];
                $this->load->template('pages/faq_edit',$data);

            }
            else{
                $this->session->set_flashdata('error', 'Product Not Found');
                redirect(base_url().'pages/faq');
            }
        }
        else{
            $this->session->set_flashdata('error', 'Product Not Found');
            redirect(base_url().'pages/faq');
        }
    }

    public function faq_update(){
        $this->form_validation->set_error_delimiters('<div class="my_text_error">', '</div>');

        $this->form_validation->set_rules('que', 'Question', 'trim|required');
        $this->form_validation->set_rules('editor1', 'Answer', 'trim|required');
        $this->form_validation->set_rules('main_id', 'Answer', 'trim');

        if ($this->form_validation->run() == FALSE)
        {
            $data['page_title'] = "FAQ Edit";
            $data['faq'] = $this->db->get_where('faq',['id' => $id])->result_array()[0];
            $this->load->template('pages/faq_edit',$data);
        }
        else
        {

            $faq =  [
                            'que'        =>  $this->input->post('que'),
                            'ans'        =>  $this->input->post('editor1')
                        ];

            $this->db->where('id',$this->input->post('main_id'));
            if($this->db->update('faq', $faq)){
                $this->session->set_flashdata('msg', 'FAQ Successfully Updated');
                redirect(base_url().'pages/faq');
            }
            else{
                $this->session->set_flashdata('error', 'Problem In Update FAQ Try Again');
                redirect(base_url().'pages/faq');
            }

        }
    }
}