<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

	function __construct(){
        parent::__construct(); 
    	$this->load->model('product_model');   
    }

	public function index($id = false)
	{
		if($id){
			if($this->product_model->get_single_category($id)){
				$data['_title']				= "DELHIBAZAR";
				$data['id']					= $id;
				$data['cate']				= $this->product_model->get_single_category($id);
				$this->load->template1('category/index',$data);
			}
			else{
				redirect(base_url('home'));
			}
		}
		else{
			redirect(base_url('home'));
		}
	}

}