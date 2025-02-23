<?php echo form_open_multipart('admin/tambah_aksi'); ?>
<div class="form-group">
    <label>Nama Admin</label>
    <input type="text" name="nama" class="form-control">
    <?= form_error('nama', '<div class="text-small text-danger">', '</div>'); ?>
</div>
<div class="form-group">
    <label>Username</label>
    <input type="text" name="username" class="form-control">
    <?= form_error('username', '<div class="text-small text-danger">', '</div>'); ?>
</div>
<div class="form-group">
    <label>Password</label>
    <input type="password" name="password" class="form-control">
    <?= form_error('password', '<div class="text-small text-danger">', '</div>'); ?>
</div>
<div class="form-group">
    <label>Alamat</label>
    <input type="text" name="alamat" class="form-control">
    <?= form_error('alamat', '<div class="text-small text-danger">', '</div>'); ?>
</div>
<div class="form-group">
    <label>Email</label>
    <input type="text" name="email" class="form-control">
    <?= form_error('email', '<div class="text-small text-danger">', '</div>'); ?>
</div>
<div class="form-group">
    <label>Nomor</label>
    <input type="number" name="nomor_hp" class="form-control">
    <?= form_error('nomor_hp', '<div class="text-small text-danger">', '</div>'); ?>
</div>
<div class="form-group">
    <label>Role</label>
    <input type="number" name="id_role" class="form-control">
    <?= form_error('id_role', '<div class="text-small text-danger">', '</div>'); ?>
</div>
<div class="form-group">
    <label>Upload Foto</label>
    <input type="file" name="foto" class="form-control">
    <?= form_error('foto', '<div class="text-small text-danger">', '</div>'); ?>
</div>
<button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
<button type="reset" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> reset</button>
<?php echo form_close(); ?>