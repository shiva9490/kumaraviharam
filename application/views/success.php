</head>
<style>#tab > a{ background-color:#2a9da7; color:#fff; }.thank-col div{vertical-align: top;}</style>
<body>
    <div class="fluidbody">
        <div id="headerpage"></div>
        <div class="psrtcolm">
        	<div class="container">
                <div class="thank-col">
                    <div>
                        <img class="img-responsive" style="display: -webkit-inline-box;" src="<?php echo base_url();?>assets/images/logo.png" alt=""><br>
                        <h2>Thank You!</h2>
                        <h4>KumaraViharam team, would like to thank you for your generous donation. 
                            <br>We are grateful for your commitment and spirit of giving. </h4>
                        <p>Your support has allowed us to promote Vedic tradition for the future generations, along with imporvement of Saiva Kshetram as per existing customs and formalities.</p>
                        <?php foreach($donation as $d){
                        if($d->general_donation !="0.00"){?>
                            <a target="_blank" href="<?php echo base_url();?>Certificate/1/<?php echo $this->uri->segment(2); ?>">General Donation Certificate</a><br>
                        <?php } ?>
                        <?php if($d->temple_stone != "0.00"){ ?>
                            <a target="_blank" href="<?php echo base_url();?>Certificate/2/<?php echo $this->uri->segment(2); ?>">Temple Stone Certificate</a><br>
                        <?php } ?>
                        <?php if($d->temple_flooor != "0.00"){ ?>
                            <a target="_blank" href="<?php echo base_url();?>Certificate/3/<?php echo $this->uri->segment(2); ?>">Temple Floor Area Certificate</a><br>
                        <?php } ?>
                        <?php if($d->sloka != "0.00"){ ?>
                            <a target="_blank" href="<?php echo base_url();?>Certificate/4/<?php echo $this->uri->segment(2); ?>">Sloka Certificate</a>
                        <?php } ?>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>