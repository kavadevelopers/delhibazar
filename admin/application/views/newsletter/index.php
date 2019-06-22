<title><?=$this->config->config["projectTitle"]?> | <?php echo $page_title; ?></title>


<div class="content-header">
  	<div class="container-fluid">
    	<div class="row mb-2">
      		<div class="col-sm-6">
        		<h1 class="m-0 text-dark"><?php echo $page_title; ?></h1>
      		</div>
            <div class="col-sm-6">
                <a href="<?= base_url('newsletter/sendmail'); ?>" class="float-sm-right btn btn-primary btn-sm"> <i class="fa fa-paper-plane-o"></i> &nbsp;&nbsp;&nbsp;Send Mail</a>
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
                                    <th>Email</th>
                                    <th class="text-center">Status</th>
                                    <th>Subscribe Time</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php foreach($news as $key => $value){ ?>
                                    <tr>
                                        <td><?= $value['email']; ?></td>
                                        
                                        <td class="text-center">
                                            <?php if($value['active'] == 0){ ?>
                                                <span class="badge badge-success">Active</span>        
                                            <?php }else{ ?>
                                                <span class="badge badge-danger">Not Active</span>        
                                            <?php } ?>
                                        </td>

                                        
                                        <td><?= date('d-m-Y H:i:A',strtotime($value['created_at'])) ?></td>
                                        <td class="text-center">
                                            
                                            <a class="btn btn-sm btn-danger" href="<?= base_url();?>newsletter/delete/<?= $value['id'];?>" onclick="return confirm('Are you Sure You Want to Delete this Newsletter ?');" title="Delete">
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
                
                
                    { "orderable": false, "targets": [3] }
                    
                
            ],
            order : [],
            "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            buttons: [ 
                { 
                    extend: 'print',
                    title: '<?=$this->config->config["projectTitle"]?> <?php echo $page_title; ?>',
                    exportOptions: {
                        columns: [0,1,2]
                    }
                },
                { 
                    extend: 'pdf',
                    title: '<?=$this->config->config["projectTitle"]?> <?php echo $page_title; ?>',
                    exportOptions: {
                        columns: [0,1,2]
                    }
                },
                { 
                    extend: 'excel',
                    title: '<?=$this->config->config["projectTitle"]?> <?php echo $page_title; ?>',
                    exportOptions: {
                        columns: [0,1,2]
                    }
                }
            ]
            
        });
    })
</script>

