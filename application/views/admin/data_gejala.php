<?= $this->session->flashdata('pesan'); ?>
<div class="card">
    <div class="card-header">
        <a href="<?= base_url('admin/tambah_gejala')  ?>" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah </a>
        <a href="<?= base_url('admin/print_dgejala')  ?>" class="btn btn-info btn-sm"><i class="fas fa-print"></i> Print </a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr class="text-center">
                    <th width="10">No.</th>
                    <th>Kode Gejala</th>
                    <th>Gejala</th>
                    <th>Action</th>
                </tr>
            </thead>
            <?php $no = 1;
            foreach ($admin as $ssw) :  ?>
                <tbody>
                    <tr class="text-center">
                        <td><?= $no++ ?></td>
                        <td><?= $ssw->kd_gejala ?></td>
                        <td><?= $ssw->gejala ?></td>
                        <td>
                            <button data-toggle="modal" data-target="#edit<?= $ssw->kd_gejala ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
                            <a href="<?= base_url('admin/delete_gejala/' . $ssw->kd_gejala) ?>" class="btn btn-danger btn-sm" onclick="return confirm('apakah anda yakin untuk menghapus data ini?')"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                </tbody>
            <?php endforeach ?>
        </table>
    </div>
</div>

<!-- Modal Edit-->
<?php foreach ($admin as $ssw) : ?>
    <div class="modal fade" id="edit<?= $ssw->kd_gejala ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Gejala</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('admin/edit_gejala/' . $ssw->kd_gejala) ?>" method="POST">
                        <div class="form-group">
                            <label>Kode gejala</label>
                            <input type="text" name="kd_gejala" class="form-control" value="<?= $ssw->kd_gejala ?>">
                            <?= form_error('kd_gejala', '<div class="text-small text-danger">', '</div>'); ?>
                        </div>
                        <div class="form-group">
                            <label>Nama Gejala</label>
                            <input type="text" name="gejala" class="form-control" value="<?= $ssw->gejala ?>">
                            <?= form_error('gejala', '<div class="text-small text-danger">', '</div>'); ?>
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