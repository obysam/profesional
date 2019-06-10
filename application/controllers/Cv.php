<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once (dirname(__FILE__) . "/Base.php");

class Cv extends Base {

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

   // public function _remap($param) {
   // //     $this->index($param);
   //  }


    public function index($username){
        $idUser = $this->DU->getIDUserbyName($username);
        if($idUser != null){
            //cek kesiapan data
            $cek = $this->isComplete($idUser[0]['id_user']);
            if($cek <= 7){
            //    echo "<script>alert('Data CV anda belum lengkap'); window.location ='".base_url()."user/profile';</script>";   
            }
            
            //get basic data
            $data['user']       = $this->getOneDU($idUser[0]['id_user']);
            $data['pendidikan'] = $this->getOneDD($idUser[0]['id_user']);
            $data['pengalaman'] = $this->getOneDP($idUser[0]['id_user']);
            $data['skill']      = $this->getOneDS($idUser[0]['id_user']);
            $data['bahasa']     = $this->getOneBS($idUser[0]['id_user']);
            $data['nama']       = $this->getNama();
            foreach($data['user']->result() as $row){
                $data['domisili'] = $this->getLokasibyID($row->domisili);
                $data['prefLok1'] = $this->getLokasibyID($row->preferensiLokasi1);
                if($row->preferensiLokasi2 != 0){
                    $data['prefLok2'] = $this->getLokasibyID($row->preferensiLokasi2);
                }else{
                    $data['prefLok2'] = NULL;
                }
                if($row->preferensiLokasi3 != 0){
                    $data['prefLok3'] = $this->getLokasibyID($row->preferensiLokasi3);
                }else{
                    $data['prefLok3'] = NULL;
                }
                $data['GS'] = $row->showGaji;
                $data['gaji'] = $row->gaji;
            }

            $cvData = $this->DT->getAktifTemplate($idUser[0]['id_user']);
            foreach($cvData->result() as $raw){
                $data['cv'] = $raw->template;
            }
            $this->load->view('cv/navbar',$data);
            $this->load->view('cv/'.$data['cv'], $data);
           
        }else{
                echo "<script>alert('Ups, Sepertinya terjadi kesalahan, CV tidak di temukan'); window.location ='".base_url()."Main';</script>";   
        }
    }
    

      public function getLokasibyID($id){
        if($id !=0){
            $data = $this->DU->getLokasibyId($id);
            return $data[0]->name;
        }
    }

    public function test(){
        $a = array('a','b');
        $array= array();
        array_push($array,$a);
     //   print_r($array);
        echo"<pre>";
        $c = array('1','2','3');
        array_push($array,$c);
       print_r($array);
    }

    public function downloadPDF(){
            //load mPDF library
        $this->load->library('m_pdf');
        //load mPDF library
 
 
        //now pass the data//
         $this->data['title']="MY PDF TITLE 1.";
         $this->data['description']="";
         $this->data['description']="Cek sdjhkfudsfusdf";
         //now pass the data //
 
        
        $html=$this->load->view('test',$this->data, true); //load the pdf_output.php by passing our data and get all data in $html varriable.
     
        //this the the PDF filename that user will get to download
        $pdfFilePath ="mypdfName-".time()."-download.pdf";
 
        
        //actually, you can pass mPDF parameter on this load() function
        $pdf = $this->m_pdf->load();
        //generate the PDF!
        $pdf->WriteHTML($html,2);
        //offer it to user via browser download! (The PDF won't be saved on your server HDD)
        $pdf->Output($pdfFilePath, "D");
    }
}
