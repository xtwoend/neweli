<?php
class Users extends Admin_Controller {
 	
 	function __construct()
	{
		parent::__construct();
		
	}	

	function index()
	{
		// load language file
		$this->lang->load('about');
 		$data['i18n'] = $this->lang->mci_current();

 		$user_identifier = $this->session->userdata('identifier');
		
		$this->template
			->title('Prasmul Admin', 'Dashboard')
			->set_layout('main')
			->set_partial('sidebar', 'partials/sidebar')
			->set_partial('footer', 'partials/footer')
			->build('admin/dashboard');
	}

	function changepassword()
	{
		# code...
	}

	function createuser(){

	}

	function deleteuser()
	{
		# code...
	}

	function edituser()
	{
		# code...
	}
}
 
/* End of file */