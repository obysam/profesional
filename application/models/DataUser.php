<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataUser extends CI_Model {
    public function cekUsername($idUser){
        $this->db->select('username');
        $this->db->where('id_user',$idUser);
        return (($this->db->get('tbl_user')->result_array()));
    }
    public function authUsername($username){
        $this->db->where('username',$username);
        return (($this->db->get('tbl_user')->result_array())); 
    }
    public function getLokasibyId($id){
        $this->db->where('id_alt',$id);
        return (($this->db->get('regencies')->result()));
    }
	public function getOneDU($idUser){
        $this->db->join('regencies', 'regencies.id = tbl_user.domisili');
        $this->db->where('id_user', $idUser);
        return $query = $this->db->get('tbl_user');
    }
    public function getOneDU2($idUser){
        $this->db->where('id_user', $idUser);
        return $query = $this->db->get('tbl_user');
    }

     public function getAllDU(){
        return $query = $this->db->get('tbl_user');
    }

    public function cekId($idUser){
    	$query = $this->db->where('id_user',$idUser);
    	return $query;
    }

    public function register($data){
    	 $this->db->insert('tbl_user',$data);
    }

    public function cek_mail($email){
    	$this->db->where('email', $email);
        return $query = $this->db->get('tbl_user');
    }

    public function cekLogin($data){
        $this->db->where('email',$data['email']);
        $this->db->where('password',$data['password']);
        return $this->db->get('tbl_user');
    }
    public function cekAuth($auth){
    	$this->db->where('autentifikasi', $auth);
    	$query = $this->db->get('tbl_user');
    	return $query;
    }

    public function cekForgetAuth($auth){
        $this->db->where('lupaPassword', $auth);
        $query = $this->db->get('tbl_user');
        return $query;
    }

    public function aktifStatus($email){
    	$this->db->where('email',$email);
    	$this->db->set('status',1);
    	$this->db->update('tbl_user');
    }

    public function setLupaPassword($data){
    	$this->db->where('email',$data['email']);
    	$this->db->set('lupaPassword',$data['lupaPassword']);
    	$this->db->update('tbl_user');
    }

    public function updateUser($data){
        $this->db->where('id_user',$data['id_user']);
        $this->db->update('tbl_user',$data);
    }

    public function getRegencies()
    {
    
        return $this->db->get('regencies');
    }

    public function getSpesialisasi()
    {
        return $this->db->get('tbl_spesialisasi');
    }

    public function getIndustri()
    {
        return $this->db->get('tbl_industri');
    }

    public function insertSpesialisasi($data)
    {
      //  $this->db->insert_batch('tbl_spesialisasi', $data);
    }

    public function insertBidangPekerjaan($data)
    {
     //   $this->db->insert_batch('bidang_pekerjaan',$data);
    }

    public function insertIndustri($data)
    {
     //   $this->db->insert_batch('tbl_industri',$data);
    }
    public function insertBP($data)
    {
          $this->db->insert_batch('bidang_pekerjaan',$data);
    }
    public function getBidangByID($id)
    {
        $this->db->where('id_spesialisasi',$id);
        $this->db->where('status',1);
        return $this->db->get('bidang_pekerjaan');
    }

    public function getJabatan()
    {
        return $this->db->get('tbl_jabatan');
    }

    public function getBidangPendidikan()
    {
        return $this->db->get('tbl_bidang_pendidikan');
    }

    public function updateBatchLokasi($data)
    {
        $this->db->update_batch('regencies',$data,'id');
    }

    public function cekRegencies($str)
    {
        $this->db->where('name',$str);
        return $this->db->get('regencies');
    }

    public function getOneBahasa($id)
    {
        $this->db->where('id_user',$id);
        return $this->db->get('tbl_bahasa');
    }

    public function insertBahasa($data)
    {
        $this->db->insert('tbl_bahasa',$data);
    }

    public function updateBahasa($data)
    {
        $this->db->where('id_bahasa',$data['id_bahasa']);
        $this->db->update('tbl_bahasa',$data);
    } 

    public function getBidangPekerjaanAll2()
    {
        $this->db->distinct();
        $this->db->where('nama_bidang !=',"Lainnya");
        return $this->db->get('bidang_pekerjaan');
    }

    public function getBahasabyID($id)
    {
        $this->db->where('id_bahasa',$id);
        return $this->db->get('tbl_bahasa');
    }

    public function deleteBahasa($id)
    {
        $this->db->where('id_bahasa',$id);
        $this->db->delete('tbl_bahasa');
    }

    public function updatePassword($data){
        $this->db->where('email',$data['email']);
        $this->db->update('tbl_user',$data);
    }

    public function updateUsername($data){
        $this->db->where('id_user',$data['id_user']);
        $this->db->set('username',$data['username']);
        $this->db->update('tbl_user');
    }

    public function getIDUserbyName($username){
        $this->db->select('id_user,nama');
        $this->db->where('username',$username);
        return ($this->db->get('tbl_user')->result_array());
    }

    public function updateFoto($data){
        $this->db->where('id_user',$data['id_user']);
        $this->db->set('foto',$data['foto']);
        $this->db->update('tbl_user');
    }

     public function getFoto($id){
        $this->db->where('id_user',$id);
        $this->db->select('foto');
        return ($this->db->get('tbl_user')->result_array());
    }

    public function getTP($idUser){
        $this->db->where('id_user',$idUser);
        $this->db->join('tbl_tingkat_pengalaman', 'tbl_tingkat_pengalaman.id_tingkat = tbl_user.tingkatPengalaman');
        $this->db->select('tingkatPengalaman, tingkat, statusPengalaman');
        return ($this->db->get('tbl_user')->result_array());
    }

/*    public function getIDbyUser($user){
        $this->db->where('username',$user);
        $this->db->select('id_user');
        return ($this->db->get('tbl_user')->result());
    }*/
}
