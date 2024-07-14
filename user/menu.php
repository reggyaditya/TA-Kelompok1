<?php include "../conn.php"; ?>


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

        <li>
          <a href="form.php">
            <i class="fa fa-file"></i> <span>Form Peminjaman</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
        </li>


        <li>
          <a href="list.php">
            <i class="fa fa-car"></i> <span>Detail List Kendaraan</span> <i class="fa fa-angle-left pull-right"></i>
          </a>

        </li>


        <li>
          <a href="customer.php">
            <i class="fa fa-user"></i> <span>Detail Nama Pemesan</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
        </li>


        <li>

          <a href="https://wa.me/6281282498758?text=Selamat Pagi/ Siang/ Sore/ Malam Pak Parlan. Saya Sudah Booking Mobil Ya Pak, Mohon Dicek Ya Pak.">
            <i class="fa fa-whatsapp  "></i> <span>Chat Via WhatsApp</a></span>
          </a>
        </li>





        <?php
        $tampil = mysqli_query($koneksi, "select * from user order by user_id desc");
        $total = mysqli_num_rows($tampil);
        ?>






  </section>
  <!-- /.sidebar -->
</aside>