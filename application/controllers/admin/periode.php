<?php
class Periode extends Admin_Controller {
 	
 	public $views = 'admin/periode/'; 
 	function __construct()
	{
		parent::__construct();
		$this->load->model('Mperiode_courses');
		
	}	

	function index()
	{
		
 		$data['periodes'] = $this->Mperiode_courses->all();
 		
		$this->template
			->title('Prasmul Admin', 'Dashboard')
			->set_layout('main')
			->set_partial('sidebar', 'partials/sidebar')
			->set_partial('footer', 'partials/footer')
			->build($this->views.'index',$data);
	}

	function add(){

		if($_POST){
			
				$periodedata = array(
							'periode' => $this->input->post('periode'),
							'actived' => ($this->input->post('actived')) ? 1: 0,
							);
				$this->Mperiode_courses->add($periodedata);
				$this->session->set_flashdata('message', 'Periode baru berhasil di tambahkan!');
				redirect('admin/periode');	
		}
		$data['create'] = true;
		$this->template
			->title('Prasmul Admin', 'Dashboard')
			->set_layout('main')
			->set_partial('sidebar', 'partials/sidebar')
			->set_partial('footer', 'partials/footer')
			->build($this->views.'form',$data);
	}

	function edit($id = false)
	{
		if(!$id) redirect('admin/periode');

		if($_POST){
			
				$periodedata = array(
							'periode' => $this->input->post('periode'),
							'actived' => ($this->input->post('actived')) ? 1: 0,
							);
				$this->Mperiode_courses->edit($id,$periodedata);
				$this->session->set_flashdata('message', 'Periode berhasil di ubah!');
				redirect('admin/periode');			
		}

		$data['periode'] = $this->Mperiode_courses->find(array('id'=>$id));
		$data['create'] = false;
		$this->template
			->title('Prasmul Admin', 'Dashboard')
			->set_layout('main')
			->set_partial('sidebar', 'partials/sidebar')
			->set_partial('footer', 'partials/footer')
			->build($this->views.'form',$data);
	}

	function remove($id = false)
	{
		if(!$id)  redirect('admin/periode');

		$delete = $this->Mperiode_courses->delete($id);

		if($delete){
			$this->session->set_flashdata('message', 'Periode berhasil di hapus!');
			redirect('admin/periode');
		}
		$this->session->set_flashdata('message', 'Periode gagal di hapus!');
		redirect('admin/periode');
	}

	
}
 
/* End of file */