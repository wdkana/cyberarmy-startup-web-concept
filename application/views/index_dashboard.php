<style>
    .bc-display-type-8 {
        font-size: 44px;
    }

    .bc-display-type-6 {
        font-size: 34px;
    }
</style>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="panel panel-flat border-left-lg border-left-indigo">
            <div class="panel-heading">
                <h5 class="panel-title">
                    <?php echo strtoupper($tittle);?>
                </h5>
            </div>
            <div class="panel-body">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel-body">
                                <?php foreach ($get_data['rows'] as $key => $value) { ?>
                                <div class="col-xs-12 col-sm-7 col-md-8">
                                    <div class="col-xs-12 col-sm-5 col-md-4">
                                        <?php if($value->foto == null){ ?>
                                        <img src="<?php echo base_url();?>assets/img/default-avatar.png" width="156" height="156" class="img-circle" alt="<?php echo $this->session->userdata('username');?>">
                                        <?php } else { ?>
                                        <img src="<?php echo base_url('assets/img/'.$value->foto);?>" width="156" height="156" class="bc-avatar bc-avatar--xl img-circle"
                                            alt="<?php echo $value->username;?>">
                                        <?php }?>
                                    </div>
                                    <div class="col-xs-12 col-sm-7 col-md-8">
                                        <h1 class="bc-display-type-6">
                                            <?php echo strtoupper($value->username);?>
                                        </h1>
                                        <p>
                                            <small>
                                                <?php echo $value->biografi;?>
                                            </small>
                                        </p>
                                        <p></p>
                                        <?php if($value->status == 'tidak'){?>
                                        <p class="text-danger text-bold">Account not yet Active</p>
                                        <br>
                                        <a href="<?php echo site_url('verifikasi');?>">Verify your identity</a>
                                        <?php }else{echo "<p class='text-success text-bold'>Account Active</p>";}?>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-5 col-md-4">
                                    <div class="row rank">
                                        <div class="col-xs-12 col-xs-offset-3 align-right">
                                            <h2 class="bc-display-type-2" style="text-align:center;">Jumlah Point</h2>
                                            <p class="bc-display-type-8 text-indigo" style="text-align:center;">
                                                <?php echo $value->score;?>
                                            </p>
                                        </div>
                                        <!-- <div class="col-xs-6 col-xs-offset-1 align-right">
                                            <h2 class="bc-display-type-2" style="text-align:center;">Ranking Saat ini</h2>
                                            <p class="bc-display-type-8 text-danger" style="text-align:center;">4</p>
                                        </div> -->
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="panel panel-flat border-bottom-lg border-bottom-indigo">
            <div class="panel-body">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel-body">
                            <?php if($get_data_submit['total'] <= 0){?>
                                <div class="text-center">
                                    <h3 class="bc-blankstate__title">Get started as a security researcher on FIXBUG</h3>
                                    <p class="bc-blankstate__description">Here are some
                                        Quick tips for a first-time security researcher or get started right away with
                                        our ongoing programs.</p>
                                    <a href="<?php echo site_url('program');?>" class="btn btn-indigo">View programs list</a>
                                </div>
                            <?php }else{?>
                                <table class="table table-hover">
                                    <thead>
                                        <tr class="bg-indigo">
                                            <th>Nama Aplikasi</th>
                                            <th>Nama Perusahaan</th>
                                            <th>Info</th>
                                            <th>Target</th>
                                            <th>Keparahan</th>
                                            <th>Di Laporkan oleh</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($get_data_submit['rows'] as $key => $ada) { ?>
                                        <tr>
                                            <td><?php echo $ada->nama_aplikasi;?></td>
                                            <td><?php echo $ada->nama_organisasi;?></td>
                                            <td><?php echo $ada->info;?></td>
                                            <td><?php echo $ada->target;?></td>
                                            <td><?php echo $ada->keparahan;?></td>
                                            <td><?php echo $ada->username;?></td>
                                        </tr>
                                    <?php }?>
                                    </tbody>
                                </table>
                            <?php }?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>