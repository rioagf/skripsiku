<?php
$this->db->where('id_setting', '1');
$setting = $this->db->get('setting')->row();
?>
<section class="features-boxed">
    <div class="container" style="padding-top: 65px;padding-bottom: 65px;">
        <div class="intro">
            <h2 class="text-center"><?= $setting->judulsection_laporankeuangan ?></h2>
            <p class="text-center"><?= $setting->desk_laporankeuangan ?></p>
        </div>
        <div class="row justify-content-center features">
            <?php
            $keuangan = $this->db->get('laporan_keuangan')->result();
            foreach ($keuangan as $data) { ?>
                <div class="col-sm-6 col-md-5 col-lg-4 item">
                    <div class="box">
                        <i class="fa fa-book icon"></i>
                        <h3 class="name"><?= $data->judul_laporankeuangan ?></h3>
                        <p class="description"><?= character_limiter($data->keterangan_laporankeuangan, 150) ?></p>
                        <a class="btn btn-primary btn-block border rounded-pill" role="button" href="<?= base_url($data->file_laporankeuangan); ?>" download>Download</a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>