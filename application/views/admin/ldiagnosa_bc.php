<?= $this->session->flashdata('pesan'); ?>
<div class="card">
    <div class="card-header">
        <a href="<?= base_url('admin/print_ldiagnosa_bc')  ?>" class="btn btn-info btn-sm"><i class="fas fa-print"></i> Print </a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr class="text-center">
                    <th width="10">No.</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Gejala</th>
                    <th>Kerusakan</th>
                    <th>Tgl_input</th>
                    <th>Action</th>
                </tr>
            </thead>
            <?php $no = 1;
            foreach ($admin as $ssw) :  ?>
                <tbody>
                    <tr class="text-center">
                        <td><?= $no++ ?></td>
                        <td><?= $ssw->nama ?></td>
                        <td><?= $ssw->email ?></td>
                        <td><?= $ssw->gejala ?></td>
                        <td><?= $ssw->kerusakan ?></td>
                        <td><?= $ssw->tgl_input ?></td>
                        <td>
                            <a href="<?= base_url('admin/delete_ldiagnosa_bc/' . $ssw->id_hasil) ?>" class="btn btn-danger btn-sm" onclick="return confirm('apakah anda yakin untuk menghapus data ini?')"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                </tbody>
            <?php endforeach ?>
        </table>
    </div>
</div>