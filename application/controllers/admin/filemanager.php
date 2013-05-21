<?php
class Filemanager extends Admin_Controller {
 	
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
			->build('admin/filemanager');
	}

	function elfinder_init()
	{
		$this->load->helper('path');
		  $opts = array(
		    // 'debug' => true, 
		    'roots' => array(
		      array( 
		        'driver' => 'LocalFileSystem', 
		        'path'   => set_realpath('file'), 
		        'URL'    => site_url('file') . '/'
		        // more elFinder options here
		      ) 
		    )
		  );
		  $this->load->library('elfinder_lib', $opts);
	}

}
 
/* End of file */