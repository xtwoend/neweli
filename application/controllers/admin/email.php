<?php
class Email extends Admin_Controller {

	private $module  = 'admin/email/';
 	
 	function __construct()
	{
		parent::__construct();
		$this->load->model(array('memail','mlang'));
	}	

	function index()
	{
		if($_POST)
		{
			$emailserver = $this->input->post('sites');
			foreach ($emailserver as $key => $value) {
				$this->memail->edit($key, array('value' => $value));
			}
			redirect('admin/email');
		}
		// load language file
		$data['sites'] = $this->memail->all();		
 		$data['create'] = false;	
		
 		$this->template
			->title('Prasmul Admin', 'Dashboard')
			->set_layout('main')
			->set_partial('sidebar', 'partials/sidebar')
			->set_partial('footer', 'partials/footer')
			->build($this->module.'index',$data);
	}
}
 
/* End of file */