<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataPengalaman extends CI_Model {

     public function getOneDP($idUser){
        $this->db->where('id_user', $idUser);
        $this->db->join('regencies', 'regencies.id = tbl_pengalaman.lokasi');
        $this->db->join('tbl_jabatan', 'tbl_jabatan.id_jabatan = tbl_pengalaman.tingkatan_posisi');
        $this->db->join('tbl_industri', 'tbl_industri.id_industri = tbl_pengalaman.id_industri');
        $this->db->join('tbl_spesialisasi', 'tbl_spesialisasi.id_spesialisasi = tbl_pengalaman.id_spesialisasi');
        $this->db->join('bidang_pekerjaan', 'bidang_pekerjaan.id_bidang_pekerjaan2 = tbl_pengalaman.id_bidang_pekerjaan');
        $this->db->order_by('tanggal_gabung','desc');
        return $query = $this->db->get('tbl_pengalaman');
    }


     public function getAllDP(){
        return $query = $this->db->get('tbl_pengalaman');
    }

    public function insertPengalaman($data){
    	$this->db->insert('tbl_pengalaman',$data);
    }

    public function updatePengalaman($data){
    	$this->db->where('id_pengalaman',$data['id_pengalaman']);
    	$this->db->update('tbl_pengalaman',$data);
    }

    public function getPengalamanbyID($id_pengalaman){
        $this->db->join('regencies', 'regencies.id = tbl_pengalaman.lokasi');
        $this->db->join('bidang_pekerjaan', 'bidang_pekerjaan.id_bidang_pekerjaan2 = tbl_pengalaman.id_bidang_pekerjaan');
        $this->db->where('id_pengalaman',$id_pengalaman);
        return $this->db->get('tbl_pengalaman');
    }

    public function hapusPengalaman($id_pengalaman){
        $this->db->where('id_pengalaman',$id_pengalaman);
        return $this->db->delete('tbl_pengalaman');
    }

    public function getTingkatPengalaman(){
        return $this->db->get('tbl_tingkat_pengalaman');
    }

    public function getLastBidang(){
        $this->db->select_max('id_bidang_pekerjaan2');
        return $this->db->get('bidang_pekerjaan');
    }

     public function insertBidangPekerjaan($data){
        $this->db->insert('bidang_pekerjaan',$data);
    }
}
