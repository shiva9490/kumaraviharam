<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once(APPPATH . 'controllers/Header.php');
class Events extends Frontend
{
	public function __construct()
    {
        parent::__construct();
        
    }
	public  function index(){
		$data['event_image'] = $this->User_model->event_image();
		$data['event_video'] = $this->User_model->event_video();
		//print_r($data['event_video']);exit;
		$this->load->view('events',$data);
		$this->load->view('footer');
	}
	
}