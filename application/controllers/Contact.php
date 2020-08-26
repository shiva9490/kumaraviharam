<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once(APPPATH . 'controllers/Header.php');
class Contact extends Frontend
{
	public function __construct()
    {
        parent::__construct();
        
    }
	public  function index(){
		$data['map'] =$this->User_model->map();
		$data['address'] =$this->User_model->address();
		//print_r($data['address'][0]['desc']);exit;
		$this->load->view('contact',$data);
		$this->load->view('footer');
	}
}