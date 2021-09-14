<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Rule_model extends CI_Model{

	//-------------
	public function insert_row($data){
		$this->db->insert('r3_rules_testing', $data);
		if($this->db->affected_rows() > 0):
			return $this->db->insert_id();
		else:
			return false;
		endif;
	}

	//---------------
	public function insert_graphics($data){
		$this->db->insert('r3_rule_graphics', $data);
		if($this->db->affected_rows() > 0):
			return true;
		else:
			return false;
		endif;
	}

	//--------------
	public function get_rows(){
		$this->db->select('*');
		$this->db->from('r3_rules_testing');
		$this->db->join('r3_categories', 'r3_rules_testing.category_id = r3_categories.category_id');
		$this->db->join('r3_areas', 'r3_rules_testing.area_id = r3_areas.area_id');
		//$this->db->join('r3_areas', 'r3_rules_testing.area_id = r3_areas.area_id');
		$query = $this->db->get();
		return  $query->result();
	}

	//--------------
	public function get_row($id){
		$query = $this->db->get_where('r3_rules_testing', array('rule_id' => $id));
		return  $query->row();
	}

	//-------------
	public function get_rule_data($rule_id){
		$this->db->select('*');
		$this->db->from('r3_rules_testing');
		$this->db->join('r3_categories', 'r3_rules_testing.category_id = r3_categories.category_id');
		$this->db->join('r3_areas', 'r3_rules_testing.area_id = r3_areas.area_id');
		$this->db->join('r3_subjects', 'r3_rules_testing.subject_id = r3_subjects.subject_id');
		$this->db->join('r3_topics', 'r3_rules_testing.topic_id = r3_topics.topic_id');
		$this->db->where('r3_rules_testing.rule_id', $rule_id);
		$query = $this->db->get();
		return  $query->row();
	}

	//----------
	public function get_rule_graphics($rule_id){
		$this->db->select('*');
		$this->db->from('r3_rule_graphics');
		$this->db->where('rule_id', $rule_id);
		$query = $this->db->get();
		return  $query->result();
	}

	//------------
	public function edit_row($data, $id){
		$this->db->set($data);
		$this->db->where('rule_id', $id);
		$this->db->update('r3_rules_testing');
		if($this->db->affected_rows() > 0):
			return true;
		else:
			return false;
		endif;
	}


	//--------
	public function get_categories(){
		$this->db->select('*');
		$this->db->from('r3_categories');
		$query = $this->db->get();
		return  $query->result();
	}

	//--------
	public function get_areas(){
		$this->db->select('*');
		$this->db->from('r3_areas');
		$query = $this->db->get();
		return  $query->result();
	}

	//--------
	public function get_subjects(){
		$this->db->select('*');
		$this->db->from('r3_subjects');
		$query = $this->db->get();
		return  $query->result();
	}

	//--------
	public function get_topics(){
		$this->db->select('*');
		$this->db->from('r3_topics');
		$query = $this->db->get();
		return  $query->result();
	}

}