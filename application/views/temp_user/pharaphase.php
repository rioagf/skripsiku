<section class="d-lg-flex justify-content-lg-center contact-clean" style="padding: 50px 0px;">
    <form method="post" action="<?= base_url('layanan/proses_pesan_layanan/') ?>" style="margin: 25px;max-width: none;padding-right: 30px;padding-left: 30px;margin-right: 15px;margin-left: 15px;">
        <h2 class="text-center">Pharaphase</h2>
        <input type="hidden" name="id_produk" value="<?= $id_produk ?>">
        <input type="hidden" name="id_user" value="<?= $this->session->userdata('id_user'); ?>">
        <div class="form-row">
            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input class="form-control" type="text" name="nama" placeholder="Deo Leo" value="<?= $nama_lengkap; ?>" required>
                </div>
                <div class="form-group">
                    <label>Asal Universitas</label>
                    <input class="form-control" type="text" name="univ" placeholder="Universitas Gadjah Mada" value="<?= $asal_univ; ?>" required>
                </div>
                <div class="form-group">
                    <label>Fakultas</label>
                    <input class="form-control" type="text" name="fakultas" placeholder="Informatika" value="<?= $fakultas; ?>">
                </div>
                <div class="form-group">
                    <label>Jurusan</label>
                    <input class="form-control" type="text" name="jurusan" placeholder="Teknik Informatika" value="<?= $jurusan; ?>" required>
                </div>
                <div class="form-group">
                    <label>NPM / NIM</label>
                    <input class="form-control" type="text" name="npm" placeholder="1823512133" value="<?= $npm_nim; ?>" required>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <div class="form-group">
                    <label>Upload Dokumen</label>
                    <input class="border rounded-0 form-control-file" type="file" style="font-family: Montserrat, sans-serif;font-size: 12pt;background: rgba(51,204,255,0);padding: 5px;border-width: 2px;" name="dokumen_pharaphase">
                </div>
                <div class="form-group">
                    <label>Berapa Persen Penurunan</label>
                    <select name="persentase" class="form-control">
                        <option value="0" disabled selected>Pilih Persentase</option>
                        <option value="10%">10%</option>
                        <option value="20%">20%</option>
                        <option value="30%">30%</option>
                        <option value="40%">40%</option>
                        <option value="50%">50%</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Pesan</label>
                    <textarea class="form-control" name="pesan" placeholder="Contoh: Saya ingin dioptimalkan dibagian pharaphase"></textarea>
                </div>
            </div>
        </div>
        <div class="form-group">
            <button class="btn btn-primary" type="submit">SUBMIT</button>
        </div>
    </form>
</section>