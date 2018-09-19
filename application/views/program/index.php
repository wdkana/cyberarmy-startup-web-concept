<style>
    .content {
        padding: 20px 20px 60px 20px;
    }

    .bg-rounded {
        border-radius: 8px;
    }

    ul.participants-list li img {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        margin-right: .5rem;
    }

    .bc-avatar {
        box-sizing: border-box;
        flex: 0 0 auto;
        background-size: cover;
    }

    ul.participants-list {
        list-style-type: none;
        margin: 0 0 1rem;
    }

    .bounty-header-text {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .bounty-section{
        margin-bottom: 2rem;
    }
    .bc-link-list{
        display: block;
        list-style-type: none;
        background: #d6e0f1;
        padding: 15px;
    }
</style>
<div class="panel panel-flat">
<?php foreach ($get_data['rows'] as $key => $value) { ?>"
    <header class="bc-grid bounty-header dark-bg" id="page-header">
        <div class="container">
            <div class="row">
                <div class="page-title col-xs-12 col-sm-8 col-md-9">
                    <div class="container">
                        <img class="bg-rounded" src="<?php echo base_url();?>assets/img/<?php echo $value->foto;?>" width="200" width="auto">
                    </div>
                    <br>
                    <div class="container">
                        <h1 class="text-bold text-white"><?php echo $value->nama_aplikasi;?></h1>
                        <p class="text-white"><?php echo $value->deskripsi_singkat;?></p>
                        <div class="stats">
                            <p class="reward text-white">
                                <strong class="text-white">$100 – $3,000</strong>
                                per vulnerability
                            </p>
                        </div>
                    </div>
                </div>
                <div class="program-actions col-xs-12 col-sm-4 col-md-3 text-right container">
                    <br>
                    <?php if($get_submit['total']<=0){?>
                                <a class="btn btn-default" href="<?php echo site_url('program/program_submit/');?><?php echo $value->kd_program;?>">Submit report
                                </a>
                    <?php }else{ ?>
                        <a class="btn btn-default" id="alert" href="#">Submit report
                                </a>
                    <?php } ?>
                    <form class="new_subscription" id="new_subscription" action="/kyivstar/program_subscribers.json" accept-charset="UTF-8" data-remote="true"
                        method="post">
                        <input name="utf8" type="hidden" value="✓">
                    </form>
                    <br><br>
                </div>
            
            </div>
        </div>
    </header>
    <br>
    <style>
    .img-circle2{
        max-height: 50px;
        margin-top: -3.5px;
        border-radius: 50%;
    }
    </style>
    <div class="panel-body">
        <div class="container">
            <section>
                <div class="row">
                    <div class="rp-sidebar col-md-4 col-md-push-8">
                        <div class="panel">
                            <div class="panel-heading">
                                <h2 class="panel-title">
                                    Program stats
                                </h2>
                            </div>
                            <div class="panel-body">
                                <p class="stat">
                                    <strong>28</strong>
                                    <span>
                                        vulnerabilities rewarded
                                    </span>
                                </p>
                                <p class="stat">
                                    <span>Validation within</span>
                                    <strong>6 days</strong>
                                    <br>
                                    <span class="tiny soft">
                                        75% of submissions are accepted or rejected within 6 days
                                    </span>
                                </p>
                                <p class="stat">
                                    <strong>$428.41</strong>
                                    average payout (last 3 months)
                                </p>
                            </div>
                        </div>
                        <div class="panel">
                            <div class="panel-heading">
                                <h2 class="panel-title">
                                Latest hall of famers
                                </h2>
                            </div>
                            <div class="panel-body">
                            <?php if($get_submit_photo['total'] <= 0){echo "<p> no researcher submitted </p>";}else{ ?>
                                <?php foreach ($get_submit_photo['rows'] as $key => $value) { ?>
                                    <?php if($value->foto == null){ ?>
                                        <img src="<?php echo base_url();?>assets/img/default-avatar.png" title="<?php echo $value->username;?>"class="img-circle2" alt="">
                                    <?php }else{?>
                                        <img src="<?php echo base_url();?>assets/img/<?php echo $value->foto;?>" title="<?php echo $value->username;?>"class="img-circle2" alt="">
                                    <?php }?>
                                <?php } ?>
                            <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="bounty-content col-md-8 col-md-pull-4">
                        <div class="bounty-description bounty-section">
                            <div class="markdown-body no-padding">
                            <h2>Deskripsi</h2>
                            <?php echo $value->deskripsi;?>
                            </div>
                        </div>
                        <section>
                        <h2>Informasi Target</h2>
                            <?php echo $value->informasi_target;?>
                        </section>
                    </div>
                </div>
            </section>
        </div>
    </div>
            <?php } ?>
</div>
<script>
$( "#alert" ).click(function() {
    swal("Peringatan", "Anda Telah Submit Report,Mohon Tunggu selesai di prosess oleh Costumer", "error");
});
</script>