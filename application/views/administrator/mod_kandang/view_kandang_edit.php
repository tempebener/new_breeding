<?php
$kode = $this->db->query("SELECT id_kandang FROM tb_kandang ORDER BY id_kandang DESC LIMIT 1")->row();
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Tambahkan Data Kandang</h3>
                </div>
              <div class='box-body'>";
              $attributes = array('class'=>'form-horizontal','role'=>'form');
              echo form_open_multipart('kandang/edit',$attributes);
          echo "<div class='col-md-6 no-border'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <input type='hidden' name='id' value='$row[id_kandang]'>

                    <tr><th scope='row'>Perusahaan</th>    <td><select class='select-css form-control' name='a' id='company' required>
                                                            <option value=''>- Pilih -</option>";
                                                            foreach ($perusahaan as $r) {
                                                              if ($row['id_perusahaan']==$r['id_perusahaan']){
                                                                echo "<option value='$r[id_perusahaan]' selected>$r[nama_perusahaan]</option>";
                                                              }else{
                                                                echo "<option value='$r[id_perusahaan]'>$r[nama_perusahaan]</option>";
                                                              }
                                                            }
                                                        echo "</select></td></tr>
                    <tr><th scope='row'>Plant</th>    <td><select class='select-css form-control' name='b' id='plant' required>
                                                            <option value=''>- Pilih -</option>";
                                                            foreach ($plant as $r) {
                                                              if ($row['id_plant']==$r['id_plant']){
                                                                echo "<option value='$r[id_plant]' selected>$r[nama_plant]</option>";
                                                              }else{
                                                                echo "<option value='$r[id_plant]'>$r[nama_plant]</option>";
                                                              }
                                                            }
                                                        echo "</select></td></tr>
                    <tr><th scope='row'>Flock</th>    <td><select class='select-css form-control' name='c' id='flock' required>
                                                            <option value=''>- Pilih -</option>";
                                                            foreach ($flock as $r) {
                                                              if ($row['id_flock']==$r['id_flock']){
                                                                echo "<option value='$r[id_flock]' selected>$r[nama_flock]</option>";
                                                              }else{
                                                                echo "<option value='$r[id_flock]'>$r[nama_flock]</option>";
                                                              }
                                                            }
                                                        echo "</select></td></tr>
                    <tr><th scope='row'>Tanggal Pembuatan</th>    <td><input type='date' class='form-control' name='h' value='$row[tgl_pembuatan_kandang]' required></td></tr>
                  </tbody>
                  </table>
                </div>

                <div class='col-md-6 no-border'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>

                    <tr><th scope='row'>Nama Kandang</th>    <td><input type='text' class='form-control' name='d' autocomplete='off' value='$row[nama_kandang]' required></td></tr>
                    <tr><th scope='row'>Kode Kandang</th>    <td><input type='text' class='form-control' name='g' autocomplete='off' value='$row[kode_kandang]' required></td></tr>
                    <tr><th scope='row'>Tipe Kandang</th>    <td><select class='select-css form-control' name='e' id='flock' required>
                                                            <option value=''>- Pilih -</option>";
                                                            foreach ($kat_kandang as $r) {
                                                              if ($row['id_kat_kandang']==$r['id_kat_kandang']){
                                                                echo "<option value='$r[id_kat_kandang]' selected>$r[nama_kat_kandang]</option>";
                                                              }else{
                                                                echo "<option value='$r[id_kat_kandang]'>$r[nama_kat_kandang]</option>";
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
