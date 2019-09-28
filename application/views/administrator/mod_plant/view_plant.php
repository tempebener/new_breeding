<div class="col-xs-12">
  <div class="box table-responsive padding">

    <div class="box-header">
      <h3 class="box-title">Plant</h3>
      <a class='pull-right btn btn-primary btn-sm' href='<?php echo base_url(); ?>plant/add_plant'>Tambahkan Data</a>
    </div><!-- /.box-header -->
    <div class="box-body">
      <form method="get" action="<?php echo base_url();?>plant">
      <div class="box-body">
      <table id='example1' class='table table-bordered table-striped table-condensed'>
        <thead>

          <tr bgcolor='#00c0ef'>
            <th style='width:20px'>No</th>
            <th>Perusahaan</th>
            <th>Plant</th>
            <th>Alamat</th>
            <th>Telepon</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>

        <?php
        $no = 1;
        foreach ($record as $row){
        echo "<tr ><td >$no</td>
                  <td>$row[nama_perusahaan]</td>
                  <td>$row[nama_plant]</td>
                  <td>$row[alamat]</td>
                  <td>$row[telp]</td>
                  <td><center>
                    <a class='btn btn-success btn-xs' title='Edit Data' href='".base_url()."plant/edit_plant/$row[id_plant]'><span class='glyphicon glyphicon-edit'></span></a>
                    <a class='btn btn-danger btn-xs' title='Delete Data' href='".base_url()."plant/delete_plant/$row[id_plant]' onclick=\"return confirm('Apa anda yakin untuk hapus Data ini?')\"><span class='glyphicon glyphicon-remove'></span></a>
                  </center></td>
              </tr>

              ";
        $no++;
        }
        ?>
      </tbody>
    </table>
    </div>
    </div>
  </div>
</div>