<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once(APPPATH . 'controllers/Header.php');
class Careers extends Frontend
{
	public function __construct()
    {
        parent::__construct();
        
    }
	public  function index(){
		$this->load->view('careers');
		$this->load->view('footer');
	}
	
}