<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Data account</h1>

    <!-- table -->
    <?= $this->session->flashdata('message'); ?>
    <table class="table">
        <thead class="thead text-center">
            <tr class="bg">
                <th style="color: white" scope="col">ID</th>
                <th style="color: white" scope="col">Name</th>
                <th style="color: white" scope="col">Email</th>
                <th style="color: white" scope="col">Address</th>
                <th style="color: white" scope="col">Phone</th>
                <th style="color: white" scope="col">Image</th>
                <th style="color: white" scope="col">Role ID</th>
                <th style="color: white" scope="col">Is_active</th>
                <th style="color: white" scope="col">Edit</th>
                <th style="color: white" scope="col">Delete</th>
            </tr>
        </thead>
        <tbody class="">
            <?php foreach ($account as $ac) { ?>

                <!-- user role and activated -->
                <?php
                if ($ac->role_id == 1) {
                    $role = "Admin";
                } else {
                    $role = "User";
                }

                if ($ac->is_active == 1) {
                    $active = "Actived";
                } else {
                    $active = "Not Actived";
                }
                ?>

                <tr style="background-color: white">
                    <th class="text-center"><?= $ac->id_user; ?></th>
                    <td><?= $ac->nama_user; ?></td>
                    <td><?= $ac->email_user; ?></td>
                    <td><?= $ac->alamat_user; ?></td>
                    <td><?= $ac->no_telp; ?></td>
                    <td><?= $ac->image; ?></td>
                    <td class="text-center"><?= $role; ?></td>
                    <td class="text-center"><?= $active; ?></td>
                    <td class="text-center"><button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit<?= $ac->id_user; ?>">Edit</button></td>
                    <td class="text-center"><button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?= $ac->id_user; ?>">Delete</button></td>
                </tr>

                <!-- Modal Edit -->
                <div class="modal fade" id="edit<?= $ac->id_user; ?>" tabindex="-1" role="dialog" aria-labelledby="Edit" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h2 class="modal-title" id="Edit<?= $ac->id_user; ?>">Edit</h2>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- <form class="obat" method="post" action="<?= base_url('admin/editUser') ?>" enctype="multipart/form-data"> -->
                                <?php echo form_open_multipart('admin/editUser'); ?>
                                <input type="text" class="form-control" id="id_user" name="id_user" placeholder="<?= $ac->id_user; ?>" value="<?= $ac->id_user; ?>" hidden>
                                <input type="text" class="form-control" id="recentImage" name="recentImage" placeholder="<?= $ac->image; ?>" value="<?= $ac->image; ?>" hidden>
                                <div class="form-group">
                                    <label for="nama_user">Name</label>
                                    <input type="text" class="form-control" id="nama_user" name="nama_user" placeholder="<?= $ac->nama_user; ?>" value="<?= $ac->nama_user; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="email_user">Email</label>
                                    <input type="text" class="form-control" id="email_user" name="email_user" placeholder="<?= $ac->email_user; ?>" value="<?= $ac->email_user; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="alamat_user">Address</label>
                                    <input type="text" class="form-control" id="alamat_user" name="alamat_user" placeholder="<?= $ac->alamat_user; ?>" value="<?= $ac->alamat_user; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="no_telp">Phone</label>
                                    <input type="text" class="form-control" id="no_telp" name="no_telp" placeholder="<?= $ac->no_telp; ?>" value="<?= $ac->no_telp; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="image">Image</label><br>
                                    <input type="file" name="userfile" size="20" />
                                </div>
                                <div class="form-group">
                                    <label for="jenis_obat">Role ID</label>
                                    <select class="custom-select" id="role_id" name="role_id" required>
                                        <option value="<?= $ac->role_id; ?>"><?= $role; ?></option>
                                        <option value="1">Admin</option>
                                        <option value="2">User</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="jenis_obat">Is Active</label>
                                    <select class="custom-select" id="is_active" name="is_active" required>
                                        <option value="<?= $ac->is_active; ?>"><?= $active; ?></option>
                                        <option value="0">Not Activated</option>
                                        <option value="1">Actived</option>
                                    </select>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" name="upload" class="btn btn-primary">Save changes</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Modal Delete-->
                <div class="modal fade" id="delete<?= $ac->id_user; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h2 class="modal-title" id="deleteLabel">Delete</h2>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <h4>Are you sure want to delete this user?</h4>
                            </div>
                            <div class="modal-footer">
                                <form method="post" action="<?= base_url('admin/deleteUser') ?>">
                                    <input type="text" class="form-control" id="id_user" name="id_user" placeholder="<?= $ac->id_user; ?>" value="<?= $ac->id_user; ?>" hidden>
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

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->