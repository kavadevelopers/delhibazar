	<title><?=$this->config->config["projectTitle"]?> | <?php echo $page_title; ?></title>


   	<div class="content-header">
      	<div class="container-fluid">
        	<div class="row mb-2">
          		<div class="col-sm-6">
            		<h1 class="m-0 text-dark">Welcome To <?=$this->config->config["projectName"]?></h1>
          		</div>
        	</div>
      	</div>
    </div>

    <section class="content">
        <div class="container-fluid">
             <div class="row">
                
                <?php if($this->session->userdata('id') == '1'){ ?>
                    <div class="col-md-3 col-sm-12 col-lg-3 col-xs-6">
                        <div class="info-box bg-success-gradient">
                            <span class="info-box-icon"><i class="fa fa-users"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Total Agents</span>
                                <span class="info-box-number"><?= $this->dashboard_model->count_agents(); ?></span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-3 col-sm-12 col-lg-3 col-xs-6">
                        <div class="info-box bg-warning-gradient">
                            <span class="info-box-icon"><i class="fa fa-window-restore"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Total Categories</span>
                                <span class="info-box-number"><?= $this->dashboard_model->count_categories(); ?></span>
                            </div>
                        </div>
                    </div>
                <?php } ?>

            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">Out Of Stock Products</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-striped table-sm" id="product_outof_Stock">
                                <thead>
                                    <tr>
                                        <th class="text-center">Banner</th>
                                        <th>Product Name</th>
                                        <th>Price</th>
                                        <th>Category</th>
                                        <th class="text-center">Stock</th>
                                        <th class="text-center">Status</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach($out_of_stock as $key => $product){ ?>
                                        <tr>
                                            <td class="text-center">
                                                <img class="zoom-img" src="<?= base_url().'uploads/product/banner/'._p_banner_img($product['id']); ?>" style="width: 80px;">
                                            </td>
                                            <td><?= $product['name']; ?></td>
                                            <td><?= $product['amount']; ?></td>
                                            <td><?= $this->general_model->category_byid($product['category']); ?></td>
                                            <td class="text-center"><?= $product['stock']; ?></td>
                                            <td class="text-center">
                                                <?php if($product['status'] == '0'){ ?>
                                                    <span class="badge badge-danger">In Active</span>
                                                <?php }else if($product['status'] == '1'){ ?>
                                                    <span class="badge badge-success">Active</span>
                                                <?php } ?>
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
        $('#product_outof_Stock').DataTable({
            "dom": "<'row'<'col-md-6'l><'col-md-6'f>><'row'<'col-md-12't>><'row'<'col-md-6'i><'col-md-6'p>>",
            order : [],
            "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            
        });
    })
</script>

<style type="text/css">
    .zoom-img:hover{
        transform: scale(2);
    }
</style>



