<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once (dirname(__FILE__) . "/Base.php");

class Main extends Base {

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
                $this->load->library('recaptcha');
        }

    public function index(){
     /*   if($this->session->userdata('login')){
            redirect('user/profile');
        }else{*/
            $this->load->view('main/home');
        //}
    }

    public function redirect($url=""){   
        $data['url'] = base64_decode(urldecode($url));
        $this->load->view('redirect',$data);
    }

    public function md5($string){
        echo md5($string);
    }

    
  public function logOut(){
    session_destroy();
    redirect('main');
  }
}
