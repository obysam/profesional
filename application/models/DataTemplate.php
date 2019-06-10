<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataTemplate extends CI_Model {

	public function getFreeTemplate(){
		$this->db->where('status',1);
		$this->db->where('harga',NULL);
		return $this->db->get('template');
	}

	public function getTemplate(){
		return $this->db->get('template');
	}

	public function resetTemplate($id_user){
		$this->db->where('id_user',$id_user);
		$this->db->set('aktif',0);
		$this->db->update('user_template');
	}

	public function updateAktif($data){
		$this->db->where('id_template',$data['id_template']);
		$this->db->where('id_user',$data['id_user']);
		$this->db->set('aktif',$data['aktif']);
		$this->db->update('user_template');
	}

	public function insertBatchTemplate($data){
		  $this->db->insert_batch('user_template',$data);
	}

	public function insertTemplate($data){
		$this->db->insert('template',$data);
	}

	public function getAktifTemplate($idUser){
		$this->db->join('template','template.id_template=user_template.id_template');
		$this->db->where('aktif',1);
		$this->db->where('id_user',$idUser);
		return $this->db->get('user_template');
	}
}
