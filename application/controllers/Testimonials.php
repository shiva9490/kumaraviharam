<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once(APPPATH . 'controllers/Header.php');
class Testimonials extends Frontend
{
	public function __construct()
    {
        parent::__construct();
        
    }
	public  function index(){
		$data['testimonials'] = $this->User_model->testimonials();
		$this->load->view('testimonials',$data);
		$this->load->view('footer');
	}
	
}