<div class="col-xs-12">
  <div class="box table-responsive padding">

    <div class="box-header">
      <h3 class="box-title">Daily Report Summary</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
      <div class="box-body"><form method="get" action="<?php echo base_url();?>daily_report_summary">
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
    <div class="box-header">
      <h3 class="box-title">Female Population</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
      <div class="box-body"><form method="get" action="<?php echo base_url();?>daily_report_summary">
        <table id='tbl_ps' class='table table-bordered table-striped table-condensed'>
        <thead>
          <tr bgcolor='#f39c12'>
            <th rowspan="2" style='width:80px'>Date</th>
            <th colspan='22'>Kandang</th>
          </tr>
          <tr bgcolor=''>
            <th style='width:80px'>001</th>
            <th style='width:80px'>002</th>
            <th style='width:80px'>003</th>
            <th style='width:80px'>004</th>
            <th style='width:80px'>005</th>
            <th style='width:80px'>006</th>
            <th style='width:80px'>007</th>
            <th style='width:80px'>008</th>
            <th style='width:80px'>009</th>
            <th style='width:80px'>010</th>
            <th style='width:80px'>011</th>
            <th style='width:80px'>012</th>
            <th style='width:80px'>013</th>
            <th style='width:80px'>014</th>
            <th style='width:80px'>015</th>
            <th style='width:80px'>016A</th>
            <th style='width:80px'>016B</th>
            <th style='width:80px'>017A</th>
            <th style='width:80px'>017B</th>
            <th style='width:80px'>018B</th>
            <th style='width:80px'>019A</th>
            <th style='width:80px'>019B</th>
            <th style='width:150px'>Total</th>
          </tr>
        </thead>
        <tbody>
        <?php
        foreach ($record->result_array() as $row){
          // $ps = $this->db->query("SELECT *, a.total_female AS tfemale FROM `tb_populasi_detail` a JOIN tb_chickin b ON a.id_chickin = b.id_chickin WHERE a.id_jadwal ='".$row['id_jadwal']."'")->row_array();
          $ps = $this->db->query("SELECT *, a.total_female AS tfemale FROM `tb_populasi_detail` a JOIN tb_chickin b ON a.id_chickin = b.id_chickin JOIN tb_kandang c ON a.id_kandang = c.id_kandang WHERE a.id_jadwal ='".$row['id_jadwal']."'")->row_array();
          $kdg1_1 = $this->db->query("SELECT *, a.total_female AS tfemale FROM `tb_populasi_detail` a JOIN tb_chickin b ON a.id_chickin = b.id_chickin JOIN tb_kandang c ON a.id_kandang = c.id_kandang WHERE a.id_jadwal ='".$row['id_jadwal']."' AND kode_kandang='K01' GROUP BY b.tgl_chickin=tgl_chickin")->row_array();
          $kdg1_2 = $this->db->query("SELECT *, a.total_female AS tfemale FROM `tb_populasi_detail` a JOIN tb_chickin b ON a.id_chickin = b.id_chickin JOIN tb_kandang c ON a.id_kandang = c.id_kandang WHERE a.id_chickin ='".$row['id_chickin']."' AND kode_kandang='K02' GROUP BY b.tgl_chickin=tgl_chickin")->row_array();
          $kdg1_3 = $this->db->query("SELECT *, a.total_female AS tfemale FROM `tb_populasi_detail` a JOIN tb_chickin b ON a.id_chickin = b.id_chickin JOIN tb_kandang c ON a.id_kandang = c.id_kandang WHERE a.id_jadwal ='".$row['id_jadwal']."' AND kode_kandang='K03'")->row_array();
          $kdg1_4 = $this->db->query("SELECT *, a.total_female AS tfemale FROM `tb_populasi_detail` a JOIN tb_chickin b ON a.id_chickin = b.id_chickin JOIN tb_kandang c ON a.id_kandang = c.id_kandang WHERE a.id_jadwal ='".$row['id_jadwal']."' AND kode_kandang='K04'")->row_array();
          $kdg1_5 = $this->db->query("SELECT *, a.total_female AS tfemale FROM `tb_populasi_detail` a JOIN tb_chickin b ON a.id_chickin = b.id_chickin JOIN tb_kandang c ON a.id_kandang = c.id_kandang WHERE a.id_jadwal ='".$row['id_jadwal']."' AND kode_kandang='K05'")->row_array();
          $kdg1_6 = $this->db->query("SELECT *, a.total_female AS tfemale FROM `tb_populasi_detail` a JOIN tb_chickin b ON a.id_chickin = b.id_chickin JOIN tb_kandang c ON a.id_kandang = c.id_kandang WHERE a.id_jadwal ='".$row['id_jadwal']."' AND kode_kandang='K06'")->row_array();
          $kdg1_7 = $this->db->query("SELECT *, a.total_female AS tfemale FROM `tb_populasi_detail` a JOIN tb_chickin b ON a.id_chickin = b.id_chickin JOIN tb_kandang c ON a.id_kandang = c.id_kandang WHERE a.id_jadwal ='".$row['id_jadwal']."' AND kode_kandang='K07'")->row_array();
          $kdg1_8 = $this->db->query("SELECT *, a.total_female AS tfemale FROM `tb_populasi_detail` a JOIN tb_chickin b ON a.id_chickin = b.id_chickin JOIN tb_kandang c ON a.id_kandang = c.id_kandang WHERE a.id_jadwal ='".$row['id_jadwal']."' AND kode_kandang='K08'")->row_array();
          $kdg1_9 = $this->db->query("SELECT *, a.total_female AS tfemale FROM `tb_populasi_detail` a JOIN tb_chickin b ON a.id_chickin = b.id_chickin JOIN tb_kandang c ON a.id_kandang = c.id_kandang WHERE a.id_jadwal ='".$row['id_jadwal']."' AND kode_kandang='K09'")->row_array();
          $kdg1_10 = $this->db->query("SELECT *, a.total_female AS tfemale FROM `tb_populasi_detail` a JOIN tb_chickin b ON a.id_chickin = b.id_chickin JOIN tb_kandang c ON a.id_kandang = c.id_kandang WHERE a.id_jadwal ='".$row['id_jadwal']."' AND kode_kandang='K10'")->row_array();
          $kdg1_11 = $this->db->query("SELECT *, a.total_female AS tfemale FROM `tb_populasi_detail` a JOIN tb_chickin b ON a.id_chickin = b.id_chickin JOIN tb_kandang c ON a.id_kandang = c.id_kandang WHERE a.id_jadwal ='".$row['id_jadwal']."' AND kode_kandang='K11'")->row_array();
          $kdg1_12 = $this->db->query("SELECT *, a.total_female AS tfemale FROM `tb_populasi_detail` a JOIN tb_chickin b ON a.id_chickin = b.id_chickin JOIN tb_kandang c ON a.id_kandang = c.id_kandang WHERE a.id_jadwal ='".$row['id_jadwal']."' AND kode_kandang='K12'")->row_array();
          $kdg1_13 = $this->db->query("SELECT *, a.total_female AS tfemale FROM `tb_populasi_detail` a JOIN tb_chickin b ON a.id_chickin = b.id_chickin JOIN tb_kandang c ON a.id_kandang = c.id_kandang WHERE a.id_jadwal ='".$row['id_jadwal']."' AND kode_kandang='K13'")->row_array();
          $kdg1_14 = $this->db->query("SELECT *, a.total_female AS tfemale FROM `tb_populasi_detail` a JOIN tb_chickin b ON a.id_chickin = b.id_chickin JOIN tb_kandang c ON a.id_kandang = c.id_kandang WHERE a.id_jadwal ='".$row['id_jadwal']."' AND kode_kandang='K14'")->row_array();
          $kdg1_15 = $this->db->query("SELECT *, a.total_female AS tfemale FROM `tb_populasi_detail` a JOIN tb_chickin b ON a.id_chickin = b.id_chickin JOIN tb_kandang c ON a.id_kandang = c.id_kandang WHERE a.id_jadwal ='".$row['id_jadwal']."' AND kode_kandang='K15'")->row_array();
          $kdg1_16A = $this->db->query("SELECT *, a.total_female AS tfemale FROM `tb_populasi_detail` a JOIN tb_chickin b ON a.id_chickin = b.id_chickin JOIN tb_kandang c ON a.id_kandang = c.id_kandang WHERE a.id_jadwal ='".$row['id_jadwal']."' AND kode_kandang='K16A'")->row_array();
          $kdg1_16B = $this->db->query("SELECT *, a.total_female AS tfemale FROM `tb_populasi_detail` a JOIN tb_chickin b ON a.id_chickin = b.id_chickin JOIN tb_kandang c ON a.id_kandang = c.id_kandang WHERE a.id_jadwal ='".$row['id_jadwal']."' AND kode_kandang='K16B'")->row_array();
          $kdg1_17A = $this->db->query("SELECT *, a.total_female AS tfemale FROM `tb_populasi_detail` a JOIN tb_chickin b ON a.id_chickin = b.id_chickin JOIN tb_kandang c ON a.id_kandang = c.id_kandang WHERE a.id_jadwal ='".$row['id_jadwal']."' AND kode_kandang='K17A'")->row_array();
          $kdg1_17B = $this->db->query("SELECT *, a.total_female AS tfemale FROM `tb_populasi_detail` a JOIN tb_chickin b ON a.id_chickin = b.id_chickin JOIN tb_kandang c ON a.id_kandang = c.id_kandang WHERE a.id_jadwal ='".$row['id_jadwal']."' AND kode_kandang='K17B'")->row_array();
          $kdg1_18B = $this->db->query("SELECT *, a.total_female AS tfemale FROM `tb_populasi_detail` a JOIN tb_chickin b ON a.id_chickin = b.id_chickin JOIN tb_kandang c ON a.id_kandang = c.id_kandang WHERE a.id_jadwal ='".$row['id_jadwal']."' AND kode_kandang='K18B'")->row_array();
          $kdg1_19A = $this->db->query("SELECT *, a.total_female AS tfemale FROM `tb_populasi_detail` a JOIN tb_chickin b ON a.id_chickin = b.id_chickin JOIN tb_kandang c ON a.id_kandang = c.id_kandang WHERE a.id_jadwal ='".$row['id_jadwal']."' AND kode_kandang='K19A'")->row_array();
          $kdg1_19B = $this->db->query("SELECT *, a.total_female AS tfemale FROM `tb_populasi_detail` a JOIN tb_chickin b ON a.id_chickin = b.id_chickin JOIN tb_kandang c ON a.id_kandang = c.id_kandang WHERE a.id_jadwal ='".$row['id_jadwal']."' AND kode_kandang='K19B'")->row_array();

          $tottfemale = $kdg1_1['tfemale'] + $kdg1_2['tfemale'] + $kdg1_3['tfemale'] + $kdg1_4['tfemale'] + $kdg1_5['tfemale'] + $kdg1_6['tfemale'] + $kdg1_7['tfemale'] + $kdg1_8['tfemale'] + $kdg1_9['tfemale'] + $kdg1_10['tfemale'] + $kdg1_11['tfemale'] + $kdg1_12['tfemale'] + $kdg1_13['tfemale'] + $kdg1_14['tfemale'] + $kdg1_15['tfemale'] + $kdg1_16A['tfemale'] + $kdg1_16B['tfemale'] + $kdg1_17A['tfemale'] + $kdg1_17B['tfemale'] + $kdg1_18B['tfemale'] + $kdg1_19A['tfemale'] + $kdg1_19B['tfemale'];
          
        echo"
          <tr>
              <td>".tgl_indo($row['pembuatan'])."</td>
                  <td>$kdg1_1[tfemale]</td>
                  <td>$kdg1_2[tfemale]</td>
                  <td>$kdg1_3[tfemale]</td>
                  <td>$kdg1_4[tfemale]</td>
                  <td>$kdg1_5[tfemale]</td>
                  <td>$kdg1_6[tfemale]</td>
                  <td>$kdg1_7[tfemale]</td>
                  <td>$kdg1_8[tfemale]</td>
                  <td>$kdg1_9[tfemale]</td>
                  <td>$kdg1_10[tfemale]</td>
                  <td>$kdg1_11[tfemale]</td>
                  <td>$kdg1_12[tfemale]</td>
                  <td>$kdg1_13[tfemale]</td>
                  <td>$kdg1_14[tfemale]</td>
                  <td>$kdg1_15[tfemale]</td>
                  <td>$kdg1_16A[tfemale]</td>
                  <td>$kdg1_16B[tfemale]</td>
                  <td>$kdg1_17A[tfemale]</td>
                  <td>$kdg1_17B[tfemale]</td>
                  <td>$kdg1_18B[tfemale]</td>
                  <td>$kdg1_19A[tfemale]</td>
                  <td>$kdg1_19B[tfemale]</td>
                  <td>$tottfemale</td>
              </tr>
              ";
            }
            ?>

      </tbody>
      </table>
      </div>
    </div>
  </div>

  <div class="box table-responsive padding">
    <div class="box-header">
      <h3 class="box-title">Male Population</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
      <div class="box-body"><form method="get" action="<?php echo base_url();?>daily_report_summary">
        <table id='tbl_ps2' class='table table-bordered table-striped table-condensed'>
        <thead>
          <tr bgcolor='#f39c12'>
            <th rowspan="2" style='width:80px'>Date</th>
            <th colspan='22'>Kandang</th>
          </tr>
          <tr bgcolor=''>
            <th style='width:80px'>001</th>
            <th style='width:80px'>002</th>
            <th style='width:80px'>003</th>
            <th style='width:80px'>004</th>
            <th style='width:80px'>005</th>
            <th style='width:80px'>006</th>
            <th style='width:80px'>007</th>
            <th style='width:80px'>008</th>
            <th style='width:80px'>009</th>
            <th style='width:80px'>010</th>
            <th style='width:80px'>011</th>
            <th style='width:80px'>012</th>
            <th style='width:80px'>013</th>
            <th style='width:80px'>014</th>
            <th style='width:80px'>015</th>
            <th style='width:80px'>016A</th>
            <th style='width:80px'>016B</th>
            <th style='width:80px'>017A</th>
            <th style='width:80px'>017B</th>
            <th style='width:80px'>018B</th>
            <th style='width:80px'>019A</th>
            <th style='width:80px'>019B</th>
            <th style='width:150px'>Total</th>
          </tr>
        </thead>
        <tbody>
        <?php
        foreach ($record->result_array() as $row){
          $ps = $this->db->query("SELECT *, a.total_male AS tmale FROM `tb_populasi_detail` a JOIN tb_chickin b ON a.id_chickin = b.id_chickin JOIN tb_kandang c ON a.id_kandang = c.id_kandang WHERE a.id_jadwal ='".$row['id_jadwal']."'")->row_array();
          $kdg1_1 = $this->db->query("SELECT *, a.total_male AS tmale FROM `tb_populasi_detail` a JOIN tb_chickin b ON a.id_chickin = b.id_chickin JOIN tb_kandang c ON a.id_kandang = c.id_kandang WHERE a.id_jadwal ='".$row['id_jadwal']."' AND kode_kandang='K01'")->row_array();
          $kdg1_2 = $this->db->query("SELECT *, a.total_male AS tmale FROM `tb_populasi_detail` a JOIN tb_chickin b ON a.id_chickin = b.id_chickin JOIN tb_kandang c ON a.id_kandang = c.id_kandang WHERE a.id_jadwal ='".$row['id_jadwal']."' AND kode_kandang='K02'")->row_array();
          $kdg1_3 = $this->db->query("SELECT *, a.total_male AS tmale FROM `tb_populasi_detail` a JOIN tb_chickin b ON a.id_chickin = b.id_chickin JOIN tb_kandang c ON a.id_kandang = c.id_kandang WHERE a.id_jadwal ='".$row['id_jadwal']."' AND kode_kandang='K03'")->row_array();
          $kdg1_4 = $this->db->query("SELECT *, a.total_male AS tmale FROM `tb_populasi_detail` a JOIN tb_chickin b ON a.id_chickin = b.id_chickin JOIN tb_kandang c ON a.id_kandang = c.id_kandang WHERE a.id_jadwal ='".$row['id_jadwal']."' AND kode_kandang='K04'")->row_array();
          $kdg1_5 = $this->db->query("SELECT *, a.total_male AS tmale FROM `tb_populasi_detail` a JOIN tb_chickin b ON a.id_chickin = b.id_chickin JOIN tb_kandang c ON a.id_kandang = c.id_kandang WHERE a.id_jadwal ='".$row['id_jadwal']."' AND kode_kandang='K05'")->row_array();
          $kdg1_6 = $this->db->query("SELECT *, a.total_male AS tmale FROM `tb_populasi_detail` a JOIN tb_chickin b ON a.id_chickin = b.id_chickin JOIN tb_kandang c ON a.id_kandang = c.id_kandang WHERE a.id_jadwal ='".$row['id_jadwal']."' AND kode_kandang='K06'")->row_array();
          $kdg1_7 = $this->db->query("SELECT *, a.total_male AS tmale FROM `tb_populasi_detail` a JOIN tb_chickin b ON a.id_chickin = b.id_chickin JOIN tb_kandang c ON a.id_kandang = c.id_kandang WHERE a.id_jadwal ='".$row['id_jadwal']."' AND kode_kandang='K07'")->row_array();
          $kdg1_8 = $this->db->query("SELECT *, a.total_male AS tmale FROM `tb_populasi_detail` a JOIN tb_chickin b ON a.id_chickin = b.id_chickin JOIN tb_kandang c ON a.id_kandang = c.id_kandang WHERE a.id_jadwal ='".$row['id_jadwal']."' AND kode_kandang='K08'")->row_array();
          $kdg1_9 = $this->db->query("SELECT *, a.total_male AS tmale FROM `tb_populasi_detail` a JOIN tb_chickin b ON a.id_chickin = b.id_chickin JOIN tb_kandang c ON a.id_kandang = c.id_kandang WHERE a.id_jadwal ='".$row['id_jadwal']."' AND kode_kandang='K09'")->row_array();
          $kdg1_10 = $this->db->query("SELECT *, a.total_male AS tmale FROM `tb_populasi_detail` a JOIN tb_chickin b ON a.id_chickin = b.id_chickin JOIN tb_kandang c ON a.id_kandang = c.id_kandang WHERE a.id_jadwal ='".$row['id_jadwal']."' AND kode_kandang='K10'")->row_array();
          $kdg1_11 = $this->db->query("SELECT *, a.total_male AS tmale FROM `tb_populasi_detail` a JOIN tb_chickin b ON a.id_chickin = b.id_chickin JOIN tb_kandang c ON a.id_kandang = c.id_kandang WHERE a.id_jadwal ='".$row['id_jadwal']."' AND kode_kandang='K11'")->row_array();
          $kdg1_12 = $this->db->query("SELECT *, a.total_male AS tmale FROM `tb_populasi_detail` a JOIN tb_chickin b ON a.id_chickin = b.id_chickin JOIN tb_kandang c ON a.id_kandang = c.id_kandang WHERE a.id_jadwal ='".$row['id_jadwal']."' AND kode_kandang='K12'")->row_array();
          $kdg1_13 = $this->db->query("SELECT *, a.total_male AS tmale FROM `tb_populasi_detail` a JOIN tb_chickin b ON a.id_chickin = b.id_chickin JOIN tb_kandang c ON a.id_kandang = c.id_kandang WHERE a.id_jadwal ='".$row['id_jadwal']."' AND kode_kandang='K13'")->row_array();
          $kdg1_14 = $this->db->query("SELECT *, a.total_male AS tmale FROM `tb_populasi_detail` a JOIN tb_chickin b ON a.id_chickin = b.id_chickin JOIN tb_kandang c ON a.id_kandang = c.id_kandang WHERE a.id_jadwal ='".$row['id_jadwal']."' AND kode_kandang='K14'")->row_array();
          $kdg1_15 = $this->db->query("SELECT *, a.total_male AS tmale FROM `tb_populasi_detail` a JOIN tb_chickin b ON a.id_chickin = b.id_chickin JOIN tb_kandang c ON a.id_kandang = c.id_kandang WHERE a.id_jadwal ='".$row['id_jadwal']."' AND kode_kandang='K15'")->row_array();
          $kdg1_16A = $this->db->query("SELECT *, a.total_male AS tmale FROM `tb_populasi_detail` a JOIN tb_chickin b ON a.id_chickin = b.id_chickin JOIN tb_kandang c ON a.id_kandang = c.id_kandang WHERE a.id_jadwal ='".$row['id_jadwal']."' AND kode_kandang='K16A'")->row_array();
          $kdg1_16B = $this->db->query("SELECT *, a.total_male AS tmale FROM `tb_populasi_detail` a JOIN tb_chickin b ON a.id_chickin = b.id_chickin JOIN tb_kandang c ON a.id_kandang = c.id_kandang WHERE a.id_jadwal ='".$row['id_jadwal']."' AND kode_kandang='K16B'")->row_array();
          $kdg1_17A = $this->db->query("SELECT *, a.total_male AS tmale FROM `tb_populasi_detail` a JOIN tb_chickin b ON a.id_chickin = b.id_chickin JOIN tb_kandang c ON a.id_kandang = c.id_kandang WHERE a.id_jadwal ='".$row['id_jadwal']."' AND kode_kandang='K17A'")->row_array();
          $kdg1_17B = $this->db->query("SELECT *, a.total_male AS tmale FROM `tb_populasi_detail` a JOIN tb_chickin b ON a.id_chickin = b.id_chickin JOIN tb_kandang c ON a.id_kandang = c.id_kandang WHERE a.id_jadwal ='".$row['id_jadwal']."' AND kode_kandang='K17B'")->row_array();
          $kdg1_18B = $this->db->query("SELECT *, a.total_male AS tmale FROM `tb_populasi_detail` a JOIN tb_chickin b ON a.id_chickin = b.id_chickin JOIN tb_kandang c ON a.id_kandang = c.id_kandang WHERE a.id_jadwal ='".$row['id_jadwal']."' AND kode_kandang='K18B'")->row_array();
          $kdg1_19A = $this->db->query("SELECT *, a.total_male AS tmale FROM `tb_populasi_detail` a JOIN tb_chickin b ON a.id_chickin = b.id_chickin JOIN tb_kandang c ON a.id_kandang = c.id_kandang WHERE a.id_jadwal ='".$row['id_jadwal']."' AND kode_kandang='K19A'")->row_array();
          $kdg1_19B = $this->db->query("SELECT *, a.total_male AS tmale FROM `tb_populasi_detail` a JOIN tb_chickin b ON a.id_chickin = b.id_chickin JOIN tb_kandang c ON a.id_kandang = c.id_kandang WHERE a.id_jadwal ='".$row['id_jadwal']."' AND kode_kandang='K19B'")->row_array();

          $tottmale = $kdg1_1['tmale'] + $kdg1_2['tmale'] + $kdg1_3['tmale'] + $kdg1_4['tmale'] + $kdg1_5['tmale'] + $kdg1_6['tmale'] + $kdg1_7['tmale'] + $kdg1_8['tmale'] + $kdg1_9['tmale'] + $kdg1_10['tmale'] + $kdg1_11['tmale'] + $kdg1_12['tmale'] + $kdg1_13['tmale'] + $kdg1_14['tmale'] + $kdg1_15['tmale'] + $kdg1_16A['tmale'] + $kdg1_16B['tmale'] + $kdg1_17A['tmale'] + $kdg1_17B['tmale'] + $kdg1_18B['tmale'] + $kdg1_19A['tmale'] + $kdg1_19B['tmale'];
          
        echo "
          <tr >
              <td>".tgl_indo($row['pembuatan'])."</td>
                  <td>$kdg1_1[tmale] </td>
                  <td>$kdg1_2[tmale]</td>
                  <td>$kdg1_3[tmale]</td>
                  <td>$kdg1_4[tmale]</td>
                  <td>$kdg1_5[tmale]</td>
                  <td>$kdg1_6[tmale]</td>
                  <td>$kdg1_7[tmale]</td>
                  <td>$kdg1_8[tmale]</td>
                  <td>$kdg1_9[tmale]</td>
                  <td>$kdg1_10[tmale]</td>
                  <td>$kdg1_11[tmale]</td>
                  <td>$kdg1_12[tmale]</td>
                  <td>$kdg1_13[tmale]</td>
                  <td>$kdg1_14[tmale]</td>
                  <td>$kdg1_15[tmale]</td>
                  <td>$kdg1_16A[tmale]</td>
                  <td>$kdg1_16B[tmale]</td>
                  <td>$kdg1_17A[tmale]</td>
                  <td>$kdg1_17B[tmale]</td>
                  <td>$kdg1_18B[tmale]</td>
                  <td>$kdg1_19A[tmale]</td>
                  <td>$kdg1_19B[tmale]</td>
                  <td>$tottmale</td>
              </tr>
              ";
            }
            ?>
      </tbody>
      </table>
      </div>
    </div>
  </div>

  <div class="box table-responsive padding">
    <div class="box-header">
      <h3 class="box-title">Female Depletion</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
      <div class="box-body"><form method="get" action="<?php echo base_url();?>daily_report_summary">
        <table id='tbl_ps3' class='table table-bordered table-striped table-condensed'>
        <thead>
          <tr bgcolor='#f39c12'>
            <th rowspan="2" style='width:80px'>Date</th>
            <th colspan='22'>Kandang</th>
          </tr>
          <tr bgcolor=''>
            <th style='width:80px'>001</th>
            <th style='width:80px'>002</th>
            <th style='width:80px'>003</th>
            <th style='width:80px'>004</th>
            <th style='width:80px'>005</th>
            <th style='width:80px'>006</th>
            <th style='width:80px'>007</th>
            <th style='width:80px'>008</th>
            <th style='width:80px'>009</th>
            <th style='width:80px'>010</th>
            <th style='width:80px'>011</th>
            <th style='width:80px'>012</th>
            <th style='width:80px'>013</th>
            <th style='width:80px'>014</th>
            <th style='width:80px'>015</th>
            <th style='width:80px'>016A</th>
            <th style='width:80px'>016B</th>
            <th style='width:80px'>017A</th>
            <th style='width:80px'>017B</th>
            <th style='width:80px'>018B</th>
            <th style='width:80px'>019A</th>
            <th style='width:80px'>019B</th>
            <th style='width:150px'>Total</th>
          </tr>
        </thead>
        <tbody>
        <?php
        foreach ($record->result_array() as $row){
          $ps = $this->db->query("SELECT *, SUM(a.female_mati+a.female_cull) AS tfemale FROM `tb_populasi_detail` a JOIN tb_chickin b ON a.id_chickin = b.id_chickin JOIN tb_kandang c ON a.id_kandang = c.id_kandang WHERE a.id_jadwal ='".$row['id_jadwal']."'")->row_array();
          $kdg1_1 = $this->db->query("SELECT *, a.total_female AS tfemale FROM `tb_populasi_detail` a JOIN tb_chickin b ON a.id_chickin = b.id_chickin JOIN tb_kandang c ON a.id_kandang = c.id_kandang WHERE a.id_jadwal ='".$row['id_jadwal']."' AND kode_kandang='K01'")->row_array();
          $kdg1_2 = $this->db->query("SELECT *, a.total_female AS tfemale FROM `tb_populasi_detail` a JOIN tb_chickin b ON a.id_chickin = b.id_chickin JOIN tb_kandang c ON a.id_kandang = c.id_kandang WHERE a.id_jadwal ='".$row['id_jadwal']."' AND kode_kandang='K02'")->row_array();
          $kdg1_3 = $this->db->query("SELECT *, a.total_female AS tfemale FROM `tb_populasi_detail` a JOIN tb_chickin b ON a.id_chickin = b.id_chickin JOIN tb_kandang c ON a.id_kandang = c.id_kandang WHERE a.id_jadwal ='".$row['id_jadwal']."' AND kode_kandang='K03'")->row_array();
          $kdg1_4 = $this->db->query("SELECT *, a.total_female AS tfemale FROM `tb_populasi_detail` a JOIN tb_chickin b ON a.id_chickin = b.id_chickin JOIN tb_kandang c ON a.id_kandang = c.id_kandang WHERE a.id_jadwal ='".$row['id_jadwal']."' AND kode_kandang='K04'")->row_array();
          $kdg1_5 = $this->db->query("SELECT *, a.total_female AS tfemale FROM `tb_populasi_detail` a JOIN tb_chickin b ON a.id_chickin = b.id_chickin JOIN tb_kandang c ON a.id_kandang = c.id_kandang WHERE a.id_jadwal ='".$row['id_jadwal']."' AND kode_kandang='K05'")->row_array();
          $kdg1_6 = $this->db->query("SELECT *, a.total_female AS tfemale FROM `tb_populasi_detail` a JOIN tb_chickin b ON a.id_chickin = b.id_chickin JOIN tb_kandang c ON a.id_kandang = c.id_kandang WHERE a.id_jadwal ='".$row['id_jadwal']."' AND kode_kandang='K06'")->row_array();
          $kdg1_7 = $this->db->query("SELECT *, a.total_female AS tfemale FROM `tb_populasi_detail` a JOIN tb_chickin b ON a.id_chickin = b.id_chickin JOIN tb_kandang c ON a.id_kandang = c.id_kandang WHERE a.id_jadwal ='".$row['id_jadwal']."' AND kode_kandang='K07'")->row_array();
          $kdg1_8 = $this->db->query("SELECT *, a.total_female AS tfemale FROM `tb_populasi_detail` a JOIN tb_chickin b ON a.id_chickin = b.id_chickin JOIN tb_kandang c ON a.id_kandang = c.id_kandang WHERE a.id_jadwal ='".$row['id_jadwal']."' AND kode_kandang='K08'")->row_array();
          $kdg1_9 = $this->db->query("SELECT *, a.total_female AS tfemale FROM `tb_populasi_detail` a JOIN tb_chickin b ON a.id_chickin = b.id_chickin JOIN tb_kandang c ON a.id_kandang = c.id_kandang WHERE a.id_jadwal ='".$row['id_jadwal']."' AND kode_kandang='K09'")->row_array();
          $kdg1_10 = $this->db->query("SELECT *, a.total_female AS tfemale FROM `tb_populasi_detail` a JOIN tb_chickin b ON a.id_chickin = b.id_chickin JOIN tb_kandang c ON a.id_kandang = c.id_kandang WHERE a.id_jadwal ='".$row['id_jadwal']."' AND kode_kandang='K10'")->row_array();
          $kdg1_11 = $this->db->query("SELECT *, a.total_female AS tfemale FROM `tb_populasi_detail` a JOIN tb_chickin b ON a.id_chickin = b.id_chickin JOIN tb_kandang c ON a.id_kandang = c.id_kandang WHERE a.id_jadwal ='".$row['id_jadwal']."' AND kode_kandang='K11'")->row_array();
          $kdg1_12 = $this->db->query("SELECT *, a.total_female AS tfemale FROM `tb_populasi_detail` a JOIN tb_chickin b ON a.id_chickin = b.id_chickin JOIN tb_kandang c ON a.id_kandang = c.id_kandang WHERE a.id_jadwal ='".$row['id_jadwal']."' AND kode_kandang='K12'")->row_array();
          $kdg1_13 = $this->db->query("SELECT *, a.total_female AS tfemale FROM `tb_populasi_detail` a JOIN tb_chickin b ON a.id_chickin = b.id_chickin JOIN tb_kandang c ON a.id_kandang = c.id_kandang WHERE a.id_jadwal ='".$row['id_jadwal']."' AND kode_kandang='K13'")->row_array();
          $kdg1_14 = $this->db->query("SELECT *, a.total_female AS tfemale FROM `tb_populasi_detail` a JOIN tb_chickin b ON a.id_chickin = b.id_chickin JOIN tb_kandang c ON a.id_kandang = c.id_kandang WHERE a.id_jadwal ='".$row['id_jadwal']."' AND kode_kandang='K14'")->row_array();
          $kdg1_15 = $this->db->query("SELECT *, a.total_female AS tfemale FROM `tb_populasi_detail` a JOIN tb_chickin b ON a.id_chickin = b.id_chickin JOIN tb_kandang c ON a.id_kandang = c.id_kandang WHERE a.id_jadwal ='".$row['id_jadwal']."' AND kode_kandang='K15'")->row_array();
          $kdg1_16A = $this->db->query("SELECT *, a.total_female AS tfemale FROM `tb_populasi_detail` a JOIN tb_chickin b ON a.id_chickin = b.id_chickin JOIN tb_kandang c ON a.id_kandang = c.id_kandang WHERE a.id_jadwal ='".$row['id_jadwal']."' AND kode_kandang='K16A'")->row_array();
          $kdg1_16B = $this->db->query("SELECT *, a.total_female AS tfemale FROM `tb_populasi_detail` a JOIN tb_chickin b ON a.id_chickin = b.id_chickin JOIN tb_kandang c ON a.id_kandang = c.id_kandang WHERE a.id_jadwal ='".$row['id_jadwal']."' AND kode_kandang='K16B'")->row_array();
          $kdg1_17A = $this->db->query("SELECT *, a.total_female AS tfemale FROM `tb_populasi_detail` a JOIN tb_chickin b ON a.id_chickin = b.id_chickin JOIN tb_kandang c ON a.id_kandang = c.id_kandang WHERE a.id_jadwal ='".$row['id_jadwal']."' AND kode_kandang='K17A'")->row_array();
          $kdg1_17B = $this->db->query("SELECT *, a.total_female AS tfemale FROM `tb_populasi_detail` a JOIN tb_chickin b ON a.id_chickin = b.id_chickin JOIN tb_kandang c ON a.id_kandang = c.id_kandang WHERE a.id_jadwal ='".$row['id_jadwal']."' AND kode_kandang='K17B'")->row_array();
          $kdg1_18B = $this->db->query("SELECT *, a.total_female AS tfemale FROM `tb_populasi_detail` a JOIN tb_chickin b ON a.id_chickin = b.id_chickin JOIN tb_kandang c ON a.id_kandang = c.id_kandang WHERE a.id_jadwal ='".$row['id_jadwal']."' AND kode_kandang='K18B'")->row_array();
          $kdg1_19A = $this->db->query("SELECT *, a.total_female AS tfemale FROM `tb_populasi_detail` a JOIN tb_chickin b ON a.id_chickin = b.id_chickin JOIN tb_kandang c ON a.id_kandang = c.id_kandang WHERE a.id_jadwal ='".$row['id_jadwal']."' AND kode_kandang='K19A'")->row_array();
          $kdg1_19B = $this->db->query("SELECT *, a.total_female AS tfemale FROM `tb_populasi_detail` a JOIN tb_chickin b ON a.id_chickin = b.id_chickin JOIN tb_kandang c ON a.id_kandang = c.id_kandang WHERE a.id_jadwal ='".$row['id_jadwal']."' AND kode_kandang='K19B'")->row_array();

          $tottfemale = $kdg1_1['tfemale'] + $kdg1_2['tfemale'] + $kdg1_3['tfemale'] + $kdg1_4['tfemale'] + $kdg1_5['tfemale'] + $kdg1_6['tfemale'] + $kdg1_7['tfemale'] + $kdg1_8['tfemale'] + $kdg1_9['tfemale'] + $kdg1_10['tfemale'] + $kdg1_11['tfemale'] + $kdg1_12['tfemale'] + $kdg1_13['tfemale'] + $kdg1_14['tfemale'] + $kdg1_15['tfemale'] + $kdg1_16A['tfemale'] + $kdg1_16B['tfemale'] + $kdg1_17A['tfemale'] + $kdg1_17B['tfemale'] + $kdg1_18B['tfemale'] + $kdg1_19A['tfemale'] + $kdg1_19B['tfemale'];
          
        echo "
          <tr >
              <td >$row[pembuatan]</td>
                  <td></td>
                  <td>$ps[tfemale]</td>
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

  <div class="box table-responsive padding">
    <div class="box-header">
      <h3 class="box-title">Male Depletion</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
      <div class="box-body"><form method="get" action="<?php echo base_url();?>daily_report_summary">
        <table id='tbl_ps4' class='table table-bordered table-striped table-condensed'>
        <thead>
          <tr bgcolor='#f39c12'>
            <th rowspan="2" style='width:80px'>Date</th>
            <th colspan='22'>Kandang</th>
          </tr>
          <tr bgcolor=''>
            <th style='width:80px'>001</th>
            <th style='width:80px'>002</th>
            <th style='width:80px'>003</th>
            <th style='width:80px'>004</th>
            <th style='width:80px'>005</th>
            <th style='width:80px'>006</th>
            <th style='width:80px'>007</th>
            <th style='width:80px'>008</th>
            <th style='width:80px'>009</th>
            <th style='width:80px'>010</th>
            <th style='width:80px'>011</th>
            <th style='width:80px'>012</th>
            <th style='width:80px'>013</th>
            <th style='width:80px'>014</th>
            <th style='width:80px'>015</th>
            <th style='width:80px'>016A</th>
            <th style='width:80px'>016B</th>
            <th style='width:80px'>017A</th>
            <th style='width:80px'>017B</th>
            <th style='width:80px'>018B</th>
            <th style='width:80px'>019A</th>
            <th style='width:80px'>019B</th>
            <th style='width:150px'>Total</th>
          </tr>
        </thead>
        <tbody>
        <?php
        foreach ($record->result_array() as $row){
          $ps4 = $this->db->query("SELECT *, a.total_female AS tfemale FROM `tb_populasi_detail` a JOIN tb_kandang b ON a.id_kandang = b.id_kandang WHERE a.id_jadwal ='".$row['id_jadwal']."'")->row_array();
          
        echo "
          <tr >
              <td >$row[pembuatan]</td>
                  <td></td>
                  <td>$ps4[tfemale]</td>
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