<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('encrypt');
		$this->load->model('register_model');
	}

	public function index()
	{
		$this->load->view('register');
	}

	function validation()
	{
		$this->form_validation->set_rules('fname', 'Name', 'required|trim');
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('email', 'Email Address', 'required|trim|valied_email|is_unique[codeigniter_register.email]');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');
		$this->form_validation->set_rules('passwordConf', 'Confirm Password', 'required|trim');
		$this->form_validation->set_rules('ProFileName', 'Profile File Name', 'required');
		$this->form_validation->set_rules('IDFileName', 'ID File Name', 'required');
		$this->form_validation->set_rules('Utype', 'User Type', 'required');

		if($this->form_validation->run())
		{
			$verification_key = md5(read());
			$encrypted_password = $this->encrypt->encode($this->input->post('password'));
			$VAL = 1111;
			$data = array(
				'UID'				=>	$VAL,
				'FULLNAME'			=>	$this->input->post('fname'),
				'USERNAME'			=>	$this->input->post('username'),
				'EMAIL'				=>	$this->input->post('email'),
				'PASSWORD'			=>	$encrypted_password,
				'VERIFICATION_KEY '	=>	$verification_key,
				'PROFILE_PIC'		=>	$this->input->post('ProFileName'),
				'USER_ROLE'			=>	$this->input->post('Utype'),
				'ID_UPLOAD '		=>	$this->input->post('IDFileName'),
				'STATUS'			=>	"ACTIVE",
				'CREATED_AT'		=> 	getdate()
			);

			$id = $this->register_model->insert($data);
			if(id>0)
			{
				$subject = "Please verify email for login";
				$message ="
				<p>Hai".$this->input->post('username')."</p>
				<p>Verification Link: <a href='".base_url()."register/verify_email".$verification_key."'</p>";

				$config = array(
					'protocol'		=> 'smtp',
					'smtp_host'		=>	'',
					'smtp_port'		=>	80,
					'smtp_user'		=>	'',
					'smtp_pass'		=>	'',
					'mailtype'		=>	'html',
					'charset'		=>	'iso-8859-1',
					'wordwrap'		=>	TRUE
				);

				$this->load->library('email',$config);
				$this->email->set_newline("\r\n");
				$this->email->from('mail@bibithmathew.in');
				$this->email->to($this->input->post('email'));
				$this->email->subject($subject);
				$this->email->message($message);
				if($this->email->send())
				{
					$this->session->set_flashdata('message','check your email');
					redirect('register');
				}
			}



		}
		else{
			$this->index();
		}
	}
}
