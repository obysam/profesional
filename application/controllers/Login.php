<?php 
if( ! ini_get('date.timezone') )

defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller {
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
                $this->load->library('PHPRequests');
                $this->load->library('recaptcha');
        }


	public function doLogin(){
        $captcha_answer = $this->input->post('g-recaptcha-response');
        $response = $this->recaptcha->verifyResponse($captcha_answer);    
        // Proses
        if ($response['success']) {
            // Code jika sukses
       
    		$data = array(
    			'email' => $this->input->post('email'),
    			'password' => md5($this->input->post('password'))
    			);
    		$cek = $this->checkString($this->input->post('password'));
    		if($cek == false){
    			return $this->reply('1112',"Password Hanya Boleh Menggunakan Angka Dan Huruf");
    		}
    		$cek2 = $this->checkString2($this->input->post('email'));
    		if($cek2 == false){
    			return $this->reply('1112',"Email Hanya Boleh Menggunakan Angka Dan Huruf");
    		}

    		$cek = $this->DU->cekLogin($data);
    		if($cek->result() != NULL){
    			//set session
    			foreach($cek->result() as $row){
    			     $loginData = array(
    	                    'username'  => $row->username,
    	                    'email'     => $row->email,
    	                    'id_user'   => $row->id_user,
    	                    'logged_in' => TRUE,
              );
    			}
    	         $this->session->set_userdata('login', $loginData);
    			return $this->reply('1000',"Login Sukses");
    		}else{
    			return $this->reply('1111',"Email atau Password anda salah");
    		}
        } else {
            return $this->reply('1111',"Code Captcha Anda Salah");
        }
	}

	public function register(){
        $captcha_answer = $this->input->post('g-recaptcha-response');
        $response = $this->recaptcha->verifyResponse($captcha_answer);      
            // Proses
            if ($response['success']) {
                // Code jika sukses
            $email = $this->input->post('email');
            $cek = $this->DU->cek_mail($email);
            if($cek->num_rows() >0){
                return json_encode($this->reply(0, "Email Sudah terdaftar, Silahkan Gunakan Lupa Password"));
            }else if($cek->num_rows() == 0){
                $id = $this->generateID();
                $cpassword = md5($this->input->post('cpassword'));
               	$data = array(
    				'email' => $email,
    				'password' => md5($this->input->post('password')),
    				'autentifikasi' => md5(rand(1000,99999)),
    				'id_user'  => $id
    			);
    		if($data['password']!=$cpassword){
    			return $this->reply('1112',"Password Tidak sama");
    		}
                $this->DU->register($data);
                $this->sendMailConfirm($email,$data['autentifikasi']);
                return $this->reply(1000, 'Registrasi Berhasil Silahkan Cek Inbox atau Kotak Spam');
            }
        }else{
            return $this->reply('1111',"Code Captcha Anda Salah");
        }
    }


    public function sendMailConfirm($email,$auth){
  /*      $config = array(
          'protocol'    =>'sendmail',
          'mailpath' => '/usr/sbin/sendmail',
          'charset' => 'iso-8859-1',
          'wordwrap' => TRUE
        );*/
        
        $config = array(
          'protocol'    => 'smtp',
          'smtp_host'   => 'mail.profesional.id',
          'smtp_port'   => 25,
          'smtp_user'   => 'admin@profesional.id', 
          'smtp_pass'   => 'Q8KXPyi4myCl', 
          'mailtype'    => 'html',
          'charset'     => 'iso-8859-1',
          'wordwrap'    => TRUE,
          'newline'     => "\r\n",
          'crlf'        => "\r\n"
        );
 
        $this->load->library('email');
        $this->email->initialize($config); 
        $this->email->from('no-reply@profesional.id',"Admin Profesional.ID");
        $this->email->to($email);
        $this->email->subject('Pendaftaran Akun Profesional.ID '.$email);
        $this->email->set_newline("\r\n");          

        $message = $this->load->view('mail/confirm',array('email'=>$email,'auth'=>$auth),TRUE);
        //$message = "oby ganteng";
        $this->email->message($message);
        if($this->email->send()) {
          
        } else {
          print_r($this->email->print_debugger());  
        }
        
    }


     public function sendMailForget($email,$auth){

            $config = array(
          'protocol'    => 'smtp',
          'smtp_host'   => 'mail.profesional.id',
          'smtp_port'   => 25,
          'smtp_user'   => 'admin@profesional.id', 
          'smtp_pass'   => 'Q8KXPyi4myCl', 
          'mailtype'    => 'html',
          'charset'     => 'iso-8859-1',
          'wordwrap'    => TRUE,
          'newline'     => "\r\n",
          'crlf'        => "\r\n"
        );

        $this->load->library('email', $config);

        $this->email->initialize($config); // Add 
        $this->email->from('admin@profesional.id');
        $this->email->to($email);
        $this->email->subject('Rekuest Anda mengenai Password di Profesional.ID');

        $message = $this->load->view('mail/forget',array('email'=>$email,'auth'=>$auth),TRUE);
        $this->email->message($message);

        if($this->email->send()) {
             
        } else {
          print_r($this->email->print_debugger());  
        }

    }

    public function viewMail(){
        $this->load->view('mail/confirm');
    }

    public function confirm($auth){
        $cek = $this->DU->cekAuth($auth);

        if($cek->num_rows() > 0){
            //change status
            foreach($cek->result() as $row){
                $this->DU->aktifStatus($row->email);
                   $loginData = array(
	                    'username'  => $row->username,
	                    'email'     => $row->email,
	                    'id_user'   => $row->id_user,
	                    'logged_in' => TRUE
	            );
                $this->session->set_userdata('login', $loginData);
                $this->insertTemplateGratis();
                $this->setDefaultTemplate($loginData['id_user']);
                redirect('user/setUsername/');
			}
      }
    }

    public function insertTemplateGratis(){
      //kasih template yang gratis
      $grabTemplate = $this->DT->getFreeTemplate();
      $data = array();
      foreach($grabTemplate->result() as $row){
        $data[] = array(
            'id_user' => $this->session->userdata['login']['id_user'],
            'id_template' => $row->id_template,
            'aktif' => 0
          );
      }
      $this->DT->insertBatchTemplate($data);
    }

    public function setDefaultTemplate($id_user){
        $data = array(
            'id_user' => $id_user,
            'id_template' => 1,
            'aktif' => 1
          );
        $this->DT->updateAktif($data);

    }

    public function forgetPassword(){
		$email = $this->input->post('email');       
        $cek = $this->DU->cek_mail($email);
        if($cek->num_rows() >0){
            $data = array(
                'email' => $email,
                'lupaPassword' => md5(rand(1000,99999))
                );
            $this->DU->setLupaPassword($data);
            $this->sendMailForget($email,$data['lupaPassword']);
            return json_encode($this->reply(1000, "Email Konfirmasi telah di kirimkan"));
        }else{
            return json_encode($this->reply(1003, "Email Tidak Terdaftar"));
        }
    }

    public function forgetAuth($auth){
        $cek = $this->DU->cekForgetAuth($auth);

        if($cek->num_rows() > 0){
            //change status
            foreach($cek->result() as $row){
                $newdata = array(
                    'username'  => $row->nama,
                    'email'     => $row->email,
                    'id_user'   => $row->id_user,
                    'logged_in' => TRUE,
                    'authPass'  => TRUE
            );
            $this->session->set_userdata('login', $newdata);
            $this->session->set_userdata('password',true);
            redirect('user/resetPassword');
            }
        }else{
            return json_encode($this->reply(0, "Auth Error"));
        }
    }

    public function resetPassword(){
     //   $this->cekAuth();
          $data=array(
                'email'     => $this->getMail(),
                'password'  => md5($this->input->post('password')),
                'lupaPassword' => ''
            );
          $this->DU->updatePassword($data);
  }

	public function generateID(){

        $random = rand(11111111,999999999);
        $id = "PF".$random;

        $isAvailable = $this->DU->getOneDU($id);

        if($isAvailable->num_rows() == 0){
            return $id;
        }else{
            generateID();
        }
    }


	public function reply($code='',$msg='')
        {
            echo json_encode($reply=array('code'=>$code,'msg'=>$msg));
        }

    public function checkString($str)
    {
		if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $str))
		{
		    return false;
		}else{
			return true;
		}
    }
      public function checkString2($str)
    {
		if (preg_match('/[\'^£$%&*()}{#~?><>,|=_+¬-]/', $str))
		{
		    return false;
		}else{
			return true;
		}
    }
	}
