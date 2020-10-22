<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	//require_once APPPATH.'library/Fpdf_master.php';
class Admin extends CI_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model('admin_model');
		$this->load->library('upload');
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->library('Fpdf_master');
    }

	/*-----------admin--------*/
	public function admin(){
		if(isset($this->session->userdata['Admin_loggin']['admin_id']) && !empty($this->session->userdata['Admin_loggin']['admin_id'])){
		    $dta['Total_Doneros'] = $this->admin_model->Total_Doneros();
		    $dta['Donation_amount'] = $this->admin_model->Donation_amount();
		    $dta['Today_Donation_Amount'] = $this->admin_model->Today_Donation_Amount();
		    //print_r($dta['Today_Donation_Amount']);exit;
		    $dta['Today_Transactions'] = $this->admin_model->Today_Transactions();
			$this->load->view('admin/index',$dta);
		}else{
			redirect(base_url().'admin/login');
		}
	}
	public function login(){
	    date_default_timezone_set('Asia/Kolkata');
		$date =  date("Y-m-d h:i:s");
		if(isset($this->session->userdata['Admin_loggin']['admin_id']) && !empty($this->session->userdata['Admin_loggin']['admin_id'])){
			redirect(base_url().'admin');
		}else{
		    $post = $this->input->post();
			if(!empty($post)){
				$login_deta = array('username'=> $post['username'],'password'=> md5($post['password']));			
				$check_login = $this->admin_model->login_details($login_deta);
				if(($check_login) > 0 ){
				    if($check_login['admin_status'] ==1){
    					$this->load->helper('cookie');
    					if(isset($post['remember_me']) && $post['remember_me']==1){
    						$usernamecookie = array('name' => 'username', 'value' => $post["username"],'expire' => time()+86500 ,'path'   => '/');
    						$passwordcookie = array('name' => 'password', 'value' => $post["password"],'expire' => time()+86500,'path'   => '/');
    						$remembercookie = array('name' => 'remember', 'value' => $post["remember_me"],'expire' => time()+86500,'path'   => '/');
    						$this->input->set_cookie($usernamecookie);
    						$this->input->set_cookie($passwordcookie);
    						$this->input->set_cookie($remembercookie);
    						$this->load->helper('cookie');
    						$this->input->cookie('username', TRUE);
    					}else{
    						delete_cookie('username');
    						delete_cookie('password');
    						delete_cookie('remember');
    					}
    					$login_details = $this->admin_model->get_admin_details($check_login['admin_id']);
    					$this->session->set_userdata('Admin_loggin',$login_details);
    					redirect(base_url().'admin');
				    }else{
				        redirect(base_url().'admin/change_password/'.base64_encode($check_login['admin_id']));
				    }
				}else{
					$this->session->set_flashdata('loginerror',"Invalid Email Address or Password!");
					$this->load->view('admin/login');
				}
			}else{
				$this->load->view('admin/login');
			}
		}
	}
	public function logout(){
		$admindetails=$this->session->userdata('userdetails');
		$userinfo = $this->session->userdata('userdetails');
        $this->session->unset_userdata($userinfo);
		$this->session->sess_destroy('userdetails');
		$this->session->unset_userdata('userdetails');
        redirect(base_url().'admin/login');
	}
	public function security_loggin(){
	    //$array_val = $this->session->userdata['security_loggin']['admin_id'];
	    //print_r($array_val);exit();
	    $r = $this->session->unset_userdata('security_loggin');
	    redirect('admin');
	}
	public function change_password($id){
	    $data['id'] = $id;
	    $this->load->view('admin/change_password',$data);
	}
	public function changepassword($id){
	    $ids = base64_decode($id);
	    $check = $this->admin_model->check_oldpwd($ids,$_POST['oldpassword']);
	    if(count($check) >0){
	        $data = array(
	            'password'=>md5($_POST['password']),
	            'admin_status'=>1,
	            'updated_at'=>date('Y-m-d h-i-s')
	        );
	        $update = $this->admin_model->update_admin($ids,$data);
	        if($update >0){
	            $this->session->set_flashdata('changepassword','<div class="alert">Password changed successfully.</div>');
		        redirect(base_url().'admin/login');
	        }else{
	            $this->session->set_flashdata('changepassword','<div class="alert">!OPPS ,old password wrong...</div>');
		        redirect($_SERVER['HTTP_REFERER']);
	        }
	    }else{
	        $this->session->set_flashdata('changepassword','<div class="alert">!OPPS ,old password wrong...</div>');
		    redirect($_SERVER['HTTP_REFERER']);
	    }
	}
	/*-----------/admin--------*/
	
	
	/*---------------home_about-----------------*/
	public function home_about(){
		if(isset($this->session->userdata['Admin_loggin']['admin_id']) && !empty($this->session->userdata['Admin_loggin']['admin_id'])){
			$data['home_about'] =  $this->admin_model->home_about();
			$this->load->view('admin/home_about',$data);
		}else{
		    redirect(base_url().'admin/login');
		}
	}
	public function edit_habout($id){
		if(isset($this->session->userdata['Admin_loggin']['admin_id']) && !empty($this->session->userdata['Admin_loggin']['admin_id'])){
			$data['edit_habout'] =  $this->admin_model->edit_habout($id);
			$this->load->view('admin/edit_habout',$data);
		}else{
			redirect(base_url().'admin/login');
		}	
	}
	public function update_habout($id){
		$data = array(
		    'about'=>$this->input->post('about')
		);
		$res = $this->admin_model->update_habout($id,$data);
		if($res > 0){
		    $this->session->set_flashdata('update_habout','<div class="alert">Update successfully Home about.</div>');
		     redirect(base_url().'admin/home_about');
		}else{
		    $this->session->set_flashdata('update_habout','<div class="alert">Update failed home about charges.</div>');
		    redirect(base_url().'admin/home_about');
		}
	}
	/*---------------home_about-----------------*/
	/*---------------Sthala Puranam-----------------*/
	public function Sthala_Puranam(){
		if(isset($this->session->userdata['Admin_loggin']['admin_id']) && !empty($this->session->userdata['Admin_loggin']['admin_id'])){
			$data['home_Sthala_Puranam'] =  $this->admin_model->home_Sthala_Puranam();
			$this->load->view('admin/Sthala_Puranam',$data);
		}else{
			redirect(base_url().'admin/login');
		}
	}
	public function edit_Sthala_Puranam($id){
		if(isset($this->session->userdata['Admin_loggin']['admin_id']) && !empty($this->session->userdata['Admin_loggin']['admin_id'])){
			$data['edit_habout'] =  $this->admin_model->edit_home_Sthala_Puranam($id);
			$this->load->view('admin/edit_Sthala_Puranam',$data);
		}else{
			redirect(base_url().'admin/login');
		}	
	}
	public function update_Sthala_Puranam($id){
		$picture1 =''; 
	    if(!empty($_FILES['image']['name'])){
		    $config['upload_path'] = 'assets/images/';
		    $config['allowed_types'] = 'jpg|jpeg|png|gif';
		    $config['file_name'] = $_FILES['image']['name']; 
		    $config['encrypt_name'] = TRUE;
		    $this->load->library('upload',$config);
		    $this->upload->initialize($config);   
		    if($this->upload->do_upload('image')){
		     $uploadData = $this->upload->data();
		     $picture1 = $uploadData['file_name'];
		    }
		}
		if($picture1){
		    $data['image'] = $picture1;
		}
		$data = array(
		    'desc'=>$this->input->post('desc')
		);
		$res = $this->admin_model->update_Sthala_Puranam($id,$data);
		if($res > 0){
		    $this->session->set_flashdata('update_habout','<div class="alert">Update successfully .</div>');
		     redirect(base_url().'admin/Sthala_Puranam');
		}else{
		    $this->session->set_flashdata('update_habout','<div class="alert">Update failed..</div>');
		    redirect(base_url().'admin/Sthala_Puranam');
		}
	}
	/*---------------home_about-----------------*/
	/*---------------home_services-----------------*/
	public function home_services(){
		if(isset($this->session->userdata['Admin_loggin']['admin_id']) && !empty($this->session->userdata['Admin_loggin']['admin_id'])){
			$data['home_services'] =  $this->admin_model->get_home_services();
			$this->load->view('admin/home_services',$data);
		}else{
			redirect(base_url().'admin/login');
		}
	}
	public function edit_hserives($id){
		if(isset($this->session->userdata['Admin_loggin']['admin_id']) && !empty($this->session->userdata['Admin_loggin']['admin_id'])){
			$data['edit_hserives'] =  $this->admin_model->edit_hserives($id);
			$this->load->view('admin/edit_hserives',$data);
		}else{
			redirect(base_url().'admin/login');
		}
	}
	public function update_hservices($id){
		$data = array(
		    'services_name'=>$this->input->post('services_name'),
		    'services_desc'=>$this->input->post('services_desc'),
		);
		$res = $this->admin_model->update_hservices($id,$data);
		if($res > 0){
		    $this->session->set_flashdata('update_hservices','<div class="alert">Update successfully </div>');
		    redirect(base_url().'admin/home_services');
		}else{
		    $this->session->set_flashdata('update_hservices','<div class="alert">Update failed...</div>');
		    redirect(base_url().'admin/home_services');
		}
	}
	/*---------------home_services-----------------*/
	/*---------------home Quality Policy-----------------*/
	
	public function home_quality(){
	    if(isset($this->session->userdata['Admin_loggin']['admin_id']) && !empty($this->session->userdata['Admin_loggin']['admin_id'])){
			$data['home_quality'] =  $this->admin_model->home_quality();
			$this->load->view('admin/home_quality',$data);
		}else{
			redirect(base_url().'admin/login');
		}
	}
	public function edit_home_quality($id){
	    if(isset($this->session->userdata['Admin_loggin']['admin_id']) && !empty($this->session->userdata['Admin_loggin']['admin_id'])){
			$data['edit_home_quality'] =  $this->admin_model->edit_home_quality($id);
			$this->load->view('admin/edit_home_quality',$data);
		}else{
			redirect(base_url().'admin/login');
		}
	}
	
	public function update_home_quality($id){
		$data = array(
		    'descc'=>$this->input->post('descc'),
		);
		$res = $this->admin_model->update_home_quality($id,$data);
		if($res > 0){
		    $this->session->set_flashdata('update_home_quality','<div class="alert">Update successfully </div>');
		    redirect(base_url().'admin/home_quality');
		}else{
		    $this->session->set_flashdata('update_home_quality','<div class="alert">Update failed...</div>');
		    redirect(base_url().'admin/home_quality');
		}
	}
	/*---------------home Quality Policy-----------------*/
	/*---------------Home Banners-----------------*/
	public function home_banners(){
	    if(isset($this->session->userdata['Admin_loggin']['admin_id']) && !empty($this->session->userdata['Admin_loggin']['admin_id'])){
			$data['home_banners'] =  $this->admin_model->home_banners();
			$this->load->view('admin/home_banners',$data);
		}else{
		    redirect(base_url().'admin/login');
		}
	}
	public function active_homebanner(){
	    $result = $this->admin_model->active_homebanner($_POST['id']);
	    if($result == 1){							
			$output['status']=1;
			$output['data']="Mark All Read";
		}else{ }
		echo json_encode($output,JSON_PRETTY_PRINT);
	}
	public function inactive_homebanner(){
	    $result = $this->admin_model->inactive_homebanner($_POST['id']);
	    if($result == 1){							
			$output['status']=1;
			$output['data']="Mark All Read";
		}else{ }
		echo json_encode($output,JSON_PRETTY_PRINT);
	}
	public function delete_homebanner(){
	    $result = $this->admin_model->delete_homebanner($_POST['id']);
	    if($result == 1){							
			$output['status']=1;
			$output['data']="Mark All Read";
		}else{ }
		echo json_encode($output,JSON_PRETTY_PRINT);
	}
	public function update_homebanner($id){
	    $picture1 =''; 
	    if(!empty($_FILES['image']['name'])){
		    $config['upload_path'] = 'assets/images/banner/';
		    $config['allowed_types'] = 'jpg|jpeg|png|gif';
		    $config['file_name'] = $_FILES['image']['name']; 
		    $config['encrypt_name'] = TRUE;
		    $this->load->library('upload',$config);
		    $this->upload->initialize($config);   
		    if($this->upload->do_upload('image')){
		     $uploadData = $this->upload->data();
		     $picture1 = $uploadData['file_name'];
		    }
		}
		if($picture1){
		    $data['image'] = $picture1;
		}
		$res = $this->admin_model->update_homebanner($id,$data);
		if($res > 0){
		    $this->session->set_flashdata('update_delivery','<div class="alert">Update successfully delivery charges</div>');
		    redirect($_SERVER['HTTP_REFERER']);
		}else{
		    $this->session->set_flashdata('update_delivery','<div class="alert">Update failed delivery charges.</div>');
		    redirect($_SERVER['HTTP_REFERER']);
		}
	}
	public function add_homebanner(){
	    $picture1 =''; 
	    if(!empty($_FILES['image']['name'])){
		    $config['upload_path'] = 'assets/images/banner/';
		    $config['allowed_types'] = 'jpg|jpeg|png|gif';
		    $config['file_name'] = $_FILES['image']['name']; 
		    $config['encrypt_name'] = TRUE;
		    $this->load->library('upload',$config);
		    $this->upload->initialize($config);   
		    if($this->upload->do_upload('image')){
		     $uploadData = $this->upload->data();
		     $picture1 = $uploadData['file_name'];
		    }
		}
		if($picture1){
		    $data['image'] = $picture1;
		}
		$res = $this->admin_model->add_homebanner($data);
		if($res > 0){
		    $this->session->set_flashdata('update_delivery','<div class="alert">add banner successfully</div>');
		    redirect($_SERVER['HTTP_REFERER']);
		}else{
		    $this->session->set_flashdata('update_delivery','<div class="alert">add banner failed pls try again</div>');
		    redirect($_SERVER['HTTP_REFERER']);
		}
	}
	/*---------------Home Banners-----------------*/
	
    /*====================blog ========================*/
	public function blog(){
		if(isset($this->session->userdata['Admin_loggin']['admin_id']) && !empty($this->session->userdata['Admin_loggin']['admin_id'])){
			$data['blog'] =  $this->admin_model->blog();
			$this->load->view('admin/blog',$data);
		}else{
			redirect(base_url().'admin/login');
		}
	}
    public function add_blog(){
	    if(isset($this->session->userdata['Admin_loggin']['admin_id']) && !empty($this->session->userdata['Admin_loggin']['admin_id'])){
			$this->load->view('admin/add_blog');
		}else{
			redirect(base_url().'admin/login');
		}
	}
	public function added_blog(){
	    $picture1 =''; 
	    if(!empty($_FILES['image']['name'])){
		    $config['upload_path'] = 'assets/img/';
		    $config['allowed_types'] = 'jpg|jpeg|png|gif';
		    $config['file_name'] = $_FILES['image']['name']; 
		    $config['encrypt_name'] = TRUE;
		    $this->load->library('upload',$config);
		    $this->upload->initialize($config);   
		    if($this->upload->do_upload('image')){
		     $uploadData = $this->upload->data();
		     $picture1 = $uploadData['file_name'];
		    }
		}
		$data = array(
		    'blog_image'=>$picture1,
		    'blog_title'=>$this->input->post('blog_title'),
		    'blog_desc'=>$this->input->post('blog_desc'),
		    'blog_datetime'=>$this->input->post('blog_datetime'),
		);
		$res = $this->admin_model->added_blog($data);
        if($res > 0){
            $this->session->set_flashdata('added_blog','<div class="alert">Adding Blog Successfully...</div>');
            redirect('admin/add_blog');
        }else{
            $this->session->set_flashdata('added_blog','<div class="alert">Adding Blog Failed...</div>');
            redirect('admin/add_blog');
        }
	}
	public function active_blog(){
	    $result = $this->admin_model->active_blog($_POST['id']);
	    if($result == 1){
			$output['status']=1;
		}else{ 
		    $output['status']=0;
		}
		echo json_encode($output,JSON_PRETTY_PRINT);
	}
	public function inactive_blog(){
	    $result = $this->admin_model->inactive_blog($_POST['id']);
	    if($result == 1){
			$output['status']=1;
		}else{ 
		    $output['status']=0;
		}
		echo json_encode($output,JSON_PRETTY_PRINT);
	}
	public function delete_blog(){
	    $result = $this->admin_model->delete_blog($_POST['id']);
	    if($result == 1){
			$output['status']=1;
		}else{ 
		    $output['status']=0;
		}
		echo json_encode($output,JSON_PRETTY_PRINT);
	}
	public function delete_user(){
	    $result = $this->admin_model->delete_user($_POST['id']);
	    if($result == 1){
			$output['status']=1;
		}else{ 
		    $output['status']=0;
		}
		echo json_encode($output,JSON_PRETTY_PRINT);
	}
	public function edit_blog($id){
        if(isset($this->session->userdata['Admin_loggin']['admin_id']) && !empty($this->session->userdata['Admin_loggin']['admin_id'])){
			$data['edit_blog'] = $this->admin_model->edit_blog($id);
			$this->load->view('admin/edit_blog',$data);
		}else{
			redirect(base_url().'admin/login');
		}	    
	}
	public function update_blog($id){
	    $picture1 =''; 
	    if(!empty($_FILES['image']['name'])){
		    $config['upload_path'] = 'assets/img/';
		    $config['allowed_types'] = 'jpg|jpeg|png|gif';
		    $config['file_name'] = $_FILES['image']['name']; 
		    $config['encrypt_name'] = TRUE;
		    $this->load->library('upload',$config);
		    $this->upload->initialize($config);   
		    if($this->upload->do_upload('image')){
		     $uploadData = $this->upload->data();
		     $picture1 = $uploadData['file_name'];
		    }
		}
		$data = array(
		    'blog_title'=>$this->input->post('blog_title'),
		    'blog_desc'=>$this->input->post('blog_desc'),
		);
		if($picture1){
		    $data['blog_image'] = $picture1;
		}
		$res = $this->admin_model->update_blog($id,$data);
        if($res > 0){
            $this->session->set_flashdata('update_blog','<div class="alert">Update Blog Successfully...</div>');
            redirect('admin/blog');
        }else{
            $this->session->set_flashdata('update_blog','<div class="alert">Udpate Blog Failed...</div>');
            redirect('admin/blog');
        }
	}
    /*====================/blog ========================*/
    /*====================about========================*/
    public function about(){
        if(isset($this->session->userdata['Admin_loggin']['admin_id']) && !empty($this->session->userdata['Admin_loggin']['admin_id'])){
            $data['about'] =$this->admin_model->about();
			$this->load->view('admin/about',$data);
		}else{
			redirect(base_url().'admin/login');
		}        
    }
    public function about_images($id){
        if(isset($this->session->userdata['Admin_loggin']['admin_id']) && !empty($this->session->userdata['Admin_loggin']['admin_id'])){
            $data['about_images'] =$this->admin_model->about_images($id);
			$this->load->view('admin/about_images',$data);
		}else{
			redirect(base_url().'admin/login');
		}        
    }
    public function add_aboutimage(){
        $picture1 =''; 
	    if(!empty($_FILES['image']['name'])){
		    $config['upload_path'] = 'assets/about';
		    $config['allowed_types'] = 'jpg|jpeg|png|gif';
		    $config['file_name'] = $_FILES['image']['name']; 
		    $config['encrypt_name'] = TRUE;
		    $this->load->library('upload',$config);
		    $this->upload->initialize($config);   
		    if($this->upload->do_upload('image')){
		        $uploadData = $this->upload->data();
		        $picture1 = $uploadData['file_name'];
		    }
		}
		$data = array(
		    'about_images'=>$picture1,
		    'about_id'=>1,
		);
		$res = $this->admin_model->add_aboutimage($data);
        if($res > 0){
            $this->session->set_flashdata('add_aboutimage','<div class="alert">Add About Image Successfully...</div>');
            redirect($_SERVER['HTTP_REFERER']);
        }else{
            $this->session->set_flashdata('add_aboutimage','<div class="alert">Add About image Failed...</div>');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
    public function update_aboutimage($id){
        $picture1 =''; 
	    if(!empty($_FILES['image']['name'])){
		    $config['upload_path'] = 'assets/img/';
		    $config['allowed_types'] = 'jpg|jpeg|png|gif';
		    $config['file_name'] = $_FILES['image']['name']; 
		    $config['encrypt_name'] = TRUE;
		    $this->load->library('upload',$config);
		    $this->upload->initialize($config);   
		    if($this->upload->do_upload('image')){
		        $uploadData = $this->upload->data();
		        $picture1 = $uploadData['file_name'];
		    }
		}
		$data = array(
		    'about_img'=>$picture1,
		);
		$res = $this->admin_model->update_aboutimage($id,$data);
        if($res > 0){
            $this->session->set_flashdata('update_aboutimage','<div class="alert">Add About Image Successfully...</div>');
            redirect($_SERVER['HTTP_REFERER']);
        }else{
            $this->session->set_flashdata('update_aboutimage','<div class="alert">Add About image Failed...</div>');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
    public function edit_about($id){
        if(isset($this->session->userdata['Admin_loggin']['admin_id']) && !empty($this->session->userdata['Admin_loggin']['admin_id'])){
            $data['edit_about'] =$this->admin_model->edit_about($id);
			$this->load->view('admin/edit_about',$data);
		}else{
			redirect(base_url().'admin/login');
		}        
    }
    public function update_about($id){
        $picture1 =''; 
	    if(!empty($_FILES['image']['name'])){
		    $config['upload_path'] = 'assets/img/';
		    $config['allowed_types'] = 'jpg|jpeg|png|gif';
		    $config['file_name'] = $_FILES['image']['name']; 
		    $config['encrypt_name'] = TRUE;
		    $this->load->library('upload',$config);
		    $this->upload->initialize($config);   
		    if($this->upload->do_upload('image')){
		        $uploadData = $this->upload->data();
		        $picture1 = $uploadData['file_name'];
		    }
		}
		$data = array(
		    'about_title'=>$this->input->post('about_title'),
		    'about_desc'=>$this->input->post('about'),
		);
		if(!empty($_FILES['image']['name'])){
		    $data['about_img'] = $picture1;
		}
		$res = $this->admin_model->update_about($id,$data);
        if($res > 0){
            $this->session->set_flashdata('update_about','<div class="alert">Update Blog Successfully...</div>');
            redirect(base_url().'admin/about');
        }else{
            $this->session->set_flashdata('update_about','<div class="alert">Udpate Blog Failed...</div>');
            redirect(base_url().'admin/about');
        }
    }
    public function inactive_aboutimage(){
	    $result = $this->admin_model->inactive_aboutimage($_POST['id']);
	    if($result == 1){
			$output['status']=1;
		}else{ 
		    $output['status']=0;
		}
		echo json_encode($output,JSON_PRETTY_PRINT);
	}
	public function active_aboutimage(){
	    $result = $this->admin_model->active_aboutimage($_POST['id']);
	    if($result == 1){
			$output['status']=1;
		}else{ 
		    $output['status']=0;
		}
		echo json_encode($output,JSON_PRETTY_PRINT);
	}
	public function delete_aboutimage(){
	    $result = $this->admin_model->delete_aboutimage($_POST['id']);
	    if($result == 1){
			$output['status']=1;
		}else{ 
		    $output['status']=0;
		}
		echo json_encode($output,JSON_PRETTY_PRINT);
	}
	public function mission(){
		if(isset($this->session->userdata['Admin_loggin']['admin_id']) && !empty($this->session->userdata['Admin_loggin']['admin_id'])){
            $data['mission'] =$this->admin_model->mission();
			$this->load->view('admin/mission',$data);
		}else{
			redirect(base_url().'admin/login');
		} 
	}
	public function edit_mission($id){
		if(isset($this->session->userdata['Admin_loggin']['admin_id']) && !empty($this->session->userdata['Admin_loggin']['admin_id'])){
            $data['edit_mission'] =$this->admin_model->edit_mission($id);
			$this->load->view('admin/edit_mission',$data);
		}else{
			redirect(base_url().'admin/login');
		} 
	}
	public function update_mission($id){
		if(!empty($_POST)){
			$data = array(
				'mission'=>isset($_POST['mission'])?$_POST['mission']:'',
				'mission_descc'=>isset($_POST['mission_descc'])?$_POST['mission_descc']:'',
			);
			$res = $this->admin_model->update_mission($id,$data);
			if($res > 0){
				$this->session->set_flashdata('update_mission','<div class="alert">Update Mission Successfully...</div>');
				redirect(base_url().'admin/mission');
			}else{
				$this->session->set_flashdata('update_mission','<div class="alert">Udpate Mission Failed...</div>');
				redirect(base_url().'admin/mission');
			}
		}else{
			redirect($_SERVER['HTTP_REFERER']);
		}
	}
	
	public function core_values(){
		if(isset($this->session->userdata['Admin_loggin']['admin_id']) && !empty($this->session->userdata['Admin_loggin']['admin_id'])){
            $data['core_values'] =$this->admin_model->core_values();
			$this->load->view('admin/core_values',$data);
		}else{
			redirect(base_url().'admin/login');
		} 
	}
	public function edit_core_values($id){
		if(isset($this->session->userdata['Admin_loggin']['admin_id']) && !empty($this->session->userdata['Admin_loggin']['admin_id'])){
            $data['edit_core_values'] =$this->admin_model->edit_core_values($id);
			$this->load->view('admin/edit_core_values',$data);
		}else{
			redirect(base_url().'admin/login');
		} 
	}
	public function update_core_value($id){
		if(!empty($_POST)){
			$data = array(
				'Corevalues_name'=>isset($_POST['Corevalues_name'])?$_POST['Corevalues_name']:'',
				'desc'=>isset($_POST['desc'])?$_POST['desc']:'',
			);
			$res = $this->admin_model->update_core_value($id,$data);
			if($res > 0){
				$this->session->set_flashdata('core_values','<div class="alert">Update our core values Successfully...</div>');
				redirect(base_url().'admin/core_values');
			}else{
				$this->session->set_flashdata('core_values','<div class="alert">Udpate our core values Failed...</div>');
				redirect(base_url().'admin/core_values');
			}
		}else{
			redirect($_SERVER['HTTP_REFERER']);
		}
	}
	
    /*====================/about========================*/
	
    /*====================service========================*/
	public function service(){
		if(isset($this->session->userdata['Admin_loggin']['admin_id']) && !empty($this->session->userdata['Admin_loggin']['admin_id'])){
            $data['service'] =$this->admin_model->service();
			$this->load->view('admin/service',$data);
		}else{
			redirect(base_url().'admin/login');
		} 
	}
	public function add_services(){
		if(isset($this->session->userdata['Admin_loggin']['admin_id']) && !empty($this->session->userdata['Admin_loggin']['admin_id'])){
            $this->load->view('admin/add_services');
		}else{
			redirect(base_url().'admin/login');
		}
	}
	public function edit_services($id){
		if(isset($this->session->userdata['Admin_loggin']['admin_id']) && !empty($this->session->userdata['Admin_loggin']['admin_id'])){
            $data['edit_services'] = $this->admin_model->edit_services($id);
			$this->load->view('admin/edit_services',$data);
		}else{
			redirect(base_url().'admin/login');
		}
	}
	public function inactive_servics(){
	    $result = $this->admin_model->inactive_servics($_POST['id']);
	    if($result == 1){
			$output['status']=1;
		}else{ 
		    $output['status']=0;
		}
		echo json_encode($output,JSON_PRETTY_PRINT);
	}
	public function active_servics(){
	    $result = $this->admin_model->active_servics($_POST['id']);
	    if($result == 1){
			$output['status']=1;
		}else{ 
		    $output['status']=0;
		}
		echo json_encode($output,JSON_PRETTY_PRINT);
	}
	public function delete_servics(){
	    $result = $this->admin_model->delete_servics($_POST['id']);
	    if($result == 1){
			$output['status']=1;
		}else{ 
		    $output['status']=0;
		}
		echo json_encode($output,JSON_PRETTY_PRINT);
	}
	public function addservices(){
		$picture1 =''; 
	    if(!empty($_FILES['image']['name'])){
		    $config['upload_path'] = 'assets/img/';
		    $config['allowed_types'] = 'jpg|jpeg|png|gif';
		    $config['file_name'] = $_FILES['image']['name']; 
		    $config['encrypt_name'] = TRUE;
		    $this->load->library('upload',$config);
		    $this->upload->initialize($config);   
		    if($this->upload->do_upload('image')){
		        $uploadData = $this->upload->data();
		        $picture1 = $uploadData['file_name'];
		    }
		}
		$data = array(
		    'ser_title'=>$this->input->post('ser_title'),
		    'ser_desc'=>$this->input->post('ser_desc'),
		);
		if(!empty($_FILES['image']['name'])){
		    $data['ser_img'] = $picture1;
		}
		//print_r($data);exit;
		$res = $this->admin_model->add_services($data);
        if($res > 0){
            $this->session->set_flashdata('add_services','<div class="alert">Adding serices Successfully...</div>');
            redirect(base_url().'admin/add_services');
        }else{
            $this->session->set_flashdata('add_services','<div class="alert">oops!,Adding serices Failed...</div>');
            redirect(base_url().'admin/add_services');
        }
	}
	public function updateservices($id){
		$picture1 =''; 
	    if(!empty($_FILES['image']['name'])){
		    $config['upload_path'] = 'assets/img/';
		    $config['allowed_types'] = 'jpg|jpeg|png|gif';
		    $config['file_name'] = $_FILES['image']['name']; 
		    $config['encrypt_name'] = TRUE;
		    $this->load->library('upload',$config);
		    $this->upload->initialize($config);   
		    if($this->upload->do_upload('image')){
		        $uploadData = $this->upload->data();
		        $picture1 = $uploadData['file_name'];
		    }
		}
		$data = array(
		    'ser_title'=>$this->input->post('ser_title'),
		    'ser_desc'=>$this->input->post('ser_desc'),
		);
		if(!empty($_FILES['image']['name'])){
		    $data['ser_img'] = $picture1;
		}
		//print_r($data);exit;
		$res = $this->admin_model->updateservices($id,$data);
        if($res > 0){
            $this->session->set_flashdata('updateservices','<div class="alert">Adding serices Successfully...</div>');
            redirect(base_url().'admin/service');
        }else{
            $this->session->set_flashdata('updateservices','<div class="alert">oops!,Adding serices Failed...</div>');
            redirect(base_url().'admin/service');
        }
	}
    /*====================/service========================*/
	
    /*====================portfolio========================*/
	public function portfolio_image(){
		if(isset($this->session->userdata['Admin_loggin']['admin_id']) && !empty($this->session->userdata['Admin_loggin']['admin_id'])){
            $data['portfolio_image'] = $this->admin_model->portfolio_image();
			$this->load->view('admin/portfolio_image',$data);
		}else{
			redirect(base_url().'admin/login');
		}
	}
	public function portfolio_video(){
		if(isset($this->session->userdata['Admin_loggin']['admin_id']) && !empty($this->session->userdata['Admin_loggin']['admin_id'])){
            $data['portfolio_video'] = $this->admin_model->portfolio_video();
			$this->load->view('admin/portfolio_video',$data);
		}else{
			redirect(base_url().'admin/login');
		}
	}
	public function addportfolio_video(){
		
		$url = $_POST['url'];
		parse_str( parse_url( $url, PHP_URL_QUERY ), $youtube_id_v );
		$data =array(
			'por_video_link'=>$youtube_id_v['v']
		);
		$res = $this->admin_model->addportfolio_video($data);
        if($res > 0){
            $this->session->set_flashdata('addportfolio_video','<div class="alert">Adding serices Successfully...</div>');
            redirect(base_url().'admin/portfolio_video');
        }else{
            $this->session->set_flashdata('addportfolio_video','<div class="alert">oops!,Adding serices Failed...</div>');
            redirect(base_url().'admin/portfolio_video');
        }
	}
	public function inactive_portifolio(){
	    $result = $this->admin_model->inactive_portifolio($_POST['id']);
	    if($result == 1){
			$output['status']=1;
		}else{ 
		    $output['status']=0;
		}
		echo json_encode($output,JSON_PRETTY_PRINT);
	}
	public function active_portifolio(){
	    $result = $this->admin_model->active_portifolio($_POST['id']);
	    if($result == 1){
			$output['status']=1;
		}else{ 
		    $output['status']=0;
		}
		echo json_encode($output,JSON_PRETTY_PRINT);
	}
	public function delete_portifolio(){
	    $result = $this->admin_model->delete_portifolio($_POST['id']);
	    if($result == 1){
			$output['status']=1;
		}else{ 
		    $output['status']=0;
		}
		echo json_encode($output,JSON_PRETTY_PRINT);
	}
	public function delete_portifolio_video(){
	    $result = $this->admin_model->delete_portifolio_video($_POST['id']);
	    if($result == 1){
			$output['status']=1;
		}else{ 
		    $output['status']=0;
		}
		echo json_encode($output,JSON_PRETTY_PRINT);
	}
	public function inactive_portifolio_video(){
	    $result = $this->admin_model->inactive_portifolio_video($_POST['id']);
	    if($result == 1){
			$output['status']=1;
		}else{ 
		    $output['status']=0;
		}
		echo json_encode($output,JSON_PRETTY_PRINT);
	}
	public function active_portifolio_video(){
	    $result = $this->admin_model->active_portifolio_video($_POST['id']);
	    if($result == 1){
			$output['status']=1;
		}else{ 
		    $output['status']=0;
		}
		echo json_encode($output,JSON_PRETTY_PRINT);
	}
	public function addportfolio_image(){
		$picture1 =''; 
	    if(!empty($_FILES['image']['name'])){
		    $config['upload_path'] = 'assets/portfolio/';
		    $config['allowed_types'] = 'jpg|jpeg|png|gif';
		    $config['file_name'] = $_FILES['image']['name']; 
		    $config['encrypt_name'] = TRUE;
		    $this->load->library('upload',$config);
		    $this->upload->initialize($config);   
		    if($this->upload->do_upload('image')){
		        $uploadData = $this->upload->data();
		        $picture1 = $uploadData['file_name'];
		    }
		}
		if(!empty($_FILES['image']['name'])){
		    $data['portfolio_img'] = $picture1;
		}
		//print_r($data);exit;
		$res = $this->admin_model->addportfolio_image($data);
        if($res > 0){
            $this->session->set_flashdata('updateservices','<div class="alert">Adding serices Successfully...</div>');
            redirect(base_url().'admin/service');
        }else{
            $this->session->set_flashdata('updateservices','<div class="alert">oops!,Adding serices Failed...</div>');
            redirect(base_url().'admin/service');
        }
	}
	
    /*====================/portfolio========================*/
	
    /*====================conatct========================*/
	public function conatct(){
		if(isset($this->session->userdata['Admin_loggin']['admin_id']) && !empty($this->session->userdata['Admin_loggin']['admin_id'])){
            $data['conatct'] = $this->admin_model->conatct();
			$this->load->view('admin/conatct',$data);
		}else{
			redirect(base_url().'admin/login');
		}
	}
	public function delete_contact(){
	    $result = $this->admin_model->delete_contact($_POST['id']);
	    if($result == 1){
			$output['status']=1;
		}else{ 
		    $output['status']=0;
		}
		echo json_encode($output,JSON_PRETTY_PRINT);
	}
    /*====================/conatct========================*/
    /*====================conatct details========================*/
	public function conatct_details(){
		if(isset($this->session->userdata['Admin_loggin']['admin_id']) && !empty($this->session->userdata['Admin_loggin']['admin_id'])){
            $data['contact_deatils'] = $this->admin_model->conatct_details();
			$this->load->view('admin/conatct_details',$data);
		}else{
			redirect(base_url().'admin/login');
		}
	}
	public function edit_contact($id){
		if(isset($this->session->userdata['Admin_loggin']['admin_id']) && !empty($this->session->userdata['Admin_loggin']['admin_id'])){
            $data['edit_contact'] = $this->admin_model->edit_contact($id);
			$this->load->view('admin/edit_contact',$data);
		}else{
			redirect(base_url().'admin/login');
		}
	}
	public function update_conatct($id){
		$data = array(
			'address'=>$_POST['address'],
			'email1'=>$_POST['email1'],
			'email2'=>$_POST['email2'],
			'timmings'=>$_POST['timmings'],
			'telephone'=>$_POST['telephone'],
		);
		$res = $this->admin_model->update_conatct($id,$data);
        if($res > 0){
            $this->session->set_flashdata('conatct_details','<div class="alert">Update conatct details Successfully...</div>');
            redirect(base_url().'admin/conatct_details');
        }else{
            $this->session->set_flashdata('conatct_details','<div class="alert">oops!,Update conatct details Failed...</div>');
            redirect(base_url().'admin/conatct_details');
        }
	}
    /*====================/conatct details========================*/
    /*====================counter========================*/
	public function counter(){
		if(isset($this->session->userdata['Admin_loggin']['admin_id']) && !empty($this->session->userdata['Admin_loggin']['admin_id'])){
            $data['counter'] = $this->admin_model->counter();
			$this->load->view('admin/counter',$data);
		}else{
			redirect(base_url().'admin/login');
		}
	}
	public function edit_counter($id){
		if(isset($this->session->userdata['Admin_loggin']['admin_id']) && !empty($this->session->userdata['Admin_loggin']['admin_id'])){
            $data['edit_counter'] = $this->admin_model->edit_counter($id);
			$this->load->view('admin/edit_counter',$data);
		}else{
			redirect(base_url().'admin/login');
		}
	}
	public function update_counter($id){
		$data = array(
			'title'=>$_POST['title'],
			'count'=>$_POST['count'],
		);
		$res = $this->admin_model->update_counter($id,$data);
        if($res > 0){
            $this->session->set_flashdata('counter','<div class="alert">Update Counter Successfully...</div>');
            redirect(base_url().'admin/counter');
        }else{
            $this->session->set_flashdata('counter','<div class="alert">oops!,Update counter Failed...</div>');
            redirect(base_url().'admin/counter');
        }
	}
    /*====================counter========================*/
    /*====================social_media_liks========================*/
	public function social_media_liks(){
		if(isset($this->session->userdata['Admin_loggin']['admin_id']) && !empty($this->session->userdata['Admin_loggin']['admin_id'])){
            $data['social_media_liks'] = $this->admin_model->social_media_liks();
			$this->load->view('admin/social_media_liks',$data);
		}else{
			redirect(base_url().'admin/login');
		}
	}
	public function inactive_social_media(){
	    $result = $this->admin_model->inactive_social_media($_POST['id']);
	    if($result == 1){
			$output['status']=1;
		}else{ 
		    $output['status']=0;
		}
		echo json_encode($output,JSON_PRETTY_PRINT);
	}
	public function active_social_media(){
	    $result = $this->admin_model->active_social_media($_POST['id']);
	    if($result == 1){
			$output['status']=1;
		}else{ 
		    $output['status']=0;
		}
		echo json_encode($output,JSON_PRETTY_PRINT);
	}
	public function  update_social_link($id){
		$data = array(
			'social_link'=>$_POST['social_link']
		);
		$res = $this->admin_model->update_social_link($id,$data);
        if($res > 0){
            $this->session->set_flashdata('update_social_link','<div class="alert">Update social media liks Successfully...</div>');
            redirect(base_url().'admin/social_media_liks');
        }else{
            $this->session->set_flashdata('update_social_link','<div class="alert">oops!,Update social media liks Failed...</div>');
            redirect(base_url().'admin/social_media_liks');
        }
	}
    /*====================social_media_liks========================*/
	
	/*------------------testimonials--------------------------*/
	public function testimonials(){
		if(isset($this->session->userdata['Admin_loggin']['admin_id']) && !empty($this->session->userdata['Admin_loggin']['admin_id'])){
            $data['testimonials'] = $this->admin_model->testimonials();
			$this->load->view('admin/testimonials',$data);
		}else{
			redirect(base_url().'admin/login');
		}
	}
	public function add_testimonials(){
		if(isset($this->session->userdata['Admin_loggin']['admin_id']) && !empty($this->session->userdata['Admin_loggin']['admin_id'])){
			$this->load->view('admin/add_testimonials');
		}else{
			redirect(base_url().'admin/login');
		}
	}
	public function edit_testimonials($id){
		if(isset($this->session->userdata['Admin_loggin']['admin_id']) && !empty($this->session->userdata['Admin_loggin']['admin_id'])){
            $data['edit_testimonials'] = $this->admin_model->edit_testimonials($id);
			$this->load->view('admin/edit_testimonials',$data);
		}else{
			redirect(base_url().'admin/login');
		}
	}
	public function addtestimonials(){
		$data = array(
			'title'=>$_POST['title'],
			'desc'=>$_POST['desc'],
		);
		$res = $this->admin_model->add_testimonials($data);
        if($res > 0){
            $this->session->set_flashdata('add_testimonials','<div class="alert">Add testimonials Successfully...</div>');
            redirect(base_url().'admin/testimonials');
        }else{
            $this->session->set_flashdata('add_testimonials','<div class="alert">oops!,Add testimonials Failed...</div>');
            redirect(base_url().'admin/testimonials');
        }
	}
	public function update_testimonials($id){
		$data = array(
			'title'=>$_POST['title'],
			'desc'=>$_POST['desc'],
		);
		$res = $this->admin_model->update_testimonials($id,$data);
        if($res > 0){
            $this->session->set_flashdata('testimonials','<div class="alert">Update testimonials Successfully...</div>');
            redirect(base_url().'admin/testimonials');
        }else{
            $this->session->set_flashdata('testimonials','<div class="alert">oops!,Update testimonials Failed...</div>');
            redirect(base_url().'admin/testimonials');
        }
	}
	public function inactive_testimonials(){
	    $result = $this->admin_model->inactive_testimonials($_POST['id']);
	    if($result == 1){
			$output['status']=1;
		}else{ 
		    $output['status']=0;
		}
		echo json_encode($output,JSON_PRETTY_PRINT);
	}
	public function active_testimonials(){
	    $result = $this->admin_model->active_testimonials($_POST['id']);
	    if($result == 1){
			$output['status']=1;
		}else{ 
		    $output['status']=0;
		}
		echo json_encode($output,JSON_PRETTY_PRINT);
	}
	public function delete_testimonials(){
	    $result = $this->admin_model->delete_testimonials($_POST['id']);
	    if($result == 1){
			$output['status']=1;
		}else{ 
		    $output['status']=0;
		}
		echo json_encode($output,JSON_PRETTY_PRINT);
	}
	/*------------------testimonials--------------------------*/
	/*------------------event_imges--------------------------*/
	public function event_imges(){
		if(isset($this->session->userdata['Admin_loggin']['admin_id']) && !empty($this->session->userdata['Admin_loggin']['admin_id'])){
            $data['event_imges'] = $this->admin_model->event_imges();
			$this->load->view('admin/event_imges',$data);
		}else{
			redirect(base_url().'admin/login');
		}
	}
	public function inactive_event_imges(){
	    $result = $this->admin_model->inactive_event_imges($_POST['id']);
	    if($result == 1){
			$output['status']=1;
		}else{ 
		    $output['status']=0;
		}
		echo json_encode($output,JSON_PRETTY_PRINT);
	}
	public function active_event_imges(){
	    $result = $this->admin_model->active_event_imges($_POST['id']);
	    if($result == 1){
			$output['status']=1;
		}else{ 
		    $output['status']=0;
		}
		echo json_encode($output,JSON_PRETTY_PRINT);
	}
	public function delete_event_imges(){
	    $result = $this->admin_model->delete_event_imges($_POST['id']);
	    if($result == 1){
			$output['status']=1;
		}else{ 
		    $output['status']=0;
		}
		echo json_encode($output,JSON_PRETTY_PRINT);
	}
	public function add_event_images(){
		$image = '';
		$config['upload_path'] = 'assets/images/gallery/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|GIF|JPG|JPEG|PNG';
		$config['encrypt_name'] = TRUE;
		$count = count($_FILES['relatedimages']['name']);
		//print_r($count);exit();
		$files = $_FILES['relatedimages'];
		//print_r($config['upload_path']);exit();
		for ($i = 0; $i < $count; $i++) {
			$_FILES['relatedimages']['name'] = $files['name'][$i];
			//print_r($_FILES['relatedimages']['name']); print_r($i); print_r($count);
			$_FILES['relatedimages']['type'] = $files['type'][$i];
			$_FILES['relatedimages']['tmp_name'] = $files['tmp_name'][$i];
			$_FILES['relatedimages']['error'] = $files['error'][$i];
			$_FILES['relatedimages']['size'] = $files['size'][$i];
			$this->load->library('upload',$config);
			$this->upload->initialize($config);  
			if ($this->upload->do_upload('relatedimages')) {
				$arr_image = array('upload_data' => $this->upload->data());
				$inputdata['rimages'][$i] = $arr_image['upload_data']['file_name'];
			}
		}
		
		$response = $this->admin_model->gallerydet($inputdata);
		if($response > 0){
			$this->session->set_flashdata('event_imges','<div class="alert">Record Adding Succesfully</div>');
			redirect('admin/event_imges');
		}else{
			$this->session->set_flashdata('event_imges','<div class="alert">Record Adding Failed...</div>');
			redirect('admin/event_imges');
		}
	}
	/*-------------------event_imges--------------------------*/
	/*-------------------events_videos--------------------------*/
	public function events_videos(){
		if(isset($this->session->userdata['Admin_loggin']['admin_id']) && !empty($this->session->userdata['Admin_loggin']['admin_id'])){
            $data['events_videos'] = $this->admin_model->events_videos();
			$this->load->view('admin/events_videos',$data);
		}else{
			redirect(base_url().'admin/login');
		}
	}
	public function addevent_video(){		
		$url = $_POST['url'];
		parse_str( parse_url( $url, PHP_URL_QUERY ), $youtube_id_v );
		$data =array(
			'video'=> $youtube_id_v['v']
		);	
		$res = $this->admin_model->addevent_video($data);
        if($res > 0){
            $this->session->set_flashdata('addevent_video','<div class="alert">Adding Event video Successfully...</div>');
            redirect(base_url().'admin/events_videos');
        }else{
            $this->session->set_flashdata('addevent_video','<div class="alert">oops!,Adding Event video Failed...</div>');
            redirect(base_url().'admin/events_videos');
        }
	}
	public function inactive_event_video(){
	    $result = $this->admin_model->inactive_event_video($_POST['id']);
	    if($result == 1){
			$output['status']=1;
		}else{ 
		    $output['status']=0;
		}
		echo json_encode($output,JSON_PRETTY_PRINT);
	}
	public function active_event_video(){
	    $result = $this->admin_model->active_event_video($_POST['id']);
	    if($result == 1){
			$output['status']=1;
		}else{ 
		    $output['status']=0;
		}
		echo json_encode($output,JSON_PRETTY_PRINT);
	}
	public function delete_event_video(){
	    $result = $this->admin_model->delete_event_video($_POST['id']);
	    if($result == 1){
			$output['status']=1;
		}else{ 
		    $output['status']=0;
		}
		echo json_encode($output,JSON_PRETTY_PRINT);
	}
	/*-------------------End events_videos--------------------------*/
	/*-------------------blessings--------------------------*/
	public function blessings(){
		if(isset($this->session->userdata['Admin_loggin']['admin_id']) && !empty($this->session->userdata['Admin_loggin']['admin_id'])){
            $data['blessings'] = $this->admin_model->blessings();
			$this->load->view('admin/blessings',$data);
		}else{
			redirect(base_url().'admin/login');
		}
	}
	public function addeventblessings(){
		if(isset($this->session->userdata['Admin_loggin']['admin_id']) && !empty($this->session->userdata['Admin_loggin']['admin_id'])){
			$this->load->view('admin/addeventblessings');
		}else{
			redirect(base_url().'admin/login');
		}
	}
	public function edit_blessings($id){
		if(isset($this->session->userdata['Admin_loggin']['admin_id']) && !empty($this->session->userdata['Admin_loggin']['admin_id'])){
			$data['edit_blessings'] = $this->admin_model->edit_blessings($id);
			$this->load->view('admin/edit_blessings',$data);
		}else{
			redirect(base_url().'admin/login');
		}
	}
	public function addevent_blessings(){		
		date_default_timezone_set('Asia/Kolkata');
		$date =  date("Y-m-d h:i:s");
		$picture1 =''; 
	    if(!empty($_FILES['image']['name'])){
		    $config['upload_path'] = 'assets/images/';
		    $config['allowed_types'] = 'jpg|jpeg|png|gif';
		    $config['file_name'] = $_FILES['image']['name']; 
		    $config['encrypt_name'] = TRUE;
		    $this->load->library('upload',$config);
		    $this->upload->initialize($config);   
		    if($this->upload->do_upload('image')){
		        $uploadData = $this->upload->data();
		        $picture1 = $uploadData['file_name'];
		    }
		}
		
		$data =array(
			'title'=> $this->input->post('title'),
			'desc'=> $this->input->post('desc'),
			'add_date'=>$date
		);
		if(!empty($_FILES['image']['name'])){
		    $data['image'] = $picture1;
		}		
		$res = $this->admin_model->addevent_blessings($data);
        if($res > 0){
            $this->session->set_flashdata('blessings','<div class="alert">Adding blessings Successfully...</div>');
            redirect(base_url().'admin/blessings');
        }else{
            $this->session->set_flashdata('addevent_video','<div class="alert">oops!,Adding blessings Failed...</div>');
            redirect(base_url().'admin/blessings');
        }
	}
	public function update_blessings($id){		
		 date_default_timezone_set('Asia/Kolkata');
		$date =  date("Y-m-d h:i:s");
		$picture1 =''; 
	    if(!empty($_FILES['image']['name'])){
		    $config['upload_path'] = 'assets/images/';
		    $config['allowed_types'] = 'jpg|jpeg|png|gif';
		    $config['file_name'] = $_FILES['image']['name']; 
		    $config['encrypt_name'] = TRUE;
		    $this->load->library('upload',$config);
		    $this->upload->initialize($config);   
		    if($this->upload->do_upload('image')){
		        $uploadData = $this->upload->data();
		        $picture1 = $uploadData['file_name'];
		    }
		}
		
		$data =array(
			'title'=> $this->input->post('title'),
			'desc'=> $this->input->post('desc'),
			'update_date'=>$date
		);	
		if(!empty($_FILES['image']['name'])){
		    $data['image'] = $picture1;
		}
		//print_r($data);die;
		$res = $this->admin_model->update_blessings($id,$data);
        if($res > 0){
            $this->session->set_flashdata('update_blessings','<div class="alert">update blessings Successfully...</div>');
            redirect(base_url().'admin/blessings');
        }else{
            $this->session->set_flashdata('update_blessings','<div class="alert">oops!,update blessings Failed...</div>');
            redirect(base_url().'admin/blessings');
        }
	}
	public function inactive_blessings(){
	    $result = $this->admin_model->inactive_blessings($_POST['id']);
	    if($result == 1){
			$output['status']=1;
		}else{ 
		    $output['status']=0;
		}
		echo json_encode($output,JSON_PRETTY_PRINT);
	}
	public function active_blessings(){
	    $result = $this->admin_model->active_blessings($_POST['id']);
	    if($result == 1){
			$output['status']=1;
		}else{ 
		    $output['status']=0;
		}
		echo json_encode($output,JSON_PRETTY_PRINT);
	}
	public function delete_blessings(){
	    $result = $this->admin_model->delete_blessings($_POST['id']);
	    if($result == 1){
			$output['status']=1;
		}else{ 
		    $output['status']=0;
		}
		echo json_encode($output,JSON_PRETTY_PRINT);
	}
	/*-------------------End blessings--------------------------*/
	/*-------------------End conatct_map--------------------------*/
	public function conatct_map(){
		if(isset($this->session->userdata['Admin_loggin']['admin_id']) && !empty($this->session->userdata['Admin_loggin']['admin_id'])){
            $data['conatct_map'] = $this->admin_model->conatct_map();
			$this->load->view('admin/conatct_map',$data);
		}else{
			redirect(base_url().'admin/login');
		}
	}
	public function edit_conatct_map($id){
		if(isset($this->session->userdata['Admin_loggin']['admin_id']) && !empty($this->session->userdata['Admin_loggin']['admin_id'])){
			$data['edit_conatct_map'] = $this->admin_model->edit_conatct_map($id);
			$this->load->view('admin/edit_conatct_map',$data);
		}else{
		    redirect(base_url().'admin/login');
		}
	}
	public function update_conatct_map($id){		
		 date_default_timezone_set('Asia/Kolkata');
		$date =  date("Y-m-d h:i:s");
		
		$data =array(
			'desc'=> $this->input->post('desc')
		);
		//print_r($data);die;
		$res = $this->admin_model->update_conatct_map($id,$data);
        if($res > 0){
            $this->session->set_flashdata('update_conatct_map','<div class="alert">update map Successfully...</div>');
            redirect(base_url().'admin/conatct_map');
        }else{
            $this->session->set_flashdata('update_conatct_map','<div class="alert">oops!,update map Failed...</div>');
            redirect(base_url().'admin/conatct_map');
        }
	}
	/*-------------------End conatct_map--------------------------*/
	/*-------------------End Conatct Address--------------------------*/
	public function conatct_address(){
		if(isset($this->session->userdata['Admin_loggin']['admin_id']) && !empty($this->session->userdata['Admin_loggin']['admin_id'])){
            $data['conatct_address'] = $this->admin_model->conatct_address();
			$this->load->view('admin/conatct_address',$data);
		}else{
			redirect(base_url().'admin/login');
		}
	}
	public function edit_conatct_address($id){
		if(isset($this->session->userdata['Admin_loggin']['admin_id']) && !empty($this->session->userdata['Admin_loggin']['admin_id'])){
			$data['edit_conatct_address'] = $this->admin_model->edit_conatct_address($id);
			$this->load->view('admin/edit_conatct_address',$data);
		}else{
			redirect(base_url().'admin/login');
		}
	}
	public function update_conatct_address($id){		
		 date_default_timezone_set('Asia/Kolkata');
		$date =  date("Y-m-d h:i:s");
		
		$data =array(
			'title'=> $this->input->post('title'),
			'desc'=> $this->input->post('desc'),
			'update_date'=> $date
		);
		//print_r($data);die;
		$res = $this->admin_model->update_conatct_address($id,$data);
        if($res > 0){
            $this->session->set_flashdata('conatct_address','<div class="alert">update conatct address Successfully...</div>');
            redirect(base_url().'admin/conatct_address');
        }else{
            $this->session->set_flashdata('conatct_address','<div class="alert">oops!,update conatct address Failed...</div>');
            redirect(base_url().'admin/conatct_address');
        }
	}
	/*-------------------End Conatct Address--------------------------*/
   /*-------------------End Sthala Puranam --------------------------*/
	public function sthalapuranam(){
		if(isset($this->session->userdata['Admin_loggin']['admin_id']) && !empty($this->session->userdata['Admin_loggin']['admin_id'])){
            $data['sthalapuranam'] = $this->admin_model->sthalapuranam();
			$this->load->view('admin/sthalapuranam',$data);
		}else{
	        redirect(base_url().'admin/login');
		}
	}
	public function addsthalapuranam(){
		if(isset($this->session->userdata['Admin_loggin']['admin_id']) && !empty($this->session->userdata['Admin_loggin']['admin_id'])){
			$this->load->view('admin/addsthalapuranam');
		}else{
			redirect(base_url().'admin/login');
		}
	}
	public function edit_sthalapuranam($id){
		if(isset($this->session->userdata['Admin_loggin']['admin_id']) && !empty($this->session->userdata['Admin_loggin']['admin_id'])){
			$data['edit_sthalapuranam'] = $this->admin_model->edit_sthalapuranam($id);
			$this->load->view('admin/edit_sthalapuranam',$data);
		}else{
			redirect(base_url().'admin/login');
		}
	}
	public function add_sthalapuranam(){		
		date_default_timezone_set('Asia/Kolkata');
		$date =  date("Y-m-d h:i:s");
		$picture1 =''; 
	    if(!empty($_FILES['image']['name'])){
		    $config['upload_path'] = 'assets/images/';
		    $config['allowed_types'] = 'jpg|jpeg|png|gif';
		    $config['file_name'] = $_FILES['image']['name']; 
		    $config['encrypt_name'] = TRUE;
		    $this->load->library('upload',$config);
		    $this->upload->initialize($config);   
		    if($this->upload->do_upload('image')){
		        $uploadData = $this->upload->data();
		        $picture1 = $uploadData['file_name'];
		    }
		}
		
		$data =array(
			'desc'=> $this->input->post('desc'),
			'add_date'=>$date
		);
		if(!empty($_FILES['image']['name'])){
		    $data['image'] = $picture1;
		}		
		$res = $this->admin_model->add_sthalapuranam($data);
        if($res > 0){
            $this->session->set_flashdata('sthalapuranam','<div class="alert">Adding sthalapuranam Successfully...</div>');
            redirect(base_url().'admin/sthalapuranam');
        }else{
            $this->session->set_flashdata('sthalapuranam','<div class="alert">oops!,Adding sthalapuranam Failed...</div>');
            redirect(base_url().'admin/sthalapuranam');
        }
	}
	public function update_sthalapuranam($id){		
		 date_default_timezone_set('Asia/Kolkata');
		$date =  date("Y-m-d h:i:s");
		$picture1 =''; 
	    if(!empty($_FILES['image']['name'])){
		    $config['upload_path'] = 'assets/images/';
		    $config['allowed_types'] = 'jpg|jpeg|png|gif';
		    $config['file_name'] = $_FILES['image']['name']; 
		    $config['encrypt_name'] = TRUE;
		    $this->load->library('upload',$config);
		    $this->upload->initialize($config);   
		    if($this->upload->do_upload('image')){
		        $uploadData = $this->upload->data();
		        $picture1 = $uploadData['file_name'];
		    }
		}
		
		$data =array(
			'desc'=> $this->input->post('desc'),
			'update_date'=>$date
		);	
		if(!empty($_FILES['image']['name'])){
		    $data['image'] = $picture1;
		}
		//print_r($data);die;
		$res = $this->admin_model->update_sthalapuranam($id,$data);
        if($res > 0){
            $this->session->set_flashdata('update_sthalapuranam','<div class="alert">update blessings Successfully...</div>');
            redirect(base_url().'admin/sthalapuranam');
        }else{
            $this->session->set_flashdata('update_sthalapuranam','<div class="alert">oops!,update blessings Failed...</div>');
            redirect(base_url().'admin/sthalapuranam');
        }
	}
	public function inactive_sthalapuranam(){
	    $result = $this->admin_model->inactive_sthalapuranam($_POST['id']);
	    if($result == 1){
			$output['status']=1;
		}else{ 
		    $output['status']=0;
		}
		echo json_encode($output,JSON_PRETTY_PRINT);
	}
	public function active_sthalapuranam(){
	    $result = $this->admin_model->active_sthalapuranam($_POST['id']);
	    if($result == 1){
			$output['status']=1;
		}else{ 
		    $output['status']=0;
		}
		echo json_encode($output,JSON_PRETTY_PRINT);
	}
	public function delete_sthalapuranam(){
	    $result = $this->admin_model->delete_sthalapuranam($_POST['id']);
	    if($result == 1){
			$output['status']=1;
		}else{ 
		    $output['status']=0;
		}
		echo json_encode($output,JSON_PRETTY_PRINT);
	}
	/*-------------------End Sthala Puranam--------------------------*/
	/*------------------- Concept Evolution--------------------------*/
	
	public function concept_evolution(){
		if(isset($this->session->userdata['Admin_loggin']['admin_id']) && !empty($this->session->userdata['Admin_loggin']['admin_id'])){
            $data['concept_evolution'] = $this->admin_model->concept_evolution();
			$this->load->view('admin/concept_evolution',$data);
		}else{
			redirect(base_url().'admin/login');
		}
	}
	public function about_concept_evolution(){
		if(isset($this->session->userdata['Admin_loggin']['admin_id']) && !empty($this->session->userdata['Admin_loggin']['admin_id'])){
			$this->load->view('admin/about_concept_evolution');
		}else{
			redirect(base_url().'admin/login');
		}
	}
	public function edit_concept_evolution($id){
		if(isset($this->session->userdata['Admin_loggin']['admin_id']) && !empty($this->session->userdata['Admin_loggin']['admin_id'])){
			$data['edit_concept_evolution'] = $this->admin_model->edit_concept_evolution($id);
			$this->load->view('admin/edit_concept_evolution',$data);
		}else{
			redirect(base_url().'admin/login');
		}
	}
	public function add_concept_evolution(){		
		date_default_timezone_set('Asia/Kolkata');
		$date =  date("Y-m-d h:i:s");
		$picture1 =''; 
	    if(!empty($_FILES['image']['name'])){
		    $config['upload_path'] = 'assets/images/';
		    $config['allowed_types'] = 'jpg|jpeg|png|gif';
		    $config['file_name'] = $_FILES['image']['name']; 
		    $config['encrypt_name'] = TRUE;
		    $this->load->library('upload',$config);
		    $this->upload->initialize($config);   
		    if($this->upload->do_upload('image')){
		        $uploadData = $this->upload->data();
		        $picture1 = $uploadData['file_name'];
		    }
		}
		
		$data =array(
			'desc'=> $this->input->post('desc'),
			'title'=> $this->input->post('title'),
			'add_date'=>$date
		);
		if(!empty($_FILES['image']['name'])){
		    $data['image'] = $picture1;
		}		
		$res = $this->admin_model->add_concept_evolution($data);
        if($res > 0){
            $this->session->set_flashdata('add_concept_evolution','<div class="alert">Adding sthalapuranam Successfully...</div>');
            redirect(base_url().'admin/concept_evolution');
        }else{
            $this->session->set_flashdata('add_concept_evolution','<div class="alert">oops!,Adding sthalapuranam Failed...</div>');
            redirect(base_url().'admin/concept_evolution');
        }
	}
	public function update_concept_evolution($id){		
		 date_default_timezone_set('Asia/Kolkata');
		$date =  date("Y-m-d h:i:s");
		$picture1 =''; 
	    if(!empty($_FILES['image']['name'])){
		    $config['upload_path'] = 'assets/images/';
		    $config['allowed_types'] = 'jpg|jpeg|png|gif';
		    $config['file_name'] = $_FILES['image']['name']; 
		    $config['encrypt_name'] = TRUE;
		    $this->load->library('upload',$config);
		    $this->upload->initialize($config);   
		    if($this->upload->do_upload('image')){
		        $uploadData = $this->upload->data();
		        $picture1 = $uploadData['file_name'];
		    }
		}
		
		$data =array(
			'desc'=> $this->input->post('desc'),
			'title'=> $this->input->post('title'),
			'update_date'=>$date
		);	
		if(!empty($_FILES['image']['name'])){
		    $data['image'] = $picture1;
		}
		//print_r($data);die;
		$res = $this->admin_model->update_concept_evolution($id,$data);
        if($res > 0){
            $this->session->set_flashdata('update_concept_evolution','<div class="alert">update blessings Successfully...</div>');
            redirect(base_url().'admin/concept_evolution');
        }else{
            $this->session->set_flashdata('update_concept_evolution','<div class="alert">oops!,update blessings Failed...</div>');
            redirect(base_url().'admin/concept_evolution');
        }
	}
	public function inactive_concept_evolution(){
	    $result = $this->admin_model->inactive_concept_evolution($_POST['id']);
	    if($result == 1){
			$output['status']=1;
		}else{ 
		    $output['status']=0;
		}
		echo json_encode($output,JSON_PRETTY_PRINT);
	}
	public function active_concept_evolution(){
	    $result = $this->admin_model->active_concept_evolution($_POST['id']);
	    if($result == 1){
			$output['status']=1;
		}else{ 
		    $output['status']=0;
		}
		echo json_encode($output,JSON_PRETTY_PRINT);
	}
	public function delete_concept_evolution(){
	    $result = $this->admin_model->delete_concept_evolution($_POST['id']);
	    if($result == 1){
			$output['status']=1;
		}else{ 
		    $output['status']=0;
		}
		echo json_encode($output,JSON_PRETTY_PRINT);
	}
	/*-------------------End Concept Evolution--------------------------*/
	/*-------------------bank_accounts--------------------------*/
	
	public function bank_accounts(){
		if(isset($this->session->userdata['Admin_loggin']['admin_id']) && !empty($this->session->userdata['Admin_loggin']['admin_id'])){
            $data['bank_accounts'] = $this->admin_model->bank_accounts();
			$this->load->view('admin/bank_accounts',$data);
		}else{
			redirect(base_url().'admin/login');
		}
	}
	public function add_bank_accounts(){
		if(isset($this->session->userdata['Admin_loggin']['admin_id']) && !empty($this->session->userdata['Admin_loggin']['admin_id'])){
			$this->load->view('admin/add_bank_accounts');
		}else{
			redirect(base_url().'admin/login');
		}
	}
	public function edit_bank_accounts($id){
		if(isset($this->session->userdata['Admin_loggin']['admin_id']) && !empty($this->session->userdata['Admin_loggin']['admin_id'])){
			$data['edit_bank_accounts'] = $this->admin_model->edit_bank_accounts($id);
			$this->load->view('admin/edit_bank_accounts',$data);
		}else{
			redirect(base_url().'admin/login');
		}
	}
	public function addbank_accounts(){		
		date_default_timezone_set('Asia/Kolkata');
		$date =  date("Y-m-d h:i:s");
		
		$data =array(
			'desc'=> $this->input->post('desc'),
			'title'=> $this->input->post('title'),
			'add_date'=>$date
		);
		$res = $this->admin_model->addbank_accounts($data);
        if($res > 0){
            $this->session->set_flashdata('addbank_accounts','<div class="alert">Adding sthalapuranam Successfully...</div>');
            redirect(base_url().'admin/bank_accounts');
        }else{
            $this->session->set_flashdata('addbank_accounts','<div class="alert">oops!,Adding sthalapuranam Failed...</div>');
            redirect(base_url().'admin/bank_accounts');
        }
	}
	public function update_bank_accounts($id){		
		 date_default_timezone_set('Asia/Kolkata');
		$date =  date("Y-m-d h:i:s");
		$data =array(
			'desc'=> $this->input->post('desc'),
			'title'=> $this->input->post('title'),
			'update_date'=>$date
		);
		//print_r($data);die;
		$res = $this->admin_model->update_bank_accounts($id,$data);
        if($res > 0){
            $this->session->set_flashdata('update_bank_accounts','<div class="alert">update blessings Successfully...</div>');
            redirect(base_url().'admin/bank_accounts');
        }else{
            $this->session->set_flashdata('update_bank_accounts','<div class="alert">oops!,update blessings Failed...</div>');
            redirect(base_url().'admin/bank_accounts');
        }
	}
	public function inactive_bank_accounts(){
	    $result = $this->admin_model->inactive_bank_accounts($_POST['id']);
	    if($result == 1){
			$output['status']=1;
		}else{ 
		    $output['status']=0;
		}
		echo json_encode($output,JSON_PRETTY_PRINT);
	}
	public function active_bank_accounts(){
	    $result = $this->admin_model->active_bank_accounts($_POST['id']);
	    if($result == 1){
			$output['status']=1;
		}else{ 
		    $output['status']=0;
		}
		echo json_encode($output,JSON_PRETTY_PRINT);
	}
	public function delete_bank_accounts(){
	    $result = $this->admin_model->delete_bank_accounts($_POST['id']);
	    if($result == 1){
			$output['status']=1;
		}else{ 
		    $output['status']=0;
		}
		echo json_encode($output,JSON_PRETTY_PRINT);
	}
	/*-------------------Endbank_accounts--------------------------*/
	/*-------------------donations_benefits--------------------------*/
	public function donations_benefits(){
		if(isset($this->session->userdata['Admin_loggin']['admin_id']) && !empty($this->session->userdata['Admin_loggin']['admin_id'])){
            $data['donations_benefits'] = $this->admin_model->donations_benefits();
			$this->load->view('admin/donations_benefits',$data);
		}else{
			redirect(base_url().'admin/login');
		}
	}
	public function edit_donations_benefits($id){
		if(isset($this->session->userdata['Admin_loggin']['admin_id']) && !empty($this->session->userdata['Admin_loggin']['admin_id'])){
			$data['edit_donations_benefits'] = $this->admin_model->edit_donations_benefits($id);
			$this->load->view('admin/edit_donations_benefits',$data);
		}else{
			redirect(base_url().'admin/login');
		}
	}
	public function update_donations_benefits($id){		
		 date_default_timezone_set('Asia/Kolkata');
		$date =  date("Y-m-d h:i:s");
		$data =array(
			'desc'=> $this->input->post('desc'),
			'update_date'=>$date
		);
		//print_r($data);die;
		$res = $this->admin_model->update_donations_benefits($id,$data);
        if($res > 0){
            $this->session->set_flashdata('update_donations_benefits','<div class="alert">update blessings Successfully...</div>');
            redirect(base_url().'admin/donations_benefits');
        }else{
            $this->session->set_flashdata('update_donations_benefits','<div class="alert">oops!,update blessings Failed...</div>');
            redirect(base_url().'admin/donations_benefits');
        }
	}
	/*-------------------End donations_benefits--------------------------*/
	/*-------------------fund_raising_plan--------------------------*/
	public function fund_raising_plan(){
		if(isset($this->session->userdata['Admin_loggin']['admin_id']) && !empty($this->session->userdata['Admin_loggin']['admin_id'])){
            $data['fund_raising_plan'] = $this->admin_model->fund_raising_plan();
			$this->load->view('admin/fund_raising_plan',$data);
		}else{
			redirect(base_url().'admin/login');
		}
	}
	public function add_fund_raising_plan(){
		if(isset($this->session->userdata['Admin_loggin']['admin_id']) && !empty($this->session->userdata['Admin_loggin']['admin_id'])){
			$this->load->view('admin/add_fund_raising_plan');
		}else{
			redirect(base_url().'admin/login');
		}
	}
	public function edit_fund_raising_plan($id){
		if(isset($this->session->userdata['Admin_loggin']['admin_id']) && !empty($this->session->userdata['Admin_loggin']['admin_id'])){
			$data['edit_fund_raising_plan'] = $this->admin_model->edit_fund_raising_plan($id);
			$this->load->view('admin/edit_fund_raising_plan',$data);
		}else{
			redirect(base_url().'admin/login');
		}
	}
	public function addfund_raising_plan(){
		date_default_timezone_set('Asia/Kolkata');
		$date =  date("Y-m-d h:i:s");
		$title= $this->input->post('title');
		$price= $this->input->post('price');
		$unit= $this->input->post('unit');
		$data =array(
			'title'=> isset($title)?$title:'',
			'price'=> isset($price)?$price:'',
			'unit'=> isset($unit)?$unit:'',
			'add_date'=>$date
		);
		$res = $this->admin_model->addfund_raising_plan($data);
        if($res > 0){
            $this->session->set_flashdata('addfund_raising_plan','<div class="alert">Adding fund raising plan Successfully...</div>');
            redirect(base_url().'admin/add_fund_raising_plan');
        }else{
            $this->session->set_flashdata('addfund_raising_plan','<div class="alert">oops!,Adding fund raising plan Failed...</div>');
            redirect(base_url().'admin/add_fund_raising_plan');
        }
	}
	public function updatefund_raising_plan($id){
		date_default_timezone_set('Asia/Kolkata');
		$date =  date("Y-m-d h:i:s");
		$title= $this->input->post('title');
		$price= $this->input->post('price');
		$unit= $this->input->post('unit');
		$data =array(
			'title'=> isset($title)?$title:'',
			'price'=> isset($price)?$price:'',
			'unit'=> isset($unit)?$unit:'',
			'upadte_date'=>$date
		);
		$res = $this->admin_model->updatefund_raising_plan($id,$data);
        if($res > 0){
            $this->session->set_flashdata('updatefund_raising_plan','<div class="alert">update fund raising plan Successfully...</div>');
            redirect(base_url().'admin/fund_raising_plan');
        }else{
            $this->session->set_flashdata('updatefund_raising_plan','<div class="alert">oops!,update fund raising plan Failed...</div>');
            redirect(base_url().'admin/fund_raising_plan');
        }
	}
	
	public function inactive_fund_raising_plan(){
	    $result = $this->admin_model->inactive_fund_raising_plan($_POST['id']);
	    if($result == 1){
			$output['status']=1;
		}else{ 
		    $output['status']=0;
		}
		echo json_encode($output,JSON_PRETTY_PRINT);
	}
	public function active_fund_raising_plan(){
	    $result = $this->admin_model->active_fund_raising_plan($_POST['id']);
	    if($result == 1){
			$output['status']=1;
		}else{ 
		    $output['status']=0;
		}
		echo json_encode($output,JSON_PRETTY_PRINT);
	}
	public function delete_fund_raising_plan(){
	    $result = $this->admin_model->delete_fund_raising_plan($_POST['id']);
	    if($result == 1){
			$output['status']=1;
		}else{ 
		    $output['status']=0;
		}
		echo json_encode($output,JSON_PRETTY_PRINT);
	}
	/*-------------------End fund_raising_plan--------------------------*/
	/*-------------------user_details--------------------------*/
	public function user_details(){
	    if(isset($this->session->userdata['Admin_loggin']['admin_id']) && !empty($this->session->userdata['Admin_loggin']['admin_id'])){
			$data['user_details'] = $this->admin_model->user_details();
			$this->load->view('admin/user_deatils',$data);
		}else{
			redirect(base_url().'admin/login');
		}
	}
	/*-------------------End user_details--------------------------*/
	/*------------------- donations_list--------------------------*/
	public function donations_list(){
	    if(isset($this->session->userdata['Admin_loggin']['admin_id']) && !empty($this->session->userdata['Admin_loggin']['admin_id'])){
			$data['donations_list'] = $this->admin_model->donations_list();
			$this->load->view('admin/donations_list',$data);
		}else{
			redirect(base_url().'admin/login');
		}
	}
	public function donation_details($id){
	    if(isset($this->session->userdata['Admin_loggin']['admin_id']) && !empty($this->session->userdata['Admin_loggin']['admin_id'])){
			$data['donation_details'] = $this->admin_model->donation_details($id);
			$data['donation_details_list'] = $this->admin_model->donation_details_list($id);
			$data['donation_details_list2'] = $this->admin_model->donation_details_list2($id);
			$this->load->view('admin/donation_details',$data);
		}else{
			redirect(base_url().'admin/login');
		}
	}
	/*-------------------End donations_list--------------------------*/
	
	/*-------------------Repots------------------------*/
   public function account_statement(){
       if(isset($this->session->userdata['Admin_loggin']['admin_id']) && !empty($this->session->userdata['Admin_loggin']['admin_id'])){
	        $data['account_statement'] = $this->admin_model->account_statement();
	        $this->load->view('admin/account_statement',$data);
		}else{
			redirect(base_url().'admin/login');
		}
   }
   public function donation_report(){
       if(isset($this->session->userdata['Admin_loggin']['admin_id']) && !empty($this->session->userdata['Admin_loggin']['admin_id'])){
	      
	        if($_POST){
	             //print_r($_POST);
	            $from = $this->input->post('from'); 
	            $to = $this->input->post('to'); 
	            $data1 =array(
	        		'from'=> $this->input->post('from'),
	        		'to'=> $this->input->post('to')
	        	);
	        } else {
	            $data1 = array();
	        }
	        $data['donation_report'] = $this->admin_model->donation_report($data1);
	        $this->load->view('admin/donation_report',$data);
		}else{
			redirect(base_url().'admin/login');
		}
   }
   public function donation_report_print(){
      if(isset($this->session->userdata['Admin_loggin']['admin_id']) && !empty($this->session->userdata['Admin_loggin']['admin_id'])){
	      
	        if($_POST){
	             //print_r($_POST);
	            $from = $this->input->post('from'); 
	            $to = $this->input->post('to'); 
	            $data1 =array(
	        		'from'=> $this->input->post('from'),
	        		'to'=> $this->input->post('to')
	        	);
	        } else {
	            $data1 = array();
	        }
	        $data['donation_report'] = $this->admin_model->donation_report($data1);
	        $this->load->view('admin/donation_report_print',$data);
		}else{
			redirect(base_url().'admin/login');
		}
		/*
		//$this->load->library('fpdf_master');
		$this->fpdf->SetFont('Arial','B',18);
		
		$this->fpdf->Cell(50,10,'Hello World!');
		//All text which have to print should be goes here
		//also you can go for calling view over here and put the same type of code inside the view
		
		echo $this->fpdf->Output('hello_world.pdf','D');// Name of */
   }
   
   public function firm_donation(){
       if(isset($this->session->userdata['Admin_loggin']['admin_id']) && !empty($this->session->userdata['Admin_loggin']['admin_id'])){
	        if($_POST){
	             //print_r($_POST);
	            $from = $this->input->post('from'); 
	            $to = $this->input->post('to'); 
	            $data1 =array(
	        		'from'=> $this->input->post('from'),
	        		'to'=> $this->input->post('to')
	        	);
	        } else {
	            $data1 = array();
	        }
	        
	        $data['firm_donation'] = $this->admin_model->firm_donation($data1);
	        $this->load->view('admin/firm_donation',$data);
		}else{
			redirect(base_url().'admin/login');
		}
   }
   public function firm_donation_print(){
       if(isset($this->session->userdata['Admin_loggin']['admin_id']) && !empty($this->session->userdata['Admin_loggin']['admin_id'])){
	        if($_POST){
	             //print_r($_POST);
	            $from = $this->input->post('from'); 
	            $to = $this->input->post('to'); 
	            $data1 =array(
	        		'from'=> $this->input->post('from'),
	        		'to'=> $this->input->post('to')
	        	);
	        } else {
	            $data1 = array();
	        }
	        
	        $data['firm_donation'] = $this->admin_model->firm_donation($data1);
	        $this->load->view('admin/firm_donation_print',$data);
		}else{
			redirect(base_url().'admin/login');
		}
   }
    public function amount_report(){
        if(isset($this->session->userdata['Admin_loggin']['admin_id']) && !empty($this->session->userdata['Admin_loggin']['admin_id'])){
	        
	        if($_POST){
	             //print_r($_POST);
	            $from = $this->input->post('from'); 
	            $to = $this->input->post('to'); 
	            $data1 =array(
	        		'from'=> $this->input->post('from'),
	        		'to'=> $this->input->post('to')
	        	);
	        } else {
	            $data1 = array();
	        }
	        
	        $data['amount_report'] = $this->admin_model->amount_report($data1);
	        $this->load->view('admin/amount_report',$data);
		}else{
			redirect(base_url().'admin/login');
		}
    }
    public function amount_report_print(){
        if(isset($this->session->userdata['Admin_loggin']['admin_id']) && !empty($this->session->userdata['Admin_loggin']['admin_id'])){
	        
	        if($_POST){
	             //print_r($_POST);
	            $from = $this->input->post('from'); 
	            $to = $this->input->post('to'); 
	            $data1 =array(
	        		'from'=> $this->input->post('from'),
	        		'to'=> $this->input->post('to')
	        	);
	        } else {
	            $data1 = array();
	        }
	        
	        $data['amount_report'] = $this->admin_model->amount_report($data1);
	        $this->load->view('admin/amount_report_print',$data);
		}else{
			redirect(base_url().'admin/login');
		}
    }
    public function firm_amount_report(){
        if(isset($this->session->userdata['Admin_loggin']['admin_id']) && !empty($this->session->userdata['Admin_loggin']['admin_id'])){
	         if($_POST){
	             //print_r($_POST);
	            $from = $this->input->post('from'); 
	            $to = $this->input->post('to'); 
	            $data1 =array(
	        		'from'=> $this->input->post('from'),
	        		'to'=> $this->input->post('to')
	        	);
	        } else {
	            $data1 = array();
	        }
	        $data['firm_amount_report'] = $this->admin_model->firm_amount_report($data1);
	        $this->load->view('admin/firm_amount_report',$data);
		}else{
			redirect(base_url().'admin/login');
		}
    }
    public function firm_amount_report_print(){
        if(isset($this->session->userdata['Admin_loggin']['admin_id']) && !empty($this->session->userdata['Admin_loggin']['admin_id'])){
	         if($_POST){
	             //print_r($_POST);
	            $from = $this->input->post('from'); 
	            $to = $this->input->post('to'); 
	            $data1 =array(
	        		'from'=> $this->input->post('from'),
	        		'to'=> $this->input->post('to')
	        	);
	        } else {
	            $data1 = array();
	        }
	        $data['firm_amount_report'] = $this->admin_model->firm_amount_report($data1);
	        $this->load->view('admin/firm_amount_report_print',$data);
		}else{
			redirect(base_url().'admin/login');
		}
    }
    public function source_report(){
        if(isset($this->session->userdata['Admin_loggin']['admin_id']) && !empty($this->session->userdata['Admin_loggin']['admin_id'])){
	        if($_POST){
	             //print_r($_POST);
	            $from = $this->input->post('from'); 
	            $to = $this->input->post('to'); 
	            $data1 =array(
	        		'from'=> $this->input->post('from'),
	        		'to'=> $this->input->post('to')
	        	);
	        } else {
	            $data1 = array();
	        }
	        $data['source_report'] = $this->admin_model->source_report($data1);
	        $this->load->view('admin/source',$data);
		}else{
			redirect(base_url().'admin/login');
		}
    }
    public function source_report_print(){
        if(isset($this->session->userdata['Admin_loggin']['admin_id']) && !empty($this->session->userdata['Admin_loggin']['admin_id'])){
	        if($_POST){
	             //print_r($_POST);
	            $from = $this->input->post('from'); 
	            $to = $this->input->post('to'); 
	            $data1 =array(
	        		'from'=> $this->input->post('from'),
	        		'to'=> $this->input->post('to')
	        	);
	        } else {
	            $data1 = array();
	        }
	        $data['source_report'] = $this->admin_model->source_report($data1);
	        $this->load->view('admin/source_report_print',$data);
		}else{
			redirect(base_url().'admin/login');
		}
    }
    public function firm_source_report(){
        if(isset($this->session->userdata['Admin_loggin']['admin_id']) && !empty($this->session->userdata['Admin_loggin']['admin_id'])){
	        if($_POST){
	             //print_r($_POST);
	            $from = $this->input->post('from'); 
	            $to = $this->input->post('to'); 
	            $data1 =array(
	        		'from'=> $this->input->post('from'),
	        		'to'=> $this->input->post('to')
	        	);
	        } else {
	            $data1 = array();
	        }
	        $data['firm_source_report'] = $this->admin_model->firm_source_report($data1);
	        $this->load->view('admin/firm_source_report',$data);
		}else{
			redirect(base_url().'admin/login');
		}
    }
    public function firm_source_report_print(){
        if(isset($this->session->userdata['Admin_loggin']['admin_id']) && !empty($this->session->userdata['Admin_loggin']['admin_id'])){
	        if($_POST){
	             //print_r($_POST);
	            $from = $this->input->post('from'); 
	            $to = $this->input->post('to'); 
	            $data1 =array(
	        		'from'=> $this->input->post('from'),
	        		'to'=> $this->input->post('to')
	        	);
	        } else {
	            $data1 = array();
	        }
	        $data['firm_source_report'] = $this->admin_model->firm_source_report($data1);
	        $this->load->view('admin/firm_source_report_print',$data);
		}else{
			redirect(base_url().'admin/login');
		}
    }
    public function donations_behalf(){
        if(isset($this->session->userdata['Admin_loggin']['admin_id']) && !empty($this->session->userdata['Admin_loggin']['admin_id'])){
	        if($_POST){
	             //print_r($_POST);
	            $from = $this->input->post('from'); 
	            $to = $this->input->post('to'); 
	            $data1 =array(
	        		'from'=> $this->input->post('from'),
	        		'to'=> $this->input->post('to')
	        	);
	        } else {
	            $data1 = array();
	        }
	        $data['donation_for'] = $this->admin_model->donation_for($data1);
	        $this->load->view('admin/donations_for',$data);
		}else{
			redirect(base_url().'admin/login');
		}
    }
    public function donations_behalf_print(){
        if(isset($this->session->userdata['Admin_loggin']['admin_id']) && !empty($this->session->userdata['Admin_loggin']['admin_id'])){
	        if($_POST){
	             //print_r($_POST);
	            $from = $this->input->post('from'); 
	            $to = $this->input->post('to'); 
	            $data1 =array(
	        		'from'=> $this->input->post('from'),
	        		'to'=> $this->input->post('to')
	        	);
	        } else {
	            $data1 = array();
	        }
	        $data['donation_for'] = $this->admin_model->donation_for($data1);
	        $this->load->view('admin/donations_behalf_print',$data);
		}else{
			redirect(base_url().'admin/login');
		}
    }
    public function purpose_report(){
        if(isset($this->session->userdata['Admin_loggin']['admin_id']) && !empty($this->session->userdata['Admin_loggin']['admin_id'])){
	        if($_POST){
	             //print_r($_POST);
	            $from = $this->input->post('from'); 
	            $to = $this->input->post('to'); 
	            $data1 =array(
	        		'from'=> $this->input->post('from'),
	        		'to'=> $this->input->post('to')
	        	);
	        } else {
	            $data1 = array();
	        }
	        $data['purpose_report'] = $this->admin_model->purpose_report($data1);
	        $this->load->view('admin/purpose',$data);
		}else{
			redirect(base_url().'admin/login');
		}
    }
    public function purpose_report_print(){
        if(isset($this->session->userdata['Admin_loggin']['admin_id']) && !empty($this->session->userdata['Admin_loggin']['admin_id'])){
	        if($_POST){
	             //print_r($_POST);
	            $from = $this->input->post('from'); 
	            $to = $this->input->post('to'); 
	            $data1 =array(
	        		'from'=> $this->input->post('from'),
	        		'to'=> $this->input->post('to')
	        	);
	        } else {
	            $data1 = array();
	        }
	        $data['purpose_report'] = $this->admin_model->purpose_report($data1);
	        $this->load->view('admin/purpose_report_print',$data);
		}else{
			redirect(base_url().'admin/login');
		}
    }
    public function firm_purpose_report(){
        if(isset($this->session->userdata['Admin_loggin']['admin_id']) && !empty($this->session->userdata['Admin_loggin']['admin_id'])){
	        if($_POST){
	             //print_r($_POST);
	            $from = $this->input->post('from'); 
	            $to = $this->input->post('to'); 
	            $data1 =array(
	        		'from'=> $this->input->post('from'),
	        		'to'=> $this->input->post('to')
	        	);
	        } else {
	            $data1 = array();
	        }
	        $data['firm_purpose_report'] = $this->admin_model->firm_purpose_report($data1);
	        $this->load->view('admin/firm_purpose',$data);
		}else{
			redirect(base_url().'admin/login');
		}
    }
    public function firm_purpose_report_print(){
        if(isset($this->session->userdata['Admin_loggin']['admin_id']) && !empty($this->session->userdata['Admin_loggin']['admin_id'])){
	        if($_POST){
	             //print_r($_POST);
	            $from = $this->input->post('from'); 
	            $to = $this->input->post('to'); 
	            $data1 =array(
	        		'from'=> $this->input->post('from'),
	        		'to'=> $this->input->post('to')
	        	);
	        } else {
	            $data1 = array();
	        }
	        $data['firm_purpose_report'] = $this->admin_model->firm_purpose_report($data1);
	        $this->load->view('admin/firm_purpose_report_print',$data);
		}else{
			redirect(base_url().'admin/login');
		}
    }
    public function donations_week(){
        if(isset($this->session->userdata['Admin_loggin']['admin_id']) && !empty($this->session->userdata['Admin_loggin']['admin_id'])){
	        if($_POST){
	             //print_r($_POST);
	            $from = $this->input->post('from'); 
	            $to = $this->input->post('to'); 
	            $data1 =array(
	        		'from'=> $this->input->post('from'),
	        		'to'=> $this->input->post('to')
	        	);
	        } else {
	            $data1 = array();
	        }
	        $data['donations_week'] = $this->admin_model->donations_week($data1);
	        $this->load->view('admin/donations_week',$data);
		}else{
			redirect(base_url().'admin/login');
		}
    }
    public function donations_week_print(){
        if(isset($this->session->userdata['Admin_loggin']['admin_id']) && !empty($this->session->userdata['Admin_loggin']['admin_id'])){
	        if($_POST){
	             //print_r($_POST);
	            $from = $this->input->post('from'); 
	            $to = $this->input->post('to'); 
	            $data1 =array(
	        		'from'=> $this->input->post('from'),
	        		'to'=> $this->input->post('to')
	        	);
	        } else {
	            $data1 = array();
	        }
	        $data['donations_week'] = $this->admin_model->donations_week($data1);
	        $this->load->view('admin/donations_week_print',$data);
		}else{
			redirect(base_url().'admin/login');
		}
    }
    public function firm_donations_week(){
        if(isset($this->session->userdata['Admin_loggin']['admin_id']) && !empty($this->session->userdata['Admin_loggin']['admin_id'])){
	        if($_POST){
	             //print_r($_POST);
	            $from = $this->input->post('from'); 
	            $to = $this->input->post('to'); 
	            $data1 =array(
	        		'from'=> $this->input->post('from'),
	        		'to'=> $this->input->post('to')
	        	);
	        } else {
	            $data1 = array();
	        }
	        $data['firm_donations_week'] = $this->admin_model->firm_donations_week($data1);
	        $this->load->view('admin/firm_donations_week',$data);
		}else{
			redirect(base_url().'admin/login');
		}
    }
    public function firm_donations_week_print(){
        if(isset($this->session->userdata['Admin_loggin']['admin_id']) && !empty($this->session->userdata['Admin_loggin']['admin_id'])){
	        if($_POST){
	             //print_r($_POST);
	            $from = $this->input->post('from'); 
	            $to = $this->input->post('to'); 
	            $data1 =array(
	        		'from'=> $this->input->post('from'),
	        		'to'=> $this->input->post('to')
	        	);
	        } else {
	            $data1 = array();
	        }
	        $data['firm_donations_week'] = $this->admin_model->firm_donations_week($data1);
	        $this->load->view('admin/firm_donations_week_print',$data);
		}else{
			redirect(base_url().'admin/login');
		}
    }
    public function fest_donations(){
        if(isset($this->session->userdata['Admin_loggin']['admin_id']) && !empty($this->session->userdata['Admin_loggin']['admin_id'])){
	        if($_POST){
	             //print_r($_POST);
	            $from = $this->input->post('from'); 
	            $to = $this->input->post('to'); 
	            $data1 =array(
	        		'from'=> $this->input->post('from'),
	        		'to'=> $this->input->post('to')
	        	);
	        } else {
	            $data1 = array();
	        }
	        $data['fest_donations'] = $this->admin_model->fest_donations($data1);
	        $this->load->view('admin/fest_donations',$data);
		}else{
			redirect(base_url().'admin/login');
		}
    }
    public function fest_donations_print(){
        if(isset($this->session->userdata['Admin_loggin']['admin_id']) && !empty($this->session->userdata['Admin_loggin']['admin_id'])){
	        if($_POST){
	             //print_r($_POST);
	            $from = $this->input->post('from'); 
	            $to = $this->input->post('to'); 
	            $data1 =array(
	        		'from'=> $this->input->post('from'),
	        		'to'=> $this->input->post('to')
	        	);
	        } else {
	            $data1 = array();
	        }
	        $data['fest_donations'] = $this->admin_model->fest_donations($data1);
	        $this->load->view('admin/fest_donations_print',$data);
		}else{
			redirect(base_url().'admin/login');
		}
    }
    public function firm_fest_donations(){
        if(isset($this->session->userdata['Admin_loggin']['admin_id']) && !empty($this->session->userdata['Admin_loggin']['admin_id'])){
	        if($_POST){
	             //print_r($_POST);
	            $from = $this->input->post('from'); 
	            $to = $this->input->post('to'); 
	            $data1 =array(
	        		'from'=> $this->input->post('from'),
	        		'to'=> $this->input->post('to')
	        	);
	        } else {
	            $data1 = array();
	        }
	        $data['firm_fest_donations'] = $this->admin_model->firm_fest_donations($data1);
	        $this->load->view('admin/firm_fest_donations',$data);
		}else{
			redirect(base_url().'admin/login');
		}
    }
    public function firm_fest_donations_print(){
        if(isset($this->session->userdata['Admin_loggin']['admin_id']) && !empty($this->session->userdata['Admin_loggin']['admin_id'])){
	        if($_POST){
	             //print_r($_POST);
	            $from = $this->input->post('from'); 
	            $to = $this->input->post('to'); 
	            $data1 =array(
	        		'from'=> $this->input->post('from'),
	        		'to'=> $this->input->post('to')
	        	);
	        } else {
	            $data1 = array();
	        }
	        $data['firm_fest_donations'] = $this->admin_model->firm_fest_donations($data1);
	        $this->load->view('admin/firm_fest_donations_print',$data);
		}else{
			redirect(base_url().'admin/login');
		}
    }
    public function organiasations(){
        if(isset($this->session->userdata['Admin_loggin']['admin_id']) && !empty($this->session->userdata['Admin_loggin']['admin_id'])){
	        if($_POST){
	             //print_r($_POST);
	            $from = $this->input->post('from'); 
	            $to = $this->input->post('to'); 
	            $data1 =array(
	        		'from'=> $this->input->post('from'),
	        		'to'=> $this->input->post('to')
	        	);
	        } else {
	            $data1 = array();
	        }
	        $data['organiasations'] = $this->admin_model->organiasations($data1);
	        $this->load->view('admin/organiasations',$data);
		}else{
			redirect(base_url().'admin/login');
		}
    }
    public function location_report(){
        if(isset($this->session->userdata['Admin_loggin']['admin_id']) && !empty($this->session->userdata['Admin_loggin']['admin_id'])){
	        if($_POST){
	             //print_r($_POST);
	            $from = $this->input->post('from'); 
	            $to = $this->input->post('to'); 
	            $data1 =array(
	        		'from'=> $this->input->post('from'),
	        		'to'=> $this->input->post('to')
	        	);
	        } else {
	            $data1 = array();
	        }
	        $data['location_report'] = $this->admin_model->location_report($data1);
	        $this->load->view('admin/location_report',$data);
		}else{
			redirect(base_url().'admin/login');
		}
    }
    public function firm_location_report(){
        if(isset($this->session->userdata['Admin_loggin']['admin_id']) && !empty($this->session->userdata['Admin_loggin']['admin_id'])){
	        if($_POST){
	             //print_r($_POST);
	            $from = $this->input->post('from'); 
	            $to = $this->input->post('to'); 
	            $data1 =array(
	        		'from'=> $this->input->post('from'),
	        		'to'=> $this->input->post('to')
	        	);
	        } else {
	            $data1 = array();
	        }
	        $data['firm_location_report'] = $this->admin_model->firm_location_report($data1);
	        $this->load->view('admin/firm_location_report',$data);
		}else{
			redirect(base_url().'admin/login');
		}
    }
    public function age_report(){
        if(isset($this->session->userdata['Admin_loggin']['admin_id']) && !empty($this->session->userdata['Admin_loggin']['admin_id'])){
	        if($_POST){
	             //print_r($_POST);
	            $from = $this->input->post('from'); 
	            $to = $this->input->post('to'); 
	            $data1 =array(
	        		'from'=> $this->input->post('from'),
	        		'to'=> $this->input->post('to')
	        	);
	        } else {
	            $data1 = array();
	        }
	        $data['age_report'] = $this->admin_model->age_report($data1);
	        $this->load->view('admin/age_report',$data);
		}else{
			redirect(base_url().'admin/login');
		}
    }
    public function age_report_print(){
        if(isset($this->session->userdata['Admin_loggin']['admin_id']) && !empty($this->session->userdata['Admin_loggin']['admin_id'])){
	        if($_POST){
	             //print_r($_POST);
	            $from = $this->input->post('from'); 
	            $to = $this->input->post('to'); 
	            $data1 =array(
	        		'from'=> $this->input->post('from'),
	        		'to'=> $this->input->post('to')
	        	);
	        } else {
	            $data1 = array();
	        }
	        $data['age_report'] = $this->admin_model->age_report($data1);
	        $this->load->view('admin/age_report_print',$data);
		}else{
			redirect(base_url().'admin/login');
		}
    }
    public function sloka_report(){
        if(isset($this->session->userdata['Admin_loggin']['admin_id']) && !empty($this->session->userdata['Admin_loggin']['admin_id'])){
	        
	        $data['sloka_report'] = $this->admin_model->sloka_report();
	        $this->load->view('admin/sloka_report',$data);
		}else{
			redirect(base_url().'admin/login');
		}
    }
    public function firm_sloka_report(){
        if(isset($this->session->userdata['Admin_loggin']['admin_id']) && !empty($this->session->userdata['Admin_loggin']['admin_id'])){
	        
	        $data['firm_sloka_report'] = $this->admin_model->firm_sloka_report();
	        $this->load->view('admin/firm_sloka_report',$data);
		}else{
			redirect(base_url().'admin/login');
		}
    }
    public function fest(){
		if(isset($this->session->userdata['Admin_loggin']['admin_id']) && !empty($this->session->userdata['Admin_loggin']['admin_id'])){
            $data['fest'] = $this->admin_model->fest();
			$this->load->view('admin/fest',$data);
		}else{
			redirect(base_url().'admin/login');
		}
	}
    public function add_fest(){
		if(isset($this->session->userdata['Admin_loggin']['admin_id']) && !empty($this->session->userdata['Admin_loggin']['admin_id'])){
			$this->load->view('admin/add_fest');
		}else{
			redirect(base_url().'admin/login');
		}
	}
    public function addfest(){
		date_default_timezone_set('Asia/Kolkata');
		$date =  date("Y-m-d h:i:s");
		$fest= $this->input->post('fest');
		$d= $this->input->post('d');
		$data =array(
			'fest_date'=> isset($d)?$d:'',
			'fest_name'=> isset($fest)?$fest:'',
			'add_date'=>$date
		);
		$res = $this->admin_model->addfest($data);
        if($res){
            $this->session->set_flashdata('addfest','<div class="alert-success">Adding festival Successfully...</div>');
            redirect(base_url().'admin/add_fest');
        }else{
            $this->session->set_flashdata('addfest','<div class="alert">oops!,Adding festival Failed...</div>');
            redirect(base_url().'admin/add_fest');
        }
	}
	public function delete_fest($id){
	    $result = $this->admin_model->delete_fest($id);
	    if($result){
            $this->session->set_flashdata('fest','<div class="alert-success">Deleted festival Successfully...</div>');
            redirect(base_url().'admin/fest');
        }else{
            $this->session->set_flashdata('fest','<div class="alert">oops!,Delete festival Failed...</div>');
            redirect(base_url().'admin/fest');
        }
	}
	public function print_firm_fest_donations(){
        if(isset($this->session->userdata['Admin_loggin']['admin_id']) && !empty($this->session->userdata['Admin_loggin']['admin_id'])){
	        //ob_start();
	        $d= 0;
	        $data['firm_fest_donations'] = $this->admin_model->firm_fest_donations($d);
	        //print_r($data['firm_fest_donations']);exit;
    		$path = rtrim(FCPATH,"/");
    		//print_r($path);die;
    		$file_name = time().'.pdf';
    		$data['page_title'] = 'Certificate'; // pass data to the view
    		$pdfFilePath = $path."/assets/upload/".$file_name;
    		ini_set('memory_limit','320M'); // boost the memory limit if it's low <img src="https://s.w.org/images/core/emoji/72x72/1f609.png" alt="??" draggable="false" class="emoji">
    		$html=$this->load->view('admin/print_firm_fest_donations', $data,true); // render the view into HTML
    		$this->load->library('pdf');
    		$pdf = $this->pdf->load();
    		//$pdf->SetFooter($_SERVER['HTTP_HOST'].'|{PAGENO}|'.date('M-d-Y')); // Add a footer for good measure <img src="https://s.w.org/images/core/emoji/72x72/1f609.png" alt="??" draggable="false" class="emoji">
    		$pdf->SetDisplayMode('fullpage');
    		$pdf->list_indent_first_level = 0;	// 1 or 0 - whether to indent the first level of a list
    		$pdf->WriteHTML($html); // write the HTML into the PDF
    		$pdf->Output($pdfFilePath, 'I');
    		redirect(base_url()."assets/upload/".$file_name);
		}else{
			redirect(base_url().'admin/login');
		}
    }
	
		
    
}?>
