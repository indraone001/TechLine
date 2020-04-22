<!DOCTYPE html>
<main lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
        <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/style-landing.css">
        <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/jquery.nice-number.css">
        <!-- Font Montserrat -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,550,600,700&display=swap" rel="stylesheet">
        <title>TechLine | <?= $title; ?></title>
    </head>

    <body>
        <header>
            <nav class="navbar navbar-expand-lg">
                <a class="navbar-brand" href="<?= base_url('/user'); ?>">Techline</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Categories
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="<?= base_url('/user'); ?>">All Items</a>
                                <a class="dropdown-item" href="<?= base_url('/user/sort?id=Capsule'); ?>">Capsule</a>
                                <a class="dropdown-item" href="<?= base_url('/user/sort?id=Tablet'); ?>">Tablet</a>
                                <a class="dropdown-item" href="<?= base_url('/user/sort?id=Syrup'); ?>">Syrup</a>
                                <a class="dropdown-item" href="<?= base_url('/user/sort?id=External'); ?>">External Medicine</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-item nav-link chart" href="#"><img src="<?= base_url('assets/img/shopping-cart.png'); ?>" alt=""></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-item nav-link about" href="<?= base_url('/user/about'); ?>">About</a>
                        </li>
                        <li class="nav-item dropleft account">
                            <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="<?= base_url('assets/img/users/') . $user['image']; ?>" alt="">
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item"  href="<?= base_url('/user/ShowProfile'); ?>">Setting</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?= base_url('/auth/logout'); ?> ">Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>