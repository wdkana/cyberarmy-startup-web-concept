<div class="panel">
<style>
      .bounty-section{
        margin-bottom: 2rem;
    }
    .bc-link-list{
        display: block;
        list-style-type: none;
        background: #d6e0f1;
        padding: 15px;
    }
    .panel-image img{
      width :150px;
    }
    </style>
    <?php foreach ($get_program['rows'] as $key => $value) { ?>
    <div class="panel-heading">
        <h5 class="panel-image"><img src="<?php echo base_url();?>assets/img/<?php echo $value->foto;?>" alt="">
        &nbsp;&nbsp;&nbsp;<?php echo $value->kd_program;?>&nbsp;|&nbsp;<?php echo $value->nama_aplikasi;?>
        </h5>
    </div>
    <?php } ?>
    <div class="panel-body">
        <?php foreach ($get_program['rows'] as $key => $value) { ?>
        <table class="table table-bordered">
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
                    <th class="text-center">Nama Organisasi</th>
                    <td>
                        <?php echo $value->nama_organisasi;?>
                    </td>
                </tr>
                <tr>
                    <th class="text-center">Pembuat</th>
                    <td>
                        <?php echo $value->username;?>
                    </td>
                </tr>
                <tr>
                    <th class="text-center">Status Publish</th>
                    <td>
                        <?php echo $value->status;?>
                    </td>
                </tr>
                <tr>
                    <th class="text-center">Deskripsi</th>
                    <td>
                        <?php echo $value->deskripsi;?>
                    </td>
                </tr>
                <tr>
                    <th class="text-center">Target</th>
                    <td>
                        <?php echo $value->informasi_target;?>
                    </td>
                </tr>
         
            </thead>
            <?php } ?>
        </table>
    </div>
</div>