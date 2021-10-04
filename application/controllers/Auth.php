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
		$data = array(
			'username' => $this->input->post('username'),
			'password' => sha1(md5($this->input->post('username'))),
			'email' => $this->input->post('email'),
			'date_created' => date('Y-m-d'),
			'date_updated' => date('Y-m-d'),
		);

		$this->M_auth->register_user($data);
	}

	public function forgot_password()
	{
		$data = array(
			'title' => 'Lupa Password - Skripsiku',
		);
		$this->load->view('auth/forgot_password', $data);
	}


}