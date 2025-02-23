<h2>Metode <?= $title ?></h2>
<br>
<form action="<?php echo site_url('home/pertanyaan_bc'); ?>" method="post">

    <table>
        <tr>
            <td style="width: 60px; height: 40px;">Nama</td>
            <td style="width: 20px;">:</td>
            <td><input type="text" name="nama"></td>
        </tr>
        <tr>
            <td style="width: 60px; height: 40px;">Email</td>
            <td>:</td>
            <td><input type="email" name="email"></td>
        </tr>
        <tr>
            <td style="width: 60px; height: 40px;">Nomor</td>
            <td>:</td>
            <td><input type="number" name="nomor"></td>
        </tr>
        <tr>
            <td style="width: 60px; height: 40px;">Alamat</td>
            <td>:</td>
            <td><input type="text" name="alamat"></td>
        </tr>
    </table>
    <br>
    <table>
        <tr>
            <td><label>Pilih Kerusakan:</label></td>
            <td>
                <select name="kd_kerusakan" required>
                    <?php foreach ($kerusakan as $k): ?>
                        <option value="<?php echo $k->kd_kerusakan; ?>"><?php echo $k->kerusakan; ?></option>
                    <?php endforeach; ?>
                </select>
            </td>
        </tr>
        <br>
        <tr>
            <td><button type="submit">Konsultasi</button></td>
        </tr>
    </table>
</form>