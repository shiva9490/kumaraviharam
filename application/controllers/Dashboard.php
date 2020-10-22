<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends CI_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model('User_model');
		$this->load->library('upload');
		$this->load->library('session');
		$this->load->helper('url');
    }

	/*-----------admin--------*/
	public function index(){
		if(isset($this->session->userdata['User_loggin'][0]['user_id']) && !empty($this->session->userdata['User_loggin'][0]['user_id'])){
			$this->load->view('user/index');
		}else{
			redirect(base_url().'Signin');
		}
	}
	
	
	public function user_details(){
		if(isset($this->session->userdata['User_loggin'][0]['user_id']) && !empty($this->session->userdata['User_loggin'][0]['user_id'])){
			$userid= $this->session->userdata['User_loggin'][0]['user_id'];
			$data['user_details'] = $this->User_model->user_details($userid);
			$this->load->view('user/user_details',$data);
		}else{
			redirect(base_url().'Signin');
		}
	}
	public function update_profile(){
	    if(isset($this->session->userdata['User_loggin'][0]['user_id']) && !empty($this->session->userdata['User_loggin'][0]['user_id'])){
			$userid= $this->session->userdata['User_loggin'][0]['user_id'];
			$data = array(
				'name' =>$this->input->post('name'),
				'email' =>$this->input->post('email'),
				//'phone' =>$this->input->post('phone'),
				'pincode' =>$this->input->post('pincode'),
				'area' =>$this->input->post('area'),
				'city' =>$this->input->post('city'),
				'state' =>$this->input->post('state'),
				'district' =>$this->input->post('district'),
				'address' =>$this->input->post('address'),
			);
			$res = $this->User_model->update_reg($userid,$data);
			if($res){
				$this->session->set_flashdata('update',"<span class='alert'>Profile updated successfully.</span>");
				redirect($_SERVER['HTTP_REFERER']);
			}else{
				$this->session->set_flashdata('update',"<span class='alert'>OOPs!,Profile updated failed..</span>");
				redirect($_SERVER['HTTP_REFERER']);
			}
	    }else{
	        redirect(base_url().'Signin');
		}
	}
	
	public function donations(){
		if(isset($this->session->userdata['User_loggin'][0]['user_id']) && !empty($this->session->userdata['User_loggin'][0]['user_id'])){
			$userid= $this->session->userdata['User_loggin'][0]['user_id'];
			$data['donations_list'] = $this->User_model->donations($userid);
			$this->load->view('user/donation_list',$data);
		}else{
			redirect(base_url().'Signin');
		}
	}	
}