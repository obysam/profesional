<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once (dirname(__FILE__) . "/Base.php");

class User extends Base {

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

    public function index(){
        if($this->session->userdata('login')){
            $this->profile();
        }else{
            redirect('Main');
        }
    }

    public function getUserData(){
        $id = $this->getIdUser();
        $data = $this->DU->getOneDU2($id);

        foreach($data->result() as $row){
            if($row->preferensiLokasi1 != 0){
                $row->preferensiLokasi1 = $this->getLokasibyID($row->preferensiLokasi1);
            }
            if($row->preferensiLokasi2 != 0){ 
               $row->preferensiLokasi2 = $this->getLokasibyID($row->preferensiLokasi2);
            }
            if($row->preferensiLokasi3 != 0){
                $row->preferensiLokasi3 = $this->getLokasibyID($row->preferensiLokasi3);
            }
            if($row->domisili != ""){
                $row->domisili = $this->getLokasibyID($row->domisili);
            }
             if($row->tempat_lahir != ""){
                $row->tempat_lahir = $this->getLokasibyID($row->tempat_lahir);
            }
        }
      //  echo $row->preferensiLokasi3;
       echo json_encode($data->result());
    }

    public function getLokasibyID($id){
        $data = $this->DU->getLokasibyId($id);
        return $data[0]->name;
    }

    public function updateFoto(){
        $idUser = $this->getIdUser();
        $config['upload_path'] = './assets/img/upload';
        $config['allowed_types'] = 'jpg|png';
        $config['allowed_types'] = 'jpg|png';
        $config['file_name'] = $idUser;
        $config['max_size']  = '7000';
  
        $this->load->library('upload', $config);
    
        if (!$this->upload->do_upload('file')){
            $status = "error";
            $msg = $this->upload->display_errors();
        }
        else{
            $dataupload = $this->upload->data();
            $config2['image_library'] = 'gd2';  
            $config2['source_image'] = './assets/img/upload/'.$dataupload["file_name"];  
            $config2['create_thumb'] = FALSE;  
            $config2['maintain_ratio'] = TRUE;  
            $config2['quality'] = '70%';  
            $config2['width'] = '600';  
            $config2['height'] = '300';  
            $config2['new_image'] = './assets/img/upload/'.$dataupload["file_name"];;  
            $this->load->library('image_lib', $config2);  
            $this->image_lib->resize();  

            $status = "success";
            $msg = $dataupload['file_name']." berhasil diupload";
           
         
            //hapus foto lama
            $cekFoto = $this->getFoto();
            if($cekFoto != FALSE){
                unlink('./assets/img/upload/'.$cekFoto);
            }
            $data = array(
                'id_user' => $idUser,
                'foto'    => $dataupload['file_name']
                );
            $this->DU->updateFoto($data);
        }
        $this->output->set_content_type('application/json')->set_output(json_encode(array('status'=>$status,'msg'=>$msg)));
     }

     public function pecahFoto($string, $idUser){
        $posisi=explode(".",$string);
        $temp = $posisi[0]."-".$idUser;
        $posisi[0] = $temp;
        $hasil = implode('.', $posisi);
        return $hasil;
     }

     public function updateUser(){
        $myTime = strtotime($this->input->post('tanggal_lahir')); 
        $tgl    = date("Y-m-d", $myTime);

        $getLokasi1 = $this->cekRegenciesbyId(trim($this->input->post('tempat_lahir')));
        if($getLokasi1==FALSE){
            echo "Tempat Lahir"; 
            exit;    
        }else{
            $lok1 = $getLokasi1[0]->id_alt;
        }

        $getLokasi2 = $this->cekRegenciesbyId(trim($this->input->post('domisili')));
        if($getLokasi2==FALSE){
            echo "Domisli"; 
            exit;    
        }else{
            $lok2 = $getLokasi2[0]->id_alt;
        }

        $dataUser = array(
                'id_user'       => $this->getIdUser(),
                'tempat_lahir'  => $lok1,
                'tanggal_lahir' => $tgl,
                'nama'          => $this->input->post('nama'),
                'jenisKelamin'  => $this->input->post('jenisKelamin'),
                'statusPernikahan'  => $this->input->post('statusPernikahan'),
                'domisili'      => $lok2

            );
        $this->DU->updateUser($dataUser);
        echo true;
    }

    public function updateInformasi(){
        $gaji = 0;
        $publik = 0;
        if($this->input->post('showGaji')=='true'){
            $gaji = 1;
        }
        if($this->input->post('showPublik')=='true'){
            $publik = 1;
        }
        //ambil lokasi
        $lok1 = 0;
        $getLokasi1 = $this->cekRegenciesbyId(trim($this->input->post('preferensiLokasi1')));
        if($getLokasi1==FALSE){
            echo "lokasi"; 
            exit;    
        }else{
            $lok1 = $getLokasi1[0]->id_alt;
        }
        $lok2 = 0;
        if($this->input->post('preferensiLokasi2')!=""){
            $getLokasi2 = $this->cekRegenciesbyId(trim($this->input->post('preferensiLokasi2')));
            if($getLokasi2==FALSE){
                echo "lokasi"; 
                exit;    
            }else{
                $lok2=$getLokasi2[0]->id_alt;
            }
        }
        $lok3 =0;
        if($this->input->post('preferensiLokasi3')!=""){
            $getLokasi3 = $this->cekRegenciesbyId(trim($this->input->post('preferensiLokasi3')));
            if($getLokasi3==FALSE){
                echo "lokasi"; 
                exit;    
            }else{
                $lok3=$getLokasi3[0]->id_alt;

            }
        }

        $data = array(
            'id_user'       => $this->getIdUser(),
            'gaji'          => $this->input->post('gaji'),
            'showGaji'      => $gaji,
            'showPublik'    => $publik,
            'objektif'      => $this->input->post('objektif'),
            'bidangUtama'      => $this->input->post('bidangUtama'),
            'tingkatPengalaman'      => $this->input->post('tingkatPengalaman'),
            'preferensiLokasi1' => $lok1,
            'preferensiLokasi2' => $lok2,
            'preferensiLokasi3' => $lok3
            );
        $this->DU->updateUser($data);
    }

    public function updatePengalaman(){
      //  $timezone = new DateTimeZone('America/New_York');
   
        $temp = $this->input->post('tanggal_gabung');
        $strvar = (string) $temp;
        $date     =new DateTime($strvar);
        $tglMasuk = $date->format("Y-m-d");
        $tglKeluar =null;
      
        if(strlen($this->input->post('tanggal_keluar')>0)){
              $temp2 = $this->input->post('tanggal_keluar');
              $strvar2 = (string) $temp2;
              $date2     =new DateTime($strvar2);
              $tglKeluar = $date2->format("Y-m-d");

                //validasi tanggal
         /*   $days = (strtotime($tglKeluar) - strtotime($tglMasuk)) / (60 * 60 * 24);
                if($days<0){
                    echo "tahun";
                    exit;
                }*/
        }
        
        //ambil lokasi
        $getLokasi = $this->cekRegenciesbyId(trim($this->input->post('lokasi')));
        if($getLokasi==FALSE){
            echo "lokasi"; 
            exit;    
        }

        $bidang = $this->input->post('id_bidang_pekerjaan');

        //cek Apakah ada bidang baru
        if($this->input->post('bidangBaru') != "" || $this->input->post('bidangBaru') != null){
                $bidang =  $this->getLastBidang();
                $dataBidang = array(
                    'id_user_bidang'        => $this->getIdUser(),
                    'id_spesialisasi'       => $this->input->post('id_spesialisasi'),
                    'id_bidang_pekerjaan2'  => $bidang,
                    'nama_bidang'           => $this->input->post('bidangBaru'),
                    'status'                => 0
                    );
                $this->DP->insertBidangPekerjaan($dataBidang);
        }
      
        $dataPengalaman = array(
                'id_user'        => $this->getIdUser(),
                'id_pengalaman'   => $this->input->post('id_pengalaman'),
                'perusahaan'      => $this->input->post('perusahaan'),
                'posisi'          => $this->input->post('posisi'),
                'lokasi'          => $getLokasi[0]->id_alt,
                'id_spesialisasi' => $this->input->post('id_spesialisasi'),
                'id_bidang_pekerjaan' => $bidang,
                'tingkatan_posisi' => $this->input->post('tingkatan_posisi'),
                'id_industri'     => $this->input->post('id_industri'),
                'tanggal_gabung'  => $tglMasuk,
                'tanggal_keluar'  => $tglKeluar,
                'detail'          => $this->input->post('detail'),
                'checkOut'        => $this->input->post('checkOut'),
                'gaji'        => $this->input->post('gaji'),
            );
        if($dataPengalaman['id_pengalaman']==null){
            $this->DP->insertPengalaman($dataPengalaman);
        }else{
            $this->DP->updatePengalaman($dataPengalaman);
        }
    }

    public function updateStatusPengalaman(){

        echo $this->input->post('statusPengalaman');
        $data = array(
            'id_user' => $this->getIdUser(),
            'statusPengalaman'  => $this->input->post('statusPengalaman')
            );
        print_r($data);
        $this->DU->updateUser($data);
    }

    public function updatesosmed(){
        $data = array(
            'id_user'  => $this->getIdUser(),
            'facebook' => $this->input->post('facebook'),
            'twitter'  => $this->input->post('twitter'),
            'instagram'=> $this->input->post('instagram'),
            'linkedin' => $this->input->post('linkedin'),
            );

        $this->DU->updateUser($data);
    }

    public function updatePendidikan(){
        $thnLulus=null;
        if($this->input->post('thn_lulus')!=''){
            $thnLulus = $this->input->post('thn_lulus');
        }

        $getLokasi = $this->cekRegenciesbyId(trim($this->input->post('lokasi')));
        if($getLokasi==FALSE){
             $this->reply('0','Data Lokasi Tidak Valid');
             return FALSE;
        }   

        $dataPendidikan = array(
                'id_user'         => $this->getIdUser(),
                'id_pendidikan'   => $this->input->post('id_pendidikan'),
                'sekolah'         => $this->input->post('sekolah'),
                'tingkatan'       => $this->input->post('tingkatan'),
                'lokasi'          => $getLokasi[0]->id_alt,
                'nilai'           => $this->input->post('nilai'),
                'skala'           => $this->input->post('skala'),
                'thn_lulus'       => $thnLulus,
                'thn_masuk'       => $this->input->post('thn_masuk'),
                'detail'          => $this->input->post('detail'),
                'id_bidang_pendidikan'  => $this->input->post('id_bidang_pendidikan')
            );
        if($dataPendidikan['id_pendidikan']==null){
            $this->DD->insertPendidikan($dataPendidikan);
        }else{
            $this->DD->updatePendidikan($dataPendidikan);
        }
        $this->reply('1','Data Pendidikan Terupdate');
    }


    public function deletePengalaman(){
        $id_pengalaman = $this->input->post('id_pengalaman');

        $data = $this->DP->hapusPengalaman($id_pengalaman);

        echo $this->reply('1','Data Terhapus');
    }

     public function deletePendidikan(){
        $id_pendidikan = $this->input->post('id_pendidikan');

        $data = $this->DD->hapuspendidikan($id_pendidikan);

        echo $this->reply('1','Data Terhapus');
    }

    public function getPengalamanbyID(){
        $id_pengalaman = $this->input->post('id_pengalaman');
        $data = $this->DP->getPengalamanbyID($id_pengalaman);
        echo json_encode($data->result());
    }

    public function getPendidikanbyID(){
        $id_pendidikan = $this->input->post('id_pendidikan');
        $data =  $this->DD->getPendidikanbyID($id_pendidikan);
        echo json_encode($data->result());
    }

    public function reply($code='',$msg='')
        {
            echo json_encode ($reply=array('code'=>$code,'msg'=>$msg));
        }

    public function sendMailConfirm(){

        $config = array(
          'protocol'    => 'smtp',
          'smtp_host'   => 'ssl://mail.profesional.id',
          'smtp_port'   => 465,
          'smtp_user'   => 'oby@profesional.id', 
          'smtp_pass'   => 'Akuganteng15', 
          'mailtype'    => 'html',
          'charset'     => 'iso-8859-1',
          'wordwrap'    => TRUE
        );

        $this->load->library('email', $config);

        $this->email->initialize($config); // Add 
        $this->email->from('admin@profesional.id');
        $this->email->to('magtadix@gmail.com');
        $this->email->subject('testing');

        $message = $this->load->view('mail/confirm','',TRUE);
        $this->email->message($message);

        if($this->email->send()) {
             
        } else {
          print_r($this->email->print_debugger());  
        }
    }

     public function sendMailForget(){

        $config = array(
          'protocol'    => 'smtp',
          'smtp_host'   => 'ssl://mail.profesional.id',
          'smtp_port'   => 465,
          'smtp_user'   => 'oby@profesional.id', 
          'smtp_pass'   => 'Akuganteng15', 
          'mailtype'    => 'html',
          'charset'     => 'iso-8859-1',
          'wordwrap'    => TRUE
        );

        $this->load->library('email', $config);

        $this->email->initialize($config); // Add 
        $this->email->from('admin@profesional.id');
        $this->email->to('magtadix@gmail.com');
        $this->email->subject('Rekuest Anda mengenai Password di Profesional.id');

        $message = $this->load->view('mail/forget','',TRUE);
        $this->email->message($message);

        if($this->email->send()) {
             
        } else {
          print_r($this->email->print_debugger());  
        }

    }

    public function viewMail(){
        $this->load->view('mail/confirm');
    }


    public function updatePassword(){
     //   $this->cekAuth();
            $cpassword =  md5($this->input->post('cpassword'));
            
          $data=array(
                'email'     => $this->getMail(),
                'password'  => md5($this->input->post('password')),
                'lupaPassword' => ''
            );
          if($data['password']!=$cpassword){
            return $this->reply('1003','password tidak sama');
          }
          if($this->session->has_userdata('password')){
                 $this->session->unset_userdata('password');
           }
          $this->DU->updatePassword($data);
          return $this->reply(1000,"Update Password berhasil");
    }

    public function session(){
        $data = $this->session->userdata('login');
        print_r($data);
    }

    public function dummy(){
         $newdata = array(
                    'username'  => 'obyganteng',
                    'email'     => 'magtadix@gmail.com',
                    'id_user'   => 'PF290322536',
                    'logged_in' => TRUE,
                    'authPass' => TRUE,
            );
            $this->session->set_userdata('login', $newdata);
    }

    public function sidebar($kode){
        $data['sbiodata'] =null;
        $data['spengalaman'] =null;
        $data['spendidikan'] =null;
        $data['sahli'] =null;
        $data['sbahasa'] =null;
        $data['sinfo'] =null;
        $data['sSosmed'] =null;

        if($kode==1){
             $data['sbiodata'] ='active';
        }else if($kode==2){
             $data['spengalaman'] ='active';
        }else if($kode==3){
             $data['spendidikan'] ='active';
        }else if($kode==4){
             $data['sahli'] ='active';
        }else if($kode==5){
             $data['sbahasa'] ='active';
        }else if($kode==6){
             $data['sinfo'] ='active';
        }else if($kode==7){
             $data['sSosmed'] ='active';
        }
        return $data;
    }

    public function profile(){
        $this->cekAuth();
        $nama = $this->getNama();
        $idUser = $this->getIdUser();
        $data['title']   = 'Profil '.$nama;
        $data['content'] = 'profile/profile';
      //  $data['last']   = $this->getLastSpesialisasi();
        $data['regency'] = $this->getRegencies2();
        $data['sidebar'] = 1; 
        $data['page']    = 'profile';
        $this->template($data);
    }

    function getLastSpesialisasi(){
    $data = $this->DS->getLast();
    foreach($data->result() as $row){
        $id = $row->id_spesialisasi;
    }
    $id+=1;
    $temp = $this->DS->getSpesialisasibyID($id);
    foreach($temp->result() as $riw){
        echo "<h3>No :".$riw->id_spesialisasi." ---". $riw->spesialisasi;
    }
    }

    public function resetPassword(){
        $this->cekAuth();
        $nama = $this->getNama();
       // $idUser = $this->getIdUser();
        $data['title']   = 'Halaman Reset Password '.$nama;
        $data['content'] = 'profile/resetPassword';
       // $data['regency'] = $this->getRegencies();
        $data['sidebar'] = 0;
        $data['page']    = 'resetPassword';
        $this->template($data);
    }

    public function setUsername(){
       // cek username apakah sudah pernah di ganti
        $this->cekAuth();
        $idUser = $this->getIdUser();
        $cek = $this->DU->cekUsername($idUser);
        if($cek[0]['username'] != null){
               $this->session->unset_userdata('password');
               echo "<script>alert('Username hanya bisa di rubah sekali, terima kasih.'); window.location ='".base_url()."user/profile';</script>";  
        }
        $data['title']   = 'Set Username CV Anda';
        $data['content'] = 'profile/setUsername';
        $this->session->set_userdata('password',true);
       // $data['regency'] = $this->getRegencies();
        $data['sidebar'] = 0;
        $data['page']    = 'setUsername';
        $data['template'] = $this->DT->getTemplate();
        $this->template($data);
    }

    public function cekUsername(){
          $string = $this->input->post('username');
          $cek = $this->DU->authUsername($string);
        if($cek != null){
            $this->reply('1007','Username Tidak Tersedia');
        }else{
             $this->reply('1000','Aman');
        }
   }

    public function informasi(){
        $this->cekAuth();
        $nama = $this->getNama();
       // $idUser = $this->getIdUser();
        $data['title']   = 'Informasi Tambahan '.$nama;
        $data['content'] = 'profile/informasi';
       // $data['regency'] = $this->getRegencies();
        $data['sidebar'] = 6;
        $data['page']    = 'informasi';
        $data['tingkat'] = $this->DP->getTingkatPengalaman();
        $this->template($data);
    }

    public function pengalaman(){
        $this->cekAuth();

        $nama = $this->getNama();
       // $idUser = $this->getIdUser();
        $data['title']   = 'Halaman Pengalaman '.$nama;
        $data['content'] = 'profile/pengalaman';
       // $data['regency'] = $this->getRegencies();
        $data['industri']= $this->getIndustri();
        $data['sidebar'] = 2;
        $data['jabatan'] = $this->DU->getJabatan();
        $data['spesialisasi'] = $this->getspesialisasi();
        $data['page']    = 'pengalaman';
        $data['TP']      = $this->DU->getTP($this->getIdUser());
        $this->template($data);
    }

    public function pendidikan(){
        $this->cekAuth();

        $nama = $this->getNama();
        $data['title']      = 'Halaman Pendidikan '.$nama;
        $data['content']    = 'profile/pendidikan';
        $data['sidebar']    = 3;
      //$data['regency']    = $this->getRegencies();
        $data['bidang_pendidikan'] = $this->DU->getBidangPendidikan();
        $data['page']    = 'pendidikan';
        $this->template($data);
    }

    public function templates(){
        $this->cekAuth();

        $data['title']      = 'CV Online Template yang tersedia';
        $data['content']    = 'profile/template';
        $data['sidebar']    = 0;
        $data['template'] = $this->DT->getTemplate();
        $data['page']    = 'template';
        $this->template($data);
    }


   public function ahli(){
        $this->cekAuth();

        $data['title']      = "Keahlian Anda";
        $data['content']      = "profile/ahli";
        $data['sidebar']      = 4;
        $data['page']  = 'ahli';
        $this->template($data);
   }

   public function tabelbahasa(){
        $idUser = $this->getIdUser();
        $data['ahli'] = $this->DU->getOneBahasa($idUser);
        $this->load->view('profile/tabel-bahasa',$data);
    }

    public function tabelahli(){
        $idUser = $this->getIdUser();
        $data['ahli'] = $this->DS->getOneDS($idUser);
        $this->load->view('profile/tabelahli',$data);
    }

    public function tabelPengalaman(){
         $idUser = $this->getIdUser();
          $data['pengalaman'] = $this->DP->getOneDP($idUser);
          $this->load->view('profile/tabel-pengalaman',$data);
    }


    public function tabelPendidikan(){
          $idUser = $this->getIdUser();
          $data['pendidikan'] = $this->DD->getOneDD($idUser);
          $this->load->view('profile/tabel-pendidikan',$data);
    }

    public function template($data){
        $data['username'] = $this->session->userdata['login']['username'];
        $this->load->view('template/header',$data);
        $this->load->view('loader');
        if(!$this->session->has_userdata('password')){
             $datax = $this->sidebar($data['sidebar']);
             $this->load->view('template/sidebar',$datax);
        }
     
        $this->load->view($data['content'],$data);
        $this->load->view('template/footer');
        $this->load->view('template/js_'.$data['page']);

    }


  public function inputSpesialisasi(){
   
    $this->DU->insertSpesialisasi($data);
   }

   public function insertBP()
   {
    $bp = $this->input->post('bidang_pendidikan');
    $data = $this->DS->getLast();
      foreach($data->result() as $row){
            $id = $row->id_spesialisasi;
     }
    foreach($bp as $row){
        $datax[] = array(
            'id_spesialisasi' => $id+1,
            'nama_bidang' => $row
            );
    }
    $this->DU->insertBP($datax);
   }

/*   public function insertBidang(){
        $bidang = $this->input->post('nama_bidang');
        $id = $this->input->post('id');

        foreach($bidang as $row){
            $data[] = array(
                'id_spesialisasi' => $id,
                'nama_bidang'     => $row   
            );    
        }
        $this->DU->insertBidangPekerjaan($data);
   }*/

    public function insertIndustri(){
        $bidang = $this->input->post('nama_industri');
      
        foreach($bidang as $row){
            $data[] = array(
                'nama_industri'   => $row   
            );    
        }
        $this->DU->insertIndustri($data);
   }

   public function getBidangPekerjaan(){
        $data['bidang'] = FALSE;
        $id = $this->input->post('id_spesialisasi');
        if($id != null){
            $data['bidang'] = $this->DU->getBidangByID($id);
        }
       echo json_encode($data['bidang']->result_array());
   }

   public function duplicateId(){
    $lokasi = $this->getRegencies();
    $data = [];
    foreach($lokasi->result() as $row){
        $data[] = array(
            'id' => $row->id,
            'id_alt' => $row->id
            );
    }
    $this->DU->updateBatchLokasi($data);
   }

   public function cekString($string){
    if(ctype_alnum($string)){
        return TRUE;
    }else{
        return FALSE;
    }
   }

   public function inputBahasa(){
    $data = array(
            'id_user' => $this->getIdUser(),
            'bahasa'  => $this->input->post('bahasa'),
            'id_bahasa' => $this->input->post('id_bahasa'),
            'kemampuan' => $this->input->post('kemampuan')
        );
    if($data['id_bahasa']==null){
        $this->DU->insertBahasa($data);
    }else{
        $this->DU->updateBahasa($data);
    }
   }

   public function inputSkill(){
    if($this->session->userdata('login')){
    $data = array(
        'id_user' => $this->getIdUser(),
        'skill' => $this->input->post('skill'),
        'kemampuan' => $this->input->post('kemampuan'),
        'bidang' => $this->input->post('spesialisasiV'),
        'id_skill' => $this->input->post('id_skill')
        );
    if($data['id_skill']==null){
        $this->DS->insertSkill($data);
    }else{
        $this->DS->updateSkill($data);
    }
    return TRUE;
    }else{
        redirect('Main');
    }
    }


    public function deleteSkill(){
        $id = $this->input->post('id_skill');
        $this->DS->deleteSkill($id);
    }

    public function getSkillOne(){
         $id = $this->input->post('id_skill');
        $data = $this->DS->getSkillOne($id);

        echo json_encode($data->result());
    }

    public function getBahasaOne(){
         $id = $this->input->post('id_bahasa');
        $data = $this->DU->getBahasabyID($id);
        echo json_encode($data->result());
    }

    public function deleteBahasa(){
        $id = $this->input->post('id_bahasa');
        $this->DU->deleteBahasa($id);
    }

    public function bahasa(){
        $nama = $this->getNama();
       // $idUser = $this->getIdUser();
        $data['title']   = 'Bahasa yang di kuasai '.$nama;
        $data['content'] = 'profile/bahasa';
        $data['sidebar'] = 5;
        $data['page']    = 'bahasa';
        $this->template($data);
    }

    public function sosmed(){
        $nama = $this->getNama();
        $data['title']  = 'Akun Social Media';
        $data['content'] = "profile/sosmed";
        $data['sidebar'] = 7;
        $data['page']   = 'sosmed';
        $this->template($data);
    }

    public function teststring(){
        $string = "this is link to<a href='http://www.facebook.com'>facebook</a>";
        $data = $this->makeLinks($string);
        echo $data;
    }

    public function makeLinks($str) {
    $reg_exUrl = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";
    $urls = array();
    $urlsToReplace = array();
    if(preg_match_all($reg_exUrl, $str, $urls)) {
        $numOfMatches = count($urls[0]);
        $numOfUrlsToReplace = 0;
        for($i=0; $i<$numOfMatches; $i++) {
            $alreadyAdded = false;
            $numOfUrlsToReplace = count($urlsToReplace);
            for($j=0; $j<$numOfUrlsToReplace; $j++) {
                if($urlsToReplace[$j] == $urls[0][$i]) {
                    $alreadyAdded = true;
                }
            }
            if(!$alreadyAdded) {
                array_push($urlsToReplace, $urls[0][$i]);
            }
        }
        $numOfUrlsToReplace = count($urlsToReplace);
        for($i=0; $i<$numOfUrlsToReplace; $i++) {
            $str = str_replace($urlsToReplace[$i], base_url()."main/redirect/".$urlsToReplace[$i],$str);
        }
        return $str;
    } else {
        return $str;
    }
}

    public function updateTemplate(){
        $data = array(
             'id_user' => $this->session->userdata['login']['id_user'],
            'id_template' => $this->input->post('id_template'),
            'aktif' => 1
            );
        $this->resetTemplate();
        $this->DT->updateAktif($data);
    }

    public function updateUsername(){
        $username = trim($this->input->post('nama'));
        if(strlen($username)<8){
            $this->reply('1009','Username Kurang Panjang');
            return FALSE;
        }
        if(!$this->cekString($username)){
            $this->reply('1009','Tidak boleh ada Spesial Karakter');
            return FALSE;
        }

        //update username
        $datax = array(
             'id_user' => $this->session->userdata['login']['id_user'],
             'username' => $this->input->post('nama')
            );
        $this->DU->updateUsername($datax);
        //update template
          $data = array(
            'id_user' => $this->session->userdata['login']['id_user'],
            'id_template' => $this->input->post('id_template'),
            'aktif' => 1
            );
        
        $loginData = array(
                        'username'  =>  $this->input->post('nama'),
                        'email'     =>  $this->session->userdata['login']['email'],
                        'id_user'   =>  $this->session->userdata['login']['id_user'],
                        'logged_in' => TRUE
                        );
        $this->session->set_userdata('login', $loginData);

        $this->resetTemplate();
        $this->DT->updateAktif($data);
        $this->session->unset_userdata('password');
        $this->reply('1000','Username Berhasil di simpan');
    }

    public function getBidangPendidikan(){
        $id =  $this->input->post('tingkatan');
        if($id!="SMA" & $id!="SMK"){
            $id="kul";
        }
        $data = $this->DD->getBidangPen($id);
        echo json_encode($data->result_array());
    }

}