    <title><?=$this->config->config["projectTitle"]?> | <?php echo $page_title; ?></title>


   	<div class="content-header">
      	<div class="container-fluid">
        	<div class="row mb-2">
          		<div class="col-sm-6">
            		<h1 class="m-0 text-dark"><?php echo $page_title; ?></h1>
          		</div>
                <div class="col-sm-6">
                    <a href="<?= base_url('product/add'); ?>" class="float-sm-right btn btn-primary btn-sm"> <i class="fa fa-plus"></i> Add New</a>
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
                                        <th>Product Name</th>
                                        <th>Price</th>
                                        <th>Category</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach($products as $key => $product){ ?>
                                        <tr>
                                            <td><?= $product['name']; ?></td>
                                            <td><?= $product['amount']; ?></td>
                                            <td><?= $this->general_model->category_byid($product['category']); ?></td>
                                            <td class="text-center">
                                                <?php if($product['status'] == '0'){ ?>
                                                    <span class="badge badge-warning">Pending Approval</span>
                                                <?php }else if($product['status'] == '1'){ ?>
                                                    <span class="badge badge-success">Approved</span>
                                                <?php }else{ ?>
                                                    <span class="badge badge-danger">Rejected</span>
                                                <?php } ?>
                                            </td>
                                            <td class="text-center">

                                                <a class="btn btn-sm btn-success" href="<?= base_url();?>product/edit/<?= $product['id'];?>" title="Edit">
                                                    <i class="fa fa-edit"></i>
                                                </a>

                                               <!--  <a class="btn btn-sm btn-warning" href="<?= base_url();?>product/change_image/<?= $product['id'];?>" title="Change Images">
                                                    <i class="fa fa-image"></i>
                                                </a> -->

                                                <a class="btn btn-sm btn-danger" href="<?= base_url();?>product/delete/<?= $product['id'];?>" onclick="return confirm('Are you Sure You Want to Delete this Product ?');" title="Delete">
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
                
                
                    { "orderable": false, "targets": [4] }
                    
                
            ],
            order : [],
            "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            buttons: [ 
                { 
                    extend: 'print',
                    title: '<?=$this->config->config["projectTitle"]?> <?php echo $page_title; ?>',
                    exportOptions: {
                        columns: [0,1,2,3]
                    }
                },
                { 
                    extend: 'pdf',
                    title: '<?=$this->config->config["projectTitle"]?> <?php echo $page_title; ?>',
                    exportOptions: {
                        columns: [0,1,2,3]
                    }
                },
                { 
                    extend: 'excel',
                    title: '<?=$this->config->config["projectTitle"]?> <?php echo $page_title; ?>',
                    exportOptions: {
                        columns: [0,1,2,3]
                    }
                }
            ]
            
        });
    })
</script>

