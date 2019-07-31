<?php 
$user_name = $this->social_user_model->customer_where($this->uri->segment(3))[0];
?>
    <title><?=$this->config->config["projectTitle"]?> | <?php echo $page_title; ?></title>


    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><?php echo $page_title; ?></h1>
                </div>
                <div class="col-sm-6">
                    <h5 class="m-0 text-dark pull-right">Name : <?= $user_name['first_name'].' '.$user_name['last_name'] ?></h5>
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
                                        <th>Delivery</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($order as $key => $value){ ?>
                                        <tr>
                                            <td><?= $value['orderid'] ?></td>
                                            <td><?= $value['amount'] ?></td>
                                            <td><?php if($value['delivered'] == 0){?> <span class="badge badge-danger">Not Delivered</span> <?php }else{ ?><span class="badge badge-success">Delivered</span> <?php } ?></td>
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
            "dom": "<'row'<'col-md-12 my-marD'B>><'row'<'col-md-6'l><'col-md-6'f>><'row'<'col-md-12't>><'row'<'col-md-6'i><'col-md-6'p>>",
            "columnDefs": [
                
                
                    { "orderable": false, "targets": [2] }
                    
                
            ],
            order : [],
            "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            buttons: [ 
                { 
                    extend: 'print',
                    title: '<?=$this->config->config["projectTitle"]?> <?php echo $page_title; ?>',
                    exportOptions: {
                        columns: [0,1]
                    }
                },
                { 
                    extend: 'pdf',
                    title: '<?=$this->config->config["projectTitle"]?> <?php echo $page_title; ?>',
                    exportOptions: {
                        columns: [0,1]
                    }
                },
                { 
                    extend: 'excel',
                    title: '<?=$this->config->config["projectTitle"]?> <?php echo $page_title; ?>',
                    exportOptions: {
                        columns: [0,1]
                    }
                }
            ]
            
        });
    })
</script>

