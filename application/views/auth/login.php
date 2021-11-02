<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Skripsiku</title>
    <link rel="stylesheet" href="<?= base_url() ?>assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
    <link rel="stylesheet" href="<?= base_url() ?>assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/Contact-Form-Clean.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/Footer-Basic.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/Highlight-Clean.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/Social-Icons.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/styles.css">
</head>

<body>
	<header>
        <style type="text/css">
            .active{
                background: rgb(51,204,255);
            }
        </style>
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
                        <li class="nav-item">
                            <a class="nav-link <?php if($this->uri->segment(1) == '') { echo 'active'; } ?>" href="<?= base_url() ?>" style="font-family: Montserrat, sans-serif;font-size: 11pt;color: rgb(0,0,0);">Beranda</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle nav-link <?php if($this->uri->segment(1) == 'profile') { echo 'active'; } ?>" aria-expanded="false" data-toggle="dropdown" href="#" style="font-family: Montserrat, sans-serif;font-size: 11pt;color: rgb(0,0,0);">Tentang Kami</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item <?php if($this->uri->segment(2) == 'index') { echo 'active'; } ?>" href="<?= base_url('profile/index') ?>">Profil Perusahaan</a>
                                <a class="dropdown-item <?php if($this->uri->segment(2) == 'index-kepuasan-pengguna') { echo 'active'; } ?>" href="#">Indeks Kepuasan Pengguna</a>
                                <a class="dropdown-item <?php if($this->uri->segment(2) == 'laporan_keuangan') { echo 'active'; } ?>" href="<?= base_url('profile/laporan_keuangan') ?>">Laporan Keuangan</a>
                                <a class="dropdown-item <?php if($this->uri->segment(2) == 'karir') { echo 'active'; } ?>" href="<?= base_url('profile/karir') ?>">Karir</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle nav-link <?php if($this->uri->segment(1) == 'layanan') { echo 'active'; } ?>" aria-expanded="false" data-toggle="dropdown" href="#" style="color: rgb(0,0,0);font-family: Montserrat, sans-serif;font-size: 11pt;">Produk Kami</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item <?php if($this->uri->segment(3) == 'penyusunan-proposal') { echo 'active'; } ?>" href="<?= base_url('layanan/detail/penyusunan-proposal') ?>">Penyusunan Proposal</a>
                                <a class="dropdown-item <?php if($this->uri->segment(3) == 'penyusunan-skripsi') { echo 'active'; } ?>" href="<?= base_url('layanan/detail/penyusunan-skripsi') ?>">Penyusunan Skripsi</a>
                                <a class="dropdown-item <?php if($this->uri->segment(3) == 'pengolahan-data') { echo 'active'; } ?>" href="<?= base_url('layanan/detail/pengolahan-data') ?>">Pengolahan Data</a>
                                <a class="dropdown-item <?php if($this->uri->segment(3) == 'data-sekunder') { echo 'active'; } ?>" href="<?= base_url('layanan/detail/data-sekunder') ?>">Data Sekunder</a>
                                <a class="dropdown-item <?php if($this->uri->segment(3) == 'cek-plagiarisme') { echo 'active'; } ?>" href="<?= base_url('layanan/detail/cek-plagiarisme') ?>">Cek Plagiarisme</a>
                                <a class="dropdown-item <?php if($this->uri->segment(3) == 'pharaphase') { echo 'active'; } ?>" href="<?= base_url('layanan/detail/pharaphase') ?>">Pharaphase</a>
                            </div>
                        </li>
                        <li class="nav-item <?php if($this->uri->segment(1) == 'artikel') { echo 'active'; } ?>">
                            <a class="nav-link" href="<?= base_url('artikel') ?>" style="font-family: Montserrat, sans-serif;font-size: 11pt;color: rgb(0,0,0);">Artikel</a>
                        </li>
                    </ul>
                    <div class="btn-group ml-auto" role="group">
                        <?php if($this->session->userdata('status') != 'login'){ ?>
                            <a class="btn btn-primary text-center border rounded-pill" type="button" style="margin: 5px;font-size: 10pt;font-family: Montserrat, sans-serif;width: 125px;" href="<?= base_url('auth/login') ?>">LOGIN</a>
                            <a class="btn btn-primary text-center border rounded-pill" type="button" style="margin: 5px;font-size: 10pt;font-family: Montserrat, sans-serif;background: rgb(159,159,159);width: 125px;text-align: center;" href="<?= base_url('auth/register') ?>">REGISTER</a>
                        <?php } else { ?>
                            <a class="btn btn-primary text-center border rounded-pill" type="button" style="margin: 5px;font-size: 10pt;font-family: Montserrat, sans-serif;width: 125px;" href="<?= base_url('auth/logout') ?>">LOGOUT</a>
                            <a class="btn btn-primary text-center border rounded-pill" type="button" style="margin: 5px;font-size: 10pt;font-family: Montserrat, sans-serif;background: rgb(159,159,159);width: 125px;text-align: center;" href="<?= base_url('userarea') ?>">CLIENT AREA</a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <section class="d-lg-flex align-items-lg-center" style="min-height: 85vh;background: #f5f5f5;padding-top: 75px;padding-bottom: 75px;">
        <div class="container">
            <div class="row d-lg-flex justify-content-lg-center align-items-lg-center">
                <div class="col-12 col-sm-12 col-lg-5 col-md-5 col-xl-5">
                    <img src="<?= base_url() ?>assets/img/logos.png" width="100%">
                    <?php 
                    if($this->session->flashdata('error') !=''){
                        echo '<div class="alert alert-danger" role="alert">';
                        echo $this->session->flashdata('error');
                        echo '</div>';
                    } else if($this->session->flashdata('success') != '') {
                        echo '<div class="alert alert-success" role="success">';
                        echo $this->session->flashdata('success');
                        echo '</div>';
                    }
                    ?>
                    <form action="<?= base_url('auth/proses_login') ?>" method="POST">
                        <div class="form-group">
                            <label>Email/Username :</label>
                            <input class="form-control" type="text" name="username" placeholder="Email atau Nama Pengguna">
                        </div>
                        <div class="form-group">
                            <label>Password :</label>
                            <input class="form-control" type="password" name="password" placeholder="********">
                        </div>
                        <button class="btn btn-primary" type="submit" style="border-radius: 25px;padding-right: 10%;padding-left: 10%;">Login</button>
                    </form>
                    <div style="text-align: center;padding-top: 30px;padding-bottom: 5px;">
                        <a href="<?= base_url('auth/register') ?>">Belum Punya Akun?</a>
                    </div>
                    <div style="text-align: center;">
                        <a href="<?= base_url('auth/forgot_password') ?>">Lupa Password</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer class="footer-basic">
        <div class="social" style="padding: 7px;">
        	<a href="#"><i class="icon ion-social-instagram"></i></a>
        	<a href="#"><i class="icon ion-social-twitter"></i></a>
        	<a href="#"><i class="icon ion-social-facebook"></i></a>
        </div>
        <p class="copyright" style="margin: 5px 0px 0px;">Copyright &copy; 2021 - Arif Abdillah. All Right Reserved</p>
    </footer>
    <script src="<?= base_url() ?>assets/js/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>