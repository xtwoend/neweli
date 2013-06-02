<?php
class Sites extends Admin_Controller {
 	
	public $module = 'admin/sites/'; 
	
 	function __construct()
	{
		parent::__construct();
		$this->load->model(array('msites','mlang'));
	}	

	function index()
	{
		if($_POST)
		{
			$emailserver = $this->input->post('sites');
			foreach ($emailserver as $key => $value) {
				$this->msites->edit($key, array('value' => $value));
			}
			redirect('admin/sites');
		}

		$data['sites'] = $this->msites->all();		
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