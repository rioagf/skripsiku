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
            <div class="col-sm-6 col-md-5 col-lg-4 item">
                <div class="box">
                    <i class="fa fa-book icon"></i>
                    <h3 class="name">Laporan Keuangan 2014</h3>
                    <p class="description">Aenean tortor est, vulputate quis leo in, vehicula rhoncus lacus. Praesent aliquam in tellus eu.</p>
                    <a class="btn btn-primary btn-block border rounded-pill" role="button" href="#">Download</a>
                </div>
            </div>
            <div class="col-sm-6 col-md-5 col-lg-4 item">
                <div class="box">
                    <i class="fa fa-book icon"></i>
                    <h3 class="name">Laporan Keuangan 2015</h3>
                    <p class="description">Aenean tortor est, vulputate quis leo in, vehicula rhoncus lacus. Praesent aliquam in tellus eu.</p>
                    <a class="btn btn-primary btn-block border rounded-pill" role="button" href="#">Download</a>
                </div>
            </div>
            <div class="col-sm-6 col-md-5 col-lg-4 item">
                <div class="box">
                    <i class="fa fa-book icon"></i>
                    <h3 class="name">Laporan Keuangan 2017</h3>
                    <p class="description">Aenean tortor est, vulputate quis leo in, vehicula rhoncus lacus. Praesent aliquam in tellus eu.</p>
                    <a class="btn btn-primary btn-block border rounded-pill" role="button" href="#">Download</a>
                </div>
            </div>
        </div>
    </div>
</section>