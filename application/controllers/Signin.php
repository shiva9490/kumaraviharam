<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once(APPPATH . 'controllers/Header.php');
class Signin extends Frontend{
	public function __construct()
    {
        parent::__construct();
    }
	public  function index(){
	    if(isset($this->session->userdata['User_loggin'][0]['user_id']) && !empty($this->session->userdata['User_loggin'][0]['user_id'])){
	        redirect(base_url());
	    }else{
    		if(!empty($_POST)){
    			$data = array(
    				'phone' =>$this->input->post('phone'),
    			);
    			$res = $this->User_model->check_mobile($data);
    			if($res){
    				$result = $this->sendOTP($this->input->post('phone'));
    				//print_r($result);exit;
    				$this->session->set_flashdata('otp',"OTP Sent To Your Registered Mobile Number");
    				redirect(base_url().'otp?id='.base64_encode($this->input->post('phone')).'&&pin='.$result);
    			}else{
    				$this->session->set_flashdata('log',"OOPs!,Can not be existing mobile");
    				redirect(base_url().'Signin');
    			}
    		}else{
    			$this->load->view('login');
    			$this->load->view('footer');
    		}
	    }
	}
	
	public function sendOTP($mobile = false) {
        if(isset($mobile) && !empty($mobile)){
    	    $new = $this->generateotp(6);
            $query = $this->User_model->updateOtp($new, $mobile);
            if($query > 0){
                /*$msg = 'Your Secret One Time Password to Verify your Account is '.trim($new);
                $api_key = '25F44C98306952';
                $contacts = $mobile;
                $from = 'TXTSMS';
                $sms_text = urlencode($msg);
                //Submit to server
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, "https://bulksms.smsroot.com/app/smsapi/index.php");
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, "key=".$api_key."&campaign=0&routeid=13&type=text&contacts=".$contacts."&senderid=".$from."&msg=".$sms_text);
                $response = curl_exec($ch);
                curl_close($ch);*/
                $res = $this->session->set_flashdata('msg1', '<div class="alert alert-success text-center">OTP Sent To Your Registered Mobile Number</div>');
                $data['mobile']= $mobile;
                //return true;
                if(isset($mobile) && !empty($mobile)){
                    return $new;
                }
			}
        }
    }
	public function generateotp($length=6){
        $chars = "0123456789";
        $otp = substr(str_shuffle("$chars"),0,$length);
        return $otp;
    }
	public function logout(){
		$admindetails=$this->session->userdata('userdetails');
		$userinfo = $this->session->userdata('userdetails');
        $this->session->unset_userdata($userinfo);
		$this->session->sess_destroy('userdetails');
		$this->session->unset_userdata('userdetails');
		$this->session->set_flashdata('logout', '<div class="alert alert-success text-center">Successfully logout</div>');
        redirect(base_url().'Signin');
	}
}