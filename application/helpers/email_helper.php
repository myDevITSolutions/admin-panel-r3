<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function sendEmail($to = '', $subject  = '', $body = '', $attachment = '', $cc = '')
{
	
	$controller =& get_instance();
	$controller->load->helper('path'); 
	
	$config = array();
	$config['useragent']     = "CodeIgniter";
	$config['mailpath']      = "/usr/bin/sendmail"; // or "/usr/sbin/sendmail"
	$config['protocol']      = "smtp";
	$config['smtp_host']     = "ssl://smtp.googlemail.com";
	$config['smtp_port']     = "465";
	$config['smtp_timeout']  = '30';
	$config['smtp_user']     = "developersatmydevit@gmail.com";
	$config['smtp_pass']     = "SunLight$92";
	$config['mailtype'] 		 = 'html';
	$config['charset']  		 = 'utf-8';
	//$config['charset']  		 = 'iso-8859-1';
	$config['newline']  		 = "\r\n";
	$config['wordwrap'] 		 = TRUE;
	//$config['validation'] = FALSE;

	$controller->load->library('email');
	$controller->email->initialize($config);			
	$controller->email->from( 'developersatmydevit@gmail.com' , 'R3' );	
	$controller->email->to($to);	
	$controller->email->subject($subject);	
	$controller->email->message($body);	
	if($cc != ''){	
		$controller->email->cc($cc);
	}	
	if($attachment != ''){
		$controller->email->attach($attachment);
	}	
	if($controller->email->send()){
		return true;
	}
	else{
		show_error($controller->email->print_debugger());
	return false;
	}
}