<?php


class General_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}


	public function setting()
	{
		return $this->db->get_where('setting',['id' => '1'])->result_array()[0];
	}

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

	public function category_byid($id)
	{
		return $this->db->get_where('category',['id' => $id])->result_array()[0]['name'];
	}



}
?>