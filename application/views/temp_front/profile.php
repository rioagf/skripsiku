<?php
$this->db->where('id_setting', '1');
$setting = $this->db->get('setting')->row();
?>
<div class="container-fluid d-lg-flex hero" style="margin: 0;background: linear-gradient(180deg, rgb(51,204,255) 14%, white 100%);">
        <div class="row d-lg-flex align-items-lg-center" style="padding-top: 75px;padding-bottom: 50px;">
            <div class="col-12 col-lg-6 col-xl-5 offset-xl-1" style="padding: 75px 25px;">
                <h1 style="margin: 0;">Profil</h1>
                <p><?= $setting->desk_profile ?></p>
            </div>
            <div class="col-md-6 col-lg-6 offset-lg-1 offset-xl-0 d-none d-lg-flex justify-content-lg-center align-items-lg-center phone-holder" style="margin: 0;padding: 0;">
                <img class="d-lg-flex device" src="<?= base_url() ?><?= $setting->gambar_profile ?>" style="width: 385px;">
            </div>
        </div>
    </div>
    <section class="highlight-clean" style="padding-top: 75px;padding-bottom: 100px;">
        <div class="container">
            <div class="intro">
                <h2 class="text-center">Visi</h2>
                <p class="text-center"><?= $setting->visi ?></p>
            </div>
        </div>
    </section>
    <section class="highlight-clean" style="background: rgb(245,245,245);padding-top: 100px;padding-bottom: 100px;">
        <div class="container d-lg-flex justify-content-lg-center align-items-lg-center">
            <div class="intro" style="margin: 0;max-width: 850px;">
                <h2 class="text-center">Misi</h2>
                <p class="text-center" style="margin: 0;"><?= $setting->misi ?><br></p>
            </div>
        </div>
    </section>