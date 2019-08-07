    <title><?=$this->config->config["projectTitle"]?> | <?php echo $page_title; ?></title>

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><?php echo $page_title; ?></h1>
                </div>
                <div class="col-sm-6">
                    <h5 class="m-0 text-dark pull-right"><b>Name</b> : <?= $customer['first_name'].' '.$customer['last_name'] ?></h5>
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
                                        <th class="text-center">Rating</th>
                                        <th>Description</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $this->db->order_by('id','desc'); ?>
                                    <?php foreach($this->db->get_where('product_rating',['user_id' => $customer['id']])->result_array() as $key => $value){ ?>
                                        <tr>
                                            <td><?= $this->product_model->product_id_where($value['product_id'])[0]['name']; ?></td>
                                            <td class="text-center"><?= $value['rating'] ?></td>
                                            <td><?= nl2br($value['review']) ?></td>
                                            <td class="text-center">

                                                <a class="btn btn-sm btn-danger" href="<?= base_url();?>social_user/delete_product_review/?r_id=<?= $value['id'];?>&u_id=<?= $customer['id'];?>" onclick="return confirm('Are you Sure You Want to Delete this Review ?');" title="Delete">
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
            "dom": "<'row'<'col-md-6'l><'col-md-6'f>><'row'<'col-md-12't>><'row'<'col-md-6'i><'col-md-6'p>>",
            "columnDefs": [
                
                
                    { "orderable": false, "targets": [3] }
                    
                
            ],
            order : [],
            "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            
        });
    })
</script>

