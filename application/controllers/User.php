<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller{
	public function index(){
		$this->load->view('user');
	}
	public function GetAllUser(){
		$result = $this->contact_model->ShowAll();
		echo json_encode($result);
	}
	public function SaveUser(){
		$data = array();
		$data['name'] = $this->input->post('name');
		$data['email'] = $this->input->post('email');
		$data['phone'] = $this->input->post('phone');

		$result = $this->db->insert('contact',$data);

		$msg['success'] = false;

		if($result){
			$msg['success'] = true;

		}
		echo json_encode($msg);

	}
	public function EditUser($id){
		$result = $this->contact_model->ContactByid($id);
		echo json_encode($result);
	}
	public function UpdateUser(){
		$data = array();
		$data['name'] = $this->input->post('name');
		$data['email'] = $this->input->post('email');
		$data['phone'] = $this->input->post('phone');
		$id = $this->input->post('id');

		$result = $this->db->where('id', $id)->update('contact',$data);
		$msg['success'] = false;

		if($result){
			$msg['success'] = true;

		}
		echo json_encode($msg);
	}
	public function DeleteUser(){
		$id = $this->input->get('id');
		$result = $this->contact_model->deleteUser($id);
		$msg['success'] = false;

		if($result){
			$msg['success'] = true;

		}
		echo json_encode($msg);
	} 

}