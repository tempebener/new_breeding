<?php
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Tambah Data User</h3>
                </div>
              <div class='box-body'>";
              $attributes = array('class'=>'form-horizontal','role'=>'form');
              echo form_open_multipart('administrator/tambah_manajemenuser',$attributes);
          echo "<div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <tr><th width='120px' scope='row'>Username</th>   <td><input type='text' class='form-control' name='a' onkeyup=\"nospaces(this)\" required></td></tr>
                    <tr><th scope='row'>Password</th>                 <td><input type='password' class='form-control' name='b' onkeyup=\"nospaces(this)\" required></td></tr>
                    <tr><th scope='row'>Nama Lengkap</th>             <td><input type='text' class='form-control' name='c' required></td></tr>
                    <tr><th scope='row'>Alamat Email</th>             <td><input type='email' class='form-control' name='d' required></td></tr>
                    <tr><th scope='row'>Alamat</th>             <td><input type='text' class='form-control' name='z' required></td></tr>
                    <tr><th scope='row'>No Telepon</th>               <td><input type='number' class='form-control' name='e' required></td></tr>
                    <tr><th scope='row'>Upload Foto</th>              <td><input type='file' class='form-control' name='f'></td></tr>
                  
                    <tr><th scope='row'>Level</th>               <td><select name='g' class='form-control' required>
                                                                            <option value='' selected>- Pilih level -</option>";
                                                                            foreach ($asu as $row){
                                                                                echo "<option value='$row[nama_level]'>$row[nama_level]</option>";
                                                                            }
                    echo "</td></tr>
                    <tr><th scope='row'>Akses Modul</th>                    <td><div class='checkbox-scroll'>";
                                                                             foreach ($record as $row){
                                                                               echo "<span style='display:block'><input name='modul[]' type='checkbox' value='$row[id_modul]' /> $row[nama_modul]</span> ";
                                                                             }
                    echo "</div></td></tr>
                  </tbody>
                  </table></div>

              <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Tambahkan</button>
                    <a href='index.php'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>

                  </div>
            </div></div></div>";
            echo form_close();
