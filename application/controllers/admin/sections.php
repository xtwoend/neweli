<?php
class Sections extends Admin_Controller {
 	
 	private $module  = 'admin/sections/';

 	function __construct()
	{
		parent::__construct();
		$this->load->model(array('page','mlang','section','section_lang'));
	}	

	function index()
	{
		// load language file
		$this->lang->load('about');
 		$data['i18n'] = $this->lang->mci_current();
 		$data['sections'] = $this->section->all();
 		
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
						'page_id' =>  $this->input->post('page_id'),
						'section_name' => $this->input->post('section_name'),
						'created_by' => $this->session->userdata('identifier'),
						);
			$section_id = $this->section->add($arrdata);
			if($section_id)
			{
				foreach ($this->mlang->get('id, lang') as $lange) {
					
					$sectionlangdata = array(
									'lang' => $lange->lang,
									'section_id' => $section_id,
									'title'	=> $this->input->post('title_'.$lange->lang),
									'subtitle' => $this->input->post('subtitle_'.$lange->lang),
									'content' => $this->input->post('content_'.$lange->lang)
						);

					$this->section_lang->add($sectionlangdata);

				}
			}

			redirect('admin/sections');
			
			
		}
		$data['language'] = $this->mlang->get();
		
		$optionpage = array();
		foreach ($this->page->get('page_name, id') as $p) {
			$optionpage[$p->id] = $p->page_name;
		}

		$data['create'] = true;
		$data['optionpages'] = $optionpage;
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
						'page_id' =>  $this->input->post('page_id'),
						'section_name' => $this->input->post('section_name'),
						'created_by' => $this->session->userdata('identifier'),
					);

			$edited = $this->section->edit($id , $arrdata);
			if($edited)
			{
				foreach ($this->mlang->get('id, lang') as $lange) {
					
					$sectionlangdata = array(
									'lang' => $lange->lang,
									'section_id' => $id,
									'title'	=> $this->input->post('title_'.$lange->lang),
									'subtitle' => $this->input->post('subtitle_'.$lange->lang),
									'content' => $this->input->post('content_'.$lange->lang)

						);

					$this->section_lang->saveedit($id,$lange->lang,$sectionlangdata);

				}
			}
		}

		$data['section'] = $this->section->find(array('id'=>$id));
		$data['language'] = $this->mlang->get();
		
		$optionpage = array();
		foreach ($this->page->get('page_name, id') as $p) {
			$optionpage[$p->id] = $p->page_name;
		}

		$data['create'] = false;
		$data['optionpages'] = $optionpage;
		$this->template
			->title('Prasmul Admin', 'Dashboard')
			->set_layout('main')
			->set_partial('sidebar', 'partials/sidebar')
			->set_partial('footer', 'partials/footer')
			->build($this->module. 'form', $data);
	}

	function remove($section_id=false)
	{
		if(!$section_id) redirect('admin/sections');

		$this->section->delete($section_id);
		$this->section_lang->delete($section_id,'section_id');
		redirect('admin/sections');
	}
}
 
/* End of file */