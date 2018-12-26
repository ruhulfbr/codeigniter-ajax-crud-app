<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_model extends CI_Model{

	public function ShowAll(){
		$this->db->select('*');
		$this->db->from('contact');
		$query = $this->db->get();
		return $query->result();
	}
	public function ContactByid($id){
		$this->db->select('*');
		$this->db->from('contact');
		$this->db->where('id',$id);
		$query = $this->db->get();
		return $query->row();
	}
	public function deleteUser($id){
		$this->db->where('id',$id);
		$this->db->delete('contact');
		return true;
	}

}