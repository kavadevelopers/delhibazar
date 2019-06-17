<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pay extends CI_Controller {

	function __construct(){
        parent::__construct(); 
    	$this->load->model('product_model');   
    	$this->load->model('cart_model');   
    }


    public function index()
    {
        $data               = [
                                    'user_id'      =>  $this->input->post('user_id'),
                                    'first_name'   =>  $this->input->post('first_name'),
                                    'last_name'    =>  $this->input->post('last_name'),
                                    'number'       =>  $this->input->post('number'),
                                    'email'        =>  $this->input->post('email'),
                                    'country'      =>  $this->input->post('country'),
                                    'city'         =>  $this->input->post('city'),
                                    'district'     =>  $this->input->post('district'),
                                    'zip'          =>  $this->input->post('zip'),
                                    'add1'         =>  $this->input->post('add1'),
                                    'add2'         =>  $this->input->post('add2'),
                                    'product_id'   =>  implode(',',$this->input->post('product_id')),
                                    'created_at'   =>  date('Y-m-d H:i:s'),
                              ];


        $amount             =  $this->input->post('grand_total');
        $product_info       = implode(',',$this->input->post('product_name'));
        $customer_name      = $this->input->post('first_name').' '.$this->input->post('last_name');
        $customer_email     = $this->input->post('email');
        $customer_mobile    = $this->input->post('number');
        $customer_address   = $this->input->post('add1');

        
        
        $MERCHANT_KEY = $this->config->config['merchant_key'];
        $SALT = $this->config->config['salt']; 
        $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
        

        $udf1 = '';
        $udf2 = '';
        $udf3 = '';
        $udf4 = '';
        $udf5 = '';
            
        $hashstring = $MERCHANT_KEY . '|' . $txnid . '|' . $amount . '|' . $product_info . '|' . $customer_name . '|' . $customer_email . '|' . $udf1 . '|' . $udf2 . '|' . $udf3 . '|' . $udf4 . '|' . $udf5 . '||||||' . $SALT;
        $hash = strtolower(hash('sha512', $hashstring));
            
        $success    = base_url() . 'pay/status';  
        $fail       = base_url() . 'pay/status';  
        $cancel = base_url() . 'pay/status';  
            
            
        $data = array(
                'mkey'      => $MERCHANT_KEY,
                'tid'       => $txnid,
                'hash'      => $hash,
                'amount'    => $amount,           
                'name'      => $customer_name,
                'productinfo'=> $product_info,
                'mailid'    => $customer_email,
                'phoneno'   => $customer_mobile,
                'address'   => $customer_address,
                'action'    => "https://test.payu.in", //for live change action  https://secure.payu.in ,https://test.payu.in
                'sucess'    => $success,
                'failure'   => $fail,
                'cancel'    => $cancel            
        );

    	$data['_title']				= "DELHIBAZAR";
        $data['filed']              = $this->input->post();
		$this->load->template1('pay/index',$data);
    }

    /**********************************************
                    Payment Status
    **********************************************/

    public function status()
    {

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
                    $salt           = $this->config->config['salt']; //  Your salt
                    $add            = $this->input->post('additionalCharges');

                    if(isset($add)) {
                        $additionalCharges = $this->input->post('additionalCharges');
                        $retHashSeq = $additionalCharges . '|' . $salt . '|' . $status . '|||||||||||' . $email . '|' . $firstname . '|' . $productinfo . '|' . $amount . '|' . $txnid . '|' . $key;
                    } else {
                        $retHashSeq = $salt . '|' . $status . '|||||||||||' . $email . '|' . $firstname . '|' . $productinfo . '|' . $amount . '|' . $txnid . '|' . $key;
                    }

                    $data['hash'] = hash("sha512", $retHashSeq);
                    $data['amount'] = $amount;
                    $data['txnid'] = $txnid;
                    $data['posted_hash'] = $posted_hash;
                    $data['status'] = $status;

                    if($status == 'success'){

                        echo "Successful";

                        
                    }
                    else{
                        echo "fail";
                    }
             
            }

    }

 }
