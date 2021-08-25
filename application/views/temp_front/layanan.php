<section class="features-boxed">
    <div class="container" style="padding-top: 75px;padding-bottom: 75px;">
        <div class="intro">
            <h2 class="text-center">Produk Kami</h2>
            <p class="text-center">Nunc luctus in metus eget fringilla. Aliquam sed justo ligula. Vestibulum nibh erat, pellentesque ut laoreet vitae.</p>
        </div>
        <div class="row justify-content-center features">
            <?php foreach ($layanan as $data) { ?>
                <div class="col-sm-6 col-md-5 col-lg-4 item">
                    <div class="box">
                        <i class="fa fa-list-alt icon"></i>
                        <h3 class="name"><?= $data->nama_produk; ?></h3>
                        <p class="description"><?= character_limiter($data->deskripsi_produk, 120); ?></p>
                        <a class="btn btn-primary btn-block border rounded-pill" role="button" href="<?= base_url('layanan/detail/'.$data->slug); ?>">Lihat Detail</a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>