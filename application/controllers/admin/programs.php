<?php
class Programs extends Admin_Controller {
 	
 	private $module  = 'admin/programs/';
 	function __construct()
	{
		parent::__construct();
		$this->load->model(array('mprograms','mlang','menu','mprogram_lang'));
		$user_identifier = $this->session->userdata('identifier');
	}	

	function index()
	{
 		$data['programs'] = $this->mprograms->all(array(), array('id' => 'desc'));
 		
		
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
						'program'	=>  $this->input->post('program'),
						'price'		=>  $this->input->post('price'),
						'url'		=>  $this->input->post('url'),
						'parent' 	=>  $this->input->post('parent'),
						'first_program'	=>  ($this->input->post('first_program',FALSE)) ? 1 : 0
						);

			$program_id = $this->mprograms->add($arrdata);
			
			if($program_id)
			{
				foreach ($this->mlang->get('id, lang') as $lange) {
	
					$newslangdata = array(
									'lang' => $lange->lang,									
									'program_id' => $program_id,									
									'program_name'	=> $this->input->post('program_name_'.$lange->lang),
									'content' => $this->input->post('content_'.$lange->lang),																		
						);

					$this->news_lang->add($newslangdata);
				}
			}
			redirect('admin/programs');
			
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

}
 
/* End of file */