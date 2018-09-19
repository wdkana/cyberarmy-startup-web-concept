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
                        <th>Di Laporkan Oleh</th>

                        <th>Target</th>
                        <th class="text-center">Konfirmasi Perusahaan</th>
                        <th class="text-center">Konfirmasi Admin</th>
                        <th class="text-center">Beri Score</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no= 1; foreach ($get_submit['rows'] as $key => $value) {?>
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
                    
                        <td>
                            <?php echo $value->target;?>
                        </td>
                        <td class="text-center">
                            <span class="<?php if($value->status_terima == 'iya'){echo "label bg-teal-400 ";}else{echo "label bg-danger-400
                                ";}?>">
                                <?php echo $value->status_terima;?>
                            </span>
                        </td>
                          <td class="text-center">
                            <span class="<?php if($value->konfirmasi == 'iya'){echo "label bg-teal-400 ";}else{echo "label bg-danger-400
                                ";}?>">
                                <?php echo $value->konfirmasi;?>
                            </span>
                        </td>

                        <td class="text-center" width="20%">
                            <a href="#" data-kd="<?php echo $value->kd_user;?>" data-scc="<?php echo $value->score;?>" data-sc="5" class="btn bg-danger-400 btn-icon btn-rounded legitRipple score"
                                title="Beri Score 05">
                                low
                            </a>
                           
                            <a href="#" data-kd="<?php echo $value->kd_user;?>" data-scc="<?php echo $value->score;?>" data-sc="10" class="btn bg-warning-400 btn-icon btn-rounded legitRipple score"
                                title="Beri Score 10">
                               med
                            </a>
                            <a href="#" data-kd="<?php echo $value->kd_user;?>" data-scc="<?php echo $value->score;?>" data-sc="15" class="btn bg-success-400 btn-icon btn-rounded legitRipple score"
                                title="Beri Score 15">
                               high
                            </a>
                            <!-- <a data-kd="<?php echo $value->kd_program;?>" class="btn bg-warning-400 btn-icon btn-rounded legitRipple tolak"><i class="icon icon-hand"></i></a> -->
                        </td>
                        <td class="text-center" width="20%">
                                 
                            <a href="<?php echo base_url();?>index.php/mejadankursi/lihat_laporan?kd_program=<?php echo $value->kd_program;?>&kd_user=<?php echo $value->kd_user; ?>" class="btn bg-success-400 btn-icon btn-rounded legitRipple"
                                title="Lihat Laporan">
                               <i class="icon icon-eye" aria-hidden="true"></i>
                            </a>

                            <a href="#" data-kd="<?php echo $value->kd_program; ?>" data-scc="iya" class="btn bg-warning-400 btn-icon btn-rounded legitRipple konfirmasi"
                                title="Terima Laporan">
                               <i class="icon icon-check" aria-hidden="true"></i>
                            </a>

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
        $("a.konfirmasi").click(function (e) {
            var kd_program = $(this).attr("data-kd");
            var konfirmasi = $(this).attr("data-scc");
            swal({
                title: 'Konfirmasi',
                text: "Terima submit report ini?",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya',
                cancelButtonText: 'Tidak',
                confirmButtonClass: 'btn btn-success-400',
                cancelButtonClass: 'btn btn-danger-400',
                buttonsStyling: true
            }, function () {
                $.post("<?php echo site_url('mejadankursi/proses_konfirmasi_laporan');?>", { kd_program: kd_program, konfirmasi: konfirmasi }, function (data, response) {
                    if (response == "success") {
                window.location.reload();

                    } else {

                window.location.reload();
                    }
                });
            });

        });
</script>

<script type="text/javascript">
        $("a.score").click(function (e) {
            var kd_user = $(this).attr("data-kd");
            var score = $(this).attr("data-sc");
            var score_awal = $(this).attr("data-scc");
            var score_akhir = (Number(score_awal) + Number(score));
            swal({
                title: 'Konfirmasi',
                text: "Yakin Akan Menambah Score Reserchear Ini?",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya',
                cancelButtonText: 'Tidak',
                confirmButtonClass: 'btn btn-success-400',
                cancelButtonClass: 'btn btn-danger-400',
                buttonsStyling: true
            }, function () {
                $.post("<?php echo site_url('mejadankursi/prosess_tambah_score');?>", { kd_user: kd_user,score: score_akhir }, function (data, response) {
                    if (response == "success") {
                        swal("Nilai Tertambah!", "", "success");
                    } else {
                        swal("Nilai Gagal Tertambah!", "", "warning");
                    }
                });
                window.location.reload();
            });

        });
</script>
