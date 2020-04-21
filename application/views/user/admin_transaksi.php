<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Data Transaksi</h1>

    <!-- table -->
    <?= $this->session->flashdata('message'); ?>
    <table class="table">
        <thead class="thead text-center">
            <tr class="bg-danger">
                <th style="color: white" scope="col">ID</th>
                <th style="color: white" scope="col">Item</th>
                <th style="color: white" scope="col">Kuantity</th>
                <th style="color: white" scope="col">Name</th>
                <th style="color: white" scope="col">Oreder Date</th>
                <th style="color: white" scope="col">Total</th>
                <th style="color: white" scope="col">Bukti pembayaran</th>
                <th style="color: white" scope="col">Action</th>
            </tr>
        </thead>
        <tbody class="">
            <?php foreach ($transaksi as $tr) { ?>

                <tr style="background-color: white">
                    <th class="text-center"><?= $tr->id_transaksi; ?></th>
                    <td><?= $tr->nama_obat; ?></td>
                    <td class="text-center"><?= $tr->jumlah_obat; ?></td>
                    <td><?= $tr->nama_user; ?></td>
                    <td class="text-center"><?= $tr->tanggal; ?></td>
                    <td class="text-center"><?= $tr->total; ?></td>
                    <td class="text-center"><button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#edit<?= $tr->id_transaksi; ?>">View Image</button></td>
                    <td class="text-center">
                        <form method="post" action="<?= base_url('admin/proccess_transaksi') ?>">
                            <input type="text" id="id_transaksi" name="id_transaksi" value="<?= $tr->id_transaksi; ?>" hidden>
                            <input type="text" id="id_obat" name="id_obat" value="<?= $tr->id_obat; ?>" hidden>
                            <input type="text" id="jumlah" name="jumlah" value="<?= $tr->jumlah_obat; ?>" hidden>
                            <button type="submit" class="btn btn-primary btn-sm" <?= $tr->id_obat; ?>">Proccess</button>
                        </form>
                    </td>
                </tr>

                <!-- Modal View Image-->
                <div class="modal fade" id="edit<?= $tr->id_transaksi; ?>" tabindex="-1" role="dialog" aria-labelledby="Edit" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <!-- <div class="modal-content"> -->
                        <img src="<?= base_url('assets/img/transfer/') . $tr->bukti_pembayaran; ?>" alt="">
                        <br><br>
                        <center>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" hidden>Close</button>
                        </center>
                        <!-- </div> -->
                    </div>
                </div>

            <?php } ?>
        </tbody>
    </table>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->