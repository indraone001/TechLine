<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Data Obat</h1>

    <!-- table -->
    <?= $this->session->flashdata('message'); ?>
    <table class="table">
        <thead class="thead text-center">
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
                    <th class="text-center"><?= $o->id_obat; ?></th>
                    <td><?= $o->nama_obat; ?></td>
                    <td><?= $o->jenis_obat; ?></td>
                    <td><?= $o->tgl_pembuatan; ?></td>
                    <td><?= $o->tgl_kadaluarsa; ?></td>
                    <td><?= $o->Harga; ?></td>
                    <td><?= $o->deskripsi; ?></td>
                    <td class="text-center"><?= $o->kuantitas; ?></td>
                    <td class="text-center"><button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit<?= $o->id_obat; ?>">Edit</button></td>
                    <td class="text-center"><button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?= $o->id_obat; ?>">Delete</button></td>
                </tr>

                <!-- Modal Edit-->
                <div class="modal fade" id="edit<?= $o->id_obat; ?>" tabindex="-1" role="dialog" aria-labelledby="Edit" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h2 class="modal-title" id="Edit<?= $o->id_obat; ?>">Edit</h2>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form class="obat" method="post" action="<?= base_url('admin/edit') ?>">
                                    <input type="text" class="form-control" id="id_obat" name="id_obat" placeholder="<?= $o->id_obat; ?>" value="<?= $o->id_obat; ?>" hidden>
                                    <div class="form-group">
                                        <label for="nama_obat">Name</label>
                                        <input type="text" class="form-control" id="nama_obat" name="nama_obat" placeholder="<?= $o->nama_obat; ?>" value="<?= $o->nama_obat; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="jenis_obat">Type</label>
                                        <select class="custom-select" id="jenis_obat" name="jenis_obat" required>
                                            <option value="<?= $o->jenis_obat; ?>"><?= $o->jenis_obat; ?></option>
                                            <option value="syrup">Syrup</option>
                                            <option value="tablet">Tablet</option>
                                            <option value="capsule">Capsule</option>
                                            <option value="medicine">medicine</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="tgl_pembuatan">Created</label>
                                        <input type="text" class="form-control" id="tgl_pembuatan" name="tgl_pembuatan" placeholder="<?= $o->tgl_pembuatan; ?>" value="<?= $o->tgl_pembuatan; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="tgl_kadaluarsa">Expired</label>
                                        <input type="text" class="form-control" id="tgl_kadaluarsa" name="tgl_kadaluarsa" placeholder="<?= $o->tgl_kadaluarsa ?>" value="<?= $o->tgl_kadaluarsa; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="Harga">Price</label>
                                        <input type="text" class="form-control" id="Harga" name="Harga" placeholder="<?= $o->Harga; ?>" value="<?= $o->Harga; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="deskripsi">Deskription</label>
                                        <input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="<?= $o->deskripsi ?>" value="<?= $o->deskripsi; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="kuantitas">Kuantity</label>
                                        <input type="number" class="form-control" id="kuantitas" name="kuantitas" value="<?= $o->kuantitas ?>" min="0">
                                    </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" name="save" class="btn btn-primary">Save changes</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Modal Delete-->
                <div class="modal fade" id="delete<?= $o->id_obat; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h2 class="modal-title" id="deleteLabel">Delete</h2>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <h4>Are you sure want to delete this item?</h4>
                            </div>
                            <div class="modal-footer">
                                <form method="post" action="<?= base_url('admin/delete') ?>">
                                    <input type="text" class="form-control" id="id_obat" name="id_obat" placeholder="<?= $o->id_obat; ?>" value="<?= $o->id_obat; ?>" hidden>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" name="delete" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            <?php } ?>
        </tbody>
    </table>

    <center>
        <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#insert">Add Item</button>
    </center>

    <!-- Modal Add Item-->
    <div class="modal fade" id="insert" tabindex="-1" role="dialog" aria-labelledby="Edit" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="insert">Add Item</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="obat" method="post" action="<?= base_url('admin/insert') ?>">
                        <div class="form-group">
                            <label for="nama_obat">Name</label>
                            <input type="text" class="form-control" id="nama_obat" name="nama_obat" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="jenis_obat">Type</label>
                            <select class="custom-select" id="jenis_obat" name="jenis_obat" required>
                                <option value="">Open to select type</option>
                                <option value="syrup">Syrup</option>
                                <option value="tablet">Tablet</option>
                                <option value="capsule">Capsule</option>
                                <option value="medicine">medicine</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tgl_pembuatan">Created</label>
                            <input type="date" class="form-control" id="tgl_pembuatan" name="tgl_pembuatan" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="tgl_kadaluarsa">Expired</label>
                            <input type="date" class="form-control" id="tgl_kadaluarsa" name="tgl_kadaluarsa" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="Harga">Price</label>
                            <input type="text" class="form-control" id="Harga" name="Harga" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskription</label>
                            <input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="kuantitas">Kuantity</label>
                            <input type="number" class="form-control" id="kuantitas" name="kuantitas" value="0" min="0">
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="insert" class="btn btn-primary">Add Item</button>
                </div>
                </form>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->