<div class="simple-slider" style="height: 650px;">
    <div class="swiper-container" style="height: 650px;">
        <div class="swiper-wrapper" style="height: 650px;">
            <?php foreach ($slider as $data) { ?>
                <div class="swiper-slide" style="background: url('/<?= $data->file ?>') center center / cover no-repeat;height: 650px;"></div>
            <?php } ?>
        </div>
        <div class="swiper-pagination"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>
</div>
<section class="features-boxed">
    <div class="container">
        <div class="intro">
            <h2 class="text-center">Layanan Kami</h2>
            <p class="text-center">Nunc luctus in metus eget fringilla. Aliquam sed justo ligula. Vestibulum nibh erat, pellentesque ut laoreet vitae.</p>
        </div>
        <div class="row justify-content-center features">
            <div class="col-sm-6 col-md-5 col-lg-4 item">
                <div class="box"><i class="fa fa-map-marker icon"></i>
                    <h3 class="name">Penyusunan Proposal</h3>
                    <p class="description">Aenean tortor est, vulputate quis leo in, vehicula rhoncus lacus. Praesent aliquam in tellus eu.</p>
                    <a class="btn btn-primary btn-block border rounded-pill" role="button" href="<?= base_url('layanan/detail/penyusunan-proposal') ?>">Lihat Detail</a>
                </div>
            </div>
            <div class="col-sm-6 col-md-5 col-lg-4 item">
                <div class="box"><i class="fa fa-clock-o icon"></i>
                    <h3 class="name">Penyusunan Skripsi</h3>
                    <p class="description">Aenean tortor est, vulputate quis leo in, vehicula rhoncus lacus. Praesent aliquam in tellus eu.</p>
                    <a class="btn btn-primary btn-block border rounded-pill" role="button" href="<?= base_url('layanan/detail/penyusunan-skripsi') ?>">Lihat Detail</a>
                </div>
            </div>
            <div class="col-sm-6 col-md-5 col-lg-4 item">
                <div class="box"><i class="fa fa-list-alt icon"></i>
                    <h3 class="name">Pengolahan Data</h3>
                    <p class="description">Aenean tortor est, vulputate quis leo in, vehicula rhoncus lacus. Praesent aliquam in tellus eu.</p>
                    <a class="btn btn-primary btn-block border rounded-pill" role="button" href="<?= base_url('layanan/detail/pengolahan-data') ?>">Lihat Detail</a>
                </div>
            </div>
            <div class="col-12" style="text-align: center;">
                <a href="<?= base_url('layanan') ?>" class="btn btn-primary" style="border-radius: 34px;"><i class="fa fa-arrow-right"></i> Lihat Layanan Lainnya</a>
            </div>
        </div>
    </div>
</section>
<section class="photo-gallery">
    <div class="container">
        <div class="intro">
            <h2 class="text-center">Moment Bersama Kami</h2>
            <p class="text-center">Nunc luctus in metus eget fringilla. Aliquam sed justo ligula. Vestibulum nibh erat, pellentesque ut laoreet vitae. </p>
        </div>
        <div class="row photos">
            <?php foreach ($gallery as $data) { ?>
                <div class="col-sm-6 col-md-4 col-lg-3 item">
                    <a data-lightbox="photos" href="<?= base_url($data->file) ?>">
                        <img class="img-fluid" src="<?= base_url($data->file) ?>">
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>
</section>