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