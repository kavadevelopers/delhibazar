<?php


class Product_model extends CI_Model
{
	

	function __construct()
	{
		parent::__construct();
		$this->load->database();
        $this->load->model('social_user_model');
	}


	public function products()
	{
		return $this->db->order_by('id','DESC')->get_where('product',['df' => '0'])->result_array();
	}

	public function product_id_where($id)
	{
		return $this->db->get_where('product',['id' => $id])->result_array();
	}

	public function product_image_where($product_id)
	{
		return $this->db->get_where('product_images',['p_id' => $product_id])->result_array();
	}

	public function check_product_by_id($id)
	{
		return $this->db->get_where('product',['id' => $id,'df' => '0'])->result_array();
	}

	
    public function product_rating_where($id)
    {
        return $this->db->get_where('product_rating',['product_id' => $id])->result_array();
    }

    
    public function rating_where($id)
    {
        return $this->db->get_where('product_rating',['id' => $id])->result_array();

    }

}
?>