<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once(APPPATH . 'controllers/Header.php');
class Success extends Frontend{
	public function __construct(){
        parent::__construct();
        $this->load->library('Pdf');
    }
    public  function index($id = false){
        $data['donation'] = $this->User_model->donation_details($id);
        $this->load->view('success',$data);
		$this->load->view('footer');
    }
    /*public function downaload($id = false){
        $data = array();            
        $htmlContent='';
        //$data['getInfo'] = $this->createpdf->getContent();
        $htmlContent = $this->load->view('file', TRUE);
        $createPDFFile = time().'.pdf';
        $this->createPDF(base_url().'assets/upload/'.$createPDFFile, $htmlContent);
        redirect(base_url().'assets/upload/'.$createPDFFile);
    }*/
    
    public function certificate(){
        $this->load->view('file');
    }
    public function downaload($id = false){
		ob_start();
		$path = rtrim(FCPATH,"/");
		//print_r($path);die;
		$file_name = time().'.pdf';  
		$data['cat'] = 1;
		$data['donation'] = $this->User_model->donation_details($this->uri->segment(3));
		$data['page_title'] = 'procedure'; // pass data to the view
		$pdfFilePath = $path."/assets/upload/".$file_name;
		ini_set('memory_limit','320M'); // boost the memory limit if it's low <img src="https://s.w.org/images/core/emoji/72x72/1f609.png" alt="??" draggable="false" class="emoji">
		//$html= $this->load->view('file', $data,true); // render the view into HTML
		$stylesheet = file_get_contents(base_url().'assets/cer.css');
        
		$html ='';
		$html ='<!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="utf-8">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta name="viewport" content="width=device-width, initial-scale=1">
                    <link rel="shortcut icon" href="images/favicon.png" type="text/css">
                    <link rel="stylesheet" href="'.base_url().'assets/cer.css">
                </head>
		        <style>
                    .certban{ position:relative; }
                    .certban > div{ overflow:hidden; }
                    .certban img{ width:100%; }
                    .certban:before{ position:absolute; content:""; background-color:rgba(0,0,0,0.0); left:0; right:0; top:0; bottom:0; }
                    .certext{  text-align:center; position:absolute; width:100%; top:20px;  padding:20px; }	
                    .certext h1{margin:0;padding:10px 0px 0px 0px;font-size:60px;text-align:center;font-family:"Old English Five", "Old English Text MT";}
                    .certext h2{color:#333;margin:0;padding:12px 0px 0px 0px;font-size:32px;font-family:"Edwardian Script ITC";font-weight:bold;}
                    .certext h2 span{color:#1b70b0;margin:0;padding:12px 0px 0px 0px;font-size:32px;
                    font-family:"Edwardian Script ITC"; font-weight:bold;}
                    .certext h3{color:#b3811e;margin:0;padding:10px 0px 0px 0px;font-size:30px; font-family:Georgia, "Times New Roman", Times, serif; font-weight:600;}
                    .certext h4{color:#1075bb;margin:0;padding:20px 0px 0px 0px;font-size:30px; font-family:Arial, Helvetica, sans-serif;
                    text-transform:uppercase; font-weight:600;}
                    .certext h5{color:#333;margin:0;padding:10px 0px 0px 0px;font-size:26px; font-weight:500; font-family:Georgia, "Times New Roman", Times, serif;}
                    .text-vertical-center { display: table-cell; vertical-align: middle; }
                </style>
                    <div class="fluidbody">
                        <div id="headerpage"></div>
                            <div class="psrtcolm">
                            	<div class="container">
                                    <div class="row">  
                                        <div class="col-sm-12" style="padding:10px 0px 0px 20px;">
                                             <div class="row">
                                                <div class="col-sm-12">
                                                   <div class="certban">
                                                        <img class="img-responsive" src="'.base_url().'assets/images/certificate.jpg" alt="">
                                                		<div class="container">
                                                            <div class="certext">
                                                            	<h1 style="color:#1075bb;margin:0;padding:10px 0px 0px 0px;font-size:60px;text-align:center;font-family:"Old English Five", "Old English Text MT";">Certificate of appreciation</h1>
                                                    			<h2>Presented to</h2>
                                                                <h3 style="text-transform: uppercase;">Shiva</h3>
                                                                <h2>In appreciation of your generous donation to the development of</h2>
                                                                <h4>Kumara Viharam</h4>
                                                                <h5>Srisailam</h5>
                                                                <h2>We express our thanks with the blessings of their Holiness<br>
                                                                    Sri Sri Jagadguru Shankaracharya Mahasamstanam Dakshinamaya,<br>
                                                                    Sri Sharada Peetham, Sringeri, for your contribution<br>
                                                                    in support of <span>Sloka</span> in accomplishing  <span>Shaiva Kshetra.</span></h2>
                                                            </div>
                                                    	</div>
                                            		</div> 
                                               	</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>  
                    </div>
                </body>
            </html>';
        print_r($html);exit;
        //$content = ob_get_clean();
		$this->load->library('pdf');
		$pdf = $this->pdf->load();
		$pdf->SetDisplayMode('fullpage');
		$pdf->list_indent_first_level = 0;	// 1 or 0 - whether to indent the first level of a list
		$pdf->SetFooter($_SERVER['HTTP_HOST'].'|{PAGENO}|'.date(DATE_RFC822));
		$pdf = new mPDF();
		$pdf->WriteHTML($stylesheet,1);
		$pdf->WriteHTML($html); // write the HTML into the PDF
		print_r($pdf->Output()); exit;
		$pdf->Output($pdfFilePath, 'I');
		
		redirect(base_url()."assets/upload/".$file_name);
	}

}