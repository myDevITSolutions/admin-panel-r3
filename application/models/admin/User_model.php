<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User_model extends CI_Model{

	//-------------
	public function insert_row($data){
		$this->db->insert('r3_users', $data);
		if($this->db->affected_rows() > 0):
			return true;
		else:
			return false;
		endif;
	}

	//--------------
	public function get_rows(){
		$this->db->select('*');
		$this->db->from('r3_users');
		$this->db->join('r3_roles', 'r3_users.role_id = r3_roles.role_id');
		//$this->db->where('role_id !=', 1);
		$this->db->where_not_in('r3_users.role_id', 1);
		$query = $this->db->get();
		return  $query->result();
	}

	//--------------
	public function get_row($id){
		$query = $this->db->get_where('r3_users', array('user_id' => $id));
		return  $query->row();
	}

	//------------
	public function edit_row($data, $id){
		$this->db->set($data);
		$this->db->where('user_id', $id);
		$this->db->update('r3_users');
		if($this->db->affected_rows() > 0):
			return true;
		else:
			return false;
		endif;
	}

	//-------------
	public function get_roles(){
		$this->db->select('*');
		$this->db->from('r3_roles');
		$this->db->where('role_id !=', 1);
		$query = $this->db->get();
		return  $query->result();
	}

}