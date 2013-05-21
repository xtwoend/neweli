<?php
class Sliders extends Admin_Controller {

	public $module = 'admin/sliders/'; 
 	
 	function __construct()
	{
		parent::__construct();
		$this->load->model(array('msliders','mlang','msliders_lang'));
	}	

	function index()
	{
		// load language file
		$this->lang->load('about');
 		$data['i18n'] = $this->lang->mci_current();
		$data['sliders'] = $this->msliders->all(array(), array('id' => 'desc'));
 		$user_identifier = $this->session->userdata('identifier');
		
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
						'title'			=> ($this->input->post('title_en')) ? $this->input->post('title_en') : $this->input->post('title_in'),		
						'expired_at'	=>  $this->input->post('expired_at'),				
						'created_at'	=>  date('Y-m-d H:i:s'),				
						//'never_exp'		=>  ($this->input->post('never_exp' ,FALSE)) ? 1 : 0,
						);
			
			$slide_id = $this->msliders->add($arrdata);
			
			if($slide_id){
				$this->session->set_flashdata('message', 'Image berhasil di tambah!');
			}else{
				$this->session->set_flashdata('message', 'Image gagal di tambah!');
			}
			
			if($slide_id)
			{
				$image = $this->do_upload();
				
				foreach ($this->mlang->get('id, lang') as $lange) {
					$imagepost = array();
					
					if($image){
						$imagename = $image['banner_'.$lange->lang];
						$imagepost = array(
							'img_src' => $imagename
						);
					}
					$newslangdata = array(
									'lang' => $lange->lang,									
									'slide_id' => $slide_id,	
									'link' 		=>  $this->input->post('link_'.$lange->lang),									
									'title'	=> $this->input->post('title_'.$lange->lang),
										
						);
					$adddata = $imagepost + $newslangdata;
					$this->msliders_lang->add($adddata);

				}
			}
			
			redirect('admin/sliders');
			
		}

		$data['language'] = $this->mlang->get();

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
		if(!$id) redirect('admin/sliders');
		
		if($_POST){
			$arrdata =  array(						
						'title'			=> ($this->input->post('title_en')) ? $this->input->post('title_en') : $this->input->post('title_in'),		
						'expired_at'	=>  $this->input->post('expired_at'),				
						'updated_at'	=>  date('Y-m-d H:i:s'),	
						);

			$edited = $this->msliders->edit($id , $arrdata );
			
			if($edited){

				$image = $this->do_upload();
				
				foreach ($this->mlang->get('id, lang') as $lange) {
					$imagepost = array();
					
					if (!empty($_FILES['banner_'.$lange->lang]['name']))
		        	{
						$imagename = $image['banner_'.$lange->lang];
						$imagepost = array(
							'img_src' => $imagename
						);
					}
					$newslangdata = array(
									'lang' => $lange->lang,									
									'slide_id' => $id,	
									'link' 		=>  $this->input->post('link_'.$lange->lang),									
									'title'	=> $this->input->post('title_'.$lange->lang),
										
						);
					$adddata = $imagepost + $newslangdata;
					$this->msliders_lang->edit($id, $adddata, 'slide_id', array('lang' => $lange->lang));

				}

				$this->session->set_flashdata('message', 'Image berhasil di ubah!');
			}else{
				$this->session->set_flashdata('message', 'Image gagal di ubah!');
			}
			redirect('admin/sliders');
		}

		$data['slide'] = $this->msliders->find(array('id'=>$id));
		$data['slide_all'] = $this->msliders->findsliders(array('id'=>$id));
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

		if($this->msliders->delete($id))
		{	
			$this->msliders_lang->delete($id,'slide_id');
			$this->session->set_flashdata('message', 'Image berhasil di hapus!');
			
		}else{
			$this->session->set_flashdata('message', 'Image gagal di hapus!');
		}
		redirect('admin/sliders');
	}
	
	function do_upload(){

	        // Load the library - no config specified here
	        $this->load->library('upload');
	 		
	 		$datareturn  = array();
	        // Check if there was a file uploaded - there are other ways to
	        // check this such as checking the 'error' for the file - if error
	        // is 0, you are good to code
	        foreach ($this->mlang->get('id, lang') as $lange) {

	        	if (!empty($_FILES['banner_'.$lange->lang]['name']))
		        {
		            // Specify configuration for File 1
		            $config['upload_path'] = 'file/banners/'.$lange->lang;
		            $config['allowed_types'] = 'gif|jpg|png';
		            $config['max_size'] = '1000';
		            $config['max_width']  = '1024';
		            $config['max_height']  = '1024';       
		 
		            // Initialize config for File 1
		            $this->upload->initialize($config);
		 
		            // Upload file 1
		            if ($this->upload->do_upload('banner_'.$lange->lang))
		            {
		                $data = $this->upload->data();
		                $datareturnnew = array('banner_'.$lange->lang => $data['file_name'] ); 
		                $datareturn = $datareturn + $datareturnnew;
		            }
		            else
		            {
		                return false;
		            }
		        }
	        }
	    return $datareturn;
	}	
}
 
/* End of file */