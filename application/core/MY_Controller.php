<?php
class MY_Controller extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		
		if(!$this->session->has_userdata('is_admin_login'))
		{
			redirect(base_url('auth/login'));
		}

		/*
		$_user_id = $this->session->userdata('user_id');

		$query = $this->db->get_where('ebc_users', array('user_id' => $_user_id));
		$user_details = $query->row_array();

		$this->data['user_details']=$user_details;
		*/
		
	}
}
