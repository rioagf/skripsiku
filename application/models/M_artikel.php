<?php 
class M_artikel extends CI_Model{ 

	function list_article()
	{      
		return $this->db->get('artikel');
	}

	function get_detail__slug($slug)
	{
		$this->db->join('users', 'artikel.id_user = users.id_user');
		$this->db->where('slug', $slug);
		return $this->db->get('artikel');
	}

	function create__artikel($data)
	{
		$this->db->insert('artikel', $data);
	}

	function update__artikel($data, $id)
	{
		$this->db->where('id_arikel', $id);
		$this->db->update('artikel', $data);
	}

	function delete__artikel($id)
	{
		$this->db->where('id_artikel', $id);
		$this->db->delete('artikel');
	}
}