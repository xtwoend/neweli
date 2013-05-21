<?php
class Users extends Admin_Controller {
 	
 	public $views = 'admin/users/'; 
 	function __construct()
	{
		parent::__construct();
		$this->load->model('user');
		
	}	

	function index()
	{
		// load language file
		$this->lang->load('about');
 		$data['i18n'] = $this->lang->mci_current();
 		$data['users'] = $this->user->all();
 		$user_identifier = $this->session->userdata('identifier');
		
		$this->template
			->title('Prasmul Admin', 'Dashboard')
			->set_layout('main')
			->set_partial('sidebar', 'partials/sidebar')
			->set_partial('footer', 'partials/footer')
			->build($this->views.'index',$data);
	}

	function changepassword()
	{
		# code...
	}

	function add(){

		if($_POST){
			$checkuser = $this->authentication->username_check($this->input->post('username'));
			if($checkuser){
				//var_dump($_POST);
				$username = $this->input->post('username');
				$password = $this->input->post('password');
				$userdata = array(
							'email' => $this->input->post('email'),
							'first_name' => $this->input->post('first_name'),
							'last_name' => $this->input->post('last_name'),
							'admin' => ($this->input->post('admin')) ? 1: 0,
							);
				$user_id = $this->authentication->create_user($username,$password);
				if($user_id) $this->user->edit($user_id , $userdata);
				$this->session->set_flashdata('message', 'user berhasil di tambahkan!');
				redirect('admin/users');	
			}else{
				$this->session->set_flashdata('message', 'username sudah di gunakan!');
				redirect('admin/users/add');
			}
		}
		$data['create'] = true;
		$this->template
			->title('Prasmul Admin', 'Dashboard')
			->set_layout('main')
			->set_partial('sidebar', 'partials/sidebar')
			->set_partial('footer', 'partials/footer')
			->build($this->views.'form',$data);
	}

	function edit($user_id = false)
	{
		if(!$user_id) redirect('admin/users');

		if($_POST){
			
				$username = $this->input->post('username');
				$password = $this->input->post('password');
				$userdata = array(
							'email' => $this->input->post('email'),
							'first_name' => $this->input->post('first_name'),
							'last_name' => $this->input->post('last_name'),
							'admin' => ($this->input->post('admin')) ? 1: 0,
							);
				//$user_id = $this->authentication->create_user($username,$password);
				if($this->input->post('password',false))
				{
					$this->authentication->change_password($password, $user_id);
				}

				if($user_id) $this->user->edit($user_id , $userdata);
				$this->session->set_flashdata('message', 'user berhasil di ubah!');
				redirect('admin/users');	
		}

		$data['user'] = $this->user->find(array('id'=>$user_id));
		$data['create'] = false;
		$this->template
			->title('Prasmul Admin', 'Dashboard')
			->set_layout('main')
			->set_partial('sidebar', 'partials/sidebar')
			->set_partial('footer', 'partials/footer')
			->build($this->views.'form',$data);
	}

	function remove($user_id = false)
	{
		if(!$user_id)  redirect('admin/users');

		$delete = $this->user->delete($user_id);

		if($delete){
			$this->session->set_flashdata('message', 'user berhasil di hapus!');
			redirect('admin/users');
		}
		$this->session->set_flashdata('message', 'user gagal di hapus!');
		redirect('admin/users');
	}

	
}
 
/* End of file */