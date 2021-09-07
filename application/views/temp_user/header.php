<body>
    <header>
        <div class="container-fluid" style="background: #33ccff;">
            <div class="row">
                <div class="col-auto col-sm-12 col-md-3 col-lg-3 col-xl-2 text-center align-self-center">
                    <img style="width: 100%;" src="<?= base_url() ?>assets/img/logos.png">
                </div>
                <div class="col-auto col-sm-12 col-md-6 col-lg-6 col-xl-7" style="height: 100px;"></div>
                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3" style="padding: 5px 5px;height: 100px;">
                    <a class="btn btn-secondary btn-block btn-sm" role="button" href="#" style="background: rgb(255,255,255);color: rgb(0,0,0);">Hubungi Kami</a>
                    <div class="d-flex justify-content-center align-items-center justify-content-md-center align-items-md-center justify-content-lg-center align-items-lg-center social-icons" style="height: 60px;padding: 0px;background: rgba(255,255,255,0);">
                        <a href="#" style="font-size: 0px;">
                            <i class="fab fa-instagram d-flex d-md-flex d-lg-flex justify-content-center align-items-center justify-content-md-center align-items-md-center justify-content-lg-center align-items-lg-center" style="font-size: 20px;width: 40px;height: 40px;border-color: rgb(255,255,255);border-top-color: rgb(255,255,255);border-bottom-color: rgb(255,255,255);color: rgb(255,255,255);border-radius: 50%;margin: 5px;"></i>
                        </a>
                        <a href="#">
                            <i class="icon ion-ios-email-outline d-flex d-md-flex d-lg-flex justify-content-center align-items-center justify-content-md-center align-items-md-center justify-content-lg-center align-items-lg-center" style="width: 40px;height: 40px;font-size: 20px;color: rgb(255,255,255);border-color: rgb(255,255,255);border-radius: 50%;margin: 5px;"></i>
                        </a>
                        <a href="#">
                            <i class="icon ion-social-whatsapp-outline d-flex d-md-flex d-lg-flex justify-content-center align-items-center justify-content-md-center align-items-md-center justify-content-lg-center align-items-lg-center" style="width: 40px;height: 40px;font-size: 20px;border-color: rgb(255,255,255);color: rgb(255,255,255);border-radius: 50%;margin: 5px;"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <nav class="navbar navbar-light navbar-expand-md sticky-top" style="font-family: Montserrat, sans-serif;">
            <div class="container-fluid">
                <button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1" style="font-size: 12pt;width: 100%;">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse d-xl-flex" id="navcol-1" style="font-family: Montserrat, sans-serif;">
                    <ul class="navbar-nav d-lg-flex justify-content-lg-center align-items-lg-center" style="border-width: 0;border-style: solid;border-top-style: none;border-right-style: none;border-bottom-style: solid;border-bottom-color: #33CCFF;border-left: 1px none rgb(51,204,255) ;">
                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle nav-link" aria-expanded="false" data-toggle="dropdown" href="" style="color: rgb(0,0,0);font-family: Montserrat, sans-serif;font-size: 11pt;background: rgb(255,255,255);">Beranda</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="<?= base_url('userarea/profile') ?>">Profile</a>
                                <a class="dropdown-item" href="<?= base_url('userarea/berkas_masuk/').$this->session->userdata('username'); ?>">Berkas Masuk</a>
                                <a class="dropdown-item" href="<?= base_url('userarea/berkas_keluar/').$this->session->userdata('username'); ?>">Berkas Keluar</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle nav-link" aria-expanded="false" data-toggle="dropdown" href="" style="color: rgb(0,0,0);font-family: Montserrat, sans-serif;font-size: 11pt;background: rgb(255,255,255);">Produk Kami</a>
                            <div class="dropdown-menu">
                                <?php
                                $produk = $this->db->get('produk')->result();
                                foreach ($produk as $menu) { ?>
                                    <a class="dropdown-item" href="<?= base_url('userarea/layanan/'.$menu->slug) ?>"><?= $menu->nama_produk ?></a>
                                <?php } ?>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('userarea/pembayaran/').$this->session->userdata('username'); ?>" style="font-family: Montserrat, sans-serif;font-size: 11pt;color: rgb(0,0,0);">Pembayaran</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('userarea/progress/').$this->session->userdata('username'); ?>" style="font-family: Montserrat, sans-serif;font-size: 11pt;color: rgb(0,0,0);">Progress</a>
                        </li>
                    </ul>
                    <div class="btn-group ml-auto" role="group">
                        <?php if($this->session->userdata('status') != 'login'){ ?>
                            <a class="btn btn-primary text-center border rounded-pill" type="button" style="margin: 5px;font-size: 10pt;font-family: Montserrat, sans-serif;width: 125px;" href="<?= base_url('auth/login') ?>">LOGIN</a>
                            <a class="btn btn-primary text-center border rounded-pill" type="button" style="margin: 5px;font-size: 10pt;font-family: Montserrat, sans-serif;background: rgb(159,159,159);width: 125px;text-align: center;" href="<?= base_url('auth/register') ?>">REGISTER</a>
                        <?php } else { ?>
                            <a class="btn btn-primary text-center border rounded-pill" type="button" style="margin: 5px;font-size: 10pt;font-family: Montserrat, sans-serif;width: 125px;" href="<?= base_url('auth/logout') ?>">LOGOUT</a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </nav>
    </header>