<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Footer extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();	
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->library('email');
		$this->load->library('user_agent');
		$this->load->library("pagination");
		$this->load->helper('directory');
		$this->load->helper('security');
		//$this->load->model('Home_model');
		//$this->load->model('Customer_model');
		$this->load->view('footer');
			
	}
	
}
