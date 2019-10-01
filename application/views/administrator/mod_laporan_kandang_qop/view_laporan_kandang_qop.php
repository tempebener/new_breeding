<div class="col-xs-12">
  <div class="box table-responsive padding">

    <div class="box-header">
      <h3 class="box-title">Laporan Kandang QOP</h3>
    </div>
    <div class="box-body">
      <div class="box-body"><form method="get" action="<?= base_url() ?>laporan_kandang_qop">
        <div class="col-md-6">
          <div class="col-md-12 min-left">

            <div class="col-md-2">
                <h4 width="120px" scope="row">From</h4>
              </div>
              <div class="col-md-10">
                <input type="date" class="form-control" name="from" value="<?php echo $from;?>"/>
              </div>
            </div>

            <div class="col-md-12 min-left">
              <div class="col-md-2">
                <h4 width="120px" scope="row">To</h4>
              </div>
              <div class="col-md-10">
                <input type="date" class="form-control" name="to" value="<?php echo $to;?>"/>
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
                  <option <?php if($a->nama_plant == $plant) echo 'selected';?> value="<?= $a->id_plant ?>"><?= $a->nama_plant ?></option>
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
        <p>Female Populasi</p>
        <table id='example1' class='table table-bordered table-striped table-condensed'>
        <thead>

          <tr bgcolor='#00c0ef'>
            <th style='width:20px'>No</th>
            <th style='width:80px'>Date</th>
            <?php
            $count = 0;
            $sql = "select * from tb_chickin a join tb_kandang b on a.id_kandang = b.id_kandang where status_chickin = 1 ORDER BY a.id_kandang ASC";
                $aa=$this->db->query($sql)->result();
                foreach($aa as $a){
            ?>
            <th><?php echo $a->nama_kandang;?></th>
            <?php $count++; } ?>
            <th>Total</th>
          </tr>
        </thead>
        <tbody>

        <?php
        $no = 1;
        $sql = "select distinct tgl_pembuatan from tb_jadwal where tgl_pembuatan between '$from' and '$to' order by tgl_pembuatan";
        $record = $this->db->query($sql)->result();
        foreach($record as $row){ ?>
          <tr>
            <td><?php echo $no;?></td>
            <td><?php echo date("d/m/Y", strtotime($row->tgl_pembuatan));?></td>
              <?php
              $sql = "select * from tb_chickin a join tb_kandang b on a.id_kandang = b.id_kandang where status_chickin = 1 ORDER BY a.id_kandang ASC";
                  $aa=$this->db->query($sql)->result();
                  $total = 0;
                  foreach($aa as $a){
                  $sql = "select total_female from tb_populasi_detail where id_jadwal in(select id_jadwal from tb_jadwal where tgl_pembuatan = '" .$row->tgl_pembuatan. "')
                      and id_kandang = $a->id_kandang and id_plant = $plant and id_chickin = $a->id_chickin";
                  $x = $this->db->query($sql)->result();

              ?>
              <td align="center"	><?php
    						if($x)
    						{
    							$total+=$x[0]->total_female;
    							echo $x[0]->total_female;
    						}
    						else echo 0;?></td>

              <?php } ?>
              <td>
  				<?php echo floatval($total); ?>
  				</td>
  		<?php $no++;
  		}
        ?>

        </tbody>
        <tfoot>

      </tfoot>
    </table>
    </div>
    </div>
  </div>


  <div class="box table-responsive padding">
    <div class="box-body">
      <div class="box-body"><form method="get" action="<?php echo base_url();?>laporan_kandang">
    <p>Male Populasi</p>
        <table id='example3' class='table table-bordered table-striped table-condensed'>
        <thead>

          <tr bgcolor='#00c0ef'>
            <th style='width:20px'>No</th>
            <th style='width:80px'>Date</th>
            <?php
      $sql = "select * from tb_chickin a join tb_kandang b on a.id_kandang = b.id_kandang where status_chickin = 1 ORDER BY a.id_kandang ASC";
                $aa=$this->db->query($sql)->result();
                foreach($aa as $a){
      ?>
      <th><?php echo $a->nama_kandang;?></th>
            <?php } ?>
            <td>Total</td>
          </tr>
        </thead>
        <tbody>

        <?php
        $no = 1;
         $sql = "select distinct tgl_pembuatan from tb_jadwal where tgl_pembuatan between '$from' and '$to' order by tgl_pembuatan";
    $record = $this->db->query($sql)->result();
    foreach($record as $row){ ?>
      <tr>
        <tD><?php echo $no;?></td>
        <td><?php echo date("d/m/Y", strtotime($row->tgl_pembuatan));?></td>
         <?php
        $sql = "select * from tb_chickin a join tb_kandang b on a.id_kandang = b.id_kandang where status_chickin = 1 ORDER BY a.id_kandang ASC";
                $aa=$this->db->query($sql)->result();
                $total = 0;
                foreach($aa as $a){
              $sql = "select total_male from tb_populasi_detail where id_jadwal in(select id_jadwal from tb_jadwal where tgl_pembuatan = '" .  $row->tgl_pembuatan   . "')
                  and id_kandang = $a->id_kandang and id_plant = $plant and id_chickin = $a->id_chickin" ;
              $x = $this->db->query($sql)->result();

        ?>
        <td align="center"	><?php
        if($x)
        {
          $total += $x[0]->total_male;
          echo $x[0]->total_male;
        }
        else echo 0;?></td>

        <?php } ?>
        <td>
        <?php echo ($total); ?>
        </td>
    <?php $no++;
    }
      ?>
      </tbody>
      <tfoot>

      </tfoot>
    </table>
    </div>
    </div>
  </div>

  <div class="box table-responsive padding">
    <div class="box-body">
      <div class="box-body"><form method="get" action="<?php echo base_url();?>laporan_kandang">
    <p>Female Deplesi (%)</p>
        <table id='example3' class='table table-bordered table-striped table-condensed'>
        <thead>

          <tr bgcolor='#00c0ef'>
            <th style='width:20px'>No</th>
            <th style='width:80px'>Date</th>
            <?php
      $sql = "select * from tb_chickin a join tb_kandang b on a.id_kandang = b.id_kandang where status_chickin = 1 ORDER BY a.id_kandang ASC";
                $aa=$this->db->query($sql)->result();
                foreach($aa as $a){
      ?>
      <th><?php echo $a->nama_kandang;?></th>
            <?php } ?>
            <td>Avg</td>
          </tr>
        </thead>
        <tbody>

        <?php
        $no = 1;
         $sql = "select distinct tgl_pembuatan from tb_jadwal where tgl_pembuatan between '$from' and '$to' order by tgl_pembuatan";
    $record = $this->db->query($sql)->result();
    foreach($record as $row){ ?>
      <tr>
        <tD><?php echo $no;?></td>
        <td><?php echo date("d/m/Y", strtotime($row->tgl_pembuatan));?></td>
         <?php
        $sql = "select * from tb_chickin a join tb_kandang b on a.id_kandang = b.id_kandang where status_chickin = 1 ORDER BY a.id_kandang ASC";
                $aa=$this->db->query($sql)->result();
                $total = 0;
                foreach($aa as $a){
              $sql = "select female_mati, female_cull, total_female from tb_populasi_detail where id_jadwal in(select id_jadwal from tb_jadwal where tgl_pembuatan = '" .  $row->tgl_pembuatan   . "')
                  and id_kandang = $a->id_kandang and id_plant = $plant and id_chickin = $a->id_chickin" ;
              $x = $this->db->query($sql)->result();

        ?>
        <td align="center"	><?php
        if($x)
        {
          $total += number_format(($x[0]->female_mati +  $x[0]->female_cull) / $x[0]->total_female / count($aa), 2);
          echo number_format(($x[0]->female_mati +  $x[0]->female_cull) / $x[0]->total_female, 2);
        }
        else echo 0;?></td>

        <?php } ?>
        <td>
        <?php echo ($total); ?>
        </td>
    <?php $no++;
    }
      ?>
      </tbody>
      <tfoot>

      </tfoot>
    </table>
    </div>
    </div>
  </div>
</div>
