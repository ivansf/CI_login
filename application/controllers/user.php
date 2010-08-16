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
		
		$error = $this->session->userdata('error');
		if ($error != "")
			$data['error'] = $error;
		
		$this->session->unset_userdata('error');
		$data['title'] = "User registration page";
		$this->load->view('user/register', $data);
	}
	
	/**
	* Validates registration. If the submission is correct, it should create the user
	* and tag it as non-active.
	*
	* @return void
	*/
	function register_validate(){
		$this->load->model('membership_model');
		
		// validating the email
		if($this->membership_model->userExists($this->input->post('email'))){
			$data['error'] = "Email already been used.";
			$this->session->set_userdata($data);
		}
		
		// making sure passwords match
		if ($this->input->post('password') != $this->input->post('password2')){
			$data['error'] = "Passwords won't match";
			$this->session->set_userdata($data);
		}
		
		if (!isset($data['error'])) {
			redirect('user/created');
		}
		redirect('user/register');
		
	}
	

}
