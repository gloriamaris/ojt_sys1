<?php

	class Login extends CI_Controller {
	
	
		function __construct() {
		
		parent::__construct();
		
		$this->load->database();
		$this->load->helper('url');
		$this->load->model('admin_model');
		$this->load->library('grocery_CRUD');	
		
	}
	
	function index(){
		$this->load->helper(array('form'));
		$this->load->view('login');
	}

	function verify_login(){
	$this->load->library('form_validation');
   	$this->form_validation->set_rules('uname', 'Username', 'trim|required|xss_clean');
   	$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');
   		
   		if($this->form_validation->run() == FALSE) {
     	//Field validation failed.  User redirected to login page
     	$this->load->view('login');
     	}

  	 	else{
     		//Go to private area
     	redirect('admin', 'refresh');
   		}
	}	
	
	function check_database($password) {
   	//Field validation succeeded.  Validate against database
   	$username = $this->input->post('uname');
   	//query the database
   	$result = $this->admin_model->login($username, $password);

   		if($result){
    	 $sess_array = array();
     		foreach($result as $row)   {
      		$sess_array = array(
         	'id' => $row->id,
         	'username' => $row->username,
			'password' => $row->password
       		);
			$this->session->set_userdata($sess_array);
       		$this->session->set_userdata('logged_in', $sess_array);
     		}
 		return TRUE;
   		}

  		else   {
    	$this->form_validation->set_message('check_database', 'Incorrect password-username combination.');
     	return false;
   		}
 	}

}