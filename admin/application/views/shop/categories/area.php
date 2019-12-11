    <title><?=$this->config->config["projectTitle"]?> | <?= $page_title; ?></title>

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
                <div class="col-6">
                    <?php if($flad == 1){ ?>
                        <form method="post" action="<?= base_url(); ?>shop/update_area" enctype="multipart/form-data">
                            <div class="card card-secondary"> 
                                <div class="card-header">
                                    <h3 class="card-title">Edit Area</h3>
                                </div>

                                <div class="card-body">
                                    <div class="row">
                                        
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Name <span class="astrick">*</span></label>
                                                <input class="form-control form-control-sm" value="<?php echo set_value('name',$shop_one['name']); ?>" id="name" type="text" name="name" placeholder="Name" autocomplete="off">
                                                <?php echo form_error('name'); ?>
                                            </div>
                                        </div>
                                        <input type="hidden" name="main_id" value="<?= $shop_one['id'] ?>">
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="float-right">
                                        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i>&nbsp;Save</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    <?php }else{ ?>
                        <form method="post" action="<?= base_url(); ?>shop/save_area" enctype="multipart/form-data">
                            <div class="card card-secondary"> 
                                <div class="card-header">
                                    <h3 class="card-title">Add Area</h3>
                                </div>

                                <div class="card-body">
                                    <div class="row">
                                        
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Name <span class="astrick">*</span></label>
                                                <input class="form-control form-control-sm" value="<?php echo set_value('name'); ?>" id="name" type="text" name="name" placeholder="Name" autocomplete="off">
                                                <?php echo form_error('name'); ?>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="float-right">
                                        <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i>&nbsp;Add</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    <?php } ?>
                </div>
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-bordered table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach($shop as $key => $value){ ?>
                                        <tr>
                                            <td><?= $value['name'] ?></td>
                                            <td class="text-center">

                                                <a class="btn btn-sm btn-primary" href="<?= base_url();?>shop/area/<?= $value['id'];?>" title="Order">
                                                    <i class="fa fa-edit"></i>
                                                </a>

                                                <a class="btn btn-sm btn-danger" href="<?= base_url();?>shop/delete_area/<?= $value['id'];?>" onclick="return confirm('Are you Sure You Want to Delete this ?');" title="Delete">
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
                
                { "orderable": false, "targets": [1] }
            ],
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
                        columns: [1,2,3,4],
                    }
                },
                { 
                    extend: 'excel',
                    title: '<?=$this->config->config["projectTitle"]?> <?= $page_title; ?>',
                    exportOptions: {
                        columns: [1,2,3,4],
                    }
                }
            ]
            
        });
    })
</script>

