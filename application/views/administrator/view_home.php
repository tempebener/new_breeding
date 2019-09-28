<?php if ($this->session->level == 'admin'){ ?>
  <a style='color:#000' href='<?php echo base_url(); ?>administrator/manajemenuser'>
    <div class="col-md-5 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-red"><i class="fa fa-users"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Users</span>
          <?php $jmld = $this->model_app->view('users')->num_rows(); ?>
          <span class="info-box-number"><?php echo $jmld; ?></span>
        </div><!-- /.info-box-content -->
      </div><!-- /.info-box -->
    </div><!-- /.col -->
    </a>

<?php } ?>




        </div>
      </div>
   </div>
