<div class="col-xs-12">
  <div class="box table-responsive padding">

    <div class="box-header">
      <h3 class="box-title">Laporan Kandang</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
      <div class="box-body"><form method="get" action="<?php echo base_url();?>administrator/laporan_kandang">
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


  					  <tr><th width="120px" scope="row">Kandang</th>    <td>
  						<select name="chickin" class="form-control" required>
  						<?php $sql = "select * from tb_kandang order by nama_kandang";
  						$aa=$this->db->query($sql)->result();
  						foreach($aa as $a){
  						?>
  							<option <?php if($a->nama_kandang == $chickin) echo 'selected';?> value="<?php echo $a->id_kandang;?>"><?php echo $a->nama_kandang;?></option>
  						<?php } ?>
  						</select>
  					  </td></tr>



        <td><button type="submit" name="submit" class="btn btn-info">Refresh</button></td>



      </tbody>
        </table>
        <?php
            echo " <table id='example1' class='table table-bordered table-striped table-condensed'>
        <thead>

          <tr bgcolor='#00c0ef'>
            <th style='width:20px'>No</th>
            <th style='width:80px'>Kandang</th>
            <th style='width:80px'>No Chikin</th>
            <th style='width:20px'>Hari Ke</th>
            <th style='width:80px'>Tanggal</th>
            <th style='width:80px'>FEED</th>
            <th style='width:80px'>OVK</th>
            <th style='width:80px'>BW</th>
            <th style='width:80px'>PS IO</th>
            <th style='width:80px'>EGG</th>



            <th>Action</th>
          </tr>
        </thead>
        <tbody>
        ";

        $no = 1;
        foreach ($record->result_array() as $row){
        echo "
          <tr ><td >$no</td>
                  <td>$row[kandang]</td>
                  <td>$row[no_chickin]</td>
                  <td>$row[hari_ke]</td>
                  <td>".tgl_slash($row['tgl_pembuatan'])."</td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td><center>

                  </center></td>
              </tr>

              ";
$no++;
}
?>
      </tbody>
    </table>
  </div>
