<section class='invoice'>
  <!-- title row -->
  <div class='row'>
    <div class='col-xs-12'>
      <h2 class='page-header'>
        <i class='fa fa-globe'></i> DETAIL STOCK MATERIAL
      </h2>
    </div>
    <!-- /.col -->
  </div>
  <!-- info row -->
  <div class='row invoice-info'>
    <div class='col-sm-6 invoice-col'>
      <table width="100%" border="0" cellspacing="0" cellpadding="4">
        <tr>
            <td width="25%">Nama Material</td>
            <td width="5%">:</td>
            <td width="70%"><?php echo $stock->nama_kat_stock ?></td>
        </tr>
        <tr>
            <td>Jenis Material</td>
            <td>:</td>
            <td><?php echo $stock->nama_material_stock ?></td>
        </tr>
        <tr>
            <td>Satuan Unit</td>
            <td>:</td>
            <td><?php echo $stock->satuan_stock ?></td>
        </tr>

      </table>
    </div>
    <!-- /.col -->

  </div>
  <!-- /.row -->
  <br/>
  <h2 class='page-header'></h2>
  <!-- Table row -->
  <div class='row'>
    <div class='col-xs-12 table-responsive'>
      <table class='table table-striped'>
        <thead>
          <tr>
            <th>Kandang</th>
            <th>Nama Material</th>
            <th>QTY</th>
            <th width="200px">Satuan Unit</th>
          </tr>
        </thead>
        <tbody>
        <?php
          $no = 1;
          foreach ($record->result_array() as $row){
          echo "<tr>
            <td style='text-align:center;'>$row[kandang]</td>
            <td style='text-align:center;'>$row[nama_stock]</td>
            <td style='text-align:center;'>$row[jml_stock]</td>
            <td style='text-align:center;'>$row[satuan]</td>
          </tr>
          ";
        $no++;
        } ?>
        </tbody>
      </table>
    </div>
    <!-- /.col -->
  </div>

</section>