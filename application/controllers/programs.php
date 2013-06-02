<?php
class Programs extends Public_Controller {

 	function __construct()
	{
		parent::__construct();
		$this->load->model(array('page','page_lang','menu','mprogram_lang','mprograms'));
	}	

	function index()
	{	
		$data['programs'] = $this->mprogram_lang->findprograms(array('program_lang.lang'=> $this->lang->mci_current()));
		$data['content'] = $this->mprogram_lang->findcontent(array('programs.first_program'=> 1, 'program_lang.lang'=> $this->lang->mci_current() ));

		$this->template
 			->title('Prasetiya Mulya', '')
			->set_layout('main')
			->set_partial('header', 'partials/header')
			->set_partial('footer', 'partials/footer')
			->build('programs' , $data);
	}	

	public function read($id = false)
	{
		if(!$id) redirect('programs');
		$data['programs'] = $this->mprogram_lang->findprograms(array('program_lang.lang'=> $this->lang->mci_current()));
		$data['content'] = $this->mprogram_lang->findcontent(array('programs.id'=> $id));
		$this->template
 			->title('Prasetiya Mulya', '')
			->set_layout('main')
			->set_partial('header', 'partials/header')
			->set_partial('footer', 'partials/footer')
			->build('programs' , $data);
	}
}
 
/* End of file */