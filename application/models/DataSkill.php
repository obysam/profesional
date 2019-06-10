<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataSkill extends CI_Model {

	public function getOneDS($idUser){
        $this->db->join("tbl_spesialisasi","tbl_skill.bidang = tbl_spesialisasi.id_spesialisasi");
        $this->db->order_by('kemampuan','desc');
        $this->db->where('id_user', $idUser);
        return $query = $this->db->get('tbl_skill');
    }

     public function getAllDS(){
        return $query = $this->db->get('tbl_skill');
    }

    public function getBidangPekerjaanAll(){
    	return $query = $this->db->get('tbl_spesialisasi');
    }
    public function insertSkill($data){
        $this->db->insert('tbl_skill', $data);
    }

    public function updateSkill($data){
        $this->db->where('id_skill',$data['id_skill']);
        $this->db->update('tbl_skill',$data);
    }

    public function deleteSkill($id){
        $this->db->where('id_skill',$id);
        $this->db->delete('tbl_skill');
    }

    public function getSkillOne($id){
        $this->db->where('id_skill',$id);
        return $this->db->get('tbl_skill');
    }

    public function getLast(){
        $this->db->order_by('id_spesialisasi','desc');
        return $this->db->get('bidang_pekerjaan',1);
    }

    public function getSpesialisasibyID($id){
        $this->db->where('id_spesialisasi',$id);
        return $this->db->get('tbl_spesialisasi');
    }
}
