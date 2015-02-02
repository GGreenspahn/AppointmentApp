<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mains extends CI_Controller {
	
	public function index()
	{
		$this->load->view('Main');
	}
	public function try_reg()
	{
		$name = $this->input->post('name');
		$alias = $this->input->post('alias');
		$email = $this->input->post('email');
		$password = crypt($this->input->post('password'), rand(10,99));
		$dob = $this->input->post('datepicker');

		$this->load->model('Main');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'Name', 'trim|required|max_length[100]|alpha');
		$this->form_validation->set_rules('alias', 'Alias', 'trim|required|max_length[100]|alpha');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|max_length[16]|matches[password2]');

		$already = "";
		$existing = $this->Main->get_user($this->input->post('email'));
		if(count($existing)>0)
		{
			$this->session->set_flashdata('message', "Email is already in use.");
			redirect('/');
		}
		if(($this->form_validation->run())&&($already == ""))
		{
			$this->Main->add_user($name,$alias,$email,$password,$dob);
			$record = $this->Main->get_user($email);
			$this->session->set_userdata('record', $record);
			redirect('tasks_page');
		}
		if($this->form_validation->run() === FALSE)
		{
			$this->session->set_flashdata('message','Please re-enter your registration information, and be sure to include a valid email, matching passwords, and only alphanumeric characters in the "Name" and "Alias" field.');
			redirect('/');
		}
	}
	public function try_login()
	{
		$this->load->model('Main');
		if(!$this->input->post('password')||!$this->input->post('email'))
		{
			$this->session->set_flashdata('login_message','Both email and password must be present to login.');
			redirect('/');
		}
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$record = $this->Main->get_user($email);
		if(!$record)
		{
			$this->session->set_flashdata('login_message','User not found.');
			redirect('/');	
		}

		$password = crypt($password,$record['password']);

		if($record)
		{
			if($record['password']==$password){
				$this->session->set_userdata('record', $record);
				redirect("/tasks_page");
			}
			$this->session->set_flashdata('message', "Sorry, user name or password wasn't right.");
			redirect('/');
		}
	}
	public function logout()
	{
		$this->session->unset_userdata();
		$this->session->set_flashdata('message','You are now logged out.');
		redirect('/');
	}

}