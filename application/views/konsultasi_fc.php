<h2>Metode <?= $title ?></h2>
<br>
<form action="<?php echo site_url('home/hasil_fc'); ?>" method="post">

    <table>
        <tr>
            <td style="width: 60px;">Nama</td>
            <td style="width: 25px;">
                <center>:</center>
            </td>
            <td style="width: 5px; height:50px;"><input type="text" name="nama"></td>
        </tr>
        <tr>
            <td style="width: 5px;">Email</td>
            <td style="width: 25px;">
                <center>:</center>
            </td>
            <td style="width: 5px; height:50px;"><input type="email" name="email"></td>
        </tr>
        <tr>
            <td style="width: 5px;">Nomor</td>
            <td style="width: 25px;">
                <center>:</center>
            </td>
            <td style="width: 5px; height:50px;"><input type="number" name="nomor"></td>
        </tr>
        <tr>
            <td style="width: 5px;">Alamat</td>
            <td style="width: 25px;">
                <center>:</center>
            </td>
            <td style="width: 5px; height:50px;"><input type="text" name="alamat"></td>
        </tr>
    </table><br>
    <table>
        <tr>
            <td>
                <?php foreach ($gejala as $g): ?>
                    <label>
                        <input type="checkbox" name="gejala[]" value="<?php echo $g->kd_gejala; ?>">
                        <?php echo $g->gejala; ?>
                    </label><br>
                <?php endforeach; ?>
            </td>
        </tr>
        <tr>
            <td><button type="submit" class="btn-primary">Konsultasi</button></td>
        </tr>
    </table>
</form>