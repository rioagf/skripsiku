<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Layanan extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('M_layanan');
		$this->load->model('M_userarea');

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
			);
			$this->load->view('temp_user/content', $data);
		}
	}
}