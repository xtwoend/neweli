<?php
class News extends Admin_Controller {
 	private $module  = 'admin/news/';
 	function __construct()
	{
		parent::__construct();
		$this->load->model(array('mnews','mlang','menu','news_lang'));
	}	

	function index()
	{
		// load language file
		$this->lang->load('about');
 		$data['i18n'] = $this->lang->mci_current();
 		$data['news'] = $this->mnews->all();
 		//$user_identifier = $this->session->userdata('identifier');
		
		$this->template
			->title('Prasmul Admin', 'Dashboard')
			->set_layout('main')
			->set_partial('sidebar', 'partials/sidebar')
			->set_partial('footer', 'partials/footer')
			->build($this->module.'index',$data);
	}

	function add()
	{
		if($_POST){

			print_r($_POST);
			$arrdata =  array(
						'url' 		=>  $this->input->post('url'),
						'start_date'=>  $this->input->post('start_date'),
						'end_date' 	=>  $this->input->post('end_date'),
						'fullday'	=>  ($this->input->post('fullday',FALSE)) ? 1 : 0
						);
			$news_id = $this->mnews->add($arrdata);
			
			if($news_id)
			{
				foreach ($this->mlang->get('id, lang') as $lange) {
					
					$newslangdata = array(
									'lang' => $lange->lang,
									'news_id' => $news_id,									
									'title'	=> $this->input->post('title_'.$lange->lang),
									'subtitle' => $this->input->post('subtitle_'.$lange->lang),									
									'content' => $this->input->post('content'.$lange->lang),
									'meta_title' => $this->input->post('meta_title_'.$lange->lang),
									'meta_description' => $this->input->post('meta_description_'.$lange->lang),
									'meta_keywords' => $this->input->post('meta_keywords_'.$lange->lang),

						);

					$this->news_lang->add($newslangdata);

				}
			}

			redirect('admin/news');
			
		}

		$data['language'] = $this->mlang->get();
		$optionmenu = array();
		foreach ($this->menu->get('name, id') as $menu) {
			$optionmenu[$menu->id] = $menu->name; 
		}
		$optionparent = array('null'=>'/');
		foreach ($this->mnews->get('url, id') as $p) {
			$optionparent[$p->id] = $p->title;
		}

		$data['create'] = true;
		$data['optionmenus'] = $optionmenu;
		$data['optionparents'] = $optionparent;
		$this->template
			->title('Prasmul Admin', 'Dashboard')
			->set_layout('main')
			->set_partial('sidebar', 'partials/sidebar')
			->set_partial('footer', 'partials/footer')
			->build($this->module. 'form', $data);
	}
}
 
/* End of file */