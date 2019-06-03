<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shop extends CI_Controller {

	function __construct(){
        parent::__construct();
    	$this->load->model('shop_model');   
    }

	public function shop_detail($id)
	{
		$data['_title']		= "DELHIBAZAR";
		$data['shop'] 		= $this->shop_model->shop_where($id);
		$this->load->template('shop/shop_detail',$data);
	}
}