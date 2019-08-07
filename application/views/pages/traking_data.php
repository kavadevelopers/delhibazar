
<!--================Home Banner Area =================-->
        <section class="banner_area">
            <div class="banner_inner d-flex align-items-center">
				<div class="container">
					<div class="banner_content text-center">
						<h2>Track Your Package</h2>
					</div>
				</div>
            </div>
        </section>
        <!--================End Home Banner Area =================-->
        
        <!--================Contact Area =================-->
        <section class="sample-text-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <table class="table table-bordered track_tbl">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Detail</th>
                                    <th>Date/Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $key => $value) { ?>
                                    <tr class="active">
                                        <td class="track_dot <?php if(0 == $key){ echo "Active"; } ?>">
                                            <span class="track_line"></span>
                                        </td>
                                        <td><?= $value['detail'] ?></td>
                                        <td><?= _vdatetime($value['date']) ?></td>
                                    </tr>    
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-2"></div>   
                </div> 

            </div>
        </section>
        <!--================Contact Area =================-->


        <style type="text/css">

            .Active:after{
                color: green !important;
            }

            .track_tbl td.track_dot {
                width: 50px;
                position: relative;
                padding: 0;
                text-align: center;
            }
            .track_tbl td.track_dot:after {
                content: "\f111";
                font-family: FontAwesome;
                position: absolute;
                margin-left: -5px;
                top: 11px;
                color: #cccccc;
            }
            .track_tbl td.track_dot span.track_line {
                background: #cccccc;
                width: 3px;
                min-height: 50px;
                position: absolute;
                height: 101%;
            }
            .track_tbl tbody tr:first-child td.track_dot span.track_line {
                top: 30px;
                min-height: 25px;
            }
            .track_tbl tbody tr:last-child td.track_dot span.track_line {
                top: 0;
                min-height: 25px;
                height: 10%;
            }
        </style>