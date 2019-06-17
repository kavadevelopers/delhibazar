	<div style="margin-top: 60px;">
            
    </div>   
    

    <div class="contact-about">
	    <div class="mdl-card mdl-shadow--2dp about">
	        <h4>Pay &#8377 <?php echo $amount; ?> To Continue</h4>
	        <p style="text-align: center; font-size:16px;"><strong>Please Note:</strong> This payment will be valid for the next 180 Days/6 Months.</p>

	        <form action="<?php echo $action; ?>/_payment" method="post" id="payuForm" name="payuForm">
                <input type="hidden" name="key" value="<?php echo $mkey; ?>" />
                <input type="hidden" name="hash" value="<?php echo $hash; ?>"/>
                <input type="hidden" name="txnid" value="<?php echo $tid; ?>" />
                
                <input class="form-control" type="hidden" name="amount" value="<?php echo $amount; ?>"  readonly/>
                
                <input class="form-control" type="hidden" name="firstname" id="firstname" value="<?php echo $name; ?>" readonly/>
            
                <input class="form-control" type="hidden" name="email" id="email" value="<?php echo $mailid; ?>" readonly/>
                
                <input class="form-control" type="hidden" name="phone" value="<?php echo $phoneno; ?>" readonly />
            
                <input class="form-control" type="hidden" name="productinfo" value="<?php echo $productinfo; ?>" readonly>
            
                <input class="form-control" type="hidden" name="address1" value="<?php echo $address; ?>" readonly/>     
            
                <input name="surl" value="<?php echo $sucess; ?>" size="64" type="hidden" />
                <input name="furl" value="<?php echo $failure; ?>" size="64" type="hidden" />  
                <!--for test environment comment  service provider   -->
                <input type="hidden" name="service_provider" value="payu_paisa" size="64" />
                <input name="curl" value="<?php echo $cancel; ?> " type="hidden" />
                

                <div class="account-data">
	               <center>
	                    <span class="line-height">
	                        <button style="width:200px;" type="submit" class="mdl-button mdl-js-button mdl-button--primary mdl-button--raised" href="users.html">Pay And Continue</button>
	                    </span>
	                </center>
	            </div>
                
            </form> 

            

	    </div>

	</div>
        			
        
