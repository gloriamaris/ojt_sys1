<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
	class Admin extends CI_Controller {
	
		function __construct() {
		
			parent::__construct();
		
			$this->load->database();
			$this->load->helper('url');
			$this->load->model('admin_model');
			$this->load->library('grocery_CRUD');	
			$this->check_login();
		
		}
	
		function _example_output($output = null) {
		
			$this->load->view('admin_homepage.php',$output);	
			
		}
		
		function index() {
			
			$this->_example_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
			redirect('admin/form');
		
		}
		
		function check_login(){
			if($this->session->userdata('logged_in')) {
				$session_data = $this->session->userdata('logged_in');
			}

			else {
				redirect('login','refresh');
			}
		}
		
		function home() {
			
			$this->load->view('admin_homepage');
		
		}


		function form() {
			echo "<center><h1 style='margin-left:1em; color:#013; text-shadow: 1px 1px 0.1em #333;'>Sub-Project Forms and Web Postings</h1></center><hr/>";  
					
			$crud = new grocery_CRUD();
			$crud->set_theme('datatables');
			
			$crud->set_table('procurement');
			$crud->columns('sp_number','sp_name', 'sp_description','municipality', 'province', 'valid_period', 'pdb_upload', 'google_earth_link');
			$crud->unset_jquery();
			$crud->set_field_upload('pdb_upload','misc/pdf/');
			
			$crud->set_subject('Form');
			$crud->fields('sp_number','sp_name', 'sp_description','pdb_upload', 'google_earth_link');
			$crud->required_fields('sp_number','sp_name', 'valid_period', 'pdb_upload');
			$crud->unset_texteditor('pdb_upload', 'google_earth_link','sp_description');
			$output = $crud->render();
			
			$this->_example_output($output);

	
		}
		
		function passwordChange() {
		
			echo "	<center> 
					<div class='g span3 push-4'>
						<h3>Change Password </h3>
						</div>
					</center> 
					<hr/>";
			
			$this->load->view('admin_changePassword');
		}
		
		function changepw() {
		
			echo "	<center> 
					<div class='g span3 push-4'>
						<h3>Change Password </h3>
						</div>
					</center> 
					<hr/>";
			

			
			$newpassword = $this->input->post('newpw');
			$newpassword2 = $this->input->post('newpw2');
			$oldpassword = $this->input->post('oldpw');
			$this->load->model('Admin_Model');	

				
			if($newpassword==$newpassword2) {
				$result = $this->Admin_Model->checkUser($oldpassword);	
			
				if($result) {
					$this->Admin_Model->updateDB($newpassword);
					$this->load->view('admin_changePassword');
				}
			}
			else {
				echo "<div class='push e' style='color:red;'>
				<center>The passwords do not match. <center><br/><br/><br/></div>";
				$this->load->view('admin_changePassword');
			}

		}
		
		
		
		function comments() {
			
			echo "<center><h1 style='margin-left:1em; color:#013; text-shadow: 1px 1px 0.1em #333;'>Comments</h1></center><hr/>";  
			
			$crud = new grocery_CRUD();
			$crud->set_theme('datatables');
			
			$crud->set_table('comments');
			$crud->columns('comment_number','name', 'email_address','comment');
			$crud->unset_add();
			$crud->unset_jquery();
			$crud->set_subject('Form');
			$crud->fields('name', 'email_ad','comment');
			$crud->required_fields('email_ad', 'comment');
			$crud->unset_texteditor('body');
			$output = $crud->render();
			
			$this->_example_output($output);

	
		}
		
		function logout(){
			$this->session->unset_userdata('logged_in');
			session_destroy();
			redirect('login', 'refresh');
    	}	
	}