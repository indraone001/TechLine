<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/css1.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700;800;900&display=swap" rel="stylesheet">

    <title>About</title>

    <style>
        * {
            font-family: 'montserrat';
        }

        .row {
            background-color: #ffffff;
        }

        .img-con {
            margin: 0;
            padding: 7% 5%;
        }

        .form-con {
            margin: 0;
            background-color: #E8505B;
            color: #ffffff;
            padding: 17.1% 8%;
        }

        form button:hover {
            color: #ffffff;
            background-color: rgb(230, 139, 139);
        }

        .navbar-brand {
            color: red;
            font-weight: 800;
            margin-left: 20px;
            font-size: 35px;
        }

        .navbar-nav a {
            color: white;
        }

        .nav1 {
            position: Absolute;
            right: 150px;
        }

        .nav2 {
            position: Absolute;
            right: 80px;
        }

        h1 {
            margin-bottom: 50px;
            font-weight: 500;
        }

        .image {
            margin-left: 125px;
            margin-top: 30px;
            width: 60%;
        }
    </style>

</head>

<body>

    <nav class="navbar fixed-top navbar-expand-lg ">
        <a class="navbar-brand" href="<?= base_url('/user'); ?>">Techline</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link nav1" href="<?= base_url('/user'); ?>">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav2" href="<?= base_url('/user/about'); ?>">About</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">

            <div class="col-md-7 col-sm-12 col-12 img-con">
                <img src="<?= base_url('assets/'); ?>img/source-about.png" alt="First Aid Kit" class="image">
            </div>
            <div class="col-md-5 col-sm-12 col-12 form-con">
                <h1>About </h1>
                <p style="text-align: justify;"> Inspired by doctors who want to give medicines to their patients without having to go to the drugstore, Techline only give medicine that use selected ingredients so that the medicine will be at finest state. </p>
            </div>
        </div>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>