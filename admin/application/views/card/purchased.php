    <title><?=$this->config->config["projectTitle"]?> | <?php echo $page_title; ?></title>


   	<div class="content-header">
      	<div class="container-fluid">
        	<div class="row mb-2">
          		<div class="col-sm-6">
            		<h1 class="m-0 text-dark"><?php echo $page_title; ?></h1>
          		</div>
                <div class="col-sm-6">
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
                                        <th class="text-center">Transaction ID</th>
                                        <th class="text-right">Amount</th>
                                        <th class="text-center">Card Id</th>
                                        <th class="text-center">Date</th>
                                        <th class="text-center">Referal code</th>
                                        <th class="text-center">Bank</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($cards as $key => $card) { ?>

                                        <tr>
                                            <td class="text-center"><?= $card['t_id']; ?></td>
                                            <td class="text-right"><?= $card['amount'] ?></td>
                                            <td class="text-center"><?= $card['card'] ?></td>
                                            <td class="text-center"><?= $card['p_date'] ?></td>
                                            <td class="text-center"><?= $card['referal'] ?></td>
                                            <td class="text-center"><?= $card['bank'] ?></td>
                                            

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

