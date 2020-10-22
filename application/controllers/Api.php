<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Api extends CI_Controller{
	public function __construct()
    {
        parent::__construct();
		$this->load->model('User_model');
    }
	public function cities_mandal() {
        if(isset($_POST['zipcode']) && !empty($_POST['zipcode'])) {
            $ch = curl_init();
            $url = 'http://postalpincode.in/api/pincode/'.$_POST['zipcode'];
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); 
            $result = curl_exec($ch);
            curl_close($ch);
            print_r($result);
        }
    }
	public function countrycode(){
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://gist.githubusercontent.com/Goles/3196253/raw/9ca4e7e62ea5ad935bb3580dc0a07d9df033b451/CountryCodes.json",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => array(
				"cache-control: no-cache",
				"postman-token: 19948a0f-9115-84eb-4e56-91726b571d73"
			),
		));
		$response = curl_exec($curl);
		$err = curl_error($curl);
		curl_close($curl);
		if ($err){
			echo "cURL Error #:" . $err;
		} else {
			//echo json_encode(array('country'=>$response),JSON_PRETTY_PRINT);
			echo $response;
		}
	}
	public function verification(){
		$mobile = base64_decode($this->input->post('id'));
		$otp  =$this->input->post('otp');
		if(!empty($otp)){
			$check = $this->User_model->check_otp($mobile,$otp);
			if(count($check) >0){
				//echo '<pre>';print_r($check[0]['user_id']);exit;
				$this->User_model->verf_done($check[0]['user_id']);
				$this->session->set_userdata('User_loggin',$check);
				//echo '<pre>'; print_r($this->session->userdata['User_loggin'][0]['user_id']);exit;
    			redirect(base_url().'donations');
			}else{
				$this->session->set_flashdata('otp',"Wrong Otp pls try agin...");
				redirect($_SERVER['HTTP_REFERER']);
			}
		}else{
			$this->session->set_flashdata('otp',"Wrong Otp pls try agin...");
			redirect($_SERVER['HTTP_REFERER']);
		}
	}
}