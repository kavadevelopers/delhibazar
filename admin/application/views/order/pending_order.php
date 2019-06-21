<title><?=$this->config->config["projectTitle"]?> | <?= $page_title; ?></title>

<section class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>Order Id</th>
                                    <th>Name</th>
                                    <th>Total Amount</th>
                                    <th>Order Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php foreach($order as $key => $value){ ?>
                                    <tr>
                                        <td><?= $value['orderid'] ?></td>
                                        <td><?= $value['name'] ?></td>
                                        <td><?= $value['amount']; ?></td>
                                        <td><?= date('d-m-Y H:i A',strtotime($value['created_at'])) ?></td>
                                        <td class="text-center">

                                                <a class="btn btn-sm btn-warning" href="<?= base_url();?>order/pending_order_view/<?= $value['id'];?>" title="Edit">
                                                    <i class="fa fa-eye"></i>
                                                </a>

                                                <a class="btn btn-sm btn-success" href="<?= base_url();?>order/pending_order_edit/<?= $value['id'];?>" title="Edit">
                                                    <i class="fa fa-edit"></i>
                                                </a>

                                                <a class="btn btn-sm btn-danger" href="<?= base_url();?>order/delete/<?= $value['id'];?>" onclick="return confirm('Are you Sure You Want to Delete this Order .?');" title="Delete">
                                                    <i class="fa fa-trash"></i>
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
            
            order : [],
            "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            buttons: [ 
                { 
                    extend: 'print',
                    title: '<?=$this->config->config["projectTitle"]?> <?= $page_title; ?>',
                    exportOptions: {
                        columns: [0,1,2,3]
                    }
                },
                { 
                    extend: 'pdf',
                    title: '<?=$this->config->config["projectTitle"]?> <?= $page_title; ?>',
                    exportOptions: {
                        columns: [0,1,2,3]
                    }
                },
                { 
                    extend: 'excel',
                    title: '<?=$this->config->config["projectTitle"]?> <?= $page_title; ?>',
                    exportOptions: {
                        columns: [0,1,2,3]
                    }
                }
            ]
            
        });
    })
</script>

