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

        if($this->session->userdata('order')){
            $order =  $this->session->userdata('order'); 
        }else{ 
            $order = 10;
        }


		$id = $this->uri->segment(3);
		
		if($id)
		{
			$data['category']		= $this->product_model->category_where($id);
			if($this->product_model->category_where($id))
			{


				$products_or = [];

				foreach ($this->db->get_where('product' ,['df' => '0'])->result_array() as $key => $value) {
					if(in_array($id,explode(',', $value['category']))){
						$products_or[] = $value['id'];						
					}
				}
				
				$data['dynamic_category']		= $this->product_model->dynamic_category_data();
        
		        //get rows count
		        $conditions['returnType']   = 'count';
		        $totalRec = $this->product_model->getRows($conditions,$id,$min,$max,$order,$products_or);
		        
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
		        $data['products'] 			  = $this->product_model->getRows($conditions,$id,$min,$max,$order,$products_or);
		        $data['_cate_id'] 		= $id;



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
				$data['related'] 		= $this->product_model->related_products($data['product'][0]['category'],$hash,$data['product'][0]['amount']);
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
        $this->session->set_userdata('order',$_POST['order']);
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

                $rating = $this->rating_model->get_product_avarage_rating($this->input->post('product_hash'))[0]['average'];
                
                $this->db->where('id',$this->input->post('product_id'));
                $this->db->update('product',['rating' => round($rating,1)]);

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

                $rating = $this->rating_model->get_product_avarage_rating($this->input->post('product_hash'))[0]['average'];
                
                $this->db->where('id',$this->input->post('product_id'));
                $this->db->update('product',['rating' => round($rating,1)]);
                
				$this->session->set_flashdata('msg', 'Rating Updated Thankyou');
				redirect(base_url('products/product_detail/'.$this->input->post('edit_hash')));
			}
			else
			{
				$this->session->set_flashdata('error', 'Something went wrong try again');
				redirect(base_url('products/product_detail/'.$this->input->post('edit_hash')));
			}
	}

	public function add_to_cart()
	{
		$product_id = $this->product_model->product_where($this->input->get('hash'))[0]['id'];
		
			$data = [
					'qty' 			=> '1',
					'product_id' 	=> $product_id,
					'user_id' 		=> $this->session->userdata('id'),
					'created_at' 	=> date('Y-m-d H:i:s')
				];

			if($this->db->insert('cart',$data))
			{
				$this->session->set_flashdata('msg', 'Product Added to Cart');
				redirect($this->input->get('uri'));	
			}
			else
			{
				$this->session->set_flashdata('error', 'Something went wrong try again');
				redirect($this->input->get('uri'));	
			}
	}

	public function add_to_wishlist()
	{
		$product_id = $this->product_model->product_where($this->input->get('hash'))[0]['id'];
		
			$data = [
					'product_id' 	=> $product_id,
					'user_id' 		=> $this->session->userdata('id'),
					'created_at' 	=> date('Y-m-d H:i:s')
				];

			if($this->db->insert('wishlist',$data))
			{
				$this->session->set_flashdata('msg', 'Product Added to Wishlist');
				redirect($this->input->get('uri'));	
			}
			else
			{
				$this->session->set_flashdata('error', 'Something went wrong try again');
				redirect($this->input->get('uri'));	
			}
	}



	public function card($id = false)
	{
		if($id)
		{
			$card = $this->db->get_where('cards',['id' => $id,'df' => ''])->result_array();
			if($card){
				$data['_title']			= "DELHIBAZAR";
				$data['product']		= $card[0];
				$this->load->template1('card/purchase',$data);
			}
			else{
				redirect(base_url('home'));
			}
		}
		else{
			redirect(base_url('home'));
		}
	}

	public function purchase_card()
	{
		$user = $this->db->get_where('social_user',['id' => $this->session->userdata('id')])->result_array()[0];
		$amount             = $this->input->post('grand_total');
        $product_info       = 'Virtual Card - '.$this->input->post('product_id');
        $customer_name      = ucfirst($user['first_name']).' '.ucfirst($user['last_name']);
        $customer_email     = $user['email'];
        $customer_mobile     = $user['mobile'];

        $MERCHANT_KEY       = get_setting()['merchent_key'];
        $SALT               = get_setting()['salt']; 
        $txnid              = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
        $udf1               = $this->input->post('product_id');
        $udf2               = $this->session->userdata('id');
        $udf3               = "";
        $udf4               = "";
        $udf5               = "";


        $hashstring = $MERCHANT_KEY . '|' . $txnid . '|' . $amount . '|' . $product_info . '|' . $customer_name . '|' . $customer_email . '|' . $udf1 . '|' . $udf2 . '|' . $udf3 . '|' . $udf4 . '|' . $udf5 .'||||||' . $SALT;
        $hash = strtolower(hash('sha512', $hashstring));


        $success    = base_url() . 'products/status_payment';  
        $fail       = base_url() . 'products/status_payment';  
        $cancel     = base_url() . 'products/status_payment'; 

        $data = array(
                    'mkey'      => $MERCHANT_KEY,
                    'tid'       => $txnid,
                    'udf1'      => $udf1,
                    'udf2'      => $udf2,
                    'udf3'      => $udf3,
                    'udf4'      => $udf4,
                    'udf5'      => $udf5,
                    'hash'      => $hash,
                    'amount'    => $amount,           
                    'name'      => $customer_name,
                    'productinfo'=> $product_info,
                    'mailid'    => $customer_email,
                    'phoneno'   => $customer_mobile,
                    'address1'  => "",
                    'address2'  => "",
                    'country'   => "",
                    'city'      => "",
                    'zipcode'   => "",
                    'action'    => "https://test.payu.in", //for live change action  https://secure.payu.in ,https://test.payu.in
                    'sucess'    => $success,
                    'failure'   => $fail,
                    'cancel'    => $cancel            
            ); 

        $data['_title']             = "DELHIBAZAR Payment";
        $data['filed']              = $this->input->post();
        $this->load->template1('card/payment',$data);
	}

	public function status_payment()
	{
		if($this->input->post()){
        	$status = $this->input->post('status');
            if($this->input->post('status')){
                if (empty($status)) {
                    redirect(base_url('cart'));
                }
               
                    $firstname      = $this->input->post('firstname');
                    $amount         = $this->input->post('amount');
                    $txnid          = $this->input->post('txnid');
                    $posted_hash    = $this->input->post('hash');
                    $key            = $this->input->post('key');
                    $productinfo    = $this->input->post('productinfo');
                    $email          = $this->input->post('email');
                    $salt           = get_setting()['salt']; //  Your salt
                    $add            = $this->input->post('additionalCharges');

                    if(isset($add)) {
                        $additionalCharges = $this->input->post('additionalCharges');
                        $retHashSeq = $additionalCharges . '|' . $salt . '|' . $status . '|||||||||||' . $email . '|' . $firstname . '|' . $productinfo . '|' . $amount . '|' . $txnid . '|' . $key;
                    } else {
                        $retHashSeq = $salt . '|' . $status . '|||||||||||' . $email . '|' . $firstname . '|' . $productinfo . '|' . $amount . '|' . $txnid . '|' . $key;
                    }

                    $data['hash']        = hash("sha512", $retHashSeq);
                    $data['amount']      = $amount;
                    $data['txnid']       = $txnid;
                    $data['posted_hash'] = $posted_hash;
                    $data['status']      = $status;

                    if($status == 'success')
                    {
                    	$card = $this->db->get_where('cards',['id' => $this->input->post('udf1')])->row_array();
                        $data = [
                                    't_id'       	=> $txnid,
                                    'amount'       	=> $amount,
                                    'card'         	=> $this->input->post('udf1'),
                                    'user'    		=> $this->input->post('udf2'),
                                    'validity'    	=> $card['validity'],
                                    'usage'    		=> $card['total_usage'],
                                    'p_date'		=> date('Y-m-d')
                                ];
                        
                        if($this->db->insert('card_purchase',$data))
                        {
                        	$this->send_card($this->db->insert_id());
                            $this->session->set_flashdata('msg', 'Card Added To Your Account Thankyou');
                            redirect(base_url('home'));
                        }
                        
                    }
                    else
                    {
                        $this->session->set_flashdata('error', 'Something went wrong try again');
                        redirect(base_url('home'));
                    }
             
            }

            }else{
                redirect(base_url().'error404');
            }
	}

	public function qr($id)
	{
		$card = $this->db->get_where('card_purchase',['id' => $id])->row_array();
		$this->load->library('ciqrcode');
        $config['size']         = 256;
        $this->ciqrcode->initialize($config);
        $params['data'] = json_encode(['card' => $card['id'],'user' => $card['user']]);
        $params['level'] = 'H';
        $params['savename'] = FCPATH.'/uploads/qr/'.$card['id'].'-'.$card['user'].'.png';
        if(!file_exists($params['savename'])){
        	$this->ciqrcode->generate($params);
        }
        return $card['id'].'-'.$card['user'].'.png';
	}

	public function card_generate()
	{


		?>


		<div style="width: 330px; height: 180px; background: #000000; margin: 0 auto;display: table;border-radius: 10px;">
			<div style="vertical-align: middle; width: 50%; display: table-cell; text-align: center;">
				<img src="<?= base_url() ?>image/logo.png" style="width: 100%;">
				<p style="padding: 0px; text-align: center; color: #ffc107; font-size: 14px; margin: 0;">
					<?= get_setting()['card_text'] ?>
				</p>
				<p style="padding: 0px; text-align: center; color: #ffffff; font-size: 14px; margin: 0;">
					<?= get_setting()['card_email'] ?>
				</p>
			</div>
			<div style="vertical-align: middle; width: 50%; display: table-cell; text-align: center;">
				<img src="<?= base_url('uploads/qr/').$this->qr(1); ?>" style="width: 70%;">
				<p style="padding: 0px; text-align: center; color: #ffffff; font-size: 12px; margin: 5px 0 0 0; line-height: 1;">
					<?= get_setting()['card_web'] ?>
				</p>
			</div>
		</div>



		<?php
	}


	public function send_card($id)
	{

		$card = $this->db->get_where('card_purchase',['id' => $id])->row_array();
		$user = $this->db->get_where('social_user',['id' => $card['user']])->row_array();

		$config['protocol']     = 'smtp';
        $config['smtp_host']    = get_setting()['smtp_host'];
        $config['smtp_port']    = get_setting()['smtp_port'];
        $config['smtp_timeout'] = '7';
        $config['smtp_user']    = get_setting()['acard_email'];
        $config['smtp_pass']    = get_setting()['card_pass'];
        $config['charset']      = 'utf-8';
        $config['newline']      = "\r\n";
        $config['mailtype']     = 'html';
        $config['validation']   = TRUE; 
        
        $this->email->initialize($config);

        $this->email->from(get_setting()['acard_email'], 'DELHIBAZAR');
        $this->email->to($user['email']); 
        $this->email->subject("Your Card");
        $data['qr']		= $this->qr($id);
        $data['name']   = $user['first_name'].' '.$user['last_name'];
        $this->email->message($this->load->view('card/email',$data,TRUE));
        $this->email->send();
	}
}