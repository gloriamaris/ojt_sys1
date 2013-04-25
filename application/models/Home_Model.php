<?php

class Home_Model extends CI_Model {

	function viewProcurement(){
	
		$query = $this->db->get('procurement'); 
		
		if($query->num_rows() > 0)
			return $query->result();
		else
			return FALSE;
			
	}

	function search_db($search_term = 'default') {
	
		$this->db->select('*');
		$this->db->from('procurement');
		$this->db->where("sp_name LIKE '%$search_term%' OR municipality LIKE '%$search_term%'");
		$query = $this->db->get();	
		
		if($query->num_rows() > 0)
			return $query->result();
		else
			return FALSE;
	
	}
	
	function get_pdf($number){
		$this->db->select('pdb_upload');
		$this->db->from('procurement');
		$this->db->where('sp_number', $number);
		$query = $this->db->get();
		
		if($query->num_rows() > 0)
			return $query->result();
		else
			return FALSE;
	}
	
	function get_script($number){
		$this->db->select('google_earth_link');
		$this->db->from('procurement');
		$this->db->where('sp_number', $number);
		$this->db->limit(1);
		$query = $this->db->get();
		
		if($query->num_rows() > 0)
			return $query->result();
		else
			return FALSE;
	}

	function viewComments($number) {
		
		$this->db->select('*');
		$this->db->from('comments');
		$this->db->where('sp_number', $number);
		$query = $this->db->get();
		
		if ($query->num_rows() > 0){
			foreach ($query->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		else return FALSE;

	}
	
	function processComment($name,$email_address,$comment, $sp_number){		
		
		$current_date = date('Y-m-d');
		$data = array(
			'sp_number' => $sp_number,
			'name' => $name,
			'date_posted' => $current_date,
			'email_address'=>$email_address,
			'comment'=>$comment,
		);
		
		$query=$this->db->insert('comments', $data);
		
		if($query){
			?>
				<script>
					var msg = 'Your comment has been added.'
					alert(msg);
					window.location = "Procurement";
				</script>
			<?php
		}

	}

	function get_date(){
	
		$this->db->select('valid_period');
		$this->db->from('procurement');
		$query = $this->db->get();
		
		if($query->num_rows()>0)
				return $query->result();
		else
				return FALSE;
			
	}
	
	function filterMonth($month) {
	
		$this->db->select('*');
		$this->db->from('procurement');
		$this->db->where("valid_period LIKE '%-$month-%'");
		$query = $this->db->get();

		if($query->num_rows()>0){
			return $query->result();
		}
		else{
			return FALSE;
		}

	}
}