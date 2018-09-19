

<div class="row">
<style>
    .borderles > thead > tr > .ada{
        border:none;
    }
    .borderles > thead > td > .ada{
        border:none;
    }
    </style>
<div class="panel-body">
        <?php foreach ($get_submit['rows'] as $key => $value) { ?>
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th class="text-center">Kode Program</th>
                    <td>
                        <?php echo $value->kd_program;?>
                    </td>
                </tr>
                <tr>
                    <th class="text-center">Nama Aplikasi</th>
                    <td>
                        <?php echo $value->nama_aplikasi;?>
                    </td>
                </tr>
                <tr>
                    <th class="text-center">Info</th>
                    <td>
                    <?php echo $value->info; ?>
                    </td>
                </tr>
                <tr>
                    <th class="text-center">Target</th>
                    <td>
                     <?php echo $value->target; ?>   
                    </td>
                </tr>
                <tr>
                    <th class="text-center">Keparahan</th>
                    <td>
                        <?php echo $value->keparahan; ?>
                    </td>
                </tr>
                <tr>
                    <th class="text-center">Deksripsi</th>
                    <td>
                        <?php echo $value->Deskripsi; ?>
                    </td>
                </tr>
                <tr>
                    <th class="text-center">Di Laporkan Oleh</th>
                    <td>
                        <?php echo $value->username; ?>
                    </td>
                </tr>
                <tr>
                    <th class="text-center">Permintaan Http</th>
                    <td>
                        <?php echo $value->permintaan_http; ?>
                    </td>
                </tr>
                <tr>
                    <th class="text-center">Attachment</th>
                    <td>
                        <a href="<?php echo base_url().'index.php/dashboard/lakukan_download/'.$value->attachment;?>"><i class="icon-download"></i>&nbsp;Download</a>
                    </td>
                </tr>
                <tr>
                    <th class="text-center">Status Terima</th>
                    <td>
                        <?php echo $value->status_terima; ?>
                    </td>

                </tr>

                <?php if($value->status_terima == "tidak") {

                        ?>

                <?php echo form_open('program/prosess_komentar');?>
                <tr>
                    <input type="hidden" name="kd_program" value="<?php echo $value->kd_program;?>">
                    <input type="hidden" name="kd_user" value="<?php echo $value->kd_user;?>">
                </tr>
                <tr>
                    <th class="text-center ada"></th>
                    <td class="ada">
                        <button type="submit" class="btn btn-success form-control">Terima Laporan</button>
                    </td>
                </tr>

                <?php echo form_close();?>

                <?php }else{ ?>
              
                <tr>
                    <td class="ada">
                        <a class="btn btn-success form-control">Laporan Sudah Diterima</a>
                    </td>
                </tr>
                <?php } ?>
            </thead>
            <?php } ?>
        </table>
    </div>
</div>