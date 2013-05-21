<?php
class Pages extends Admin_Controller {
 	
 	private $module = 'admin/pages/';

 	function __construct()
	{
		parent::__construct();
		$this->load->model(array('page','mlang','menu','page_lang'));
	}	

	function index()
	{
		// load language file
		$this->lang->load('about');
 		$data['i18n'] = $this->lang->mci_current();
		$data['pages'] = $this->page->all();
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

			
			$arrdata =  array(
						'menu_id' =>  $this->input->post('menu_id'),
						'parent' => $this->input->post('parent'),
						'page_name' => $this->input->post('page_name'),
						'url' => $this->input->post('url'),
						'layout' => $this->input->post('layout'),
						'is_home' =>  ($this->input->post('is_home',FALSE)) ? 1 : 0,
						'publish' => ($this->input->post('publish',FALSE)) ? 1 : 0,
						);
			$page_id = $this->page->add($arrdata);
			if($page_id)
			{
				foreach ($this->mlang->get('id, lang') as $lange) {
					
					$pagelangdata = array(
									'lang' => $lange->lang,
									'page_id' => $page_id,
									'title'	=> $this->input->post('title_'.$lange->lang),
									'subtitle' => $this->input->post('subtitle_'.$lange->lang),
									'nav_title' => $this->input->post('nav_title_'.$lange->lang),
									'meta_title' => $this->input->post('meta_title_'.$lange->lang),
									'meta_description' => $this->input->post('meta_description_'.$lange->lang),
									'meta_keywords' => $this->input->post('meta_keywords_'.$lange->lang),

						);

					$this->page_lang->add($pagelangdata);

				}
			}

			redirect('admin/pages');
			
			
		}
		$data['language'] = $this->mlang->get();
		$optionmenu = array();
		foreach ($this->menu->get('name, id') as $menu) {
			$optionmenu[$menu->id] = $menu->name; 
		}
		$optionparent = array('null'=>'/');
		foreach ($this->page->get('page_name, id') as $p) {
			$optionparent[$p->id] = $p->page_name;
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

	function edit($id=false)
	{	
		if(!$id) redirect('admin/pages');
				
		if($_POST){
			$arrdata = array(
						'menu_id' =>  $this->input->post('menu_id'),
						'parent' => $this->input->post('parent'),
						'page_name' => $this->input->post('page_name'),
						'url' => $this->input->post('url'),
						'layout' => $this->input->post('layout'),
						'is_home' =>  ($this->input->post('is_home',FALSE)) ? 1 : 0,
						'publish' => ($this->input->post('publish',FALSE)) ? 1 : 0,
					);

			$pageedit = $this->page->edit($id , $arrdata);
			if($pageedit)
			{
				foreach ($this->mlang->get('id, lang') as $lange) {
					
					$pagelangdata = array(
									'lang' => $lange->lang,
									'page_id' => $id,
									'title'	=> $this->input->post('title_'.$lange->lang),
									'subtitle' => $this->input->post('subtitle_'.$lange->lang),
									'nav_title' => $this->input->post('nav_title_'.$lange->lang),
									'meta_title' => $this->input->post('meta_title_'.$lange->lang),
									'meta_description' => $this->input->post('meta_description_'.$lange->lang),
									'meta_keywords' => $this->input->post('meta_keywords_'.$lange->lang),

						);

					$this->page_lang->saveedit($id,$lange->lang,$pagelangdata);

				}
			}
		}

		$data['pages'] = $this->page->all();
		$data['page'] = $this->page->find(array('id'=>$id));
		
		$data['language'] = $this->mlang->get();
		$optionmenu = array();
		foreach ($this->menu->get('name, id') as $menu) {
			$optionmenu[$menu->id] = $menu->name; 
		}
		$optionparent = array('null'=>'/');
		foreach ($this->page->get('page_name, id') as $p) {
			$optionparent[$p->id] = $p->page_name;
		}

		$data['optionmenus'] = $optionmenu;
		$data['optionparents'] = $optionparent;
		$data['create'] = false;
		$this->template
			->title('Prasmul Admin', 'Dashboard')
			->set_layout('main')
			->set_partial('sidebar', 'partials/sidebar')
			->set_partial('footer', 'partials/footer')
			->build($this->module. 'form', $data);
	}

	function remove($page_id=false)
	{
		if(!$page_id) redirect('admin/pages');

		$this->page->delete($page_id);
		$this->page_lang->delete($page_id,'page_id');
		redirect('admin/pages');
	}
}
 
/* End of file */