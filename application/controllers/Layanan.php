<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Layanan extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('M_layanan');
		$this->load->model('M_userarea');
		if ($this->session->userdata('status') != 'login') {
			$this->session->set_flashdata('error', 'Maaf! Anda harus login terlebih dahulu');
			redirect(base_url('auth/login'));
		}

	}

	public function index()
	{
		$layanan = $this->M_layanan->list_layanan()->result();
		$data = array(
			'title' => 'Layanan - Skripsiku',
			'content' => 'temp_front/layanan',
			'layanan' => $layanan,
		);
		$this->load->view('temp_front/content', $data);
	}

	public function detail($slug)
	{
		$layanan = $this->M_layanan->get_detail__slug($slug)->row();
		$data = array(
			'title' => $layanan->nama_produk.' - Skripsiku',
			'content' => 'temp_front/detail_layanan',
			'layanan' => $layanan,
		);
		$this->load->view('temp_front/content', $data);
	}

	public function pesan($slug)
	{
		$layanan = $this->M_layanan->get_detail__slug($slug)->row();
		// var_dump($layanan->slug);die();
		$datauser = $this->M_userarea->data_profile__user()->row();
		if ($layanan->slug == 'penyusunan-proposal') {
			$data = array(
				'title' => 'Pesan Penyusunan Proposal',
				'content' => 'temp_user/penyusunan_proposal',
				'nama_lengkap' => $datauser->nama_depan.' '.$datauser->nama_belakang,
				'asal_univ' => $datauser->asal_univ,
				'fakultas' => $datauser->fakultas,
				'jurusan' => $datauser->jurusan,
				'npm_nim' => $datauser->npm_nim,
			);
			$this->load->view('temp_user/content', $data);
		} else if ($layanan->slug == 'penyusunan-skripsi') {
			$data = array(
				'title' => 'Pesan Penyusunan Skripsi',
				'content' => 'temp_user/penyusunan_skripsi',
				'nama_lengkap' => $datauser->nama_depan.' '.$datauser->nama_belakang,
				'asal_univ' => $datauser->asal_univ,
				'fakultas' => $datauser->fakultas,
				'jurusan' => $datauser->jurusan,
				'npm_nim' => $datauser->npm_nim,
			);
			$this->load->view('temp_user/content', $data);
		} else if ($layanan->slug == 'pengolahan-data') {
			$data = array(
				'title' => 'Pesan Pengolahan Data',
				'content' => 'temp_user/pengolahan_data',
				'nama_lengkap' => $datauser->nama_depan.' '.$datauser->nama_belakang,
				'asal_univ' => $datauser->asal_univ,
				'fakultas' => $datauser->fakultas,
				'jurusan' => $datauser->jurusan,
				'npm_nim' => $datauser->npm_nim,
			);
			$this->load->view('temp_user/content', $data);
		} else if ($layanan->slug == 'data-sekunder') {
			$data = array(
				'title' => 'Pesan Data Sekunder',
				'content' => 'temp_user/data_sekunder',
				'nama_lengkap' => $datauser->nama_depan.' '.$datauser->nama_belakang,
				'asal_univ' => $datauser->asal_univ,
				'fakultas' => $datauser->fakultas,
				'jurusan' => $datauser->jurusan,
				'npm_nim' => $datauser->npm_nim,
			);
			$this->load->view('temp_user/content', $data);
		} else if ($layanan->slug == 'cek-plagiarisme') {
			$data = array(
				'title' => 'Pesan Cek Plagiarisme',
				'content' => 'temp_user/cek_plagiarisme',
				'nama_lengkap' => $datauser->nama_depan.' '.$datauser->nama_belakang,
				'asal_univ' => $datauser->asal_univ,
				'fakultas' => $datauser->fakultas,
				'jurusan' => $datauser->jurusan,
				'npm_nim' => $datauser->npm_nim,
			);
			$this->load->view('temp_user/content', $data);
		} else if ($layanan->slug == 'pharaphase') {
			$data = array(
				'title' => 'Pesan Cek Plagiarisme',
				'content' => 'temp_user/pharaphase',
				'nama_lengkap' => $datauser->nama_depan.' '.$datauser->nama_belakang,
				'asal_univ' => $datauser->asal_univ,
				'fakultas' => $datauser->fakultas,
				'jurusan' => $datauser->jurusan,
				'npm_nim' => $datauser->npm_nim,
			);
			$this->load->view('temp_user/content', $data);
		} else {
			$data = array(
				'title' => 'Pesan Layanan',
				'content' => 'temp_user/pesan_layanan',
				'nama_lengkap' => $datauser->nama_depan.' '.$datauser->nama_belakang,
				'asal_univ' => $datauser->asal_univ,
				'fakultas' => $datauser->fakultas,
				'jurusan' => $datauser->jurusan,
				'npm_nim' => $datauser->npm_nim,
			);
			$this->load->view('temp_user/content');
		}
	}

	function proses_penyusunan_proposal()
	{
		$config['upload_path']          = './assets/file/';
		$config['allowed_types']        = 'pdf';
		$config['max_size']             = 500000;
		$config['max_width']            = 1960;
		$config['max_height']           = 1080;

		$this->load->library('upload', $config);
		$data = array(
			'id_user' => $this->input->post('id_user'),
			'nama_dospemsatu' => $this->input->post('dospemsatu'),
			'nama_dospemdua' => $this->input->post('dospemdua'),
			'judul_proposal' => $this->input->post('judulproposal'),
		);
	}
}