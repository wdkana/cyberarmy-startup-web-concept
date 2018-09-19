<div class="panel panel-flat border-left-lg border-left-danger">
    <div class="panel-heading">
        <h5 class="panel-title">
            <?php echo strtoupper($tittle);?>
        </h5>
    </div>
    <div class="panel-body">
        <div class="container">
            <div class="row">
                <style>
                    .btn-circle {
                        border-radius: 100%;
                        width: 250px;
                        height: 250px;
                    }

                    .icon {
                        font-size: 72px;
                    }

                    .text {
                        font-size: 36px;
                    }
                    .cover{
                        padding: 60px;
                    }
                </style>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="cover">
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                            <a  class="btn btn-primary btn-circle" href="<?php echo site_url('verifikasi/sim');?>">
                                <br><br><br>
                                <i class="icon-credit-card2 icon">
                                </i>
                                <br>
                                <p class="text">SIM</p>
                            </a>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                            <a class="btn btn-danger btn-circle" href="<?php echo site_url('verifikasi/ktp');?>">
                                <br><br><br>
                                <i class="icon-vcard icon">
                                </i>
                                <br>
                                <p class="text">KTP</p>
                            </a>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                            <a class="btn btn-success btn-circle" href="<?php echo site_url('verifikasi/passport');?>">
                            <br><br><br>
                                <i class="icon-address-book icon">
                                </i>
                                <br>
                                <p class="text">PASSPORT</p>
                             </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>