<?php
class Programs extends Public_Controller {

 	function __construct()
	{
		parent::__construct();
		$this->load->model(array('page','page_lang','menu','section','section_lang','msliders','msliders_lang'));
	}	

	function index()
	{	
		
	}	
}
 
/* End of file */