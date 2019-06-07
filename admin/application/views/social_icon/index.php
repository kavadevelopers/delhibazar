<title><?=$this->config->config["projectTitle"]?> | <?php echo $page_title; ?></title>


<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark"><?php echo $page_title; ?></h1>
            </div>
            <div class="col-sm-6">
                <a href="https://fontawesome.com/v4.7.0/icons/" class="float-sm-right" target="_blank">Please refer this link for icons</a>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">

        <div class="row">

            <div class="col-4">
                <div class="card card-secondary">
                    <div class="card card-header">
                        <h3 class="card-title">Add Link</h3>
                    </div>
                    <form method="post" action="<?= base_url() ?>social_icon/insert"> 
                        <div class="card-body">

                            <div class="row">

                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Title <span class="astrick">*</span></label>
                                        <input class="form-control" type="text" name="title" placeholder="Title" autocomplete="off" required>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Class / Icon <span class="astrick">*</span></label>
                                        <input class="form-control" type="text" name="class" placeholder="Example :- fa-facebook" autocomplete="off" required>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Link <span class="astrick">*</span></label>
                                        <input class="form-control" type="text" name="link" placeholder="https://google.com" autocomplete="off" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                    <div class="card-footer">
                        <div class="float-right">
                          <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i>&nbsp;Add</button>
                        </div>
                    </div>
                </form>

                </div>
            </div>

            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>Icon</th>
                                    <th>Title</th>
                                    <th>Class</th>
                                    <th>Link</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($icon as $key => $value) { ?>
                                    
                                    <tr>
                                        <td class="text-center"><i class="fa <?= $value['class'] ?>"></i></td>
                                        <td><?= $value['title'] ?></td>
                                        <td><?= $value['class'] ?></td>
                                        <td><?= $value['link'] ?></td>
                                        <td class="text-center">
                                            <a href="#" class="btn btn-success btn-sm edit" data-title="<?= $value['title'] ?>" data-class="<?= $value['class'] ?>" data-link="<?= $value['link'] ?>" data-edit="<?= $value['id'] ?>" id="exampleModal" title="Edit"><i class="fa fa-edit"></i></a>

                                            <a class="btn btn-sm btn-danger" href="<?= base_url();?>social_icon/delete/<?= $value['id'];?>" onclick="return confirm('Are you Sure You Want to Delete this Link .?');" title="Delete">
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

<!-- Modal -->
<form method="post" action="<?= base_url() ?>social_icon/update"> 
    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Link</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                
                    <div class="row">

                        <div class="col-6">
                            <div class="form-group">
                                <label>Title <span class="astrick">*</span></label>
                                <input class="form-control" id="edit_title" type="text" name="title" placeholder="Title" autocomplete="off" required>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label>Class / Icon <span class="astrick">*</span></label>
                                <input class="form-control" id="edit_class" type="text" name="class" placeholder="Example :- fa-facebook" autocomplete="off" required>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label>Link <span class="astrick">*</span></label>
                                <input class="form-control" id="edit_link" type="text" name="link" placeholder="https://google.com" autocomplete="off" required>
                            </div>
                        </div>
                    </div>
                </div>

                <input type="hidden" id="edit_id" name="id" value="">
          
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Save changes</button>
                </div>

            </div>
        </div>
    </div>
</form>

<script type="text/javascript">
    $(function(){

        $('.edit').click(function(){
            
            $('#modal').modal('show');
            $('#edit_title').val($(this).data('title'));
            $('#edit_class').val($(this).data('class'));
            $('#edit_link').val($(this).data('link'));
            $('#edit_id').val($(this).data('edit'));
        });

    })
</script>