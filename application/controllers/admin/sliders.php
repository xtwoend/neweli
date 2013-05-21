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
						// 'url'			=>  $this->input->post('link'),
						//'never_exp'		=>  ($this->input->post('expired_at')) ? 0 : 1,				
						'expired_at'	=>  $this->input->post('expired_at'),				
						'created_at'	=>  date('Y-m-d H:i:s'),				
						'never_exp'		=>  ($this->input->post('fullday',FALSE)) ? 1 : 0,
						);
			
			$slide_id = $this->msliders->add($arrdata);
			
			if($slide_id){
				$this->session->set_flashdata('message', 'Image berhasil di tambah!');
			}else{
				$this->session->set_flashdata('message', 'Image gagal di tambah!');
			}
			
			if($slide_id)
			{
				foreach ($this->mlang->get('id, lang') as $lange) {
					
					$newslangdata = array(
									'lang' => $lange->lang,									
									'slide_id' => $slide_id,	
									'link' 		=>  $this->input->post('link_'.$lange->lang),									
									'title'	=> $this->input->post('title_'.$lange->lang),	
						);
					
					$this->msliders_lang->add($newslangdata);

				}
			}
			
			$this->do_upload();

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
						// 'url'			=>  $this->input->post('link'),
						'never_exp'		=>  ($this->input->post('expired_at')) ? 0 : 1,				
						'expired_at'	=>  $this->input->post('expired_at'),				
						'updated_at'	=>  date('Y-m-d H:i:s'),				
						'never_exp'		=>  ($this->input->post('fullday',FALSE)) ? 1 : 0,
						);

			$edited = $this->msliders->edit($id , $arrdata );
			
			foreach ($this->mlang->get('id, lang') as $lange) {
				
					$newslangdata = array(									
									'lang' => $lange->lang,	
									'link' 		=>  $this->input->post('link_'.$lange->lang),									
									'title'	=> $this->input->post('title_'.$lange->lang),	

						);

					$this->msliders_lang->edit($id ,$newslangdata, 'slide_id', array('lang' => $lange->lang));

				}
			
			if($edited){
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
			$this->session->set_flashdata('message', 'Image berhasil di hapus!');
			
		}else{
			$this->session->set_flashdata('message', 'Image gagal di hapus!');
		}
		redirect('admin/sliders');
	}
	
	function do_upload(){
        $config['upload_path'] = base_url().'uploads/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size']    = '10000';
        $config['max_width']  = '1024';
        $config['max_height']  = '768';
        $this->load->library('upload', $config);
			if ( ! $this->upload->do_upload())
            {
				$error = array('error' => $this->upload->display_errors());				
				// $this->load->view('form2', $error);
            }else{
                $data = array('upload_data' => $this->upload->data());
                // $this->load->view('upload_success', $data);
            }
 
        }
}
 
/* End of file */