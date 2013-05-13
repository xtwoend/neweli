<?php
class Pages extends Public_Controller {

 	function __construct()
	{
		parent::__construct();
		$this->load->model('page');
	}	

	function index()
	{
		$arr = $this->uri->segment_array();
		$slug = $this->uri->segment(1);
		if(in_array($this->lang->mci_current(), $arr))
		{
			$slug = $this->uri->segment(2);
		}

		if($slug == ''){
			$slug = 'home';
		}

		$data['page'] = $this->page->find(array('page_lang.url' => $slug ,'page_lang.lang' => $this->lang->mci_current() ));
 		
 		if(!$data['page']){
 			show_404();
 		}

 		$this->template
			->set_layout('main')
			->build('page', $data);		
	}	
}
 
/* End of file */