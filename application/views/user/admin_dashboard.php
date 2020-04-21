<?php
$total = 0;
$request = 0;
foreach ($success as $tr) {
    $total += $tr->total;
}
foreach ($transaksi as $tr) {
    $request++;
}
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Earnings </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. <?= $total; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-money fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pending Requests</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $request; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Transaction success</h1>

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
            </tr>
        </thead>
        <tbody class="">
            <?php foreach ($success as $tr) { ?>

                <tr style="background-color: white">
                    <th class="text-center"><?= $tr->id_transaksi; ?></th>
                    <td><?= $tr->nama_obat; ?></td>
                    <td class="text-center"><?= $tr->jumlah_obat; ?></td>
                    <td><?= $tr->nama_user; ?></td>
                    <td class="text-center"><?= $tr->tanggal; ?></td>
                    <td class="text-center"><?= $tr->total; ?></td>
                    <td class="text-center"><button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#edit<?= $tr->id_transaksi; ?>">View Image</button></td>
                    <td class="text-center">
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