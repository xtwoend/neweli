<?php
class Questions extends Admin_Controller {
 	
 	private $module  = 'admin/questions/';
 	function __construct()
	{
		parent::__construct();
		$this->load->model(array('mprograms','mlang','menu','mprogram_lang','mquestions','mquestionoptions'));
		$user_identifier = $this->session->userdata('identifier');
	}	
	function index()
	{
		$data['questions'] = $this->mquestions->all();
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
						'question'	=>  $this->input->post('question'),
						'lang'	=>  $this->input->post('lang'),
						'starting' => ($this->input->post('starting',FALSE)) ? 1 : 0,
						);
			$post_id = $this->mquestions->add($arrdata);

			redirect('admin/questions');
			
		}

		$data['language'] = $this->mlang->get();
		$optionlang = array();
		foreach ($this->mlang->get('lang,language') as $p) {
			$optionlang [$p->lang] = $p->language;
		}
		$data['optionslang'] = $optionlang;

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
		if(!$id) redirect('questions');
		if($_POST){
		
			$arrdata =  array(						
						'question'	=>  $this->input->post('question'),
						'lang'	=>  $this->input->post('lang'),
						'starting' => ($this->input->post('starting',FALSE)) ? 1 : 0,
						);
			$this->mquestions->edit($id,$arrdata);

			redirect('admin/questions');
			
		}

		$data['language'] = $this->mlang->get();
		$optionlang = array();
		foreach ($this->mlang->get('lang,language') as $p) {
			$optionlang [$p->lang] = $p->language;
		}
		$data['optionslang'] = $optionlang;
		$data['question'] = $this->mquestions->find(array('id'=>$id));
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
		if(!$id) redirect('questions');
		if($this->mquestions->delete($id))
		{	$this->mquestionoptions->delete($id, 'question_id');
			$this->session->set_flashdata('message', 'pertannyaan berhasil di hapus!');
			
		}else{
			$this->session->set_flashdata('message', 'pertannyaan gagal di hapus!');
		}
		redirect('admin/questions');		
	}
	function answers($id=false)
	{
		if(!$id) redirect('questions');

		$data['question'] = $this->mquestions->find(array('id'=>$id));
		$data['options'] = $this->mquestionoptions->all(array('question_id'=>$id));

		$this->template
			->title('Prasmul Admin', 'Dashboard')
			->set_layout('main')
			->set_partial('sidebar', 'partials/sidebar')
			->set_partial('footer', 'partials/footer')
			->build($this->module. 'answers', $data);
	
	}

	function addanswer($id=false)
	{

		if(!$id) redirect('questions');


		if($_POST){
			$arrdata =  array(						
						'question_id'	=>  $id,
						'option'	=>  $this->input->post('option'),
						'next_questions_id' => $this->input->post('next_questions_id'),
						'end_question' => ($this->input->post('end_question',FALSE)) ? 1 : 0,
						'recommendation_id' => $this->input->post('recommendation_id'),
						);
			$post_id = $this->mquestionoptions->add($arrdata);

			redirect('admin/questions/answers/'.$id);
		}


		$data['question'] = $this->mquestions->find(array('id'=>$id));

    	$questions = array('/'=>'');
		foreach ( $this->mquestions->all() as $p) {
			$questions[$p->id] = $p->question;
		}
		$data['questions'] = $questions;

		$programs = array('/'=>'');
		foreach ( $this->mprograms->all() as $p) {
			$programs[$p->id] = $p->program;
		}
		$data['programs'] = $programs;

    	$data['create'] = true;
    	
    	$this->template
			->title('Prasmul Admin', 'Dashboard')
			->set_layout('main')
			->set_partial('sidebar', 'partials/sidebar')
			->set_partial('footer', 'partials/footer')
			->build($this->module. 'addanswers', $data);
	}
	function editanswer($id=false,$question_id = false)
	{
		if(!$id || !$question_id) redirect('questions');

		if($_POST){
			$arrdata =  array(						
						'question_id'	=>  $question_id,
						'option'	=>  $this->input->post('option'),
						'next_questions_id' => $this->input->post('next_questions_id'),
						'end_question' => ($this->input->post('end_question',FALSE)) ? 1 : 0,
						'recommendation_id' => $this->input->post('recommendation_id'),
						);
			$edited = $this->mquestionoptions->edit($id , $arrdata );

			redirect('admin/questions/answers/'.$question_id);
		}


		$data['question'] = $this->mquestions->find(array('id'=>$question_id));

    	$questions = array('/'=>'');
		foreach ( $this->mquestions->all() as $p) {
			$questions[$p->id] = $p->question;
		}
		$data['questions'] = $questions;

		$programs = array('/'=>'');
		foreach ( $this->mprograms->all() as $p) {
			$programs[$p->id] = $p->program;
		}
		$data['programs'] = $programs;
		$data['option'] = $this->mquestionoptions->find(array('id'=>$id));
    	$data['create'] = false;
    	
    	$this->template
			->title('Prasmul Admin', 'Dashboard')
			->set_layout('main')
			->set_partial('sidebar', 'partials/sidebar')
			->set_partial('footer', 'partials/footer')
			->build($this->module. 'addanswers', $data);
	}
	function removeanswer($id=false,$question_id = false)
	{
		if(!$id || !$question_id) redirect('questions');
		if($this->mquestionoptions->delete($id))
		{	
			$this->session->set_flashdata('message', 'menu berhasil di hapus!');
			
		}else{
			$this->session->set_flashdata('message', 'menu gagal di hapus!');
		}
		redirect('admin/questions/answers/'.$question_id);
	}
}
 
/* End of file */