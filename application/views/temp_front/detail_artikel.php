<section class="article-clean" style="padding-top: 50px;padding-bottom: 50px; background: #f5f5f5;">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-xl-8 offset-lg-1 offset-xl-2">
                    <div class="intro">
                        <h1 class="text-center" style="margin: 0;padding: 0;"><?= $artikel->judul_artikel ?></h1>
                        <p class="text-center">Tanggal Terbit : <?= date("d M Y", strtotime($artikel->date_created)); ?> | Penulis : <?= $artikel->username ?></p><img class="img-fluid" src="<?= base_url($artikel->gambar_artikel)?>" style="width: 100%;">
                    </div>
                    <div style="padding: 20px 0"></div>
                    <div class="text">
                        <?= $artikel->isi_konten ?>
                    </div>
                </div>
            </div>
        </div>
</section>