<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once(APPPATH . 'controllers/Header.php');
class Checkout extends Frontend{
	public function __construct()
    {
        parent::__construct();
    }
	public  function index($ids = false){
		//if(isset($this->session->userdata['User_loggin'][0]['user_id']) && !empty($this->session->userdata['User_loggin'][0]['user_id'])){
			//$id = base64_decode($ids);
			$data['ids'] = $ids;
			$data['checkout'] = $this->User_model->checkoutids($ids);
			$data['items'] = $this->User_model->items($ids);
			//echo '<pre>';print_r($data['items']);exit;
			$this->load->view('checkout',$data);    
			$this->load->view('footer');
		/*}else{
			redirect(base_url().'login');
		}*/
	}
	public function paymentsuccess(){
		if(isset($_POST['razorpay_payment_id'])&&!empty($_POST['razorpay_payment_id'])){
		    $ids = $this->input->post('billing_id');
			$data = array(
				'payment_id'=>$_POST['razorpay_payment_id'],
				'payment_status'=>1,
			);
			$res = $this->User_model->update_payment($ids,$data);
			if($res){
			    $this->User_model->send_mail($ids);
				//$this->paydeatils($res);
				//$this->certificate_genration($ids);
				$this->session->unset_userdata('donation');
				redirect(base_url().'success/'.$ids);
			}else{
				redirect($_SERVER['HTTP_REFERER']);
			}
		}else{
			$this->load->view('error');
		}
	}
	public function paydeatils($res){
	    $donid = $this->db->from('donation')->where('don_id',$res)->get()->result();
	    if(count($donid) >0){
	        $payid = $donid[0]->payment_id;
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api.razorpay.com/v1/payments/$payid",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => array(
                      "Authorization: Basic cnpwX3Rlc3RfU2d1QXoyZTByaFNzZzM6bnp1UW5rOUJTMlVaSTRxNVlCdnpndEk3"
                ),
            ));
            $response = curl_exec($curl);
            curl_close($curl);
            $data = json_decode($response,true);
            if($data['status'] == "authorized"){
                $this->cat($payid,$data['amount'],$data['currency']);
            }
            if(!empty($data['acquirer_data']['bank_transaction_id'])){
                $bank_transaction_id = $data['acquirer_data']['bank_transaction_id'];
            }elseif(!empty($data['acquirer_data']['upi_transaction_id'])){
                $bank_transaction_id = $data['acquirer_data']['upi_transaction_id'];
            }
            $de = "entity :".$data['entity']."<br>Amount :".$data['amount']."<br>currency :".$data['currency']."<br>status :".$data['status']."
                            <br>method :".$data['method']."<br>
                            bank :".$data['bank']."<br>Trastion Id :".$bank_transaction_id;
            $data = array(
                'payment_details'=>$de
            );
            $this->User_model->update_payment($donid[0]->don_id,$data);
	    }
	}
	public function cat($payid,$amount,$curr){
	    $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.razorpay.com/v1/payments/$payid/capture",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS =>"{\n    \"amount\": $amount,\n    \"currency\": \"$curr\"\n}",
            CURLOPT_HTTPHEADER => array(
                "Authorization: Basic cnpwX3Rlc3RfU2d1QXoyZTByaFNzZzM6bnp1UW5rOUJTMlVaSTRxNVlCdnpndEk3",
                "Content-Type: application/json"
            ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        echo $response;
	}
    public function send_mail(){
        $this->User_model->send_mail("444bcf7189515d6cd5168d3464fa029a7aa5e41a");
    }
    public function certificate_genration($id = false){
        /*$res = $this->User_model->certificate_genration_list($id);
        if(count($res) >0){
            foreach($res as $r){*/
                /*header('Content-type: image/jpeg');
                $font=realpath('arial.ttf');
                $image = imagecreatefromjpeg(base_url()."assets/images/certificate.jpg");
                print_r($image);exit;
                $color=imagecolorallocate($image, 51, 51, 102);
                $date=date('d F, Y');
                imagettftext($image, 18, 0, 880, 188, $color,$font, $date);
                $name="YOUTUBE";
                imagettftext($image, 48, 0, 120, 520, $color,$font, $name);
                //imagejpeg($image,"certificate/$name.jpg");
                imagejpeg($image);
                imagedestroy($image);*/
                //$name = strtoupper($_POST['name']);
        

                  //designed certificate picture
                  $image = base_url()."assets/images/certificate.jpg";
        
                  $createimage = imagecreatefrompng($image);
        
                  //this is going to be created once the generate button is clicked
                  $output = "assets/images/certificate1.png";
        
                  //then we make use of the imagecolorallocate inbuilt php function which i used to set color to the text we are displaying on the image in RGB format
                  $white = imagecolorallocate($createimage, 205, 245, 255);
                  $black = imagecolorallocate($createimage, 0, 0, 0);
        
                  //Then we make use of the angle since we will also make use of it when calling the imagettftext function below
                  $rotation = 0;
        
                  //we then set the x and y axis to fix the position of our text name
                  $origin_x = 200;
                  $origin_y=260;
                  
                  $font_size = 10;
                  
                  $certificate_text = "sample";
        
                  //font directory for name
                  $drFont = dirname(__FILE__)."/developer.ttf";
        
                  //function to display name on certificate picture
                  $text1 = imagettftext($createimage, $font_size, $rotation, $origin_x, $origin_y, $black, $drFont, $certificate_text);
        
                  imagepng($createimage,$output,3);
            /*}
        }*/
    }
}