<h2>
    <center>Hasil Konsultasi</center>
</h2>
<br>
<div class="biodata" style="margin-left: 25%;margin-right: 25%;">
    <table style="border-collapse: collapse; width:100%;">
        <th colspan="3" style="text-align:left;">
            <h3>Biodata Konsultasi</h3>
            <tr>
                <td style="width: 25%;">Nama</td>
                <td style="width: 2%;">:</td>
                <td><?= $hasil2['nama'] ?></td>
            </tr>
            <tr>
                <td>Email</td>
                <td>:</td>
                <td><?= $hasil2['email'] ?></td>
            </tr>
            <tr>
                <td>Nomer</td>
                <td>:</td>
                <td><?= $hasil2['nomor'] ?></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td><?= $hasil2['alamat'] ?></td>
            </tr>
        </th>
    </table>
    <br>
    <table style="border-collapse: collapse; width:100%;">
        <th>
            <h3>Gejala yang dipilih</h3>
            <tr>
                <td style="width: 100%;"><?= $hasil2['gejala'] ?></td>
            </tr>
        </th>
    </table>
    <br>
    <table style="border-collapse: collapse; width:100%;">
        <th colspan="3">
            <h3>Hasil Analisa</h3>
            <tr>
                <td style="width: 25%;">Kerusakan</td>
                <td style="width: 2%;">:</td>
                <td><strong><?php echo $kerusakan->kerusakan; ?></strong></td>
            </tr>
            <tr>
                <td>Deskripsi</td>
                <td>:</td>
                <td><?php echo $kerusakan->deskripsi; ?></td>
            </tr>
            <tr>
                <td>Solusi</td>
                <td>:</td>
                <td><?php echo $kerusakan->solusi; ?></td>
            </tr>
            <tr>
                <td>Persentase Kerusakan</td>
                <td>:</td>
                <td><strong><?php echo number_format($persentase, 2); ?>%</strong></td>
            </tr>
        </th>
    </table>
    <br>

    <a href="<?php echo site_url('home/konsultasi_bc'); ?>"><input type="button" class="btn-primary" value="Konsultasi Lagi"></a>
    <input type="button" class="btn-primary" value="Cetak" onclick="window.print()">
</div>