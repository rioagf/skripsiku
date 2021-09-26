<?php 
class M_layanan extends CI_Model{ 

	function list_layanan()
	{      
		return $this->db->get('produk');
	}

	function get_detail__slug($slug)
	{
		$this->db->join('users', 'produk.id_user = users.id_user');
		$this->db->where('slug', $slug);
		return $this->db->get('produk');
	}

	function add_layanan($data)
    {
        $this->db->insert('pemesanan',$data);
        $id_pesanan = $this->db->insert_id();

		if (!empty($data['file_pedomanskripsi'])) {
			$data_berkas = array(
				'id_pemesanan' => $id_pesanan,
				'id_user' => $this->session->userdata('id_user'),
				'dokumen' => $data['file_pedomanskripsi'],
				'status_dokumen' => 'Dokumen Keluar Pemesan',
				'perihal' => 'Pengiriman Berkas',
				'date_created' => date('Y-m-d'),
				'date_updated' => date('Y-m-d'),
			);
			$this->db->insert('berkas_keluar',$data_berkas);
		}

		if (!empty($data['file_datapenelitian'])) {
			$data_berkas = array(
				'id_pemesanan' => $id_pesanan,
				'id_user' => $this->session->userdata('id_user'),
				'dokumen' => $data['file_datapenelitian'],
				'status_dokumen' => 'Dokumen Keluar Pemesan',
				'perihal' => 'Pengiriman Berkas',
				'date_created' => date('Y-m-d'),
				'date_updated' => date('Y-m-d'),
			);
			$this->db->insert('berkas_keluar',$data_berkas);
		}

		if (!empty($data['file_skripsiacc'])) {
			$data_berkas = array(
				'id_pemesanan' => $id_pesanan,
				'id_user' => $this->session->userdata('id_user'),
				'dokumen' => $data['file_skripsiacc'],
				'status_dokumen' => 'Dokumen Keluar Pemesan',
				'perihal' => 'Pengiriman Berkas',
				'date_created' => date('Y-m-d'),
				'date_updated' => date('Y-m-d'),
			);
			$this->db->insert('berkas_keluar',$data_berkas);
		}

		if (!empty($data['file_proposalskripsi'])) {
			$data_berkas = array(
				'id_pemesanan' => $id_pesanan,
				'id_user' => $this->session->userdata('id_user'),
				'dokumen' => $data['file_proposalskripsi'],
				'status_dokumen' => 'Dokumen Keluar Pemesan',
				'perihal' => 'Pengiriman Berkas',
				'date_created' => date('Y-m-d'),
				'date_updated' => date('Y-m-d'),
			);
			$this->db->insert('berkas_keluar',$data_berkas);
		}


		if (!empty($data['dokumen'])) {
			$data_berkas = array(
				'id_pemesanan' => $id_pesanan,
				'id_user' => $this->session->userdata('id_user'),
				'dokumen' => $data['dokumen'],
				'status_dokumen' => 'Dokumen Keluar Pemesan',
				'perihal' => 'Pengiriman Berkas',
				'date_created' => date('Y-m-d'),
				'date_updated' => date('Y-m-d'),
			);
			$this->db->insert('berkas_keluar',$data_berkas);
		}


		if (!empty($data['file_pharaphase'])) {
			$data_berkas = array(
				'id_pemesanan' => $id_pesanan,
				'id_user' => $this->session->userdata('id_user'),
				'dokumen' => $data['file_pharaphase'],
				'status_dokumen' => 'Dokumen Keluar Pemesan',
				'perihal' => 'Pengiriman Berkas',
				'date_created' => date('Y-m-d'),
				'date_updated' => date('Y-m-d'),
			);
			$this->db->insert('berkas_keluar',$data_berkas);
		}
        
    }

	function create__produk($data)
	{
		$this->db->insert('produk', $data);
	}

	function update__produk($data, $id)
	{
		$this->db->where('id_produk', $id);
		$this->db->update('produk', $data);
	}

	function delete__layanan($slug)
	{
		$this->db->where('slug', $slug);
		$this->db->delete('produk');
	}
}