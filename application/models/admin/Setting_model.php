<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Setting_model extends CI_Model{

	//---------------
	public function get_user($id){
		$this->db->select('*');
		$query = $this->db->get_where('r3_users', array('user_id' => $id));
		return $query->row();
	}

	//--------------
	public function edit_user($data, $id){
		$this->db->set($data);
		$this->db->where('user_id', $id);
		$this->db->update('r3_users');
		if($this->db->affected_rows() > 0):
			return true;
		else:
			return false;
		endif;
	}

}