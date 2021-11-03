<section class="d-lg-flex justify-content-lg-center contact-clean" style="padding: 50px 0px;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="text-center">Layanan yang Anda Pesan</h2>
            </div>
            <?php foreach ($layanan as $data) { ?>
                <div class="col-12 col-md-4" style="margin-bottom: 20px;">
                    <div class="card">
                        <div class="card-header">
                            <span style="font-weight: 600; font-size: 12pt;"><?= $data->nama_produk; ?></span>
                        </div>
                        <div class="card-body">
                            <?php
                            $this->db->where('id_user', $this->session->userdata('id_user'));
                            $rating = $this->db->get('produk_rating');
                            $ratings = $rating->row();
                            ?>
                            Nilai Pesanan Ini:<br>
                            <form action="<?= base_url('userarea/beri_penilaian/'.$data->id_produk) ?>" method="post" class="shadow-none">
                                <div class="row">
                                    <div class="col-2">
                                        <input type="radio" id="satu" name="nilai_<?= $data->id_produk; ?>" value="1" <?php if ($rating->num_rows() > 0 && $data->produk_id == $data->id_produk_rating && $data->rating == 1) { echo "checked"; } ?>>
                                        <label for="satu">&#9733; 1</label>
                                    </div>
                                    <div class="col-2">
                                        <input type="radio" id="dua" name="nilai_<?= $data->id_produk; ?>" value="2" <?php if ($rating->num_rows() > 0 && $data->produk_id == $data->id_produk_rating && $data->rating == 2) { echo "checked"; } ?>>
                                        <label for="dua">&#9733; 2</label>
                                    </div>
                                    <div class="col-2">
                                        <input type="radio" id="tiga" name="nilai_<?= $data->id_produk; ?>" value="3" <?php if ($rating->num_rows() > 0 && $data->produk_id == $data->id_produk_rating && $data->rating == 3) { echo "checked"; } ?>>
                                        <label for="tiga">&#9733; 3</label>
                                    </div>
                                    <div class="col-2">
                                        <input type="radio" id="empat" name="nilai_<?= $data->id_produk; ?>" value="4" <?php if ($rating->num_rows() > 0 && $data->produk_id == $data->id_produk_rating && $data->rating == 4) { echo "checked"; } ?>>
                                        <label for="empat">&#9733; 4</label>
                                    </div>
                                    <div class="col-2">
                                        <input type="radio" id="lima" name="nilai_<?= $data->id_produk; ?>" value="5" <?php if ($rating->num_rows() > 0 && $data->produk_id == $data->id_produk_rating && $data->rating == 5) { echo "checked"; } ?>>
                                        <label for="lima">&#9733; 5</label>
                                    </div>
                                </div>
                                <?php if ($rating->num_rows() > 0 && $data->produk_id == $data->id_produk_rating): ?>
                                    <button type="button" class="btn btn-sm btn-primary" disabled>Sudah Dinilai</button>
                                    <?php else: ?>

                                        <button type="submit" class="btn btn-sm btn-primary">Sumbit</button>
                                    <?php endif ?>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>