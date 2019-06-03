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
        </div>
    </section>



