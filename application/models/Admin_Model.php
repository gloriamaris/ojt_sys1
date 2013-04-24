<?php

class Admin_Model extends CI_Model {
	
	
	function login($username, $password) {
   		$this->db->select('id, username, password');
   		$this->db->from('user');
   		$this->db->where('username', $username);
   		$this->db->where('password', md5($password));
   		$this->db->limit(1);
   		$query = $this->db->get();
   		
   		if($query->num_rows() == 1)
			return $query->result();
   		else
			return false;
 	}
	
	function checkUser($oldpassword) {
	
	
		if($this->session->userdata('password') == md5($oldpassword)) {
			return true;
		}
		else {
			echo "<div class='push e' style='color:red;'>
					<center>The old password is invalid.</center>
					<br/><br/><br/></div>";
			$this->load->view('admin_changePassword');
			}
	}
	
	function updateDB($newpassword) {
		$n = $this->session->userdata('username');
		
		$data = array(
			'username' => $n,
			'password' => md5($newpassword)
		);
		
		$sess_array = array(
			'id' => $this->session->userdata('id'),
         	'username' => $this->session->userdata('username'),
			'password' => md5($newpassword)
       	);
		
		$this->session->set_userdata($sess_array);
		$this->db->where('id', $this->session->userdata('id'));
		$this->db->update('user', $data);
		
		if($data['password']==$this->session->userdata('password')) {
			echo "<div class='push e' style='color:blue;'>
				<center>Update successful. Return to
				<a href='http://localhost/PRDP/index.php/Admin/'></center>
				home.
				</a>
				<br/><br/><br/><br/></div>";
			$this->load->view('admin_changePassword');
			
		}
		else return false;
	}
}