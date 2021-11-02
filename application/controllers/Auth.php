<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('M_auth');

	}

	public function login()
	{
		$data = array(
			'title' => 'Login - Skripsiku',
		);
		$this->load->view('auth/login', $data);
	}

	function proses_login(){
		$username = $this->input->post('username');
		$password = sha1(md5($this->input->post('password')));
		$cek = $this->M_auth->cek_login($username, $password)->num_rows();
		$auth = $this->M_auth->cek_login($username, $password)->row();
		// var_dump($auth->status);die();
		if($cek > 0 && $auth->status == 'aktif'){
			if ($auth->user_role == 'admin') {
				$data_session = array(
					'id_user' => $auth->id_user,
					'username' => $auth->username,
					'role' => $auth->user_role,
					'status' => "login",
					'bidang_kerja' => $auth->bidang_kerja,
				);
				$this->session->set_userdata($data_session);
				redirect(base_url('adminarea'));
			} else if ($auth->user_role == 'user') {
				$data_session = array(
					'id_user' => $auth->id_user,
					'username' => $auth->username,
					'role' => $auth->user_role,
					'status' => "login",
					'bidang_kerja' => $auth->bidang_kerja,
				);
				$this->session->set_userdata($data_session);
				redirect(base_url('userarea/profile'));
			} else if ($auth->user_role == 'staff') {
				$data_session = array(
					'id_user' => $auth->id_user,
					'username' => $auth->username,
					'role' => $auth->user_role,
					'status' => "login",
					'bidang_kerja' => $auth->bidang_kerja,
				);
				$this->session->set_userdata($data_session);
				redirect(base_url('adminarea'));
			}

		} else if($cek > 0 && $auth->status == 'Belum Verifikasi') {
			$this->session->set_flashdata('error','Akun belum di verifikasi, silahkan periksa email anda');
			redirect(base_url('auth/login'));
		} else {
			$this->session->set_flashdata('error','Username atau Password salah');
			redirect(base_url('auth/login'));
		}
	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('auth/login'));
	}

	public function register()
	{
		$data = array(
			'title' => 'Daftar Akun - Skripsiku',
		);
		$this->load->view('auth/register', $data);
	}

	function proses_register()
	{
		// check ketersediaan username
		$this->db->where('username', $this->input->post('user'));
		$username = $this->db->get('users')->row();

		// check ketersediaan email
		$this->db->where('email', $this->input->post('email'));
		$email = $this->db->get('users')->row();

		if ($username != NULL) {
			$this->session->set_flashdata('error','Username sudah digunakan, silahkan gunakan username lain');
			redirect(base_url('auth/register'));
		} else if ($email != NULL) {
			$this->session->set_flashdata('error','Email sudah digunakan, silahkan gunakan email lain');
			redirect(base_url('auth/register'));
		} else if ($username != NULL && $email != NULL) {
			$this->session->set_flashdata('error','Email dan Username sudah digunakan, silahkan gunakan email lain');
			redirect(base_url('auth/register'));
		} else {
			$data = array(
				'username' => $this->input->post('user'),
				'password' => sha1(md5($this->input->post('password'))),
				'email' => $this->input->post('email'),
				'phone' => '00000000000000',
				'user_role' => 'user',
				'status' => 'Belum Verifikasi',
				'date_created' => date('Y-m-d'),
				'date_updated' => date('Y-m-d'),
			);

			$id = $this->M_auth->register_user($data);

			//enkripsi id
			$encrypted_id = md5($id);

			$config = array();
			$config['charset'] = 'utf-8';
			$config['useragent'] = 'Codeigniter';
			$config['protocol']= "smtp";
			$config['mailtype']= "html";
			$config['smtp_host']= "ssl://skripsiku.sites.id";//pengaturan smtp
			$config['smtp_port']= "465";
			$config['smtp_timeout']= "400";
			$config['smtp_user']= "register@skripsiku.sites.id"; // isi dengan email kamu
			$config['smtp_pass']= "Admin1234@yx##"; // isi dengan password kamu
			$config['crlf']="\r\n"; 
			$config['newline']="\r\n"; 
			$config['wordwrap'] = TRUE;
			//memanggil library email dan set konfigurasi untuk pengiriman email

			$this->email->initialize($config);
			//konfigurasi pengiriman
			$this->email->from($config['smtp_user']);
			$this->email->to($this->input->post('email'));
			$this->email->subject("Verifikasi Akun");
			$this->email->message(
				"
				<img src='https://skripsiku.sites.id/assets/img/logos.png' width='750px'>
				<div style='width: 1000px; padding: 25px; text-align: center; background-color: #33CCFF;'>
				<h1 style='text-align:center;'>SELAMAT DATANG DI SITUS SKRIPSIKU</h1>
				<hr style='border-top: 3px solid #ccc;' width='75px'>
				<br>
				<p style='font-size: 24px;'>Untuk mengaktifkan akun anda agar dapat menikmati layanan pemesanan di Skripsiku, silahkan klik url berikut 
				untuk konfirmasi dan mengaktifkan akun anda.<br><br>
				".site_url("auth/verification/$encrypted_id").
				"<br><br>Selamat menikmati layanan dari Skripsiku</p></div>"
			);

			if($this->email->send()) {
				$this->session->set_flashdata('success','Pendaftaran berhasil, silahkan periksa email anda');
			} else {
				$this->session->set_flashdata('success','Berhasil melakukan registrasi, namu gagal mengirim verifikasi email');
			}
			redirect(base_url('auth/register'));
		}
	}

	public function verification($key)
	{
		$this->load->helper('url');
		$this->M_auth->changeActiveState($key);
		$this->session->set_flashdata('success','Selamat, akun anda telah aktif. Silahkan melakukan login');
		redirect(base_url('auth/login'));
		// echo "Selamat kamu telah memverifikasi akun kamu";
		// echo "<br><br><a href='".site_url("login")."'>Kembali ke Menu Login</a>";
	}

	public function forgot_password()  
	{  

		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');   

		if($this->form_validation->run() == FALSE) {  
			$data['title'] = 'Halaman Reset Password | Skripsiku';  
			$this->load->view('auth/forgot_password', $data); 
		}else{  
			$email = $this->input->post('email');   
			$clean = $this->security->xss_clean($email);  
			$userInfo = $this->M_auth->getUserInfoByEmail($clean);
			$tanggal = date("d M Y");  

			if(!$userInfo){  
				$this->session->set_flashdata('sukses', 'email address salah, silakan coba lagi.');  
				redirect(site_url('auth/login'),'refresh');   
			}    

            //build token   

			$token = $this->M_auth->insertToken($userInfo->id_user);              
			$qstring = $this->base64url_encode($token);           
			$url = site_url() . 'auth/reset_password/token/' . $qstring;
			$link = '<a href="' . $url . '">' . $url . '</a>';   
			$config = array();
			$config['charset'] = 'utf-8';
			$config['useragent'] = 'Codeigniter';
			$config['protocol']= "smtp";
			$config['mailtype']= "html";
            $config['smtp_host']= "ssl://skripsiku.sites.id";//pengaturan smtp
			$config['smtp_port']= "465";
			$config['smtp_timeout']= "400";
			$config['smtp_user']= "no-reply@skripsiku.sites.id"; // isi dengan email kamu
			$config['smtp_pass']= "Admin1234@yx##"; // isi dengan password kamu
            $config['crlf']="\r\n"; 
            $config['newline']="\r\n"; 
            $config['wordwrap'] = TRUE;
            //memanggil library email dan set konfigurasi untuk pengiriman email

            $this->email->initialize($config);
            //konfigurasi pengiriman
            $this->email->from($config['smtp_user']);
            $this->email->to($email);
            $this->email->subject("Permintaan Reset Password");
            $this->email->message(
            	"
            	<img src='https://skripsiku.sites.id/assets/img/logos.png' width='750px'>
            	<div style='width: 1000px; padding: 25px; text-align: center; background-color: #33CCFF;'>
            	<h1 style='text-align:center;'>PERMINTAAN RESET PASSWORD</h1>
            	<hr style='border-top: 3px solid #ccc;' width='75px'>
            	<br>
            	<p style='font-size: 24px;'>Kami mendapatkan permintaan untuk reset password dengan akun email ".$email." pada tanggal : ".$tanggal."<br>
            	Jika anda merasa melakukan hal tersebut, silahkan klik link dibawah ini untuk melakukan reset password<br><br>
            	".$link.
            	"<br><br>Jika anda tidak merasa melakukan hal tersebut, abaikan email ini dan segera ganti password akun anda</p></div>"
            );

            if($this->email->send()) {
            	$this->session->set_flashdata('success','Request Email Permintaan Reset Password Terkirim');
            } else {
            	$this->session->set_flashdata('error','Gagal melakukan pengiriman reset password');
            }

            $this->load->view('auth/forgot_password'); 

        }  

    }  

    public function reset_password()  
    {  
    	$token = $this->base64url_decode($this->uri->segment(4));           
    	$cleanToken = $this->security->xss_clean($token);  
    	$user_info = $this->M_auth->isTokenValid($cleanToken); //either false or array();

    	if(!$user_info){  
    		$this->session->set_flashdata('error', 'Token tidak valid atau kadaluarsa');  
    		redirect(site_url('auth/login'),'refresh');   
    	}    

    	$data = array(  
    		'title'=> 'Halaman Reset Password | Bandung Tour Agent',  
    		// 'nama'=> $user_info->nama,   
    		'email'=>$user_info->email,   
    		'token'=>$this->base64url_encode($token)  
    	);  

    	$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');  
    	$this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');         

    	if ($this->form_validation->run() == FALSE) {
            // $this->session->set_flashdata('error', 'Update password gagal. Silahkan periksa kembali password yang diinputkan dan pastikan benar.');    
    		$this->load->view('auth/reset_password', $data); 
    	}else{  

    		$post = $this->input->post(NULL, TRUE);          
    		$cleanPost = $this->security->xss_clean($post);          
    		$hashed = sha1(md5($cleanPost['password']));          
    		$cleanPost['password'] = $hashed;  
    		$cleanPost['id_user'] = $user_info->id_user;  
    		unset($cleanPost['passconf']);          
    		if(!$this->M_auth->updatePassword($cleanPost)){  
    			$this->session->set_flashdata('error', 'Update password gagal.');  
    		}else{  
    			$this->session->set_flashdata('success', 'Password anda sudah diperbaharui. Silakan login.');  
    		}  
    		redirect(site_url('auth/login'),'refresh');
    	}  
    }

    public function sukses_reset()
    {
    	$this->load->view('lupa_password/sukses_reset');
    }

    public function konfirmasi()
    {
    	$this->load->view('lupa_password/konfirmasi');
    }  

    public function base64url_encode($data) {   
    	return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');   
    }   

    public function base64url_decode($data) {   
    	return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT));   
    }


}