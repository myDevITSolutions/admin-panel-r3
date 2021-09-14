<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard_model extends CI_Model{

	//----------------
	public function get_users_count(){
		$query = $this->db->query('SELECT * FROM r3_users WHERE role_id != 1');
		return $query->num_rows();
	}

	//----------------
	public function get_roles_count(){
		$query = $this->db->query('SELECT * FROM r3_roles');
		return $query->num_rows();
	}

	//----------------
	public function get_rules_count(){
		$query = $this->db->query('SELECT * FROM r3_rules_testing');
		return $query->num_rows();
	}

	//-----------
	public function get_categories_count(){
		$query = $this->db->query('SELECT * FROM r3_categories');
		return $query->num_rows();
	}

	//-----------
	public function get_areas_count(){
		$query = $this->db->query('SELECT * FROM r3_areas');
		return $query->num_rows();
	}

	//-----------
	public function get_topics_count(){
		$query = $this->db->query('SELECT * FROM r3_topics');
		return $query->num_rows();
	}

}