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

}