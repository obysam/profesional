<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataBidang extends CI_Model {

	public function getOneBDG($idUser){
        $this->db->where('id_user', $idUser);
        return $query = $this->db->get('tbl_bidang');
    }

     public function getAllBDG(){
        return $query = $this->db->get('tbl_bidang');
    }

}
