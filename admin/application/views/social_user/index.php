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
                                        <th class="text-center">Photo</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th>Registered At</th>
                                        <th class="text-center">Total Product Review</th>
                                        <th class="text-center">Total Order</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach($user as $key => $value){ 

                                    $count_product_review   = count($this->social_user_model->customer_review_where($value['id']));
                                    $count_order            = count($this->social_user_model->customer_order_where($value['id']));

                                    ?>
                                        <tr>
                                            <td class="text-center">
                                                <img src="<?= $this->config->config['web_url']."image/social_user_uploads/".$value['image'] ?>" alt="User image" width="50px">
                                            </td>
                                            <td><?= $value['first_name'].' '.$value['last_name'] ?></td>
                                            <td><?= $value['email']; ?></td>
                                            <td><?= $value['mobile']; ?></td>
                                            <td><?= date('d-m-Y H:i A',strtotime($value['created_at'])) ?></td>
                                            <td class="text-center"><?= $count_product_review ?></td>
                                            <td class="text-center"><?= $count_order ?></td>
                                            
                                            <td class="text-center">
                                                
                                                <a class="btn btn-sm btn-secondary" href="<?= base_url();?>social_user/review/<?= $value['id'];?>" title="Review">
                                                    <i class="fa fa-commenting-o"></i>
                                                </a>

                                                <a class="btn btn-sm btn-secondary" href="<?= base_url();?>social_user/order/<?= $value['id'];?>" title="Order">
                                                    <i class="fa fa-shopping-cart"></i>
                                                </a>

                                                <a class="btn btn-sm btn-danger" href="<?= base_url();?>social_user/delete/<?= $value['id'];?>" onclick="return confirm('Are you Sure You Want to Delete this Customer ?');" title="Delete">
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
            "columnDefs": [
                
                { "orderable": false, "targets": [0,7] }
            ],
            order : [],
            "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            buttons: [ 
                { 
                    extend: 'print',
                    title: '<?=$this->config->config["projectTitle"]?> <?= $page_title; ?>',
                    exportOptions: {
                        columns: [1,2,3,4,5,6]
                    }
                },
                { 
                    extend: 'pdf',
                    title: '<?=$this->config->config["projectTitle"]?> <?= $page_title; ?>',
                    exportOptions: {
                        columns: [1,2,3,4,5,6],
                    }
                },
                { 
                    extend: 'excel',
                    title: '<?=$this->config->config["projectTitle"]?> <?= $page_title; ?>',
                    exportOptions: {
                        columns: [1,2,3,4,5,6],
                    }
                }
            ]
            
        });
    })
</script>

