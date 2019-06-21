<title><?=$this->config->config["projectTitle"]?> | <?= $page_title; ?></title>


<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">View Order</h1>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card card-secondary"> 
                    <div class="card-header">
                        <h3 class="card-title">Order Detail</h3>
                    </div>

                    <div class="card-body">
                        <div class="row">
                        	
                        		
                		<div class="col-md-4">
                    			<p><label>Order Id</label>     : <?= $order[0]['orderid'] ?></p>
                    			<p><label>Transaction Id</label>     : <?= $order[0]['txnid'] ?></p>
                    			<hr>
                    			<p><label>Name</label>     : <?= $order[0]['name'] ?></p>
                    			<p><label>Phone</label>     : <?= $order[0]['phone'] ?></p>
                    			<p><label>Email</label>     : <?= $order[0]['email'] ?></p>
                    			<p><label>Address1</label> : <?= $order[0]['address1'] ?></p>
                    			<p><label>Address2</label> : <?= $order[0]['address2'] ?></p>
                    			<p><label>Zipcode</label>  : <?= $order[0]['zipcode'] ?></p>
                    			<p><label>City</label>  : <?= $order[0]['city'] ?></p>
                    			<p><label>District</label>  : <?= $order[0]['district'] ?></p>
                    			<p><label>Country</label>  : <?= $order[0]['country'] ?></p>
                    		</div>	
                    		
                    		<div class="col-md-8">
                    			<h6 class="text-center"><u>Product Detail</u></h6>
                    			<table class="table table-bordered table-striped table-sm">
			                        <thead>
			                            <tr>
			                                <th>Product Name</th>
                                            <th>Quantity</th>
			                                <th>Price</th>
			                                <th>Amount</th>
			                            </tr>
			                        </thead>
			                        <tbody>
                                        <?php $product_ids = explode('^~^',$order[0]['product_id'])[0];$product_amount = explode('^~^',$order[0]['product_id'])[1]; ?>
			                        	<?php $count_pro = count(explode(',',$order[0]['quantity'])); ?>
			                        	<?php for($i = 0;$i < $count_pro;$i++){  ?>

                                            <tr>
                                                <td><?= $this->product_model->product_id_where(explode(',', $product_ids)[$i])[0]['name'] ?></td>
                                                <td><?= explode(',', $order[0]['quantity'])[$i] ?></td>
                                                <td><?= explode(',', $product_amount)[$i] ?></td>
                                                <td>
                                                    <?= explode(',', $order[0]['quantity'])[$i] * explode(',', $product_amount)[$i] ?>
                                                        
                                                </td>
                                            </tr>
			                        		
			                        	<?php } ?>
			                            
			                        </tbody>
			                        <tfoot>
			                            <tr>
			                                <td></td>
                                            <td></td>
			                                <td></td>
			                                <td colspan="2" class="font-weight-bold">Total : <?= $order[0]['amount'] ?></td>
			                            </tr>
			                        </tfoot>
			                    </table>
                    		</div>	
                        	
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style type="text/css">
	.col-md-4 > p {
		margin-bottom: 0; 
		font-size: 13px;
	}
</style>