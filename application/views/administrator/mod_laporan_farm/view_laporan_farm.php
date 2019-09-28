<div class="col-xs-12">
  <div class="box table-responsive padding">

    <div class="box-header">
      <h3 class="box-title">Laporan Farm</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
      <div class="box-body"><form method="get" action="<?php echo base_url();?>laporan_farm">
      <div class="col-md-6">

          <div class="col-md-12 min-left">
            <div class="col-md-2">
              <h4 width="120px" scope="row">Tanggal</h4> 
            </div>
            <div class="col-md-10">
              <input type="date" value="<?php if(isset($from)) echo $from;?>" class="form-control" name="transdate1" required>
            </div>
          </div>

          <div class="col-md-12 min-left">
            <div class="col-md-2">
              <h4 width="120px" scope="row">Plant</h4> 
            </div>
            <div class="col-md-10">
              <select name="plant" class="select-css form-control" required>
                <option value=''>- Pilih -</option>
                <?php $sql = "select * from tb_plant order by nama_plant";
                $aa=$this->db->query($sql)->result();
                foreach($aa as $a){
                ?>
                  <option <?php if($a->nama_plant == $plant) echo 'selected';?> value="<?php echo $a->id_plant;?>"><?php echo $a->nama_plant;?></option>
                <?php } ?>
              </select>
            </div>
          </div>

        <td><button type="submit" name="submit" class="btn btn-info">Refresh</button></td>

        </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- <div class="col-xs-12"> -->
  <div class="box table-responsive padding">
    <div class="box-body">
      <div class="box-body"><form method="get" action="<?php echo base_url();?>laporan_farm">
        <table id='example2' class='table table-bordered table-striped table-condensed'>
        <thead>
          <tr bgcolor=''>
            <th rowspan='3'>KD</th>
            <th rowspan='3'>Umur (minggu)</th>
            <th rowspan='3'>strain</th>

            <th colspan='2'><center>Populasi Akhir</center></th>
            <th colspan='6'><center>Deplesi</center></th>
            <th colspan='4'><center>Penjualan</center></th>
            <th colspan='4'><center>Feed consumption</center></th>
            <th colspan='9'><center>Produksi Telur (Egg Production)</center></th>
          </tr>
          <tr bgcolor=''>
            <th rowspan='2'>Betina</th>
            <th rowspan='2'>Jantan</th>
            <th colspan='3'><center>Betina</center></th>
            <th colspan='3'><center>Jantan</center></th>
            <th colspan='2'><center>Betina</center></th>
            <th colspan='2'><center>Jantan</center></th>
            <th colspan='2'><center>Total Feed Kg</center></th>
            <th colspan='2'><center>Feed Gram/ekor</center></th>

            <th colspan='3'><center>Telur Hatching Egg</center></th>
            <th colspan='3'><center>Telur Komersil</center></th>
            <th colspan='3'><center>Total Produksi</center></th>
            <tr >
              <th style='width:80px'>Mati</th>
              <th style='width:80px'>Cull</th>
              <th style='width:80px'>%</th>
              <th style='width:80px'>Mati</th>
              <th style='width:80px'>Cull</th>
              <th style='width:80px'>%</th>

              <th style='width:80px'>Seleksi</th>
              <th style='width:80px'>Afkir</th>
              <th style='width:80px'>Seleksi</th>
              <th style='width:80px'>Afkir</th>

              <th style='width:80px'>Betina</th>
              <th style='width:80px'>Jantan</th>
              <th style='width:80px'>Betina</th>
              <th style='width:80px'>Jantan</th>

              <th style='width:80px'>Butir</th>
              <th style='width:180px'>%</th>
              <th style='width:80px'>STD</th>
              <th style='width:80px'>Butir</th>
              <th style='width:80px'>%</th>
              <th style='width:80px'>STD</th>
              <th style='width:80px'>Butir</th>
              <th style='width:80px'>%</th>
              <th style='width:80px'>STD</th>
            </tr>
          </tr>
        </thead>
        <tbody>
        <?php
        foreach ($record->result_array() as $row){
          $ps = $this->db->query("SELECT * FROM `tb_populasi_detail` a JOIN tb_chickin b ON a.id_chickin = b.id_chickin WHERE a.id_jadwal ='".$row['id_jadwal']."'")->row_array();
          $feed = $this->db->query("SELECT *, a.jml_betina AS jml_betina, a.jml_jantan AS jml_jantan FROM `tb_pakan_detail` a JOIN tb_chickin b ON a.id_chickin = b.id_chickin WHERE a.id_jadwal ='".$row['id_jadwal']."'")->row_array();
          
        echo "
          <tr >
              <td >$row[kandang]</td>
                  <td></td>
                  <td>$row[strain]</td>
                  <td>$ps[total_female]</td>
                  <td>$ps[total_male]</td>
                  <td>$ps[female_mati]</td>
                  <td>$ps[female_cull]</td>
                  <td></td>
                  <td>$ps[male_mati]</td>
                  <td>$ps[male_cull]</td>
                  <td></td>
                  <td>$ps[female_seleksi]</td>
                  <td>$ps[female_afkir]</td>
                  <td>$ps[male_seleksi]</td>
                  <td>$ps[male_afkir]</td>
                  <td>$feed[jml_betina]</td>
                  <td>$feed[jml_jantan]</td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
              </tr>
              ";
            }
            ?>

      </tbody>

      </table>
      </div>
    </div>
  </div>
</div>