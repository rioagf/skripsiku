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
		$bidang_kerja = strtolower(str_replace(' ', '-', $this->session->userdata('bidang_kerja')));

		if ($this->session->userdata('role') == 'admin') {
			$this->db->select('nama_produk, pemesanan.*');
			$this->db->join('produk', 'produk.id_produk = pemesanan.id_produk');
			return $this->db->get('pemesanan');
		}else if ($this->session->userdata('role') == 'staff') {
			$this->db->select('nama_produk, pemesanan.*');
			$this->db->join('produk', 'produk.id_produk = pemesanan.id_produk');
			$this->db->where('produk.id_produk', $bidang_kerja);
			return $this->db->get('pemesanan');
		}
	}

	function get_berkas_masuk()
	{
		$bidang_kerja = strtolower(str_replace(' ', '-', $this->session->userdata('bidang_kerja')));

		if ($this->session->userdata('role') == 'admin') {
			$this->db->select('pemesanan.id_pemesanan, pemesanan.nama_lengkap, pemesanan.id_pemesanan, pemesanan.npm, pemesanan.id_produk, produk.nama_produk, berkas_keluar.*');
			$this->db->join('pemesanan', 'pemesanan.id_pemesanan = berkas_keluar.id_pemesanan');
			$this->db->join('produk', 'produk.id_produk = pemesanan.id_produk');
			$this->db->join('users', 'users.id_user = berkas_keluar.id_user');
			$this->db->join('profile', 'berkas_keluar.id_user = profile.id_users');
			$this->db->where(array('status_dokumen' => 'Dokumen Keluar Pemesan'));
			return $this->db->get('berkas_keluar');
		}else if ($this->session->userdata('role') == 'staff') {
			$this->db->select('pemesanan.id_pemesanan, pemesanan.nama_lengkap, pemesanan.id_pemesanan, pemesanan.npm, pemesanan.id_produk, produk.nama_produk, berkas_keluar.*');
			$this->db->join('pemesanan', 'pemesanan.id_pemesanan = berkas_keluar.id_pemesanan');
			$this->db->join('produk', 'produk.id_produk = pemesanan.id_produk');
			$this->db->join('users', 'users.id_user = berkas_keluar.id_user');
			$this->db->join('profile', 'berkas_keluar.id_user = profile.id_users');
			$this->db->where(array('status_dokumen' => 'Dokumen Keluar Pemesan', 'produk.slug' => $bidang_kerja));
			return $this->db->get('berkas_keluar');
		}
	}

	function get_berkas_keluar()
	{
		$bidang_kerja = strtolower(str_replace(' ', '-', $this->session->userdata('bidang_kerja')));

		if ($this->session->userdata('role') == 'admin') {
			$this->db->select('pemesanan.id_pemesanan, pemesanan.nama_lengkap, pemesanan.id_pemesanan, pemesanan.npm, pemesanan.id_produk, produk.nama_produk, berkas_keluar.*');
			$this->db->join('pemesanan', 'pemesanan.id_pemesanan = berkas_keluar.id_pemesanan');
			$this->db->join('produk', 'produk.id_produk = pemesanan.id_produk');
			$this->db->join('users', 'users.id_user = berkas_keluar.id_user');
			$this->db->join('profile', 'berkas_keluar.id_user = profile.id_users');
			$this->db->where(array('status_dokumen' => 'Dokumen Masuk Pemesan'));
			return $this->db->get('berkas_keluar');
		}else if ($this->session->userdata('role') == 'staff') {
			$this->db->select('pemesanan.id_pemesanan, pemesanan.nama_lengkap, pemesanan.id_pemesanan, pemesanan.npm, pemesanan.id_produk, produk.nama_produk, berkas_keluar.*');
			$this->db->join('pemesanan', 'pemesanan.id_pemesanan = berkas_keluar.id_pemesanan');
			$this->db->join('produk', 'produk.id_produk = pemesanan.id_produk');
			$this->db->join('users', 'users.id_user = berkas_keluar.id_user');
			$this->db->join('profile', 'berkas_keluar.id_user = profile.id_users');
			$this->db->where(array('status_dokumen' => 'Dokumen Masuk Pemesan', 'produk.slug' => $bidang_kerja));
			return $this->db->get('berkas_keluar');
		}
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

	function get_staff()
	{
		$this->db->join('profile', 'profile.id_users = users.id_user');
		$this->db->where('user_role', 'staff');
		return $this->db->get('users');
	}

	function add_staff($data)
	{
		$this->db->insert('users', $data);
		$id_user = $this->db->insert_id();

		$config['upload_path']          = './assets/img/';
		$config['allowed_types']        = 'gif|png|jpg|jpeg';
		$config['max_size']             = 5000;
		$config['max_width']            = 1960;
		$config['max_height']           = 1080;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('ktp')){
			$data2 = array(
				'nama_depan' => $this->input->post('nama_depan'),
				'nama_belakang' => $this->input->post('nama_depan'),
				'alamat' => $this->input->post('alamat'),
				'asal_univ' => 'Skripsiku',
				'fakultas' => 'Manajemen',
				'jurusan' => $this->input->post('posisi'),
				'bidang_kerja' => $this->input->post('bidang_kerja'),
				'npm_nim' => $this->input->post('nip'),
				'tanggal_lahir' => $this->input->post('tanggal_lahir'),
				'ktp' => '',
				'id_users' => $id_user,
				'date_created' => date('Y-m-d'),
				'date_updated' => date('Y-m-d'),
			);
			$this->db->insert('profile', $data2);
		} else {
			$upload_data = $this->upload->data();
			$data2 = array(
				'nama_depan' => $this->input->post('nama_depan'),
				'nama_belakang' => $this->input->post('nama_depan'),
				'alamat' => $this->input->post('alamat'),
				'asal_univ' => 'Skripsiku',
				'fakultas' => 'Manajemen',
				'jurusan' => $this->input->post('posisi'),
				'bidang_kerja' => $this->input->post('bidang_kerja'),
				'npm_nim' => $this->input->post('nip'),
				'tanggal_lahir' => $this->input->post('tanggal_lahir'),
				'ktp' => '/upload/image/'.$upload_data['file_name'],
				'id_users' => $id_user,
				'date_created' => date('Y-m-d'),
				'date_updated' => date('Y-m-d'),
			);
			$this->db->insert('profile', $data2);
		}
	}

	function update_staff($data, $id)
	{
		$this->db->where('id_user', $id);
		$this->db->update('users', $data);

		$config['upload_path']          = './assets/img/';
		$config['allowed_types']        = 'gif|png|jpg|jpeg';
		$config['max_size']             = 5000;
		$config['max_width']            = 1960;
		$config['max_height']           = 1080;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('ktp')){
			$data2 = array(
				'nama_depan' => $this->input->post('nama_depan'),
				'nama_belakang' => $this->input->post('nama_depan'),
				'alamat' => $this->input->post('alamat'),
				'asal_univ' => 'Skripsiku',
				'fakultas' => 'Manajemen',
				'jurusan' => $this->input->post('posisi'),
				'bidang_kerja' => $this->input->post('bidang_kerja'),
				'npm_nim' => $this->input->post('nip'),
				'tanggal_lahir' => $this->input->post('tanggal_lahir'),
				'ktp' => $this->input->post('ktp_lama'),
				'date_updated' => date('Y-m-d'),
			);
			$this->db->where('id_users', $id);
			$this->db->update('profile', $data2);
		} else {
			$upload_data = $this->upload->data();
			$data2 = array(
				'nama_depan' => $this->input->post('nama_depan'),
				'nama_belakang' => $this->input->post('nama_depan'),
				'alamat' => $this->input->post('alamat'),
				'asal_univ' => 'Skripsiku',
				'fakultas' => 'Manajemen',
				'jurusan' => $this->input->post('posisi'),
				'bidang_kerja' => $this->input->post('bidang_kerja'),
				'npm_nim' => $this->input->post('nip'),
				'tanggal_lahir' => $this->input->post('tanggal_lahir'),
				'ktp' => '/upload/image/'.$upload_data['file_name'],
				'date_updated' => date('Y-m-d'),
			);
			$this->db->where('id_users', $id);
			$this->db->update('profile', $data2);
		}
	}

	function delete_staff($id)
	{
		// delete user
		$this->db->where('id_user', $id);
		$this->db->delete('users');

		// delete profile
		$this->db->where('id_users', $id);
		$this->db->delete('profile');
	}

	function get_customer()
	{
		$this->db->join('profile', 'profile.id_users = users.id_user');
		$this->db->where('user_role', 'user');
		return $this->db->get('users');
	}

	function delete_customer($id)
	{
		// delete user
		$this->db->where('id_user', $id);
		$this->db->delete('users');

		// delete pemesanan
		$this->db->where('id_user', $id);
		$this->db->delete('pemesanan');

		// delete database berkas keluar
		$this->db->where('id_user', $id);
		$this->db->delete('berkas_keluar');

		// delete profile
		$this->db->where('id_users', $id);
		$this->db->delete('profile');
	}
	
	function get_keuangan()
	{
		return $this->db->get('laporan_keuangan');
	}

	function add_keuangan($data)
	{
		$this->db->insert('laporan_keuangan', $data);
	}

	function update_keuangan($data, $id)
	{
		$this->db->where('id_laporankeuangan', $id);
		$this->db->update('laporan_keuangan', $data);
	}

	function delete_keuangan($id)
	{
		$this->db->where('id_laporankeuangan', $id);
		$this->db->delete('laporan_keuangan');
	}

}