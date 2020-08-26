<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once(APPPATH . 'controllers/Header.php');
class Portfolio extends Frontend
{
	public function __construct()
    {
        parent::__construct();        
    }
	public  function index(){
		$data['portfolio'] =$this->User_model->get_portfolio();
		$data['portfolio_videos'] =$this->User_model->get_portfolio_videos();
		$this->load->view('portfolio',$data);
		$this->load->view('footer');
	}
}