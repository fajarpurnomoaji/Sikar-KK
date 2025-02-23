<form action="<?= base_url('admin/tambah_aksi3') ?>" method="POST">
    <div class="form-group">
        <label>Kode Gejala</label>
        <input type="text" name="kd_gejala" class="form-control">
        <?= form_error('kd_gejala', '<div class="text-small text-danger">', '</div>'); ?>
    </div>
    <div class="form-group">
        <label>Nama Gejala</label>
        <input type="text" name="gejala" class="form-control">
        <?= form_error('gejala', '<div class="text-small text-danger">', '</div>'); ?>
    </div>
    <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
    <button type="reset" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> reset</button>
</form>