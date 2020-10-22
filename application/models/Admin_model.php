<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model {
	
	public function users_count(){
	    return $this->db->query("SELECT count(user_id) as usercount FROM `registration`")->result();
	}
	/*------------admin login--------------*/
	public function Total_Doneros(){
	    return $this->db->query('SELECT count(`don_id`) as doners FROM `donation` WHERE `payment_status`=1')->result();
	}
	public function Donation_amount(){
	    return $this->db->query('SELECT sum(general_donation+`temple_stone`+`temple_flooor`+`sloka`) as total FROM `donation` WHERE `payment_status`=1')->result();
	}
	public function Today_Donation_Amount(){
	    return $this->db->query('SELECT sum(general_donation+`temple_stone`+`temple_flooor`+`sloka`)  as today_total FROM `donation` WHERE `payment_status`=1 and `add_date` = CURRENT_DATE')->result();
	}
	public function Today_Transactions(){
	    return $this->db->query('SELECT count(don_id) as todayorder FROM `donation` WHERE `payment_status`=1 and `add_date` = CURRENT_DATE')->result();
	}
	public function login_details($data){
		//print_r($data);exit();
		$sql = "SELECT * FROM admin WHERE (username ='".$data['username']."' AND password='".$data['password']."' AND admin_status=1)";
		return $this->db->query($sql)->row_array();	
	}
	public function get_admin_details($admin_id){
		$this->db->from('admin');		
		$this->db->where('admin_id',$admin_id);
        return $this->db->get()->row_array();
	}
	
	/*---------------------Homre home_Sthala_Puranam-----------------*/	
	public function home_Sthala_Puranam(){
		return $this->db->from('sthala_puranam')->get()->result();
	}
	public function edit_home_Sthala_Puranam($id){
		return $this->db->from('sthala_puranam')->where('id',$id)->get()->result();
	}
	public function update_Sthala_Puranam($id,$data){
		return $this->db->where('id',$id)->update('sthala_puranam',$data);
	}
	/*---------------------End Homre home_Sthala_Puranam-----------------*/
	/*---------------------Homre About--------------------------------*/
	
	public function home_about(){
		return $this->db->from('home_about')->get()->result();
	}
	public function edit_habout($id){
		return $this->db->from('home_about')->where('about_id',$id)->get()->result();
	}
	public function update_habout($id,$data){
		return $this->db->where('about_id',$id)->update('home_about',$data);
	}
	
	/*---------------------Homre About--------------------------------*/
	/*---------------------testimonials--------------------------------*/
	public function testimonials(){
		return $this->db->from('testimonials')->get()->result();
	}
	public function edit_testimonials($id){
		return $this->db->from('testimonials')->where('id',$id)->get()->result();
	}
	public function update_testimonials($id,$data){
		return $this->db->where('id',$id)->update('testimonials',$data);
	}
	
	public function inactive_testimonials($id){
		return $this->db->where('id',$id)->update('testimonials',array('status'=>2));
	}
	public function active_testimonials($id){
		return $this->db->where('id',$id)->update('testimonials',array('status'=>1));
	}
	public function delete_testimonials($id){
		return $this->db->where('id',$id)->delete('testimonials');
	}
	public function add_testimonials($data){
		return $this->db->insert('testimonials',$data);
	}
	/*---------------------testimonials--------------------------------*/
	/*---------------------event imges--------------------------------*/
	public function event_imges(){
		return $this->db->from('events_images')->get()->result();
	}
	public function inactive_event_imges($id){
		return $this->db->where('id',$id)->update('events_images',array('status'=>2));
	}
	public function active_event_imges($id){
		return $this->db->where('id',$id)->update('events_images',array('status'=>1));
	}
	public function delete_event_imges($id){
		return $this->db->where('id',$id)->delete('events_images');
	}
	public function gallerydet($data){
		$this->db->trans_begin();
		if(isset($data['rimages']) && count($data['rimages']) > 0){ 
    		foreach ($data['rimages'] as $rimage) {
    			$this->db->insert('events_images', array('image'=>$rimage));
    		}
		}
		if ($this->db->trans_status() == FALSE) {
			$this->db->trans_rollback();
			return false;
		}else{
			$this->db->trans_commit();
			return true;
		}
	}
	/*---------------------End event_imges--------------------------------*/
	/*---------------------events_videos--------------------------------*/
	public function events_videos(){
		return $this->db->from('event_video')->get()->result();
	}
	public function addevent_video($data){
		return $this->db->insert('event_video',$data);
	}
	public function active_event_video($id){
		return $this->db->where('id',$id)->update('event_video',array('status'=>1));
	}
	public function inactive_event_video($id){
		return $this->db->where('id',$id)->update('event_video',array('status'=>2));
	}
	public function delete_event_video($id){
		return $this->db->where('id',$id)->delete('event_video');
	}
	/*---------------------End events_videos--------------------------------*/
	/*---------------------Blessings--------------------------------*/
	public function blessings(){
		return $this->db->from('blessings')->get()->result();
	}
	public function addevent_blessings($data){
		return $this->db->insert('blessings',$data);
	}
	public function edit_blessings($id){
		return $this->db->from('blessings')->where('id',$id)->get()->result();
	}
	public function active_blessings($id){
		return $this->db->where('id',$id)->update('blessings',array('status'=>1));
	}
	public function inactive_blessings($id){
		return $this->db->where('id',$id)->update('blessings',array('status'=>2));
	}
	public function delete_blessings($id){
		return $this->db->where('id',$id)->delete('blessings');
	}
	public function update_blessings($id,$data){
		return $this->db->where('id',$id)->update('blessings',$data);
	}
	/*---------------------End Blessings--------------------------------*/
	/*---------------home_banners-----------------*/
	public function home_banners(){
	    return $this->db->from('home_banners')->get();   
	}
	public function update_homebanner($id,$data){
	    return $this->db->where('banner_id',$id)->update('home_banners',$data);
	}
	public function active_homebanner($id){
	    return $this->db->where('banner_id',$id)->update('home_banners',array('banner_status'=>1));
	}
	public function inactive_homebanner($id){
	    return $this->db->where('banner_id',$id)->update('home_banners',array('banner_status'=>2));
	}
	public function delete_homebanner($id){
	    return $this->db->where('banner_id',$id)->delete('home_banners');
	}
	public function add_homebanner($data){
	    return $this->db->insert('home_banners',$data);
	}
	/*---------------home_banners-----------------*/
	/*---------------------about------------------------------*/
	public function about(){
	    return $this->db->from('about')->get();
	}
	public function about_images($id){
	    return $this->db->from('about_images')->where('about_id',$id)->get();
	}
	public function add_aboutimage($data){
	    return $this->db->insert('about_images',$data);
	}
	public function edit_about($id){
	    return $this->db->from('about')->where('about_id',$id)->get();
	}
	public function update_about($id,$data){
	    return $this->db->where('about_id',$id)->update('about',$data);
	}
	public function active_aboutimage($id){
	    return $this->db->where('about',$id)->update('about_images',array('about_image_status'=>1));   
	}
	public function inactive_aboutimage($id){
	    return $this->db->where('about',$id)->update('about_images',array('about_image_status'=>2));   
	}
	public function delete_aboutimage($id){
	    return $this->db->where('about',$id)->delete('about_images');   
	}
	public function update_aboutimage($id,$data){
	    return $this->db->where('about',$id)->update('about_images',$data);
	}
	public function update_urlslikns(){
	    $res = $this->db->select('prod_id,prod_name')->from('products')->where('prod_urlcode','')->get()->result();
	    foreach($res as $r){
	        $prod_id = $r->prod_id;
	        $prod_name  = substr($r->prod_name,0,7);
	        $prod_cod = $prod_name.$prod_id;
	        $this->db->where('prod_id',$prod_id)->update('products',array('prod_urlcode'=>$prod_cod));
	    }
	}
	public function mission(){
		return $this->db->from('mission')->get();
	}
	public function edit_mission($id){
		return $this->db->from('mission')->where('mis_id',$id)->get();
	}
	public function  update_mission($id,$data){
		return $this->db->where('mis_id',$id)->update('mission',$data);
	}
	public function core_values(){
		return $this->db->from('corevalues')->get();
	}
	public function edit_core_values($id){
		return $this->db->from('corevalues')->where('core_id',$id)->get();
	}
	public function update_core_value($id,$data){
		return $this->db->where('core_id',$id)->update('corevalues',$data);
	}
	/*---------------------/about------------------------------*/
	/*---------------------conatct------------------------------*/
	public function conatct(){
		return $this->db->from('contact')->order_by('id','DESC')->get()->result();	
	}
	public function delete_contact($id){
		return $this->db->where('id',$id)->delete('contact');
	}
	public function edit_contact($id){
		return $this->db->from('contact_deatils')->where('id',$id)->get()->result();
	}
	public function conatct_details(){
		return $this->db->from('contact_deatils')->get()->result();	
	}
	public function update_conatct($id,$data){
		return $this->db->where('id',$id)->update('contact_deatils',$data);
	}
	/*---------------------------------------------------------*/
	/*-----------------------update_conatct_map----------------------------------*/
	public function conatct_map(){
		return $this->db->from('contact_map')->get()->result();
	}
	public function edit_conatct_map($id){
		return $this->db->from('contact_map')->where('id',$id)->get()->result();
	}
	public function update_conatct_map($id,$data){
		return $this->db->where('id',$id)->update('contact_map',$data);
	}
	/*-----------------------update_conatct_map----------------------------------*/
	/*-----------------------conatct_address----------------------------------*/
	
	public function conatct_address(){
		return $this->db->from('contacts')->get()->result();
	}
	public function edit_conatct_address($id){
		return $this->db->from('contacts')->where('id',$id)->get()->result();
	}
	public function update_conatct_address($id,$data){
		return $this->db->where('id',$id)->update('contacts',$data);
	}
	/*-----------------------End conatct_address----------------------------------*/
	/*-----------------------sthalapuranam----------------------------------*/
	public function sthalapuranam(){
		return $this->db->from('about_sthala_puranam')->get()->result();
	}
	public function edit_sthalapuranam($id){
		return $this->db->from('about_sthala_puranam')->where('id',$id)->get()->result();
	}
	public function add_sthalapuranam($data){
		return $this->db->insert('about_sthala_puranam',$data);
	}
	public function active_sthalapuranam($id){
		return $this->db->where('id',$id)->update('about_sthala_puranam',array('status'=>1));
	}
	public function inactive_sthalapuranam($id){
		return $this->db->where('id',$id)->update('about_sthala_puranam',array('status'=>2));
	}
	public function update_sthalapuranam($id,$data){
		return $this->db->where('id',$id)->update('about_sthala_puranam',$data);
	}
	public function delete_sthalapuranam($id){
		return $this->db->where('id',$id)->delete('about_sthala_puranam');
	}
	/*-----------------------End conatct_address----------------------------------*/
	/*-----------------------End concept_evolution----------------------------------*/
	public function concept_evolution(){
		return $this->db->from('about_concept_evolution')->get()->result();
	}
	public function edit_concept_evolution($id){
		return $this->db->from('about_concept_evolution')->where('id',$id)->get()->result();
	}
	public function add_concept_evolution($data){
		return $this->db->insert('about_concept_evolution',$data);
	}
	public function active_concept_evolution($id){
		return $this->db->where('id',$id)->update('about_concept_evolution',array('status'=>1));
	}
	public function inactive_concept_evolution($id){
		return $this->db->where('id',$id)->update('about_concept_evolution',array('status'=>2));
	}
	public function update_concept_evolution($id,$data){
		return $this->db->where('id',$id)->update('about_concept_evolution',$data);
	}
	public function delete_concept_evolution($id){
		return $this->db->where('id',$id)->delete('about_concept_evolution');
	}
	/*-----------------------End concept_evolution----------------------------------*/
	/*-----------------------bank_accounts----------------------------------*/
	
	public function bank_accounts(){
		return $this->db->from('bank_accounts')->get()->result();
	}
	public function edit_bank_accounts($id){
		return $this->db->from('bank_accounts')->where('id',$id)->get()->result();
	}
	public function addbank_accounts($data){
		return $this->db->insert('bank_accounts',$data);
	}
	public function active_bank_accounts($id){
		return $this->db->where('id',$id)->update('bank_accounts',array('status'=>1));
	}
	public function inactive_bank_accounts($id){
		return $this->db->where('id',$id)->update('bank_accounts',array('status'=>2));
	}
	public function update_bank_accounts($id,$data){
		return $this->db->where('id',$id)->update('bank_accounts',$data);
	}
	public function delete_bank_accounts($id){
		return $this->db->where('id',$id)->delete('bank_accounts');
	}
	/*-----------------------End bank_accounts----------------------------------*/
	/*-----------------------donations_benefits----------------------------------*/
	
	public function donations_benefits(){
		return $this->db->from('donations_benefits')->get()->result();
	}
	public function edit_donations_benefits($id){
		return $this->db->from('donations_benefits')->where('id',$id)->get()->result();
	}
	public function update_donations_benefits($id,$data){
		return $this->db->where('id',$id)->update('donations_benefits',$data);
	}
	/*-----------------------End bank_accounts----------------------------------*/
	/*-----------------------fund_raising_plan----------------------------------*/
	public function  fund_raising_plan(){
		return $this->db->from('fund_raising_plan')->get()->result();
	}
	public function  edit_fund_raising_plan($id){
		return $this->db->from('fund_raising_plan')->where('id',$id)->get()->result();
	}
	public function addfund_raising_plan($data){
		return $this->db->insert('fund_raising_plan',$data);
	}
	public function updatefund_raising_plan($id,$data){
		return $this->db->where('id',$id)->update('fund_raising_plan',$data);
	}
	public function active_fund_raising_plan($id){
		return $this->db->where('id',$id)->update('fund_raising_plan',array('status'=>1));
	}
	public function inactive_fund_raising_plan($id){
		return $this->db->where('id',$id)->update('fund_raising_plan',array('status'=>2));
	}
	public function delete_fund_raising_plan($id){
		return $this->db->where('id',$id)->delete('fund_raising_plan');
	}
	/*-----------------------End fund_raising_plan----------------------------------*/
	/*-----------------------user_details----------------------------------*/
	public function user_details(){
	    return $this->db->from('user_deatils')->order_by('user_id','DESC')->get()->result();
	}
	/*-----------------------End fund_raising_plan----------------------------------*/
	/*-----------------------donations_list----------------------------------*/
	public function donations_list(){
	    return $this->db->select('donation.fullName,donation.Surname,donation.Mobile_Number,donation.Email,donation.Address,donation.total_amount,donation.payment_id,donation.don_id,donation.payment_details,donation.payment_status,donation.add_date as date,user_deatils.*')
	                    ->from('donation')
	                    ->join('user_deatils','donation.user_id = user_deatils.user_id','left')
	                    ->order_by('don_id','DESC')->get()->result();
	}
	/*-----------------------End fund_raising_plan----------------------------------*/
	public function donation_details($id){
	    return $this->db->from('donation')->where('don_id',$id)->get()->result();
	}
	public function donation_details_list($id){
	    return $this->db->select('donation_items.*,fund_raising_plan.*')
	                    ->from('donation_items')
	                    ->join('fund_raising_plan','donation_items.item_id = fund_raising_plan.id')
	                    ->where('donation_items.donation_id',$id)->get()->result();
	}
	public function donation_details_list2($id){
	    return $this->db->from('donation')->where('don_id',$id)->get()->result();
	}
	/*-------------reports-------------*/
	public function account_statement(){
	    return $this->db->from('donation')->where('payment_status',1)->where('doner_type',1)->order_by('don_id','DESC')->get()->result();
	}
	public function donation_report($data){
	    if(!empty($data)){
	        return $this->db->query("select SUM(general_donation) general, SUM(temple_stone) stone, SUM(temple_flooor) floor, SUM(sloka) sloka from donation WHERE doner_type =1 and payment_status = 1 and add_date BETWEEN '$data[from]' AND '$data[to]'")->result();
	   } else {
	    return $this->db->select('SUM(general_donation) general, SUM(temple_stone) stone, SUM(temple_flooor) floor, SUM(sloka) sloka')->from('donation')->where('payment_status',1)->where('doner_type',1)->order_by('don_id','DESC')->get()->result();
	    }
	}
	public function firm_donation($data){
	    if(!empty($data)){
	        return $this->db->query("select SUM(general_donation) general, SUM(temple_stone) stone, SUM(temple_flooor) floor, SUM(sloka) sloka from donation WHERE doner_type =2 and payment_status = 1 and add_date BETWEEN '$data[from]' AND '$data[to]'")->result();
	   } else {
	    return $this->db->select('SUM(general_donation) general, SUM(temple_stone) stone, SUM(temple_flooor) floor, SUM(sloka) sloka')->from('donation')->where('payment_status',1)->where('doner_type',2)->get()->result();
	   }
	}
	public function amount_report($data){
	    if(!empty($data)){
	        return $this->db->query("select SUM(CASE WHEN total_amount BETWEEN 0 AND 10000 THEN total_amount END) as a, COUNT(CASE WHEN total_amount BETWEEN 0 AND 10000 THEN total_amount END) as a1, SUM(CASE WHEN total_amount BETWEEN 10001 AND 50000 THEN total_amount END) as b, COUNT(CASE WHEN total_amount BETWEEN 10001 AND 50000 THEN total_amount END) as b1, SUM(CASE WHEN total_amount BETWEEN 50000 AND 100000 THEN total_amount END) as c, COUNT(CASE WHEN total_amount BETWEEN 50000 AND 100000 THEN total_amount END) as c1, SUM(CASE WHEN total_amount > 100000 THEN total_amount END) as d, COUNT(CASE WHEN total_amount > 100000 THEN total_amount END) as d1 from donation WHERE doner_type =1 and payment_status = 1 and add_date BETWEEN '$data[from]' AND '$data[to]'")->result();
	   } else {
	    return $this->db->query('select SUM(CASE WHEN total_amount BETWEEN 0 AND 10000 THEN total_amount END) as a, COUNT(CASE WHEN total_amount BETWEEN 0 AND 10000 THEN total_amount END) as a1, SUM(CASE WHEN total_amount BETWEEN 10001 AND 50000 THEN total_amount END) as b, COUNT(CASE WHEN total_amount BETWEEN 10001 AND 50000 THEN total_amount END) as b1, SUM(CASE WHEN total_amount BETWEEN 50000 AND 100000 THEN total_amount END) as c, COUNT(CASE WHEN total_amount BETWEEN 50000 AND 100000 THEN total_amount END) as c1, SUM(CASE WHEN total_amount > 100000 THEN total_amount END) as d, COUNT(CASE WHEN total_amount > 100000 THEN total_amount END) as d1 from donation WHERE doner_type =1 and payment_status = 1')->result();
	   }
	       
	   }
	public function firm_amount_report($data){
	    if(!empty($data)){
	        return $this->db->query("select SUM(CASE WHEN total_amount BETWEEN 0 AND 10000 THEN total_amount END) as a, COUNT(CASE WHEN total_amount BETWEEN 0 AND 10000 THEN total_amount END) as a1, SUM(CASE WHEN total_amount BETWEEN 10001 AND 50000 THEN total_amount END) as b, COUNT(CASE WHEN total_amount BETWEEN 10001 AND 50000 THEN total_amount END) as b1, SUM(CASE WHEN total_amount BETWEEN 50000 AND 100000 THEN total_amount END) as c, COUNT(CASE WHEN total_amount BETWEEN 50000 AND 100000 THEN total_amount END) as c1, SUM(CASE WHEN total_amount > 100000 THEN total_amount END) as d, COUNT(CASE WHEN total_amount > 100000 THEN total_amount END) as d1 from donation WHERE doner_type =2 and payment_status = 1 and add_date BETWEEN '$data[from]' AND '$data[to]'")->result();
	   } else {
	    return $this->db->query('select SUM(CASE WHEN total_amount BETWEEN 0 AND 10000 THEN total_amount END) as a, COUNT(CASE WHEN total_amount BETWEEN 0 AND 10000 THEN total_amount END) as a1, SUM(CASE WHEN total_amount BETWEEN 10001 AND 50000 THEN total_amount END) as b, COUNT(CASE WHEN total_amount BETWEEN 10001 AND 50000 THEN total_amount END) as b1, SUM(CASE WHEN total_amount BETWEEN 50000 AND 100000 THEN total_amount END) as c, COUNT(CASE WHEN total_amount BETWEEN 50000 AND 100000 THEN total_amount END) as c1, SUM(CASE WHEN total_amount > 100000 THEN total_amount END) as d, COUNT(CASE WHEN total_amount > 100000 THEN total_amount END) as d1 from donation WHERE doner_type =2 and payment_status = 1')->result();
	}
	}
	public function source_report($data1){
	    if(!empty($data1)){
	        return $this->db->query("SELECT reference_marking,SUM(total_amount) t, count(*) c FROM `donation` WHERE doner_type = 1 and payment_status = 1 and add_date BETWEEN '$data1[from]' AND '$data1[to]' GROUP BY reference_marking")->result();
	    } else {
	    return $this->db->query('SELECT reference_marking,SUM(total_amount) t, count(*) c FROM `donation` WHERE doner_type = 1 and payment_status = 1 GROUP BY reference_marking')->result();

	    }
	}
	public function firm_source_report($data1){
	    if(!empty($data1)){
	        return $this->db->query("SELECT reference_marking,SUM(total_amount) t, count(*) c FROM `donation` WHERE doner_type = 2 and payment_status = 1 and add_date BETWEEN '$data1[from]' AND '$data1[to]' GROUP BY reference_marking")->result();
	    } else {
	    return $this->db->query('SELECT reference_marking,SUM(total_amount) t, count(*) c FROM `donation` WHERE doner_type = 2 and payment_status = 1 GROUP BY reference_marking')->result();

	    }
	}
	public function donation_for($data1){
	    if(!empty($data1)){
	        return $this->db->query("SELECT Son_Daughter,SUM(total_amount) t FROM `donation` WHERE doner_type = 1 and payment_status = 1 and add_date BETWEEN '$data1[from]' AND '$data1[to]' GROUP BY Son_Daughter")->result();
	    } else {
	    return $this->db->query('SELECT Son_Daughter ,SUM(total_amount) t FROM `donation` WHERE doner_type = 1 and payment_status = 1 GROUP BY Son_Daughter')->result();

	    }
	}
	public function purpose_report($data1){
	    if(!empty($data1)){
	        return $this->db->query("SELECT Purpose,SUM(total_amount) t FROM `donation` WHERE doner_type = 1 and payment_status = 1 and add_date BETWEEN '$data1[from]' AND '$data1[to]' GROUP BY Purpose")->result();
	    } else {
	    return $this->db->query('SELECT Purpose,SUM(total_amount) t FROM `donation` WHERE doner_type = 1 and payment_status = 1 GROUP BY Purpose')->result();

	    }
	}
	public function firm_purpose_report($data1){
	    if(!empty($data1)){
	        return $this->db->query("SELECT Purpose,SUM(total_amount) t FROM `donation` WHERE doner_type = 2 and payment_status = 1 and add_date BETWEEN '$data1[from]' AND '$data1[to]' GROUP BY Purpose")->result();
	    } else {
	    return $this->db->query('SELECT Purpose,SUM(total_amount) t FROM `donation` WHERE doner_type = 2 and payment_status = 1 GROUP BY Purpose')->result();

	    }
	}
	public function donations_week($data1){
	    if(!empty($data1)){
	        return $this->db->query("SELECT dayname(add_date) day,SUM(total_amount) t,COUNT(total_amount) c FROM `donation` WHERE doner_type = 1 and payment_status = 1 and add_date BETWEEN '$data1[from]' AND '$data1[to]' GROUP BY dayname(add_date) ORDER BY CASE WHEN Day = 'Sunday' THEN 1 WHEN Day = 'Monday' THEN 2 WHEN Day = 'Tuesday' THEN 3 WHEN Day = 'Wednesday' THEN 4 WHEN Day = 'Thursday' THEN 5 WHEN Day = 'Friday' THEN 6 WHEN Day = 'Saturday' THEN 7 END ASC")->result();
	    } else {
	    return $this->db->query("SELECT dayname(add_date) day,SUM(total_amount) t,COUNT(total_amount) c FROM `donation` WHERE doner_type = 1 and payment_status = 1 GROUP BY dayname(add_date) ORDER BY CASE WHEN Day = 'Sunday' THEN 1 WHEN Day = 'Monday' THEN 2 WHEN Day = 'Tuesday' THEN 3 WHEN Day = 'Wednesday' THEN 4 WHEN Day = 'Thursday' THEN 5 WHEN Day = 'Friday' THEN 6 WHEN Day = 'Saturday' THEN 7 END ASC")->result();

	    }
	}
	public function firm_donations_week($data1){
	    if(!empty($data1)){
	        return $this->db->query("SELECT dayname(add_date) day,SUM(total_amount) t,COUNT(total_amount) c FROM `donation` WHERE doner_type = 2 and payment_status = 1 and add_date BETWEEN '$data1[from]' AND '$data1[to]' GROUP BY dayname(add_date) ORDER BY CASE WHEN Day = 'Sunday' THEN 1 WHEN Day = 'Monday' THEN 2 WHEN Day = 'Tuesday' THEN 3 WHEN Day = 'Wednesday' THEN 4 WHEN Day = 'Thursday' THEN 5 WHEN Day = 'Friday' THEN 6 WHEN Day = 'Saturday' THEN 7 END ASC")->result();
	    } else {
	    return $this->db->query("SELECT dayname(add_date) day,SUM(total_amount) t,COUNT(total_amount) c FROM `donation` WHERE doner_type = 2 and payment_status = 1 GROUP BY dayname(add_date) ORDER BY CASE WHEN Day = 'Sunday' THEN 1 WHEN Day = 'Monday' THEN 2 WHEN Day = 'Tuesday' THEN 3 WHEN Day = 'Wednesday' THEN 4 WHEN Day = 'Thursday' THEN 5 WHEN Day = 'Friday' THEN 6 WHEN Day = 'Saturday' THEN 7 END ASC")->result();

	    }
	}
	public function fest_donations($data1){
	    if(!empty($data1)){
	        return $this->db->query("SELECT SUM(total_amount) t,date(d.add_date) d1,f.fest_date ,f.fest_name fest,count(*) c FROM donation d INNER join fest f ON date(d.add_date) = f.fest_date WHERE doner_type = 1 and payment_status = 1 and d.add_date BETWEEN '$data1[from]' AND '$data1[to]' GROUP by f.fest_date")->result();
	    } else {
	    return $this->db->query("SELECT SUM(total_amount) t,date(d.add_date) d1,f.fest_date ,f.fest_name fest,count(*) c FROM donation d INNER join fest f ON date(d.add_date) = f.fest_date WHERE doner_type = 1 and payment_status = 1 GROUP by f.fest_date")->result();

	    }
	}
	public function firm_fest_donations($data1){
	    if(!empty($data1)){
	        return $this->db->query("SELECT SUM(total_amount) t,date(d.add_date) d1,f.fest_date ,f.fest_name fest,count(*) c FROM donation d INNER join fest f ON date(d.add_date) = f.fest_date WHERE doner_type = 2 and payment_status = 1 and d.add_date BETWEEN '$data1[from]' AND '$data1[to]' GROUP by f.fest_date")->result();
	    } else {
	    return $this->db->query("SELECT SUM(total_amount) t,date(d.add_date) d1,f.fest_date ,f.fest_name fest,count(*) c FROM donation d INNER join fest f ON date(d.add_date) = f.fest_date WHERE doner_type = 2 and payment_status = 1 GROUP by f.fest_date")->result();

	    }
	}
	public function organiasations($data1){
	    if(!empty($data1)){
	        return $this->db->query("SELECT * FROM donation WHERE doner_type = 2 and payment_status = 1 and add_date BETWEEN '$data1[from]' AND '$data1[to]'")->result();
	    } else {
	    return $this->db->query("SELECT * FROM donation WHERE doner_type = 2 and payment_status = 1")->result();

	    }
	}
	public function location_report($data1){
	    if(!empty($data1)){
	        return $this->db->query("SELECT city,state,SUM(total_amount) t FROM `donation` WHERE doner_type = 1 and payment_status = 1 and add_date BETWEEN '$data1[from]' AND '$data1[to]'  GROUP by city")->result();
	    } else {
	    return $this->db->query("SELECT city,state,SUM(total_amount) t FROM `donation` WHERE doner_type = 1 and payment_status = 1 GROUP by city")->result();

	    }
	}
	public function firm_location_report($data1){
	    if(!empty($data1)){
	        return $this->db->query("SELECT city,state,SUM(total_amount) t FROM `donation` WHERE doner_type = 2 and payment_status = 1 and add_date BETWEEN '$data1[from]' AND '$data1[to]'  GROUP by city")->result();
	    } else {
	    return $this->db->query("SELECT city,state,SUM(total_amount) t FROM `donation` WHERE doner_type = 2 and payment_status = 1 GROUP by city")->result();
	    }
	}
	public function age_report($data1){
	    if(!empty($data1)){
	        return $this->db->query("SELECT SUM(CASE WHEN FLOOR(DATEDIFF('2020-10-1',Date_of_Birth)/365) < 20 THEN total_amount END) as u20, SUM(CASE WHEN FLOOR(DATEDIFF('2020-10-1',Date_of_Birth)/365) BETWEEN 20 AND 35 THEN total_amount END) as a2035, SUM(CASE WHEN FLOOR(DATEDIFF('2020-10-1',Date_of_Birth)/365) BETWEEN 36 AND 45 THEN total_amount END) as a3545, SUM(CASE WHEN FLOOR(DATEDIFF('2020-10-1',Date_of_Birth)/365) BETWEEN 46 AND 55 THEN total_amount END) as a4555, SUM(CASE WHEN FLOOR(DATEDIFF('2020-10-1',Date_of_Birth)/365) > 55 THEN total_amount END) as a55 FROM `donation` WHERE doner_type = 1 and payment_status = 1 and add_date BETWEEN '$data1[from]' AND '$data1[to]'")->result();
	    } else {
	    return $this->db->query("SELECT SUM(CASE WHEN FLOOR(DATEDIFF('2020-10-1',Date_of_Birth)/365) < 20 THEN total_amount END) as u20, SUM(CASE WHEN FLOOR(DATEDIFF('2020-10-1',Date_of_Birth)/365) BETWEEN 20 AND 35 THEN total_amount END) as a2035, SUM(CASE WHEN FLOOR(DATEDIFF('2020-10-1',Date_of_Birth)/365) BETWEEN 36 AND 45 THEN total_amount END) as a3545, SUM(CASE WHEN FLOOR(DATEDIFF('2020-10-1',Date_of_Birth)/365) BETWEEN 46 AND 55 THEN total_amount END) as a4555, SUM(CASE WHEN FLOOR(DATEDIFF('2020-10-1',Date_of_Birth)/365) > 55 THEN total_amount END) as a55 FROM `donation` WHERE doner_type = 1 and payment_status = 1")->result();
	    }
	}
	public function sloka_report(){
	    return $this->db->from('donation')->where('payment_status',1)->where('doner_type',1)->get()->result();
	}
	public function  firm_sloka_report(){
	    return $this->db->from('donation')->where('payment_status',1)->where('doner_type',2)->get()->result();
	}
	/*---------------reports--------------*/
	public function addfest($data){
	    return $this->db->insert('fest',$data);
	}
	public function fest(){
	    return $this->db->from('fest')->get()->result();
	}
	public function delete_fest($id){
	    return $this->db->where('fest_id',$id)->delete('fest');
	}
}?>