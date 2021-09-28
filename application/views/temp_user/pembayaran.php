<!-- Show Data Layanan -->
<?php 
$produk = $this->db->get('produk')->result();
?>
<!-- Show Data User -->
<?php
$this->db->join('profile', 'profile.id_users = users.id_user');
$this->db->where('id_user', $this->session->userdata('id_user'));
$user = $this->db->get('users')->row();
?>

<section class="contact-clean" style="padding: 50px 0px;">
    <h2 class="text-center">Pembayaran</h2>
    <div class="row">
        <div class="col">
            <?php if ($this->session->flashdata('error')): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= $this->session->flashdata('error'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
            <?php endif ?>
            <form style="max-width: none;" enctype="multipart/form-data" action="<?= base_url('userarea/proses_pembayaran/'.$this->session->userdata('username')) ?>" method="POST">
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input class="form-control" type="text" name="nama_lengkap" placeholder="Rani Rahmawati" value="<?= $user->nama_depan.' '.$user->nama_belakang ?>">
                </div>
                <div class="form-group">
                    <label>Perihal</label>
                    <select class="form-control" name="perihal">
                        <optgroup label="Pilih Jenis Produk yang Dibayar">
                            <?php foreach ($produk as $data_produk): ?>
                                <option value="<?= $data_produk->nama_produk ?>"><?= $data_produk->nama_produk ?></option>
                            <?php endforeach ?>
                        </optgroup>
                    </select>
                </div>
                <div class="form-group">
                    <label>Jumlah Pembayaran</label>
                    <input class="form-control" type="text" name="jumlah_transfer" placeholder="1000000">
                </div>
                <div class="form-group">
                    <label>Upload Bukti Transfer</label>
                    <input class="form-control-file" type="file" name="bukti_transfer" accept="image/gif, image/jpeg, image/png" style="border-radius: 2px;border: 1px solid rgb(210,210,210);box-shadow: 0px 0px 0px 0px;padding: 3px 10px;">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Lakukan Pembayaran</button>
                </div>
            </form>
        </div>
    </div>
</section>
<section class="contact-clean" style="padding: 10px 50px 75px;">
    <h2 class="text-center">Riwayat Pembayaran</h2>
    <div class="container">
        <?php
        if (!empty($pembayaran)) {
            foreach ($pembayaran as $data_bayar) {
                $timestamp = strtotime($data_bayar->date_created);
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
                    <div class="col-md-12">
                        <strong><?= $day.', '.date("d F y", strtotime($data_bayar->date_created)) ?></strong>
                    </div>
                </div>
                <div class="row d-lg-flex" style="background: #ffffff;padding: 10px 0px; margin-bottom: 10px;">
                    <div class="col-8">
                        <p><?= $data_bayar->perihal ?><br></p>
                    </div>
                    <div class="col-4">
                        <div class="row d-flex d-lg-flex align-items-center align-items-lg-center">
                            <div class="col-6">
                                <button href="#" class="btn btn-success btn-block" type="button" data-toggle="modal" data-target="#ModalDetail-<?= $data_bayar->id_pembayaran ?>" style="padding: 2px 5px;">Lihat</button>
                            </div>
                            <div class="col">
                                <a href="<?= base_url($data_bayar->bukti_transfer) ?>" class="btn btn-primary btn-block" target="_blank" download="Bukti Pembayaran-<?= $data_bayar->nama_lengkap.'-'.$data_bayar->perihal.'-'.date('d F y', strtotime($data_bayar->date_created)) ?>" type="button" style="padding: 2px 5px;">Download</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="ModalDetail-<?= $data_bayar->id_pembayaran ?>" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel ?>" aria-hidden="true">
                    <div class="modal-dialog modal-md">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Detail Pembayaran</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <h5>Informasi Pembayaran</h5>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Nama Lengkap</label>
                                            <input type="text" value="<?= $data_bayar->nama_lengkap ?>" disabled class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Perihal</label>
                                            <input type="text" value="<?= $data_bayar->perihal ?>" disabled class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Jumlah Transfer</label>
                                            <input type="text" value="<?= $data_bayar->jumlah_transfer ?>" disabled class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Bukti Pembayaran</label>
                                            <img src="<?= base_url($data_bayar->bukti_transfer) ?>" width="100%">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <button data-dismiss="modal" aria-label="Close" class="btn btn-primary">Tutup</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }

        } else {
            echo "<h3>Mohon Maaf Belum ada Pembayaran</h3>";
        }?>
    </div>
</section>