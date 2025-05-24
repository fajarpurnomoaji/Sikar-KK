<h2>
    <center>Hasil Konsultasi</center>
</h2>
<br>

<div class="biodata" style="margin-left: 25%;margin-right: 25%;">
    <?php if (!empty($hasil1)): // Pastikan $hasil1 selalu ada berkat inisialisasi di controller 
    ?>
        <table width="100%">
            <tr>
                <h3>Biodata Konsultan</h3>
                <td width="30%">Nama </td>
                <td width="2%">:</td>
                <td> <?= htmlspecialchars($hasil1['nama']) ?><br></td>
            </tr>
            <tr>
                <td>Email </td>
                <td>:</td>
                <td> <?= htmlspecialchars($hasil1['email']) ?><br></td>
            </tr>
            <tr>
                <td>Nomor </td>
                <td>:</td>
                <td> <?= htmlspecialchars($hasil1['nomor']) ?><br></td>
            </tr>
            <tr>
                <td>Alamat </td>
                <td>:</td>
                <td> <?= htmlspecialchars($hasil1['alamat']) ?><br></td>
            </tr>
            <tr>
                <td>Tanggal/waktu </td>
                <td>:</td>
                <td> <?= htmlspecialchars($hasil1['tgl_input']) ?><br></td>
            </tr>
            <tr>
                <td>Gejala yang dialami </td>
                <td>:</td>
                <td>
                    <?php if (!empty($gejala_terpilih_nama)): ?>
                        <?php foreach ($gejala_terpilih_nama as $g_nama): ?>
                            <li><?php echo htmlspecialchars($g_nama); ?></li>
                        <?php endforeach; ?>
                    <?php else: ?>
                        Tidak ada gejala yang dipilih.
                    <?php endif; ?>
                </td>
            </tr>
        </table>

        <table width="100%" style="margin-top: 20px;">
            <tr>
                <td colspan="3">
                    <h3>Hasil Analisa</h3>
                </td>
            </tr>
            <tr>
                <td width="30%">Kerusakan</td>
                <td width="2%">:</td>
                <td><strong><?php echo htmlspecialchars($hasil1['kerusakan']); ?></strong></td>
            </tr>
            <tr>
                <td>Deskripsi</td>
                <td>:</td>
                <td> <?php echo htmlspecialchars($hasil1['deskripsi_kerusakan']); ?></td>
            </tr>
            <tr>
                <td>Solusi</td>
                <td>:</td>
                <td> <?php echo htmlspecialchars($hasil1['solusi_kerusakan']); ?></td>
            </tr>
        </table>
    <?php else: ?>
        <p>Terjadi kesalahan dalam memuat data hasil konsultasi.</p>
    <?php endif; ?>

    <br>
    <a href="<?php echo site_url('home/konsultasi_fc'); ?>"><input type="button" class="btn-primary" value="Konsultasi Lagi"></a>
    <input type="button" class="btn-primary" value="Cetak" onclick="window.print()">
</div>