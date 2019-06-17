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

	public function user_id_where($id)
	{			
		return $this->db->get_where('social_user',['id' => $id])->result_array();
	}

	public function user_where($email,$password)
	{
		return $this->db->get_where('social_user',['email' => $email,'password' => $password])->result_array();
	}

}	