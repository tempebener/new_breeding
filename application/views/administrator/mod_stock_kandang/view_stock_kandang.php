<div class="col-xs-12">
  <div class="box table-responsive padding">

    <div class="box-header">
      <h3 class="box-title">Stock Kandang</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
      <div class="box-body"><form method="get" action="<?= base_url() ?>stock_kandang">
      <div class="col-md-6">

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
                  <option <?php if($a->nama_plant == $plant) echo 'selected';?> value="<?= $a->id_plant ?>"><?= $a->nama_plant ?></option>
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
            <th style='width:20px'>No</th>
            <th style='width:180px'>Kandang</th>
            <th style='width:120px'>No Chikin</th>
            <th style='width:180px'>Plant</th>
            <th style='width:40px'>Action</th>
          </tr>
        </thead>
        <tbody>
        <?php
          $no = 1;
          $jpakan =0;
          $jovk =0;
          $bwww =0;

          foreach ($record->result_array() as $row){

          echo"
            <tr ><td style='text-align:center;'>$no</td>
                    <td>$row[kandang]</td>
                    <td>$row[no_chickin]</td>
                    <td>$row[nm_plant]</td>
                    <td><center>
                    <a class='btn btn-warning btn-xs' title='Detail Data' href='".base_url()."stock_kandang/detail/$row[id_chickin]'><span class='glyphicon glyphicon-zoom-in'></span></a>
                    </center></td>
                </tr>
                ";
          $no++;
        } ?>
      </tbody>
    </table>
  </div>
