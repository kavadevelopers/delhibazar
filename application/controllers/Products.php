<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

	function __construct(){
        parent::__construct(); 
    	$this->load->model('product_model');   

    	$this->load->library('pagination');
    	$this->perPage = 2;
    }

	public function list()
	{	

		if($this->session->userdata('filter')){
			$min =  $this->session->userdata('filter')['min']; 
			$max =  $this->session->userdata('filter')['max'];
		 }else{ 
			$min = 10;
			$max = 50000;
		 }


		$id = $this->uri->segment(3);
		
		if($id)
		{
			$data['category']		= $this->product_model->category_where($id);
			if($this->product_model->category_where($id))
			{
				
				$data['dynamic_category']		= $this->product_model->dynamic_category_data();
        
		        //get rows count
		        $conditions['returnType']   = 'count';
		        $totalRec = $this->product_model->getRows($conditions,$id,$min,$max);
		        
		        //pagination config
		        $config['base_url']    		= base_url().'products/list/'.$id;
		        $config['uri_segment'] 		= 4;
		        $config['total_rows']  		= $totalRec;
		        $config['per_page']    		= $this->perPage;
		        
		        //styling
		        $config['num_tag_open'] 	= '<li class="page-item">';
		        $config['num_tag_close'] 	= '</li>';
		        $config['cur_tag_open'] 	= '<li class="page-item active"><a class="page-link" href="javascript:void(0);">';
		        $config['cur_tag_close'] 	= '</a></li>';
		        $config['next_link'] 		= '<i class="fa fa-long-arrow-right" aria-hidden="true"></i>';
		        $config['prev_link'] 		= '<i class="fa fa-long-arrow-left" aria-hidden="true"></i>';
		        $config['next_tag_open'] 	= '<li class="pg-next">';
		        $config['next_tag_close'] 	= '</li>';
		        $config['prev_tag_open'] 	= '<li class="pg-prev">';
		        $config['prev_tag_close'] 	= '</li>';
		        $config['first_tag_open'] 	= '<li class="page-item">';
		        $config['first_tag_close'] 	= '</li>';
		        $config['last_tag_open'] 	= '<li class="page-item">';
		        $config['last_tag_close'] 	= '</li>';
		        
		        //initialize pagination library
		        $this->pagination->initialize($config);
		        
		        //define offset
		        $page = $this->uri->segment(4);
		        $offset = !$page?0:$page;
		        
		        //get rows
		        $conditions['returnType'] = '';
		        $conditions['start'] 	  = $offset;
		        $conditions['limit'] 	  = $this->perPage;
		        $data['products'] 			  = $this->product_model->getRows($conditions,$id,$min,$max);




				$this->load->template1('product_category/index',$data);
			}else{
				redirect(base_url('error404'));
			}
		}else{
			redirect(base_url('error404'));
		}
	}

	public function product_detail($hash)
	{
		if($hash)
		{
			if($this->product_model->product_where($hash))
			{

			}
			else
			{
				redirect(base_url('error404'));
			}
		}
		else
		{
			redirect(base_url('error404'));
		}
	}


	public function set_filter()
	{
		$this->session->set_userdata('filter',['min' => $_POST['min'],'max' => $_POST['max']]);
	}

	
}