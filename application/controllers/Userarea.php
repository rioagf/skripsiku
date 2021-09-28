<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Userarea extends CI_Controller {

	function __construct(){
		parent::__construct();
		if($this->session->userdata('status') != 'login'){
			redirect(base_url('auth/login'));
		} elseif ($this->session->userdata('role') != 'user') {
			$this->session->set_flashdata('error', 'Maaf userarea hanya untuk user');
			redirect(base_url());
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
					'ktp' => '/upload/image/'.$upload_data['file_name'],
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
					'ktp' => '/upload/image/'.$upload_data['file_name'],
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
		$berkas_masuk = $this->M_userarea->get_berkas_masuk($this->session->userdata('username'));
		if ($username != $this->session->userdata('username')) {
			redirect(base_url('userarea/profile'));
		} else {
			$data = array(
				'title' => 'Berkas Masuk'.$profile->nama_depan.' '.$profile->nama_belakang.' - Skripsiku',
				'content' => 'temp_user/berkas_masuk',
				'profile' => $profile,
				'berkas_masuk' => $berkas_masuk,
			);
			$this->load->view('temp_user/content', $data);
		}
	}

	public function berkas_keluar($username)
	{
		$profile = $this->M_userarea->data_profile__user()->row();
		$berkas_keluar = $this->M_userarea->get_berkas_keluar($this->session->userdata('username'));
		if ($username != $this->session->userdata('username')) {
			redirect(base_url('userarea/profile'));
		} else {
			$data = array(
				'title' => 'Berkas Keluar'.$profile->nama_depan.' '.$profile->nama_belakang.' - Skripsiku',
				'content' => 'temp_user/berkas_keluar',
				'profile' => $profile,
				'berkas_keluar' => $berkas_keluar,
			);
			$this->load->view('temp_user/content', $data);
		}
	}

	function kirim_berkas_keluar($username)
	{
		$config['upload_path']          = './upload/image/';
		$config['allowed_types']        = 'pdf';
		$config['max_size']             = 500000;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('dokumen')){
			$this->session->set_flashdata('error', $this->upload->display_errors());
			redirect(base_url('userarea/berkas_keluar/'.$this->session->userdata('username')));
		}else{
			$upload_data = $this->upload->data();
			$data = array(
				'id_pemesanan' => $this->input->post('id_pemesanan'),
				'id_user' => $this->session->userdata('id_user'),
				'dokumen' => '/upload/file/'.$upload_data['file_name'],
				'catatan' => $this->input->post('catatan'),
				'status_dokumen' => 'Dokumen Keluar Pemesan',
				'date_created' => date("Y-m-d"),
				'date_updated' => date("Y-m-d"),
			);

			$this->M_userarea->kirim_berkas($data);
			redirect(base_url('userarea/berkas_keluar/'.$this->session->userdata('username')));
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

		$pembayaran = $this->M_userarea->list_pembayaran($username);
		$data = array(
			'title' => 'Pembayaran - Skripsiku',
			'content' => 'temp_user/pembayaran',
			'pembayaran' => $pembayaran,
		);
		$this->load->view('temp_user/content', $data);
	}

	public function proses_pembayaran($username)
	{
		$config['upload_path']          = './upload/image/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 2000;
		$config['max_width']            = 2048;
		$config['max_height']           = 2048;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('bukti_transfer')){
			$this->session->set_flashdata('error', $this->upload->display_errors());
			redirect(base_url('userarea/pembayaran/'.$this->session->userdata('username')));
		}else{
			$upload_data = $this->upload->data();
			$data = array(
				'id_user' => $this->session->userdata('id_user'),
				'nama_lengkap' => $this->input->post('nama_lengkap'),
				'perihal' => $this->input->post('perihal'),
				'jumlah_transfer' => $this->input->post('jumlah_transfer'),
				'bukti_transfer' => '/upload/image/'.$upload_data['file_name'],
				'date_created' => date("Y-m-d"),
				'date_updated' => date("Y-m-d"),
			);

			$this->M_userarea->add_pembayaran($data);
			redirect(base_url('userarea/pembayaran/'.$this->session->userdata('username')));
		}
	}

	public function progress($username)
	{
		$progress = $this->M_userarea->progress_pesanan($username);
		$data = array(
			'title' => 'Progress Pesanan - Skripsiku',
			'content' => 'temp_user/progress',
			'progress' => $progress,
		);
		$this->load->view('temp_user/content', $data);
	}
}