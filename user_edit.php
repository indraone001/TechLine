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
						<?= form_open_multipart(''); ?>
						<button type="button" class="card-img rounded mx-auto d-block"style="width:150px" data-toggle="modal" data-target="#edit"><img  style="width:150px" src="<?= base_url('assets/img/users/'). $user['image']; ?>" alt="Card image cap"></img></button>
						
						<!-- Untuk memunculkan popup upload gambar -->
						<div class="modal fade" id="edit">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<form class="obat" method="post" action="<?= base_url('admin/editUser') ?>">
										<div class="custom-file">
											<!-- File input field -->
											<input type="file" id="image" name ="image" onchange="return fileValidation()"/>
											<!-- Image preview -->
											<div id="imagePreview"></div>
										</div>
								</div>
							</div>
						</div>

						

						<h2 class="title-edit" align="center">EDIT PROFILE</h2>
						
						<input type="text" class="form-control border-bottom-3" id="id_user" name="id_user" value="<?= $user['id_user']; ?>" hidden>
						<input type="text" class="form-control border-bottom-3" id="nama_user" name="nama_user" placeholder="nama" value="<?= $user['nama_user']; ?>" >
						<input type="text" class="form-control border-bottom-3" id="Email" name="email_user" placeholder="email" value="<?= $user['email_user']; ?>" >
						<input type="text" class="form-control border-bottom-3" id="nama_user" name="alamat_user" placeholder="alamat" value="<?= $user['alamat_user']; ?>" >
						<input type="text" class="form-control border-bottom-3" id="nama_user" name="no_telp" placeholder="nomor telephone" value="<?= $user['no_telp']; ?>" >
						<button type="sumbit" name="update" class="btn btn-danger btn-lg">Update</button>
				 	</div>
				</div>
			</div>
		</main>
		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->

		<!-- ini masi ada yg error di bagian tampilin nama file pas uplaod  -->
		<script> 
			function fileValidation(){
				var fileInput = document.getElementById('image');
				var filePath = fileInput.value;
				var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
				if(!allowedExtensions.exec(filePath)){
					alert('Please upload file having extensions .jpeg/.jpg/.png/.gif only.');
					fileInput.value = '';
					return false;
				}else{
					//Image preview
					if (fileInput.files && fileInput.files[0]) {
						var reader = new FileReader();
						reader.onload = function(e) {
							document.getElementById('imagePreview').innerHTML = '<img src="'+e.target.result+'"/>';
						};
						reader.readAsDataURL(fileInput.files[0]);
					}
				}
			}
		</script>
		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

	</body>

</html>

