<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MENU UTAMA</li>
        <li class="active treeview">
          <a href="index.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>

        <!-- <li>
          <a href="form.php">
            <i class="fa fa-file"></i> <span>Form Peminjaman</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
        </li> -->


        <li>
          <a href="list.php">
            <i class="fa fa-car"></i> <span>List Kendaraan</span> <i class="fa fa-angle-left pull-right"></i>
          </a>

        </li>



        <li>
          <a href="customer.php">
            <i class="fa fa-user"></i> <span>Daftar Nama Pemesan</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
        </li>





        <?php
        $tampil = mysqli_query($koneksi, "select * from user order by user_id desc");
        $total = mysqli_num_rows($tampil);
        ?>




        <li>
          <a href="#">
            <i class="fa fa-lock"></i> <span>Admin</span> <i class="fa fa-angle-left pull-right"> </i>
          </a>
          <ul class="treeview-menu">
            <li><a href="admin.php"><i class="fa fa-circle-o"></i> Admin</a></li>
            <li><a href="input-admin.php"><i class="fa fa-circle-o"></i> Tambah Admin</a></li>
          </ul>
        </li>

  </section>
  <!-- /.sidebar -->
</aside>