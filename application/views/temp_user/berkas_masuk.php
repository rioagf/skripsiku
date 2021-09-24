<section class="contact-clean" style="padding: 50px 0px;min-height: 75vh;">
    <h2 class="text-center">Berkas Masuk</h2>
    <div class="container">
        <?php
        if (!empty($berkas_masuk)) {
            foreach ($berkas_masuk as $databerkas_masuk) {
                $timestamp = strtotime($databerkas_masuk->date_created);
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
                    <div class="col-md-12"><strong><?= $day.', '.date("d F Y", strtotime($databerkas_masuk->date_created)) ?></strong></div>
                </div>
                <div class="row d-lg-flex" style="background: #ffffff;padding: 10px 0px;">
                    <div class="col-8">
                        <p><?= str_replace('/upload/file/', '',$databerkas_masuk->dokumen) ?><br></p>
                    </div>
                    <div class="col-4">
                        <div class="row d-flex d-lg-flex align-items-center align-items-lg-center">
                            <div class="col-6">
                                <button href="#" class="btn btn-success btn-block" type="button" data-toggle="modal" data-target="#ModalCatatan-<?= $databerkas_masuk->id_berkas ?>" style="padding: 2px 5px;">Catatan</button>
                            </div>
                            <div class="col">
                                <a href="<?= base_url($databerkas_masuk->dokumen) ?>" download="<?= str_replace('/upload/file/', '',$databerkas_masuk->dokumen) ?>" class="btn btn-primary btn-block" type="button" style="padding: 2px 5px;">Download</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="ModalCatatan-<?= $databerkas_masuk->id_berkas ?>" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel ?>" aria-hidden="true">
                    <div class="modal-dialog modal-md">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Catatan File <?= str_replace('/upload/file/', '',$databerkas_masuk->dokumen) ?></h5>
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
                                                <?php if (!empty($databerkas_masuk->catatan)): echo $databerkas_masuk->catatan; else: ?>
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