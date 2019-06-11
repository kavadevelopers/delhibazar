    <title><?=$this->config->config["projectTitle"]?> | <?= $page_title; ?></title>
    <style type="text/css">
        table > thead > tr > th{ padding: 0px !important; }
        table > tbody > tr > td{ padding: 0px !important; }
    </style>

   	<div class="content-header">
      	<div class="container-fluid">
        	<div class="row mb-2">
          		<div class="col-sm-6">
            		<h1 class="m-0 text-dark"><?= $page_title; ?></h1>
          		</div>
                <div class="col-sm-6">
                    <a href="<?= base_url('shop/add'); ?>" class="float-sm-right btn btn-primary btn-sm"> <i class="fa fa-plus"></i> Add New</a>
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
                                        <th>Id</th>
                                        <th>Shop Name</th>
                                        <th>Owner Name</th>
                                        <th>Mobile</th>
                                        <th>Email</th>
                                        <th>Hours of Operation</th>
                                        <th>Mode of Payment</th>
                                        <th>Expiry Date</th>
                                        <th class="text-center" id="action" style="min-width: 150px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($shop as $key => $value) { ?>

                                        <tr>
                                            <td><?= 'SH000'.$value['id'] ?></td>
                                            <td><?= $value['shop_name'] ?></td>
                                            <td><?= $value['owner_name'] ?></td>
                                            <td><?= $value['mobile'] ?></td>
                                            <td><?= $value['email']; ?></td>
                                            <td><?= $value['hour_operation']; ?></td>
                                            <td><?= $value['payment_mode']; ?></td>
                                            <td><?= date('d-m-Y',strtotime($value['exp_date'])); ?></td>
                                            
                                            <td class="text-center">
                                                
                                                <a class="btn btn-sm btn-secondary" href="<?= base_url();?>shop/slider/<?= $value['id'];?>" title="Slider Upload">
                                                    <i class="fa fa-image"></i>
                                                </a>

                                                <a class="btn btn-sm btn-success" href="<?= base_url();?>shop/edit/<?= $value['id'];?>" title="Edit">
                                                    <i class="fa fa-edit"></i>
                                                </a>

                                                <a class="btn btn-sm btn-warning" href="<?= base_url();?>shop/view/<?= $value['id'];?>" title="View">
                                                    <i class="fa fa-eye"></i>
                                                </a>

                                               <a class="btn btn-sm btn-danger" href="<?= base_url();?>shop/delete/<?= $value['id'];?>" onclick="return confirm('Are you Sure You Want to Delete this Shop .?');" title="Delete">
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
<!-- /.container-fluid -->

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
                    title: '<?=$this->config->config["projectTitle"]?> Shop',
                    exportOptions: {
                        columns: [0,1,2,3,4,5]
                    }
                },
                { 
                    extend: 'pdf',
                    title: '<?=$this->config->config["projectTitle"]?> Shop',
                    exportOptions: {
                        columns: [0,1,2,3,4,5]
                    }
                },
                { 
                    extend: 'excel',
                    title: '<?=$this->config->config["projectTitle"]?> Shop',
                    exportOptions: {
                        columns: [0,1,2,3,4,5]
                    }
                }
            ]
            
        });
    })
</script>

