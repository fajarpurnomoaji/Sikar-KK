<form action="<?= base_url('admin/tambah_aksi2') ?>" method="POST">
    <div class="form-group">
        <label>Kode Kerusakan</label>
        <input type="text" name="kd_kerusakan" class="form-control">
        <?= form_error('kd_kerusakan', '<div class="text-small text-danger">', '</div>'); ?>
    </div>
    <div class="form-group">
        <label>Kerusakan</label>
        <input type="text" name="kerusakan" class="form-control">
        <?= form_error('kerusakan', '<div class="text-small text-danger">', '</div>'); ?>
    </div>
    <div class="form-group">
        <label>Deskripsi</label>
        <textarea type="text-field" name="deskripsi" class="form-control"></textarea>
        <?= form_error('deskripsi', '<div class="text-small text-danger">', '</div>'); ?>
    </div>
    <div class="form-group">
        <label>Solusi</label>
        <textarea type="text" name="solusi" class="form-control"></textarea>
        <?= form_error('solusi', '<div class="text-small text-danger">', '</div>'); ?>
    </div>
    <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
    <button type="reset" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Reset</button>
</form>