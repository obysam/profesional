<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataBaseInfo extends CI_Model {

	public function getOneDBI($idUser){
        $this->db->where('id_user', $idUser);
        return $query = $this->db->get('base_info');
    }

     public function getAllDBI(){
        return $query = $this->db->get('base_info');
    }

}
