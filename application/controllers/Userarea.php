<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Userarea extends CI_Controller {

	function __construct(){
		parent::__construct();
		if($this->session->userdata('status') != 'login'){
			redirect(base_url('auth/login'));
		}
		$this->load->model('M_userarea');
		$this->load->model('M_layanan');

	}

	public function index()
	{
		redirect(base_url('userarea/profile'));
	}
	public function profile()
	{
		$profile = $this->M_userarea->data_profile__user()->row();
		$data = array(
			'title' => 'Profile - Skripsiku',
			'content' => 'temp_user/profile_user',
			'profile' => $profile,
		);
		$this->load->view('temp_user/content', $data);
	}

	public function edit_profile($username)
	{
		$profile = $this->M_userarea->data_profile__user()->row();
		if ($username != $this->session->userdata('username')) {
			redirect(base_url('userarea/profile'));
		} else {
			$data = array(
				'title' => 'Edit Profile'. $profile->nama_depan.' '.$profile->nama_belakang.' - Skripsiku',
				'content' => 'temp_user/ubah_profile',
				'profile' => $profile,
			);
			$this->load->view('temp_user/content', $data);
		}
	}

	function proses__ubah_profile($id)
	{
		$config['upload_path']          = './upload/image/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 100;
		$config['max_width']            = 1024;
		$config['max_height']           = 768;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('dokumen')){
			$this->session->set_flashdata('error', $this->upload->display_errors());
			redirect(base_url('userarea/profile'));
		}else{
			if ($this->input->post('dokumen') != '') {
				$upload_data = $this->upload->data();
				$data1 = array(
					'nama_depan' => $this->input->post('nama_depan'),
					'nama_belakang' => $this->input->post('nama_belakang'),
					'tanggal_lahir' => $this->input->post('tanggal_lahir'),
					'asal_univ' => $this->input->post('universitas'),
					'fakultas' => $this->input->post('fakultas'),
					'jurusan' => $this->input->post('jurusan'),
					'npm_nim' => $this->input->post('npm_nim'),
					'alamat' => $this->input->post('alamat'),
					'ktp' => $config['upload_path'].$upload_data['file_name'],
				);
				$this->M_userarea->update__profile($this->input->post('id_profile'), $data1);
				$data2 = array(
					'email' => $this->input->post('email'),
					'password' => $this->input->post('old_password'),
				);
				$this->M_userarea->update__user($this->input->post('username'), $data2);
			} else if ($this->input->post('dokumen') != '' && $this->input->post('password') != '') {
				$upload_data = $this->upload->data();
				$data1 = array(
					'nama_depan' => $this->input->post('nama_depan'),
					'nama_belakang' => $this->input->post('nama_belakang'),
					'tanggal_lahir' => $this->input->post('tanggal_lahir'),
					'asal_univ' => $this->input->post('universitas'),
					'fakultas' => $this->input->post('fakultas'),
					'jurusan' => $this->input->post('jurusan'),
					'npm_nim' => $this->input->post('npm_nim'),
					'alamat' => $this->input->post('alamat'),
					'ktp' => $config['upload_path'].$upload_data['file_name'],
				);
				$this->M_userarea->update__profile($this->input->post('id_profile'), $data1);
				$data2 = array(
					'email' => $this->input->post('email'),
					'password' => sha1(md5($this->input->post('password'))),
				);
				$this->M_userarea->update__user($this->input->post('username'), $data2);
			} else if ($this->input->post('dokumen') == '' && $this->input->post('password') != '') {
				$data1 = array(
					'nama_depan' => $this->input->post('nama_depan'),
					'nama_belakang' => $this->input->post('nama_belakang'),
					'tanggal_lahir' => $this->input->post('tanggal_lahir'),
					'asal_univ' => $this->input->post('universitas'),
					'fakultas' => $this->input->post('fakultas'),
					'jurusan' => $this->input->post('jurusan'),
					'npm_nim' => $this->input->post('npm_nim'),
					'alamat' => $this->input->post('alamat'),
					'ktp' => $this->input->post('old_ktp'),
				);
				$this->M_userarea->update__profile($this->input->post('id_profile'), $data1);
				$data2 = array(
					'email' => $this->input->post('email'),
					'password' => sha1(md5($this->input->post('password'))),
				);
			} else if ($this->input->post('dokumen') == '' && $this->input->post('password') == '') {
				$data1 = array(
					'nama_depan' => $this->input->post('nama_depan'),
					'nama_belakang' => $this->input->post('nama_belakang'),
					'tanggal_lahir' => $this->input->post('tanggal_lahir'),
					'asal_univ' => $this->input->post('universitas'),
					'fakultas' => $this->input->post('fakultas'),
					'jurusan' => $this->input->post('jurusan'),
					'npm_nim' => $this->input->post('npm_nim'),
					'alamat' => $this->input->post('alamat'),
					'ktp' => $this->input->post('old_ktp'),
				);
				$this->M_userarea->update__profile($this->input->post('id_profile'), $data1);
				$data2 = array(
					'email' => $this->input->post('email'),
					'password' => $this->input->post('old_password'),
				);
			}

			$this->session->set_flashdata('sukses', 'Berhasil menginput data');
			redirect(base_url('userarea/profile'));
		}
	}

	public function berkas_masuk($username)
	{
		$profile = $this->M_userarea->data_profile__user()->row();
		if ($username != $this->session->userdata('username')) {
			redirect(base_url('userarea/profile'));
		} else {
			$data = array(
				'title' => 'Berkas Masuk'.$profile->nama_depan.' '.$profile->nama_belakang.' - Skripsiku',
				'content' => 'temp_user/berkas_masuk',
				'profile' => $profile,
			);
			$this->load->view('temp_user/content', $data);
		}
	}

	public function berkas_keluar($username)
	{
		$profile = $this->M_userarea->data_profile__user()->row();
		if ($username != $this->session->userdata('username')) {
			redirect(base_url('userarea/profile'));
		} else {
			$data = array(
				'title' => 'Berkas Keluar'.$profile->nama_depan.' '.$profile->nama_belakang.' - Skripsiku',
				'content' => 'temp_user/berkas_keluar',
				'profile' => $profile,
			);
			$this->load->view('temp_user/content', $data);
		}
	}

	public function layanan($slug)
	{
		$layanan = $this->M_layanan->get_detail__slug($slug)->row();
		$data = array(
			'title' => $layanan->nama_produk.' - Skripsiku',
			'content' => 'temp_front/detail_layanan',
			'layanan' => $layanan,
		);
		$this->load->view('temp_user/content', $data);
	}

	public function pembayaran($username)
	{

		$data = array(
			'title' => 'Pembayaran - Skripsiku',
			'content' => 'temp_user/pembayaran',
		);
		$this->load->view('temp_user/content', $data);
	}
}