<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

	function __construct(){
        parent::__construct(); 
    }

    public function contact()
    {
    	$data['_title']		= "DELHIBAZAR | contact us";
    	$this->load->template1('pages/contact',$data);
    }

    public function about()
    {
    	$data['_title']		= "DELHIBAZAR | about us";
    	$this->load->template1('pages/about',$data);
    }


}