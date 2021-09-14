<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Subject_model extends CI_Model{

	//-------------
	public function insert_row($data){
		$this->db->insert('r3_subjects', $data);
		if($this->db->affected_rows() > 0):
			return true;
		else:
			return false;
		endif;
	}

	//--------------
	public function get_rows(){
		$this->db->select('*');
		$this->db->from('r3_subjects');
		$query = $this->db->get();
		return  $query->result();
	}

	//--------------
	public function get_row($id){
		$query = $this->db->get_where('r3_subjects', array('subject_id' => $id));
		return  $query->row();
	}

	//------------
	public function edit_row($data, $id){
		$this->db->set($data);
		$this->db->where('subject_id', $id);
		$this->db->update('r3_subjects');
		if($this->db->affected_rows() > 0):
			return true;
		else:
			return false;
		endif;
	}

}