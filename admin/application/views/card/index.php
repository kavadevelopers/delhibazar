    <title><?=$this->config->config["projectTitle"]?> | <?php echo $page_title; ?></title>


   	<div class="content-header">
      	<div class="container-fluid">
        	<div class="row mb-2">
          		<div class="col-sm-6">
            		<h1 class="m-0 text-dark"><?php echo $page_title; ?></h1>
          		</div>
                <div class="col-sm-6">
                    <a href="<?= base_url('card/add'); ?>" class="float-sm-right btn btn-primary btn-sm"> <i class="fa fa-plus"></i> Add New</a>
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
                                        <th class="text-center">Image</th>
                                        <th class="text-right">Price</th>
                                        <th class="text-center">Validaty</th>
                                        <th class="text-center">Total Usage</th>
                                        <th class="text-center">Usage</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($cards as $key => $card) { ?>

                                        <tr>
                                            <td class="text-center">
                                                <img class="zoom-img" src="<?= base_url().'uploads/virtual_card/'.get_card_image($card['id']) ?>" style="width: 80px;">
                                            </td>
                                            <td class="text-right"><?= $card['price']; ?></td>
                                            <td class="text-center"><?= $card['validity']==0?'Unlimited':$card['validity'].' Days' ?></td>
                                            <td class="text-center"><?= $card['total_usage']==0?'Unlimited':$card['total_usage'].' Times' ?></td>
                                            <td class="text-center"><?= $card['usage'] ?></td>
                                            <td class="text-center">
                                                
                                                <a class="btn btn-sm btn-success" href="<?= base_url();?>card/edit/<?= $card['id'];?>" title="Edit">
                                                    <i class="fa fa-edit"></i>
                                                </a>

                                                <a class="btn btn-sm btn-danger" href="<?= base_url();?>card/delete/<?= $card['id'];?>" onclick="return confirm('Are you Sure You Want to Delete this ?');" title="Delete">
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
                
                
                    { "orderable": false, "targets": [5] }
                    
                
            ],
            order : [],
            "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            
        });
    })
</script>

