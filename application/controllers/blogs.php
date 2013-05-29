<?php
class Blogs extends Public_Controller {

 	function __construct()
	{
		parent::__construct();
		$this->load->model(array('page','page_lang','menu','section','section_lang','msliders','msliders_lang'));
	}	

	function index()
	{	
		
	}	

	function read($id=false,$slug='')
	{
		if(!$id) redirect('what-they-say');
		
	}
}
 
/* End of file */