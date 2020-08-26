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
	

	/*portfolio */
	public function get_portfolio(){
		return $this->db->from('portfolio')->where('portfolio_status',1)->get()->result();
	}
	public function get_portfolio_videos(){
		return $this->db->from('portfolio_videos')->where('por_v_status',1)->get()->result();
	}
	/*End portfolio */
	/*Blog */
	public function get_blog($perpage,$page){
		return $this->db->from('blog')->where('blog_status',1)->limit($perpage,$page)->order_by('blog_id','DESC')->get()->result();
	}
	
	public function blog_details($id){
		return $this->db->query("select * from blog where blog_id= $id")->result();
	}
	public function blog_list($id){
		return $this->db->query("select * from blog where blog_id != $id  order by 'DESC' limit 8")->result();
	}
	public function add_comment($data){
		return $this->db->insert('blog_comments',$data);
	}
	public function blog_comment($blogid){
		return $this->db->from('blog_comments')->where('blog_id',$blogid)->where('blog_status',0)->get()->result();
	}

	/*End Blog */
	
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
}