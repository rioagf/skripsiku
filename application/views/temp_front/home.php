<?php
$this->db->where('id_setting', '1');
$setting = $this->db->get('setting')->row();

//get produk
$this->db->order_by('nama_produk', 'random');
$this->db->limit(3);
$data_produk = $this->db->get('produk')->result();
?>
<div class="simple-slider" style="height: 650px;">
    <div class="swiper-container" style="height: 650px;">
        <div class="swiper-wrapper" style="height: 650px;">
            <?php foreach ($slider as $data) { ?>
                <div class="swiper-slide" style="background: url('<?= $data->file ?>') center center / cover no-repeat;height: 650px;"></div>
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
            <h2 class="text-center"><?= $setting->judulsection_layanan ?></h2>
            <p class="text-center"><?= $setting->desk_layanan ?></p>
        </div>
        <div class="d-flex align-items-stretch justify-content-center features">
            <?php foreach ($data_produk as $produk): ?>
                <div class="col-sm-6 col-md-5 col-lg-4 item" style="background: #ffffff; padding: 25px; margin: 5px;">
                    <!-- <div class="box"> -->
                        <img src="<?= base_url($produk->image_cover) ?>" width="100%">
                        <h3 class="name"><?= $produk->nama_produk; ?></h3>
                        <p class="description"><?= character_limiter($produk->deskripsi_produk, 100); ?></p>
                        <a class="btn btn-primary btn-block border rounded-pill" role="button" href="<?= base_url('layanan/detail/'.$produk->slug) ?>">Lihat Detail</a>
                    <!-- </div> -->
                </div>
            <?php endforeach ?>
        </div>
    </div>
</section>
<section class="photo-gallery">
    <div class="container">
        <div class="intro">
            <h2 class="text-center"><?= $setting->judulsection_testimonial ?></h2>
            <p class="text-center"><?= $setting->desk_testimoni ?></p>
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