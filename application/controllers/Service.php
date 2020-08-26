<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once(APPPATH . 'controllers/Header.php');
class Service extends Frontend
{
	public function __construct()
    {
        parent::__construct();        
    }
	public  function index(){
		$data['service_list'] = $this->User_model->service_title();
		$data['services'] = $this->User_model->service();
		$this->load->view('service',$data);
		$this->load->view('footer');
	}
}