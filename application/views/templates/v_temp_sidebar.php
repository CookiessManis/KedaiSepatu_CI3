<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-store"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Kedai Sepatu </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?php if ($this->uri->segment(1) == 'admin' and $this->uri->segment(2) == '') {
                            echo "active";
                        } ?>">
        <a class="nav-link " href="<?= base_url('admin') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Barang
    </div>

    <li class="nav-item <?php if ($this->uri->segment(1) == 'kategori' and $this->uri->segment(2) == '') {
                            echo "active";
                        } ?>">
        <a class="nav-link" href="<?= base_url('kategori') ?>">
            <i class="fas fa-fw fa-list"></i>
            <span>Kategori</span></a>
    </li>
    <li class="nav-item <?php if ($this->uri->segment(1) == 'barang' and $this->uri->segment(2) == '') {
                            echo "active";
                        } ?>">
        <a class="nav-link" href="<?= base_url('barang') ?>">
            <i class="fas fa-fw fa-shopping-bag"></i>
            <span>Barang</span></a>
    </li>
    <li class="nav-item <?php if ($this->uri->segment(1) == 'gambar_barang' and $this->uri->segment(2) == '') {
                            echo "active";
                        } ?>">
        <a class="nav-link" href="<?= base_url('gambar_barang') ?>">
            <i class="fas fa-fw fa-image"></i>
            <span>Gambar Barang</span></a>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->


    <!-- Nav Item - Utilities Collapse Menu -->


    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Addons
    </div>

    <!-- Nav Item - Pages Collapse Menu -->


    <!-- Nav Item - Charts -->
    <li class="nav-item <?php if ($this->uri->segment(1) == 'laporan' and $this->uri->segment(2) == '') {
                            echo "active";
                        } ?>">
        <a class="nav-link" href="<?= base_url('laporan') ?>">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Laporan Penjualan</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item <?php if ($this->uri->segment(1) == 'pesanan_masuk' and $this->uri->segment(2) == '') {
                            echo "active";
                        } ?>">
        <a class="nav-link" href="<?= base_url('pesanan_masuk') ?>">
            <i class="fas fa-fw fa-envelope"></i>
            <span>Pesanan Masuk</span></a>
    </li>
    <li class="nav-item <?php if ($this->uri->segment(1) == 'pelanggan' and $this->uri->segment(2) == '') {
                            echo "active";
                        } ?>">
        <a class="nav-link" href="<?= base_url('pelanggan') ?>">
            <i class="fas fa-fw fa-user"></i>
            <span>Pelanggan</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>
<!-- End of Sidebar -->