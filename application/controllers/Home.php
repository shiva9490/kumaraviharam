<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once(APPPATH . 'controllers/Header.php');
class Home extends Frontend
{
	public function __construct()
    {
        parent::__construct();
    }
	public  function index(){
		$data['banner'] = $this->User_model->banner();
		$data['about_srisailam'] = $this->User_model->about_srisailam();
		$data['sthala_Puranam'] = $this->User_model->sthala_Puranam();
		//print_r($data['about_srisailam'][0]['about']);exit;
		$this->load->view('home',$data);
		$this->load->view('footer');
	}	
}	