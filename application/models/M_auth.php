<?php 
class M_auth extends CI_Model{ 

	function cek_login($username, $password){      
		$query=$this->db->query("SELECT * FROM users JOIN profile ON users.id_user = profile.id_users WHERE username='$username' AND password='$password' OR email='$username' AND password='$password'");
		return $query;
	}

	function register_user($data){

		$this->db->trans_start();
            //INSERT TO USERS
		$this->db->insert('users', $data);
            //GET ID USER
		$id_user = $this->db->insert_id();
		$result = array();


		$result[] = array(
			'id_users' => $id_user,
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

	function changeActiveState($key)
	{
		// $this->load->database();
		$data = array(
			'status' => 'aktif'
		);

		$this->db->where('md5(id_user)', $key);
		$this->db->update('users', $data);

		return true;
	}

	//Start: method tambahan untuk reset code  
	public function getUserInfo($id)  
	{  
		$q = $this->db->get_where('users', array('id_user' => $id), 1);   
		if($this->db->affected_rows() > 0){  
			$row = $q->row();  
			return $row;  
		}else{  
			error_log('User tidak ditemukan getUserInfo('.$id.')');  
			return false;  
		}  
	}  

	public function getUserInfoByEmail($email){  
		$q = $this->db->get_where('users', array('email' => $email), 1);   
		if($this->db->affected_rows() > 0){  
			$row = $q->row();  
			return $row;  
		}  
	}  

	public function insertToken($id_user)  
	{    
		$token = substr(sha1(rand()), 0, 30);   
		$date = date('Y-m-d');  

		$string = array(  
			'token'=> $token,  
			'id_user'=>$id_user,  
			'date_created'=>$date  
		);  
		$query = $this->db->insert_string('token',$string);  
		$this->db->query($query);  
		return $token . $id_user;  

	}  

	public function isTokenValid($token)  
	{  
		$tkn = substr($token,0,30);  
		$uid = substr($token,30);

		$q = $this->db->get_where('token', array(  
			'token.token' => $tkn,   
			'token.id_user' => $uid), 1);               

		if($this->db->affected_rows() > 0){  
			$row = $q->row();         

			$created = $row->date_created;  
			$createdTS = strtotime($created);  
			$today = date('Y-m-d');   
			$todayTS = strtotime($today);  

			if($createdTS != $todayTS){  
				return false;  
			}  

			$user_info = $this->getUserInfo($row->id_user);  
			return $user_info;  

		}else{  
			return false;  
		}  

	}   

	public function updatePassword($post)  
	{    
		$this->db->where('id_user', $post['id_user']);  
		$this->db->update('users', array('password' => $post['password']));      
		return true;  
	}   
   //End: method tambahan untuk reset code
}