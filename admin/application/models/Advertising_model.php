<?php
class Advertising_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function advertising()
	{			
				$this->db->order_by('id','DESC');
		return $this->db->get_where('advertising')->result_array();
	}

	public function advertising_where($id)
	{
		return $this->db->get_where('advertising',['id' => $id])->result_array();
	}

	public function ad_package_planname_where($id)
	{
		return $this->db->get_where('ad_package',['id' => $id])->result_array();
	}

}	