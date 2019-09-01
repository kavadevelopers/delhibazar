    <title><?=$this->config->config["projectTitle"]?> | <?php echo $page_title; ?></title>


   	<div class="content-header">
      	<div class="container-fluid">
        	<div class="row mb-2">
          		<div class="col-sm-6">
            		<h1 class="m-0 text-dark"><?php echo $page_title; ?></h1>
          		</div>
                <div class="col-sm-6">
                    <a href="<?= base_url('category/sub_category_add'); ?>" class="float-sm-right btn btn-primary btn-sm"> <i class="fa fa-plus"></i> Add New</a>
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
                                        <th class="text-center">Banner</th>
                                        <th>Sub Category Name</th>
                                        <th>Category</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $a = count($categories) + 1; foreach ($categories as $key => $category) { $a--; ?>

                                        <tr>
                                            <td class="text-center">
                                                <img class="zoom-img" src="<?= base_url().'uploads/category/'.get_subcategory_image($category['id']); ?>" style="width: 80px;">
                                            </td>
                                            <td><?= $category['name']; ?></td>
                                            <td><?= $this->user_model->get_category_all($category['category'])[0]['name']; ?></td>
                                            <td class="text-center">
                                                <?php if($category['status'] == '0'){ ?>
                                                    <span class="badge badge-success">Active</span>
                                                <?php }else{ ?>
                                                    <span class="badge badge-danger">In Active</span>
                                                <?php } ?>
                                            </td>
                                            <td class="text-center">
                                                
                                                <a class="btn btn-sm btn-success" href="<?= base_url();?>category/sub_edit/<?= $category['id'];?>" title="Edit">
                                                    <i class="fa fa-edit"></i>
                                                </a>

                                                <a class="btn btn-sm btn-warning" href="<?= base_url();?>category/change_image_subcategory/<?= $category['id'];?>" title="Manage Images">
                                                    <i class="fa fa-image"></i>
                                                </a>

                                                <a class="btn btn-sm btn-danger" href="<?= base_url();?>category/sub_delete/<?= $category['id'];?>" onclick="return confirm('Are you Sure You Want to Delete this Category ?');" title="Delete">
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
                
                
                    { "orderable": false, "targets": [4] }
                    
                
            ],
            order : [],
            "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            
        });
    })
</script>

