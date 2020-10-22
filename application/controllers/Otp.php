<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once(APPPATH . 'controllers/Header.php');
class Otp extends Frontend{
	public function __construct()
    {
        parent::__construct();
    }
	public  function index($mobile = false){
		//print_r($_GET['id']);exit;
		$this->load->view('otp');
		$this->load->view('footer');
	}
	
}