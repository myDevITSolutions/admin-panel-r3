<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Auth_model extends CI_Model{
	
	
	public function login($data){
		$query = $this->db->get_where('r3_users', array('user_email' => $data['email']));
		if ($query->num_rows() == 0){
			return false;
		}else{
			//Compare the password attempt with the password we have stored.
			$result = $query->row_array();
			$validPassword = password_verify($data['password'], $result['user_pwd']);
			if($validPassword){
				return $result = $query->row_array();
			}else{
				return false;
			}			
		}
	}

	//--------------------------------------------------------------------
	public function email_verification($code){
		$this->db->select('user_email, email_token');
		$this->db->from('r3_users');
		$this->db->where('email_token', $code);
		$query = $this->db->get();
		$result= $query->result_array();
		$match = count($result);
		if($match > 0){
			$this->db->where('email_token', $code);
			$this->db->update('r3_users', array('is_email_verify' => 1, 'email_token'=> ''));
			return true;
		}
		else{
			return false;
			}
	}

/*
	public function mail_exists($email){
		$query = $this->db->get_where('ebc_users', array('user_email' => $email));
		$num_results=$query->row_array();
		
		if($num_results>=0){
			return $num_results;
		}else{
			return false;
		}
		
	}


	public function update_reset_code($pwd_reset_code,$user_id){
		$data = array(
			'forgot_password_token'=>$pwd_reset_code
		);

		$cond = "user_id='$user_id'";
		$this->db->set($data);
		$this->db->where($cond);
		$this->db->update('ebc_users');
		if($this->db->affected_rows() >=0):
			return true;
		else:
			return false;
		endif;	
		
	}
	*/
	
}