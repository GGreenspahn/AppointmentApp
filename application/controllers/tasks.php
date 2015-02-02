<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tasks extends CI_Controller {
	
	public function index()
	{	
		$this->load->model('Task');
		$tasks['today'] = $this->Task->get_today($this->session->userdata['record']['id']);
		$tasks['other'] = $this->Task->get_future($this->session->userdata['record']['id']);
	
		$this->load->view('task_view', array('todays' => $tasks));
	}
	public function add_task()
	{	
		$this->load->model('Task');
		
		$id = $this->input->post('id');
		$appointment = $this->input->post('appointment');
		$status = $this->input->post('status');
		$date_time = $this->input->post('datepicker').' '.$this->input->post('time');

		$this->Task->add_task($id, $appointment, $status, $date_time);
		redirect('/tasks_page');
	}
}
