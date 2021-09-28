<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Skripsiku <sup>V1</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?php if ($this->uri->segment('2') == '' || $this->uri->segment('2') == '/'){echo 'active';} ?>">
        <a class="nav-link" href="<?= base_url('adminarea') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Pesanan
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item <?php if ($this->uri->segment('2') == 'list_pemesanan'){echo 'active';} ?>">
        <a class="nav-link" href="<?= base_url('adminarea/list_pemesanan') ?>">
            <i class="fas fa-fw fa-book"></i>
            <span>Pesanan</span>
        </a>
    </li>
    <li class="nav-item <?php if ($this->uri->segment('2') == 'berkas_masuk' || $this->uri->segment('2') == 'berkas_keluar'){echo 'active';} ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-file"></i>
            <span>Berkas</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Jenis Berkas:</h6>
                <a class="collapse-item <?php if ($this->uri->segment('2') == 'berkas_masuk'){echo 'active';} ?>" href="<?= base_url('adminarea/berkas_masuk') ?>">Berkas Masuk</a>
                <a class="collapse-item <?php if ($this->uri->segment('2') == 'berkas_keluar'){echo 'active';} ?>" href="<?= base_url('adminarea/berkas_keluar') ?>">Berkas Keluar</a>
            </div>
        </div>
    </li>
    <li class="nav-item <?php if ($this->uri->segment('2') == 'pembayaran'){echo 'active';} ?>">
        <a class="nav-link" href="<?= base_url('adminarea/pembayaran') ?>">
            <i class="fas fa-fw fa-money-check-alt"></i>
            <span>Pesanan</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Produk dan Artikel
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item <?php if ($this->uri->segment('2') == 'produk' || $this->uri->segment('2') == 'edit_produk' || $this->uri->segment('2') == 'tambah_produk'){echo 'active';} ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Produk</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Item:</h6>
                <a class="collapse-item <?php if ($this->uri->segment('2') == 'produk' || $this->uri->segment('2') == 'edit_produk'){echo 'active';} ?>" href="<?= base_url('adminarea/produk') ?>">List Produk</a>
                <a class="collapse-item <?php if ($this->uri->segment('2') == 'tambah_produk'){echo 'active';} ?>" href="<?= base_url('adminarea/tambah_produk') ?>">Tambah Produk</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item <?php if ($this->uri->segment('2') == 'artikel' || $this->uri->segment('2') == 'tambah_artikel' || $this->uri->segment('2') == 'edit_artikel'){echo 'active';} ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages2" aria-expanded="true" aria-controls="collapsePages2">
            <i class="fas fa-fw fa-pen"></i>
            <span>Artikel</span>
        </a>
        <div id="collapsePages2" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Item:</h6>
                <a class="collapse-item <?php if ($this->uri->segment('2') == 'artikel' || $this->uri->segment('2') == 'edit_artikel'){echo 'active';} ?>" href="<?= base_url('adminarea/artikel') ?>">List Artikel</a>
                <a class="collapse-item <?php if ($this->uri->segment('2') == 'edit_artikel'){echo 'active';} ?>" href="<?= base_url('adminarea/tambah_artikel') ?>">Tambah Artikel</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Heading -->
    <div class="sidebar-heading">
        Slider and Gallery
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item <?php if ($this->uri->segment('2') == 'slider' || $this->uri->segment('2') == 'add_slider' || $this->uri->segment('2') == 'edit_slider'){echo 'active';} ?>">
        <a class="nav-link" href="<?= base_url('adminarea/slider') ?>">
            <i class="fas fa-fw fa-images"></i>
            <span>Slider</span>
        </a>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item <?php if ($this->uri->segment('2') == 'gallery' || $this->uri->segment('2') == 'add_gallery' || $this->uri->segment('2') == 'edit_gallery'){echo 'active';} ?>">
        <a class="nav-link" href="<?= base_url('adminarea/gallery') ?>">
            <i class="fas fa-fw fa-image"></i>
            <span>Galeri</span>
        </a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Karir
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item <?php if ($this->uri->segment('2') == 'karir' || $this->uri->segment('2') == 'tambah_karir' || $this->uri->segment('2') == 'edit_karir'){echo 'active';} ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages3" aria-expanded="true" aria-controls="collapsePages3">
            <i class="fas fa-fw fa-folder"></i>
            <span>Karir</span>
        </a>
        <div id="collapsePages3" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Item:</h6>
                <a class="collapse-item <?php if ($this->uri->segment('2') == 'karir' || $this->uri->segment('2') == 'edit_karir'){echo 'active';} ?>" href="<?= base_url('adminarea/karir') ?>">List Karir</a>
                <a class="collapse-item <?php if ($this->uri->segment('2') == 'tambah_karir'){echo 'active';} ?>" href="<?= base_url('adminarea/tambah_karir') ?>">Tambah Karir</a>
            </div>
        </div>
    </li>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
    <!-- End of Sidebar -->