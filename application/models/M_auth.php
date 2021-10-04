<?php 
class M_auth extends CI_Model{ 

	function cek_login($username, $password){      
		$query=$this->db->query("SELECT * FROM users JOIN profile ON users.id_user = profile.id_users WHERE username='$username' AND password='$password' OR email='$username' AND password='$password'");
		return $query;
	}

	function register_user(){

		$this->db->trans_start();
            //INSERT TO USERS
		$this->db->insert('users', $data);
            //GET ID USER
		$id_user = $this->db->insert_id();
		$result = array();


		$result[] = array(
			'id_user' => $id_user,
			'nama_depan' => 'User',
			'nama_belakang' => 'Profile',
			'date_created' => date('Y-m-d'),
			'date_updated' => date('Y-m-d'),
		);
            //MULTIPLE INSERT TO DETAIL TABLE
		$this->db->insert_batch('profile', $result);
		$this->db->trans_complete();

		return $id_user;

	}
}