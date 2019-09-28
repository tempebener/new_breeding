<div class="col-xs-12">
  <div class="box table-responsive padding">

    <div class="box-header">
      <h3 class="box-title">ChickIN</h3>
      <a class='pull-right btn btn-primary btn-sm' href='<?php echo base_url(); ?>administrator/add_chickin'>Tambahkan Data</a>
    </div><!-- /.box-header -->
    <div class="box-body">
      <div class="box-body"><form method="get" action="<?php echo base_url();?>administrator/chickin">
      <table class="table table-condensed table-bordered" width=100%>
      <tbody>



  					  <tr><th width="120px" scope="row">plant</th>    <td>
  						<select name="plant" class="form-control" required>
  						<?php $sql = "select * from tb_plant order by nama_plant";
  						$aa=$this->db->query($sql)->result();
  						foreach($aa as $a){
  						?>
  							<option <?php if($a->nama_plant == $plant) echo 'selected';?> value="<?php echo $a->id_plant;?>"><?php echo $a->nama_plant;?></option>
  						<?php } ?>
  						</select>
  					  </td></tr>

              <tr><th width="120px" scope="row">status</th>    <td>
  						<select name="status" class="form-control" required>
  						<?php $sql = "select * from tb_status order by nama_status";
  						$aa=$this->db->query($sql)->result();
  						foreach($aa as $a){
  						?>
  							<option <?php if($a->nama_status == $status) echo 'selected';?> value="<?php echo $a->id_status;?>"><?php echo $a->nama_status;?></option>
  						<?php } ?>
  						</select>
  					  </td></tr>

        <td><button type="submit" name="submit" class="btn btn-info">Refresh</button></td>



      </tbody>
      </table>
      <table id='example1' class='table table-bordered table-striped table-condensed'>
        <thead>

          <tr bgcolor='#00c0ef'>
            <th style='width:20px'>No</th>
            <th >No Chikin</th>
            <th >Kandang</th>
            <th >Tgl Mulai</th>
            <th >status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>

        <?php
        $no = 1;
        foreach ($record->result_array() as $row){
        echo "<tr ><td >$no</td>
                  <td>$row[no_chickin]</td>
                  <td>$row[kandang]</td>
                  <td>".tgl_indo($row['tgl_chickin'])."</td>
                  <td>$row[status]</td>
                  <td><center>
                    <a class='btn btn-success btn-xs' title='Edit Data' href='".base_url()."administrator/edit_chickin/$row[id_chickin]'><span class='glyphicon glyphicon-edit'></span></a>
                    <a class='btn btn-danger btn-xs' title='Delete Data' href='".base_url()."administrator/delete_chickin/$row[id_chickin]' onclick=\"return confirm('Apa anda yakin untuk hapus Data ini?')\"><span class='glyphicon glyphicon-remove'></span></a>
                  </center></td>
              </tr>

              ";
$no++;
}
?>
      </tbody>
    </table>
  </div>
