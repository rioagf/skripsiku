<section class="d-lg-flex align-items-lg-center features-boxed" style="height: 650px;">
    <div class="container">
        <div class="intro" style="max-width: none;">
            <h2 class="text-center">Karir</h2>
            <p class="text-center">Kami membuka peluang dan kesempatan bagi tenaga yang berkompeten dan berkualifikasi untuk bergabung bersama kami dalam rangka peningkatan dan perluasan pelayanan kami.</p>
        </div>
        <div class="row justify-content-center features">
            <div class="col-10 item">
                <div role="tablist" id="accordion-1">
                    <?php $no=0; ?>
                    <?php foreach ($karir as $data) { ?>
                        <?php $no++ ?>
                        <div class="card">
                            <div class="card-header" role="tab">
                                <h5 class="text-left mb-0">
                                    <a data-toggle="collapse" aria-expanded="false" aria-controls="accordion-1 .item-<?= $no ?>" href="#accordion-1 .item-<?= $no ?>" style="color: rgb(0,0,0);"><?= $data->judul_karir; ?></a>
                                </h5>
                            </div>
                            <div class="collapse item-<?= $no ?>" role="tabpanel" data-parent="#accordion-1">
                                <div class="card-body">
                                    <p class="card-text"><?= $data->deskripsi_karir; ?></p>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- <div class="card">
    <div class="card-header" role="tab">
        <h5 class="text-left mb-0">
            <a data-toggle="collapse" aria-expanded="false" aria-controls="accordion-1 .item-0" href="#accordion-1 .item-1" style="color: rgb(0,0,0);">Pengolahan Data</a>
        </h5>
    </div>
    <div class="collapse item-2" role="tabpanel" data-parent="#accordion-1">
        <div class="card-body">
            <p class="card-text">Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus.</p>
        </div>
    </div>
</div> -->