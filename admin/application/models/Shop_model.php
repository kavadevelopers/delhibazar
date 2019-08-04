<?php
class Shop_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function shops()
	{			
				$this->db->order_by('id','DESC');
		return $this->db->get_where('shop')->result_array();
	}

	public function shop_where($id)
	{
		return $this->db->get_where('shop',['id' => $id])->result_array();
	}

	public function get_slider_image($shop_id)
	{
		return $this->db->get_where('shop_slider',['shop_id' => $shop_id])->result_array();
	}

	public function slider_where($id)
	{
		return $this->db->get_where('shop_slider',['id' => $id])->result_array();
	}

    public function shop_rating_where($shop_id)
    {
        return $this->db->get_where('shop_rating',['shop_id' => $shop_id])->result_array();
    }

    public function shop_rating_id_where($id)
    {
        return $this->db->get_where('shop_rating',['id' => $id])->result_array();
    }    

}	