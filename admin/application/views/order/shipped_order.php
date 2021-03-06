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

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-bordered table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th class="text-center">Order Id</th>
                                        <th>Customer Name</th>
                                        <th class="text-center">Total Amount</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Order Type</th>
                                        <th class="text-center">Created At</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php  
                                    $this->db->or_where('delivered','2'); 
                                    foreach($this->db->get_where('payment',['delete_flag' => '0'])->result_array() as $key => $value){ ?>
                                        <tr>
                                            <td class="text-center"><?= $value['orderid'] ?></td>
                                            <td><?= $value['name'] ?></td>
                                            <td class="text-right"><?= $value['amount'] ?></td>
                                            <td class="text-center">
                                                <?php if($value['delivered'] == 0){?> 
                                                    <span class="badge badge-danger">Pending</span> 
                                                <?php }else if($value['delivered'] == 2){ ?>
                                                    <span class="badge badge-warning">Shipped</span> 
                                                <?php }else{ ?>
                                                    <span class="badge badge-success">Delivered</span> 
                                                <?php } ?>
                                            </td>
                                            <td class="text-center">
                                                <?php if($value['cod'] == 0){?> 
                                                    <span class="badge badge-primary">COD</span> 
                                                <?php }else{ ?>
                                                    <span class="badge badge-secondary">ONLINE</span> 
                                                <?php } ?>
                                            </td>
                                            <td class="text-center"><?= _vdatetime($value['created_at']) ?></td>
                                            <td class="text-center">

                                                <a class="btn btn-sm btn-secondary" href="<?= base_url();?>order/order_view/<?= $value['id'];?>" title="Order View">
                                                    <i class="fa fa-eye"></i>
                                                </a>

                                                <a class="btn btn-sm btn-warning" href="<?= base_url();?>order/traking_shipped/<?= $value['id'];?>" title="Tracking">
                                                    <i class="fa fa-truck"></i>
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
            "dom": "<'row'<'col-md-12 my-marD'B>><'row'<'col-md-6'l><'col-md-6'f>><'row'<'col-md-12't>><'row'<'col-md-6'i><'col-md-6'p>>",
            "columnDefs": [
                
                
                    { "orderable": false, "targets": [6] }
                    
                
            ],
            order : [],
            "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            buttons: [ 
                { 
                    extend: 'print',
                    title: '<?=$this->config->config["projectTitle"]?> <?php echo $page_title; ?>',
                    exportOptions: {
                        columns: [0,1,2,3,4,5]
                    }
                },
                { 
                    extend: 'pdf',
                    title: '<?=$this->config->config["projectTitle"]?> <?php echo $page_title; ?>',
                    exportOptions: {
                        columns: [0,1,2,3,4,5]
                    }
                },
                { 
                    extend: 'excel',
                    title: '<?=$this->config->config["projectTitle"]?> <?php echo $page_title; ?>',
                    exportOptions: {
                        columns: [0,1,2,3,4,5]
                    }
                }
            ]
            
        });
    })
</script>

