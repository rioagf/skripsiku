<section class="d-lg-flex justify-content-lg-center contact-clean" style="padding: 50px 0px;">
    <form method="post" action="<?= base_url('layanan/proses_pesan_layanan/') ?>" style="margin: 25px;max-width: none;padding-right: 30px;padding-left: 30px;margin-right: 15px;margin-left: 15px;" enctype="multipart/form-data">
        <h2 class="text-center">Cek Plagiarisme</h2>
        <input type="hidden" name="id_produk" value="<?= $id_produk ?>">
        <input type="hidden" name="id_user" value="<?= $this->session->userdata('id_user'); ?>">
        <div class="form-row">
            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input class="form-control" type="text" name="name" placeholder="Deo Leo" value="<?= $nama_lengkap; ?>">
                </div>
                <div class="form-group">
                    <label>Asal Universitas</label>
                    <input class="form-control" type="text" name="univ" placeholder="Universitas Gadjah Mada" value="<?= $asal_univ; ?>">
                </div>
                <div class="form-group">
                    <label>Fakultas</label>
                    <input class="form-control" type="text" name="fakultas" placeholder="Informatika" value="<?= $fakultas; ?>">
                </div>
                <div class="form-group">
                    <label>Jurusan</label>
                    <input class="form-control" type="text" name="jurusan" placeholder="Teknik Informatika" value="<?= $jurusan; ?>">
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <div class="form-group">
                    <label>NPM / NIM</label>
                    <input class="form-control" type="text" name="npm" placeholder="1823512133" value="<?= $npm_nim; ?>">
                </div>
                <div class="form-group">
                    <label>Upload Dokumen</label>
                    <input class="border rounded form-control-file" type="file" href="#" style="font-family: Montserrat, sans-serif;font-size: 12pt;background: rgba(51,204,255,0);padding: 5px;" name="dokumen" accept="application/pdf">
                </div>
                <div class="form-group">
                    <label>Pesan Singkat</label>
                    <textarea class="form-control" id="ckeditor" name="pesan_singkat" placeholder="Pak, minta tolong dibuat lebih aman"></textarea>
                </div>
            </div>
        </div>
        <div class="form-group">
            <button class="btn btn-primary" type="submit">PESAN SEKARANG</button>
        </div>
    </form>
</section>