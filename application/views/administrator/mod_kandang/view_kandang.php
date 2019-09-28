<div class="col-xs-12">
  <div class="box table-responsive padding">

    <div class="box-header">
      <h3 class="box-title">Kandang</h3>
      <a class='pull-right btn btn-primary btn-sm' href='<?php echo base_url(); ?>kandang/add'>Tambahkan Data</a>
    </div><!-- /.box-header -->
    <div class="box-body">
      <form method="get" action="<?php echo base_url();?>kandang">
      <div class="col-md-6">

          <!-- <tr><th width="120px" scope="row">Perusahaan</th>    <td>
            <select name="perusahaan" class="select-css form-control" required>
              <option value=''>- Pilih -</option>
              <?php $sql = "SELECT * FROM tb_perusahaan ORDER BY nama_perusahaan";
              $aa=$this->db->query($sql)->result();
              foreach($aa as $a){
              ?>
                <option <?php if($a->nama_perusahaan == $perusahaan) echo 'selected';?> value="<?php echo $a->id_perusahaan;?>"><?php echo $a->nama_perusahaan;?></option>
              <?php } ?>
            </select>
          </td></tr> -->

          <div class="col-md-12 min-left">
            <div class="col-md-2">
              <h4 width="120px" scope="row">Plant</h4> 
            </div>
            <div class="col-md-10">
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
          </div>

          <div class="col-md-12 min-left">
            <div class="col-md-2">
              <h4 width="120px" scope="row">Status</h4> 
            </div>
            <div class="col-md-10">
              <select name="status" class="select-css form-control" required>
                <option value=''>- Pilih -</option>
                <?php $sql = "SELECT * FROM tb_status ORDER BY nama_status";
                $aa=$this->db->query($sql)->result();
                foreach($aa as $a){
                ?>
                  <option <?php if($a->nama_status == $status) echo 'selected';?> value="<?php echo $a->id_status;?>"><?php echo $a->nama_status;?></option>
                <?php } ?>
              </select>
            </div>
          </div>

          <div><button type="submit" name="submit" class="btn btn-info">Refresh</button></div>

        </tbody>
        </table>
      </div>
    </div>
  </div>
</div>  

<div class="col-xs-12">
  <div class="box table-responsive padding">
    <div class="box-body">
      <div class="box-body"><form method="get" action="<?php echo base_url();?>kandang">
      <table id='example1' class='table table-bordered table-striped table-condensed'>
        <thead>

          <tr bgcolor='#00c0ef'>
            <th style='width:20px'>No</th>
            <th>Kandang</th>
            <th>Kode Kandang</th>
            <th>Flock</th>
            <th>Tgl Pembuatan</th>
            <th>Status</th>
            <th width="60px">Action</th>
          </tr>
        </thead>
        <tbody>

        <?php
        $no = 1;
        foreach ($record->result_array() as $row){
        echo "<tr ><td >$no</td>
                  <td>$row[nama_kandang]</td>
                  <td>$row[kode_kandang]</td>
                  <td>$row[flock]</td>
                  <td>".tgl_indo($row['tgl_pembuatan_kandang'])."</td>
                  <td>$row[status]</td>
                  <td><center>
                    <a class='btn btn-success btn-xs' title='Edit Data' href='".base_url()."kandang/edit/$row[id_kandang]'><span class='glyphicon glyphicon-edit'></span></a>
                    <a class='btn btn-danger btn-xs' title='Delete Data' href='".base_url()."kandang/delete/$row[id_kandang]' onclick=\"return confirm('Apa anda yakin untuk hapus Data ini?')\"><span class='glyphicon glyphicon-remove'></span></a>
                  </center></td>
              </tr>

              ";
        $no++;
        }
        ?>
      </tbody>
    </table>
  </div>
