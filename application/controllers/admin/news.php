<?php
class News extends Admin_Controller {
 	
	private $module  = 'admin/news/';
 	
	function __construct()
	{
		parent::__construct();
		$this->load->model(array('mnews','mlang','menu','news_lang'));
		$user_identifier = $this->session->userdata('identifier');
	}	

	function index()
	{
		// load language file
		$this->lang->load('about');
 		$data['i18n'] = $this->lang->mci_current();
 		$data['news'] = $this->mnews->all(array(), array('id' => 'desc'));
 		
		
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
						'news_title'	=>  $this->input->post('news_title'),
						'start_date'	=>  $this->input->post('start_date'),
						'end_date' 		=>  $this->input->post('end_date'),
						'fullday'		=>  ($this->input->post('fullday',FALSE)) ? 1 : 0,
						'user_id'		=>  $user_identifier
						);
			$news_id = $this->mnews->add($arrdata);
			
			if($news_id)
			{
				foreach ($this->mlang->get('id, lang') as $lange) {
					
					$newslangdata = array(
									'lang' => $lange->lang,									
									'news_id' => $news_id,	
									'url' 		=>  $this->input->post('url_'.$lange->lang),									
									'title'	=> $this->input->post('article_title_'.$lange->lang),
									'subtitle' => $this->input->post('sub_article_'.$lange->lang),									
									'content' => $this->input->post('content_'.$lange->lang),
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

		$data['create'] = true;
		$this->template
			->title('Prasmul Admin', 'Dashboard')
			->set_layout('main')
			->set_partial('sidebar', 'partials/sidebar')
			->set_partial('footer', 'partials/footer')
			->build($this->module. 'form', $data);
	}
	
	function edit($id=false)
	{	
		if(!$id) redirect('admin/news');
		
		if($_POST){
			$arrdata =  array(						
						'news_title'=>  $this->input->post('news_title'),
						'start_date'=>  $this->input->post('start_date'),
						'end_date' 	=>  $this->input->post('end_date'),
						'fullday'	=>  ($this->input->post('fullday',FALSE)) ? 1 : 0
						);

			$edited = $this->mnews->edit($id , $arrdata );
			foreach ($this->mlang->get('id, lang') as $lange) {
				
					$newslangdata = array(									
									'url' 		=>  $this->input->post('url_'.$lange->lang),									
									'title'	=> $this->input->post('article_title_'.$lange->lang),
									'subtitle' => $this->input->post('sub_article_'.$lange->lang),									
									'content' => $this->input->post('content_'.$lange->lang),
									'meta_title' => $this->input->post('meta_title_'.$lange->lang),
									'meta_description' => $this->input->post('meta_description_'.$lange->lang),
									'meta_keywords' => $this->input->post('meta_keywords_'.$lange->lang),

						);

					$this->news_lang->edit($id ,$newslangdata, 'news_id', array('lang' => $lange->lang));

				}
			
			if($edited){
				$this->session->set_flashdata('message', 'menu berhasil di ubah!');
			}else{
				$this->session->set_flashdata('message', 'menu gagal di ubah!');
			}
			
			redirect('admin/news');
		}

		$data['news'] = $this->mnews->find(array('id'=>$id));
		$data['news_all'] = $this->mnews->findnews(array('id'=>$id));
		$data['language'] = $this->mlang->get();
		
		$data['create'] = false;
		$this->template
			->title('Prasmul Admin', 'Dashboard')
			->set_layout('main')
			->set_partial('sidebar', 'partials/sidebar')
			->set_partial('footer', 'partials/footer')
			->build($this->module. 'form', $data);
	}
	
	function remove($id=false)
	{

		if($this->mnews->delete($id))
		{	
			$this->session->set_flashdata('message', 'News/Events berhasil di hapus!');
			
		}else{
			$this->session->set_flashdata('message', 'News/Events gagal di hapus!');
		}
		redirect('admin/news');
	}
}
 
/* End of file */