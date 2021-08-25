<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Artikel extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('M_artikel');

	}

	public function index()
	{
		$artikel = $this->M_artikel->list_article()->result();
		$data = array(
			'title' => 'Artikel - Skripsiku',
			'content' => 'temp_front/artikel',
			'artikel' => $artikel,
		);
		$this->load->view('temp_front/content', $data);
	}

	public function detail($slug)
	{
		$artikel = $this->M_artikel->get_detail__slug($slug)->row();
		$data = array(
			'title' => $artikel->judul_artikel,
			'content' => 'temp_front/detail_artikel',
			'artikel' => $artikel,
		);
		$this->load->view('temp_front/content', $data);
	}

}