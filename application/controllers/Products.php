<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

	function __construct(){
        parent::__construct(); 
    	$this->load->model('product_model');   
    	$this->load->model('rating_model');   

    	$this->load->library('pagination');
    	$this->perPage = 9;
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

	public function load_more()
    {
        echo json_encode($this->rating_model->product_rating_load_more($this->input->post('record'),$this->input->post('product_id')));
    }

	public function product_detail($hash)
	{
		if($hash)
		{
			if($this->product_model->product_where($hash))
			{
				$data['_title']			= "DELHIBAZAR";
				$data['product']		= $this->product_model->product_where($hash);
				$data['product_review']	= $this->rating_model->product_where_hash($hash);
				$data['avarage_rating'] = $this->rating_model->get_product_avarage_rating($hash);
				$data['star_1']			= $this->rating_model->star_rating_1($hash);
				$data['star_2']			= $this->rating_model->star_rating_2($hash);
				$data['star_3']			= $this->rating_model->star_rating_3($hash);
				$data['star_4']			= $this->rating_model->star_rating_4($hash);
				$data['star_5']			= $this->rating_model->star_rating_5($hash);
				$this->load->template1('product_category/product_detail',$data);
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


	public function review()
	{
		$data =	[
					'product_id'=> $this->input->post('product_id'),
					'hash'		=> $this->input->post('product_hash'),
					'user_id'	=> $this->input->post('user_id'),
					'rating'	=> $this->input->post('rating'),
					'review'	=> ucfirst($this->input->post('review')),
					'created_at'=> date('Y-m-d H:i:s')
				]; 

			if($this->db->insert('product_rating',$data))
			{
				$this->session->set_flashdata('msg', 'Thank you for rating');
				redirect(base_url('products/product_detail/'.$this->input->post('product_hash')));
			}
			else
			{
				$this->session->set_flashdata('error', 'Something went wrong try again');
				redirect(base_url('products/product_detail/'.$this->input->post('product_hash')));
			}
	}

	public function edit_review()
	{
		$data =	[	'rating'	=> $this->input->post('edit_rating'),
					'review'	=> ucfirst($this->input->post('edit_review')),
					'updated_at'=> date('Y-m-d H:i:s')
				]; 

				$this->db->where('id',$this->input->post('edit_id'));
			if($this->db->update('product_rating',$data))
			{
				$this->session->set_flashdata('msg', 'Rating Updated Thankyou');
				redirect(base_url('products/product_detail/'.$this->input->post('edit_hash')));
			}
			else
			{
				$this->session->set_flashdata('error', 'Something went wrong try again');
				redirect(base_url('products/product_detail/'.$this->input->post('edit_hash')));
			}
	}
	
}