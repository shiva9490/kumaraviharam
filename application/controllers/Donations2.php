<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once(APPPATH . 'controllers/Header.php');
class Donations2 extends Frontend{
	public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
    }
	public  function index(){
	    $data['donations_benefits'] = $this->User_model->donations_benefits();
		$data['bank_accounts'] = $this->User_model->bank_accounts();
		$data['fund_raising_plan'] = $this->User_model->fund_raising_plan();
		$this->load->view('donation2',$data);
	}
	public function add(){
	    //echo '<pre>';print_r($_POST);exit;
		date_default_timezone_set('Asia/Kolkata');
		$date =  date("Y-m-d h:i:s");
		$don = array(
		    'id' =>isset($_POST['id'])?$_POST['id']:'',
		    'price' =>isset($_POST['price'])?$_POST['price']:'',
		    'qty' =>isset($_POST['qty'])?$_POST['qty']:'',
		    'sub' =>isset($_POST['sub'])?$_POST['sub']:'',
		    'total_amount' =>isset($_POST['total'])?$_POST['total']:'',
		);
	    $this->session->set_userdata('donation',$don);
		{
            $this->form_validation->set_rules('fullName', 'fullName', 'required');
            $this->form_validation->set_rules('Surname', 'Surname', 'required');
            //$this->form_validation->set_rules('gender', 'gender', 'required');
            //$this->form_validation->set_rules('Date_of_Birth', 'Date_of_Birth', 'required');
            //$this->form_validation->set_rules('Son_Daughter', 'Son_Daughter', 'required');
            $this->form_validation->set_rules('Mobile_Number', 'Mobile_Number', 'required');
            $this->form_validation->set_rules('Email', 'Email', 'required');
            $this->form_validation->set_rules('Address', 'Address', 'required');
            $this->form_validation->set_rules('Pincode', 'Pincode', 'required');
            $this->form_validation->set_rules('city', 'city', 'required');
            $this->form_validation->set_rules('state', 'state', 'required');
            //$this->form_validation->set_rules('Gotram', 'Gotram', 'required');
            $this->form_validation->set_rules('Certificate', 'Certificate', 'required');
            //$this->form_validation->set_rules('phoneNumber', 'phoneNumber', 'required');
            //$this->form_validation->set_rules('Birthstar', 'Birthstar', 'required');
            //$this->form_validation->set_rules('reference_marking', 'reference_marking', 'required');
            //$this->form_validation->set_rules('Purpose', 'Purpose', 'required');
            //$this->form_validation->set_rules('PAN', 'PAN', 'required');
            if(!empty($_POST['Firm'])){
                $this->form_validation->set_rules('Firm', 'Firm', 'required');
            }
            if(!empty($_POST['Reference'])){
                $this->form_validation->set_rules('Reference', 'Reference', 'required');
            }
            /*print_r($this->form_validation->run());
            print_r(validation_errors());
            exit;*/
            if ($this->form_validation->run() == FALSE){
                $data['fund_raising_plan'] = $this->User_model->fund_raising_plan();
		        $this->load->view('donations',$data);
            }else{
                $picture1 =''; 
        	    if(!empty($_FILES['Reference']['name'])){
        		    $config['upload_path'] = 'assets/images/';
        		    $config['allowed_types'] = 'jpg|jpeg|png|gif';
        		    $config['file_name'] = $_FILES['Reference']['name']; 
        		    $config['encrypt_name'] = TRUE;
        		    $this->load->library('upload',$config);
        		    $this->upload->initialize($config);   
        		    if($this->upload->do_upload('Reference')){
        		        $uploadData = $this->upload->data();
        		        $picture1 = $uploadData['file_name'];
        		    }
        		}
        		if($picture1){
        		    $data['Reference'] = $picture1;
        		}
                $data = array(
                    'fullName'=>isset($_POST['fullName'])?$_POST['fullName']:'',
                    'Surname'=>isset($_POST['Surname'])?$_POST['Surname']:'',
                    'gender'=>isset($_POST['gender'])?$_POST['gender']:'',
                    'Date_of_Birth'=>isset($_POST['Date_of_Birth'])?$_POST['Date_of_Birth']:'',
                    'Son_Daughter'=>isset($_POST['Son_Daughter'])?$_POST['Son_Daughter']:'',
                    'Mobile_Number'=>isset($_POST['Mobile_Number'])?$_POST['Mobile_Number']:'',
                    'Email'=>isset($_POST['Email'])?$_POST['Email']:'',
                    'Address'=>isset($_POST['Address'])?$_POST['Address']:'',
                    'Pincode'=>isset($_POST['Pincode'])?$_POST['Pincode']:'',
                    'city'=>isset($_POST['city'])?$_POST['city']:'',
                    'state'=>isset($_POST['state'])?$_POST['state']:'',
                    'Gotram'=>isset($_POST['Gotram'])?$_POST['Gotram']:'',
                    'Certificate'=>isset($_POST['Certificate'])?$_POST['Certificate']:'',
                    'phoneNumber'=>isset($_POST['phoneNumber'])?$_POST['phoneNumber']:'',
                    'Birthstar'=>isset($_POST['Birthstar'])?$_POST['Birthstar']:'',
                    'reference_marking'=>isset($_POST['reference_marking'])?$_POST['reference_marking']:'',
                    //'Reference'=>isset($_POST['Reference'])?$_POST['Reference']:'',
                    'Purpose'=>isset($_POST['Purpose'])?$_POST['Purpose']:'',
                    'PAN'=>isset($_POST['PAN'])?$_POST['PAN']:'',
                    'Firm'=>isset($_POST['Firm'])?$_POST['Firm']:'',
                    'total_amount'=>$_POST['total'],
                    'doner_type'=>$_POST['doner_type'],
				    'add_date'=>$date
                );
                //print_r($data);exit;
                $res = $this->User_model->add_cart($data);
                if($res){
				   $i=0;$id = $res;
    				/*foreach($_POST['id'] as $r){
    					if($_POST['qty'][$i] > 0){
    					    $b = $this->User_model->item_cast($_POST['id'][$i]);
    					    if(!empty($b)){
    					        $pri = $this->User_model->item_cast($_POST['id'][$i]);
    					    }else{
    					        $pri = $_POST['price'][$i];
    					    }
    						$data = array(
    							'donation_id'=>$id,
    							'item_id'=>$_POST['id'][$i],
    							'qty'=>$_POST['qty'][$i],
    							'price'=> $pri,
    							'add_date'=>$date,
    						);
    						//print_r($data);exit;
    						$res = $this->User_model->add_item($data);
    					}
    					$i++;
    				}*/
    				redirect(base_url().'checkout/'.base64_encode($id));
    			}else{
    				redirect($_SERVER['HTTP_REFERER']);
    			}
        }
		}
	}
}