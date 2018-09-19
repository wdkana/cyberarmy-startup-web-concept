<div class="panel">
    <?php foreach ($get_program['rows'] as $key => $value) { ?>
    <div class="panel-heading" style="background-color:<?php echo $value->warna;?>;color:#fff;">
        <h5 class="panel-title"><img src="<?php echo base_url();?>assets/img/<?php echo $value->foto;?>" alt="">
        &nbsp;&nbsp;&nbsp;<?php echo $value->kd_program;?>&nbsp;|&nbsp;<?php echo $value->nama_aplikasi;?>
        </h5>
    </div>
    <style>
    .borderles > thead > tr > .ada{
        border:none;
    }
    .borderles > thead > td > .ada{
        border:none;
    }
    </style>
    <?php } ?>
    <div class="panel-body">
    <?php echo form_open('program/prosess_edit');?>
        <?php foreach ($get_program['rows'] as $key => $value) { ?>
        <table class="table table-bordered borderles">
            <thead>
                <input type="hidden" name="kd_program" id=""  class="form-control" value="<?php echo $value->kd_program;?>"> 
                <tr>
                    <th class="text-center">Nama Aplikasi</th>
                    <td>
                       <input type="text" name="nama_aplikasi" id=""  class="form-control" value="<?php echo $value->nama_aplikasi;?>"> 
                    </td>
                </tr>
                <tr>
                    <th class="text-center">Nama Organisasi</th>
                    <td>
                       <input type="text" name="nama_organisasi" id=""  class="form-control" value="<?php echo $value->nama_organisasi;?>"> 
                    </td>
                </tr>
                <tr>
                    <th class="text-center">Deskripsi</th>
                    <td>
                        <textarea name="deskripsi" id="" cols="30" rows="10" class="form-control summernote"><?php echo $value->deskripsi;?></textarea>
                    </td>
                </tr>
                <tr>
                    <th class="text-center">Informasi Target</th>
                    <td>
                        <textarea name="informasi_target" id="" cols="30" rows="10" class="form-control summernote"><?php echo $value->informasi_target;?></textarea>
                    </td>
                </tr>
                <tr>
                    <th class="text-center ada"></th>
                    <td class="ada">
                        <button type="submit" class="btn btn-success form-control">Edit</button>
                    </td>
                </tr>
            </thead>
            <?php } ?>
        </table>
    </div>
</div>
<?php form_close(); ?>