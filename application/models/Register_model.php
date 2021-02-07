<?php

class Register_model extends CI_Controller {
	function insert($data)
	{
		$this->db->insert('tms_user',$data);
		return $this->db->insert_id();
	}
}
