<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Style CSS -->
    <style>
        .badge {
            margin-left: 3px;
        }
    </style>

    <!-- <title>Hello, world!</title> -->
    <title><?= $title ?></title>
</head>

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
                    <a class="nav-item nav-link" href="<?= base_url(); ?>nilai">Nilai</a>
                    <a class="nav-item nav-link" href="<?= base_url(); ?>auth/logout">Logout</a>
                    <!-- <a class="nav-item nav-link disabled" href="#">Disabled</a> -->
                </div>
            </div>
        </div>
    </nav>