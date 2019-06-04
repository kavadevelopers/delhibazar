<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Social_user extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->auth->check_session();
        $this->load->model('social_user_model');
    }


    public function index()
    {
        $data['page_title'] = 'Manage User';
        $data['user']       = $this->social_user_model->user();
        $this->load->template('social_user/index',$data);
    }

}