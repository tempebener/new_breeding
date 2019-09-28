<?php
$kode = $this->db->query("SELECT id_kandang FROM tb_kandang ORDER BY id_kandang DESC LIMIT 1")->row();
date_default_timezone_set("Asia/Jakarta");
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Tambahkan Data Kandang</h3>
                </div>
              <div class='box-body'>";
              $attributes = array('class'=>'form-horizontal','role'=>'form');
              echo form_open_multipart('plant/edit_plant',$attributes);
          echo "<div class='col-md-6 no-border'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <input type='hidden' name='id' value='$row[id_plant]'>

                    <tr><th scope='row'>Perusahaan</th>    <td><select class='select-css form-control' name='g' id='perusahaan' required>
                          <option value=''>- Pilih -</option>";
                          foreach ($perusahaan as $r) {
                            if ($row['id_perusahaan']==$r['id_perusahaan']){
                              echo "<option value='$r[id_perusahaan]' selected>$r[nama_perusahaan]</option>";
                            }else{
                              echo "<option value='$r[id_perusahaan]'>$r[nama_perusahaan]</option>";
                            }
                          }
                      echo "</select></td></tr>
                    <tr><th scope='row'>Nama Plant</th>    <td><input type='text' class='form-control' name='a' autocomplete='off' value='$row[nama_plant]' required></td></tr>
                    <tr><th scope='row'>Alamat</th>    <td><input type='text' class='form-control' autocomplete='off' value='$row[alamat]' name='b'></td></tr>
                    <tr><th width='150px' scope='row'>Website</th>    <td><input type='text' class='form-control' autocomplete='off' value='$row[website]' name='f'></td></tr>
                  </tbody>
                  </table>
                </div>

                <div class='col-md-6 no-border'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>

                    <tr><th scope='row'>Telepon</th>    <td><input type='number' min='0' step='0' class='form-control' autocomplete='off' value='$row[telp]' name='c'></td></tr>
                    <tr><th scope='row'>Fax</th>    <td><input type='number' min='0' step='0' class='form-control' autocomplete='off' value='$row[fax]' name='d'></td></tr>
                    <tr><th scope='row'>Email</th>    <td><input type='text' class='form-control' autocomplete='off' value='$row[email]' name='e'></td></tr>

                  </tbody>
                  </table>
                </div>

              </div>

              <div class='box-footer'>
                <button type='submit' name='submit' class='btn btn-info pull-right'>Update</button>
                <a href='javascript:window.history.go(-1);'><button type='button' class='btn btn-default pull-right'>Batal</button></a>
              </div>
            </div></form>";
