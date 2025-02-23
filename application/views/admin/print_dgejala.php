<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Data Gejala</title>
</head>

<body>

    <table border="1px, solid" style="width:100%">
        <tr bgcolor="silver">
            <th>No.</th>
            <th>Kode Gejala</th>
            <th>Gejala</th>
        </tr>
        <?php $no = 1;
        foreach ($admin as $ssw) : ?>
            <tr>
                <th><?= $no++ ?></th>
                <th><?= $ssw->kd_gejala ?></th>
                <th><?= $ssw->gejala ?></th>
            </tr>
        <?php endforeach ?>
    </table>

    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>