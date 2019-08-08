<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->auth->check_session();
        $this->load->model('dashboard_model');
        $this->load->model('general_model');
    }


	public function index()
	{	
		$data['page_title']	= 'Dashboard';
		$data['out_of_stock'] 	= $this->dashboard_model->notification_outStock();
		$this->load->template('dashboard',$data);
	}

	function logout()
	{
	    $user_data = $this->session->all_userdata();
	        
	        
	    $this->session->unset_userdata($user_data['id']);
	           
	        
	    $this->session->sess_destroy();
	    redirect(base_url());
	}

}
