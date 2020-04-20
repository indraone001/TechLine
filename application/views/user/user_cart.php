<?php
$items = 0;
$price = 0;
?>

<main>
    <section>
        <div class="container">
            <?= $this->session->flashdata('message'); ?>
            <h1>Cart</h1>
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-borderless">
                                <?php foreach ($cart as $c) { ?>
                                    <?php
                                    if ($c->status == 0) {
                                        $items += $c->jumlah_obat;
                                        $price += $c->total;
                                    ?>
                                        <tr>
                                            <td>
                                                <div class="row ml-3">
                                                    <div class="col-md-3">
                                                        <img src="<?= base_url('assets/img/item/') . $c->image; ?>" alt="" width="50px">
                                                    </div>
                                                    <div class="col-md-9 col-sm-12 col-12">
                                                        <h3><?= $c->nama_obat ?></h3>
                                                        <p>Rp. <?= $c->total ?></p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <p><b><?= $c->jumlah_obat ?><b /> Items</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <form method="post" action="<?= base_url('user/cartDelete') ?>">
                                                    <input type="text" id="id_transaksi" name="id_transaksi" value="<?= $c->id_transaksi; ?>" hidden>
                                                    <input type="text" id="id_item" name="id_item" value="<?= $c->id_item; ?>" hidden>
                                                    <button class="btn cancel">Cancel</button>
                                                </form>
                                            </td>
                                        </tr>

                                    <?php } ?>
                                <?php } ?>
                                <?php
                                if ($items == 0) {
                                    echo '<center><h1 style="color: gray">No Transaction Data</h1><center>';
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 total">
                    <div class="card">
                        <div class="card-body">
                            <div class="container">
                                <h4>Total Item : <span><?= $items ?></span></h4>
                                <h4>Total Price : <span>Rp. <?= $price ?></span></h4>
                                <form form method="post" action="<?= base_url('user/cartPay') ?>">
                                    <?php if ($items != 0) { ?>
                                        <input type="text" id="id_user" name="id_transaksi" value="<?= $c->id_user; ?>" hidden>
                                    <?php } ?>
                                    <button class="btn pay-item btn-block">Pay Item</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <section id="recently">
        <div class="container">
            <div class="card">
                <div class="card-body m-4">
                    <h2>Recently Transaction</h2>
                    <div class="container">
                        <table class="table table-borderless">
                            <?php foreach ($cart as $c) { ?>
                                <?php
                                if ($c->status == 0) {
                                    $status = '<p >Not yed paid</php>';
                                } else if ($c->status == 1) {
                                    $status = '<p style="color: green" >Already paid</p>';
                                } else {
                                    $status = '<p style="color: orange ">On process</p>';
                                }
                                ?>
                                <tr>
                                    <td>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <img src="<?= base_url('assets/img/item/') . $c->image; ?>" alt="" width="50%">
                                            </div>
                                            <div class="col-md-4">
                                                <h3><?= $c->nama_obat ?></h3>
                                                <p>Rp. <?= $c->total ?></p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p><?= $c->jumlah_obat ?> Items</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="status">
                                            <?= $status; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <form method="post" action="<?= base_url('user/historyDelete') ?>">
                                            <input type="text" id="id_transaksi" name="id_transaksi" value="<?= $c->id_transaksi; ?>" hidden>
                                            <input type="text" id="id_item" name="id_item" value="<?= $c->id_item; ?>" hidden>
                                            <button class="btn delete btn-light"><img src="<?= base_url(); ?>/assets/img/delete.png" alt="" width="20px"></button>
                                        </form>
                                    </td>
                                </tr>

                            <?php } ?>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </section>
</main>