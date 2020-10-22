<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once(APPPATH . 'controllers/Header.php');
class Signup extends Frontend{
	public function __construct()
    {
        parent::__construct();
    }
	public  function index(){
	    if(isset($this->session->userdata['User_loggin'][0]['user_id']) && !empty($this->session->userdata['User_loggin'][0]['user_id'])){
	        redirect(base_url());
	    }else{
    		if(!empty($_POST)){
    		    $check = $this->User_model->check_detail($_POST['email'],$_POST['phone']);
    		   // print_r($check);exit;
    		    if($check == 0){
        			$data = array(
        				'name' =>$this->input->post('name'),
        				'email' =>$this->input->post('email'),
        				'phone' =>$this->input->post('phone'),
        				'pincode' =>$this->input->post('pincode'),
        				'area' =>$this->input->post('area'),
        				'city' =>$this->input->post('city'),
        				'state' =>$this->input->post('state'),
        				'district' =>$this->input->post('district'),
        				'address' =>$this->input->post('address'),
        			);
        			$res = $this->User_model->reg($data);
        			if($res){
        				$result = $this->sendOTP($this->input->post('phone'));
        				$this->session->set_flashdata('reg',"Registration successfully,<br>OTP Sent To Your Registered Mobile Number");
        				redirect(base_url().'otp?id='.base64_encode($this->input->post('phone')).'&&pin='.$result);
        			}else{
        				$this->session->set_flashdata('reg',"OOPs!,Registration failed,Pls try again.");
        				redirect(base_url().'Signup');
        			}
    		    }elseif($check == 3){
    		        $this->session->set_flashdata('reg','<div class="alert alert-warning" role="alert">Mobile Number Already existing.</div>');
        			redirect(base_url().'Signup');
    		    }else{
    		        $this->session->set_flashdata('reg','<div class="alert alert-warning" role="alert">Email Id Already existing.</div>');
        			redirect(base_url().'Signup');
    		    }
    		}else{
    			$this->load->view('signin');
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
}