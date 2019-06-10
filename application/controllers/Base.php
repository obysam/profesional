<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Base extends CI_Controller {

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
     			$this->load->model('DataTemplate', "DT");
        }

    
    public function isComplete($param=""){
        $idUser = $this->getIdUser();
        $data['user2']       = $this->getOneDU2($idUser);
        $data['pendidikan'] = $this->getOneDD($idUser);
        $data['pengalaman'] = $this->getOneDP($idUser);
        $data['skill']      = $this->getOneDS($idUser);
        $data['bahasa']     = $this->getOneBS($idUser);

        $poin =0;
        $profileArray = array();
        $sosmedArray = array();
        $profileLain = array();
        $ok = 0;
        foreach($data['user2']->result() as $row){ //20 poin

            if($row->objektif!=null){
                $poin+=7;
                $ok+=1;
            }else{
               array_push($profileLain, "Objektif Belum terisi" );
            }

            if($row->preferensiLokasi1!=0){
                $poin+=6;
                $ok+=1;
            }else{
               array_push($profileLain, "Lokasi Kerja belum terisi");
            }


            if($row->domisili!=null){
                $poin+=7;
                $ok+=1;
            }else{
               array_push($profileArray, "Domisili Belum terisi");
            }
          
            if($row->foto!=''){
                $poin+=5;
                $ok+=1;
            }else{
               array_push($profileArray, "Foto Belum terupload");
            }

            //sosmed
            if($row->facebook==null || $row->linkedin ==null || $row->twitter == null || $row->instagram == null){
               array_push($sosmedArray, "Ada akun Sosial Media belum terisi");
            }else{
                 $poin+=5;
            }
        }

        //pendidikan 20
        $pendidikan = count($data['pendidikan']->result_array());
        $temp = $pendidikan*10;
        $poin+=$temp;
        $pendidikanArray = array();
        if($pendidikan < 2){
            $ok+=1;
            $notif = array("Data pendidikan terisi ".$pendidikan."/2");
               array_push($pendidikanArray, $notif);
        }else if($pendidikan ==0){
                $notif = array("Data pendidikan belum terisi ".$pendidikan."/2");
               array_push($pendidikanArray, $notif);
        }else{
            $ok+=1;
        }

        //pengalaman 20 poin
        $pengalaman = count($data['pengalaman']->result_array());
        $pengalamanArray = array();
        if($pengalaman < 3 || $pengalaman >=1){
                $ok+=1;

             $temp = $pengalaman*10;
             $poin+=$temp;
            $notif = array("Data pengalaman terisi ".$pengalaman."");
               array_push($pengalamanArray, $notif);
        }else if($pengalaman ==0){
             $notif = array("Data pengalaman belum terisi");
               array_push($pengalamanArray, $notif);
        }else{
             $temp = 20;
                $ok+=1;
             $poin+=$temp;  

        } 

        //skill 20 poin
        $skill = count($data['skill']->result_array());
        $skillArray = array();
        if($skill < 10 || $skill >= 1){
            $ok+=1;
             $temp = $skill*2;
             $poin+=$temp;
             $notif = array("Data skill terisi ".$skill."/10");
               array_push($skillArray, $notif);
        }else if($skill == 10){
                $ok+=1;
             $temp = 30;
             $poin+=$temp;
        }else if($skill==0){
             $notif = array("Data Keahlian Belum terisi");
            array_push($skillArray, $notif);
        }

          //bahasa 10 poin
        $bahasa = count($data['bahasa']->result_array());
        $bahasaArray = array();
        if($bahasa < 2 || $bahasa>=1){
            $ok +=1;

             $temp = $bahasa*5;
             $poin+=$temp;
            $notif = array("Data bahasa terisi ".$bahasa." /5");
               array_push($bahasaArray, $notif);
        }else if($bahasa==0){
               $notif = array("Data bahasa belum terisi");
               array_push($bahasaArray, $notif);
        }else{
            $ok +=1;
             $temp = 10;
             $poin+=$temp;
        } 

        $status = array(
            'profile' => $profileArray,
            'informasi' => $profileLain,
            'sosmed' => $sosmedArray,
            'pendidikan' => $pendidikanArray,
            'pengalaman' => $pengalamanArray,
            'ahli' => $skillArray,
            'bahasa' => $bahasaArray,
            );
        if($param!=null){
           return $ok;
        }else{
           echo json_encode(array($poin,$ok,$status));
        }
    }

	public function cekSeason(){
        if(!$this->session->userdata('login')){
        	redirect('Main');
        }
	}

    public function getFoto(){
        $idUser = $this->getIdUser();
        $data= $this->DU->getFoto($idUser);
        if($data[0]['foto'] != null || $data[0]['foto'] !=''){
           return  $data[0]['foto'];
        }else{
           return  FALSE;
        }
    }



	//Data User
	public function getOneDU($idUser)
	{
		$data = $this->DU->getOneDU($idUser);
		return $data;
	} 

	public function getOneDU2($idUser)
	{
		$data = $this->DU->getOneDU2($idUser);
		return $data;
	} 

	public function getAllDU()
	{
		$data = $this->DU->getAllDu();
		return $data;
	}

	//Data Pendidikan
	public function getOneDD($idUser)
	{
		$data = $this->DD->getOneDD($idUser);
		return $data;
	} 

	public function getAllDD()
	{
		$data = $this->DD->getAllDD();
		return $data;
	}

	//Data Pengalaman
	public function getOneDP($idUser)
	{
		$data = $this->DP->getOneDP($idUser);
		return $data;
	} 

	public function getAllDP()
	{
		$data = $this->DP->getAllDP();
		return $data;
	}

	//Data Jurusan
	public function getOneDBD($idUser)
	{
		$data = $this->DBD->getOneDBD($idUser);
		return $data;
	} 

	public function getAllDBD()
	{
		$data = $this->DBD->getAllDBD();
		return $data;
	}

	//Data Skill
	public function getOneDS($idUser)
	{
		$data = $this->DS->getOneDS($idUser);
		return $data;
	} 

	public function getAllDS()
	{
		$data = $this->DS->getAllDS();
		return $data;
	}


	//Data Base Info
	public function getOneDBI($idUser)
	{
		$data = $this->DBI->getOneDBI($idUser);
		return $data;
	} 

	public function getAllDBI()
	{
		$data = $this->DBI->getAllDBI();
		return $data;
	}

	//Data Statistik
	public function getOneDST($idUser)
	{
		$data = $this->DST->getOneDST($idUser);
		return $data;
	} 

	public function getAllDST()
	{
		$data = $this->DST->getAllDST();
		return $data;
	}

	public function getOneBS($idUser)
	{
		$data = $this->DU->getOneBahasa($idUser);
		return $data;
	}

	private function inputBidang()
	{
		$bidang = array(" Agrikultur/Aquakultur/Perhutanan ", " Apoteker ", " Arsitektur ", " Biologi ", " BioTeknologi ", " Bisnis/Administrasi/Manajemen ", " Ekonomi ", " Farmasi ", " Filosofi ", " Fisika ", " Geologi/Geofisika ", " Hukum ", " Ilmu & Manajemen Olahraga ", " Ilmu Geografi ", " Ilmu Kelautan ", "Ilmu Komputer/Teknologi Informasi ", " Ilmu Pengetahuan & Teknologi ", " Ilmu Politik ", " Ilmu Sosial/Sosiologi ", " Jurnalisme ", " Kedokteran ", " Kedokteran Gigi ", " Kedokteran Hewan ", " Kemanusiaan/Pengetahuan Budaya ", " Keperawatan ", " Keuangan/Akuntansi/Perbankan ", " Kimia ", " Komersial ", " Komunikasi Massa ", " Linguistik/Bahasa ", " Logistik/Transportasi ", " Manajemen HR ", " Manajemen Pelayanan Makanan & Minuman ", " Manajemen Perpustakaan ", " Matematika ", " Musik/Seni Panggung ", " Operasi Pesawat Terbang/Manajemen Bandara ", " Optometri ", " Pelayanan & Manajemen Perlindungan ", " Pemasaran ", " Pendidikan/Pengajaran/Pelatihan ", " Pengembangan Properti/Manajemen Real Estate ", " Perhotelan/Pariwisata/Manajemen Hotel ", " Periklanan/Media ", " Personal Service ", " Psikologi ", " Sejarah ", " Sekretari ", " Seni/Desain/Multimedia Kreatif ", " Studi Perkotaan/Perencanaan Kota ", " Survei Kuantitas ", " Teknik (Aviasi/Penerbangan/Astronotika) ", " Teknik (Bioteknologi/Biomedikal) ", " Teknik (Elektro) ", " Teknik (Fabrikasi/Peralatan Metal & Pencelupan/Pengelasan) ", " Teknik (Ilmu Materi) ", " Teknik (Industri) ", " Teknik (Kelautan) ", " Teknik (Komputer/Telekomunikasi) ", " Teknik (Lainnya) ", " Teknik (Lingkungan/Kesehatan/Keamanan) ", " Teknik (Mechatronik/Elektromekanikal) ", " Teknik (Mekanikal) ", " Teknik (Pertambangan/Mineral) ", " Teknik (Petroleum/Minyak/Gas) ", " Teknik Kimia ", " Teknik Sipil ", " Teknologi Pangan/Nutrisi/Gizi ", " Tekstil/Fashion Design ", " Terapi Fisik/Fisioterapi ", " Lainnya ");
		$data = array();
		foreach($bidang as $row){
			$data = array(
					'bidang' => $row
				);
			$this->DBD->inputBidang($data);
	
		}
	}

	public function getMail(){
		if($this->session->userdata('login')){
			return $this->session->userdata['login']['email'];
		}
	}

	public function getNama(){
		if($this->session->userdata('login')){
			return $this->session->userdata['login']['username'];
		}
	}

	public function getIdUser(){
		if($this->session->userdata('login')){
			return $this->session->userdata['login']['id_user'];
		}
	}


	public function cekAuth(){
        if(!$this->session->userdata('login')){
            redirect('main');
        }
    }

    public function getRegencies(){
        $data = $this->DU->getRegencies();
        echo  json_encode($data->result());
    }

    public function getRegencies2(){
        $data = $this->DU->getRegencies();
        return  $data;
    }

    public function cekRegenciesbyId($name=''){
    	if($this->input->post('param')){
    		$name = $this->input->post('param');
    	}
    	$cek = $this->DU->cekRegencies($name);
    	if($cek->result_array()!=null){
    		return $cek->result();
    	}else{
    		return FALSE;
    	}
    }

    public function getSpesialisasi(){
    	$data = $this->DU->getSpesialisasi();
    	return $data;
    }

    public function getIndustri(){
    	$data = $this->DU->getIndustri();
    	return $data;
    }

    public function getSpesialisasiAll(){
    	$data = $this->DS->getBidangPekerjaanAll();
    	echo json_encode($data->result());
    }

    public function getBidangPekerjaanAll(){
		$data = $this->DU->getBidangPekerjaanAll2();
    	echo json_encode($data->result());
    }
    //base template
    public function resetTemplate(){
    	$id_user = $this->getIdUser();
    	$data = $this->DT->resetTemplate($id_user);
    }
    
    public function getLastBidang(){
        $data = $this->DP->getLastBidang();
        $temp = $data->result();

        return $hasil = $temp[0]->id_bidang_pekerjaan2+1;
    }

}
