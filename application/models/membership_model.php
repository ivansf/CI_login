<?php
/**
 * Created by PhpStorm.
 * User: ivan
 * Date: Aug 8, 2010
 * Time: 1:17:50 PM
 */

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
}
