<div class="panel panel-flat">
     <div class="panel-heading">
        <h5 class="panel-title">PASSPORT
            <a class="heading-elements-toggle">
                <i class="icon-more"></i>
            </a>
        </h5>
    </div>
    <div class="panel-body">
        <?php foreach ($get_data['rows'] as $key => $value) { ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No Passport</th>
                    <td>
                        <?php echo $value->Passport;?>
                    </td>
                </tr>
                <tr>
                    <th>Foto</th>
                    <td>
                        <img src="<?php echo base_url('assets/img/'.$value->foto);?>" class="img" style="max-width: 750px; max-height: 400px;"
                                            alt="<?php echo $value->Passport;?>">
                    </td>
                </tr>
            </thead>
            <?php } ?>
        </table>
    </div>
</div>