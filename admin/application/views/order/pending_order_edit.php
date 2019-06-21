<title><?=$this->config->config["projectTitle"]?> | <?= $page_title; ?></title>


<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit Order</h1>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <form method="post" action="<?= base_url(); ?>order/update_pendin_order" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-12">

                    <div class="card card-secondary"> 
                        <div class="card-header">
                            <h3 class="card-title">Order Detail</h3>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Transaction Id</label>
                                        <input class="form-control form-control-sm" value="<?= set_value('txnid',$order[0]['txnid']); ?>" type="text" name="txnid" placeholder="Transaction Id" autocomplete="off" readonly>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Order Id</label>
                                        <input class="form-control form-control-sm" value="<?= set_value('orderid',$order[0]['orderid']); ?>" type="text" name="orderid" placeholder="Order Id" autocomplete="off" readonly>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Name <span class="astrick">*</span></label>
                                        <input class="form-control form-control-sm" value="<?= set_value('name',$order[0]['name']); ?>" type="text" name="name" placeholder="Name" >
                                        <?= form_error('name'); ?>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>City <span class="astrick">*</span></label>
                                        <input class="form-control form-control-sm" value="<?= set_value('city',$order[0]['city']); ?>" type="text" name="city" placeholder="City" >
                                        <?= form_error('city'); ?>
                                    </div>
                                </div>

                                 <div class="col-md-4">
                                    <div class="form-group">
                                        <label>District <span class="astrick">*</span></label>
                                        <input class="form-control form-control-sm" value="<?= set_value('district',$order[0]['district']); ?>" type="text" name="district" placeholder="District" >
                                        <?= form_error('district'); ?>
                                    </div>
                                </div>
                                
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Country <span class="astrick">*</span></label>
                                        <input class="form-control form-control-sm" value="<?= set_value('country',$order[0]['country']); ?>" type="text" name="country" placeholder="Country" >
                                        <?= form_error('country'); ?>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Zipcode <span class="astrick">*</span></label>
                                        <input class="form-control form-control-sm" value="<?= set_value('zipcode',$order[0]['zipcode']); ?>" type="text" name="zipcode" placeholder="Zipcode" >
                                        <?= form_error('zipcode'); ?>
                                    </div>
                                </div>
                                
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Email <span class="astrick">*</span></label>
                                        <input class="form-control form-control-sm" value="<?= set_value('email',$order[0]['email']); ?>" type="email" name="email" placeholder="Email" >
                                        <?= form_error('email'); ?>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Phone <span class="astrick">*</span></label>
                                        <input class="form-control form-control-sm" value="<?= set_value('phone',$order[0]['phone']); ?>" type="text" name="phone" placeholder="Phone" >
                                        <?= form_error('phone'); ?>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Address1 <span class="astrick">*</span></label>
                                        <textarea type="text" class="form-control form-control-sm" name="address1" placeholder="Address1"><?= set_value('address1',$order[0]['address1']) ?></textarea>
                                        <?= form_error('address1'); ?>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Address2 <span class="astrick">*</span></label>
                                        <textarea type="text" class="form-control form-control-sm" name="address2" placeholder="Address2"><?= set_value('address2',$order[0]['address2']) ?></textarea>
                                        <?= form_error('address2'); ?>
                                    </div>
                                </div>

                               <input type="hidden" name="id" value="<?= set_value('id',$order[0]['id']); ?>">
                            </div>
                        </div>
                        
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered table-striped table-sm">
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Quantity</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td></td>
                                <td></td>
                                <td colspan="2" class="font-weight-bold">Total : <?= $order[0]['amount'] ?></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card card-secondary"> 
                        <div class="card-footer">
                            <div class="float-right">
                                <a href="<?= base_url(); ?>agent" class="btn btn-danger">Cancel</a>
                                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i>&nbsp;Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </form>    
    </div>
</section>

