<?php 
class M_rating extends CI_Model{
	function get_all(){
		$this->db->select('produk.*');
		$this->db->group_by('produk.id_produk');
		return $this->db->get('produk')->result();
	}

	function add_rating($data)
	{
		$this->db->insert('produk_rating', $data);
	}
}