<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataBidang extends CI_Model {

	public function getOneDBD($idUser){
        $this->db->where('id_user', $idUser);
        return $query = $this->db->get('tbl_bidang');
    }

     public function getAllDBD(){
        return $query = $this->db->get('tbl_bidang');
    }

    public function inputBidang($data){
    	$this->db->insert("tbl_bidang",$data);
    }
}
