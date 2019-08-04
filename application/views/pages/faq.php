        <!--================Home Banner Area =================-->
        <section class="banner_area">
            <div class="banner_inner d-flex align-items-center">
				<div class="container">
					<div class="banner_content text-center">
						<h2>FAQ's</h2>
						<div class="page_link">
							<a href="<?= base_url(); ?>">Home</a>
							<a href="#">FAQ</a>
						</div>
					</div>
				</div>
            </div>
        </section>
        <!--================End Home Banner Area =================-->
        
        <?php $limit = 10;  ?>

        <!--================Contact Area =================-->
        <section class="sample-text-area">
                <div class="container">
                    
                    <section class="accordion-section clearfix mt-3" aria-label="Question Accordions">
                        <div class="container">
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            
                            <?php $this->db->limit($limit); ?>
                            <?php foreach ($this->db->get('faq')->result_array() as $key => $value) { ?>
                                                        
                                <div class="panel panel-default">
                                    <div class="panel-heading p-3 mb-3" role="tab" id="heading0">
                                        <h3 class="panel-title">
                                            <a class="collapsed" role="button" title="" data-toggle="collapse" data-parent="#accordion" href="#collapse<?= $value['id'] ?>" aria-expanded="true" aria-controls="collapse0">
                                                <?= $value['que'] ?>
                                            </a>
                                        </h3>
                                    </div>
                                    <div id="collapse<?= $value['id'] ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading0">
                                        <div class="panel-body px-3 mb-4">
                                            <?= $value['ans'] ?>
                                        </div>
                                    </div>
                                </div>

                            <?php } ?>

                            <div id="other"></div>

                            </div>
                        </div>
                    </section>

                    
                    <div class="customer-review_wrap text-center">
                        <?php if($this->db->get('faq')->num_rows() > $limit){ ?>
                            <button type="button" class="btn btn-sm btn-default" id="load_more" style="cursor: pointer;"><span id="but_main">Load more</span> <span id="load" style="display: none;"><i class='fa fa-circle-o-notch fa-spin'></i> Loding</span></button>
                        <?php } ?>
                    </div>

                </div>
        </section>
        <!--================Contact Area =================-->   

        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>zoom/according/css/style.css">

        <input type="hidden" id="load_more_record" value="<?= $limit ?>">


<script>
$('#load_more').click(function(e){
    e.preventDefault();
    var record      =    $('#load_more_record').val();
    
        $.ajax({
            type : "post",
            url : "<?= base_url() ?>pages/faq_load_more",
            data : "record="+record+"&limit=<?= $limit ?>",
            cache : false,
            dataType: "json",
            beforeSend: function() {
                $('#load').show();
                $('#but_main').hide();
            },
            success:function( out ){
                setTimeout(function(){
                    $('#other').append(out[1]);
                    $('#load_more_record').val(parseFloat($('#load_more_record').val()) + parseFloat(out[0]));
                    
                    if($('#load_more_record').val() == out[2])
                    {
                        $('#load_more').fadeOut();
                    }

                    $('#load').hide();
                    $('#but_main').show();

                }, 2000);
            }
        });
});

</script>