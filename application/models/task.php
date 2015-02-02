<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Task extends CI_Model {

	public function add_task ($id, $appointment, $status, $date_time)
	{	
		$query = "INSERT INTO appointments (user_id, appointment, status, date_time, created_at, updated_at)
				  VALUES (?, ?, ?, ?, NOW(), NOW()) ";
		$values = array($id, $appointment, $status, $date_time);
		return $this->db->query($query,$values);
	}
	
	public function edit_task ()
	{

	}
	public function delete_task ()
	{

	}
	public function get_today ($id)
	{
		$query = "SELECT *, date_format(date_time, '%c/%d/%Y') AS today, date_format(date_time, '%h:%i') AS time FROM appointments WHERE date_format(date_time, '%c/%d/%Y')=date_format(NOW(), '%c/%d/%Y') AND user_id = ?";
		$values = array($id);
		$result = $this->db->query($query,$values)->result_array();
		return $result;
	}
	public function get_others ()
	{

	}
	public function get_future ()
	{

	}
}