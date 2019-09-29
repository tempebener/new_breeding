<div class="col-xs-12">
  <div class="box table-responsive padding">

    <div class="box-header">
      <h3 class="box-title">ChickIN</h3>
      <a class='pull-right btn btn-primary btn-sm' href='<?php echo base_url(); ?>chickin/add'>Tambahkan Data</a>
    </div><!-- /.box-header -->
    <div class="box-body">
      <form method="get" action="<?php echo base_url();?>chickin">
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
    						<?php $sql = "select * from tb_status order by nama_status";
    						$aa=$this->db->query($sql)->result();
    						foreach($aa as $a){
    						?>
    							<option <?php if($a->nama_status == $status) echo 'selected';?> value="<?php echo $a->id_status;?>"><?php echo $a->nama_status;?></option>
    						<?php } ?>
    					</select>
            </div>
          </div>

          <div><button type="submit" name="submit" class="btn btn-info">Refresh</button></div>
      </div>
    </div>
  </div>
</div>  


<div class="col-xs-12">
  <div class="box table-responsive padding">
    <div class="box-body">
      <div class="box-body">
      <table id='example1' class='table table-bordered table-striped table-condensed'>
        <thead>

          <tr bgcolor='#00c0ef'>
            <th style='width:20px'>No</th>
            <th >No Chikin</th>
            <th >Kandang</th>
            <th >Female</th>
            <th >Male</th>
            <th >Strain</th>
            <th >Tgl Mulai</th>
            <th >status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>

        <?php
        foreach ($record->result_array() as $row){ ?>
          <tr>
            <td><?= isset($no) ? ++$no : $no=1 ?> </td>
            <td><?= $row['no_chickin'] ?></td>
            <td><?= $row['kandang'] ?></td>
            <td><?= $row['jml_betina'] ?></td>
            <td><?= $row['jml_jantan'] ?></td>
            <td><?= $row['strain'] ?></td>
            <td><?= tgl_indo($row['tgl_chickin']) ?></td>
            <td><?= $row['status'] ?></td>
            <td><center>
              <a class='btn btn-success btn-xs' title='Edit Data' href="<?= base_url('chickin/edit/'.$row['id_chickin']) ?>"><span class='glyphicon glyphicon-edit'></span></a>
              <?php
                  if($row['status_chickin']=="1"){
                    echo "<a class='btn btn-warning btn-xs' title='Non-Aktifkan Data' href='".base_url()."chickin/nonaktif/$row[id_chickin]' onclick=\"return confirm('Apa anda yakin untuk Non-Aktifkan Data ini?')\"><span class='fas fa-recycle'></span></a>";
                  }else{
                    echo "<a class='btn btn-warning btn-xs' title='Aktifkan Data' href='".base_url()."chickin/aktif/$row[id_chickin]' onclick=\"return confirm('Apa anda yakin untuk Aktifkan Data ini?')\"><span class='fas fa-recycle'></span></a>";
                  }
                ?>
              <a class='btn btn-danger btn-xs' title='Delete Data' href="<?= base_url('chickin/delete/'.$row['id_chickin']) ?>" onclick=\"return confirm('Apa anda yakin untuk Delete Data ini?')\"><span class='glyphicon glyphicon-remove'></span></a>
            </center></td>
        </tr>
      <?php } ?>
      </tbody>
    </table>
  </div>
