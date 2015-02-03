<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tasks extends CI_Controller {
	
	public function index()
	{	
		$this->load->model('Task');
		$tasks['today'] = $this->Task->get_today($this->session->userdata['record']['id']);
		$tasks['future'] = $this->Task->get_future($this->session->userdata['record']['id']);

		$this->load->view('task_view', array('todays' => $tasks, 'futures'=>$tasks));
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
	public function edit_task($id)
	{
		$this->load->model('Task');
		$task = $this->Task->get_one($id);
		$this->load->view('edit_task', array('tasks' => $task));

	}
	public function update_task($id)
	{
		$this->load->model('Task');
		
		$appointment = $this->input->post('appointment');
		$status = $this->input->post('status');
		$date_time = $this->input->post('datepicker').' '.$this->input->post('time');

		$this->Task->update_task($appointment, $status, $date_time, $id);
		redirect('/tasks_page');
	}
	public function delete_task($id)
	{
		$this->load->model('Task');
		$this->Task->delete_task($id);
		redirect('/tasks_page');
	}
}
