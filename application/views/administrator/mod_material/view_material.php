<div class="col-xs-12">
  <div class="box table-responsive padding">

    <div class="box-header">
      <h3 class="box-title">Material</h3>
      <a class='pull-right btn btn-primary btn-sm' href='<?php echo base_url(); ?>material/add_material'>Tambahkan Data</a>
    </div><!-- /.box-header -->
    <div class="box-body">
      <form method="get" action="<?php echo base_url();?>material">
      <div class="box-body">
      <table id='example1' class='table table-bordered table-striped table-condensed'>
        <thead>

          <tr bgcolor='#00c0ef'>
            <th style='width:20px'>No</th>
            <th>Material</th>
            <th>Jenis Material</th>
            <th>Satuan</th>
            <th>Supplier</th>
            <!-- <th>Harga Beli</th> -->
            <th>Aktif</th>
            <th style='width:60px'>Action</th>
          </tr>
        </thead>
        <tbody>

        <?php
        $no = 1;
        foreach ($record as $row){
        echo "<tr ><td >$no</td>
                  <td>$row[nama_kat_stock]</td>
                  <td>$row[nama_material_stock]</td>
                  <td>$row[satuan_stock]</td>
                  <td>$row[nama_supplier]</td>
                  <td>$row[publish]</td>
                  <td><center>
                    <a class='btn btn-success btn-xs' title='Edit Data' href='".base_url()."material/edit_material/$row[id_kat_stock]'><span class='glyphicon glyphicon-edit'></span></a>
                    <a class='btn btn-danger btn-xs' title='Delete Data' href='".base_url()."material/delete_material/$row[id_kat_stock]' onclick=\"return confirm('Apa anda yakin untuk hapus Data ini?')\"><span class='glyphicon glyphicon-remove'></span></a>
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


<!-- <td>$row[harga_beli]</td> -->