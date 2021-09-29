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

	function list_pemesanan()
	{
		$this->db->select('nama_produk, pemesanan.*');
		$this->db->join('produk', 'produk.id_produk = pemesanan.id_produk');
		return $this->db->get('pemesanan');
	}

	function get_berkas_masuk()
	{
		$this->db->select('pemesanan.id_pemesanan, pemesanan.nama_lengkap, pemesanan.id_pemesanan, pemesanan.npm, pemesanan.id_produk, produk.nama_produk, berkas_keluar.*');
		$this->db->join('pemesanan', 'pemesanan.id_pemesanan = berkas_keluar.id_pemesanan');
		$this->db->join('produk', 'produk.id_produk = pemesanan.id_produk');
		$this->db->join('users', 'users.id_user = berkas_keluar.id_user');
		$this->db->join('profile', 'berkas_keluar.id_user = profile.id_users');
		$this->db->where(array('status_dokumen' => 'Dokumen Keluar Pemesan'));
		return $this->db->get('berkas_keluar');
	}

	function get_berkas_keluar()
	{
		$this->db->select('pemesanan.id_pemesanan, pemesanan.nama_lengkap, pemesanan.id_pemesanan, pemesanan.npm, pemesanan.id_produk, produk.nama_produk, berkas_keluar.*');
		$this->db->join('pemesanan', 'pemesanan.id_pemesanan = berkas_keluar.id_pemesanan');
		$this->db->join('produk', 'produk.id_produk = pemesanan.id_produk');
		$this->db->join('users', 'users.id_user = berkas_keluar.id_user');
		$this->db->join('profile', 'berkas_keluar.id_user = profile.id_users');
		$this->db->where(array('status_dokumen' => 'Dokumen Masuk Pemesan'));
		return $this->db->get('berkas_keluar');
	}

	function input_berkas_keluar($data)
	{
		$this->db->insert('berkas_keluar', $data);
	}

	function get_pembayaran()
	{
		return $this->db->get('pembayaran');
	}

	function get_setting()
	{
		$this->db->where('id_setting', '1');
		return $this->db->get('setting');
	}

	function update_setting($data, $id)
	{
		$this->db->where('id_setting', $id);
		$this->db->update('setting', $data);
	}

	function update_progress($data, $id)
	{
		$this->db->where('id_pemesanan', $id);
		$this->db->update('pemesanan', $data);
	}

}