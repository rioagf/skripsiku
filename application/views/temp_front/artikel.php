<?php
$this->db->where('id_setting', '1');
$setting = $this->db->get('setting')->row();
?>
<section class="article-list" style="background: rgb(245,245,245);padding-top: 50px;padding-bottom: 50px;">
    <div class="container shadow-sm" style="background: #ffffff;padding: 50px;padding-top: 25px;padding-bottom: 25px;">
        <div class="intro">
            <h2 class="text-center"><?= $setting->judulsection_artikel ?></h2>
            <p class="text-center"><?= $setting->desk_artikel ?></p>
        </div>
        <div class="row articles">
            <?php foreach ($artikel as $data) { ?>
                <div class="col-sm-6 col-md-4 item">
                    <a href="<?= base_url('artikel/detail/'.$data->slug)?>"><img class="img-fluid" src="<?= base_url($data->gambar_artikel) ?>"></a>
                    <h3 class="name"><?= $data->judul_artikel ?></h3>
                    <p class="description"><?= character_limiter($data->isi_konten, 120); ?></p>
                    <a class="action" href="<?= base_url('artikel/detail/'.$data->slug)?>" style="width: 250px;">
                        <span class="d-lg-flex justify-content-lg-center align-items-lg-center" style="font-size: 14pt;">Selengkapnya&nbsp;<i class="fa fa-arrow-circle-right"></i></span>
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>
</section>