<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once (dirname(__FILE__) . "/Base.php");

class Adminx extends Base {

	public function __construct()
        {
                parent::__construct();
     			$this->load->model('DataUser', "DU");
     			$this->load->model('DataPendidikan', "DD");
     			$this->load->model('DataPengalaman', "DP");
     			$this->load->model('DataBidang', "DBD");
     			$this->load->model('DataSkill', "DS");
     			$this->load->model('DataBaseInfo', "DBI");
     			$this->load->model('DataStatistik', "DST");
        }

    public function index($username){
   
    }

    public function addBerita(){
        $this->cekAuth();
        
        $idUser = $this->getIdUser();
        $data['title']   = 'Tambah Artikel';
        $data['content'] = 'template_admin/tambah_berita';
      //  $data['last']   = $this->getLastSpesialisasi();
        $data['page']    = 'admin';
        $this->template($data);

    }
    
    public function template($data){
        $data['username'] = $this->session->userdata['login']['username'];
        $this->load->view('template_admin/header',$data);
        $this->load->view('template_admin/sidebar_admin');
        $this->load->view('loader');
        $this->load->view($data['content'],$data);
        //$this->load->view('template/footer');
        $this->load->view('template_admin/js_'.$data['page']);

    }

      public function getLokasibyID($id){
        if($id !=0){
            $data = $this->DU->getLokasibyId($id);
            return $data[0]->name;
        }
    }

}
