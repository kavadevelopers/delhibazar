<?php
class Social_user_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function user()
	{			
				$this->db->order_by('id','DESC');
		return $this->db->get_where('social_user')->result_array();
	}
}