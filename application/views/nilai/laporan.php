<!DOCTYPE html>
<html>

<head>
    <title><?= $title ?></title>
    <style type="text/css">
        table {
            border: 1px solid #e3e3e3;
            border-collapse: collapse;
            font-family: arial;
            color: #5E5B5C;
            margin: 0 auto;
            width: 100%;
        }

        thead th {
            text-align: left;
            padding: 10px;
        }

        tbody td {
            border-top: 1px solid #e3e3e3;
            padding: 10px;
        }

        tbody tr:nth-child(even) {
            background: #F6F5FA;
        }

        tbody tr:hover {
            background: #EAE9F5;
        }
    </style>
</head>

<body>
    <center>
        <h3>Data Nilai</h3>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Dosen</th>
                    <th>Nama Mahasiswa</th>
                    <th>Nama Matakuliah</th>
                    <th>Sks</th>
                    <th>Nilai</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($nilai as $nl) : ?>
                    <tr>
                        <td><?= $no; ?></td>
                        <td><?= $nl->nama_dosen; ?></td>
                        <td><?= $nl->nama; ?></td>
                        <td><?= $nl->matakuliah; ?></td>
                        <td><?= $nl->sks; ?></td>
                        <td><?= $nl->nilai; ?></td>
                    </tr>
                    <?php $no++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </center>
</body>

</html>