<?php
    $this->db->select('pemesanan.*, pemesanan.id_pemesanan as pesanannya, pemesanan.date_created as tanggal_pesan, produk.id_produk, produk.nama_produk');
    $this->db->join('berkas_keluar', 'berkas_keluar.id_pemesanan = pemesanan.id_pemesanan', 'left');
    $this->db->join('produk', 'produk.id_produk = pemesanan.id_produk', 'left');
    $this->db->where('pemesanan.id_user', $this->session->userdata('id_user'));
    $this->db->group_by('pemesanan.id_pemesanan');
    $data_pesanan = $this->db->get('pemesanan')->result();
?>
<section class="contact-clean" style="padding: 50px 0px;" >
    <h2 class="text-center">Berkas Keluar</h2>
    <div class="row">
        <div class="col-12">
            <form style="max-width: none;" action="<?= base_url('userarea/kirim_berkas_keluar/'.$this->session->userdata('username')) ?>" enctype="multipart/form-data" method="post">
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input class="form-control" type="text" name="nama_lengkap" placeholder="Rani Rahmawati" value="<?= $profile->nama_depan.' '.$profile->nama_belakang; ?>">
                </div>
                <div class="form-group">
                    <label>Perihal</label>
                    <select class="form-control" name="perihal">
                        <optgroup label="Pilih Salah Satu">
                            <option value="Revisi" selected="">Revisi</option>
                            <option value="Pengiriman Berkas">Pengiriman Berkas</option>
                        </optgroup>
                    </select>
                </div>
                <div class="form-group">
                    <label>Untuk Pesanan</label>
                    <select class="form-control" name="id_pemesanan">
                        <optgroup label="Pilih Salah Satu">
                            <?php foreach ($data_pesanan as $pesanan): ?>
                            <option value="<?= $pesanan->pesanannya ?>"><?= $pesanan->nama_produk.' - '.date("d F Y", strtotime($pesanan->tanggal_pesan)) ?></option>
                            <?php endforeach ?>
                        </optgroup>
                    </select>
                </div>
                <div class="form-group">
                    <label>Upload File</label>
                    <input class="form-control-file" type="file" name="dokumen" style="border-radius: 2px;border: 1px solid rgb(210,210,210);box-shadow: 0px 0px 0px 0px;padding: 3px 10px;">
                </div>
                <div class="form-group">
                    <label>Progress Pengerjaan</label>
                    <textarea class="form-control" id="ckeditor" name="catatan" placeholder="Tulis progress anda disini"></textarea>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Kirim</button>
                </div>
            </form>
        </div>
    </div>
</section>
<section class="contact-clean" style="padding: 10px 50px 75px;">
    <h2 class="text-center">Arsip Berkas Keluar</h2>
    <div class="container">
        <?php
        if (!empty($berkas_keluar)) {
            foreach ($berkas_keluar as $databerkas_keluar) {
                $timestamp = strtotime($databerkas_keluar->date_created);
                $day = date('l', $timestamp);
                switch ($day) {
                    case 'Sunday':
                    $day = 'Minggu';
                    break;
                    case 'Monday':
                    $day = 'Senin';
                    break;
                    case 'Tuesday':
                    $day = 'Selasa';
                    break;
                    case 'Wednesday':
                    $day = 'Rabu';
                    break;
                    case 'Thursday':
                    $day = 'Kamis';
                    break;
                    case 'Friday':
                    $day = 'Jumat';
                    break;
                    case 'Saturday':
                    $day = 'Sabtu';
                    break;

                    default:
                    $day = 'Senin';
                    break;
                }
                ?>
                <div class="row d-flex d-lg-flex align-items-center align-items-lg-center">
                    <div class="col-md-12"><strong><?= $day.', '.date("d F Y", strtotime($databerkas_keluar->date_created)) ?></strong></div>
                </div>
                <div class="row d-lg-flex" style="background: #ffffff;padding: 10px 0px;">
                    <div class="col-8">
                        <p><?= str_replace('/upload/file/', '',$databerkas_keluar->dokumen) ?> (Pesanan : <?= $databerkas_keluar->nama_produk; ?>)<br></p>
                    </div>
                    <div class="col-4">
                        <div class="row d-flex d-lg-flex align-items-center align-items-lg-center">
                            <div class="col-6">
                                <button href="#" class="btn btn-success btn-block" type="button" data-toggle="modal" data-target="#ModalCatatan-<?= $databerkas_keluar->id_berkas ?>" style="padding: 2px 5px;">Catatan</button>
                            </div>
                            <div class="col">
                                <a href="<?= base_url($databerkas_keluar->dokumen) ?>" download="<?= str_replace('/upload/file/', '',$databerkas_keluar->dokumen) ?>" class="btn btn-primary btn-block" type="button" style="padding: 2px 5px;">Download</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="ModalCatatan-<?= $databerkas_keluar->id_berkas ?>" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel ?>" aria-hidden="true">
                    <div class="modal-dialog modal-md">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Catatan File <?= str_replace('/upload/file/', '',$databerkas_keluar->dokumen) ?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label style="font-weight: 600">Catatan</label>
                                            <div>
                                                <?php if (!empty($databerkas_keluar->catatan)): ?>    
                                                    <?= $databerkas_keluar->catatan ?>
                                                <?php else: ?>
                                                    Berkas tidak memiliki catatan khusus
                                                <?php endif ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-primary btn-sm">Tutup</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }
        } else {
            echo "Mohon Maaf, anda belum mengirim berkas";
        }?>
    </div>
</section>