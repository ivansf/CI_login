<?php

class Welcome extends Controller {

	function Welcome() {
		parent::Controller();	
	}
	
	function index()
	{
		//$data['username'] = $this->session->userdata('username');
		// if ($data['username']) {
		// 	$this->load->view('welcome_logged', $data);
		// } else {
		// 	$this->load->view('welcome_login');
		// }
		return 'HOLA!!!';
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */