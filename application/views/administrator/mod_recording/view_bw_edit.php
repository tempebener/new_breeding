<?php
$attributes = array('class'=>'form-horizontal','role'=>'form');
echo form_open_multipart('recording/edit_bw',$attributes);
$detail = $this->db->query("SELECT tb_jadwal.id_chickin AS chickin, tb_chickin.*, tb_kandang.*, tb_plant.*, tb_stock.*, tb_jadwal.tgl_pembuatan AS pembuatan, tb_plant.nama_plant AS plant, tb_kandang.nama_kandang AS kandang FROM tb_jadwal
JOIN tb_chickin ON tb_jadwal.id_chickin = tb_chickin.id_chickin
JOIN tb_plant ON tb_chickin.id_plant = tb_plant.id_plant
JOIN tb_kandang ON tb_chickin.id_kandang = tb_kandang.id_kandang
JOIN tb_stock ON tb_chickin.id_chickin = tb_stock.id_stock
WHERE id_jadwal ='".$row['id_jadwal']."'")->row_array();
?>

<div id="notifications"><?php echo $this->session->flashdata('msg'); ?></div>
<br>

 <?php
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Edit Data</h3>
                </div>
              <div class='box-body'>";
              $attributes = array('class'=>'form-horizontal','role'=>'form');
              echo form_open_multipart('recording/edit_bw',$attributes);
          echo "<div class='col-md-12'>
                <div class='col-md-12'><h3><u><b> <font color='blue'>Data ChickIn</font><b></u></h3></div>

                <div class='col-md-6'>
                  <div class='form-group'>
                  <label><strong>ChickIN</strong></label>
                  <input type='hidden' name='id_chickin' value='$detail[chickin]'>
                  <input type='text' class='form-control' name='no_chickin' maxlength='40' readonly value='$detail[no_chickin]'></input>
                  </div>

                  <div class='form-group'>
                  <label><strong>Kandang</strong></label>
                  <input type='hidden' name='id_kandang' value='$detail[id_kandang]'>
                  <input type='text' class='form-control' name='nama_kandang' maxlength='40' readonly value='$detail[kandang]'></input>
                  </div>
                </div>

                <div class='col-md-6'>
                  <div class='form-group'>
                  <label><strong>Record Date</strong></label>
                  <input type='hidden' name='id_stock' value='$detail[id_stock]'>
                  <input type='text' class='form-control' name='tgl_pembuatan' maxlength='40' readonly value='$detail[pembuatan]'></input>
                  </div>

                  <div class='form-group'>
                  <label><strong>Plant</strong></label>
                  <input type='hidden' name='id_plant' value='$detail[id_plant]'>
                  <input type='text' class='form-control' name='nama_plant' maxlength='40' readonly value='$detail[plant]'></input>
                  </div>
                </div>

                  <div class='col-md-6 no-border'>
                  <div><h3><u><b> <font color='blue'>BW</font><b></u></h3></div>
                    <table class='table table-condensed table-bordered'>
                    <tbody>
                      <input type='hidden' name='id' value='$row[id_bw_detail]'>
                      <input type='hidden' name='id_jadwal' value='$row[id_jadwal]'>
                      <tr><th width='120px' scope='row'>Jantan</th>    <td class='input-group'><input type='number' min='0' step='0.01' class='form-control' name='jml_jantan' value='$row[jml_jantan]' required>
                        <span class='input-group-addon'>
                            Gram
                        </span></td></tr>
                      <tr><th width='120px' scope='row'>Betina</th>    <td class='input-group'><input type='number' min='0' step='0.01' class='form-control' name='jml_betina' value='$row[jml_betina]' required>
                        <span class='input-group-addon'>
                            Gram
                        </span></td></tr>
                    </tbody>
                  </table>
                  </div>

                  <div class='col-md-6 no-border'>
                  <div><h3><u><b> <font color='blue'>Uniformity</font><b></u></h3></div>
                    <table class='table table-condensed table-bordered'>
                    <tbody>
                      <tr><th width='120px' scope='row'>Jantan</th>    <td class='input-group'><input type='number' min='0' step='0.01' class='form-control' name='uniform_jantan' value='$row[uniform_jantan]' required>
                        <span class='input-group-addon'>
                            <i class='fa fa-percent' aria-hidden='true'></i>
                        </span></td></tr>
                      <tr><th width='120px' scope='row'>Betina</th>    <td class='input-group'><input type='number' min='0' step='0.01' class='form-control' name='uniform_betina' value='$row[uniform_betina]' required>
                        <span class='input-group-addon'>
                            <i class='fa fa-percent' aria-hidden='true'></i>
                        </span></td></tr>
                    </tbody>
                  </table>
                  </div>
                </div>
              </div>
              <div class='box-footer'>
                <button type='submit' name='submit' class='btn btn-info pull-right'>Proses dan Selesai</button>
                <a href='javascript:window.history.go(-1);'><button type='button' class='btn btn-default pull-right'>Batal</button></a>
              </div>
            </div></form>";
