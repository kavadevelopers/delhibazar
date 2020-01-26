    <title><?=$this->config->config["projectTitle"]?> | <?php echo $page_title; ?></title>


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
            <form method="post" action="<?= base_url(); ?>card/search" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-12">

                        <div class="card card-secondary"> 
                            <div class="card-header">
                                <h3 class="card-title">Information</h3>
                            </div>

                            <div class="card-body">
                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Vendor<span class="astrick">*</span></label>
                                            <select class="form-control form-control-sm select2" name="vendor" required>
                                                <option value="">-- Select --</option>
                                                <?php foreach ($this->db->get('shop')->result_array() as $key => $value) { ?>
                                                    
                                                    <option value="<?= $value['id'] ?>" ><?= $value['shop_name'] ?> - <?= $value['owner_name'] ?></option>

                                                <?php } ?>
                                            
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>From </label>
                                            <input class="form-control form-control-sm datepicker" type="text" name="from" placeholder="From Date" autocomplete="off" readonly="">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>To </label>
                                            <input class="form-control form-control-sm datepicker" type="text" name="to" placeholder="To Date" autocomplete="off" readonly="">
                                        </div>
                                    </div>
                                   
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="float-right">
                                  <button type="submit" class="btn btn-success"><i class="fa fa-search"></i>&nbsp;Search</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="card card-secondary"> 
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-bordered table-striped table-sm">
                                    <thead>
                                        <tr>
                                            <th class="">Shop Name</th>
                                            <th class="text-center">Customer ID</th>
                                            <th class="">Customer</th>
                                            <th class="text-center">Card id</th>
                                            <th class="text-right">Amount</th>
                                            <th class="">Description</th>
                                            <th class="text-center">Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $total = 0; foreach ($cards as $key => $row) { $total += $row['amount']; ?>
                                            <?php $card = $this->db->get_where("card_purchase",['id' => $row['card']])->row_array(); ?>
                                            <?php $shop = $this->db->get_where("shop",['id' => $row['vendor']])->row_array(); ?>
                                            <tr>
                                                
                                                <td>
                                                    <?= $shop['shop_name'] ?>
                                                </td>
                                                <td class="text-center">
                                                    CUSTOMER0<?= $row['user'] ?>
                                                </td> 
                                                <td>
                                                    <?= get_user($row['user'])['first_name'].' '.get_user($row['user'])['last_name'] ?>
                                                </td>
                                                <td><?= $card['id'] ?></td>
                                                <td class="text-right"><?= $row['amount'] ?></td>
                                                <td><?= $row['description'] ?></td>
                                                <td class="text-center"><?= date('d-m-Y h:i A',strtotime($row['created_at'])) ?></td>

                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="4" class="text-right"><b>Total : <?= $total ?></b></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </form>    
        </div>
    </section>

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