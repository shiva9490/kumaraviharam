<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User_model extends CI_Model {
	
	public function banner(){
	    return $this->db->from('home_banners')->where('banner_status',1)->get()->result();	
	}
	
	public function  about_srisailam(){
		return $this->db->from('home_about')->get()->result_array();
	}
	public function  sthala_Puranam(){
		return $this->db->from('sthala_puranam')->get()->result_array();
	}
	/*end conatct deatils */
	
	/*about */
	public function get_home_about(){
		return $this->db->from('home_about')->get()->result();
	}
	public function about(){
	    return $this->db->from('about')->where('about_status',1)->get()->result();	
	}
	public function mission(){
	    return $this->db->from('mission')->where('mission_status',1)->get()->result();	
	}
	public function coreval(){
	    return $this->db->from('corevalues')->where('status',1)->get()->result();	
	}
	public function get_counter(){
	    return $this->db->from('counter')->get()->result();	
	}
	public function get_home_qprocess(){
	    return $this->db->from('home_qprocess')->get()->result();	
	}
	public function get_testimonial(){
	    return $this->db->from('testimonial')->where('status',1)->get()->result();	
	}
	/*End about */
	

	
	/*contact*/
	public function add_contact($data){
		$this->db->insert('contact',$data);
		return $this->db->insert_id();	
	}
	/*End contact*/
	/*testimonials*/
	public function testimonials(){
		return $this->db->from('testimonials')->where('status',1)->get()->result();
	}
	/*End testimonials*/
	/* event_image*/
	
	public function event_image(){
		return $this->db->from('events_images')->where('status',1)->get()->result();
	}
	public function event_video(){
		return $this->db->from('event_video')->where('status',1)->get()->result();
	}
	/*End event_image*/
	/*End blessings*/
	public function  blessings(){
		return $this->db->from('blessings')->where('status',1)->get()->result();
	}
	/*End blessings*/
	/* map*/
	public function map(){
		return $this->db->from('contact_map')->get()->result_array();
	}
	public function address(){
		return $this->db->from('contacts')->get()->result_array();
	}
	/*End map*/
	/*sthala_puranam*/
	public function about_sthala_puranam(){
		return $this->db->from('about_sthala_puranam')->where('status',1)->get()->result();
	}
	/*End sthala_puranam*/
	/*concept_evolution*/
	
	public function concept_evolution(){
		return $this->db->from('about_concept_evolution')->where('status',1)->get()->result();
	}
	/*End sthala_puranam*/
	/*donations_benefits*/
	public function donations_benefits(){
		return $this->db->from('donations_benefits')->get()->result_array();
	}
	/*End donations_benefits*/
	/*Bank accounts*/
	public function bank_accounts(){
		return $this->db->from('bank_accounts')->where('status',1)->get()->result();
	}
	/*End Bank accounts*/
	/*fund_raising_plan*/
	public function fund_raising_plan(){
		return $this->db->from('fund_raising_plan')->where('status',1)->get()->result();
	}
	public function stone_plan(){
	    return $this->db->from('fund_raising_plan')->where('status',1)->where('category',1)->get()->result();
	}
	public function floor_plan(){
	    return $this->db->from('fund_raising_plan')->where('status',1)->where('category',2)->get()->result();
	}
	public function sloka_plan(){
	    return $this->db->from('fund_raising_plan')->where('status',1)->where('category',3)->get()->result();
	}
	public function editdonation($id){
	    return $this->db->from('donation')->where('donationid',$id)->get()->result();
	}
	/*End fund_raising_plan*/
	/*reg*/
	public function reg($data){
		$this->db->insert('user_deatils',$data);
		return $this->db->insert_id();
	}
	public function updateOtp($new, $mobile){
		$a = $this->db->where('phone',$mobile)->update('user_deatils', array('otp' => $new));
		$b = $this->db->affected_rows();
		return $b;
	}
	public function check_detail($email,$mobile){
	    $res = $this->db->from('user_deatils')->where('phone',$mobile)->get()->result();
	    if(count($res) == 0){
	         $ress = $this->db->from('user_deatils')->where('email',$email)->get()->result();
	         if(count($res) == 0){
	             return 0;
	         }else{
	             return 2;
	         }
	    }else{
	        return 3;
	    }
	}
	/*End reg*/
	public function check_otp($mobile,$otp){
		return $this->db->from('user_deatils')->where('phone',$mobile)->where('otp',$otp)->get()->result_array();
	}
	public function verf_done($id){
		return $this->db->where('user_id',$id)->update('user_deatils',array('otp_status' =>1));
	}
	public function check_mobile($mobile = array()){
		//print_r($mobile['phone']);exit;
		return $this->db->from('user_deatils')->where('phone',$mobile['phone'])->get()->result_array();
	}
	/*add_cart*/
	public function add_cart($data){
		//print_r($data);exit;
		$this->db->insert('donation',$data);
		return $this->db->insert_id();
	}
	public function update_cart($data,$ids){
	    return $this->db->where('donationid',$ids)->update('donation',$data);
	}
	public function item_cast($id){
		$res =  $this->db->select('price')->from('fund_raising_plan')->where('id',$id)->get()->result();
		if(!empty($res)){
		    return $res[0]->price;
		}
	}
	public function add_item($data){
		return $this->db->insert('donation_items',$data);
	}
	/*add_cart*/
	/*checkout*/
	public function checkout($id){
		return $this->db->from('donation')->where('don_id',$id)->where('payment_status',2)->get()->result();
	}
	public function checkoutids($id){
		return $this->db->from('donation')->where('donationid',$id)->where('payment_status',2)->get()->result();
	}
	public function user_details($id){
		return $this->db->from('user_deatils')->where('user_id',$id)->get()->result();
	}
	public function items($id){
	    $res = $this->db->from('donation_items')->where('donation_id',$id)->get()->result();
	    if(count($res) >0){
	       // echo '<pre>';print_r($res[0]->qty);exit;
	        $i=0;
	        $data = array();
	        foreach($res as $r){
                if("gen" === $res[$i]->item_id){
                    $item_name = "General Donation";
                }else{
                    $item_name =$this->item_name($r->item_id);
                }
	            $data[$i]['qty'] = $r->qty;
	            $data[$i]['price'] = $r->price;
	            $data[$i]['title'] = $item_name;
	            $i++;
	        }
	        //echo '<pre>';print_r($data);exit;
	        return $data;
	    }
	}
	public function item_name($id = false){
	    $res = $this->db->from('fund_raising_plan')->where('id',$id)->get()->result();
	    return $res[0]->title;
	}
	public function update_payment($id,$data){
		return $this->db->where('donationid',$id)->update('donation',$data);
	}
	/*checkout*/
	public function update_reg($id,$data){
	    return $this->db->where('user_id',$id)->update('user_deatils',$data);
	}
	/*-USer Dash board*/
/*	public function donations($userid){
	    return $this->db->from('user_deatils')->where('user_id',$userid)->get()->result();
	}*/
	/*-USer Dash board*/
	public function donations($userid){
		return $this->db->from('donation')->where('user_id',$userid)->get()->result();
	}
	
	public function send_mail($id){
	    $data = $this->db->from('donation')->where('donationid',$id)->get()->result();
	    if(count($data) >0){
	        if($data[0]->general_donation !="0.00"){
               $a = '<a target="_blank" href='.base_url().'Certificate/1/'.$id.'>General Donation Certificate</a> <i class="fa fa-download" aria-hidden="true"></i><br>';
            }else{
                $a="";
            }
            if($data[0]->temple_stone != "0.00"){
                $b = '<a target="_blank" href='.base_url().'Certificate/2/'.$id.'>Temple Stone Certificate</a> <i class="fa fa-download" aria-hidden="true"></i><br>';
            }else{
                $b="";
            } 
            if($data[0]->temple_flooor != "0.00"){
                $c= '<a target="_blank" href="'.base_url().'Certificate/3/'.$id.'">Temple Floor Area Certificate</a> <i class="fa fa-download" aria-hidden="true"></i><br>';
            }else{
                $c="";
            }
            if($data[0]->sloka != "0.00"){
                $d = '<a target="_blank" href="'.base_url().'Certificate/4/'.$id.'">Sloka Plate Certificate</a> <i class="fa fa-download" aria-hidden="true"></i> ';
            }else{
                $d="";
            }
            
		    $this->email->set_mailtype('html');
            $messag = '';
            $messag.=  '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                    <html xmlns="http://www.w3.org/1999/xhtml">
                      <head>
                        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
                        <meta name="x-apple-disable-message-reformatting" />
                        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
                        <meta name="color-scheme" content="light dark" />
                        <meta name="supported-color-schemes" content="light dark" />
                        <title></title>
                        <style type="text/css" rel="stylesheet" media="all">
                        /* Base ------------------------------ */
                        
                        @import url("https://fonts.googleapis.com/css?family=Nunito+Sans:400,700&display=swap");
                        body {
                          width: 100% !important;
                          height: 100%;
                          margin: 0;
                          -webkit-text-size-adjust: none;
                        }
                        
                        a {
                          color: #3869D4;
                        }
                        
                        a img {
                          border: none;
                        }
                        
                        td {
                          word-break: break-word;
                        }
                        
                        .preheader {
                          display: none !important;
                          visibility: hidden;
                          mso-hide: all;
                          font-size: 1px;
                          line-height: 1px;
                          max-height: 0;
                          max-width: 0;
                          opacity: 0;
                          overflow: hidden;
                        }
                        /* Type ------------------------------ */
                        
                        body,
                        td,
                        th {
                          font-family: "Nunito Sans", Helvetica, Arial, sans-serif;
                        }
                        
                        h1 {
                          margin-top: 0;
                          color: #333333;
                          font-size: 22px;
                          font-weight: bold;
                          text-align: left;
                        }
                        
                        h2 {
                          margin-top: 0;
                          color: #333333;
                          font-size: 16px;
                          font-weight: bold;
                          text-align: left;
                        }
                        
                        h3 {
                          margin-top: 0;
                          color: #333333;
                          font-size: 14px;
                          font-weight: bold;
                          text-align: left;
                        }
                        
                        td,
                        th {
                          font-size: 16px;
                        }
                        
                        p,
                        ul,
                        ol,
                        blockquote {
                          margin: .4em 0 1.1875em;
                          font-size: 16px;
                          line-height: 1.625;
                        }
                        
                        p.sub {
                          font-size: 13px;
                        }
                        /* Utilities ------------------------------ */
                        
                        .align-right {
                          text-align: right;
                        }
                        
                        .align-left {
                          text-align: left;
                        }
                        
                        .align-center {
                          text-align: center;
                        }
                        /* Buttons ------------------------------ */
                        
                        .button {
                          background-color: #3869D4;
                          border-top: 10px solid #3869D4;
                          border-right: 18px solid #3869D4;
                          border-bottom: 10px solid #3869D4;
                          border-left: 18px solid #3869D4;
                          display: inline-block;
                          color: #FFF;
                          text-decoration: none;
                          border-radius: 3px;
                          box-shadow: 0 2px 3px rgba(0, 0, 0, 0.16);
                          -webkit-text-size-adjust: none;
                          box-sizing: border-box;
                        }
                        
                        .button--green {
                          background-color: #22BC66;
                          border-top: 10px solid #22BC66;
                          border-right: 18px solid #22BC66;
                          border-bottom: 10px solid #22BC66;
                          border-left: 18px solid #22BC66;
                        }
                        
                        .button--red {
                          background-color: #FF6136;
                          border-top: 10px solid #FF6136;
                          border-right: 18px solid #FF6136;
                          border-bottom: 10px solid #FF6136;
                          border-left: 18px solid #FF6136;
                        }
                        
                        @media only screen and (max-width: 500px) {
                          .button {
                            width: 100% !important;
                            text-align: center !important;
                          }
                        }
                        /* Attribute list ------------------------------ */
                        
                        .attributes {
                          margin: 0 0 21px;
                        }
                        
                        .attributes_content {
                          background-color: #F4F4F7;
                          padding: 16px;
                        }
                        
                        .attributes_item {
                          padding: 0;
                        }
                        /* Related Items ------------------------------ */
                        
                        .related {
                          width: 100%;
                          margin: 0;
                          padding: 25px 0 0 0;
                          -premailer-width: 100%;
                          -premailer-cellpadding: 0;
                          -premailer-cellspacing: 0;
                        }
                        
                        .related_item {
                          padding: 10px 0;
                          color: #CBCCCF;
                          font-size: 15px;
                          line-height: 18px;
                        }
                        
                        .related_item-title {
                          display: block;
                          margin: .5em 0 0;
                        }
                        
                        .related_item-thumb {
                          display: block;
                          padding-bottom: 10px;
                        }
                        
                        .related_heading {
                          border-top: 1px solid #CBCCCF;
                          text-align: center;
                          padding: 25px 0 10px;
                        }
                        /* Discount Code ------------------------------ */
                        
                        .discount {
                          width: 100%;
                          margin: 0;
                          padding: 24px;
                          -premailer-width: 100%;
                          -premailer-cellpadding: 0;
                          -premailer-cellspacing: 0;
                          background-color: #F4F4F7;
                          border: 2px dashed #CBCCCF;
                        }
                        
                        .discount_heading {
                          text-align: center;
                        }
                        
                        .discount_body {
                          text-align: center;
                          font-size: 15px;
                        }
                        /* Social Icons ------------------------------ */
                        
                        .social {
                          width: auto;
                        }
                        
                        .social td {
                          padding: 0;
                          width: auto;
                        }
                        
                        .social_icon {
                          height: 20px;
                          margin: 0 8px 10px 8px;
                          padding: 0;
                        }
                        /* Data table ------------------------------ */
                        
                        .purchase {
                          width: 100%;
                          margin: 0;
                          padding: 35px 0;
                          -premailer-width: 100%;
                          -premailer-cellpadding: 0;
                          -premailer-cellspacing: 0;
                        }
                        
                        .purchase_content {
                          width: 100%;
                          margin: 0;
                          padding: 25px 0 0 0;
                          -premailer-width: 100%;
                          -premailer-cellpadding: 0;
                          -premailer-cellspacing: 0;
                        }
                        
                        .purchase_item {
                          padding: 10px 0;
                          color: #51545E;
                          font-size: 15px;
                          line-height: 18px;
                        }
                        
                        .purchase_heading {
                          padding-bottom: 8px;
                          border-bottom: 1px solid #EAEAEC;
                        }
                        
                        .purchase_heading p {
                          margin: 0;
                          color: #85878E;
                          font-size: 12px;
                        }
                        
                        .purchase_footer {
                          padding-top: 15px;
                          border-top: 1px solid #EAEAEC;
                        }
                        
                        .purchase_total {
                          margin: 0;
                          text-align: right;
                          font-weight: bold;
                          color: #333333;
                        }
                        
                        .purchase_total--label {
                          padding: 0 15px 0 0;
                        }
                        
                        body {
                          background-color: #F4F4F7;
                          color: #51545E;
                        }
                        
                        p {
                          color: #51545E;
                        }
                        
                        p.sub {
                          color: #6B6E76;
                        }
                        
                        .email-wrapper {
                          width: 100%;
                          margin: 0;
                          padding: 0;
                          -premailer-width: 100%;
                          -premailer-cellpadding: 0;
                          -premailer-cellspacing: 0;
                          background-color: #F4F4F7;
                        }
                        
                        .email-content {
                          width: 100%;
                          margin: 0;
                          padding: 0;
                          -premailer-width: 100%;
                          -premailer-cellpadding: 0;
                          -premailer-cellspacing: 0;
                        }
                        /* Masthead ----------------------- */
                        
                        .email-masthead {
                          padding: 25px 0;
                          text-align: center;
                        }
                        
                        .email-masthead_logo {
                          width: 94px;
                        }
                        
                        .email-masthead_name {
                          font-size: 16px;
                          font-weight: bold;
                          color: #A8AAAF;
                          text-decoration: none;
                          text-shadow: 0 1px 0 white;
                        }
                        /* Body ------------------------------ */
                        
                        .email-body {
                          width: 100%;
                          margin: 0;
                          padding: 0;
                          -premailer-width: 100%;
                          -premailer-cellpadding: 0;
                          -premailer-cellspacing: 0;
                          background-color: #FFFFFF;
                        }
                        
                        .email-body_inner {
                          width: 570px;
                          margin: 0 auto;
                          padding: 0;
                          -premailer-width: 570px;
                          -premailer-cellpadding: 0;
                          -premailer-cellspacing: 0;
                          background-color: #FFFFFF;
                        }
                        
                        .email-footer {
                          width: 570px;
                          margin: 0 auto;
                          padding: 0;
                          -premailer-width: 570px;
                          -premailer-cellpadding: 0;
                          -premailer-cellspacing: 0;
                          text-align: center;
                        }
                        
                        .email-footer p {
                          color: #6B6E76;
                        }
                        
                        .body-action {
                          width: 100%;
                          margin: 30px auto;
                          padding: 0;
                          -premailer-width: 100%;
                          -premailer-cellpadding: 0;
                          -premailer-cellspacing: 0;
                          text-align: center;
                        }
                        
                        .body-sub {
                          margin-top: 25px;
                          padding-top: 25px;
                          border-top: 1px solid #EAEAEC;
                        }
                        
                        .content-cell {
                          padding: 35px;
                        }
                        /*Media Queries ------------------------------ */
                        
                        @media only screen and (max-width: 600px) {
                          .email-body_inner,
                          .email-footer {
                            width: 100% !important;
                          }
                        }
                        
                        @media (prefers-color-scheme: dark) {
                          body,
                          .email-body,
                          .email-body_inner,
                          .email-content,
                          .email-wrapper,
                          .email-masthead,
                          .email-footer {
                            background-color: #333333 !important;
                            color: #FFF !important;
                          }
                          p,
                          ul,
                          ol,
                          blockquote,
                          h1,
                          h2,
                          h3 {
                            color: #FFF !important;
                          }
                          .attributes_content,
                          .discount {
                            background-color: #222 !important;
                          }
                          .email-masthead_name {
                            text-shadow: none !important;
                          }
                        }
                        
                        :root {
                          color-scheme: light dark;
                          supported-color-schemes: light dark;
                        }
                        </style>
                        <!--[if mso]>
                        <style type="text/css">
                          .f-fallback  {
                            font-family: Arial, sans-serif;
                          }
                        </style>
                      <![endif]-->
                      </head>
                      <body>
                        <span class="preheader">Use this link to reset your password. The link is only valid for 24 hours.</span>
                        <table class="email-wrapper" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                          <tr>
                            <td align="center">
                              <table class="email-content" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                <tr>
                                  <td class="email-masthead">
                                    <a href="'.base_url().'" class="f-fallback email-masthead_name">
                                    <img src="'.base_url().'/assets/images/logo.png">
                                  </a>
                                  </td>
                                </tr>
                                <!-- Email Body -->
                                <tr>
                                  <td class="email-body" width="100%" cellpadding="0" cellspacing="0">
                                    <table class="email-body_inner" align="center" width="570" cellpadding="0" cellspacing="0" role="presentation">
                                      <!-- Body content -->
                                      <tr>
                                        <td class="content-cell">
                                          <div class="f-fallback">
                                            <h1>Hi '.$data[0]->fullName.',</h1>
                                            <!-- Action -->
                                            <h2>Thank You!</h2>
                                            <h4>KumaraViharam team, would like to thank you for your generous donation. 
                                                <br>We are grateful for your commitment and spirit of giving. </h4>
                                            <p>Your support has allowed us to promote Vedic tradition for the future generations, along with imporvement of Saiva Kshetram as per existing customs and formalities.</p>
                                            <!-- Sub copy -->
                                            <table class="body-sub" role="presentation">
                                                '.$a.'
                                                '.$b.'
                                                '.$c.'
                                                '.$d.'
                                            </table>
                                          </div>
                                        </td>
                                      </tr>
                                    </table>
                                  </td>
                                </tr>
                                <tr>
                                  <td>
                                    <table class="email-footer" align="center" width="570" cellpadding="0" cellspacing="0" role="presentation">
                                      <tr>
                                        <td class="content-cell" align="center">
                                          <p class="f-fallback sub align-center">
                                            Enugulu Cheruvu Area,<br>
                                            Near High School, Srisailam-518101,<br>
                                            Kurnool District, Andhra Pradesh, India.<br>
                                            E-mail: info@kumaraviharam.org<br>
                                            Web: www.kumaraviharam.org
                                          </p>
                                        </td>
                                      </tr>
                                    </table>
                                  </td>
                                </tr>
                              </table>
                            </td>
                          </tr>
                        </table>
                      </body>
                    </html>';
            //print_r($messag);exit;
            $to_email = $data[0]->Email;
            $from_email = 'support@kumaraviharam.org';
        
    	    /*$subject = 'Enquiry Users In kumaraviharam';
    	    $message = 'Dear Admin Please check the details User Contact You! Details Of the user ';  
    	    $this->email->from($from_email, 'kumara viharam');
    	    $this->email->to($to_email);   
    	    $this->email->subject($subject);
    	    $this->email->message($message);
    	    $status = $this->email->send();*/
    	    
    	    $messagu = 'Donation Report';
    	    $subjectu = 'Donation Report';
    	    $messageu = $messag;//'Thanks for contact us . we will get back soon' ;  
    	    $this->email->set_newline("\r\n");
            $this->email->set_mailtype("html");
    	    $this->email->from($from_email, 'kumara viharam');
    	    $this->email->to($data[0]->Email);   
    	    $this->email->subject($subjectu);
    	    $this->email->message($messageu);
    	    $statusu = $this->email->send();
    	    if(!empty($status)){
    	    	return true;
    	    }else{
    	       return false;
    	    }
		}
	}
	public function donation_details($id){
	    $res = $this->db->from('donation')->where('donationid',$id)->get()->result();
	    if(count($res)>0){
	        return $res;
	    }
	}
}