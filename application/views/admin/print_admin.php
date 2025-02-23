<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="<?= base_url('assets/template') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <title>Print Admin</title>
</head>

<body>

    <table border="1" width="100%">
        <thead class="thead-dark">
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Username</th>
                <th style="width:30%">Alamat</th>
                <th>Email</th>
                <th>Nomor</th>
                <th>Foto</th>
            </tr>
            <?php $no = 1;
            foreach ($admin as $ssw) : ?>
                <tr>
                    <th><?= $no++ ?></th>
                    <th><?= $ssw->nama ?></th>
                    <th><?= $ssw->username ?></th>
                    <th><?= $ssw->alamat ?></th>
                    <th><?= $ssw->email ?></th>
                    <th><?= $ssw->nomor_hp ?></th>
                    <th><?= $ssw->foto ?></th>
                </tr>
            <?php endforeach ?>
    </table>

    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>