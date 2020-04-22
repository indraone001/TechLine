<!doctype html>
<html lang="en">
  <head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->

	<link rel="stylesheet" href="<?= base_url('assets/'); ?>css/style-profile.css">
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
			<h2 class="title-edit" align="center">Show Profile</h2>

			<?= form_open_multipart(''); ?>
			<input type="text" class="form-control border-bottom-3" id="id_user" name="id_user" value="<?= $user['id_user']; ?>" hidden>
			<input type="text" class="form-control border-bottom-3" id="nama_user" name="nama_user" value="<?= $user['nama_user']; ?>" readonly>
			<input type="text" class="form-control border-bottom-3" id="Email" name="email_user" value="<?= $user['email_user']; ?>" readonly>
			<input type="text" class="form-control border-bottom-3" id="nama_user" name="alamat_user" value="<?= $user['alamat_user']; ?>" readonly>
			<input type="text" class="form-control border-bottom-3" id="nama_user" name="no_telp" value="<?= $user['no_telp']; ?>" readonly>

			<div class="row" >
                <div class="col md-6">
					<a href="<?= base_url('/user/setting'); ?>"><button type="button" class="btn btn-danger btn-lg">Update</button></a>
                </div>
                <div class="col md-6">
					<a href="<?= base_url('/user/changePassword'); ?>"><button type="button" class="btn btn-danger btn-lg">Ubah Password</button></a>
                </div>
              
            </div>
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