<?php


class General_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	/******************  NEWLETTER  ********************/
	
	public function newsletter()
	{
		return  $this->db->get('newsletter')->result_array();
	}

	public function newsletter_where($id)
	{
		return  $this->db->get('newsletter',['id' => $id])->result_array();
	}

	/******************  NEWLETTER  ********************/
	

	public function count_agents()
	{
		return $this->db->get_where('user',['delete_flag' => '0','id !=' => '1'])->num_rows();
	}

	public function count_categories()
	{
		return $this->db->get_where('category',['df' => '0'])->num_rows();
	}

	public function get_categories()
	{
		return $this->db->get_where('category',['df' => '0'])->result_array();
	}

    public function get_categories_where($id)
    {
        return $this->db->get_where('category',['id' => $id])->result_array();
    }

	public function category_byid($id)
	{
		return $this->db->get_where('category',['id' => $id])->result_array()[0]['name'];
	}



}
?>