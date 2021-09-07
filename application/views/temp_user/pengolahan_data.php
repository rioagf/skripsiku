<section class="d-lg-flex justify-content-lg-center contact-clean" style="padding: 50px 0px;">
    <form method="post" style="margin: 25px;max-width: none;padding-right: 30px;padding-left: 30px;margin-right: 15px;margin-left: 15px;">
        <h2 class="text-center">Pengolahan Data</h2>
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
                <div class="form-group">
                    <label>NPM / NIM</label>
                    <input class="form-control" type="text" name="npm" placeholder="1823512133" value="<?= $npm_nim; ?>">
                </div>
                <div class="form-group">
                    <label>Judul Proposal</label>
                    <input class="form-control" type="text" name="judulproposal" placeholder="Pengaruh ....">
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <div class="form-group">
                    <label>Aplikasi Pengolah Data</label>
                    <input class="form-control" type="text" name="pengolahdata" placeholder="SPSS">
                </div>
                <div class="form-group">
                    <label>Upload Data Penelitian</label>
                    <input class="border rounded form-control-file" type="file" href="#" style="font-family: Montserrat, sans-serif;font-size: 12pt;background: rgba(51,204,255,0);padding: 5px;" name="datapenelitian">
                </div>
                <div class="form-group">
                    <label>Upload Proposal Skripsi</label>
                    <input class="border rounded form-control-file" type="file" href="#" style="font-family: Montserrat, sans-serif;font-size: 12pt;background: rgba(51,204,255,0);padding: 5px;" name="proposalskripsi">
                </div>
                <div class="form-group">
                    <label>Pesan Singkat</label>
                    <textarea class="form-control" id="ckeditor" name="progress" placeholder="Pak, minta tolong dibuat lebih aman"></textarea>
                </div>
            </div>
        </div>
        <div class="form-group"><button class="btn btn-primary" type="submit">SUBMIT</button></div>
    </form>
</section>