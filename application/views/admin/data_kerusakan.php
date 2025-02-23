<?= $this->session->flashdata('pesan'); ?>
<div class="card">
    <div class="card-header">
        <a href="<?= base_url('admin/tambah_kerusakan')  ?>" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah </a>
        <a href="<?= base_url('admin/print_dkerusakan')  ?>" class="btn btn-info btn-sm"><i class="fas fa-print"></i> Print </a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr class="text-center">
                    <th width="10">No.</th>
                    <th>"Kode Kerusakan</th>
                    <th>Kerusakan</th>
                    <th>Deskripsi</th>
                    <th>Solusi</th>
                    <th>Action</th>
                </tr>
            </thead>
            <?php $no = 1;
            foreach ($admin as $ssw) :  ?>
                <tbody>
                    <tr class="text-center">
                        <td><?= $no++ ?></td>
                        <td><?= $ssw->kd_kerusakan ?></td>
                        <td><?= $ssw->kerusakan ?></td>
                        <td><?= $ssw->deskripsi ?></td>
                        <td><?= $ssw->solusi ?></td>
                        <td>
                            <button data-toggle="modal" data-target="#edit<?= $ssw->kd_kerusakan ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
                            <a href="<?= base_url('admin/delete_kerusakan/' . $ssw->kd_kerusakan) ?>" class="btn btn-danger btn-sm" onclick="return confirm('apakah anda yakin untuk menghapus data ini?')"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                </tbody>
            <?php endforeach ?>
        </table>
    </div>
</div>

<!-- Modal Edit-->
<?php foreach ($admin as $ssw) : ?>
    <div class="modal fade" id="edit<?= $ssw->kd_kerusakan ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Kerusakan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('admin/edit_kerusakan/' . $ssw->kd_kerusakan) ?>" method="POST">
                        <div class="form-group">
                            <label>Kode Kerusakan</label>
                            <input type="text" name="kd_kerusakan" class="form-control" value="<?= $ssw->kd_kerusakan ?>">
                            <?= form_error('kd_kerusakan', '<div class="text-small text-danger">', '</div>'); ?>
                        </div>
                        <div class="form-group">
                            <label>Nama Kerusakan</label>
                            <input type="text" name="kerusakan" class="form-control" value="<?= $ssw->kerusakan ?>">
                            <?= form_error('kerusakan', '<div class="text-small text-danger">', '</div>'); ?>
                        </div>
                        <div class="form-group">
                            <label>Deskripsi</label>
                            <input type="text" name="deskripsi" class="form-control" value="<?= $ssw->deskripsi ?>">
                            <?= form_error('deskripsi', '<div class="text-small text-danger">', '</div>'); ?>
                        </div>
                        <div class="form-group">
                            <label>Solusi</label>
                            <input type="text" name="solusi" class="form-control" value="<?= $ssw->solusi ?>">
                            <?= form_error('solusi', '<div class="text-small text-danger">', '</div>'); ?>
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