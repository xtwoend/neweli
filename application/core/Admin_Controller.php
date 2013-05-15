<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_Controller extends MY_Controller
{	
	public $data = array();

    function __construct()
    {
        parent::__construct();
        if (! $this->authentication->is_loggedin()) redirect('auth/login');        
        $this->template
    		->set_theme('admin')
    		->set_partial('head', 'partials/head')
    		->set_partial('nav', 'partials/nav')
    		->set_partial('script', 'partials/script');
    }
}