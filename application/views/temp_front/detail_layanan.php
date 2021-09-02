<section class="article-clean" style="padding-top: 50px;padding-bottom: 50px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-xl-8 offset-lg-1 offset-xl-2">
                <div class="intro">
                    <h1 class="text-center" style="margin: 0;padding: 0;"><?= $layanan->nama_produk?></h1>
                    <div style="padding: 20px"></div>
                    <img class="img-fluid" src="<?= base_url($layanan->image_cover)?>" style="width: 100%;">
                </div>
                <div class="text" style="padding: 20px 0">
                    <?= $layanan->deskripsi_produk; ?>
                    <p>Harga layanan :</p>
                    <h1>Rp. <?= number_format($layanan->harga, 0, ",", "."); ?></h1>
                    <h2></h2>
                </div>
                <a href="<?= base_url('layanan/pesan/'.$layanan->slug) ?>" class="btn btn-primary" type="button" style="padding-top: 5px;padding-bottom: 5px;"><i class="fa fa-book"></i> Pesan Sekarang</a>
            </div>
        </div>
    </div>
</section>