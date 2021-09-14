<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller{
	public function __construct(){
		parent::__construct();		
		$this->load->model('admin/dashboard_model', 'dashboard_model');

	}

	//-----------
	public function index()
	{
		$data['users_count'] = $this->dashboard_model->get_users_count();
		$data['roles_count'] = $this->dashboard_model->get_roles_count();
		$data['rules_count'] = $this->dashboard_model->get_rules_count();
		$data['categories_count'] = $this->dashboard_model->get_categories_count();
		$data['areas_count'] = $this->dashboard_model->get_areas_count();
		$data['topics_count'] = $this->dashboard_model->get_topics_count();
		$data['title'] = 'Dashboard';
		$data['view'] = 'admin/dashboard';
		$this->load->view('layout', $data);
	}

}
