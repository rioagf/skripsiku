<?php 
class M_image extends CI_Model{ 

	function slider_home()
	{
		$this->db->where('lokasi', 'home');      
		return $this->db->get('slider');

	}

	function gallery_home()
	{
		$this->db->where('lokasi_galeri', 'home');      
		return $this->db->get('galeri');

	}

	function slider()
	{    
		return $this->db->get('slider');
	}

	function get_slider__by($id)
	{
		$this->db->where('id', $id);
		return $this->db->get('slider');
	}

	function tambah_slider($data)
	{
		$this->db->insert('slider', $data);
	}

	function edit_slider($data, $id)
	{
		$this->db->where('id', $id);
		$this->db->update('slider', $data);
	}

	function hapus_slider($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('slider');
	}

	function gallery()
	{    
		return $this->db->get('galeri');

	}

	function get_gallery__by($id)
	{
		$this->db->where('id', $id);
		return $this->db->get('galeri');
	}

	function tambah_galeri($data)
	{
		$this->db->insert('galeri', $data);
	}

	function edit_galeri($data, $id)
	{
		$this->db->where('id', $id);
		$this->db->update('galeri', $data);
	}

	function hapus_galeri($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('galeri');
	}
}