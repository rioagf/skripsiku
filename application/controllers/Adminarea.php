<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Adminarea extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_artikel');
		$this->load->model('M_auth');
		$this->load->model('M_layanan');
		$this->load->model('M_image');
		$this->load->model('Karir_model');
		if ($this->session->userdata('status') != 'login') {
			redirect(base_url('auth'));
			$this->session->set_flashdata('error', 'Maaf Anda Harus Login Terlebih Dahulu');
		} else {
			if ($this->session->userdata('role') != 'admin') {
				redirect(base_url('userarea'));
				$this->session->set_flashdata('error', 'Maaf Anda Tidak Diizinkan Mengakses Halaman Admin');
			}
		}
	}

	public function index()
	{
		$artikel = $this->M_artikel->list_article()->result();
		$data = array(
			'title' => 'Dashboard - Skripsiku',
			'content' => 'temp_admin/dashboard',
			'artikel' => $artikel,
		);
		$this->load->view('temp_admin/content', $data);
	}

	public function list_pemesanan()
	{
		$data = array(
			'title' => 'Daftar Pesanan Customer',
			'content' => 'temp_admin/list_pesanan',
		);
		$this->load->view('temp_admin/content', $data);
	}

	public function slider()
	{
		$slider = $this->M_image->slider()->result();
		$data = array(
			'title' => 'Slider - Skripsiku',
			'content' => 'temp_admin/slider',
			'slider' => $slider,
		);
		$this->load->view('temp_admin/content', $data);
	}

	public function add_slider()
	{
		$data = array(
			'title' => 'Tambah Slider - Skripsiku',
			'content' => 'temp_admin/tambah_slider',
		);
		$this->load->view('temp_admin/content', $data);
	}

	function proses_tambah__slider()
	{
		// $this->_rules();
		$config['upload_path']          = './assets/img/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 5000;
		$config['max_width']            = 1960;
		$config['max_height']           = 1080;

		$this->load->library('upload', $config);
		// var_dump($upload_data);die();

		if (!$this->upload->do_upload('images_slider') || $this->input->post('lokasi') == '') {
			$this->session->set_flashdata('error', $this->upload->display_errors());
			$this->add_slider();
		} else {
			$upload_data = $this->upload->data();
			$data = array(
				'file' => '/assets/img/' . $upload_data['file_name'],
				'lokasi' => $this->input->post('lokasi', TRUE),
				'date_created' => date('Y-m-d'),
				'date_update' => date('Y-m-d'),
				'id_user' => $this->session->userdata('id_user'),
			);

			$this->M_image->tambah_slider($data);
			$this->session->set_flashdata('success', 'Berhasil Menambah Slider');
			redirect(site_url('adminarea/slider'));
		}
	}

	public function edit_slider($id)
	{
		$slider = $this->M_image->get_slider__by($id)->row();
		$data = array(
			'title' => 'Edit Slider - Skripsiku',
			'content' => 'temp_admin/slider_edit',
			'id' => $slider->id,
			'file' => $slider->file,
			'lokasi' => $slider->lokasi,
		);
		$this->load->view('temp_admin/content', $data);
	}

	function proses_edit__slider()
	{
		$config['upload_path']          = './assets/img/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 5000;
		$config['max_width']            = 1960;
		$config['max_height']           = 1080;

		$this->load->library('upload', $config);
		// var_dump($upload_data);die();

		if (!$this->upload->do_upload('images_slider')) {
			// $this->session->set_flashdata('error', $this->upload->display_errors());
			// $this->edit_slider($id);
			$data = array(
				'file' => $this->input->post('file_lama', TRUE),
				'lokasi' => $this->input->post('lokasi', TRUE),
				'date_update' => date('Y-m-d'),
				'id_user' => $this->session->userdata('id_user'),
			);

			$this->M_image->edit_slider($data, $this->input->post('id'));
			$this->session->set_flashdata('success', 'Berhasil Mengubah Data Slider');
			redirect(site_url('adminarea/slider'));
		} else {
			$upload_data = $this->upload->data();
			// var_dump($upload_data);die();
			$data = array(
				'file' => '/assets/img/' . $upload_data['file_name'],
				'lokasi' => $this->input->post('lokasi', TRUE),
				'date_update' => date('Y-m-d'),
				'id_user' => $this->session->userdata('id_user'),
			);

			$this->M_image->edit_slider($data, $this->input->post('id'));
			$this->session->set_flashdata('success', 'Berhasil Mengubah Slider');
			redirect(site_url('adminarea/slider'));
		}
	}

	public function delete_slider($id)
	{
		$row = $this->M_image->get_slider__by($id)->row();

		if ($row) {
			unlink($row->file);
			$this->M_image->hapus_slider($id);
			$this->session->set_flashdata('success', 'Berhasil Menghapus Slider');
			redirect(site_url('adminarea/slider'));
		} else {
			$this->session->set_flashdata('error', 'Slider Tidak Ditemukan');
			redirect(site_url('adminarea/slider'));
		}
	}

	public function gallery()
	{
		$gallery = $this->M_image->gallery()->result();
		$data = array(
			'title' => 'Galeri - Skripsiku',
			'content' => 'temp_admin/galeri',
			'gallery' => $gallery,
		);
		$this->load->view('temp_admin/content', $data);
	}

	function add_gallery()
	{
		$data = array(
			'title' => 'Tambah Galeri - Skripsiku',
			'content' => 'temp_admin/galeri_tambah',
		);
		$this->load->view('temp_admin/content', $data);
	}

	function proses_tambah__gallery()
	{
		// $this->_rules();
		$config['upload_path']          = './assets/img/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 5000;
		$config['max_width']            = 1960;
		$config['max_height']           = 1080;

		$this->load->library('upload', $config);
		// var_dump($upload_data);die();

		if (!$this->upload->do_upload('images_galeri') || $this->input->post('lokasi_galeri') == '' || $this->input->post('nama_galeri') == '') {
			$this->session->set_flashdata('error', $this->upload->display_errors());
			$this->add_gallery();
		} else {
			$upload_data = $this->upload->data();
			$data = array(
				'file' => '/assets/img/' . $upload_data['file_name'],
				'nama_galeri' => $this->input->post('nama_galeri', TRUE),
				'lokasi_galeri' => $this->input->post('lokasi_galeri', TRUE),
				'date_created' => date('Y-m-d'),
				'date_updated' => date('Y-m-d'),
				'id_user' => $this->session->userdata('id_user'),
			);

			$this->M_image->tambah_galeri($data);
			$this->session->set_flashdata('success', 'Berhasil Menambah Slider');
			redirect(site_url('adminarea/gallery'));
		}
	}

	public function edit_gallery($id)
	{
		$galeri = $this->M_image->get_gallery__by($id)->row();
		$data = array(
			'title' => 'Edit Galeri - Skripsiku',
			'content' => 'temp_admin/galeri_edit',
			'id' => $galeri->id,
			'file' => $galeri->file,
			'lokasi_galeri' => $galeri->lokasi_galeri,
			'nama_galeri' => $galeri->nama_galeri,
		);
		$this->load->view('temp_admin/content', $data);
	}

	function proses_edit__gallery()
	{
		$config['upload_path']          = './assets/img/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 5000;
		$config['max_width']            = 1960;
		$config['max_height']           = 1080;

		$this->load->library('upload', $config);
		// var_dump($upload_data);die();

		if (!$this->upload->do_upload('images_galeri')) {
			// $this->session->set_flashdata('error', $this->upload->display_errors());
			// $this->edit_slider($id);
			$data = array(
				'file' => $this->input->post('file_lama', TRUE),
				'lokasi_galeri' => $this->input->post('lokasi_galeri', TRUE),
				'nama_galeri' => $this->input->post('nama_galeri', TRUE),
				'date_updated' => date('Y-m-d'),
				'id_user' => $this->session->userdata('id_user'),
			);

			$this->M_image->edit_galeri($data, $this->input->post('id'));
			$this->session->set_flashdata('success', 'Berhasil Mengubah Galeri');
			redirect(site_url('adminarea/gallery'));
		} else {
			$upload_data = $this->upload->data();
			// var_dump($upload_data);die();
			$data = array(
				'file' => '/assets/img/' . $upload_data['file_name'],
				'nama_galeri' => $this->input->post('nama_galeri', TRUE),
				'lokasi_galeri' => $this->input->post('lokasi_galeri', TRUE),
				'date_updated' => date('Y-m-d'),
				'id_user' => $this->session->userdata('id_user'),
			);

			$this->M_image->edit_galeri($data, $this->input->post('id'));
			$this->session->set_flashdata('success', 'Berhasil Mengubah Galeri');
			redirect(site_url('adminarea/gallery'));
		}
	}

	public function delete_gallery($id)
	{
		$row = $this->M_image->get_gallery__by($id)->row();

		if ($row) {
			unlink($row->file);
			$this->M_image->hapus_galeri($id);
			$this->session->set_flashdata('success', 'Berhasil Menghapus Galeri');
			redirect(site_url('adminarea/gallery'));
		} else {
			$this->session->set_flashdata('error', 'Galeri Tidak Ditemukan');
			redirect(site_url('adminarea/gallery'));
		}
	}

	public function karir()
	{
		$start = intval($this->input->get('start'));
		$karir = $this->Karir_model->get_all();
		$data = array(
			'title' => 'Karir - Skripsiku',
			'content' => 'temp_admin/karir',
			'karir' => $karir,
			'start' => $start,
		);
		$this->load->view('temp_admin/content', $data);
	}

	public function detail_karir($id)
	{
		$row = $this->Karir_model->get_by_id($id);
		if ($row) {
			$data = array(
				'title' => 'Karir - Skripsiku',
				'content' => 'temp_admin/karir_detail',
				'id_karir' => $row->id_karir,
				'judul_karir' => $row->judul_karir,
				'deskripsi_karir' => $row->deskripsi_karir,
				'image_karir' => $row->image_karir,
				'date_created' => $row->date_created,
				'date_updated' => $row->date_updated,
				'id_user' => $row->id_user,
			);
			$this->load->view('temp_admin/content', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('adminarea/karir'));
		}
	}

	public function tambah_karir()
	{
		$data = array(
			'title' => 'Karir - Skripsiku',
			'content' => 'temp_admin/karir_tambah',
			'button' => 'Tambah Data',
			'action' => site_url('karir/proses_tambah__karir'),
			'judul_karir' => set_value('judul_karir'),
			'deskripsi_karir' => set_value('deskripsi_karir'),
		);
		$this->load->view('temp_admin/content', $data);
	}

	public function proses_tambah__karir()
	{
		// $this->_rules();

		if ($this->input->post('judul_karir') == '' &&  $this->input->post('deskripsi_karir') == '') {
			$this->session->set_flashdata('error', 'Jangan Ada Data yang Kosong');
			$this->tambah_karir();
		} else {
			$data = array(
				'judul_karir' => $this->input->post('judul_karir', TRUE),
				'deskripsi_karir' => $this->input->post('deskripsi_karir', TRUE),
				'date_created' => date('Y-m-d'),
				'date_updated' => date('Y-m-d'),
				'id_user' => $this->session->userdata('id_user'),
			);

			$this->Karir_model->insert($data);
			$this->session->set_flashdata('success', 'Berhasil Menambah Data Karir');
			redirect(site_url('adminarea/karir'));
		}
	}

	public function edit_karir($id)
	{
		$row = $this->Karir_model->get_by_id($id);
		if ($row) {
			$data = array(
				'title' => 'Edit Karir - Skripsiku',
				'content' => 'temp_admin/karir_edit',
				'id_karir' => $row->id_karir,
				'judul_karir' => $row->judul_karir,
				'deskripsi_karir' => $row->deskripsi_karir,
			);
			$this->load->view('temp_admin/content', $data);
		} else {
			$this->session->set_flashdata('error', 'Data Tidak Ditemukan');
			redirect(site_url('adminarea/karir'));
		}
	}

	public function proses_edit__karir()
	{
		// $this->_rules();

		if ($this->input->post('judul_karir') == '' || $this->input->post('deskripsi_karir') == '') {
			$this->session->set_flashdata('error', 'Jangan Ada Data yang Kosong');
			$this->edit_karir();
		} else {
			$data = array(
				'judul_karir' => $this->input->post('judul_karir', TRUE),
				'deskripsi_karir' => $this->input->post('deskripsi_karir', TRUE),
				'date_updated' => date('Y-m-d'),
				'id_user' => $this->session->userdata('id_user'),
			);

			$this->Karir_model->update($this->input->post('id_karir'), $data);
			$this->session->set_flashdata('success', 'Berhasil Mengubah Data Karir');
			redirect(site_url('adminarea/karir'));
		}
	}

	public function delete_karir($id)
	{
		$row = $this->Karir_model->get_by_id($id);

		if ($row) {
			$this->Karir_model->delete($id);
			$this->session->set_flashdata('success', 'Berhasil Menghapus Data Karir');
			redirect(site_url('adminarea/karir'));
		} else {
			$this->session->set_flashdata('error', 'Data Karir Tidak Ditemukan');
			redirect(site_url('adminarea/karir'));
		}
	}

	public function artikel()
	{
		$start = intval($this->input->get('start'));
		$artikel = $this->M_artikel->list_article()->result();
		$data = array(
			'title' => 'Artikel - Skripsiku',
			'content' => 'temp_admin/artikel',
			'artikel' => $artikel,
			'start' => $start,
		);
		$this->load->view('temp_admin/content', $data);
	}

	public function detail_artikel($id)
	{
		$row = $this->M_artikel->get_detail__by_id($id)->row();
		if ($row) {
			$data = array(
				'title' => $row->judul_artikel . ' - Skripsiku',
				'content' => 'temp_admin/artikel_detail',
				'id_artikel' => $row->id_artikel,
				'judul_artikel' => $row->judul_artikel,
				'isi_konten' => $row->isi_konten,
				'slug' => $row->slug,
				'gambar_artikel' => $row->gambar_artikel,
				'date_created' => $row->date_created,
			);
			$this->load->view('temp_admin/content', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('adminarea/karir'));
		}
	}

	public function tambah_artikel()
	{
		$data = array(
			'title' => 'Tambah Artikel - Skripsiku',
			'content' => 'temp_admin/artikel_tambah',
			'button' => 'Tambah Data',
			'judul_artikel' => set_value('judul_artikel'),
			'isi_konten' => set_value('isi_konten'),
		);
		$this->load->view('temp_admin/content', $data);
	}

	public function proses_tambah__artikel()
	{
		// $this->_rules();

		if ($this->input->post('judul_artikel') == '' || $this->input->post('isi_konten') == '') {
			$this->session->set_flashdata('error', 'Judul atau Isi Konten Masih Kosong');
			$this->tambah_artikel();
		} else {
			$config['upload_path']          = './upload/image/';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['max_size']             = 100;
			$config['max_width']            = 1024;
			$config['max_height']           = 768;

			$this->load->library('upload', $config);

			if ($this->input->post('gambar_artikel') == '') {
				$judul = $this->input->post('judul_artikel', TRUE);
				$data = array(
					'judul_artikel' => $judul,
					'isi_konten' => $this->input->post('isi_konten', TRUE),
					'slug' => strtolower(str_replace(' ', '-', $judul)),
					'date_created' => date('Y-m-d'),
					'date_updated' => date('Y-m-d'),
					'gambar_artikel' => '/assets/img/desk.jpg',
					'id_user' => $this->session->userdata('id_user'),
				);

				$this->M_artikel->create__artikel($data);
				$this->session->set_flashdata('success', 'Berhasil Menambah Artikel');
				redirect(site_url('adminarea/artikel'));
			} else {
				$upload_data = $this->upload->data();
				$judul = $this->input->post('judul_artikel', TRUE);
				$data = array(
					'judul_artikel' => $judul,
					'isi_konten' => $this->input->post('isi_konten', TRUE),
					'slug' => strtolower(str_replace(' ', '-', $judul)),
					'date_created' => date('Y-m-d'),
					'date_updated' => date('Y-m-d'),
					'gambar_artikel' => '/' . $config['upload_path'] . $upload_data['file_name'],
					'id_user' => $this->session->userdata('id_user'),
				);

				$this->M_artikel->create__artikel($data);
				$this->session->set_flashdata('success', 'Berhasil Menambah Artikel');
				redirect(site_url('adminarea/artikel'));
			}
		}
	}

	public function edit_artikel($id)
	{
		$row = $this->M_artikel->get_detail__by_id($id)->row();
		if ($row) {
			$data = array(
				'title' => 'Edit Artikel - Skripsiku',
				'content' => 'temp_admin/artikel_edit',
				'id_artikel' => $row->id_artikel,
				'judul_artikel' => $row->judul_artikel,
				'isi_konten' => $row->isi_konten,
				'gambar_artikel' => $row->gambar_artikel,
			);
			$this->load->view('temp_admin/content', $data);
		} else {
			$this->session->set_flashdata('error', 'Data Tidak Ditemukan');
			redirect(site_url('adminarea/artikel'));
		}
	}

	public function proses_edit__artikel()
	{
		// $this->_rules();

		if ($this->input->post('judul_artikel') == '' || $this->input->post('isi_konten') == '') {
			$this->session->set_flashdata('error', 'Judul atau Isi Konten Masih Kosong');
			$this->tambah_artikel();
		} else {
			$config['upload_path']          = './upload/image/';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['max_size']             = 100;
			$config['max_width']            = 1024;
			$config['max_height']           = 768;

			$this->load->library('upload', $config);

			if ($this->input->post('gambar_artikel') == '') {
				$judul = $this->input->post('judul_artikel', TRUE);
				$data = array(
					'judul_artikel' => $judul,
					'isi_konten' => $this->input->post('isi_konten', TRUE),
					'slug' => strtolower(str_replace(' ', '-', $judul)),
					'date_updated' => date('Y-m-d'),
					'gambar_artikel' => $this->input->post('gambar_artikel_old', TRUE),
					'id_user' => $this->session->userdata('id_user'),
				);

				$this->M_artikel->update__artikel($data, $this->input->post('id_artikel'));
				$this->session->set_flashdata('success', 'Berhasil Mengubah Artikel');
				redirect(site_url('adminarea/artikel'));
			} else {
				$upload_data = $this->upload->data();
				$judul = $this->input->post('judul_artikel', TRUE);
				$data = array(
					'judul_artikel' => $judul,
					'isi_konten' => $this->input->post('isi_konten', TRUE),
					'slug' => strtolower(str_replace(' ', '-', $judul)),
					'date_created' => date('Y-m-d'),
					'date_updated' => date('Y-m-d'),
					'gambar_artikel' => '/' . $config['upload_path'] . $upload_data['file_name'],
					'id_user' => $this->session->userdata('id_user'),
				);

				$this->M_artikel->update__artikel($data, $this->input->post('id_artikel'));
				$this->session->set_flashdata('success', 'Berhasil Mengubah Artikel');
				redirect(site_url('adminarea/artikel'));
			}
		}
	}

	public function delete_artikel($id)
	{
		$row = $this->M_artikel->get_detail__by_id($id);

		if ($row) {
			$this->M_artikel->delete__artikel($id);
			$this->session->set_flashdata('success', 'Berhasil Menghapus Artikel');
			redirect(site_url('adminarea/artikel'));
		} else {
			$this->M_artikel->set_flashdata('error', 'Artikel Tidak Ditemukan');
			redirect(site_url('adminarea/artikel'));
		}
	}

	// TAMBAH PRODUK
	public function produk()
	{
		$start = intval($this->input->get('start'));
		$produk = $this->M_layanan->list_layanan()->result();
		$data = array(
			'title' => 'Produk - Skripsiku',
			'content' => 'temp_admin/produk',
			'produk' => $produk,
			'start' => $start,
		);
		$this->load->view('temp_admin/content', $data);
	}

	public function detail_produk($slug)
	{
		$row = $this->M_layanan->get_detail__slug($slug)->row();
		if ($row) {
			$data = array(
				'title' => $row->nama_produk . ' - Skripsiku',
				'content' => 'temp_admin/produk_detail',
				'id_produk' => $row->id_produk,
				'nama_produk' => $row->nama_produk,
				'deskripsi_produk' => $row->deskripsi_produk,
				'slug' => $row->slug,
				'harga' => $row->harga,
				'image_cover' => $row->image_cover,
				'date_created' => $row->date_created,
			);
			$this->load->view('temp_admin/content', $data);
		} else {
			$this->session->set_flashdata('message', 'Data Tidak Ditemukan');
			redirect(site_url('adminarea/produk'));
		}
	}

	public function tambah_produk()
	{
		$data = array(
			'title' => 'Tambah Produk - Skripsiku',
			'content' => 'temp_admin/produk_tambah',
			'button' => 'Tambah Produk',
		);
		$this->load->view('temp_admin/content', $data);
	}

	public function proses_tambah__produk()
	{
		// $this->_rules();

		if ($this->input->post('nama_produk') == '' || $this->input->post('deskripsi_produk') == '' || $this->input->post('harga') == '') {
			$this->session->set_flashdata('error', 'Masih Ada Data yang Kosong');
			redirect(base_url('adminarea/tambah_produk'));
		} else {
			$config['upload_path']          = './upload/image/';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['max_size']             = 5000;
			$config['max_width']            = 1960;
			$config['max_height']           = 1080;

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('image_cover')) {
				$judul = $this->input->post('nama_produk', TRUE);
				$data = array(
					'nama_produk' => $judul,
					'deskripsi_produk' => $this->input->post('deskripsi_produk', TRUE),
					'slug' => strtolower(str_replace(' ', '-', $judul)),
					'harga' => $this->input->post('harga'),
					'date_created' => date('Y-m-d'),
					'date_updated' => date('Y-m-d'),
					'image_cover' => '/assets/img/desk.jpg',
					'id_user' => $this->session->userdata('id_user'),
				);

				$this->M_layanan->create__produk($data);
				$this->session->set_flashdata('success', 'Data Gambar Tidak Sesuai atau Terlalu Besar, Data Ditambahkan Sebagian, Gambar dibuat Default');
				redirect(site_url('adminarea/produk'));
			} else {
				$upload_data = $this->upload->data();
				$judul = $this->input->post('nama_produk', TRUE);
				$data = array(
					'nama_produk' => $judul,
					'deskripsi_produk' => $this->input->post('deskripsi_produk', TRUE),
					'slug' => strtolower(str_replace(' ', '-', $judul)),
					'harga' => $this->input->post('harga'),
					'date_created' => date('Y-m-d'),
					'date_updated' => date('Y-m-d'),
					'image_cover' => '/upload/image/' . $upload_data['file_name'],
					'id_user' => $this->session->userdata('id_user'),
				);

				$this->M_layanan->create__produk($data);
				$this->session->set_flashdata('success', 'Berhasil Menambah Produk');
				redirect(site_url('adminarea/produk'));
			}
		}
	}

	public function edit_produk($slug)
	{
		$row = $this->M_layanan->get_detail__slug($slug)->row();
		if ($row) {
			$data = array(
				'title' => 'Edit produk - Skripsiku',
				'content' => 'temp_admin/produk_edit',
				'id_produk' => $row->id_produk,
				'nama_produk' => $row->nama_produk,
				'deskripsi_produk' => $row->deskripsi_produk,
				'harga' => $row->harga,
				'image_cover' => $row->image_cover,
			);
			$this->load->view('temp_admin/content', $data);
		} else {
			$this->session->set_flashdata('error', 'Data Tidak Ditemukan');
			redirect(site_url('adminarea/produk'));
		}
	}

	public function proses_edit__produk()
	{
		// $this->_rules();

		if ($this->input->post('nama_produk') == '' || $this->input->post('deskripsi_produk') == '') {
			$this->session->set_flashdata('error', 'Nama Produk atau Isi Konten Masih Kosong');
			redirect(base_url('adminarea/produk'));
		} else {
			$config['upload_path']          = './upload/image/';
			$config['allowed_types']        = 'gif|jpg|png|jpeg';
			$config['max_size']             = 5000;
			$config['max_width']            = 1960;
			$config['max_height']           = 1080;

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('image_cover')) {
				$judul = $this->input->post('nama_produk', TRUE);
				$data = array(
					'nama_produk' => $judul,
					'deskripsi_produk' => $this->input->post('deskripsi_produk', TRUE),
					'harga' => $this->input->post('harga', TRUE),
					'date_updated' => date('Y-m-d'),
					'image_cover' => $this->input->post('gambar_produk_old', TRUE),
					'id_user' => $this->session->userdata('id_user'),
				);

				$this->M_layanan->update__produk($data, $this->input->post('id_produk'));
				// $this->session->set_flashdata('success', 'Gambar Terlalu Besar atau Tidak Sesuai Format, Data Berhasil Diubah Sebagian');
				$this->session->set_flashdata('success', $this->upload->display_errors() . ' Data Diupdate Sebagian');
				redirect(site_url('adminarea/produk'));
			} else {
				$upload_data = $this->upload->data();
				$judul = $this->input->post('nama_produk', TRUE);
				$data = array(
					'nama_produk' => $judul,
					'deskripsi_produk' => $this->input->post('deskripsi_produk', TRUE),
					'slug' => strtolower(str_replace(' ', '-', $judul)),
					'harga' => $this->input->post('harga', TRUE),
					'date_updated' => date('Y-m-d'),
					'image_cover' => '/upload/image/' . $upload_data['file_name'],
					'id_user' => $this->session->userdata('id_user'),
				);

				$this->M_layanan->update__produk($data, $this->input->post('id_produk'));
				$this->session->set_flashdata('success', 'Berhasil Mengubah Produk');
				redirect(site_url('adminarea/Produk'));
			}
		}
	}

	public function delete_produk($slug)
	{
		$row = $this->M_layanan->get_detail__slug($slug);

		if ($row) {
			$this->M_layanan->delete__layanan($slug);
			$this->session->set_flashdata('success', 'Berhasil Menghapus Produk');
			redirect(site_url('adminarea/produk'));
		} else {
			$this->M_artikel->set_flashdata('error', 'Produk Tidak Ditemukan');
			redirect(site_url('adminarea/produk'));
		}
	}
}
