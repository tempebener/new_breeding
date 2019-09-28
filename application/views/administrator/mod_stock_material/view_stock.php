<div class="col-xs-12">
  <div class="box table-responsive padding">

    <div class="box-header">
      <h3 class="box-title">Stock Material</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
      <div class="box-body"><form method="get" action="<?= base_url() ?>stock_material">
      <div class="col-md-6">

          <div class="col-md-12 min-left">
            <div class="col-md-2">
              <h4 width="120px" scope="row">Material</h4> 
            </div>
            <div class="col-md-10">
      				<select name="material" class="select-css form-control" required>
                <option value=''>- Pilih -</option>
        				<?php $sql = "SELECT * FROM tb_material_stock ORDER BY nama_material_stock";
        				$aa=$this->db->query($sql)->result();
        				foreach($aa as $a){
        				?>
        					<option <?php if($a->nama_material_stock == $material) echo 'selected';?> value="<?= $a->id_material_stock ?>"><?= $a->nama_material_stock ?></option>
        				<?php } ?>
      				</select>
            </div>
          </div>
          
          <div><button type="submit" name="submit" class="btn btn-info">Refresh</button></div>
        </div>
    </div>

      </tbody>
        </table>
        <table id='example1' class='table table-bordered table-striped table-condensed'>
        <thead>
          <tr bgcolor='#00c0ef'>
            <th style='width:20px;'>No</th>
            <th >Nama Material</th>
            <th >QTY</th>
            <th >Satuan Unit</th>
            <th style='width:40px'>Action</th>
          </tr>
        </thead>
        <tbody>

      <?php
        $no = 1;
        foreach ($record->result_array() as $row){
          $stock = $this->db->query("SELECT sum(jml_stock) AS jml FROM `tb_stock` WHERE id_kat_stock='".$row['id_kat_stock']."'")->row_array();
        echo "<tr ><td >$no</td>
                  <td>$row[nama_kat_stock]</td>
                  <td>$stock[jml]</td>
                  <td>$row[satuan_stock]</td>

                  <td><center>
                  <a class='btn btn-warning btn-xs' title='Detail Data' href='".base_url()."stock_material/detail/$row[id_kat_stock]'><span class='glyphicon glyphicon-zoom-in'></span></a>
                  </center></td>
              </tr>

              ";
        $no++;
        }
      ?>
      </tbody>
    </table>
  </div>
