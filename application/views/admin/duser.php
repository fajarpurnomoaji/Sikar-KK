<?= $this->session->flashdata('pesan'); ?>
<div class="card">
    <div class="card-header">
        <a href="<?= base_url('admin/tambah')  ?>" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah </a>
        <a href="<?= base_url('admin/print')  ?>" class="btn btn-info btn-sm"><i class="fas fa-print"></i> Print </a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr class="text-center">
                    <th width="10">No.</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Email</th>
                    <th>Nomor</th>
                    <th>Role</th>
                    <th>Foto</th>
                    <th>Action</th>
                </tr>
            </thead>
            <?php $no = 1;
            foreach ($admin as $ssw) :  ?>
                <tbody>
                    <tr class="text-center">
                        <td><?= $no++ ?></td>
                        <td><?= $ssw->nama ?></td>
                        <td><?= $ssw->alamat ?></td>
                        <td><?= $ssw->email ?></td>
                        <td><?= $ssw->nomor_hp ?></td>
                        <td><?= $ssw->id_role ?></td>
                        <td><?= $ssw->foto ?></td>
                        <td>
                            <button data-toggle="modal" data-target="#edit<?= $ssw->id ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
                            <a href="<?= base_url('admin/delete/' . $ssw->id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('apakah anda yakin untuk menghapus data ini?')"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                </tbody>
            <?php endforeach ?>
        </table>
    </div>
</div>

<!-- Modal Edit-->
<?php foreach ($admin as $ssw) : ?>
    <div class="modal fade" id="edit<?= $ssw->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Admin</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('admin/edit/' . $ssw->id) ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="nama" class="form-control" value="<?= $ssw->nama ?>">
                            <?= form_error('nama', '<div class="text-small text-danger">', '</div>'); ?>
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" name="alamat" class="form-control" value="<?= $ssw->alamat ?>">
                            <?= form_error('alamat', '<div class="text-small text-danger">', '</div>'); ?>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control" value="<?= $ssw->email ?>">
                            <?= form_error('email', '<div class="text-small text-danger">', '</div>'); ?>
                        </div>
                        <div class="form-group">
                            <label>Nomor</label>
                            <input type="text" name="nomor_hp" class="form-control" value="<?= $ssw->nomor_hp ?>">
                            <?= form_error('nomor', '<div class="text-small text-danger">', '</div>'); ?>
                        </div>
                        <div class="form-group">
                            <label>Role</label>
                            <input type="number" name="id_role" class="form-control" value="<?= $ssw->id_role ?>">
                            <?= form_error('id_role', '<div class="text-small text-danger">', '</div>'); ?>
                        </div>
                        <div class="form-group">
                            <label>Foto</label>
                            <input type="file" name="foto" class="form-control" value="<?= $ssw->foto ?>">
                            <?= form_error('foto', '<div class="text-small text-danger">', '</div>'); ?>
                        </div>

                        <div class="modal-footer">
                            <button type="reset" class="btn btn-danger"><i class="fas fa-trash"></i> reset</button>
                            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>