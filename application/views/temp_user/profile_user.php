<section class="team-boxed">
        <div class="container">
            <div class="intro">
                <h2 class="text-center">Profile</h2>
            </div>
            <div class="row people" style="padding: 5px 0px;">
                <div class="col-md-12 col-lg-12 item">
                    <div class="box">
                        <?php if ($this->session->flashdata('error')) {
                            echo $this->session->flashdata('error');
                        }?>
                        <img class="rounded-circle" src="<?= base_url() ?>assets/img/1.jpg">
                        <h3 class="name"><?= $profile->nama_depan.' '.$profile->nama_belakang; ?></h3>
                        <p class="title"><?= $profile->asal_univ ?></p>
                        <p class="title"><?= date_format (new DateTime($profile->tanggal_lahir), 'd M Y') ?></p>
                        <p class="description">
                            Username : <?= $profile->username ?> | Email : <?= $profile->email ?> | Phone : <?= $profile->phone ?><br>
                            Address : <?= $profile->alamat ?> | Faculty : <?= $profile->fakultas ?> | Major : <?= $profile->jurusan ?> | NPM/NIM : <?= $profile->npm_nim ?>
                        </p>
                        <a href="<?= base_url('userarea/edit_profile/').$profile->username ?>" class="btn btn-dark border rounded-pill" type="button">Edit Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </section>