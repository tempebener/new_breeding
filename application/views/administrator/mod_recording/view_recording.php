<div class="col-xs-12">
  <div class="box table-responsive padding">

    <div class="box-header">
      <h3 class="box-title">Daily Report</h3>
    </div><!-- /.box-header -->

    <div class="box-body">
      <div class="box-body"><form method="get" action="<?php echo base_url();?>recording">
      <div class="col-md-6">

          <div class="col-lg-6 min-left">
            <h5>Tanggal</h5> 
            <input type="date" value="<?php if(isset($from)) echo $from;?>" class="form-control" name="transdate1" required>
          </div>

          <div class="col-lg-6 min-left">
            <h5>Plant</h5> 
            <select name="plant" class="select-css form-control" required>
              <option value=''>- Pilih -</option>
              <?php $sql = "SELECT * FROM tb_plant ORDER BY nama_plant";
                $aa=$this->db->query($sql)->result();
                foreach($aa as $a){
              ?>
                <option <?php if($a->nama_plant == $plant) echo 'selected';?> value="<?php echo $a->id_plant;?>"><?php echo $a->nama_plant;?></option>
              <?php } ?>
            </select>
          </div>

        <div class="col-lg-12 min-left">
            <h4></h4> 
            <button type="submit" name="submit" class="btn btn-info" >Refresh</button>
        </div>
      </div>
      </div>
    </div>

  </div>

  <div class="box table-responsive padding">
    <div class="box-body">
      <div class="" role="tabpanel" data-example-id="togglable-tabs">
          <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
            <li role="presentation" class="active">
              <a href="#tab_feed" role="tab" id="btn_tab_feed" data-toggle="tab" aria-expanded="true">Feed</a>
            </li>
            <li role="presentation" class="">
              <a href="#tab_ps" role="tab" id="btn_tab_ps" data-toggle="tab" aria-expanded="true">Population</a>
            </li>
            <li role="presentation" class="">
              <a href="#tab_ovk" role="tab" id="btn_tab_ovk" data-toggle="tab" aria-expanded="true">OVK</a>
            </li>
            <li role="presentation" class="">
              <a href="#tab_bw" role="tab" id="btn_tab_bw" data-toggle="tab" aria-expanded="true">BW</a>
            </li>
            <li role="presentation" class="">
              <a href="#tab_egg" role="tab" id="btn_tab_egg" data-toggle="tab" aria-expanded="true">Egg</a>
            </li>
          </ul>
        <div id="myTabContent" class="tab-content">

        <!-- start tab feed -->
        <div role="tabpanel" class="tab-pane fade active in" id="tab_feed" aria-labelledby="home-tab">
          <table id='tbl_feed' class='table table-hover table-bordered table-striped table-xtra-condensed' style='width: 100%;'>
          <thead>
            <tr bgcolor='#f39c12'>
              <th colspan='2'></th>
              <th colspan='3'><center>QTY</center></th>
              <th colspan='1'></th>
            </tr>
            <tr bgcolor='#00c0ef'>
            <th >Kandang</th>
            <!-- <th width='60px'>Hari Ke</th> -->
            <th >Feed Code</th>
            <th width='80px'>Female</th>
            <th width='80px'>Male</th>
            <th width='80px'>Total</th>
            <th width='40px'>Action</th>
            </tr>
          </thead>
          <tbody>
          <?php
          foreach ($record->result_array() as $row){
            $detail = $this->db->query("SELECT GROUP_CONCAT(b.nama_stock SEPARATOR '<br/>') AS feed, GROUP_CONCAT(jml_jantan SEPARATOR '<br/>') AS jantan, GROUP_CONCAT(jml_betina SEPARATOR '<br/>') AS betina, GROUP_CONCAT(jml_pakan SEPARATOR '<br/>') AS total FROM `tb_pakan_detail` a JOIN tb_stock b ON a.id_stock = b.id_stock WHERE id_jadwal ='".$row['id_jadwal']."'")->row_array(); ?>
              <tr>
                  <td><?= $row['kandang'] ?></td>
                  <!-- <td><?= $row['hari_ke'] ?></td> -->
                  <td><?= $detail['feed'] ?></td>
                  <td><?= $detail['betina'] ?></td>
                  <td><?= $detail['jantan'] ?></td>
                  <td><?= $detail['total'] ?></td>

                  <td><center>
                  <a class='btn btn-primary btn-xs' title='Tambah' href="<?= site_url('recording/add_pakan/'.$row['id_jadwal']) ?>" ><span class='fa fa-plus'></span></a>
                    <a class='btn btn-danger btn-xs' title='Hapus' href="<?= site_url('recording/delete_pakan/'.$row['id_jadwal']) ?>" ><span class='glyphicon glyphicon-remove'></span></a>
                  </center></td>
              </tr>
            
          <?php } ?>
            </tbody>
          </table>
        </div>
        <!-- end tab feed -->

        <!-- start tab ps -->
        <div role="tabpanel" class="tab-pane fade" id="tab_ps" aria-labelledby="profile-tab">
          <table id='tbl_ps' class='table table-hover table-bordered table-striped table-xtra-condensed' style='width: 100%;'>
          <thead>
            <tr bgcolor='#f39c12'>
              <th colspan='1'></th>
              <th colspan='4'><center>Female</center></th>
              <th colspan='4'><center>Male</center></th>
              <th colspan='2'></th>
            </tr>
            <tr bgcolor='#00c0ef'>
              <th>Kandang</th>
              <!-- <th width='60px'>Hari Ke</th> -->
              <th>Death</th>
              <th>Culling</th>
              <th>SE</th>
              <th>Afkir</th>
              <th>Death</th>
              <th>Culling</th>
              <th>SE</th>
              <th>Afkir</th>
              <th>Total</th>
            <th width='40px'>Action</th>
            </tr>
          </thead>
          <tbody>
          
          <?php
          foreach ($record->result_array() as $row){
            $detail = $this->db->query("SELECT *, sum(a.male_mati+a.male_cull+a.male_afkir+a.male_seleksi+a.female_mati+a.female_cull+a.female_seleksi+a.female_afkir) AS total_akhir, GROUP_CONCAT(male_seleksi SEPARATOR '<br/>') AS se, GROUP_CONCAT(male_mati SEPARATOR '<br/>') AS death, GROUP_CONCAT(male_cull SEPARATOR '<br/>') AS culling, GROUP_CONCAT(male_afkir SEPARATOR '<br/>') AS afkir, GROUP_CONCAT(female_seleksi SEPARATOR '<br/>') AS se2, GROUP_CONCAT(female_mati SEPARATOR '<br/>') AS death2, GROUP_CONCAT(female_cull SEPARATOR '<br/>') AS culling2, GROUP_CONCAT(female_afkir SEPARATOR '<br/>') AS afkir2 FROM `tb_populasi_detail` a JOIN tb_stock b ON a.id_stock = b.id_stock WHERE id_jadwal ='".$row['id_jadwal']."'")->row_array(); ?>
              <tr>  <input type='hidden' name='id' value="<?= $detail['id_populasi_detail']?>">
                    <td><?= $row['kandang'] ?></td>
                    <!-- <td><?= $row['hari_ke'] ?></td> -->
                    <td><?= $detail['death2'] ?></td>
                    <td><?= $detail['culling2'] ?></td>
                    <td><?= $detail['se2'] ?></td>
                    <td><?= $detail['afkir2'] ?></td>
                    <td><?= $detail['death'] ?></td>
                    <td><?= $detail['culling'] ?></td>
                    <td><?= $detail['se'] ?></td>
                    <td><?= $detail['afkir'] ?></td>
                    <td><?= $detail['total_akhir'] ?></td>
                    <td><center>
                    <?php
                      if($detail['id_populasi_detail']==""){
                        echo "<a class='btn btn-primary btn-xs' title='Tambah' href='".base_url()."recording/add_ps/$row[id_jadwal]' ><span class='fa fa-plus'></span></a>";
                      }else{
                        echo "<a class='btn btn-primary btn-xs' title='Tambah' href='".base_url()."recording/edit_ps/$detail[id_populasi_detail]' ><span class='fa fa-plus'></span></a>";
                      }
                    ?>
                    <a class='btn btn-danger btn-xs' title='Hapus' href="<?= site_url('recording/delete_ps/'.$row['id_jadwal']) ?>" ><span class='glyphicon glyphicon-remove'></span></a>
                    </center></td>
                </tr>

            <?php } ?>
            </tbody>
          </table>
        </div>
        <!-- end tab ps -->

        <!-- start tab ovk -->
        <div role="tabpanel" class="tab-pane fade" id="tab_ovk" aria-labelledby="profile-tab">
          <table id='tbl_ovk' class='table table-hover table-bordered table-striped table-xtra-condensed' style='width: 100%;'>
          <thead>
            <tr bgcolor='#f39c12'>
              <th colspan='1'></th>
              <th colspan='3'><center>QTY</center></th>
              <th colspan='1'></th>
            </tr>
            <tr bgcolor='#00c0ef'>
              <th >Kandang</th>
              <!-- <th width='60px'>Hari Ke</th> -->
              <th >OVK Code</th>
              <th width='80px'>Jumlah</th>
              <th width='80px'>Satuan</th>
              <th width='40px'>Action</th>
            </tr>
          </thead>
          <tbody>
          
          <?php
          foreach ($record->result_array() as $row){
            $detail = $this->db->query("SELECT GROUP_CONCAT(b.nama_stock SEPARATOR '<br/>') AS ovk, GROUP_CONCAT(jml_ovk SEPARATOR '<br/>') AS jml_ovk, GROUP_CONCAT(satuan_unit SEPARATOR '<br/>') AS satuan FROM `tb_ovk_detail` a JOIN tb_stock b ON a.id_stock = b.id_stock WHERE id_jadwal ='".$row['id_jadwal']."'")->row_array(); ?>
              <tr>  
                    <td><?= $row['kandang'] ?></td>
                    <!-- <td><?= $row['hari_ke'] ?></td> -->
                    <td><?= $detail['ovk'] ?></td>
                    <td><?= $detail['jml_ovk'] ?></td>
                    <td><?= $detail['satuan'] ?></td>
                    <td><center>
                    <a class='btn btn-primary btn-xs' title='Tambah' href="<?= site_url('recording/add_ovk/'.$row['id_jadwal']) ?>" ><span class='fa fa-plus'></span></a>
                    <a class='btn btn-danger btn-xs' title='Hapus' href="<?= site_url('recording/delete_ovk/'.$row['id_jadwal']) ?>" ><span class='glyphicon glyphicon-remove'></span></a>
                    </center></td>
                </tr>

            <?php } ?>
            </tbody>
          </table>
        </div>
        <!-- end tab ovk -->

        <!-- start tab bw -->
        <div role="tabpanel" class="tab-pane fade" id="tab_bw" aria-labelledby="profile-tab">
          <table id='tbl_bw' class='table table-hover table-bordered table-striped table-xtra-condensed' style='width: 100%;'>
          <thead>
            <tr bgcolor='#f39c12'>
              <th colspan='1'></th>
              <th colspan='2'>BW</th>
              <th colspan='2'>Uniformity</th>
              <th colspan='2'></th>
            </tr>
            <tr bgcolor='#00c0ef'>
              <th width='120px'>Kandang</th>
              <!-- <th width='50px'>Hari Ke</th> -->
              <th width='100px'>Female</th>
              <th width='100px'>Male</th>
              <th width='100px'>Female</th>
              <th width='100px'>Male</th>
              <th width='100px'>Satuan</th>
              <th width='40px'>Action</th>
            </tr>
          </thead>
          <tbody>

          <?php
            foreach ($record3->result_array() as $row){
            $detail = $this->db->query("SELECT *, GROUP_CONCAT(jml_jantan SEPARATOR '<br/>') AS bw_jantan, GROUP_CONCAT(jml_betina SEPARATOR '<br/>') AS bw_betina, GROUP_CONCAT(uniform_jantan SEPARATOR '<br/>') AS uni_jantan, GROUP_CONCAT(uniform_betina SEPARATOR '<br/>') AS uni_betina, GROUP_CONCAT(satuan_bw SEPARATOR '<br/>') AS satuan FROM `tb_bw_detail` a JOIN tb_stock b ON a.id_stock = b.id_stock WHERE id_jadwal ='".$row['id_jadwal']."'")->row_array(); ?>
            <tr><input type='hidden' name='id' value="<?= $row['id_jadwal']?>">
              <input type='hidden' name='id' value="<?= $detail['id_bw_detail']?>">
              <td><?= $row['kandang'] ?></td>
              <!-- <td><?= $row['hari_ke'] ?></td> -->
              <td><?= $detail['bw_betina'] ?></td>
              <td><?= $detail['bw_jantan'] ?></td>
              <td><?= $detail['uni_betina'] ?></td>
              <td><?= $detail['uni_jantan'] ?></td>
              <td><?= $detail['satuan'] ?></td>
              <td><center>
                <!-- <button class='btn btn-success btn-xs' data-toggle='modal' title='Tambah' data-target="#myModal2<?= $row['id_jadwal']?>"><i class='fa fa-plus'></i></button> -->
                <?php
                  if($detail['id_bw_detail']==""){
                    echo "<a class='btn btn-primary btn-xs' title='Tambah' href='".base_url()."recording/add_bw/$row[id_jadwal]' ><span class='fa fa-plus'></span></a>";
                  }else{
                    echo "<a class='btn btn-primary btn-xs' title='Tambah' href='".base_url()."recording/edit_bw/$detail[id_bw_detail]' ><span class='fa fa-plus'></span></a>";
                  }
                ?>
                <a class='btn btn-danger btn-xs' title='Hapus' href="<?= site_url('recording/delete_bw/'.$row['id_jadwal']) ?>" ><span class='glyphicon glyphicon-remove'></span></a>
              </center></td>
            </tr>
            <?php } ?>
            </tbody>
          </table>
        </div>
        <!-- end tab bw -->

        <!-- start tab egg -->
        <div role="tabpanel" class="tab-pane fade" id="tab_egg" aria-labelledby="profile-tab">
          <table id='tbl_egg' class='table table-hover table-bordered table-striped table-xtra-condensed' style='width: 100%;'>
          <thead>
            <tr bgcolor='#f39c12'>
              <th colspan='1'></th>
              <th colspan='5'><center>HE</center></th>
              <th colspan='5'><center>Komersial</center></th>
              <th colspan='2'></th>
            </tr>
            <tr bgcolor='#00c0ef'>
              <!-- <th rowspan='2'>No</th> -->
              <th rowspan='2'>Kandang</th>
              <!-- <th rowspan='2'>Hari Ke</th> -->
              <th colspan='4'><center>Grade</center></th>
              <th rowspan='2'>Total HE</th>
              <th rowspan='2'>Kecil</th>
              <th rowspan='2'>Jumbo</th>
              <th rowspan='2'>Abnormal</th>
              <th rowspan='2'>Retak</th>
              <th rowspan='2'>Total Telur Komersial</th>
              <th rowspan='2'>Total Produksi Telur</th>
              <th rowspan='2' width='40px'>Action</th>
            </tr>
            <tr bgcolor='#00c0ef'>
              <th ><center>A</center></th>
              <th ><center>B</center></th>
              <th ><center>C</center></th>
              <th ><center>D</center></th>
            </tr>
          </thead>
          <tbody>

          <?php
            foreach ($record3->result_array() as $row){
            $detail = $this->db->query("SELECT *, GROUP_CONCAT(he_a SEPARATOR '<br/>') AS grade_a, GROUP_CONCAT(he_b SEPARATOR '<br/>') AS grade_b, GROUP_CONCAT(he_c SEPARATOR '<br/>') AS grade_c, GROUP_CONCAT(he_d SEPARATOR '<br/>') AS grade_d, GROUP_CONCAT(komersial_kecil SEPARATOR '<br/>') AS kecil, GROUP_CONCAT(komersial_jumbo SEPARATOR '<br/>') AS jumbo, GROUP_CONCAT(komersial_abnormal SEPARATOR '<br/>') AS abnormal, GROUP_CONCAT(komersial_retak SEPARATOR '<br/>') AS retak FROM `tb_grading_telur_detail` a JOIN tb_stock b ON a.id_stock = b.id_stock WHERE id_jadwal ='".$row['id_jadwal']."'")->row_array(); ?>
            <tr><input type='hidden' name='id_jadwal' value="<?= $row['id_jadwal']?>">
              <input type='hidden' name='id' value="<?= $detail['id_grading_telur_detail']?>">
              <!-- <td><?= isset($no_egg) ? ++$no_egg : $no_egg=1 ?></td> -->
              <td><?= $row['kandang'] ?></td>
              <!-- <td><?= $row['hari_ke'] ?></td> -->
              <td><?= $detail['grade_a'] ?></td>
              <td><?= $detail['grade_b'] ?></td>
              <td><?= $detail['grade_c'] ?></td>
              <td><?= $detail['grade_d'] ?></td>
              <td><?= $detail['total_he'] ?></td>
              <td><?= $detail['kecil'] ?></td>
              <td><?= $detail['jumbo'] ?></td>
              <td><?= $detail['abnormal'] ?></td>
              <td><?= $detail['retak'] ?></td>
              <td><?= $detail['total_komersial'] ?></td>
              <td><?= $detail['total_produksi'] ?></td>
              <td><center>
                <!-- <button class='btn btn-success btn-xs' data-toggle='modal' title='Tambah' data-target="#myModal2<?= $row['id_jadwal']?>"><i class='fa fa-plus'></i></button> -->
                <?php
                  if($detail['id_grading_telur_detail']==""){
                    echo "<a class='btn btn-primary btn-xs' title='Tambah' href='".base_url()."recording/add_egg/$row[id_jadwal]' ><span class='fa fa-plus'></span></a>";
                  }else{
                    echo "<a class='btn btn-primary btn-xs' title='Tambah' href='".base_url()."recording/edit_egg/$detail[id_grading_telur_detail]' ><span class='fa fa-plus'></span></a>";
                  }
                ?>
                <a class='btn btn-danger btn-xs' title='Hapus' href="<?= site_url('recording/delete_egg/'.$row['id_jadwal']) ?>" ><span class='glyphicon glyphicon-remove'></span></a>
              </center></td>
            </tr>
            <?php } ?>
            </tbody>
          </table>
        </div>
        <!-- end tab egg --> 

        </div>
      </div>
    </div>
  </div>


</div>
