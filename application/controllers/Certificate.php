<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Certificate extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('User_model');
	}
	public function index($id = false){
	    /*print_r($this->uri->segment(2));
	    print_r($this->uri->segment(3));exit;*/
		/*//ob_start();
		$path = rtrim(FCPATH,"/");
		//print_r($path);die;
		$file_name = time().'.pdf';
		$data['page_title'] = 'Certificate'; // pass data to the view
		$pdfFilePath = $path."/assets/upload/".$file_name;
		ini_set('memory_limit','320M'); // boost the memory limit if it's low <img src="https://s.w.org/images/core/emoji/72x72/1f609.png" alt="??" draggable="false" class="emoji">
		$html=$this->load->view('file', $data,true); // render the view into HTML
		$this->load->library('pdf');
		$pdf = $this->pdf->load();
		//$pdf->SetFooter($_SERVER['HTTP_HOST'].'|{PAGENO}|'.date('M-d-Y')); // Add a footer for good measure <img src="https://s.w.org/images/core/emoji/72x72/1f609.png" alt="??" draggable="false" class="emoji">
		$pdf->SetDisplayMode('fullpage');
		$pdf->list_indent_first_level = 0;	// 1 or 0 - whether to indent the first level of a list
		$pdf->WriteHTML($html); // write the HTML into the PDF
		$pdf->Output($pdfFilePath, 'I');
		redirect(base_url()."assets/upload/".$file_name);*/
		$data['cat'] = $this->uri->segment(2);
		 $d= $this->User_model->donation_details($this->uri->segment(3));
		if(count($d) >0){
		    $data['donation'] =$d;
		    $this->load->view('file',$data);
		}else{
		    $this->load->view('error');
		}
		
	}
}
