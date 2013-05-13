<?php
class Menus extends Admin_Controller {
 	
 	private $module  = 'admin/menus/';
 	
 	function __construct()
	{
		parent::__construct();
		$this->load->model('menu');
	}	

	function index()
	{	
		$data['menus'] = $this->menu->all();

		$this->template
			->title('Prasmul Admin', 'Dashboard')
			->set_layout('main')
			->set_partial('sidebar', 'partials/sidebar')
			->set_partial('footer', 'partials/footer')
			->build($this->module. 'index', $data);
	}

	function add()
	{
		if($_POST){
			$arrdata = array(
					'name' => $this->input->post('name'),
					'layout' => $this->input->post('layout'),
					'ordering' => $this->input->post('ordering'),
					);
			$this->menu->add($arrdata);
			$this->session->set_flashdata('message', 'menu berhasil di tambahkan!');
			redirect('admin/menus');
		}

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
		if(!$id) redirect('admin/menus');
				
		if($_POST){
			$arrdata = array(
					'name' => $this->input->post('name'),
					'layout' => $this->input->post('layout'),
					'ordering' => $this->input->post('ordering'),
					);

			$edited = $this->menu->edit($id , $arrdata );
			if($edited){
				$this->session->set_flashdata('message', 'menu berhasil di ubah!');
			}else{
				$this->session->set_flashdata('message', 'menu gagal di ubah!');
			}
			
			redirect('admin/menus');
		}
		$data['menu'] = $this->menu->find(array('id'=>$id));
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

		// Delete user
		if($this->menu->delete($id))
		{	
			$this->session->set_flashdata('message', 'menu berhasil di hapus!');
			
		}else{
			$this->session->set_flashdata('message', 'menu gagal di hapus!');
		}
		redirect('admin/menus');
	}
}
 
/* End of file */