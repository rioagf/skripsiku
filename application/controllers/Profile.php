<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Karir_model');
		$this->load->model('M_rating');

	}

	public function index()
	{
		$data = array(
			'title' => 'Profil Perusahaan - Skripsiku',
			'content' => 'temp_front/profile',
		);
		$this->load->view('temp_front/content', $data);
	}

	public function laporan_keuangan()
	{
		$data = array(
			'title' => 'Laporan Keuangan - Skripsiku',
			'content' => 'temp_front/laporan_keuangan',
		);
		$this->load->view('temp_front/content', $data);
	}

	public function karir()
	{
		$karir = $this->Karir_model->get_all();
		$data = array(
			'title' => 'Karir - Skripsiku',
			'content' => 'temp_front/karir',
			'karir' => $karir,
		);
		$this->load->view('temp_front/content', $data);
	}

	public function index_kepuasan()
	{
		$rating = $this->M_rating->get_all();
		$data = array(
			'title' => 'Index Kepuasan Pelanggan - Skripsiku',
			'content' => 'temp_front/rating',
			'rating' => $rating,
		);
		$this->load->view('temp_front/content', $data);
	}
}