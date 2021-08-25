<section class="d-lg-flex justify-content-lg-center contact-clean" style="padding: 50px 0px;">
        <form action="<?= base_url('userarea/proses__ubah_profile/').$profile->id_profile ?>" method="post" enctype="multipart/form-data" style="margin: 25px;max-width: none;padding-right: 30px;padding-left: 30px;margin-right: 15px;margin-left: 15px;">
            <h2 class="text-center">Ubah Profile</h2>
            <div class="form-row">
                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <input type="hidden" name="id_profile" value="<?= $profile->id_profile ?>">
                    <input type="hidden" name="username" value="<?= $profile->username ?>">
                    <div class="form-group">
                        <label>Nama Depan</label>
                        <input class="form-control" type="text" name="nama_depan" placeholder="Deo" value="<?= $profile->nama_depan ?>">
                    </div>
                    <div class="form-group">
                        <label>Nama Belakang</label>
                        <input class="form-control" type="text" name="nama_belakang" placeholder="Leo" value="<?= $profile->nama_belakang ?>">
                    </div>
                    <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input class="form-control" type="date" name="tanggal_lahir" value="<?= $profile->tanggal_lahir ?>">
                    </div>
                    <div class="form-group">
                        <label>Asal Universitas</label>
                        <input class="form-control" type="text" name="universitas" placeholder="Universitas Gadjah Mada" value="<?= $profile->asal_univ ?>">
                    </div>
                    <div class="form-group">
                        <label>Fakultas</label>
                        <input class="form-control" type="text" name="fakultas" placeholder="Teknik" value="<?= $profile->fakultas ?>">
                    </div>
                    <div class="form-group">
                        <label>Jurusan</label>
                        <input class="form-control" type="text" name="jurusan" placeholder="Teknik Informatika" value="<?= $profile->jurusan ?>">
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                        <label>NPM / NIM</label>
                        <input class="form-control" type="text" name="npm_nim" placeholder="1823512133" value="<?= $profile->npm_nim ?>">
                    </div>
                    <div class="form-group">
                        <label>Alamat Email</label>
                        <input class="form-control" type="email" name="email" placeholder="contohemail@gmail.com" value="<?= $profile->email ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label>Alamat Lengkap</label>
                        <textarea class="form-control" name="alamat" placeholder="Bekasi Timur, Bekasi"><?= $profile->alamat ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input class="form-control" type="password" name="password" placeholder="Masukan Password Baru ( Biarkan Kosong jika tidak diubah )">
                    </div>
                    <?php if ($profile->ktp == NULL) { ?>
                    <div class="form-group">
                        <label>Upload KTP</label>
                        <input class="border rounded form-control-file" type="file" name="dokumen">
                    </div>
                    <?php } ?>
                </div>
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit">SUBMIT</button>
            </div>
        </form>
    </section>