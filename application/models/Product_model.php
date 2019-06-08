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
		return $this->db->get_where('category',['df' => '0'])->result_array();
	}

	public function product_where($hash)
	{
		return $this->db->get_where('product',['hash' => $hash])->result_array();
	}

	public function product_image_where($product_id)
	{
		return $this->db->get_where('product_images',['p_id' => $product_id])->result_array();
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


	function getRows($params = array(),$id,$min,$max){
        $this->db->select('*');
        $this->db->where('category',$id);
        $this->db->where('amount >=',$min);
        $this->db->where('amount <=',$max);
        $this->db->from('product');
        if(array_key_exists("id",$params)){
            $this->db->where('id',$params['id']);
            $query = $this->db->get();
            $result = $query->row_array();
        }else{
            //set start and limit
            if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit'],$params['start']);
            }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit']);
            }
            
            if(array_key_exists("returnType",$params) && $params['returnType'] == 'count'){
                $result = $this->db->count_all_results();
            }else{
                $query = $this->db->get();
                $result = ($query->num_rows() > 0)?$query->result_array():FALSE;
            }
        }

        return $result;
    }
}