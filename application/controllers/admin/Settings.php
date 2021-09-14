<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends MY_Controller{
	public function __construct(){
		parent::__construct();		
		$this->load->model('admin/setting_model', 'setting_model');

	}

	public function account(){
		$user_id = $this->session->userdata('user_id');
		$data['user'] = $this->setting_model->get_user($user_id);
		$data['title'] = 'Settings';
		$data['view'] = 'admin/settings/account';
		$this->load->view('layout', $data);
	}

	//-----------------
	public function edit_account($id){
		if($this->input->post('save')){
			$this->form_validation->set_rules('userfname', 'First name', 'required');
			$this->form_validation->set_rules('userlname', 'Last name', 'required');
			if($this->form_validation->run() == FALSE){
			 	$user_id = $this->session->userdata('user_id');
				$data['user'] = $this->setting_model->get_user($user_id);
				$data['title'] = 'Settings';
				$data['view'] = 'admin/settings/account';
				$this->load->view('layout', $data);
      }else{
      	$data = array(
      		'userfname' => $this->input->post('userfname'),
      		'userlname' => $this->input->post('userlname'),
      	);

      	$data = $this->security->xss_clean($data);
	      $success = $this->setting_model->edit_user($data, $id);
	      if($success){
	      	$this->session->set_flashdata('success', 'Success! Account updated successfully.');
					redirect(base_url('admin/settings/account'));
	      }else{
	      	$this->session->set_flashdata('warning', 'Sorry! Something went wrong.');
					redirect(base_url('admin/settings/account'));
	      }

      }
		}else{
			redirect(base_url('admin/settings/account'));
		}
	}

}
