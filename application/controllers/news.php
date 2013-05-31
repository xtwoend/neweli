<?php
class News extends Public_Controller {

 	function __construct()
	{
		parent::__construct();
		$this->load->model(array('news_lang','mnews','page','page_lang','menu','section','section_lang','msliders','msliders_lang'));
		$this->load->helper('text');
	}	

	function index()
	{	
		$data['news']= $this->news_lang->newsgets('*',array('lang'=>$this->lang->mci_current()),array('start_date'=>'desc'),0,10);
		$title = '';
		
 		$this->template
 			->title('Prasetiya Mulya', $title)
			->set_layout('main')
			->set_partial('header', 'partials/header')
			->set_partial('footer', 'partials/footer')
			->build('news' , $data);
	}	

	function read($slug=false)
	{
		if(!$slug) redirect('news');

		$newsdata = $this->news_lang->newsfind(array('url'=>$slug, 'lang'=>$this->lang->mci_current()));
		if(!$newsdata)  redirect('news');
		$data['news']= $this->news_lang->newsgets('*',array('lang'=>$this->lang->mci_current()),array('start_date'=>'desc'),0,10);
		$data['read'] = $newsdata;


		$this->template
 			->title('Prasetiya Mulya', $newsdata->title )
			->set_layout('main')
			->set_partial('header', 'partials/header')
			->set_partial('footer', 'partials/footer')
			->build('readnews' , $data);
	}
}
 
/* End of file */