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

	public function categories()
	{			
			$this->db->order_by('id','DESC');
			$this->db->where('df','');
		return $this->db->get('shop_categories')->result_array();
	}

	public function categories_where($id)
	{			
		return $this->db->get_where('shop_categories',['id' => $id,'df' => ''])->result_array();
	}

	public function area()
	{			
			$this->db->order_by('id','DESC');
			$this->db->where('df','');
		return $this->db->get('shop_area')->result_array();
	}

	public function area_where($id)
	{			
		return $this->db->get_where('shop_area',['id' => $id,'df' => ''])->result_array();
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











    // offers

    public function get_offers()
    {
    	return $this->db->get('offers')->result_array();
    }

    public function offer_id($id)
    {
    	return $this->db->get('offers',['id' => $id])->result_array();
    }


    // offers

}	