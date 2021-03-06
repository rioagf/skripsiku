<?php 
class M_userarea extends CI_Model{ 

	function data_profile__user()
	{      
		$id = $this->session->userdata('username');
		$this->db->join('profile', 'profile.id_users = users.id_user');
		$this->db->where('username', $id);
		$this->db->or_where('email', $id);
		return $this->db->get('users');
	}

	function update__profile($id, $data1)
	{
		$this->db->where('id_profile', $id);
		$this->db->update('profile', $data1);
	}

	function update__user($username, $data2)
	{
		$this->db->where('username', $username);
		$this->db->update('users', $data2);
	}

	function add_pembayaran($data)
	{
		$this->db->insert('pembayaran', $data);
	}

	function list_pembayaran($username)
	{
		$id_user = $this->session->userdata('id_user');
		$this->db->where('id_user', $id_user);
		return $this->db->get('pembayaran')->result();
	}

	function get_berkas_keluar($username)
	{
		$id_user = $this->session->userdata('id_user');
		$this->db->select('berkas_keluar.*, produk.id_produk, produk.nama_produk,');
		$this->db->join('pemesanan', 'pemesanan.id_pemesanan = berkas_keluar.id_pemesanan', 'left');
		$this->db->join('produk', 'produk.id_produk = pemesanan.id_produk', 'left');
		$this->db->where(array('berkas_keluar.id_user' => $id_user, 'berkas_keluar.status_dokumen' => 'Dokumen Keluar Pemesan'));
		return $this->db->get('berkas_keluar')->result();
	}

	function get_berkas_masuk($username)
	{
		$id_user = $this->session->userdata('id_user');
		$this->db->where(array('id_user' => $id_user, 'status_dokumen' => 'Dokumen Masuk Pemesan'));
		return $this->db->get('berkas_keluar')->result();
	}

	function progress_pesanan($username)
	{
		$id_user = $this->session->userdata('id_user');
		$this->db->select('nama_produk, pemesanan.*');
		$this->db->join('produk', 'produk.id_produk = pemesanan.id_produk');
		$this->db->where(array('pemesanan.id_user' => $id_user));
		return $this->db->get('pemesanan')->result();
	}

	function kirim_berkas($data)
	{
		$this->db->insert('berkas_keluar', $data);
	}

	function list_pemesanan()
	{
		$this->db->select('pemesanan.*, produk.id_produk as produk_id, produk.nama_produk, produk_rating.id_produk as id_produk_rating, produk_rating.id_user, produk_rating.rating');
		$this->db->join('produk', 'produk.id_produk = pemesanan.id_produk', 'left');
		$this->db->join('produk_rating', 'produk_rating.id_produk = produk.id_produk', 'left');
		$this->db->where('pemesanan.id_user', $this->session->userdata('id_user'));
		$this->db->group_by('pemesanan.id_produk');
		return $this->db->get('pemesanan');
	}

}