<?php
class Questions extends Public_Controller {

 	function __construct()
	{
		parent::__construct();
		$this->load->model(array('page','page_lang','menu','section','section_lang','msliders','msliders_lang','mquestions','mquestionoptions'));
	}	

	function index()
	{	
		$data['question'] = $this->mquestions->find(array('lang'=>$this->lang->mci_current(), 'starting'=>1));;

		if($_POST)
		{
			$option_id = $this->input->post('answer');
	        $option = $this->mquestionoptions->find(array('id'=>$option_id));

	        if(!$option){
	            $data['question'] = $this->mquestions->find(array('lang'=>$this->lang->mci_current(), 'starting'=>1));
	        }else{
	            if($option->end_question == 1)
	            {   
	               redirect('programs/read/'.$option->recommendation_id);

	            }else{

	                $question =  $data['question'] = $this->mquestions->find(array('id'=>$option->next_questions_id));
	                if(!$question){
	                     $data['question'] = $this->mquestions->find(array('lang'=>$this->lang->mci_current(), 'starting'=>1));
	                }else{
	                    $data['question'] = $question;
	                }
	            }
	        }

		}
		
		$this->template
 			->title('Prasetiya Mulya', '')
			->set_layout('main')
			->set_partial('header', 'partials/header')
			->set_partial('footer', 'partials/footer')
			->build('question' , $data);
	}	
}
 
/* End of file */