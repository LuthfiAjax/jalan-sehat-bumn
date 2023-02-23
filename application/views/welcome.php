<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Jalan Sehat Bersama BUMN | Grobogan</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<link rel="icon" type="image/x-icon" href="<?= base_url('assets/images/faveicon.png'); ?>">
</head>

<body>

	<nav class="navbar navbar-expand-md navbar-light bg-light">
		<div class="container-fluid">
			<style>
				.navbar-brand img {
					max-width: 100%;
					height: auto;
				}

				body {
					background: linear-gradient(to bottom right, #B0DDE4, #FEFFFF);
				}

				#title {
					color: #219AA9;
					font-size: 2rem;
					font-weight: bold;
					text-transform: uppercase;
					letter-spacing: 2px;
				}
			</style>
			<!-- Navbar logo -->
			<a id="top_header" class="navbar-brand" href="#"><img src="<?= base_url('assets/images/'); ?>1.webp"></a>
		</div>
	</nav>

	<div id="carouselExample" class="carousel slide">
		<div class="carousel-inner">
			<div class="carousel-item active">
				<img src="<?= base_url('assets/images/header.webp'); ?>" class="d-block w-100" alt="header">
			</div>
		</div>
	</div>

	<div class="container mt-5 mb-5" style="padding-bottom: 70px;">
		<div class="d-flex justify-content-center align-items-center  ">
			<div class="content-form-login" style="background: white;box-shadow: 0 6px 15px rgba(36, 37, 38, 0.08);border-radius: 5px;">
				<h1 id="title" class="text-center mt-3 mb-0">Registrasi</h1>
				<form id="form-login-data" class="p-4" action="<?= base_url('daftar/peserta'); ?>" method="POST">
					<div class="row pt-3 m-0">
						<div class="col-sm-12 p-0 mt-2">
							<div class="form-group">
								<label>Nama <span class="text-danger">*</span></label>
								<input id="nama" type="text" name="nama" class="form-control" placeholder="Masukan email anda" autocomplete="off" required>
							</div>
						</div>
						<div class="col-sm-12 p-0 mt-2">
							<div class="form-group">
								<label>Nomor HP <span class="text-danger">*</span></label>
								<input id="no_hp" type="number" name="no_hp" class="form-control" placeholder="Masukan nomor HP" autocomplete="off" required>
							</div>
						</div>
						<div class="col-sm-12 p-0 mt-2">
							<div class="form-group">
								<label>Instansi / Umum <span class="text-danger">*</span></label>
								<input id="instansi" type="text" name="instansi" class="form-control" placeholder="Masukan Instansi / Umum" autocomplete="off" required>
							</div>
						</div>
						<br>
						<div class="col-lg-12 mt-3">
							<div class="row">
								<div class="col-12">
									<div class="d-flex justify-content-center">
										<button type="submit" class="btn btn-block btn-success btn-rounded">Daftar Sekarang </button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>

	<footer class="sticky-bottom bg-light py-1 mt-4">
		<div class="container">
			<div class="row">
				<div class="container text-center py-3">
					<img src="<?= base_url('assets/images/logo-panjang-hitam.png'); ?>" alt="Organized by logo" height="24">
				</div>
			</div>
		</div>
	</footer>



	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>