<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome to Kumara Viharam</title>
    <link rel="shortcut icon" href="images/favicon.png" type="text/css">
</head>
<style type="text/css" media="print">
  @page { size: A4 landscape;margin:0; }
</style>
<style>
.certban{ position:relative; }
.certban > div{ overflow:hidden; }
.certban img{ width:100%; height:100%;}
.certban:before{ position:absolute; content:''; background-color:rgba(0,0,0,0.0); left:0; right:0; top:0; bottom:0; }

.certext{  text-align:center; position:absolute; width:100%; top:20px;  padding:20px; }	
.certext h1{/* color:#1075bb; */margin:0;padding:10px 0px 0px 0px;font-size:55px;text-align:center;font-family:"Old English Five", "Old English Text MT";}

.certext h2{color:#333;margin:0;padding:12px 0px 0px 0px;font-size:28px;font-family:"Edwardian Script ITC";font-weight:bold;}
.certext h2 span{color:#1b70b0;margin:0;padding:12px 0px 0px 0px;font-size:32px;
font-family:"Edwardian Script ITC"; font-weight:bold;}
.certext h3{color:#b3811e;margin:0;padding:10px 0px 0px 0px;font-size:30px; font-family:Georgia, "Times New Roman", Times, serif; font-weight:600;}
.certext h4{color:#1075bb;margin:0;padding:20px 0px 0px 0px;font-size:30px; font-family:Arial, Helvetica, sans-serif;
text-transform:uppercase; font-weight:600;}

.certext h5{color:#333;margin:0;padding:10px 0px 0px 0px;font-size:26px; font-weight:500; font-family:Georgia, "Times New Roman", Times, serif;}
.text-vertical-center { display: table-cell; vertical-align: middle; }
</style>
<body>

    <div class="fluidbody">
        <div id="headerpage"></div>
            <div class="psrtcolm">
                <?php //echo $cat;?>
                <?php foreach($donation as $d){?>
            	<div class="container">
                    <div class="row">  
                        <div class="col-sm-12" style="padding:10px 0px 0px 20px;">
                             <div class="row">
                                <div class="col-sm-12">
                                   <div class="certban">
                                		<div class="container">
                                            <div class="certext">
                                            	<h1 style="color:#1075bb;margin:0;padding:10px 0px 0px 0px;font-size:60px;text-align:center;font-family:'Old English Five', 'Old English Text MT';">Certificate of appreciation</h1>
                                    			<h2>Presented to</h2>
                                                <h3 style="text-transform: uppercase;"><?php echo $d->Certificate;?></h3>
                                                <h2>In appreciation of your generous donation to the development of</h2>
                                                <h4>Kumara Viharam</h4>
                                                <h5>Srisailam</h5>
                                                <h2>We express our thanks with the blessings of their Holiness<br>
                                    Sri Sri Jagadguru Shankaracharya Mahasamstanam Dakshinamaya,<br>
                                    Sri Sharada Peetham, Sringeri, for your contribution<br>
                                    in support of <span><?php if($cat ==1){?>
                                                        General Donation
                                                        <?php }elseif($cat ==2){?>
                                                        Temple Stone 
                                                        <?php }elseif($cat ==3){?>
                                                        Temple Floor Area
                                                        <?php }elseif($cat ==4){?>
                                                        Sloka Plate
                                                        <?php } ?>
                                                        </span> 
                                                        in accomplishing  <span>Shaiva Kshetra.</span></h2>
                                                
                                            </div>
                                    	</div>
                            		<img class="img-responsive" src="<?php echo base_url();?>assets/images/certificate.jpg" alt="">
                            		</div> 
                               	</div>
                            </div>
                        </div>
                    </div>
                </div>        
                <?php } ?>
            </div>
        </div>  
    </div>
<script src="<?php echo base_url();?>assets/js/jquery-3.2.1.js"></script>
<script>
    $(document).ready(function(){
        window.print();
        return false;
    });
    
    $(".action-button").click( function()
       {
         alert('button clicked');
       }
    );
</script>
<script type="text/javascript">
    window.print();
    window.onfocus=function(){ window.close();}
</script>
</body>
</html>
