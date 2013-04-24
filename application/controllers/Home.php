<?php

/* Programmers' Notes:
	1. The Home controller is composed of different functions that can be viewed in
		the Home page of the user.
*/
	
class Home extends CI_Controller {

	public $number;
	public $data;
	
	public function __construct() {
	
        parent:: __construct();
        $this->load->helper('url');
		$this->load->helper('form');
		$this->load->helper('email');
		$this->load->model('Home_Model');
    
	}
	
	function index() {
		redirect('Home/Procurement');	
	}
	
	function procurement() {
	
		$this->load->view('includes/user_header');
		
		$data['table'] = $this->Home_Model->viewProcurement();
		$this->load->view('user_procurement.php', $data);
		
		$this->load->view('includes/footer');
	
	}
	
	function search() {
	
		$this->load->view('includes/user_header');
		
		$search_term = $this->input->post('search');
		$data['results'] = $this->Home_Model->search_db($search_term);
		$this->load->view('search_results.php',$data);
	
		$this->load->view('includes/footer');
	}
	
	function downloadFile() {
		
		$this->load->helper('download');
		$number = $_REQUEST['sp_number'];		
		$data = $this->Home_Model->get_pdf($number);
		
		foreach($data as $no):
				$name = $no->pdb_upload;
				$data2 = file_get_contents("misc/pdf/".$name);
				force_download($name, $data2);
		endforeach;
	
	}
	
	function googleEarth() {
	
        $this->load->library('pagination');
		$this->load->view('includes/user_header');
	
		$number = $this->input->post('link');
		$data['script'] = $this->Home_Model->get_script($number);
		
		$config = array();
		$config['base_url'] =site_url('Home/googleEarth').'/';
		$config['total_rows'] = $this->db->get('comments')->num_rows();
		$config['per_page'] = 2;
		$config['full_tag_open'] = '<div id="pagination"><br><center>';
		$config['full_tag_close'] = '</br></center></div>';

		$this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		
		$data['records'] = $this->Home_Model->viewComments($config['per_page'], $page);
		$data['links'] = $this->pagination->create_links();

	
		$this->load->view('user_googleEarth.php', $data);
	
	}
	
	
	function savecomment(){
		$this->load->model('Home_Model');
		
		$this->load->helper(array('form', 'url'));
		$this->load->helper('email');
		
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('email_address', 'Email', 'required');
		
		$email_address=$this->input->post('email_address');
		
		if ($this->form_validation->run() == FALSE)
		{
			
			echo "<center>Email Required</center>";
			echo $number;
			$this->load->view('user_googleEarth.php', $data);
		}	
		
		else
		{
			
				
			if(valid_email($email_address)) {
	
				echo "<center>Comment Added</center>";
				$name=$this->input->post('name');
				$comment=$this->input->post('comment');
			
				if($this->input->post('submit'))
				{
					$this->Home_Model->processComment($name,$email_address,$comment);
					
				}
			}
			
			else{
			?>
				<script>
					var msg = 'Search returned 0 results'
					alert(msg);
				</script>
			<?php
			}
			
		}
			//$this->load->view('user_googleEarth.php', $data);
		
	}
	
	function archive() {
	
		$this->load->view('includes/user_header');
		$this->load->view('archive.php');
		$this->load->view('includes/footer');
	}
	
	function filter_by_month() {
	
		$this->load->view('includes/user_header');
		
		$month = $_REQUEST['month'];
		
		$result['records'] = $this->Home_Model->filterMonth($month);
		
		$this->load->view('search_archive.php', $result);
		
		$this->load->view('includes/footer');
	}
	
}