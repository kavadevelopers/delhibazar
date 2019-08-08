<title><?=$this->config->config["projectTitle"]?> | <?= $page_title; ?></title>


<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark"><?= $page_title; ?></h1>
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
                            
                                
                            <div class="col-md-12">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Order Id </th>
                                        <td> <?= $order[0]['orderid'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Transaction Id </th>
                                        <td> <?= $order[0]['txnid'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Status </th>
                                        <td>
                                            <?php if($order[0]['delivered'] == 0){?> 
                                                    <span class="badge badge-danger">Pending</span> 
                                                <?php }else if($order[0]['delivered'] == 2){ ?>
                                                    <span class="badge badge-warning">Shipped</span> 
                                                <?php }else{ ?>
                                                    <span class="badge badge-success">Delivered</span> 
                                                <?php } ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>Order Type</th>
                                        <td>
                                            <?php if($order[0]['cod'] == 0){?> 
                                                <span class="badge badge-primary">COD</span> 
                                            <?php }else{ ?>
                                                <span class="badge badge-secondary">ONLINE</span> 
                                            <?php } ?>
                                        </td>
                                    </tr>
                                </table>
                            </div>  

                            <div class="col-md-3"></div>

                            <div class="col-md-6">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Name </th>
                                        <td> <?= $order[0]['name'] ?></td>
                                    </tr>

                                    <tr>
                                        <th>Phone </th>
                                        <td> <?= $order[0]['phone'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Email </th>
                                        <td> <?= $order[0]['email'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Address1 </th>
                                        <td> <?= $order[0]['address1'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Address2 </th>
                                        <td> <?= $order[0]['address2'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Zipcode </th>
                                        <td> <?= $order[0]['zipcode'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>City </th>
                                        <td> <?= $order[0]['city'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>District </th>
                                        <td> <?= $order[0]['district'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Country </th>
                                        <td> <?= $order[0]['country'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Order Notes </th>
                                        <td> <?= nl2br($order[0]['message']) ?></td>
                                    </tr>
                                </table>
                            </div>

                            <div class="col-md-3"></div>

                            
                            <div class="col-md-12">
                                <h3 class="text-center"><u>Product Detail</u></h3>
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
                                        <?php 
                                            $sub_total = 0;
                                            $count = count(explode(',', $order[0]['quantity']));
                                            $qty_array          = explode(',', $order[0]['quantity']);
                                            $pro_id_Array       = explode(',', explode('^~^', $order[0]['product_id'])[0]);
                                            $price_Array        = explode(',', explode('^~^', $order[0]['product_id'])[1]);
                                            $size               = explode(',', $order[0]['size']);

                                        ?>
                                        <?php for($i = 0;$i < $count;$i++){  ?>

                                            <tr>
                                                <td>
                                                    <?= $this->product_model->product_id_where($pro_id_Array[$i])[0]['name'] ?> 
                                                    <?php if(!empty($size[$i])){ ?>
                                                        - <?= $size[$i] ?>
                                                    <?php } ?>
                                                </td>
                                                <td><?= $qty_array[$i] ?></td>
                                                <td><?= $price_Array[$i] ?></td>
                                                <td class="text-right">
                                                    <?php $sub_total += $qty_array[$i] * $price_Array[$i]; ?>
                                                    <?= $qty_array[$i] * $price_Array[$i] ?>
                                                </td>
                                            </tr>
                                            
                                        <?php } ?>
                                        
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <th class="text-right">Sub Total :</th>
                                            <td colspan="2" class="font-weight-bold text-right"> <?= $sub_total ?></td>
                                        </tr>
                                        <?php if($order[0]['coupon_id'] != ',,'){ ?>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <th class="text-right">Coupon : </th>
                                                <td colspan="2" class="font-weight-bold text-right">
                                                    
                                                    <?php if(explode(',', $order[0]['coupon_id'])[2] == 'percentage'){ ?>        
                                                        <?= '% '.explode(',', $order[0]['coupon_id'])[1] ?>
                                                    <?php }else if(explode(',', $order[0]['coupon_id'])[2] == 'amount'){ ?>
                                                        <?= '- '.explode(',', $order[0]['coupon_id'])[1] ?>
                                                    <?php }else if(explode(',', $order[0]['coupon_id'])[2] == 'price'){ ?>
                                                        <?= '- '.explode(',', $order[0]['coupon_id'])[1] ?>
                                                    <?php } ?>

                                                </td>
                                            </tr>
                                        <?php } ?>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <th class="text-right">Total :</th>
                                            <td colspan="2" class="font-weight-bold text-right"> <?= $order[0]['amount'] ?></td>
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