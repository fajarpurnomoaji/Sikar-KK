<h2>
    <center>Hasil Konsultasi</center>
</h2>
<br>

<div class="biodata" style="margin-left: 25%;margin-right: 25%;">
    <?php if (!empty($hasil)): ?>
        <table width="100%">
            <tr>
                <h3>Biodata Konsultan</h3>
                <td width="30%">Nama </td>
                <td width="2%">:</td>
                <td> <?= $hasil1['nama'] ?><br></td>
            </tr>
            <tr>
                <td>Email </td>
                <td>:</td>
                <td> <?= $hasil1['email'] ?><br></td>
            </tr>
            <tr>
                <td>Nomor </td>
                <td>:</td>
                <td> <?= $hasil1['nomor'] ?><br></td>
            </tr>
            <tr>
                <td>Alamat </td>
                <td>:</td>
                <td> <?= $hasil1['alamat'] ?><br></td>
            </tr>
            <tr>
                <td>Tanggal/waktu </td>
                <td>:</td>
                <td> <?= $hasil1['tgl_input'] ?><br></td>
            </tr>
            <tr><?php ?>
                <td>Gejala yang dialami </td>
                <td>:</td>
                <td>
                    <?php foreach ($gejala2 as $g): ?>
                        <?php if (in_array($g->kd_gejala, $gejala_input)): ?>
                            <li><?php echo $g->gejala; ?></li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </td>
            </tr>
        </table>

        <table width="100%">
            <ul>
                <?php foreach ($hasil as $h): ?>
                    <tr>
                        <td colspan="3">
                            <h3>Hasil Analisa</h3>
                        </td>
                    </tr>
                    <tr>
                        <td width="30%">Kerusakan</td>
                        <td width="2%">:</td>
                        <td><strong><?php echo $h->kerusakan; ?></strong></td>
                    </tr>
                    <tr>
                        <td>Deskripsi</td>
                        <td>:</td>
                        <td> <?php echo $h->deskripsi; ?></td>
                    </tr>
                    <tr>
                        <td>Solusi</td>
                        <td>:</td>
                        <td> <?php echo $h->solusi; ?></td>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>Tidak ada kerusakan yang ditemukan berdasarkan gejala yang dipilih.</p>
        <?php endif; ?>
        </table>
        <br>
        <a href="<?php echo site_url('home/konsultasi_fc'); ?>"><input type="button" class="btn-primary" value="Konsultasi Lagi"></a>
        <input type="button" class="btn-primary" value="Cetak" onclick="window.print()">
</div>