<?php
class Registers extends Admin_Controller {
 	
 	public $views = 'admin/registers/'; 
 	function __construct()
	{
		parent::__construct();
		$this->load->model(array('mperiode_courses','mregisters','mregister_program'));
		
	}	

	function index()
	{
		
 		$data['registers'] = $this->mregisters->all(array('participant_of'=>0));
 		//var_dump($data['registers']);
		$this->template
			->title('Prasmul Admin', 'Dashboard')
			->set_layout('main')
			->set_partial('sidebar', 'partials/sidebar')
			->set_partial('footer', 'partials/footer')
			->build($this->views.'index',$data);
	}

	function detail($register_id=false)
	{
		if(!$register_id) redirect('admin/registers');

    	$register = $this->mregisters->find(array('id'=>$register_id));

    	$partisipan = $this->mregisters->get('*',array('participant_of'=>$register_id));

    	$data['register'] = $register;
    	$data['partisipan'] = $partisipan;
    	$data['programs'] = $this->mregister_program->get('*',array('registration_id' => $register_id ));
    	$this->load->view('cetakregister',$data); 
	}
}
 
/* End of file */