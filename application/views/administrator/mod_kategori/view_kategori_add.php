<?php
$kode = $this->db->query("SELECT id_chickin FROM tb_chickin ORDER BY id_chickin DESC LIMIT 1")->row();
date_default_timezone_set("Asia/Jakarta");
$date= date("Ym");
$tahun=substr($date, 2, 4);
$bulan=substr($date, 6, 2);
$plant2 = $this->input->post('g');
$no_chickin = "CI/".$plant2."/".$tahun.$bulan.sprintf("%04s", $kode->id_chickin+1);
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Tambahkan Data ChickIN</h3>
                </div>
              <div class='box-body'>";
              $attributes = array('class'=>'form-horizontal','role'=>'form');
              echo form_open_multipart('administrator/add_chickin',$attributes);
          echo "<div class='col-md-6'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <input type='hidden' name='id' value=''>

                    <tr><th scope='row'>No Chickin</th>    <td><input type='text' class='form-control' name='a' autocomplete='off' readonly required></td></tr>
                    <tr><th scope='row'>Jumlah Betina</th>    <td><input type='text' class='form-control' autocomplete='off' name='b'></td></tr>
                    <tr><th width='150px' scope='row'>Jumlah Jantan</th>    <td><input type='number' class='form-control' autocomplete='off' name='c'></td></tr>
                    <tr><th scope='row'>Umur</th>    <td><input type='text' class='form-control' autocomplete='off' name='i' placeholder='Misal (hari): 365'></td></tr>
                    <tr><th scope='row'>Strain</th>    <td><select class='combobox form-control input-sm' name='j' id='strain' required>
                                                            <option value=''>- Pilih -</option>";
                                                            foreach ($strain as $r) {
                                                                echo "<option value='$r[id_strain]'>$r[nama_strain]</option>";
                                                            }
                                                        echo "</select></td></tr>
                    <tr class='hidden'><th scope='row'>ChickIN Status</th>    <td>
                                        <select name='k' id='status' class='form-control'>
                                            <option value='1'>Active</option>
                                            <option value='2'>Not Active</option>
                                        </select></td></tr>
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

                <div class='col-md-6'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>

                    <tr><th scope='row'>Tanggal Chickin</th>    <td><input type='date' class='form-control' autocomplete='off' name='f'></td></tr>
                    <tr><th scope='row'>Perusahaan</th>    <td><select class='combobox form-control input-sm' name='e' id='perusahaan' required>
                                                            <option value=''>- Pilih -</option>";
                                                            foreach ($perusahaan as $r) {
                                                                echo "<option value='$r[id_perusahaan]'>$r[nama_perusahaan]</option>";
                                                            }
                                                        echo "</select></td></tr>
                    <tr><th scope='row'>Plant</th>    <td><select class='combobox form-control input-sm' name='g' id='plant' required>
                                                            <option value=''>- Pilih -</option>";
                                                            foreach ($plant as $r) {
                                                                echo "<option value='$r[id_plant]'>$r[nama_plant]</option>";
                                                            }
                                                        echo "</select></td></tr>
                    <tr><th scope='row'>Kandang</th>    <td><select class='combobox form-control input-sm' name='h' id='kandang' required>
                                                            <option value=''>- Pilih -</option>";
                                                            foreach ($kandang as $r) {
                                                                echo "<option value='$r[id_kandang]'>$r[nama_kandang]</option>";
                                                            }
                                                        echo "</select></td></tr>

                  </tbody>
                  </table>
                </div>

              </div>
              <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Tambahkan</button>
                    <a href='index.php'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>

                  </div>
            </div></form>";
