<?php
$kode = $this->db->query("SELECT id_kandang FROM tb_kandang ORDER BY id_kandang DESC LIMIT 1")->row();
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Tambahkan Data Kandang</h3>
                </div>
              <div class='box-body'>";
              $attributes = array('class'=>'form-horizontal','role'=>'form');
              echo form_open_multipart('kandang/add',$attributes);
          echo "<div class='col-md-6 no-border'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <input type='hidden' name='id' value=''>

                    <tr><th scope='row'>Perusahaan</th>    <td><select class='select-css form-control' name='a' id='company' required>
                                                            <option value=''>- Pilih -</option>";
                                                            foreach ($perusahaan as $r) {
                                                                echo "<option value='$r[id_perusahaan]'>$r[nama_perusahaan]</option>";
                                                            }
                                                        echo "</select></td></tr>
                    <tr><th scope='row'>Plant</th>    <td><select class='select-css form-control' name='b' id='plant' required>
                                                                <option value=''>- Pilih -</option>
                                                              </select></td></tr>
                    <tr><th scope='row'>Flock</th>    <td><select class='select-css form-control' name='c' id='flock' required>
                                                            <option value=''>- Pilih -</option>";
                                                            foreach ($flock as $r) {
                                                                echo "<option value='$r[id_flock]'>$r[nama_flock]</option>";
                                                            }
                                                        echo "</select></td></tr>
                    <tr><th scope='row'>Tanggal Pembuatan</th>    <td><input type='date' id='datepicker' class='form-control' autocomplete='off' name='h' required></td></tr>
                  </tbody>
                  </table>
                </div>

                <div class='col-md-6 no-border'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>

                    <tr><th scope='row'>Nama Kandang</th>    <td><input type='text' class='form-control' name='d' autocomplete='off' required></td></tr>
                    <tr><th scope='row'>Kode Kandang</th>    <td><input type='text' class='form-control' name='g' autocomplete='off' required></td></tr>
                    <tr><th scope='row'>Tipe Kandang</th>    <td><select class='select-css form-control' name='e' id='kat_kandang' required>
                                                            <option value=''>- Pilih -</option>";
                                                            foreach ($kat_kandang as $r) {
                                                                echo "<option value='$r[id_kat_kandang]'>$r[nama_kat_kandang]</option>";
                                                            }
                                                        echo "</select></td></tr>
                    <tr class='hidden'><th scope='row'>Status Kandang</th>    <td>
                                        <select name='f' id='status' class='form-control'>
                                            <option value='1'>Active</option>
                                            <option value='2'>Not Active</option>
                                        </select></td></tr>

                  </tbody>
                  </table>
                </div>

              </div>
              <div class='box-footer'>
                <button type='submit' name='submit' class='btn btn-info pull-right'>Tambahkan</button>
                <a href='javascript:window.history.go(-1);'><button type='button' class='btn btn-default pull-right'>Batal</button></a>
              </div>

            </div></form>";
