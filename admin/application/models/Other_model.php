<?php
class Other_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function keyword($id)
	{
		return $this->db->get_where('search_keywords',['id' => $id])->result_array();
	}
}
?>