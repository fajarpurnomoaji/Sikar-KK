<?= $this->session->flashdata('pesan'); ?>
<div class="card">
    <div class="card-header">
        <!-- <a href="<?= base_url('admin/tambah_bkasus')  ?>" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah </a> -->
        <a href="<?= base_url('admin/print_bkasus')  ?>" class="btn btn-info btn-sm"><i class="fas fa-print"></i> Print </a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr class="text-center">
                    <th width="10">No.</th>
                    <th width="150">Kode Basis Kasus</th>
                    <th>Nama Kerusakan</th>
                    <th>Gejala</th>
                    <th>Action</th>
                </tr>
            </thead>
            <?php $no = 1;
            foreach ($kasus_details as $detail) :  ?>
                <tbody>
                    <tr class="text-center">
                        <td><?= $no++ ?></td>
                        <td><?php echo $detail->kd_bkasus; ?></td>
                        <td><?php echo $detail->kd_kerusakan; ?></td>
                        <td><?php echo $detail->gejala; ?></td>
                        <td>
                            <button data-toggle="modal" data-target="" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
                            <a href="" class="btn btn-danger btn-sm" onclick="return confirm('apakah anda yakin untuk menghapus data ini?')"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                </tbody>
            <?php endforeach ?>
        </table>
    </div>
</div>

<!-- Modal Edit-->
<?php foreach ($admin as $ssw) : ?>
    <div class="modal fade" id="edit<?= $ssw->kd_bkasus ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Basis Kasus</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('admin/edit_bkasus/' . $ssw->kd_bkasus) ?>" method="POST">
                        <div class="form-group">
                            <label>Kode Basis Kasus</label>
                            <input type="text" name="kd_bkasus" class="form-control" value="<?= $ssw->kd_gejala ?>">
                            <?= form_error('kd_bkasus', '<div class="text-small text-danger">', '</div>'); ?>
                        </div>
                        <div class="form-group">
                            <label>Nama Kerusakan</label>
                            <input type="text" name="kd_kerusakan" class="form-control" value="<?= $ssw->kd_kerusakan ?>">
                            <?= form_error('kd_kerusakan', '<div class="text-small text-danger">', '</div>'); ?>
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