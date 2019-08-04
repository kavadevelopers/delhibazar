    <title><?=$this->config->config["projectTitle"]?> | <?php echo $page_title; ?></title>


    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><?php echo $page_title; ?></h1>
                </div>
                <div class="col-sm-6">
                    <h5 class="m-0 text-dark pull-right"><b>Name</b> : <?= $customer['first_name'].' '.$customer['last_name'] ?></h5>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-bordered table-striped table-sm text-center">
                                <thead>
                                    <tr>
                                        <th>Order Id</th>
                                        <th>Total Amount</th>
                                        <th>Status</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($this->db->get_where('payment',['user_id' => $customer['id']])->result_array() as $key => $value){ ?>
                                        <tr>
                                            <td><?= $value['orderid'] ?></td>
                                            <td><?= $value['amount'] ?></td>
                                            <td>
                                                <?php if($value['delivered'] == 0){?> 
                                                    <span class="badge badge-danger">Pending</span> 
                                                <?php }else{ ?>
                                                    <span class="badge badge-success">Delivered</span> 
                                                <?php } ?>
                                            </td>
                                            <td><?= _vdatetime($value['created_at']) ?></td>
                                            <td>
                                                <a class="btn btn-sm btn-secondary" href="<?= base_url();?>social_user/order_view/<?= $value['id'];?>" title="Order View">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php } ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </section>

<script type="text/javascript">
    $(function(){
        $('.table').DataTable({
            "dom": "<'row'<'col-md-6'l><'col-md-6'f>><'row'<'col-md-12't>><'row'<'col-md-6'i><'col-md-6'p>>",
            "columnDefs": [
                
                
                    { "orderable": false, "targets": [4] }
                    
                
            ],
            order : [],
            "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            
        });
    })
</script>

