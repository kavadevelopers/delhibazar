<?php


class Product_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}


	public function get_category()
	{
		return $this->db->get_where('main_category',['df' => '0','status' => '0'])->result_array();
	}

    public function get_single_category($id)
    {
        return $this->db->get_where('main_category',['id' => $id,'df' => '0','status' => '0'])->result_array();
    }

    public function get_sub_category($id)
    {
        return $this->db->get_where('category',['category' => $id,'df' => '0','status' => '0'])->result_array();
    }

    public function get_sub_category_by_id($id)
    {
        return $this->db->get_where('category',['id' => $id,'df' => '0','status' => '0'])->result_array();
    }

	public function product_where($hash)
	{
		return $this->db->get_where('product',['hash' => $hash])->result_array();
	}

	public function product_id_where($id)
	{
		return $this->db->get_where('product',['id' => $id])->result_array();
	}

	public function product_image_where($product_id)
	{	
		$data = $this->db->get_where('product_images',['p_id' => $product_id])->result_array();
		if($data){ return $data; }else{ return $data = [0]; }
		
	}

	public function product_category_where($category_id)
	{
		return $this->db->get_where('product',['category' => $category_id])->result_array();
	}

	public function category_where($id)
	{
		return $this->db->get_Where('category',['id' => $id])->result_array();
	}

	public function dynamic_category_data()
	{			$this->db->order_by('rand()');
		return $this->db->get_where('category',['df' => 0],5)->result_array();
	}


	function getRows($params = array(),$id,$min,$max,$order,$products_or){
        $this->db->select('*');

        if($order == 'id_desc'){
            $this->db->order_by('id','desc');
        }else if($order == 'id_asc'){
            $this->db->order_by('id','asc');
        }else if($order == 'price_low'){
            $this->db->order_by('amount','asc');
        }else if($order == 'price_high'){
            $this->db->order_by('amount','desc');
        }else if($order == 'rating'){
            $this->db->order_by('rating','desc');
        }else{
            $this->db->order_by('id','desc');
        }

        $this->db->group_start();
            if(count($products_or) > 0){
                $this->db->where('id','0');
                foreach ($products_or as $_key => $_value) {
                    $this->db->or_where('id',$_value);
                }
            }
            else{
                $this->db->where('id','0');
            }
        $this->db->group_end();

        $this->db->group_start();
            $this->db->where('amount >=',$min);
            $this->db->where('amount <=',$max);
            $this->db->where('status','1');
            $this->db->where('df','0');
        $this->db->group_end();

        $this->db->from('product');
        if(array_key_exists("id",$params)){
            $this->db->where('id',$params['id']);
            $query = $this->db->get();
            $result = $query->row_array();
        }else{
            //set start and limit
            // if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
            //     $this->db->limit($params['limit'],$params['start']);
            // }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
            //     $this->db->limit($params['limit']);
            // }
            
            if(array_key_exists("returnType",$params) && $params['returnType'] == 'count'){
                $result = $this->db->count_all_results();
            }else{
                $query = $this->db->get();
                $result = ($query->num_rows() > 0)?$query->result_array():FALSE;
            }
        }

        return $result;
    }

    public function related_products($category,$hash,$price){
        
        $percentage = 30;

        $min = $price - ($price * $percentage / 100);
        $max = $price + ($price * $percentage / 100);

        $array = [];
        foreach ($this->db->get_where('product' ,['df' => '0','status' => '1'])->result_array() as $key => $value) {
            
            foreach (explode(',', $category) as $_key => $_value) {

                if(in_array($_value,explode(',', $value['category']))){ 
                    $array[] = $value['id'];          
                }

            }
            
        }

        $this->db->group_start();
        if(count($array) > 0){
            foreach ($array as $key => $value) {
                $this->db->or_where('id',$value);       
            }
        }
        else{
            $this->db->or_where('id','0'); 
        }
        $this->db->group_end();
        $this->db->where('amount >=',$min);
        $this->db->where('amount <=',$max);
        $this->db->limit('8');
        $this->db->order_by('id','asc');
        return $this->db->get_where('product',['hash !=' => $hash])->result_array();
    }


    public function get_products_by_subcategory($category_id)
    {
        $this->db->where('df','0');
        $this->db->where('status','1');
        $all_products = $this->db->get('product')->result_array();
        $products_or = [];
        foreach ($all_products as $key => $value) {
            if(in_array($category_id,explode(',', $value['category']))){
                $products_or[] = $value['id'];
            }
        }


        $this->db->group_start();
            if(count($products_or) > 0){
                $this->db->where('id','0');
                foreach ($products_or as $_key => $_value) {
                    $this->db->or_where('id',$_value);
                }
            }
            else{
                $this->db->where('id','0');
            }
        $this->db->group_end();
        return $this->db->get('product')->result_array();
    }


    public function get_cards()
    {
        $this->db->where('df','');
        return $this->db->get('cards')->result_array();
    }
}