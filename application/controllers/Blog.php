<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once(APPPATH . 'controllers/Header.php');
class Blog extends Frontend
{
	public function __construct()
    {
        parent::__construct();
         $this->load->library("pagination");
    }
	public  function index(){
		$config = array();
		$config["base_url"] = base_url() . "blog";
		$total_row = $this->db->select('count(blog_id) as total')->from('blog')->where('blog_status',1)->get()->result();
		$config["total_rows"] = $total_row[0]->total;
		$config["per_page"] = 12;
		$config['full_tag_open'] = '<ul class="pagination custom-pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = '« First';
		$config['first_tag_open'] = '<li class="prev page">';
		$config['first_tag_close'] = '</li>'; 
		$config['last_link'] = 'Last »';
		$config['last_tag_open'] = '<li class="next page">';
		$config['last_tag_close'] = '</li>'; 
		$config['next_link'] = 'Next →';
		$config['next_tag_open'] = '<li class="next page">';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = '← Previous';
		$config['prev_tag_open'] = '<li class="prev page" style="width: auto;">';
		$config['prev_tag_close'] = '</li>'; 
		$config['cur_tag_open'] = '<li class="active"><a href="">';
		$config['cur_tag_close'] = '</a></li>'; 
		$config['num_tag_open'] = '<li class="page">';
		$config['num_tag_close'] = '</li>';
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(2)) ? ($this->uri->segment(2)) : 0;
		$data['blog']=$this->User_model->get_blog($config["per_page"], $page);
		$str_links = $this->pagination->create_links();
		$data["links"] = explode('&nbsp;',$str_links);
		$this->load->view('blog',$data);
		$this->load->view('footer');
	}
	public function blog_details($blog_tag){
		$id = $this->db->query("SELECT * FROM `blog` where blog_url = '$blog_tag'")->result();
		if(count($id)){
			$data['ids'] = $id[0]->blog_id;
			$data['blog_details'] = $this->User_model->blog_details($id[0]->blog_id);
			$data['blog_list'] = $this->User_model->blog_list($id[0]->blog_id);
			$data['blog_comment'] = $this->User_model->blog_comment($id[0]->blog_id);
			$this->load->view('blog_details',$data);
			$this->load->view('footer',$data);
		}else{
			redirect(base_url().'blog');
		}
	}
	public function add_comment(){
		if(!empty($_POST)){
			$data = array(
				'blog_id'=>isset($_POST['id'])?$_POST['id']:'',
				'name'=>isset($_POST['name'])?$_POST['name']:'',
				'email'=>isset($_POST['email'])?$_POST['email']:'',
				'mobile'=>isset($_POST['mobile'])?$_POST['mobile']:'',
				'blog_comment'=>isset($_POST['blog_comment'])?$_POST['blog_comment']:'',
				'blog_com_add_date'=>date('Y-m-d H:i:s'),
			);
			$result = $this->User_model->add_comment($data);
			if($result >0){
				$this->session->set_flashdata('add_comment', 'Thq for commenting...');
				redirect($_SERVER['HTTP_REFERER']);
			}else{
				$this->session->set_flashdata('add_comment', 'Update Profile Succfully');
				redirect($_SERVER['HTTP_REFERER']);
			}
		}else{
			redirect($_SERVER['HTTP_REFERER']);
		}
	}
}