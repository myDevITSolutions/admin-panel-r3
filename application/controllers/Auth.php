<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct(){
		parent::__construct();
		//$this->load->library('mailer');
		$this->load->model('auth_model', 'auth_model');
		//$this->load->helper('cookie');
	}

	//-----------
	public function index()
	{
		if($this->session->has_userdata('is_admin_login')){
			redirect('admin/dashboard');
		}else{
			redirect('auth/login');
		}
	}

	//----------
	public function login()
	{
		if($this->input->post('login')){
			$this->form_validation->set_rules('email', 'Username', 'trim|required|valid_email');
      $this->form_validation->set_rules('password', 'Password', 'required');
      if ($this->form_validation->run() == FALSE){
        $this->load->view('auth/login');
      }else{
      	$data = array(
					'email' => $this->input->post('email'),
					'password' => $this->input->post('password')
				);
				$data = $this->security->xss_clean($data);
				$result = $this->auth_model->login($data);
				if($result){
					if($result['is_email_verify'] == 0){
						$this->session->set_flashdata('warning', 'Please verify your email address!');
						redirect(base_url('auth/login'));
						exit;
					}
					if($result['role_id'] == 1){
						$admin_data = array(
							'user_id' => $result['user_id'],
							'role_id' => $result['role_id'],
							'userfname' => $result['userfname'],
							'is_admin_login' => TRUE
						);
						$this->session->set_userdata($admin_data);
						redirect(base_url('admin/dashboard'), 'refresh');
					}
				}else{
					$this->session->set_flashdata('warning', 'Sorry! Email or Password may be wrong.');
					redirect(base_url('auth/login'));
				}
      }
		}else{
			$this->load->view('auth/login');
		}
	}

	//----------------------------------------------------------	
	public function verify(){
		$verification_id = $this->uri->segment(3);
		$result = $this->auth_model->email_verification($verification_id);
		if($result){
			//$this->session->set_flashdata('success', 'Your email has been verified.');
			//redirect(base_url('auth/login'));
			echo "Your email has been verified succesfully";
		}
		else{
			$this->session->set_flashdata('success', 'The url is either invalid or you already have activated your account.');	
			redirect(base_url('auth/login'));
		}	
	}
	

	//-------------------------------------------------------------------------
	public function logout(){		
		//session_destroy();
		$this->session->sess_destroy();
		redirect(base_url('auth'), 'refresh');
	}

}
