    <title><?=$this->config->config["projectTitle"]?> | <?= $page_title; ?></title>

    <section class="content">
      	<div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-bordered table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th class="text-center">Photo</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th>Registered At</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach($user as $key => $value){ ?>
                                        <tr>
                                            <td class="text-center">
                                                <img src="<?= $this->config->config['web_url']."image/social_user_uploads/".$value['image'] ?>" alt="User image" width="50px">
                                            </td>
                                            <td><?= $value['first_name'].' '.$value['last_name'] ?></td>
                                            <td><?= $value['email']; ?></td>
                                            <td><?= $value['mobile']; ?></td>
                                            <td><?= date('d-m-Y H:i A',strtotime($value['created_at'])) ?></td>
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
            
            order : [],
            "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            buttons: [ 
                { 
                    extend: 'print',
                    title: '<?=$this->config->config["projectTitle"]?> <?= $page_title; ?>',
                    exportOptions: {
                        columns: [1,2,3,4]
                    }
                },
                { 
                    extend: 'pdf',
                    title: '<?=$this->config->config["projectTitle"]?> <?= $page_title; ?>',
                    exportOptions: {
                        columns: [1,2,3,4]
                    }
                },
                { 
                    extend: 'excel',
                    title: '<?=$this->config->config["projectTitle"]?> <?= $page_title; ?>',
                    exportOptions: {
                        columns: [1,2,3,4]
                    }
                }
            ]
            
        });
    })
</script>

