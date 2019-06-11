<title><?=$this->config->config["projectTitle"]?> | <?= $page_title; ?></title>


<div class="content-header">
  	<div class="container-fluid">
    	<div class="row mb-2">
      		<div class="col-sm-6">
        		<h1 class="m-0 text-dark"><?= $page_title; ?></h1>
      		</div>
            <div class="col-sm-6">
                <a href="<?= base_url('packages/shop'); ?>" class="float-sm-right btn btn-primary btn-sm"> <i class="fa fa-plus"></i> Add New</a>
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
                                    <th>Plan Name</th>
                                    <th>Price</th>
                                    <th>Duration(Days)</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($shop as $key => $value) { ?>
                                    <tr>
                                        <td><?= $value['plan'] ?></td>
                                        <td><?= $value['price'] ?></td>
                                        <td><?= $value['duration'] ?></td>
                                        <td class="text-center">
                                            <a class="btn btn-sm btn-danger" href="<?= base_url();?>packages/shop_delete/<?= $value['id'];?>" onclick="return confirm('Are you Sure You Want to Delete this Packages ?');" title="Delete">
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
                
                { "orderable": false, "targets": [2] }
                    
            ],
            order : [],
            "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            
        });
    })
</script>

