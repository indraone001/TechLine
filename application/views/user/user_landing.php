<main>
    <div class="container mt-5">
        <?= $this->session->flashdata('message'); ?>

        <h2><?= $category; ?></h2>
        <div class="row mt-5">

            <?php foreach ($obat as $o) { ?>

                <!-- item -->
                <div class="col-6 col-sm-6 col-md-4 col-lg-3 m-auto">
                    <div class="card">
                        <a href="" data-toggle="modal" data-target=".bd-obat1-modal-lg-<?= $o->id_obat; ?>">
                            <img class="card-img-top" src="<?= base_url('assets/img/item/') . $o->image; ?>" alt="Card image cap">
                            <div class="card-body">
                                <h4 class="card-title"><?= $o->nama_obat; ?></h4>
                                <p class="card-text">Rp. <?= $o->Harga; ?></p>
                            </div>
                        </a>

                        <!-- modal -->
                        <div class="modal fade bd-obat1-modal-lg-<?= $o->id_obat; ?>" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <form method="post" action="<?= base_url('user/order') ?>">
                                        <div class="modal-header">
                                            <h3 class="modal-title" id="exampleModalLabel">Details</h3>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <img src="<?= base_url('assets/img/item/') . $o->image; ?>" alt="">
                                                    </div>
                                                    <div class="col-md-7">
                                                        <h1><?= $o->nama_obat; ?></h1>
                                                        <p><span>Categories :</span> <?= $o->jenis_obat; ?></p>
                                                        <p><span>Price :</span> <?= $o->Harga; ?></p>
                                                        <p><span>Description :</span> <?= $o->deskripsi; ?></p>
                                                        <input type="number" name="kuantity" value="1" min="1">
                                                        <input type="text" name="id_obat" value="<?= $o->id_obat; ?>" hidden>
                                                        <input type="text" name="harga" value="<?= $o->Harga; ?>" hidden>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button class="btn add-chart">Add to Chart</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <?php } ?>

        </div>
    </div>
</main>