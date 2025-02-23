<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Data Kerusakan</title>
</head>

<body>

    <table border="1px, solid" style="width:100%">
        <tr bgcolor="silver">
            <th>No.</th>
            <th>Kode Kerusakan</th>
            <th>Kerusakan</th>
            <th>Deskripsi</th>
            <th>Solusi</th>
        </tr>
        <?php $no = 1;
        foreach ($admin as $ssw) : ?>
            <tr>
                <th><?= $no++ ?></th>
                <th><?= $ssw->kd_kerusakan ?></th>
                <th><?= $ssw->kerusakan ?></th>
                <th><?= $ssw->deskripsi ?></th>
                <th><?= $ssw->solusi ?></th>
            </tr>
        <?php endforeach ?>
    </table>

    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>