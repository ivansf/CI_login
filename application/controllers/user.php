<?php

class User extends Controller {

	function index() {
		$this->load->view('welcome_message');
	}

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

	function logout() {
		$this->session->sess_destroy();
		$this->index();
		redirect('welcome');
	}

}
