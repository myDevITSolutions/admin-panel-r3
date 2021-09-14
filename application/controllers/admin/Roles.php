<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Roles extends MY_Controller{

	public function __construct(){
		parent::__construct();		
		$this->load->model('admin/role_model', 'role_model');

	}

	//-----------
	public function index()
	{
		$data['roles'] = $this->role_model->get_rows();
		$data['title'] = 'Roles';
		$data['view'] = 'admin/roles/role_list';
		$this->load->view('layout', $data);
	}

	//----------
	public function add_role()
	{
		if($this->input->post('add')){
			$this->form_validation->set_rules('role_name', 'Role name', 'required');
			 if($this->form_validation->run() == FALSE){
			 	$data['roles'] = $this->role_model->get_rows();
        $data['view'] = 'admin/roles/role_list';
				$this->load->view('layout', $data);
      }else{
      	$data = array(
      		'role_name' => $this->input->post('role_name'),
      		'role_desc' => $this->input->post('role_desc')
      	);
      	$data = $this->security->xss_clean($data);
      	$result = $this->role_model->insert_row($data);
      	if($result){
      		$this->session->set_flashdata('success', 'Success! Role created successfully.');
					redirect(base_url('admin/roles'));
      	}else{
      		$this->session->set_flashdata('warning', 'Sorry! Something went wrong.');
					redirect(base_url('admin/roles'));
      	}

      }
		}else{
			redirect(base_url('admin/roles'));
		}
	}

	//----------
	public function edit_role($id)
	{
		if($this->input->post('edit')){
			$this->form_validation->set_rules('role_name', 'Role name', 'required');
			 if($this->form_validation->run() == FALSE){
        $data['view'] = 'admin/roles/role_add';
				$this->load->view('layout', $data);
      }else{
      	$data = array(
      		'role_name' => $this->input->post('role_name'),
      		'role_desc' => $this->input->post('role_desc')
      	);
      	$data = $this->security->xss_clean($data);
      	$result = $this->role_model->edit_row($data, $id);
      	if($result){
      		$this->session->set_flashdata('success', 'Success! Role created successfully.');
					redirect(base_url('admin/roles'));
      	}else{
      		$this->session->set_flashdata('warning', 'Sorry! Something went wrong.');
					redirect(base_url('admin/add_role'));
      	}
      }
		}else{
			$data['role'] = $this->role_model->get_row($id);
			$data['view'] = 'admin/roles/role_edit';
			$this->load->view('layout', $data);
		}
	}

	
	//---------------
	public function delete_role($id){
		$this->db->where('role_id', $id);
		$this->db->delete('r3_roles');

		$this->session->set_flashdata('success', 'Role has been deleted successfully!');
		redirect(base_url('admin/roles'));
	}


}
