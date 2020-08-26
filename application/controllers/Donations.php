<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once(APPPATH . 'controllers/Header.php');
class Donations extends Frontend
{
	public function __construct()
    {
        parent::__construct();
        
    }
	public  function index(){
		$this->load->view('donations');
		$this->load->view('footer');
	}
	
}