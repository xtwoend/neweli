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
									'url'	=> $this->input->post('url_'.$lange->lang),
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
		foreach ($this->page->get('title, id') as $p) {
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

	function edit($id=false)
	{	
		if(!$id) redirect('admin/pages');
				
		if($_POST){
			$arrdata = array(
					'name' => $this->input->post('name'),
					'layout' => $this->input->post('layout'),
					'ordering' => $this->input->post('ordering'),
					);

			$edited = $this->menu->edit($id , $arrdata );
			if($edited){
				$this->session->set_flashdata('message', 'menu berhasil di ubah!');
			}else{
				$this->session->set_flashdata('message', 'menu gagal di ubah!');
			}
			
			redirect('admin/menus');
		}

		$data['pages'] = $this->page->all();
		$data['page'] = $this->page->find(array('id'=>$id));
		$data['language'] = $this->mlang->get();
		$optionmenu = array();
		foreach ($this->menu->get('name, id') as $menu) {
			$optionmenu[$menu->id] = $menu->name; 
		}
		$optionparent = array('null'=>'/');
		foreach ($this->page->get('title, id') as $p) {
			$optionparent[$p->id] = $p->title;
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
}
 
/* End of file */