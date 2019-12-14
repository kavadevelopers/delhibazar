    <title><?=$this->config->config["projectTitle"]?> | <?= $page_title; ?></title>


   	<div class="content-header">
      	<div class="container-fluid">
        	<div class="row mb-2">
          		<div class="col-sm-6">
            		<h1 class="m-0 text-dark"><?= $page_title; ?></h1>
          		</div>
                <div class="col-sm-6">
                    <a href="<?= base_url('advertising/add'); ?>" class="float-sm-right btn btn-primary btn-sm"> <i class="fa fa-plus"></i> Add New</a>
                </div>
        	</div>
      	</div>
    </div>

    <section class="content">
      	<div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body table-responsive">
                            <table class="table table-bordered table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th class="text-center" id="action" style="min-width: 70px;">Action</th>
                                        <th>Id</th>
                                        <th>Business Name</th>
                                        <th>Intro</th>
                                        <th>Mobile</th>
                                        <th>Address</th>
                                        <th>Link</th>
                                        <th>Page</th>
                                        <th>Position</th>
                                        <th>Expiry Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($advertising as $key => $value) { ?>

                                        <tr>
                                            <td class="text-center">

                                                <a class="btn btn-sm btn-success" href="<?= base_url();?>advertising/edit/<?= $value['id'];?>" title="Edit">
                                                    <i class="fa fa-edit"></i>
                                                </a>

                                               <a class="btn btn-sm btn-danger" href="<?= base_url();?>advertising/delete/<?= $value['id'];?>" onclick="return confirm('Are you Sure You Want to Delete this Advertising .?');" title="Delete">
                                                    <i class="fa fa-trash"></i>
                                                </a>

                                            </td>
                                            <td><?= 'AD0'.$value['id'] ?></td>
                                            <td><?= $value['business_name']; ?></td>
                                            <td><?= nl2br($value['intro']); ?></td>
                                            <td><?= $value['mobile'] ?></td>
                                            <td><?= nl2br($value['address']); ?></td>
                                            <td><?= nl2br($value['link']); ?></td>
                                            <td><?= $value['page'] ?></td>
                                            <td><?= $value['position'] ?></td>
                                            <td><?=  date('d-m-Y',strtotime($value['exp_date'])) ?></td>
                                            

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
                
                
                    { "orderable": false, "targets": [0] }
                    
                
            ],
            order : [],
            "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            buttons: [ 
                { 
                    extend: 'print',
                    title: '<?=$this->config->config["projectTitle"]?> Advertising',
                    exportOptions: {
                        columns: [0,1,2,3,4,5,6,7,8]
                    }
                },
                { 
                    extend: 'pdf',
                    title: '<?=$this->config->config["projectTitle"]?> Advertising',
                    exportOptions: {
                        columns: [0,1,2,3,4,5,6,7,8]
                    }
                },
                { 
                    extend: 'excel',
                    title: '<?=$this->config->config["projectTitle"]?> Advertising',
                    exportOptions: {
                        columns: [0,1,2,3,4,5,6,7,8]
                    }
                }
            ]
            
        });
    })
</script>

