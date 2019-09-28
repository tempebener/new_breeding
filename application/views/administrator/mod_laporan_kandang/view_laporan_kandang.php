<div class="col-xs-12">
  <div class="box table-responsive padding">

    <div class="box-header">
      <h3 class="box-title">Laporan Kandang</h3>
    </div>
    <div class="box-body">
      <div class="box-body"><form method="get" action="<?= base_url() ?>laporan_kandang">
      <div class="col-md-6">

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
                  <option <?php if($a->nama_plant == $plant) echo 'selected';?> value="<?= $a->id_plant ?>"><?= $a->nama_plant ?></option>
                <?php } ?>
              </select>
            </div>
          </div>

          <div class="col-md-12 min-left">
            <div class="col-md-2">
              <h4 width="120px" scope="row">Kandang</h4> 
            </div>
            <div class="col-md-10">
      				<select name="chickin" class="select-css form-control" required>
                <option value=''>- Pilih -</option>
        				<?php $sql = "select * from tb_kandang order by nama_kandang";
        				$aa=$this->db->query($sql)->result();
        				foreach($aa as $a){
        				?>
        					<option <?php if($a->nama_kandang == $chickin) echo 'selected';?> value="<?= $a->id_kandang ?>"><?= $a->nama_kandang ?></option>
        				<?php } ?>
      				</select>
            </div>
          </div>

          <td><button type="submit" name="submit" class="btn btn-info">Refresh</button></td>
      </div>
    </div>
  </div> 
  </div> 

<!-- <div class="col-xs-12"> -->
  <div class="box table-responsive padding">
    <div class="box-body">
      <div class="box-body"><form method="get" action="<?php echo base_url();?>laporan_kandang">
        <table id='example1' class='table table-bordered table-striped table-condensed'>
        <thead>

          <tr bgcolor='#00c0ef'>
            <th style='width:20px'>No</th>
            <th style='width:80px'>Kandang</th>
            <th style='width:80px'>No Chikin</th>
            <!-- <th style='width:20px'>Hari Ke</th> -->
            <th style='width:80px'>Tanggal</th>
            <th style='width:80px'>Biaya Awal</th>
            <th style='width:80px'>FEED</th>
            <th style='width:80px'>OVK</th>
            <th style='width:80px'>BW Male</th>
            <th style='width:80px'>BW Female</th>
            <th style='width:70px'>PS Male</th>
            <th style='width:70px'>PS Female</th>
            <th style='width:80px'>EGG</th>
            <th style='width:80px'>Total Biaya</th>
            <th style='width:80px'>Biaya/Ekor</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>

        <?php
        $no = 1;
        $jpakan =0;
        $jovk =0;
        $tjpsakhir = 0;
        $tjpsmale = 0;
        $tjpsfemale = 0;
        $tjegg = 0;
        $totbiayaekor = 0;
        $row['tharga'] = 0;
        $bw2['jml_jantan'] = 0;
        $bw2['jml_betina'] = 0;
        $bw2['satuan_bw'] = '';
        $totbiaya = 0;

        foreach ($record->result_array() as $row){
          // $chickin2 = $this->db->query("SELECT a.id_chickin, a.hari_ke, b.total_harga AS tharga FROM `tb_jadwal` a JOIN `tb_chickin` b ON a.id_chickin = b.id_chickin WHERE a.hari_ke='1' AND b.id_chickin='1' GROUP BY a.id_chickin LIMIT 1 ")->row_array();
          $pakan = $this->db->query("SELECT sum(a.jml_pakan*b.harga_beli) as tbayar FROM `tb_pakan_detail` a join tb_stock b on a.id_stock = b.id_stock where id_jadwal='".$row['id_jadwal']."'")->row_array();
          $ovk = $this->db->query("SELECT sum(a.jml_ovk*b.harga_beli) as tbayar FROM `tb_ovk_detail` a join tb_stock b on a.id_stock = b.id_stock where id_jadwal='".$row['id_jadwal']."'")->row_array();
          $bw = $this->db->query("SELECT GROUP_CONCAT(jml_jantan) as jantan, GROUP_CONCAT(satuan_bw) as satuan, GROUP_CONCAT(jml_betina) as betina FROM `tb_bw_detail` WHERE id_jadwal='".$row['id_jadwal']."' ")->row_array();
          $bw2 = $this->db->query("SELECT * FROM `tb_bw_detail` WHERE id_kandang='$chickin'")->row_array();
          $ps = $this->db->query("SELECT id_populasi_detail, jml_jantan, jml_betina, a.total_male AS tmale, a.total_female AS tfemale, a.total_akhir AS takhir FROM `tb_populasi_detail` a JOIN tb_chickin b ON a.id_chickin = b.id_chickin WHERE a.id_kandang='$chickin' AND id_jadwal='".$row['id_jadwal']."'")->row_array();
          $egg = $this->db->query("SELECT id_grading_telur_detail, a.total_produksi AS total FROM `tb_grading_telur_detail` a JOIN tb_chickin b ON a.id_chickin = b.id_chickin WHERE a.id_kandang='$chickin' AND id_jadwal='".$row['id_jadwal']."'")->row_array();
          // $ps2 = $this->db->query("SELECT * FROM `tb_populasi_detail` GROUP BY id_jadwal DESC")->row_array();


          $aa[] = $pakan['tbayar'];
          $jpakan = array_sum($aa);
          $bb[] = $ovk['tbayar'];
          $jovk = array_sum($bb);

          $cc[] = $ps['tmale'];
          $jpsmale = array_sum($cc);
          $tjpsmale = $row['male'] - $jpsmale;

          $dd[] = $ps['tfemale'];
          $jpsfemale = array_sum($dd);
          $tjpsfemale = $row['female'] - $jpsfemale;
          
          $ee[] = $ps['takhir'];
          $jpsakhir = array_sum($ee);
          // $tjpsakhir = $row['jt'] - $jpsakhir;

          $ff[] = $egg['total'];
          $jegg = array_sum($ff);
          $tjegg = 0 + $jegg;

          // == Total Biaya ==
          $biaya1 = array_sum($aa);
          $biaya2 = array_sum($bb);
          $totbiaya = $row['tharga'] + $biaya1 + $biaya2;

          // == Biaya per ekor ==
          $totbiayaekor = ($row['tharga'] + $biaya1 + $biaya2) / ($tjpsmale + $tjpsfemale);

          if($ps['id_populasi_detail']==""){
              $psmale = "";
              $psfemale = "";
          }else{
              $psmale = "$tjpsmale";
              $psfemale = "$tjpsfemale";
          }

          if($pakan['tbayar']=="" && $ovk['tbayar']==""){
              $biaya = "0";
              $biayaekor = "0";
          }else{
              $biaya = "$totbiaya";
              $biayaekor = "$totbiayaekor";
          }

          if($row['hari_ke']=="1"){
              $tharga2 = "$row[tharga]";
          }else{
              $tharga2 = "0";
          }

          if($egg['id_grading_telur_detail']==""){
              $egg = "";
          }else{
              $egg = "$tjegg";
          }
        echo "
          <tr><td>$no</td>
              <td>$row[kandang]</td>
              <td>$row[no_chickin]</td>
              <!--  <td>$row[hari_ke]</td> -->
              <td>".tgl_slash($row['tgl_pembuatan'])."</td>
              <td>".rupiah($tharga2)."</td>
              <td>".rupiah($pakan['tbayar'])."</td>
              <td>".rupiah($ovk['tbayar'])."</td>
              <td>$bw[jantan] $bw[satuan]</td>
              <td>$bw[betina] $bw[satuan]</td>
              <td>$psmale</td>
              <td>$psfemale</td>
              <td>$egg</td>
              <td>".rupiah($biaya)."</td>
              <td>".rupiah($biayaekor)."</td>
              <td><center>
              <a class='btn btn-warning btn-xs' title='Detail Data' href='".base_url()."laporan_kandang/detail_laporan_kandang/$row[id_jadwal]'><span class='glyphicon glyphicon-zoom-in'></span></a>
              </center></td>
          </tr>

              ";
      $no++;
      }
      ?>
      </tbody>
      <tfoot>
        <tr bgcolor='fff1'>
          <th colspan="4"></th>
          <th><?= rupiah($row['tharga'])?></th>
          <th><?= rupiah($jpakan)?></th>
          <th><?= rupiah($jovk)?></th>
          <th><?= $bw2['jml_jantan'] ?> <?= $bw2['satuan_bw'] ?></th>
          <th><?= $bw2['jml_betina'] ?> <?= $bw2['satuan_bw'] ?></th>
          <th><?= ($tjpsmale)?></th>
          <th><?= ($tjpsfemale)?></th>
          <th><?= ($tjegg)?></th>
          <th><?= rupiah($totbiaya)?></th>
          <th><?= rupiah($totbiayaekor)?></th>
          <th></th>
        </tr>
      </tfoot>
    </table>
    </div>
    </div>
  </div>
</div>
