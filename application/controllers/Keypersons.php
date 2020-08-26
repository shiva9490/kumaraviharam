<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once(APPPATH . 'controllers/Header.php');
class Keypersons extends Frontend
{
	public function __construct()
    {
        parent::__construct();
        
    }
	public  function index(){
		$data['blessings']= $this->User_model->blessings();
		$this->load->view('key-persons',$data);
		$this->load->view('footer');
	}
	
}