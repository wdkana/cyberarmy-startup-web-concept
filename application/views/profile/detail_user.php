<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title">Data User
            <a class="heading-elements-toggle">
                <i class="icon-more"></i>
            </a>
        </h5>
    </div>
    <style>
    .table-user-information > tbody > tr {
        border:none;
        
    }
    .table-user-information > tbody > tr > td {
        border:none;
    }
    </style>
    <div class="panel-body">
        <div class="row">
            <?php foreach ($get_data['rows'] as $key => $value) { ?>
            <div class="col-md-3 col-lg-3 " align="center"> 
                    <?php if($value->foto == null){ ?>
                        <img src="<?php echo base_url();?>assets/img/default-avatar.png" alt="" class="img-circle img-responsive">
                        <?php }else {  ?>
                        <img src="<?php echo base_url('assets/img/'.$value->foto);?>" alt="" class="img-circle img-responsive">
                        <?php } ?>
            </div>
            <div class=" col-md-9 col-lg-9 "> 
              <table class="table table-user-information">
                <tbody>
                  <tr>
                    <td class="text-bold" width="25%">Kode User</td>
                    <td>:</td>
                    <td><?php echo $value->kd_user;?></td>
                  </tr>
                  <tr>
                    <td class="text-bold">First Name</td>
                    <td>:</td>
                    <td><?php echo $value->first_name;?></td>
                  </tr>
                  <tr>
                    <td class="text-bold">Last Name</td>
                    <td>:</td>
                    <td><?php echo $value->last_name;?></td>
                  </tr>
                  <tr>
                    <td class="text-bold">Username</td>
                    <td>:</td>
                    <td><?php echo $value->username;?></td>
                  </tr>
                  <tr>
                    <td class="text-bold">Email</td>
                    <td>:</td>
                    <td><?php echo $value->email;?></td>
                  </tr>
                  <tr>
                    <td class="text-bold">Biografi</td>
                    <td>:</td>
                    <td><?php echo $value->biografi;?></td>
                  </tr>
                  <tr>
                    <td class="text-bold">Sertifikat</td>
                    <td>:</td>
                    <td><?php echo $value->sertifikasi;?></td>
                  </tr>
                  <tr>
                    <td class="text-bold">NO KTP</td>
                    <td>:</td>
                    <?php if($value->NIK==null){echo '<td>tidak ada NO KTP</td>';}else{?>
                    <td><?php echo $value->NIK;?></td>
                    <td><a href="<?php echo site_url('mejadankursi/detail_ktp').'/'.$value->NIK;?>" class="btn bg-indigo-400 btn-icon btn-rounded legitRipple"> <i class="icon icon-eye" aria-hidden="true"></i></i></a></td>
                    <?php } ?>  
                </tr>
                  <tr>
                    <td class="text-bold">NO SIM</td>
                    <td>:</td>
                    <?php if($value->no_sim==null){echo '<td>tidak ada no sim</td>';}else{?>
                    <td><?php echo $value->no_sim;?></td>
                    <td><a href="<?php echo site_url('mejadankursi/detail_sim').'/'.$value->no_sim;?>" class="btn bg-indigo-400 btn-icon btn-rounded legitRipple"> <i class="icon icon-eye" aria-hidden="true"></i></i></a></td>
                    <?php } ?>
                </tr>
                  <tr>
                    <td class="text-bold">NO Passport</td>
                    <td>:</td>
                    <?php if($value->Passport==null){echo '<td>tidak ada Passport</td>';}else{?>
                    <td><?php echo $value->Passport;?></td>
                    <td><a href="<?php echo site_url('mejadankursi/detail_passport').'/'.$value->Passport;?>" class="btn bg-indigo-400 btn-icon btn-rounded legitRipple"> <i class="icon icon-eye" aria-hidden="true"></i></i></a></td>
                    <?php } ?>
                 </tr>
                    <td class="text-bold">Phone Number</td>
                    <td>:</td>
                    <td><?php echo $value->no_tlp;?>
                    </td>
                       
                  </tr>
                 
                </tbody>
              </table>
              <?php    }?>
            </div>
          </div>
    </div>
</div>