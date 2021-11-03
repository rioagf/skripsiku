<?php 
class M_rating extends CI_Model{
	function get_all(){
		$this->db->join('produk_rating', 'produk_rating.id_produk = produk.id_produk', 'left');
		return $this->db->get('produk')->result();
	}
}