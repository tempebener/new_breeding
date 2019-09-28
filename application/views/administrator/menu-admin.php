        <section class="sidebar">

          <!-- Sidebar user panel -->
          <div class="user-panel">
          <div class="pull-left image">
          <?php $usr = $this->model_app->view_where('users', array('username'=> $this->session->username))->row_array();
                if (trim($usr['foto'])==''){ $foto = 'blank.png'; }else{ $foto = $usr['foto']; } ?>
          <img src="<?php echo base_url(); ?>/asset/foto_user/<?php echo $foto; ?>" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <?php echo "<p>$usr[nama_lengkap]</p>"; ?>
            <a href="#"><i class="fa fa-circle text-success"></i> </a>
          </div>
        </div>

          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header" style='color:#fff; text-transform:uppercase; border-bottom:2px solid #00c0ef'>MENU ADMINISTRATOR</li>
            <li><a href="<?php echo base_url(); ?>administrator/home"><i class="fa fa-h-square"></i> <span>Dashboard</span></a></li>

            <li class="treeview">
              <a href="#"><i class="fa fa-desktop"></i> <span>Master</span><i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url(); ?>plant"><i class="far fa-circle"></i> Plant</a></li>
                <li><a href="<?php echo base_url(); ?>kandang"><i class="far fa-circle"></i> Kandang</a></li>
                <li><a href="<?php echo base_url(); ?>chickin"><i class="far fa-circle"></i> ChickIN</a></li>
                <li><a href="<?php echo base_url(); ?>material"><i class="far fa-circle"></i> Material</a></li>

                <!--<li><a href="<?php echo base_url(); ?>app/hutang_dagang"><i class="far fa-circle"></i> Hutang Dagang</a></li>-->
              </ul>
            </li>

            <li class="treeview">
              <a href="<?php echo base_url(); ?>recording"><i class="fa fa-cart-plus"></i> <span>Daily Report</span><!-- <i class="fa fa-angle-left pull-right"></i> --></a>
              <!-- <ul class="treeview-menu"> -->
                <!-- <li><a href="<?php echo base_url(); ?>recording"><i class="far fa-circle"></i>Daily Report</a></li> -->

                <!--<li><a href="<?php echo base_url(); ?>app/hutang_dagang"><i class="far fa-circle"></i> Hutang Dagang</a></li>-->
              <!-- </ul> -->
            </li>
            
            <li class="treeview">
              <a href="#"><i class="fa fa-archive"></i> <span>Stock</span><i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">

                <li><a href="<?php echo base_url(); ?>stock_material"><i class="far fa-circle"></i> Stock Material</a></li>
                <li><a href="<?php echo base_url(); ?>stock_kandang"><i class="far fa-circle"></i> Stock Kandang</a></li>
              </ul>
            </li>

            <li class="treeview">
              <a href="#"><i class="glyphicon glyphicon-book"></i> <span>Laporan</span><i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url(); ?>laporan_kandang"><i class="far fa-circle"></i> Laporan Kandang</a></li>
                <li><a href="<?php echo base_url(); ?>laporan_farm"><i class="far fa-circle"></i> Laporan Farm</a></li>
                <li><a href="<?php echo base_url(); ?>daily_report_summary"><i class="far fa-circle"></i> Daily Report Summary</a></li>
              </ul>
            </li>

            <li class="treeview">
            <?php
            $cek=$this->model_app->umenu_akses("manajemenuser",$this->session->id_session);
            if($cek==1 OR $this->session->level=='admin'){
            echo "<a href='#'><i class='fa fa-users'></i> <span>Modul Users</span><i class='fa fa-angle-left pull-right'></i></a>";
          }
            ?>
            <ul class="treeview-menu">
            <?php
              $cek=$this->model_app->umenu_akses("manajemenuser",$this->session->id_session);
              if($cek==1 OR $this->session->level=='admin'){
                echo "<li><a href='".base_url()."administrator/manajemenuser'><i class='far fa-circle'></i> Manajemen User</a></li>";
              }


            $cek=$this->model_app->umenu_akses("manajemenuser",$this->session->id_session);
            if($cek==1 OR $this->session->level=='admin'){
              echo "<li><a href='".base_url()."administrator/kategorilevel'><i class='far fa-circle'></i> Level </a></li>";
            }
            ?>
            </ul>
          </li>
          <li><a href="<?php echo base_url(); ?>administrator/logout"><i class="glyphicon glyphicon-off"></i> <span>Logout</span></a></li>
        </ul>
        </section>
