<?php
$kode = $this->db->query("SELECT id_kat_stock FROM tb_kat_stock ORDER BY id_kat_stock DESC LIMIT 1")->row();
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Tambahkan Data Material</h3>
                </div>
              <div class='box-body'>";
              $attributes = array('class'=>'form-horizontal','role'=>'form');
              echo form_open_multipart('material/edit_material',$attributes);
          echo "<div class='col-md-6 no-border'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <input type='hidden' name='id' value='$row[id_kat_stock]'>

                    <tr><th scope='row'>Nama Material</th>    <td><input type='text' class='form-control' name='a' autocomplete='off' value='$row[nama_kat_stock]' required></td></tr>
                    <tr><th scope='row'>Jenis Material</th>    <td><select class='select-css form-control' name='b' id='nama_material_stock' required>
                      <option value=''>- Pilih -</option>";
                      foreach ($material_stock as $r) {
                        if ($row['id_material_stock']==$r['id_material_stock']){
                          echo "<option value='$r[id_material_stock]' selected>$r[nama_material_stock]</option>";
                        }else{
                          echo "<option value='$r[id_material_stock]'>$r[nama_material_stock]</option>";
                        }
                      }
                    echo "</select></td></tr>
                  </tbody>
                  </table>
                </div>

                <div class='col-md-6 no-border'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>

                    <tr><th scope='row'>Satuan</th>    <td><input type='text' class='form-control' name='c' autocomplete='off' value='$row[satuan_stock]' required></td></tr>
                    <tr><th scope='row'>Supplier</th>    <td><select class='select-css form-control' name='e' id='supplier' required>
                      <option value=''>- Pilih -</option>";
                      foreach ($supplier as $r) {
                        if ($row['id_supplier']==$r['id_supplier']){
                          echo "<option value='$r[id_supplier]' selected>$r[nama_supplier]</option>";
                        }else{
                          echo "<option value='$r[id_supplier]'>$r[nama_supplier]</option>";
                        }
                      }
                    echo "</select></td></tr>

                  </tbody>
                  </table>
                </div>

              </div>

              <div class='box-footer'>
                <button type='submit' name='submit' class='btn btn-info pull-right'>Update</button>
                <a href='javascript:window.history.go(-1);'><button type='button' class='btn btn-default pull-right'>Batal</button></a>
              </div>
            </div></form>";

                    // <tr><th scope='row'>Harga Beli</th>    <td><input type='text' class='form-control' name='d' autocomplete='off' value='$row[harga_beli]' required></td></tr>
