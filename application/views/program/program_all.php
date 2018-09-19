<link rel="stylesheet" href="<?php echo base_url();?>assets/css/card.css">
<div class="panel panel-flat border-left-lg border-left-indigo">
    <div class="panel-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-9">
                    <div class="panel-body">
                        <div class="row">
                        <?php if($get_data['total'] <= 0){ echo "Tidak Ada Program";}else{?>
                            <?php foreach ($get_data['rows'] as $key => $value) { ?>
                            <div class="col-sm-6 col-md-4 col-lg-4 mt-4">
                                <div class="card">
                                    <img class="card-img-top" src="<?php echo base_url();?>assets/img/<?php echo $value->foto;?>">
                                    <div class="card-block">
                                        <h4 class="card-title mt-3"><?php echo $value->nama_organisasi?></h4>
                                        <div class="meta">
                                            <a>Rewards : Point</a>
                                        </div>
                                        <div class="card-text" style="overflow:hidden;">
                                        <?php echo $value->deskripsi_singkat;?>  
                                    </div>
                                    </div>
                                    <div class="card-footer">
                                        <a href="<?php echo site_url('program/program_da/'.$value->kd_program);?>" class="btn btn-default float-right btn-sm">Submit Report</a>
                                        <!-- <button class="btn btn-secondary float-right btn-sm">Submit Report</button> -->
                                    </div>
                                </div>
                                <br>
                            </div>
                            <?php } }?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>