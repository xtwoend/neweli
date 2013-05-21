<?php
class Filemanager extends Admin_Controller {
 	
 	function __construct()
	{
		parent::__construct();
	}	

	function index()
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