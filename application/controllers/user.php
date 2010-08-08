<?php

class User extends Controller {

	function index() {
		
		$this->load->view('welcome_message');
	}

	function validate() {

		$this->load->model('membership_model');
		$query = $this->membership_model->validate();
		if ($query) {
			$data = array(
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password')
			);
			$this->session->set_userdata($data);
			redirect('welcome');
		} else {
			redirect('welcome');
		}
	}

	function logout() {
		$this->session->sess_destroy();
		$this->index();
		redirect('welcome');
	}

}
