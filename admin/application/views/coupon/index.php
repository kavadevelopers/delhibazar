    <title><?=$this->config->config["projectTitle"]?> | <?php echo $page_title; ?></title>


   	<div class="content-header">
      	<div class="container-fluid">
        	<div class="row mb-2">
          		<div class="col-sm-6">
            		<h1 class="m-0 text-dark"><?php echo $page_title; ?></h1>
          		</div>
                <div class="col-sm-6">
                    <a href="<?= base_url('coupon/add'); ?>" class="float-sm-right btn btn-primary btn-sm"> <i class="fa fa-plus"></i> Add New</a>
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
                                        <th>Code</th>
                                        <th>Discount Type</th>
                                        <th >Value</th>
                                        <th class="text-center">Expire Date</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($coupon as $key => $value) { ?>

                                        <tr>
                                            <td><?= $value['code']; ?></td>
                                            <td><?= $value['off_type']; ?></td>
                                            <td><?= $value['value']; ?></td>
                                            <td class="text-center">
                                                <?php if($value['expire_date'] == ''){ echo "-"; }else{ echo date('d-m-Y',strtotime($value['expire_date'])); }; ?>        
                                            </td>
                                            <td class="text-center">
                                                <?php if($value['status'] == '0'){ ?>
                                                    <span class="badge badge-success">Active</span>
                                                <?php }else{ ?>
                                                    <span class="badge badge-danger">In Active</span>
                                                <?php } ?>
                                            </td>
                                            

                                            <td class="text-center">
                                                
                                                <a class="btn btn-sm btn-success" href="<?= base_url();?>coupon/edit/<?= $value['id'];?>" title="Edit">
                                                    <i class="fa fa-edit"></i>
                                                </a>

                                                <a class="btn btn-sm btn-danger" href="<?= base_url();?>coupon/delete/<?= $value['id'];?>" onclick="return confirm('Are you Sure You Want to Delete this Category ?');" title="Delete">
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
            "dom": "<'row'<'col-md-6'l><'col-md-6'f>><'row'<'col-md-12't>><'row'<'col-md-6'i><'col-md-6'p>>",
            "columnDefs": [
                
                
                    { "orderable": false, "targets": [3] }
                    
                
            ],
            order : [],
            "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            
        });
    })
</script>

