<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/style-edit.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/jquery.nice-number.css">
    <!-- Font Montserrat -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,550,600,700&display=swap" rel="stylesheet">
    <title>edit-profile</title>


  </head>
  <body>
    
    <main>
      <div class="container">
        <div class="card">
          <div class="card-body">
            <div>   
              <?= $this->session->flashdata('message') ?>
            </div>    
            <img class="card-img rounded mx-auto d-block" style="width:150px" src="<?= base_url('assets/img/users/'). $user['image']; ?>"  alt="Card image cap"></a>
            <h2 class="title-edit" align="center">Edit Password</h2>

            <?= form_open_multipart(''); ?>
            <input type="text" class="form-control border-bottom-3" id="id_user" name="id_user" value="<?= $user['id_user']; ?>" hidden>
            <input type="password" class="form-control border-bottom-3" id="password_user" name="password_user" placeholder="Password lama">
            <?= form_error('password_user'), '<small class="text-danger pl-3">','</small>' ?>
            <input type="password" class="form-control border-bottom-3" id="password_baru" name="password_baru" placeholder="Password baru">
            <?= form_error('password_baru'), '<small class="text-danger pl-3">','</small>' ?>
            <input type="password" class="form-control border-bottom-3" id="re_password_baru" name="re_password_baru" placeholder="ketik ulang Password baru">
            <?= form_error('re_password_baru'), '<small class="text-danger pl-3">','</small>' ?>
            <button type="sumbit" name="update" class="btn btn-danger btn-lg">Edit Password</button>
         </div>
        </div>

      </div>

    </main>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>

</html>