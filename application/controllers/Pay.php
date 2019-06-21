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
            $amount             = $this->input->post('grand_total');
            $product_info       = implode(',',$this->input->post('product_name'));
            $customer_name      = ucfirst($this->input->post('first_name')).' '.ucfirst($this->input->post('last_name'));
            $customer_email     = $this->input->post('email');
            $customer_mobile    = $this->input->post('number');
            $address1           = ucfirst($this->input->post('add1'));
            $address2           = ucfirst($this->input->post('add2'));
            $country            = ucfirst($this->input->post('country'));
            $city               = ucfirst($this->input->post('city'));
            $zipcode            = ucfirst($this->input->post('zip'));

            $MERCHANT_KEY       = $this->config->config['merchant_key'];
            $SALT               = $this->config->config['salt']; 
            $txnid              = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
            
            $udf1               = $this->input->post('user_id');
            $udf2               = ucfirst($this->input->post('district'));
            $udf3               = implode(',',$this->input->post('product_id'));
            $udf4               = implode(',',$this->input->post('qty'));          //Product Quantity
            $udf5               = implode(',',$this->input->post('cart_tbl_id')); // Cart Table Auto Increment Id
                


            $hashstring = $MERCHANT_KEY . '|' . $txnid . '|' . $amount . '|' . $product_info . '|' . $customer_name . '|' . $customer_email . '|' . $udf1 . '|' . $udf2 . '|' . $udf3 . '|' . $udf4 . '|' . $udf5 . '||||||' . $SALT;
            $hash = strtolower(hash('sha512', $hashstring));
                
            $success    = base_url() . 'pay/status';  
            $fail       = base_url() . 'pay/status';  
            $cancel = base_url() . 'pay/status';  
                
                
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
                    'address1'  => $address1,
                    'address2'  => $address2,
                    'country'   => $country,
                    'city'      => $city,
                    'zipcode'   => $zipcode,
                    'action'    => "https://test.payu.in", //for live change action  https://secure.payu.in ,https://test.payu.in
                    'sucess'    => $success,
                    'failure'   => $fail,
                    'cancel'    => $cancel            
            );

            $data['_title']             = "DELHIBAZAR";
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

                    $data['hash']        = hash("sha512", $retHashSeq);
                    $data['amount']      = $amount;
                    $data['txnid']       = $txnid;
                    $data['posted_hash'] = $posted_hash;
                    $data['status']      = $status;

                    if($status == 'success')
                    {
                        $data = [
                                    'user_id'       => $this->input->post('udf1'),
                                    'txnid'         => $this->input->post('txnid'),
                                    'product_id'    => $this->input->post('udf3'),
                                    'cart_tbl_id'   => $this->input->post('udf5'),
                                    'quantity'      => $this->input->post('udf4'),
                                    'amount'        => $this->input->post('amount'),
                                    'productinfo'   => $this->input->post('productinfo'),
                                    'name'          => $this->input->post('firstname'),
                                    'address1'      => $this->input->post('address1'),
                                    'address2'      => $this->input->post('address2'),
                                    'city'          => $this->input->post('city'),
                                    'district'      => $this->input->post('udf2'),
                                    'country'       => $this->input->post('country'),
                                    'zipcode'       => $this->input->post('zipcode'),
                                    'email'         => $this->input->post('email'),
                                    'phone'         => $this->input->post('phone'),
                                    'created_at'    => date('Y-m-d H:i:s'),
                                                 
                                ];
                        
                        if($this->db->insert('payment',$data))
                        {
                            $id     = $this->db->insert_id();
                            $data   = $this->db->get_where('payment',['id' => $id])->result_array();
                            
                            $cart   = $data[0]['cart_tbl_id'];
                            $array  = explode(',' ,$cart);

                            foreach ($array as $key => $value) {
                                
                                $this->db->delete('cart',['id' => $value]);
                            }
                            
                            $this->session->set_flashdata('msg', 'Order Successfully Placed');
                            redirect(base_url('category'));                        
                            
                        }
                        
                    }
                    else
                    {
                        $this->session->set_flashdata('error', 'Something went wrong try again');
                        redirect(base_url('cart'));
                    }
             
            }

    }

 }
