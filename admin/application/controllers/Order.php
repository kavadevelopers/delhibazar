<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->auth->check_session();
        $this->load->model('order_model');
    }


    public function index(){
    	$data['page_title']		= 'Manage Order';
    	$data['order']	        = $this->order_model->order();
    	$this->load->template('order/index',$data);
    } 

}