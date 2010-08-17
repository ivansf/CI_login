<?php

class Membership_model extends Model {
	
	function validate() {
		$this->db->where('username', $this->input->post('username'));
		$this->db->where('password', md5($this->input->post('password')));
		$query = $this->db->get('membership');

		if ($query->num_rows == 1){
			return true;
		} else {
			return false;
		}
	}
	
	function user_exists($user) {
		$this->db->where('username', $user);
		$query = $this->db->get('membership');
		if ($query->num_rows >= 1)
			return true;
		return false;
	}
	
	function email_exists($email) {
		$this->db->where('email', $email);
		$query = $this->db->get('membership');
		if ($query->num_rows >= 1)
			return true;
		return false;
	}
	
}
