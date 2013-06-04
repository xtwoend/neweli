<?php
class Registers extends Public_Controller {

 	function __construct()
	{
		parent::__construct();
		$this->load->model(array('mperiode_courses','page','page_lang','menu','section','section_lang','msliders','msliders_lang', 'mregisters','mregister_program'));
	}	

	function index()
	{	

		if($_POST)
		{
			$regis = array(
                        'first_name' => $this->input->post('firstname'),
                        'last_name' => $this->input->post('lastname'),
                        'gander' => $this->input->post('gender'),
                        'job_title' => $this->input->post('jobtitle'),
                        'email' => $this->input->post('email'),
                        'personal' => ($this->input->post('personal',false))? 1 : 0,
                        //for company 
                        'name_com' => $this->input->post('com_name'),
                        'email_com' => $this->input->post('com_email'),
                        'indrustry_com' => $this->input->post('com_industry'),
                        'address_com' => $this->input->post('com_address'),
                        'code_com' =>  $this->input->post('com_code'),
                        'city_com' => $this->input->post('com_city'),
                        'country_com' => $this->input->post('com_country'),
                        'phone_com' => $this->input->post('com_phone'),
                        'fax_com' => $this->input->post('com_fax')
                    );
        				
				$register_id = $this->mregisters->add($regis);
				if(!$register_id) redirect('registers');
        		$this->session->set_userdata('register_id', $register_id);
        		redirect('registers/step2?page=1');
  		}


		$data['registers'] = '';
		$this->template
 			->title('Prasetiya Mulya', '')
			->set_layout('main')
			->set_partial('header', 'partials/header')
			->set_partial('footer', 'partials/footer')
			->build('registration' , $data);
	}

	function costum()
	{	

		if($_POST)
		{
			$regis = array(
                        'first_name' => $this->input->post('firstname'),
                        'last_name' => $this->input->post('lastname'),
                        'gander' => $this->input->post('gender'),
                        'job_title' => $this->input->post('jobtitle'),
                        'email' => $this->input->post('email'),
                        'personal' => ($this->input->post('personal',false))? 1 : 0,
                        //for company 
                        'name_com' => $this->input->post('com_name'),
                        'email_com' => $this->input->post('com_email'),
                        'indrustry_com' => $this->input->post('com_industry'),
                        'address_com' => $this->input->post('com_address'),
                        'code_com' =>  $this->input->post('com_code'),
                        'city_com' => $this->input->post('com_city'),
                        'country_com' => $this->input->post('com_country'),
                        'phone_com' => $this->input->post('com_phone'),
                        'fax_com' => $this->input->post('com_fax'),
                        'note' => $this->input->post('note'),
                    );
        				
				$register_id = $this->mregisters->add($regis);
				if(!$register_id) redirect('registers');
        		$this->session->set_userdata('register_id', $register_id);
        		redirect('registers/step2?page=2');
  		}

  		
		$data['registers'] = '';
		$this->template
 			->title('Prasetiya Mulya', '')
			->set_layout('main')
			->set_partial('header', 'partials/header')
			->set_partial('footer', 'partials/footer')
			->build('cotumeregister' , $data);
	}	

	function step2()
	{    
        $page = $this->input->get('page');
     
		if($_POST)
		{	
			$programdata =  array(
			 					'registration_id' => $this->input->post('register_id'),
                                'program_id' => $this->input->post('program'),
                                'periode_id' => $this->input->post('periode'),
                                'date_registration' => date('Y-m-d H:i:s')
                                );
			$this->mregister_program->add($programdata);
        	redirect('registers/step2?page='.$page);
		}

        $data['programselected'] = $this->mregister_program->get('*',array('registration_id' => $this->session->userdata('register_id') ));
       
        $data['register_id'] = $this->session->userdata('register_id');
        $data['programs'] = $this->mprogram_lang->findprograms(array('program_lang.lang'=> $this->lang->mci_current(),'programs.parent'=> 0));
        $data['periode'] = $this->mperiode_courses->all(array('actived'=> 1));
        
       	$this->template
 			->title('Prasetiya Mulya', '')
			->set_layout('main')
			->set_partial('header', 'partials/header')
			->set_partial('footer', 'partials/footer')
			->build('registration_step2' , $data);
	}

	function step3()
	{	
        $page = $this->input->get('page');
       

		if($_POST){
			$participantdata = array(
                        'first_name' => $this->input->post('firstname'),
                        'last_name' => $this->input->post('lastname'),
                        'gander' => $this->input->post('gender'),
                        'job_title' => $this->input->post('jobtitle'),
                        'mobile_phone' => $this->input->post('mobile_phone'),
                        'personal' => $this->input->post('personal',0),
                        'birth_place' => $this->input->post('birth_place'),
                        'date_of_birth' => $this->input->post('date_of_birth'),
                        //for prticipant for 
                        'participant_of' => $this->input->post('register_id'),
                    );
			if($this->input->post('reg_id') == ''){            
            	$participant = $this->mregisters->add($participantdata);
	            if($participant)
	            {	
	            		$progsame = $this->mregister_program->find(array('id' => $this->input->post('prog_id') ));
	                
	                $prog = array(
	                                    'registration_id' => $participant,
	                                    'program_id' => $progsame->program_id,
	                                    'periode_id' => $progsame->periode_id,
	                                    'date_registration' => date('Y-m-d H:i:s')
	                                );
	                $this->mregister_program->add($prog);
	            }

	        }else{
	            
	        	$register_id = $this->mregisters->edit($this->input->post('reg_id'), $participantdata);
	        }

	        
	        redirect('registers/step3?page='.$page);
		}

        $data['programs'] = $this->mregister_program->get('*',array('registration_id' => $this->session->userdata('register_id') ));
        $data['register_id'] = $this->session->userdata('register_id');
        
        $this->template
 			->title('Prasetiya Mulya', '')
			->set_layout('main')
			->set_partial('header', 'partials/header')
			->set_partial('footer', 'partials/footer')
			->build('registration_step3' , $data);
	}

	function ajaxprogram($id=false)
	{
       	$this->session->set_userdata('program_id', $id);
        $data['programs'] = $this->mprogram_lang->findprograms(array('program_lang.lang'=> $this->lang->mci_current(),'programs.parent'=>$id ));
        if(!$data['programs']) return false;
        $data['id'] = $id;
       	
       	$this->load->view('registration_ajax',$data);
	}

	public function delpartisipan($id=false)
    {
        if(!$id) return false;
       	$this->mregisters->delete($id);

        echo json_encode(array('msg'=>'delete success!'));
    }

    public function partisipan($id=false)
    {
    	if(!$id) return false;

        $partisipan = $this->mregisters->find( array('id' => $id ));

        echo json_encode($partisipan);
    }

    public function cetak()
    {
    	$register_id = $this->input->post('register_id');

    	$register = $this->mregisters->find(array('id'=>$register_id));

    	$partisipan = $this->mregisters->get('*',array('participant_of'=>$register_id));

    	$data['register'] = $register;
    	$data['partisipan'] = $partisipan;
    	$data['programs'] = $this->mregister_program->get('*',array('registration_id' => $register_id ));
    	$this->load->view('cetakregister',$data);

    }
}
 
/* End of file */