<?php
class Pages extends Public_Controller {

 	function __construct()
	{
		parent::__construct();
		$this->load->model(array('page','page_lang','menu','section','section_lang','msliders','msliders_lang'));
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

		$layout = 'notfound';
		$title = 'Prasetiya';
		$data['page'] = '';
		$page = $this->page->find(array('url' => $slug));
		if($page)
		{
			$layout = $page->layout;
			$data['page'] = $this->page_lang->find(array('page_lang.page_id' => $page->id ,'page_lang.lang' => $this->lang->mci_current() ));
			$title = $data['page']->title;
		}

 		$this->template
 			->title('Prasetiya Mulya', $title)
			->set_layout('main')
			->set_partial('header', 'partials/header')
			->set_partial('footer', 'partials/footer')
			->build($layout , $data);
	}	
}
 
/* End of file */