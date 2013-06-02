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
			
			$image = $this->do_upload();
			$arrdata =  array(						
						'news_title'	=>  $this->input->post('news_title'),
						'url'			=>  $this->input->post('url'),
						'start_date'	=>  $this->input->post('start_date'),
						'end_date' 		=>  $this->input->post('end_date'),
						'fullday'		=>  ($this->input->post('fullday',FALSE)) ? 1 : 0,
						'user_id'		=>  $this->session->userdata('identifier'),
						'img_src'		=>  $image['file_name'],
						);
			$news_id = $this->mnews->add($arrdata);
			
			if($news_id)
			{	
				foreach ($this->mlang->get('id, lang') as $lange) {
					
					$newslangdata = array(
									'lang' => $lange->lang,									
									'news_id' => $news_id,									
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

			//redirect('admin/news');
			
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
			$imagearray = array();
			if(isset($_FILES['newsimage']['name']))
			{
				$image = $this->do_upload();
				$imagearray = array('img_src'	=>  $image['file_name']);
			}

			$arrdata =  array(						
						'news_title'=>  $this->input->post('news_title'),
						'url'		=>  $this->input->post('url'),
						'start_date'=>  $this->input->post('start_date'),
						'end_date' 	=>  $this->input->post('end_date'),
						'fullday'	=>  ($this->input->post('fullday',FALSE)) ? 1 : 0,
						'user_id'		=>  $this->session->userdata('identifier'),
						
						);

			$edited = $this->mnews->edit($id , ($arrdata + $imagearray) );
			foreach ($this->mlang->get('id, lang') as $lange) {
				
					$newslangdata = array(																	
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
				$this->session->set_flashdata('message', 'News/Events berhasil di ubah!');
			}else{
				$this->session->set_flashdata('message', 'News/Events gagal di ubah!');
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
			$this->news_lang->delete($id, 'news_id');
			$this->session->set_flashdata('message', 'News/Events berhasil di hapus!');
			
		}else{
			$this->session->set_flashdata('message', 'News/Events gagal di hapus!');
		}
		redirect('admin/news');
	}


	function do_upload(){

	        // Load the library - no config specified here
	        $this->load->library('upload');
	 		
	 		$datareturn  = array();
	        // Check if there was a file uploaded - there are other ways to
	        // check this such as checking the 'error' for the file - if error
	        // is 0, you are good to code
	       	if (isset($_FILES['newsimage']['name']))
		        {
		            // Specify configuration for File 1
		            $config['upload_path'] = 'file/image/';
		            $config['allowed_types'] = 'gif|jpg|png';
		            $config['max_size'] = '1000';
		            $config['max_width']  = '1024';
		            $config['max_height']  = '1024';       
		 			$config['encrypt_name'] = true;   
		            // Initialize config for File 1
		            $this->upload->initialize($config);
		 
		            // Upload file 1
		            if ($this->upload->do_upload('newsimage'))
		            {
		                $datareturn = $this->upload->data();
		            }
		            else
		            {
		                $datareturn = $this->upload->data();
		            }
		        }
	    	
	    return $datareturn;
	}	
}
 
/* End of file */