<div class="col-xs-12">
  <div class="box table-responsive padding">

    <div class="box-header">
      <h3 class="box-title">Recording</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
      <div class="box-body"><form method="get" action="<?php echo base_url();?>administrator/recording">
      <table class="table table-condensed table-bordered" width=100%>
      <tbody>

        <tr><th width="120px" scope="row"> Tanggal </th>    <td><input type="date" value="<?php if(isset($from)) echo $from;?>" class="form-control" name="transdate1" required></td></tr>


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

        <td><button type="submit" name="submit" class="btn btn-info">Refresh</button></td>



      </tbody>
      </table>
      <?php
          echo "  <table id='example3' class='table table-bordered table-striped table-condensed'>
        <thead>
          <tr bgcolor='#f39c12'>
            <th colspan='3'></th>
            <th colspan='3'><center>QTY</center></th>
            <th colspan='5'></th>
          </tr>
          <tr bgcolor='#00c0ef'>
            <th style='width:20px'>No</th>
            <th >Kandang</th>
            <th width='60px'>Hari Ke</th>
            <th >Feed Code</th>
            <th width='80px'>Jantan</th>
            <th width='80px'>Betina</th>
            <th width='80px'>Total</th>


            <th>Action</th>
          </tr>
        </thead>
        <tbody>";

        $no = 1;
        foreach ($record->result_array() as $row){
          $detail = $this->db->query("SELECT   GROUP_CONCAT(b.nama_stock SEPARATOR '<br/>') as feed, GROUP_CONCAT(jml_jantan SEPARATOR '<br/>') as jantan, GROUP_CONCAT(jml_betina SEPARATOR '<br/>') as betina, GROUP_CONCAT(jml_pakan SEPARATOR '<br/>') as total  FROM `tb_pakan_detail` a join tb_stock b on a.id_stock = b.id_stock where id_jadwal ='".$row['id_jadwal']."'")->row_array();
        echo "<tr ><td >$no</td>
                  <td>$row[kandang]</td>
                  <td>$row[hari_ke]</td>
                  <td>$detail[feed]</td>
                    <td>$detail[jantan]</td>
                  <td>$detail[betina]</td>
                  <td>$detail[total] </td>

                  <td><center>
                  <a class='btn btn-primary btn-xs' title='Kirim Penjualan (SO)' href='".base_url()."administrator/add_recording/$row[id_jadwal]' ><span class='fa fa-plus'></span></a>
                  </center></td>
              </tr>

              ";
$no++;
}
?>
      </tbody>
    </table>
  </div>
