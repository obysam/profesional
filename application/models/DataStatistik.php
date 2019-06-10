<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataStatistik extends CI_Model {

	public function getOneDST($idUser){
        $this->db->where('id_user', $idUser);
        return $query = $this->db->get('statistik');
    }

     public function getAllDST(){
        return $query = $this->db->get('statistik');
    }

}
