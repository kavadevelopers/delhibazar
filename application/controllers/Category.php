<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

	function __construct(){
        parent::__construct(); 
    	$this->load->model('product_model');   
    }

	public function index()
	{
		$data['_title']				= "DELHIBAZAR";
		$data['category']			= $this->product_model->get_category();
		$this->load->template('category/index',$data);
	}

}