<div class="card-body">
    <table border="1px" id="example1" class="table table-bordered table-striped" style="width:100%">
        <thead>
            <tr class="text-center">
                <th width="10">No.</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Nomor</th>
                <th>Gejala</th>
                <th>Kerusakan</th>
                <th>Deskripsi</th>
                <th>Solusi</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <?php $no = 1;
        foreach ($admin as $ssw) :  ?>
            <tbody>
                <tr class="text-center">
                    <td><?= $no++ ?></td>
                    <td><?= $ssw->nama ?></td>
                    <td><?= $ssw->email ?></td>
                    <td><?= $ssw->nomor ?></td>
                    <td><?= $ssw->gejala ?></td>
                    <td><?= $ssw->kerusakan ?></td>
                    <td><?= $ssw->deskripsi_kerusakan ?></td>
                    <td><?= $ssw->solusi_kerusakan ?></td>
                    <td><?= $ssw->tgl_input ?></td>
                </tr>
            </tbody>
        <?php endforeach ?>
    </table>
</div>
</div>
<script type="text/javascript">
    window.print();
</script>