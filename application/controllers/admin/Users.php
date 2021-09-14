<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MY_Controller{

	public function __construct(){
		parent::__construct();		
		$this->load->model('admin/user_model', 'user_model');

	}

	//-----------
	public function index()
	{
		$data['users'] = $this->user_model->get_rows();		
		$data['title'] = 'Users';
		$data['view'] = 'admin/users/user_list';
		$this->load->view('layout', $data);
	}

	
	//----------
	public function add_user()
	{
		if($this->input->post('add')){
			$this->form_validation->set_rules('userfname', 'User name', 'required');
			$this->form_validation->set_rules('userfname', 'User name', 'required');
			$this->form_validation->set_rules('user_email', 'Email', 'required|valid_email|is_unique[r3_users.user_email]', array('is_unique'=>'%s is already exists.'));
			$this->form_validation->set_rules('user_pwd', 'Password', 'trim|required');
			$this->form_validation->set_rules('user_role', 'User Role', 'required');
			 if($this->form_validation->run() == FALSE){
			 	$data['roles'] = $this->user_model->get_roles();
			 	$data['title'] = 'User add';
        $data['view'] = 'admin/users/user_add';
				$this->load->view('layout', $data);
      }else{
      	//generate random string then link
      	$this->load->helper('string');
				$str_token = random_string('alnum', 10);
				$link = base_url().'auth/verify/'.$str_token;

      	$data = array(
      		'role_id' => $this->input->post('user_role'),
      		'userfname' => $this->input->post('userfname'),
      		'userlname' => $this->input->post('userlname'),
      		'user_email' => $this->input->post('user_email'),
      		'user_gender' => $this->input->post('user_gender'),
      		'user_dob' => $this->input->post('user_dob'),
      		'user_country' => $this->input->post('user_country'),
      		'user_pwd' => password_hash($this->input->post('user_pwd'), PASSWORD_BCRYPT),
      		'email_token' => $str_token,
      		'is_email_verify' => 0,
      		'created_at' => date('Y-m-d H:i:s')
      	);

      	$data = $this->security->xss_clean($data);
      	$result = $this->user_model->insert_row($data);
      	if($result){
      		//send mail for email verification
      		$to = $this->input->post('user_email');
					$subject = 'Email Verification for R3';
					$data = array(
						'user' => $this->input->post('userfname'),
						'link' => $link
					);
					$body = $this->load->view('templates/email_verification', $data, TRUE);
					sendEmail($to, $subject, $body);
					//send to success page
      		$this->session->set_flashdata('success', 'Success! User created successfully.');
					redirect(base_url('admin/users'));
      	}else{
      		$this->session->set_flashdata('warning', 'Sorry! Something went wrong.');
					redirect(base_url('admin/users'));
      	}

      }
		}else{
			$data['roles'] = $this->user_model->get_roles();
			$data['title'] = 'User add';
			$data['view'] = 'admin/users/user_add';
			$this->load->view('layout', $data);
		}
	}

	
	//----------
	public function edit_user($id)
	{
		if($this->input->post('edit')){
			$this->form_validation->set_rules('userfname', 'User name', 'required');
			$this->form_validation->set_rules('userfname', 'User name', 'required');
			//$this->form_validation->set_rules('user_email', 'Email', 'required|valid_email|is_unique[r3_users.user_email]', array('is_unique'=>'%s is already exists.'));
			//$this->form_validation->set_rules('user_pwd', 'Password', 'trim|required');
			$this->form_validation->set_rules('user_role', 'User Role', 'required');
			if($this->form_validation->run() == FALSE){
				$data['roles'] = $this->user_model->get_roles();
        $data['user'] = $this->user_model->get_row($id);
				$data['view'] = 'admin/users/user_edit';
				$this->load->view('layout', $data);
      }else{
      	$data = array(
      		'role_id' => $this->input->post('user_role'),
      		'userfname' => $this->input->post('userfname'),
      		'userlname' => $this->input->post('userlname'),
      		'user_gender' => $this->input->post('user_gender'),
      		'user_dob' => $this->input->post('user_dob'),
      		'user_country' => $this->input->post('user_country'),
      	);
      	$data = $this->security->xss_clean($data);
      	$result = $this->user_model->edit_row($data, $id);
      	if($result){
      		$this->session->set_flashdata('success', 'Success! Changes saved successfully.');
					redirect(base_url('admin/users'));
      	}else{
      		$this->session->set_flashdata('warning', 'Sorry! Something went wrong.');
					redirect(base_url('admin/user_edit/'.$id));
      	}
      }
		}else{
			$data['roles'] = $this->user_model->get_roles();
			$data['user'] = $this->user_model->get_row($id);
			$data['view'] = 'admin/users/user_edit';
			$this->load->view('layout', $data);
		}
	}

	//---------------
	public function change_password($id){
		if($this->input->post('change')){			
			$this->form_validation->set_rules('user_pwd', 'Password', 'trim|required');
			$this->form_validation->set_rules('cpass', 'Confirm Password', 'required|matches[user_pwd]');
			 if($this->form_validation->run() == FALSE){
			 	$data['roles'] = $this->user_model->get_roles();
			 	$data['user'] = $this->user_model->get_row($id);
			 	$data['title'] = 'User edit';
        $data['view'] = 'admin/users/user_edit';
				$this->load->view('layout', $data);
      }else{
      	$data = array(
      		'user_pwd' => password_hash($this->input->post('user_pwd'), PASSWORD_BCRYPT),
      	);
      	$data = $this->security->xss_clean($data);
      	$result = $this->user_model->edit_row($data, $id);
      	if($result){
      		$this->session->set_flashdata('success', 'Success! Password changed successfully.');
					redirect(base_url('admin/users/edit_user/'.$id));
      	}else{
      		$this->session->set_flashdata('warning', 'Sorry! Something went wrong.');
					redirect(base_url('admin/users/edit_user/'.$id));
      	}

      }
		}else{
			$data['roles'] = $this->user_model->get_roles();
			$data['user'] = $this->user_model->get_row($id);
			$data['title'] = 'User Edit';
			$data['view'] = 'admin/users/user_edit';
			$this->load->view('layout', $data);
		}
	}

	
	//---------------
	public function delete_user($id){
		$this->db->where('user_id', $id);
		$this->db->delete('r3_users');

		$this->session->set_flashdata('success', 'User has been deleted successfully!');
		redirect(base_url('admin/users'));
	}
	

}
