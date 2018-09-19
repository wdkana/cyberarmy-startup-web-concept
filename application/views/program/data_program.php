<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title">Simple panel
            <a class="heading-elements-toggle">
                <i class="icon-more"></i>
            </a>
        </h5>
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table datatable-show-all">
                <thead>
                    <tr class="bg-teal-400">
                        <th>No</th>
                        <th>Nama Aplikasi</th>
                        <th>Nama Organisasi</th>
                        <th>Pembuat</th>
                        <th class="text-center">Publish</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no= 1; foreach ($get_data['rows'] as $key => $value) {?>
                    <tr>
                        <td>
                            <?php echo $no++; ?>
                        </td>
                        <td>
                            <?php echo $value->nama_aplikasi;?>
                        </td>
                        <td>
                            <?php echo $value->nama_organisasi;?>
                        </td>
                        <td>
                            <?php echo $value->username;?>
                        </td>
                        <td class="text-center">
                            <span class="<?php if($value->status == 'ya'){echo " label bg-teal-400 ";}else{echo "label bg-danger-400
                                ";}?>">
                                <?php echo $value->status;?>
                            </span>
                        </td>
                        <td class="text-center" width="20%">
                            <a href="<?php echo site_url('mejadankursi/detail').'/'.$value->kd_program;?>" class="btn bg-indigo-400 btn-icon btn-rounded legitRipple"
                                title="Detail Program">
                                <i class="icon icon-eye" aria-hidden="true"></i>
                                </i>
                            </a>
                            <a class="<?php if($value->status == 'ya'){echo "btn bg-danger-400 btn-icon btn-rounded legitRipple ubah";}else{echo "btn bg-teal-400 btn-icon btn-rounded legitRipple ubah";}?>" data-kd="<?php echo $value->kd_program;?>" title="Ubah Status" data-ac="<?php if($value->status == 'ya'){echo "tidak";}else{echo "ya";}?>">
                                <i class="icon <?php if($value->status == 'ya'){echo "icon-cross2";}else{echo "icon-checkmark3";}?>" aria-hidden="true"></i>
                            </a>
                            <a data-kd="<?php echo $value->kd_program;?>" class="btn bg-warning-400 btn-icon btn-rounded legitRipple tolak"><i class="icon icon-hand"></i></a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
<script type="text/javascript">
        $("a.ubah").click(function (e) {
            var kd_program = $(this).attr("data-kd");
            var status = $(this).attr("data-ac");
            swal({
                title: 'Konfirmasi',
                text: "Yakin Akan Mengubah Status Active ?",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya',
                cancelButtonText: 'Tidak',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false
            }, function () {
                $.post("<?php echo site_url('mejadankursi/prosess_edit_status');?>", { kd_program: kd_program, status: status }, function (data, response) {
                    if (response == "success") {
                        // swal("Status Terubah!", "", "success");
                    } else {
                        // swal("Status Gagal Diubah!", "", "warning");
                    }
                });
                window.location.reload();
            });

        });
        $("a.tolak").click(function (e) {
            var kd_program = $(this).attr("data-kd");
            swal({
                title: 'Konfirmasi',
                text: "Yakin Akan Menolak Program Ini?",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya',
                cancelButtonText: 'Tidak',
                confirmButtonClass: 'btn bg-success-400',
                cancelButtonClass: 'btn bg-warning-400',
                buttonsStyling: false
            }, function () {
                $.post("<?php echo site_url('mejadankursi/prosess_tolak_status');?>", { kd_program: kd_program }, function (data, response) {
                    if (response == "success") {
                        // swal("Status Terubah!", "", "success");
                    } else {
                        // swal("Status Gagal Diubah!", "", "warning");
                    }
                });
                window.location.reload();
            });
        });
</script>