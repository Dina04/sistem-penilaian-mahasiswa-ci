<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!--style css -->
    <style>
        .badge {
            margin-left: 3px;
        }
    </style>

    <!--<title>Hello, world!</title> -->
    <title><?= $title ?></title>
    <link rel="stylesheet" type="text/css" media="screen" href="<?= base_url() ?>assets/css/jquery.dataTables.min.css">
    <script src="<?= base_url() ?>assets/js/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.min.css" type="text/css">

</head>

<body>

    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar navbar-dark" style="background-color: Maroon;">
        <div class=" container">
            <a class="navbar-brand" href="#">Sistem Penilaian</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link active" href="<?= base_url(); ?>">Home <span class="sr-only">(current)</span></a>
                    <!-- <a class="nav-item nav-link" href="<?= base_url(); ?>user/list_user"><b>Data User</a></b> -->
                    <a class="nav-item nav-link" href="<?= base_url(); ?>dosen">Dosen</a>
                    <a class="nav-item nav-link" href="<?= base_url(); ?>matakuliah">Matakuliah</a>
                    <a class="nav-item nav-link" href="<?= base_url(); ?>mahasiswa">Mahasiswa</a>
                    <a class="nav-item nav-link" href="<?= base_url(); ?>nilai">Nilai</a>
                    <!-- <a class="nav-item nav-link" href="<?= base_url(); ?>user/list_user"><b>Data User</a></b> -->
                    <a class="nav-item nav-link" href="<?= base_url(); ?>auth/logout">Logout</a>
                    <!-- <a class="nav-item nav-link disabled" href="#">Disabled</a> -->
                </div>
            </div>
        </div>
    </nav>