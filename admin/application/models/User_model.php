<?php


class User_model extends CI_Model
{


	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}


	public function users()
	{
		return $this->db->order_by('id','DESC')->get_where('user',['id !=' => '1','delete_flag' => '0'])->result_array();
	}

	public function agent_get($id)
	{
		return $this->db->get_where('user',['id' => $id,'id !=' => '1','delete_flag' => '0'])->result_array();
	}

	public function ses_user($id)
	{
		return $this->db->get_where('user',['id' => $id])->result_array();
	}


	public function get_category($id)
	{
		return $this->db->get_where('main_category',['id' => $id,'status' => '0	'])->result_array();	
	}

	public function get_category_all($id)
	{
		return $this->db->get_where('main_category',['id' => $id])->result_array();	
	}

	public function get_subcategory($id)
	{
		return $this->db->get_where('category',['id' => $id])->result_array();	
	}
}