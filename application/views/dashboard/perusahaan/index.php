<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h1 class="text-bold" style="font-size:36px;">Selamat Datang Di Fix Bug</h1>
            <p style="font-size: 16px;">To get started you will need to create your first program. Every program goes through a review process to ensure
                you have the best chance to get great results.</p>
            <a href="<?php echo site_url('program/program_new');?>" class="btn bg-indigo-600">Jalankan Program</a>
        </div>
    </div>
    <br>
    <br>
</div>    
<div class="row">
    <table class="table table-bordered table-hover">
        <thead>
            <tr class="bg-indigo">
                <th>No</th>
                <th>Nama Aplikasi</th>
                <th>Nama Organisasi</th>
                <th class="text-center">Status</th>
                <th class="text-left">Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php if($get_data['total']==0){ echo '<tr><td colspan="5" class="text-center">Tidak Ada Program</td></tr>';}else{?>
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
                <td class="text-center">
                    <span class="<?php if($value->status == 'ya'){echo "label bg-teal-400";}else if($value->status=='tidak'){echo "label bg-warning-400";}else{echo "label bg-danger-400 ";}?>">
                        <?php 
                        if($value->status =='ya'){echo 'active';}
                        else if($value->status =='tidak'){echo 'pending';}
                        else{echo 'Decline';}
                        ?>    
                    </span>
                </td>
                <td class="text-left">
                    <a href="<?php echo site_url('program/detail_program').'/'.$value->kd_program;?>" class="btn border-indigo btn-flat btn-icon btn-rounded legitRipple text-indigo-400" title="Detail Program">
                        <i class="icon icon-eye" aria-hidden="true"></i>
                        </i>
                    </a>
                    <a href="<?php echo site_url('dashboard/daftar_submit').'/'.$value->kd_program;?>" class="btn border-teal btn-flat btn-icon btn-rounded legitRipple text-teal-400" title="Daftar Submit Program">
                        <i class="icon icon-folder-search" aria-hidden="true"></i>
                        </i>
                    </a>
                    <?php if($value->status =='ya'){?>
                        <a href="<?php echo site_url('program/edit_program').'/'.$value->kd_program;?>" class="btn border-warning btn-flat btn-icon btn-rounded legitRipple text-warning-400" title="Edit Program">
                            <i class="icon icon-pencil7" aria-hidden="true"></i>
                            </i>
                        </a>
                    <?php }else{}?>
                    <a class="btn border-danger btn-flat btn-icon btn-rounded legitRipple text-danger-400 hapus" title="Hapus Program" data-kd="<?php echo $value->kd_program;?>">
                        <i class="icon icon-trash" aria-hidden="true"></i>
                        </i>
                    </a>
                </td>
            </tr>
            <?php } ?>
        <?php } ?>
        </tbody>
    </table>
</div>
<script type="text/javascript">
  $(document).ready(function() {
     $("a.hapus").click(function(e){
      var kd_program =$(this).attr("data-kd");
        swal({
          title: 'Konfirmasi',
          text: "Yakin Menghapus ?",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Ya',
          cancelButtonText: 'Tidak',
          confirmButtonClass: 'btn btn-success',
          cancelButtonClass: 'btn btn-danger',
          buttonsStyling: false
        
        },function(){
          $.post("<?php echo site_url('program/delete');?>",{kd_program:kd_program},function(data,response){
            if(response=="success"){
              swal("Data Terhapus!", "", "success");
            }else{
              swal("Gagal dihapus!", "", "warning");
            }
          });
          window.location.reload();
        });
     });
  });
</script>