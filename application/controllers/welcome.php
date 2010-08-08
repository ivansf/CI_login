<?php

class Welcome extends Controller {

	function Welcome() {
		parent::Controller();	
	}
	
	function index()
	{
		$this->load->helper('form');

		$this->load->view('header');
		$username = $this->session->userdata('username');
		if ($username) {
			$this->load->view('welcome_logged');
		} else {
			$this->load->view('welcome_login');
			
		}

		$this->load->view('footer');
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */