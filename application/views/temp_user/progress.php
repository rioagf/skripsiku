<section class="contact-clean" style="padding: 50px 0px;min-height: 75vh;">
    <h2 class="text-center">Data Progress Pengerjaan</h2>
    <div class="container">
        <?php
        if (!empty($progress)) {
            foreach ($progress as $data) {
                $timestamp = strtotime($data->date_created);
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
                    <div class="col-md-12"><strong><?= $day.', '.date("d F Y", strtotime($data->date_created)) ?></strong></div>
                </div>
                <div class="row d-lg-flex" style="background: #ffffff;padding: 30px 20px; margin-bottom: 20px;">
                    <div class="col-12" style="padding-bottom: 15px;">
                        <h3><?= $data->nama_produk ?> <a href="https://wa.me/6283815142580?text=Halo, saya mau tanya pesanan saya atasnama <?= $data->nama_lengkap ?> dengan NPM/NIM <?= $data->npm ?> untuk pemesanan <?= $data->nama_produk ?> dengan ID Pemesanan : <?= $data->id_pemesanan ?> sudah sampai mana ya?" class="btn btn-success btn-sm"><i class="fa fa-whatsapp"></i></a></h3>
                    </div>
                    <div class="col-12">
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: <?= $data->progress ?>%" aria-valuenow="<?= $data->progress ?>" aria-valuemin="0" aria-valuemax="100"><?= $data->progress ?>%</div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="ModalCatatan-<?= $data->id_pemesanan ?>" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel ?>" aria-hidden="true">
                    <div class="modal-dialog modal-md">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Catatan Progress Pesanan <?= $data->nama_produk ?></h5>
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
                                                <?php if (!empty($data->pesan)): echo $data->pesan; else: ?>
                                                    Berkas tidak memiliki pesan dari Customer
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
        } else { ?>
            <div class="container">
                <div class="row d-lg-flex" style="background: #ffffff;padding: 10px 0px;">
                    <div class="col-8">
                        Mohon Maaf Belum ada Berkas Masuk
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</section>