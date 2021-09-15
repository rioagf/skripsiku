<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Layanan extends CI_Controller
{

	function __construct()
	{
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
			'title' => $layanan->nama_produk . ' - Skripsiku',
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
				'id_produk' => $layanan->id_produk,
				'nama_lengkap' => $datauser->nama_depan . ' ' . $datauser->nama_belakang,
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
				'id_produk' => $layanan->id_produk,
				'nama_lengkap' => $datauser->nama_depan . ' ' . $datauser->nama_belakang,
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
				'id_produk' => $layanan->id_produk,
				'nama_lengkap' => $datauser->nama_depan . ' ' . $datauser->nama_belakang,
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
				'id_produk' => $layanan->id_produk,
				'nama_lengkap' => $datauser->nama_depan . ' ' . $datauser->nama_belakang,
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
				'id_produk' => $layanan->id_produk,
				'nama_lengkap' => $datauser->nama_depan . ' ' . $datauser->nama_belakang,
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
				'id_produk' => $layanan->id_produk,
				'nama_lengkap' => $datauser->nama_depan . ' ' . $datauser->nama_belakang,
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
				'id_produk' => $layanan->id_produk,
				'nama_lengkap' => $datauser->nama_depan . ' ' . $datauser->nama_belakang,
				'asal_univ' => $datauser->asal_univ,
				'fakultas' => $datauser->fakultas,
				'jurusan' => $datauser->jurusan,
				'npm_nim' => $datauser->npm_nim,
			);
			$this->load->view('temp_user/content');
		}
	}

	function proses_pesan_layanan()
	{
		$config['upload_path']          = './upload/file/';
		$config['allowed_types']        = 'pdf';
		$config['max_size']             = 500000;
		$config['max_width']            = 1960;
		$config['max_height']           = 1080;


		$this->load->library('upload', $config);
		if (isset($_POST) && count($_POST) > 0) {
			$upload_data = $this->upload->data();
			$page = array(
				'title' => 'Proses Pesan Layanan',
				'content' => 'temp_user/upload_layanan_sukses',
			);

			if ($this->upload->do_upload('pedomanskripsi')) {
				$datapedoman = $this->upload->data();
			}

			if ($this->upload->do_upload('datapenelitian')) {
				$datapenelitian = $this->upload->data();
			}
			
			if ($this->upload->do_upload('skripsiacc')) {
				$skripsiacc = $this->upload->data();
			}
			
			if ($this->upload->do_upload('proposalskripsi')) {
				$proposalskripsi = $this->upload->data();
			}
			
			if ($this->upload->do_upload('dokumen')) {
				$dokumen = $this->upload->data();
			}
			
			$data = array(
				'id_user' => $this->input->post('id_user'),
				'id_produk' => $this->input->post('id_produk'),
				'nama_lengkap' => $this->input->post('nama'),
				'universitas' => $this->input->post('univ'),
				'fakultas' => $this->input->post('fakultas'),
				'jurusan' => $this->input->post('jurusan'),
				'npm' => $this->input->post('npm'),
				'judul_proposal' => $this->input->post('judulproposal'),
				'nama_dospemsatu' => $this->input->post('dospemsatu'),
				'nama_dospemdua' => $this->input->post('dospemdua'),
				
				'file_pedomanskripsi' => '/upload/file/'.$datapedoman['file_name'],
				'file_datapenelitian' => '/upload/file/'.$datapenelitian['file_name'],
				'file_skripsiacc' => '/upload/file/'.$skripsiacc['file_name'],
				'file_proposalskripsi' => '/upload/file/'.$proposalskripsi['file_name'],
				'dokumen' => '/upload/file/'.$dokumen['file_name'],

				'aplikasi_pengolahdata' => $this->input->post('pengolahdata'),
				'penurunan_plagiarisme' => $this->input->post('penurunan_plagiarisme'),
				'date_created' => date('y-m-d'),
				'date_updated' => date('y-m-d'),
				'status' => 'Baru',
				'progress' => $this->input->post('progress'),
			);

			$this->M_layanan->add_layanan($data);
			$this->load->view('temp_user/content', $page);
		}
	}
}
