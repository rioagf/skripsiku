<section class="d-lg-flex justify-content-lg-center contact-clean" style="padding: 50px 0px;">
    <form method="post" action="<?= base_url('layanan/proses_pesan_layanan/') ?>" style="margin: 25px;max-width: none;padding-right: 30px;padding-left: 30px;margin-right: 15px;margin-left: 15px;">
        <h2 class="text-center">Data Sekunder</h2>
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
                    <input class="form-control" type="text" name="fakultas" placeholder="Informatika" value="<?= $fakultas; ?>" required>
                </div>
                <div class="form-group">
                    <label>Jurusan</label>
                    <input class="form-control" type="text" name="jurusan" placeholder="Teknik Informatika" value="<?= $jurusan; ?>" required>
                </div>
                <div class="form-group">
                    <label>NPM / NIM</label>
                    <input class="form-control" type="text" name="npm" placeholder="1823512133" value="<?= $npm_nim; ?>" required>
                </div>
                <div class="form-group">
                    <label>Judul Proposal</label>
                    <input class="form-control" type="text" name="judulproposal" placeholder="Pengaruh ...." required>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <div class="form-group">
                    <label>Nama Dosen Pembimbing 1</label>
                    <input class="form-control" type="text" name="dospemsatu" placeholder="Dosen Pembimbing, S.H, M.Kom" required>
                </div>
                <div class="form-group">
                    <label>Nama Dosen Pembimbing 2</label>
                    <input class="form-control" type="text" name="dospemdua" placeholder="Dosen Pembimbing, M.Kom." required>
                </div>
                <div class="form-group">
                    <label>Upload Skripsi ACC</label>
                    <input class="border rounded form-control-file" type="file" href="#" style="font-family: Montserrat, sans-serif;font-size: 12pt;background: rgba(51,204,255,0);padding: 5px;" name="skripsiacc">
                </div>
                <div class="form-group">
                    <label>Upload Proposal Skripsi</label>
                    <input class="border rounded form-control-file" type="file" href="#" style="font-family: Montserrat, sans-serif;font-size: 12pt;background: rgba(51,204,255,0);padding: 5px;" name="proposalskripsi">
                </div>
                <div class="form-group">
                    <label>Pesan</label>
                    <textarea class="form-control" name="pesan" placeholder="Contoh: Saya butuh data sekunder untuk proposal skripsi saya"></textarea>
                </div>
            </div>
        </div>
        <div class="form-group">
            <button class="btn btn-primary" type="submit">SUBMIT</button>
        </div>
    </form>
</section>