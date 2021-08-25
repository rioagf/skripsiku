<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminarea extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('M_artikel');
		$this->load->model('M_auth');
		$this->load->model('M_layanan');
		$this->load->model('M_image');
		$this->load->model('Karir_model');

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

	function add_slider()
	{
		$data = array(
			'title' => 'Tambah Slider - Skripsiku',
			'content' => 'temp_admin/tambah_slider',
		);
		$this->load->view('temp_admin/content', $data);
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
			'content' => 'temp_admin/tambah_galeri',
		);
		$this->load->view('temp_admin/content', $data);
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

	public function read($id) 
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
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->tambah_karir();
		} else {
			$data = array(
				'judul_karir' => $this->input->post('judul_karir',TRUE),
				'deskripsi_karir' => $this->input->post('deskripsi_karir',TRUE),
				'date_created' => date('Y-m-d'),
				'date_updated' => date('Y-m-d'),
				'id_user' => $this->session->userdata('id_user'),
			);

			$this->Karir_model->insert($data);
			$this->session->set_flashdata('message', 'Create Record Success');
			redirect(site_url('karir'));
		}
	}

}