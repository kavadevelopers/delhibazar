<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

	public function __construct(){
        parent::__construct(); 
    }
    
    public function login(){
        $user = $this->db->get_where("shop",['username' => $this->input->post('username'),'password' => $this->input->post('password')])->result_array();
        if($user){
            $response = [
                '_return'   => true,
                'id'        => $user[0]['id'],
                'name'      => $user[0]['shop_name'],
                'ownername' => $user[0]['owner_name']
            ];
        }
        else{
            $response = [
                '_return'    => false,
                'message'   => "Email Id Or Password Invalid"
            ];
        }
        echo json_encode($response);
    }
    
    public function card(){
        $card = $this->db->get_where("card_purchase",['id' => $this->input->post('card')])->row_array();
        
        if($card){
            
            $validity = $card['validity'] == '0'?'Unlimited':get_validity($card['p_date'],$card['validity']);
            $usage    = $card['usage'] == '0'?'Unlimited':get_usage_api($card['id'],$card['usage'],$card['user']);
            
            $response = [
                '_return'           => true,
                'card_id'           => $card['card'],
                'user_id'           => $card['user'],
                'user_name'         => $this->get_user($card['user'])['first_name'].' '.$this->get_user($card['user'])['last_name'],
                'purchase_date'     => date('d-m-Y',strtotime($card['p_date'])),
                'validity'          => $validity,  
                'usage'             => $usage  
            ];
        }
        else{
            $response = [
                '_return'    => false,
                'message'   => "No Cards Found"
            ];
        }
        echo json_encode($response);
    }
    
    public function purchase(){
        
        $data = [
            'vendor'        => $this->input->post('vendor'),
            'user'          => $this->input->post('user'),
            'card'          => $this->input->post('card'),
            'amount'        => $this->input->post('amount'),
            'description'   => $this->input->post('description'),
            'created_at'    => date('Y-m-d H:i:s')
        ];
        
        if($this->db->insert('card_usage',$data)){
            $response = [
                '_return'   => true
            ];
        }
        else{
            $response = [
                '_return'    => false
            ];
        }
        echo json_encode($response);
    }
    
    public function history(){
        
        $from = $this->input->post('from');
        $to = $this->input->post('to');
        if($from != "" && $to != ""){
            $this->db->where('created_at >=', date('Y-m-d',strtotime($from)));
            $this->db->where('created_at <=', date('Y-m-d',strtotime($to)));
        }
        $this->db->where('vendor',$this->input->post('vendor'));
        $this->db->limit(100);
        $this->db->order_by('id','desc');
        $list = $this->db->get('card_usage')->result_array();
        $data = [];
        foreach($list as $key => $value){
            $card = $this->db->get_where("card_purchase",['id' => $value['card']])->row_array();
            $row = [
                'name'      => $this->get_user($value['user'])['first_name'].' '.$this->get_user($value['user'])['last_name'],
                'date'      => date('d-m-Y' ,strtotime($value['created_at'])),
                'card'      => $card['id'],
                'amount'    => $value['amount'],
                'desc'      => $value['description']
            ];
            array_push($data,$row);
        }
        
        $response = [
            'data'      => $data
        ];
        echo json_encode($response);
    }
    
    public function sale(){
        $this->db->select_sum('amount');
        $this->db->from('card_usage');
        $this->db->where('vendor',$this->input->post('vendor'));
        $total = $this->db->get()->row()->amount;
        
        $this->db->select_sum('amount');
        $this->db->from('card_usage');
        $this->db->where('vendor',$this->input->post('vendor'));
        $this->db->where('created_at >=', date('Y-m-1'));
        $this->db->where('created_at <=', date('Y-m-t'));
        $month = $this->db->get()->row()->amount;
        $response = [
            'total'      => $total,
            'month'      => $month
        ];
        echo json_encode($response);
    }
    
    
    public function get_user($id){
        return $this->db->get_where("social_user",['id' => $id])->row_array();
    }
    
}

?>