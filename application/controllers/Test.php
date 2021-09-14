<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

	//-----------
	public function index()
	{
		///$this->load->view('auth/login');
		//echo 'fgdgfd';
		echo base_url();
	}

	//----------
	public function test_mail(){
		$to = 'kamiya5282@mplusmail.com';
		$subject = 'Test mail';
		$body = 'Lorem ipsum';
		$email = sendEmail($to, $subject, $body);
		if ($email) {
			echo "Sent";
		}else{
			echo "error";
		}

	}

	//-----------
	public function verification_link(){
		$this->load->helper('string');
		$str = random_string('alnum', 10);
		$link = base_url().'auth/verify/'.$str;
		echo $link;
	}

	

}
