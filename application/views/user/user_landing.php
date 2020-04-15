<!DOCTYPE html>
<main lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
        <link rel="stylesheet" href="assets/css/style-landing.css">
        <link rel="stylesheet" href="assets/css/jquery.nice-number.css">
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
                                <a class="dropdown-item" href="#">All Items</a>
                                <a class="dropdown-item" href="#">Capsule</a>
                                <a class="dropdown-item" href="#">Tablet</a>
                                <a class="dropdown-item" href="#">Syrup</a>
                                <a class="dropdown-item" href="#">External Medicine</a>
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
                                <a class="dropdown-item" href="#">Setting</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?= base_url('/auth/logout'); ?> ">Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <main>
            <div class="container mt-5">
                <h2>All Items</h2>
                <div class="row mt-5">

                    <?php foreach ($obat as $o) { ?>

                        <!-- item -->
                        <div class="col-6 col-sm-6 col-md-4 col-lg-3 m-auto">
                            <div class="card">
                                <a href="" data-toggle="modal" data-target=".bd-obat1-modal-lg">
                                    <img class="card-img-top" src="<?= base_url('assets/img/item/') . $o->image; ?>" alt="Card image cap">
                                    <div class="card-body">
                                        <h4 class="card-title"><?= $o->nama_obat; ?></h4>
                                        <p class="card-text">Rp. <?= $o->Harga; ?></p>
                                    </div>
                                </a>
                                <div class="modal fade bd-obat1-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3 class="modal-title" id="exampleModalLabel">Details</h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-md-5">
                                                            <img src="<?= base_url('assets/img/item/') . $o->image; ?>" alt="">
                                                        </div>
                                                        <div class="col-md-7">
                                                            <h1><?= $o->nama_obat; ?></h1>
                                                            <p><span>Categories :</span> <?= $o->jenis_obat; ?></p>
                                                            <p><span>Price :</span> <?= $o->Harga; ?></p>
                                                            <p><span>Description :</span> <?= $o->deskripsi; ?></p>

                                                            <input type="number" value="1" min="1">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn add-chart">Add to Chart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php } ?>

                </div>
            </div>
        </main>




        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
        <script src="assets/js/jquery.nice-number.js"></script>
        <script>
            // counting untuk tag input, sudah mencangkup button di cssnya
            $(function() {
                $('input[type="number"]').niceNumber();
            });
        </script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
    </body>

</main>