<?php
class Posts extends Admin_Controller {
 	
	private $module  = 'admin/posts/';
 	
	function __construct()
	{
		parent::__construct();
		$this->load->model(array('mposts','mlang','menu','post_lang'));
		$user_identifier = $this->session->userdata('identifier');
	}	

	function index()
	{
 		$data['posts'] = $this->mposts->all(array(), array('id' => 'desc'));
 		
		
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
						'post_name'	=>  $this->input->post('post_name'),
						'url'	=>  $this->input->post('url'),
						'created_by' 		=>  $this->session->userdata('identifier'),
						'created_at'		=>  date('Y-m-d H:i:s'),
						'img_src'		=>  $image['file_name'],
						);
			$post_id = $this->mposts->add($arrdata);
			
			if($post_id)
			{
				foreach ($this->mlang->get('id, lang') as $lange) {
					
					$newslangdata = array(
									'lang' => $lange->lang,									
									'post_id' => $post_id,									
									'title'	=> $this->input->post('article_title_'.$lange->lang),
									'subtitle' => $this->input->post('sub_article_'.$lange->lang),									
									'content' => $this->input->post('content_'.$lange->lang),
									'meta_title' => $this->input->post('meta_title_'.$lange->lang),
									'meta_description' => $this->input->post('meta_description_'.$lange->lang),
									'meta_keywords' => $this->input->post('meta_keywords_'.$lange->lang),
									
						);

					$this->post_lang->add($newslangdata);

				}
			}

			redirect('admin/posts');
			
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
						'post_name'	=>  $this->input->post('post_name'),
						'url'	=>  $this->input->post('url'),
						//'created_by' 		=>  $this->session->userdata('identifier'),
						'updated_at'		=>  date('Y-m-d H:i:s'),
						);

			$edited = $this->mposts->edit($id , ($arrdata + $imagearray) );

			foreach ($this->mlang->get('id, lang') as $lange) {
				
					$newslangdata = array(														
									'title'	=> $this->input->post('article_title_'.$lange->lang),
									'subtitle' => $this->input->post('sub_article_'.$lange->lang),									
									'content' => $this->input->post('content_'.$lange->lang),
									'meta_title' => $this->input->post('meta_title_'.$lange->lang),
									'meta_description' => $this->input->post('meta_description_'.$lange->lang),
									'meta_keywords' => $this->input->post('meta_keywords_'.$lange->lang),

						);

					$this->post_lang->edit($id ,$newslangdata, 'post_id', array('lang' => $lange->lang));

				}
			
			if($edited){
				$this->session->set_flashdata('message', 'menu berhasil di ubah!');
			}else{
				$this->session->set_flashdata('message', 'menu gagal di ubah!');
			}
			
			redirect('admin/posts');
		}

		$data['news'] = $this->mposts->find(array('id'=>$id));
		$data['news_all'] = $this->mposts->findpost(array('id'=>$id));
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

		if($this->mposts->delete($id))
		{	
			$this->post_lang->delete($id,'post_id');
			$this->session->set_flashdata('message', 'Posting berhasil di hapus!');
			
		}else{
			$this->session->set_flashdata('message', 'Posting gagal di hapus!');
		}
		redirect('admin/posts');
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