<?php


class Dashboard_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}


	public function count_agents()
	{
		return $this->db->get_where('user',['delete_flag' => '0','id !=' => '1'])->num_rows();
	}

	public function count_categories()
	{
		return $this->db->get_where('category',['df' => '0'])->num_rows();
	}

}
?>