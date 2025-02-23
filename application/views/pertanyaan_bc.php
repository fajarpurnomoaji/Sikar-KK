<h2>Kerusakan yang Dipilih: <?php echo $kerusakan->kerusakan; ?></h2>
<form action="<?php echo site_url('home/hasil_bc'); ?>" method="post">
    <input type="hidden" name="kd_kerusakan" value="<?php echo $kerusakan->kd_kerusakan; ?>">
    <input type="hidden" name="nama" value="<?php echo $this->input->post('nama'); ?>">
    <input type="hidden" name="email" value="<?php echo $this->input->post('email'); ?>">
    <input type="hidden" name="nomor" value="<?php echo $this->input->post('nomor'); ?>">
    <input type="hidden" name="alamat" value="<?php echo $this->input->post('alamat'); ?>">
    <?php foreach ($gejala as $g): ?>
        <p><?php echo $g->pertanyaan; ?></p>
        <label>
            <input type="radio" name="jawaban[<?php echo $g->kd_gejala; ?>]" value="ya" required> Ya
        </label>
        <label>
            <input type="radio" name="jawaban[<?php echo $g->kd_gejala; ?>]" value="tidak" required> Tidak
        </label>
    <?php endforeach; ?>
    <br>
    <br>
    <button type="submit">Submit</button>
</form>