

<section class='invoice'>
      <!-- title row -->
      <div class='row'>
        <div class='col-xs-12'>
          <h2 class='page-header'>
            <i class='fa fa-globe'></i> DETAIL LAPORAN KANDANG
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class='row invoice-info'>
        <div class='col-sm-6 invoice-col'>
          <table width="100%" border="0" cellspacing="0" cellpadding="4">
              <tr>
                  <td width="25%">No ChickIn</td>
                  <td width="5%">:</td>
                  <td width="70%"><?php echo $jadwal->no_chickin ?></td>
              </tr>
              <tr>
                  <td>Plant</td>
                  <td>:</td>
                  <td><?php echo $jadwal->nama_plant ?></td>
              </tr>
              <tr>
                  <td>Kandang</td>
                  <td>:</td>
                  <td><?php echo $jadwal->nama_kandang ?></td>
              </tr>
              <tr>
                  <td>Tanggal Record</td>
                  <td>:</td>
                  <td><?php echo tgl_slash($jadwal->tgl_pembuatan) ?></td>
              </tr>

          </table>
        </div>
        <!-- /.col -->


      </div>
      <!-- /.row -->

      <br/>
      <h2 class='page-header'>Record Feed</h2>

      <div class='row'>
        <div class='col-xs-12 table-responsive'>
          <table class='table table-striped'>
            <thead>

            <tr>
              <th>No</th>
              <th>Material Feed</th>
              <th>Qty Jantan</th>
              <th>Qty Betina</th>
              <th>Qty Total</th>
              <th>Satuan Unit</th>
              <th>Rupiah Unit</th>
              <th>Total Rupiah</th>
            </tr>
            </thead>

          <?php
            $no = 1;
            $feedtot =0;
            foreach ($feed->result_array() as $row){
              $tot = $row['jml_pakan']*$row['hb'];
              $feed2[] = $row['jml_pakan']*$row['hb'];
              $feedtot = array_sum($feed2);

            echo "  <tbody><tr>
              <td>$no</td>
              <td>$row[nama_feed]</td>
              <td style='text-align:center;'>$row[jml_jantan]</td>
              <td style='text-align:center;'>$row[jml_betina] </td>
              <td style='text-align:center;'>$row[jml_pakan]</td>
              <td style='text-align:center;'>$row[satuan]</td>
              <td style='text-align:center;'>".rupiah($row['hb'])."</td>
              <td style='text-align:center;'> ".rupiah($tot)."</td>
            </tr>
            ";
          $no++;
          }
          ?>
            </tbody>
            <thead>
              <tr bgcolor='fff1'>
                <th style='width:20px'></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>

                <th></th>
                <th>Jumlah Total</th>
                <th><?php echo rupiah($feedtot);?></th>
              </tr>
            </thead>
          </table>


            <!-- /.col -->
            <br/>
            <h2 class='page-header'>Record Ovk</h2>

            <div class='row'>
              <div class='col-xs-12 table-responsive'>
                <table class='table table-striped'>
                  <thead>

                  <tr>
                    <th>No</th>
                    <th>Material Ovk</th>
                    <th>Qty Total</th>
                    <th>Satuan Unit</th>
                    <th>Rupiah Unit</th>
                    <th>Total Rupiah</th>
                  </tr>
                  </thead>

                <?php
                  $no = 1;
                  $ovktot = 0;
                  foreach ($ovk->result_array() as $row){
                    $totovk = $row['jml_ovk']*$row['hb'];
                    $ovk2[] = $row['jml_ovk']*$row['hb'];
                    $ovktot = array_sum($ovk2);

                  echo " <tbody><tr>
                    <td>$no</td>
                    <td>$row[nama_ovk]</td>
                    <td style='text-align:center;'>$row[jml_ovk]</td>
                    <td style='text-align:center;'>$row[satuan]</td>
                    <td style='text-align:center;'>$row[hb]</td>

                    <td style='text-align:center;'>".rupiah($totovk)." </td>
                  </tr>
                  ";
                $no++;
                }
                ?>
                  </tbody>
                  <thead>
                    <tr bgcolor='fff1'>
                      <th style='width:20px'></th>
                      <th></th>
                      <th></th>

                      <th></th>
                      <th>Jumlah Total</th>
                      <th><?php echo rupiah($ovktot);?></th>
                    </tr>
                  </thead>
                </table>


                <br/>
                <h2 class='page-header'>Record Bw</h2>

                <div class='row'>
                  <div class='col-xs-12 table-responsive'>
                    <table class='table table-striped'>
                      <thead>

                      <tr>
                        <th>Jantan</th>
                        <th>Betina</th>
                        <th>Satuan Unit</th>
                      </tr>
                      </thead>

                    <?php
                      $no = 1;
                      foreach ($bw->result_array() as $row){


                      echo " <tbody><tr>
                        <td style='text-align:center;'>$row[jml_jantan]</td>
                        <td style='text-align:center;'>$row[jml_betina]</td>
                        <td style='text-align:center;'>$row[satuan_bw] </td>

                      </tr>
                      ";
                    $no++;
                    }
                    ?>
                      </tbody>
                    </table>

                    <br/>
                    <h2 class='page-header'>Record Ps</h2>

                    <div class='row'>
                      <div class='col-xs-12 table-responsive'>
                      <table class='table table-striped'>
                          <thead>

                          <tr>
                            <th>No</th>
                            <th>Populasi Awal Jantan</th>
                            <th>Populasi Awal Betina</th>
                            <th>Jantan Mati</th>
                            <th>Jantan Cull</th>
                            <th>Jantan Seleksi</th>
                            <th>Jantan Afkir</th>
                            <th>Betina Mati</th>
                            <th>Betina Cull</th>
                            <th>Betina Seleksi</th>
                            <th>Betina Afkir</th>
                            <th>Total Populasi Jantan</th>
                            <th>Total Populasi Betina</th>
                          </tr>
                          </thead>
                          
                          <?php
                          $no = 1;
                          $psmaletot = 0;
                          $psfemaletot = 0;

                          // for($i = 0;$i <= $row['id_jadwal'];$i++) {
                          foreach ($ps->result_array() as $row){
                          // $psmale = $row['jml_jantan']-$row['total_male'];
                          // $psmale2[] = $row['jml_jantan']-$row['total_male'];
                          // $psfemale = $row['jml_betina']-$row['total_female'];
                          // $psfemale2[] = $row['jml_betina']-$row['total_female'];
                          // $psmaletot = array_sum($psmale2);
                          // $psfemaletot = array_sum($psfemale2);
                          // $ps2 = $this->db->query("SELECT tb_jadwal.*, tb_populasi_detail.*, tb_kandang.nama_kandang AS kandang, tb_chickin.jml_jantan AS male, tb_chickin.jml_betina AS female, tb_chickin.total_harga AS tharga, tb_populasi_detail.total_male AS tmale, tb_populasi_detail.total_female AS tfemale, tb_populasi_detail.total_akhir AS takhir FROM tb_jadwal
                          //   JOIN tb_chickin ON tb_jadwal.id_chickin = tb_chickin.id_chickin
                          //   JOIN tb_plant ON tb_chickin.id_plant = tb_plant.id_plant
                          //   JOIN tb_kandang ON tb_chickin.id_kandang = tb_kandang.id_kandang
                          //   JOIN tb_populasi_detail ON tb_chickin.id_chickin = tb_populasi_detail.id_chickin
                          //   WHERE tb_chickin.id_chickin AND tb_chickin.status_chickin = '1' GROUP BY tb_populasi_detail.id_jadwal")->row_array();
                          $ps2 = $this->db->query("SELECT tb_jadwal.*, tb_populasi_detail.*, tb_chickin.jml_jantan AS male, tb_chickin.jml_betina AS female, tb_chickin.total_harga AS tharga, tb_populasi_detail.total_male AS tmale, tb_populasi_detail.total_female AS tfemale, tb_populasi_detail.total_akhir AS takhir FROM tb_jadwal
                            JOIN tb_chickin ON tb_jadwal.id_chickin = tb_chickin.id_chickin
                            JOIN tb_populasi_detail ON tb_chickin.id_chickin = tb_populasi_detail.id_chickin
                            WHERE tb_jadwal.id_chickin = '".$row['id_jadwal']."' AND tb_chickin.status_chickin = '1' GROUP BY tb_jadwal.id_jadwal LIMIT 1")->row_array();

                          $cc[] = $row['tmale'];
                          $jpsmale = array_sum($cc);
                          $tjpsmale = $row['male'] - $jpsmale;

                          $dd[] = $ps2['tfemale'];
                          $jpsfemale = array_sum($dd);
                          $tjpsfemale = $row['female'] - $jpsfemale;

                          echo " <tbody><tr>
                            <td>$no</td>
                            <td style='text-align:center;'>$row[male]</td>
                            <td style='text-align:center;'>$row[female]</td>
                            <td style='text-align:center;'>$row[male_mati] </td>
                            <td style='text-align:center;'>$row[male_cull] </td>
                            <td style='text-align:center;'>$row[male_seleksi] </td>
                            <td style='text-align:center;'>$row[male_afkir] </td>
                            <td style='text-align:center;'>$row[female_mati] </td>
                            <td style='text-align:center;'>$row[female_cull] </td>
                            <td style='text-align:center;'>$row[female_seleksi] </td>
                            <td style='text-align:center;'>$row[female_afkir] </td>
                            <td style='text-align:center;'>$tjpsmale</td>
                            <td style='text-align:center;'>$tjpsfemale</td>

                          </tr>
                          ";
                          $no++;
                          }

                          // }
                          ?>

                          </tbody>
                          <tfoot>
                            <tr bgcolor='fff1'>
                              <th style='width:20px'></th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th>Jumlah Total</th>
                              <th><!-- <?= ($tjpsmale)?> --></th>
                              <th><!-- <?= ($tjpsfemale)?> --></th>
                            </tr>
                          </tfoot>
                        </table>
    </section>
