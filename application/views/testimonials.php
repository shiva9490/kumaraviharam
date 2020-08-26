<style>#testimonitab > a{ background-color:#2a9da7; color:#fff; }</style>
<div class="fluidbody">
<div id="headerpage"></div>

<div class="pagebanner">
	<img class="img-responsive" src="<?php echo base_url();?>assets/images/inner/testimonials.jpg" alt="">
</div>
<div class="psrtcolm">
	<div class="container">  
    <div class="row"> 
    <div class="col-sm-10 col-sm-offset-1">
    <h2>Testimonials</h2><br>
     
     <h2>Aim & objective : </h2> 
     <p>Development of the Proposed Lord Senani Subrahmanya Swamy Temple and allied works at Srisailam as per Hindu mythology and promoting Vedic Traditions and Vedic educational institutions for the future generations along with improvement of Saiva Kshetra as per existing customs and formalities in the form of Sculptures, engraved pictures, Gopurams and Mandapas ”</p><br>
		<?php if(count($testimonials) > 0){
				$i=1;foreach($testimonials as $r){
		?>
		<h2><?php echo $i;?>.<?php echo $r->title;?> :</h2>
		<?php echo $r->desc;?><br>
		
		<?php $i++; } } ?>
		
     
   </div>
   </div>
  </div> 
    
    
</div>
