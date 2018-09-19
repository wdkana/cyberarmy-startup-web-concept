<div class="row">
    <table class="table table-bordered table-hover">
        <thead>
            <tr class="bg-indigo">
                <th>No</th>
                <th>Nama Aplikasi</th>
                <th>Info</th>
                <th>Target</th>
                <th>Keparahan</th>
                <th>Di Laporkan Oleh</th>
                <th>Attachment</th>
                <th class="text-center">Konfirmasi Perusahaan</th>
                <th class="text-center">Konfirmasi Admin CA</th>
                <th class="text-left">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if($get_submit['total']==0){ echo '<tr><td colspan="9" class="text-center">Tidak Ada Program</td></tr>';}else{?>
            <?php $no= 1; foreach ($get_submit['rows'] as $key => $value) {?>
            <tr>
                <td>
                    <?php echo $no++; ?>
                </td>
                <td>
                    <?php echo $value->nama_aplikasi; ?>
                </td>
                <td>
                    <?php echo $value->info; ?>
                </td>
                <td>
                    <?php echo $value->target; ?>
                </td>
                <td>
                    <?php echo $value->keparahan; ?>
                </td>
                <td>
                    <?php echo $value->username; ?>
                </td>
                <td>
                    <a href="<?php echo base_url().'index.php/dashboard/lakukan_download/'.$value->attachment;?>"><?php echo $value->attachment;?></a>
                </td>
                <td>
                    <?php echo $value->status_terima; ?>
                </td>
                <td>
                    <?php echo $value->konfirmasi; ?>
                </td>

                <td>
                    <?php if($value->konfirmasi == "iya"){

                        ?>
                <a href="<?php echo site_url('dashboard/detail_daftar_submit').'/'.$value->kd_user;?>" class="btn border-indigo btn-flat btn-icon btn-rounded legitRipple text-indigo-400" title="Detail Program">
                        <i class="icon icon-eye" aria-hidden="true"></i>
                        </i>
                    </a>
                    <?php } ?>
                     <?php if($value->konfirmasi == "tidak"){

                        ?>
                        <button onclick="errorview()" class="btn border-indigo btn-flat btn-icon btn-rounded legitRipple text-indigo-400">
                        <i class="icon icon-eye" aria-hidden="true""></i>
                        </button>
                    <?php } ?>

                </td>
            </tr>
            <?php } }?>
        </tbody>
    </table>
</div>
<script type="text/javascript">
    function errorview(){
        alert('Submit program sedang dalam validasi...');
    }
</script>