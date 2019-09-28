<div class="col-md-12">
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Tambah Pinjaman Baru</h3>
                </div>
              <div class="box-body"><?php echo form_open_multipart('administrator/add_chickin'); ?>
<div class="col-md-6">

                  <table class="table table-condensed table-bordered">
                  <tbody>
                    <input type="hidden" name="id" value="">

                    <tr><th width="120px" scope="row">Kode ChickIN</th>    <td><input type="text" class="form-control" name="a" ></td></tr>
                    <tr><th width="120px" scope="row">Betina</th>    <td><input type="text" class="form-control" name="b" ></td></tr>
                    <tr><th width="120px" scope="row">Jantan</th>    <td><input type="text" class="form-control" name="c" ></td></tr>
                    <tr><th width="120px" scope="row">straig</th>    <td><input type="text" class="form-control" name="d" ></td></tr>
                      <tr><th width="120px" scope="row">tanggal</th>    <td><input type="date" class="form-control" name="f" ></td></tr>
                  </tbody>
                  </table>
                </div>

              <div class="box-footer">
                    <button type="submit" name="submit" class="btn btn-info pull-right">Tambahkan</button>
                    <a href="listpinjaman"><button type="button" class="btn btn-default pull-right">Cancel</button></a>
                    <?php echo form_close() ?>
                  </div>
            </div></div></div>
