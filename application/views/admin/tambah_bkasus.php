<form action="<?= base_url('admin/tambah_aksi4') ?>" method="POST">
    <div class="form-group">
        <label> Kode Basis Pengetahuan</label>
        <input type="text" name="kd_bkasus" class="form-control">
        <?= form_error('kd_bkasus', '<div class="text-small text-danger">', '</div>'); ?>
    </div>
    <!-- Pilih Kerusakan -->
    <div class="form-group">
        <label>Nama Kerusakan</label>
        <div class="input-group mb-3">
            <select name="kerusakan" class="custom-select" id="inputGroupSelect01">
                <option selected value="">-- pilih kerusakan --</option>
                <?php foreach ($kerusakan as $ssw) : ?>
                    <option value="<?= $ssw->kd_kerusakan ?>" name=""><?= $ssw->kerusakan ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <?= form_error('kerusakan', '<div class="text-small text-danger">', '</div>'); ?>
    </div>
    <!-- Tabel Gejala -->
    <label>Pilih Gejala-gejala berikut :</label>
    <div class="card">
        <div class="form-group">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr class="text-center">
                        <th width="50px"></th>
                        <th width="50px">No.</th>
                        <th>Nama gejala</th>
                    </tr>
                </thead>
                <?php $no = 1;
                $i = 0;
                foreach ($gejala as $ssw) :  ?>
                    <tbody>
                        <tr class="text-center">
                            <td><input type="checkbox" class="check-item" name="opt[]" value="<?= $ssw->kd_gejala ?>"></td>
                            <td><?= $no++ ?></td>
                            <td class="text-left" value="<?= $ssw->kd_gejala ?>"><?= $ssw->gejala ?></td>
                            <td><?= $ssw->kd_gejala ?></td>
                        </tr>
                    </tbody>
                <?php endforeach ?>
            </table>
        </div>
    </div>


    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
    <button type="reset" class="btn btn-danger"><i class="fas fa-trash"></i> reset</button>

</form>