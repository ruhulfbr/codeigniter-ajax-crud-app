<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Contact extends CI_Controller{
	public function index(){
		$this->load->view('contact');
	}
	public function ShowAll(){
		$result = $this->contact_model->ShowAll();
		echo json_encode($result);
	}
	public function SaveContact(){

		$data = array();
		$data['name'] = $this->input->post('name');
		$data['email'] = $this->input->post('email');
		$data['phone'] = $this->input->post('phone');
		$result = $this->db->insert('contact',$data);


		$msg['ok'] = false;
		if($result){
			$msg['ok'] = true;
		}
		echo json_encode($msg);
	}
	public function EditContact($id){
		$result =  $this->contact_model->ContactByid($id);
		echo json_encode($result);
	}
	public function UpdateContact(){
		$id = $this->input->post('id');
		$data = array();
		$data['name'] = $this->input->post('name');
		$data['email'] = $this->input->post('email');
		$data['phone'] = $this->input->post('phone');
		$result = $this->db->where('id',$id)->update('contact',$data);
		$msg['ok'] = false;
		if($result){
			$msg['ok'] = true;
		}
		echo json_encode($msg);
	}
	public function DeleteContact($id){
		$delete = $this->db->where('id',$id)->delete('contact');

		$msg['ok'] = false;
		if($delete){
			$msg['ok'] = true;
		}
		echo json_encode($msg);
	}
}