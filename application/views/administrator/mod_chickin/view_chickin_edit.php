<?php
$kode = $this->db->query("SELECT id_chickin FROM tb_chickin ORDER BY id_chickin DESC LIMIT 1")->row();
$sql2 = "SELECT * FROM tb_chickin a JOIN tb_perusahaan b ON a.id_perusahaan=b.id_perusahaan JOIN tb_unit_bisnis c ON a.id_unit_bisnis=c.id_unit_bisnis JOIN tb_plant d ON a.id_plant=d.id_plant JOIN tb_kandang e ON a.id_kandang=e.id_kandang JOIN tb_strain f ON a.id_strain=f.id_strain JOIN tb_supplier g ON a.id_supplier=g.id_supplier WHERE a.id_chickin='" . $row['id_chickin'] . "' ORDER BY a.id_chickin DESC";
$ub = $this->db->query($sql2)->row_array();
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Edit Data ChickIN</h3>
                </div>
              <div class='box-body'>";
              $attributes = array('class'=>'form-horizontal','role'=>'form');
              echo form_open_multipart('chickin/edit',$attributes);
          echo "<div class='col-md-6 no-border'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <input type='hidden' name='id' value='$row[id_chickin]'>

                    <tr><th scope='row'>No Chickin</th>    <td><input type='text' class='form-control' placeholder='Automaticly Generate Code' name='a' autocomplete='off' readonly value='$row[no_chickin]' required></td></tr>
                    <tr><th scope='row'>Unit Bisnis</th>    <td><input type='text' class='form-control' name='m' id='unit_bisnis' autocomplete='off' value='$ub[nama_unit_bisnis]' readonly required></td></tr>
                    <tr><th scope='row'>Perusahaan</th>    <td><input type='text' class='form-control' name='e' id='company' autocomplete='off' value='$ub[nama_perusahaan]' readonly required></td></tr>
                    <tr><th scope='row'>Plant</th>    <td><input type='text' class='form-control' name='g' id='plant' autocomplete='off' value='$ub[nama_plant]' readonly required></td></tr>
                    <tr><th scope='row'>Kandang</th>    <td><input type='text' class='form-control' name='h' id='kandang' autocomplete='off' value='$ub[nama_kandang]' readonly required></td></tr>
                    <tr class='hidden'><th scope='row'>ChickIN Status</th>    <td>
                                        <select name='k' id='status' class='form-control'>
                                            <option value='1'>Active</option>
                                            <option value='2'>Not Active</option>
                                        </select></td></tr>
                  </tbody>
                  </table>
                </div>

                <div class='col-md-6 no-border'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>

                    <tr><th scope='row'>Tanggal Chickin</th>    <td><input type='text' class='form-control' name='f' value='".tgl_indo($row['tgl_chickin'])."' readonly></td></tr>
                    <tr><th scope='row'>Strain</th>    <td><input type='text' class='form-control' name='j' id='strain' autocomplete='off' value='$ub[nama_strain] ($ub[kode_strain])' readonly required></td></tr>
                    <tr><th scope='row'>Periode</th>    <td><input type='text' class='form-control' readonly autocomplete='off' name='l' value='$row[periode]'></td></tr>
                    <tr><th scope='row'>Asal DOC</th>    <td><input type='text' class='form-control' name='n' id='supplier' autocomplete='off' value='$ub[kode_unit_bisnis] $ub[nama_supplier]' readonly required></td></tr>

                  </tbody>
                  </table>
                </div>

                <div class='col-md-12'>
                  <div class='form-group form-input pad-input-right'>
                    <label><strong>Jumlah Betina</strong></label>
                      <input type='number' class='form-control' autocomplete='off' name='b' value='$row[jml_betina]' required min='0' step='0'>
                  </div>

                  <div class='form-group form-input'>
                    <label><strong>Jumlah Jantan</strong></label>
                      <input type='number' class='form-control' autocomplete='off' name='c' value='$row[jml_jantan]' required min='0' step='0'>
                  </div>

                  <div class='form-group form-input pad-input-left'>
                    <label><strong>Umur</strong></label>
                      <input type='number' class='form-control' autocomplete='off' name='d' placeholder='Misal (hari): 365' value='$row[umur_chickin]' required min='0' step='0'>
                  </div>
                </div>
              </div>

              <div class='box-footer'>
                <button type='submit' name='submit' class='btn btn-info pull-right'>Update</button>
                <a href='javascript:window.history.go(-1);'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
              </div>
            </div>
          </form>";
