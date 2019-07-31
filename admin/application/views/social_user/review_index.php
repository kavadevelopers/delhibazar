<?php 
$user_name = $this->social_user_model->customer_where($this->uri->segment(3))[0];
?>
    <title><?=$this->config->config["projectTitle"]?> | <?php echo $page_title; ?></title>


    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><?php echo $page_title; ?></h1>
                </div>
                <div class="col-sm-6">
                    <h5 class="m-0 text-dark pull-right">Name : <?= $user_name['first_name'].' '.$user_name['last_name'] ?></h5>
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
                                        <th>Category</th>
                                        <th>Product Name</th>
                                        <th>Price</th>
                                        <th>Review Date</th>
                                        <th>Rating</th>
                                        <th>Review</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($user as $key => $value){ 
                                        $product    = $this->product_model->product_id_where($value['user_id']);
                                        if(!empty($product))
                                        {
                                            $name       = $product[0]['name'];
                                            $price      = $product[0]['amount'];
                                            $category   = $this->general_model->get_categories_where($product[0]['category'])[0]['name'];
                                        }
                                        else{
                                            $name       = '--';  
                                            $price      = '--';  
                                            $category   = '--';
                                        }
                                        ?>
                                        <tr>
                                            <td><?= $category ?></td>
                                            <td><?= $name ?></td>
                                            <td><?= $price ?></td>
                                            <td><?= date('d-m-Y H:i:A',strtotime($value['created_at'])); ?></td>
                                            <td><?= $value['rating'] ?></td>
                                            <td><?= nl2br($value['review']) ?></td>
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
                
                
                    // { "orderable": false, "targets": [] }
                    
                
            ],
            order : [],
            "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            buttons: [ 
                { 
                    extend: 'print',
                    title: '<?=$this->config->config["projectTitle"]?> <?php echo $page_title; ?>',
                    exportOptions: {
                        columns: [0,1,2,3,4,5]
                    }
                },
                { 
                    extend: 'pdf',
                    title: '<?=$this->config->config["projectTitle"]?> <?php echo $page_title; ?>',
                    exportOptions: {
                        columns: [0,1,2,3,4,5]
                    }
                },
                { 
                    extend: 'excel',
                    title: '<?=$this->config->config["projectTitle"]?> <?php echo $page_title; ?>',
                    exportOptions: {
                        columns: [0,1,2,3,4,5]
                    }
                }
            ]
            
        });
    })
</script>

