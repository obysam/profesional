<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataPendidikan extends CI_Model {

    public function getOneDD($idUser){
        $this->db->join('regencies', 'regencies.id = tbl_pendidikan.lokasi');
        $this->db->join('tbl_bidang_pendidikan', 'tbl_bidang_pendidikan.id_bidang_pendidikan = tbl_pendidikan.id_bidang_pendidikan');
        $this->db->where('id_user', $idUser);
        $this->db->order_by('thn_masuk','desc');
        return $query = $this->db->get('tbl_pendidikan');
    }

    public function getAllDD(){
        return $query = $this->db->get('tbl_pendidikan');
    }

    public function insertPendidikan($data){
    	$this->db->insert('tbl_pendidikan',$data);
    }

    public function updatePendidikan($data){
    	$this->db->where('id_pendidikan',$data['id_pendidikan']);
      	$this->db->update('tbl_pendidikan',$data);
    }

    public function getPendidikanbyID($id){
        $this->db->where('id_pendidikan',$id);
          $this->db->join('regencies', 'regencies.id = tbl_pendidikan.lokasi');
        return $this->db->get('tbl_pendidikan');
    }

    public function hapuspendidikan($id){
        $this->db->where('id_pendidikan',$id);
        $this->db->delete('tbl_pendidikan');
    }

    public function getBidangPen($id){
        $this->db->where('level',$id);
        return $this->db->get('tbl_bidang_pendidikan');
    }
}
