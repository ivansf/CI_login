<?php

/**
 * User controller:
 * 
 * - index - Not used, redirects to site root.
 * - logout - logs out the user and redirects to site root.
 * - validate_json: Tries to let the user login and creates the session cookie.
 * - register: Renders the registration form.
 * - register_validate: Tries to validate the registration. If fails, redirects to register()
 */


class User extends Controller {

	function index() {
		redirect('/');
	}

	/**
	* Removes the session and redirects to the homepage.
	*
	* @return void
	*/
	function logout() {
		$this->session->sess_destroy();
		$this->index();
		redirect('/');
	}
	
	/**
	* validate_json function
	*
	* @return json encoded array
	*/
	function validate_json() {
		$this->load->model('membership_model');
		$response = array();
		$query = $this->membership_model->validate();
		if ($query) {
			$data = array(
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password')
			);
			$this->session->set_userdata($data);
			$response['user'] = $data;
			$response['username'] = $this->input->post('username');
			$response['logged'] = true;
			print json_encode($response);
		} else {
			$response['logged'] = false;
			print json_encode($response);
		}
	}
	
	/**
	* Register page for creating a new account.
	*
	* @return void
	* @author  Ivan
	*/
	function register() {
		
		$this->load->library('form_validation');
		$data['title'] = "User registration page";
		
		// validation rules
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[4]|max_length[20]|callback_user_check');
		$this->form_validation->set_rules('password', 'Password', 'required|matches[password2]|min_length[4]|max_length[20]');
		$this->form_validation->set_rules('password2', 'password confirmation', 'required');
		$this->form_validation->set_rules('email', 'E-mail', 'required|callback_email_check');
		
		
		if ($this->form_validation->run() == FALSE) {
			// validation fails, we display the form again with errors.
			$this->load->view('user/register', $data);
		} else {
			$this->load->view('user/created', $data);
		}
					
	}
	
	/**
	* Checks if a user exists with the provided username
	*
	* @return boolean
	*/
	function user_check($str) {
		$this->load->model('membership_model');
		if ($this->membership_model->user_exists($str)) {
			$this->form_validation->set_message('user_check', 'Username is already in use.');
			return false;
		} else {
			return true;
		}
	}

	/**
	* Checks if a user exists with the provided email address
	*
	* @return boolean
	*/
	function email_check($str) {
		$this->load->model('membership_model');
		if ($this->membership_model->email_exists($str)) {
			$this->form_validation->set_message('email_check', 'Email is already in use.');
			return false;
		} else {
			return true;
		}
	}
}
