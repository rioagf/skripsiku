<section class="d-lg-flex align-items-lg-center features-boxed" style="min-height: 650px;">
    <div class="container">
        <div class="intro" style="max-width: none; margin-bottom: 20px;">
            <h2 class="text-center">Penilaian Pelanggan</h2>
            <p class="text-center">Berikut adalah penilaian yang diberikan oleh pelanggan kami.</p>
        </div>
        <div class="row">
            <?php $no=0; ?>
            <?php foreach ($rating as $data) { ?>
                <div class="col-12 col-md-3" style="margin: 10px 0">
                    <div class="card">
                        <div class="card-header"><?= $data->nama_produk; ?></div>
                        <div class="card-body">
                            <div id="tutorial-<?php echo $data->id_produk; ?>">
                                Penilaian :
                                <table class="demo-table">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <input type="hidden" name="rating" id="rating" value="<?php echo $data->id_produk; ?>" />
                                                <ul onMouseOut="resetRating(<?php echo $data->id_produk; ?>);">
                                                    <?php
                                                    for($i=0;$i<=4;$i++) {
                                                        $selected = "";
                                                        if(!empty($data->rating) && $i<=$data->rating) {
                                                            $selected = "selected";
                                                        }
                                                        ?>
                                                        <li class=<?= $selected ?>>&#9733;</li>  
                                                    <?php }  ?>
                                                </ul>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>