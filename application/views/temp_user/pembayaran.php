<!-- Show Data Layanan -->
<?php 
    $this->db->get('layanan')
?>

<section class="contact-clean" style="padding: 50px 0px;">
    <h2 class="text-center">Pembayaran</h2>
    <div class="row">
        <div class="col">
            <form style="max-width: none;">
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input class="form-control" type="text" name="nama_lengka" placeholder="Rani Rahmawati">
                </div>
                <div class="form-group">
                    <label>Perihal</label>
                    <select class="form-control">
                        <optgroup label="Select Group">
                            <option value="Penyusunan Skripsi" selected="">Penyusunan Skripsi</option>
                            <option value="Pharaphase">Pharaphase</option>
                        </optgroup>
                    </select>
                </div>
                <div class="form-group">
                    <label>Jumlah Pembayaran</label>
                    <input class="form-control" type="text" name="jumlah_pembayaran" placeholder="1000000">
                </div>
                <div class="form-group">
                    <label>Upload Bukti Transfer</label>
                    <input class="form-control-file" type="file" name="file" style="border-radius: 2px;border: 1px solid rgb(210,210,210);box-shadow: 0px 0px 0px 0px;padding: 3px 10px;">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="button">Lakukan Pembayaran</button>
                </div>
            </form>
        </div>
    </div>
</section>
<section class="contact-clean" style="padding: 10px 50px 75px;">
    <h2 class="text-center">Riwayat Pembayaran</h2>
    <div class="container">
        <div class="row d-flex d-lg-flex align-items-center align-items-lg-center">
            <div class="col-md-12">
                <strong>Senin, 26 Juli 2021</strong>
            </div>
        </div>
        <div class="row d-lg-flex" style="background: #ffffff;padding: 10px 0px;">
            <div class="col-8">
                <p>Penyusunan Skripsi<br></p>
            </div>
            <div class="col-4">
                <div class="row d-flex d-lg-flex align-items-center align-items-lg-center">
                    <div class="col-6">
                        <button class="btn btn-success btn-block" type="button" style="padding: 2px 5px;">Lihat</button>
                    </div>
                    <div class="col">
                        <button class="btn btn-primary btn-block" type="button" style="padding: 2px 5px;">Download</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row d-flex d-lg-flex align-items-center align-items-lg-center">
            <div class="col-md-12">
                <strong>Senin, 26 Juli 2021</strong>
            </div>
        </div>
        <div class="row d-lg-flex" style="background: #ffffff;padding: 10px 0px;">
            <div class="col-8">
                <p>Penyusunan Skripsi<br></p>
            </div>
            <div class="col-4">
                <div class="row d-flex d-lg-flex align-items-center align-items-lg-center">
                    <div class="col-6">
                        <button class="btn btn-success btn-block" type="button" style="padding: 2px 5px;">Lihat<br></button>
                    </div>
                    <div class="col">
                        <button class="btn btn-primary btn-block" type="button" style="padding: 2px 5px;">Download<br></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>