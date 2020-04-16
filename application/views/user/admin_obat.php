<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Data Obat</h1>

    <!-- table -->
    <table class="table">
        <thead class="thead">
            <tr class="bg-danger">
                <th style="color: white" scope="col">ID</th>
                <th style="color: white" scope="col">Name</th>
                <th style="color: white" scope="col">Type</th>
                <th style="color: white" scope="col">Created</th>
                <th style="color: white" scope="col">Expired</th>
                <th style="color: white" scope="col">Price</th>
                <th style="color: white" scope="col">Deskription</th>
                <th style="color: white" scope="col">Kuantity</th>
                <th style="color: white" scope="col">Edit</th>
                <th style="color: white" scope="col">Delete</th>
            </tr>
        </thead>
        <tbody class="">
            <?php foreach ($obat as $o) { ?>

                <tr style="background-color: white">
                    <th><?= $o->id_obat; ?></th>
                    <td><?= $o->nama_obat; ?></td>
                    <td><?= $o->jenis_obat; ?></td>
                    <td><?= $o->tgl_pembuatan; ?></td>
                    <td><?= $o->tgl_kadaluarsa; ?></td>
                    <td><?= $o->Harga; ?></td>
                    <td><?= $o->deskripsi; ?></td>
                    <td><?= $o->kuantitas; ?></td>
                    <td><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit">Edit</button></td>
                    <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete">Delete</button></td>
                </tr>

                <!-- Modal Edit-->
                <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="Edit" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h2 class="modal-title" id="Edit">Edit</h2>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Name</label>
                                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="<?= $o->nama_obat; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="formGroupExampleInput2">Type</label>
                                        <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="<?= $o->jenis_obat; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="formGroupExampleInput2">Created</label>
                                        <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="<?= $o->tgl_pembuatan; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="formGroupExampleInput2">Expired</label>
                                        <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="<?= $o->tgl_kadaluarsa ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="formGroupExampleInput2">Price</label>
                                        <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="<?= $o->Harga; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="formGroupExampleInput2">Deskription</label>
                                        <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="<?= $o->deskripsi ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="formGroupExampleInput2">Kuantity</label>
                                        <input type="number" class="form-control" id="formGroupExampleInput2" value="<?= $o->kuantitas ?>" min="0">
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Delete-->
                <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="deleteLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h2 class="modal-title" id="deleteLabel">Delete</h2>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <h4>Are you sure?</h4>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-danger">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>

            <?php } ?>
        </tbody>
    </table>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->