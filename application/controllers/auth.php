<?php
class Auth extends CI_Controller {
 	
 	function __construct()
	{
		parent::__construct();
		
		$this->template
        		->set_theme('admin')
        		->set_partial('head', 'partials/head')
        		->set_partial('nav', 'partials/nav')
        		->set_partial('script', 'partials/script');
	}	

	function login()
	{	
		if($this->authentication->is_loggedin()) redirect('admin/dashboard');
		
		if($_POST)
		{
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			
			if ($this->authentication->login($username, $password))
			{
			    redirect('admin/dashboard');			    	
			} else {
			   	redirect('auth/login');
			}
			

		}

		$this->template
			->set_layout('main')
			->build('login');
	}

	function logout()
	{
		$this->authentication->logout();
		redirect('auth/login');
	}
	
}
 
/* End of file */