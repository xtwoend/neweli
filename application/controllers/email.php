<?php
class Email extends Public_Controller {

 	function __construct()
	{
		parent::__construct();
		$this->load->model(array('msites'));
		$this->load->spark('swift-mailer/0.1.9');
	}		

	function send()
	{	
		$setting  = $this->msites->all();
		$smtp = $setting[12];
		$port = $setting[13];
		$email = $setting[9];
		$password = $setting[10];	
		// create the transport
		$transport = Swift_SendmailTransport::newInstance('/usr/sbin/sendmail -bs');
		//$transport = Swift_SmtpTransport::newInstance($smtp, $port)->setUsername($email)->setPassword($password);
		// create the mailer that will use the transport
		$mailer = Swift_Mailer::newInstance($transport);

		// create the message
		$message = Swift_Message::newInstance();
		$message->setSubject($this->input->post('subject'));
		$message->setFrom( $this->input->post('email') );
		$message->setTo(array( $this->input->post('division') => 'Website Email' ));
		$message->setBody($this->input->post('message'));

		// send the message
		$mailer->send($message);

		//redirect('contact-us');
	}
}
 
/* End of file */