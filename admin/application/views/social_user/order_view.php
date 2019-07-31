<title><?=$this->config->config["projectTitle"]?> | <?php echo $page_title; ?></title>


<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark"><?php echo $page_title; ?></h1>
            </div>
        </div>
    </div>
</div>



<section class="content">
    <div class="container-fluid">
        <form method="post" action="#" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-12">

                    <div class="card card-secondary"> 
                        <div class="card-header">
                            <h3 class="card-title">Order Detail</h3>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                
                                <div class="col-md-6">
                                    <table class="table table-bordered table-striped">
                                        
                                        <tbody>
                                            <tr>
                                                <td class="text-bold">Order Id</td>
                                                <td><?= $order[0]['orderid'] ?></td>
                                            </tr>
                                            <tr>
                                                <td class="text-bold">Name</td>
                                                <td><?= $order[0]['name'] ?></td>
                                            </tr>
                                            <tr>
                                                <td class="text-bold">Address1</td>
                                                <td><?= nl2br($order[0]['address1']); ?></td>
                                            </tr>
                                            <tr>
                                                <td class="text-bold">Address2</td>
                                                <td><?= nl2br($order[0]['address2']); ?></td>
                                            </tr>
                                            <tr>
                                                <td class="text-bold">City</td>
                                                <td><?= $order[0]['city'] ?></td>
                                            </tr>
                                            <tr>
                                                <td class="text-bold">District</td>
                                                <td><?= $order[0]['district'] ?></td>
                                            </tr>
                                            <tr>
                                                <td class="text-bold">Zipcode</td>
                                                <td><?= $order[0]['zipcode'] ?></td>
                                            </tr>
                                            <tr>
                                                <td class="text-bold">Email</td>
                                                <td><?= $order[0]['email'] ?></td>
                                            </tr>
                                            <tr>
                                                <td class="text-bold">Phone</td>
                                                <td><?= $order[0]['phone'] ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                

                                <div class="col-md-6">
                                   
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Product Name</th>
                                                <th>Quantity</th>
                                                <th>Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        

                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td class="text-bold" colspan="3" style="text-align: right"><?= $order[0]['amount'] ?></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>                                
                            </div>
                        </div>

                    </div>

                    
                    
                </div>
            </div>
        </form>    
    </div>
</section>

    
