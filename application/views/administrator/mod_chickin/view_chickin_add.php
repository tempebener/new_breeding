<?php
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Tambahkan Data ChickIN</h3>
                </div>
              <div class='box-body'>";
              $attributes = array('class'=>'form-horizontal','role'=>'form');
              echo form_open_multipart('chickin/add',$attributes);
          echo "<div class='col-md-6 no-border'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <input type='hidden' name='id' value=''>

                    <tr><th scope='row'>No Chickin</th>    <td><input type='text' class='form-control' placeholder='Automaticly Generate Code' name='no_chickin' autocomplete='off' readonly required></td></tr>
                    <tr><th scope='row'>Unit Bisnis</th>    <td><select class='select-css form-control' name='id_unit_bisnis' id='unit_bisnis' required>
                                                            <option value=''>- Pilih -</option>";
                                                            foreach ($unit_bisnis as $r) {
                                                                echo "<option value='$r[id_unit_bisnis]'>$r[nama_unit_bisnis] ($r[kode_unit_bisnis])</option>";
                                                            }
                                                        echo "</select></td></tr>
                    <tr><th scope='row'>Perusahaan</th>    <td><select class='select-css form-control' name='id_perusahaan' id='company' required>
                                                            <option value=''>- Pilih -</option>";
                                                            foreach ($perusahaan as $r) {
                                                                echo "<option value='$r[id_perusahaan]'>$r[nama_perusahaan]</option>";
                                                            }
                                                        echo "</select></td></tr>
                    <tr><th scope='row'>Plant</th>    <td><select class='select-css form-control' name='id_plant' id='plant' required>
                                                                <option value=''>- Pilih -</option>
                                                              </select></td></tr>
                    <tr><th scope='row'>Kandang</th>    <td><select class='select-css form-control' name='id_kandang' id='kandang' required>
                                                                <option value=''>- Pilih -</option>
                                                              </select></td></tr>
                    <tr><th scope='row'>Strain</th>    <td><select class='select-css form-control' name='id_strain' id='strain' required>
                                                            <option value=''>- Pilih -</option>";
                                                            foreach ($strain as $r) {
                                                                echo "<option value='$r[id_strain]'>$r[nama_strain] ($r[kode_strain])</option>";
                                                            }
                                                        echo "</select></td></tr>
                    <tr class='hidden'><th scope='row'>id_kat_stock</th>                    <td><div class='checkbox-scroll'>";
                                                                             foreach ($kat_stock as $row){
                                                                               echo "<span style='display:block'><input name='modul[]'  checked type='checkbox' value='$row[id_kat_stock]' /> $row[nama_kat_stock]</span> ";
                                                                             }
                    echo "</div></td></tr>
                    <tr class='hidden'><th scope='row'>nama_stock</th>                    <td><div class='checkbox-scroll'>";
                                                                             foreach ($kat_stock as $row){
                                                                               echo "<span style='display:block'><input name='modul2[]' checked type='checkbox' value='$row[nama_kat_stock]' /> $row[nama_kat_stock]</span> ";
                                                                             }
                    echo "</div></td></tr>
                    <tr class='hidden'><th scope='row'>id_material_stock</th>                    <td><div class='checkbox-scroll'>";
                                                                             foreach ($kat_stock as $row){
                                                                               echo "<span style='display:block'><input name='modul3[]' checked type='checkbox' value='$row[id_material_stock]' /> $row[nama_kat_stock]</span> ";
                                                                             }
                    echo "</div></td></tr>
                    <tr class='hidden'><th scope='row'>id_material_stock</th>                    <td><div class='checkbox-scroll'>";
                                                                             foreach ($kat_stock as $row){
                                                                               echo "<span style='display:block'><input name='modul4[]' checked type='checkbox' value='$row[satuan_stock]' /> $row[nama_kat_stock]</span> ";
                                                                             }
                    echo "</div></td></tr>
                    <tr class='hidden'><th scope='row'>harga</th>                    <td><div class='checkbox-scroll'>";
                                                                             foreach ($kat_stock as $row){
                                                                               echo "<span style='display:block'><input name='modul5[]' checked type='checkbox' value='$row[harga_beli]' /> $row[nama_kat_stock]</span> ";
                                                                             }
                    echo "</div></td></tr>
                  </tbody>
                  </table>
                </div>

                <div class='col-md-6 no-border'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>

                    <tr><th scope='row'>Tanggal Chickin</th>    <td><input type='date' class='form-control' autocomplete='off' name='tgl_chickin' required></td></tr>
                    <tr><th scope='row'>Jumlah Betina</th>    <td><input type='text' class='form-control' autocomplete='off' name='jml_betina' required ></td></tr>
                    <tr><th width='150px' scope='row'>Jumlah Jantan</th>    <td><input type='text' class='form-control' autocomplete='off' name='jml_jantan' required ></td></tr>
                    <tr><th scope='row'>Umur</th>    <td><input type='text' class='form-control' autocomplete='off' name='umur_chickin' placeholder='Misal (hari): 365' required ></td></tr>
                    <tr class='hidden'><th scope='row'>Periode</th>    <td><input type='text' class='form-control' autocomplete='off' name='l' required ></td></tr>
                    <tr><th scope='row'>Asal DOC</th>    <td><select class='select-css form-control' name='id_supplier' id='supplier' required>
                                                            <option value=''>- Pilih -</option>";
                                                            foreach ($supplier as $r) {
                                                                echo "<option value='$r[id_supplier]'>$r[kode_unit_bisnis] $r[nama_supplier]</option>";
                                                            }
                                                        echo "</select></td></tr>

                  </tbody>
                  </table>
                </div>

              </div>
              <div class='box-footer'>
                <button type='submit' name='submit' class='btn btn-info pull-right'>Tambahkan</button>
                <a href='javascript:window.history.go(-1);'><button type='button' class='btn btn-default pull-right'>Batal</button></a>
              </div>
            </div>

            </div></form>";