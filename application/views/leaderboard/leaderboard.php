<style>
.borderless td,.borderless th{
    border: none;
}
.borderless table{
    border-top-style: none;
    border-left-style: none;
    border-right-style: none;
    border-bottom-style: none;
}
table{
    border-color:transparant;
}
</style>
<div class="panel panel-flat border-left-lg border-left-indigo">
    <div class="panel-heading">
        <h5 class="panel-title">
        </h5>
    </div>
    <div class="panel-body">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-offset-3 col-md-6">
                        <table class="table borderless">
                            <thead>
                                <tr>
                                    <th>Ranking</th>
                                    <th>Nama</th>
                                    <th>Score</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=1; foreach ($get_data['rows'] as $key => $value) { ?>
                                <tr>
                                    <td width="1%" style="text-align:center;">
                                        <?php if($no==1||$no==21){?>
                                        <?php echo $no++;?>&nbsp;st
                                        <?php } else if($no==2||$no==22){ ?>
                                        <?php echo $no++;?>&nbsp;nd
                                        <?php } else if($no==3){ ?>
                                        <?php echo $no++;?>&nbsp;rd
                                        <?php } else { ?>
                                        <?php echo $no++;?>&nbsp;th
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <?php if(($value->foto) ==null){?>
                                        <img src="<?php echo base_url();?>assets/img/default-avatar.png" width="40" height="40" class="img-circle">
                                        &nbsp;&nbsp;<?php echo $value->username;?>
                                        <?php }else{ ?>
                                        <img src="<?php echo base_url();?>assets/img/<?php echo $value->foto;?>" width="40" height="40" class="img-circle">
                                        &nbsp;&nbsp;<?php echo $value->username;?>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <span class="badge bg-indigo">
                                            <?php echo $value->score;?>
                                        </span>
                                    </td>
                                </tr>
                                <?php  }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>