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

	function gallery()
	{    
		return $this->db->get('galeri');

	}
}