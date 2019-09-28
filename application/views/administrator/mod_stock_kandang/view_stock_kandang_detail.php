<section class='invoice'>
      <!-- title row -->
      <div class='row'>
        <div class='col-xs-12'>
          <h2 class='page-header'>
            <i class='fa fa-globe'></i> DETAIL STOCK KANDANG
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class='row invoice-info'>
        <div class='col-sm-6 invoice-col'>
          <table width="100%" border="0" cellspacing="0" cellpadding="4">
              <tr>
                  <td width="25%">No Chikin</td>
                  <td width="5%">:</td>
                  <td width="70%"><?php echo $chickin->no_chickin ?></td>
              </tr>
              <tr>
                  <td>Kandang</td>
                  <td>:</td>
                  <td><?php echo $chickin->nama_kandang ?></td>
              </tr>
              <tr>
                  <td>Plant</td>
                  <td>:</td>
                  <td><?php echo $chickin->nama_plant ?></td>
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
          <table id='example1' class='table table-bordered table-striped table-condensed'>
            <thead>

            <tr>
              <th>NO</th>
              <th>Nama Material</th>
              <th>Kat Material</th>
              <th>QTY</th>
              <th >Satuan Unit</th>
            </tr>
            </thead>
            <tbody>
          <?php
            $no = 1;
            foreach ($record->result_array() as $row){
            echo "<tr>
              <td>$no</td>
              <td>$row[nama_stock]</td>
              <td>$row[nama_kat]</td>
              <td>$row[jml_stock]</td>
              <td>$row[satuan] </td>
            </tr>

            ";
            $no++;
            }
          ?>
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
    </section>