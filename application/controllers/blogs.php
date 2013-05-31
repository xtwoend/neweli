<?php
class Blogs extends Public_Controller {

 	function __construct()
	{
		parent::__construct();
		$this->load->model(array('post_lang','mposts','page','page_lang','menu','section','section_lang','msliders','msliders_lang'));
		$this->load->helper('text');
	}	

	function index()
	{	
		$data['posts']= $this->post_lang->postgets('*',array('lang'=>$this->lang->mci_current()),array(),0,10);
		$title = '';
		
 		$this->template
 			->title('Prasetiya Mulya', $title)
			->set_layout('main')
			->set_partial('header', 'partials/header')
			->set_partial('footer', 'partials/footer')
			->build('blog' , $data);
	}	

	function read($slug=false)
	{
		if(!$slug) redirect('blogs');

		$posting = $this->post_lang->postfind(array('url'=>$slug, 'lang'=>$this->lang->mci_current() ));
		if(!$posting)  redirect('blogs');
		$data['posts']= $this->post_lang->postgets('*',array('lang'=>$this->lang->mci_current()),array(),0,10);
		$data['read'] = $posting;

		$this->template
 			->title('Prasetiya Mulya', $posting->post_name )
			->set_layout('main')
			->set_partial('header', 'partials/header')
			->set_partial('footer', 'partials/footer')
			->build('readblogs' , $data);
	}
}
 
/* End of file */