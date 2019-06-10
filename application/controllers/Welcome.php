<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct(){
        parent::__construct();
    	$this->load->model('shop_model');   
        $this->load->model('rating_model');   
    }

	public function index()
	{
        $data['top_add']    = $this->shop_model->get_add_top();
        $data['bottom_add'] = $this->shop_model->get_add_bottom();
		$this->load->view('home',$data);
	}

    public function logout()
    {
        $user_data = $this->session->all_userdata();
            
        $this->session->unset_userdata($user_data['id']);
               
        $this->session->sess_destroy();
        redirect(base_url('login'));
    }

	public function shop_autocomplete()
	{
		if (isset($_GET['term'])) {
            			
            			$this->db->like('shop_name',$_GET['term']);
            			$this->db->or_like('owner_name',$_GET['term']);
            			$this->db->or_like('mobile',$_GET['term']);
            			$this->db->or_like('wp_no',$_GET['term']);
            			$this->db->or_like('address',$_GET['term']);
            			$this->db->or_like('landmark',$_GET['term']);
            			$this->db->or_like('hour_operation',$_GET['term']);
            			$this->db->or_like('pro_or_servi',$_GET['term']);
            			$this->db->or_like('info',$_GET['term']);
            			$this->db->or_like('hour_operation',$_GET['term']);
            			$this->db->or_like('detail_desc',$_GET['term']);
            $result = $this->db->get('shop')->result();

           
           	if (count($result) > 0) {

            foreach ($result as $row)
                $arr_result[] = array(
					                    'label'         => $row->pro_or_servi
					                );
                echo json_encode($arr_result);
            }
        }
	}


	public function list()
	{
		$data['_title']				= "DELHIBAZAR";
		$data['shop']				= $this->shop_model->shop_search(trim($this->input->post('search')));
        $this->load->template('shop/index',$data);
	}


    public function save_newalatter()
    {
        if($this->db->get_where('newsletter',['email' => $this->input->post('email')])->result_array())
        {
            $this->session->set_flashdata('error', 'Already Subscribed');
            redirect($this->input->post('url'));
        }
        else{
            $this->db->insert('newsletter',['email' => $this->input->post('email'),'created_at' => date('Y-m-d H:i:s')]);
            $this->session->set_flashdata('msg', 'Newsletter Subscribed Thankyou');
            redirect($this->input->post('url'));
        }
    }

}
