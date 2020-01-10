<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="container">

            <div class="banner_content text-center">
                <h2 style="padding: 50px 0;">Payment Checkout</h2>
            </div>

        </div>
    </div>
</section>

<section class="sample-text-area">
    <div class="container">
    
        <form action="<?= $action; ?>/_payment" method="post" id="payuForm" name="payuForm">

                <div class="banner_content text-center">
                    <h2 style="padding: 50px 0;">Payment Checkout</h2>
                    
                    <h4>Pay &#8377 <?= $amount; ?> To Continue</h4>
                    <p style="text-align: center; font-size:16px;"><strong>Please Note:</strong> This payment will be valid for the next 180 Days/6 Months.</p>
                </div>

                <input type="hidden" name="key" value="<?= $mkey; ?>" />
                <input type="hidden" name="hash" value="<?= $hash; ?>"/>
                <input type="hidden" name="txnid" value="<?= $tid; ?>" />
                
                <input class="form-control" type="hidden" name="amount" value="<?= $amount; ?>"  readonly/>
                
                <input class="form-control" type="hidden" name="firstname" id="firstname" value="<?= $name; ?>" readonly/>
            
                <input class="form-control" type="hidden" name="email" id="email" value="<?= $mailid; ?>" readonly/>
                
                <input class="form-control" type="hidden" name="phone" value="<?= $phoneno; ?>" readonly />
            
                <input class="form-control" type="hidden" name="productinfo" value="<?= $productinfo; ?>" readonly>
            
                <input class="form-control" type="hidden" name="address1" value="<?= $address1; ?>" readonly/>     
                
                <input class="form-control" type="hidden" name="address2" value="<?= $address2; ?>" readonly/>     
                
                <input class="form-control" type="hidden" name="city" value="<?= $city; ?>" readonly/>     
                
                <input class="form-control" type="hidden" name="country" value="<?= $country; ?>" readonly/>     
                
                <input class="form-control" type="hidden" name="zipcode" value="<?= $zipcode; ?>" readonly/>     


                <input class="form-control" type="hidden" name="udf1" value="<?= $udf1; ?>" readonly/>     
                <input class="form-control" type="hidden" name="udf2" value="<?= $udf2; ?>" readonly/>     
                <input class="form-control" type="hidden" name="udf3" value="<?= $udf3; ?>" readonly/>     
                <input class="form-control" type="hidden" name="udf4" value="<?= $udf4; ?>" readonly/>     
                <input class="form-control" type="hidden" name="udf5" value="<?= $udf5; ?>" readonly/>     
            
                
                <input name="surl" value="<?= $sucess; ?>" size="64" type="hidden" />
                <input name="furl" value="<?= $failure; ?>" size="64" type="hidden" />  
                <!--for test environment comment  service provider   -->
                <input type="hidden" name="service_provider" value="payu_paisa" size="64" />
                <input name="curl" value="<?= $cancel; ?> " type="hidden" />
                
                <div class="row text-center">
                    <div class="creat_account" style="margin: 0 auto;">
                            <input type="checkbox" id="f-option23" name="" value="1" style="height: auto !important; float: left; margin: 5px;" required>
                                <label for="f-option23">I accept <a href="<?= base_url('pages/terms') ?>" target="_blank" style="display: inline;">terms and conditions</a></label>
                    </div>
                </div>
                
                <div class="account-data">
                   <center>
                        <span class="line-height">
                            <button style="width:200px;" type="submit" class="btn btn-danger">Pay And Continue</button>
                        </span>
                    </center>
                </div>

            </form>

    </div>
</section>

<style type="text/css">
    .btn-danger
    {
        background-color: #c5322d;
        border-color: #dc3545;
    }
    .btn-danger:hover
    {
        background-color: #c5322d;
        border-color: #dc3545;
    }
</style>

