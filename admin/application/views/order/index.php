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
                                    <th>Name</th>
                                    <th>Product Name</th>
                                    <th>email</th>
                                    <th>Mobile</th>
                                    <th>Amount</th>
                                    <th>Address</th>
                                    <th>Order Date</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php foreach($order as $key => $value){ ?>
                                    <tr>
                                        <td><?= $value['name'] ?></td>
                                        <td><?= $value['productinfo'] ?></td>
                                        <td><?= $value['email'] ?></td>
                                        <td><?= $value['phone']; ?></td>
                                        <td><?= $value['amount']; ?></td>
                                        <td><?= $value['address1']; ?></td>
                                        <td><?= date('d-m-Y H:i A',strtotime($value['created_at'])) ?></td>
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
                        columns: [1,2,3,4]
                    }
                },
                { 
                    extend: 'pdf',
                    title: '<?=$this->config->config["projectTitle"]?> <?= $page_title; ?>',
                    exportOptions: {
                        columns: [1,2,3,4]
                    }
                },
                { 
                    extend: 'excel',
                    title: '<?=$this->config->config["projectTitle"]?> <?= $page_title; ?>',
                    exportOptions: {
                        columns: [1,2,3,4]
                    }
                }
            ]
            
        });
    })
</script>

