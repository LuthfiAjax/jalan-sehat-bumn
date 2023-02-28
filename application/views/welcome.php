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
				@media (max-width: 576px) {

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

					.container {
						padding-left: 15px;
						padding-right: 15px;
					}

					.container-fluid {
						padding-left: 15px;
						padding-right: 15px;
					}

					.content-form-login {
						padding: 10px;
					}
				}
			</style>
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
				<?= $this->session->flashdata('message'); ?>
				<style>
					#ktp-message {
						font-size: small;
						font-weight: bold;
					}

					#ktp-message.invalid {
						color: red;
					}

					#ktp-message.valid {
						color: green;
					}
				</style>
				<form id="form-login-data" class="p-4" action="<?= base_url('07aad1df9d8908b63e5e8170b2bcc819'); ?>" method="POST">
					<div class="row pt-3 m-0">
						<div class="col-sm-12 p-0 mt-2">
							<div class="form-group">
								<label>Nama sesuai KTP <span class="text-danger">*</span></label>
								<input id="nama" type="text" name="nama" class="form-control" placeholder="Masukan Nama anda" autocomplete="off" value="<?= set_value('nama'); ?>" required>
								<?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
						</div>
						<div class="col-sm-12 p-0 mt-2">
							<div class="form-group">
								<label>KTP / Kartu Identitas<span class="text-danger">*</span></label>
								<input id="ktp" type="number" name="ktp" class="form-control" value="<?= set_value('ktp'); ?>" onchange="validasiKTP()" placeholder="Nomor KTP / kartu identitas" autocomplete="off" minlength="16" maxlength="16" required>
								<?= form_error('ktp', '<small class="text-danger pl-3">', '</small>'); ?>
								<small id="ktp-message"></small>
							</div>
						</div>
						<div class="col-sm-12 p-0 mt-2">
							<div class="form-group">
								<label>Nomor HP <span class="text-danger">*</span></label>
								<input id="no_hp" type="number" name="no_hp" class="form-control" placeholder="Masukan nomor HP" value="<?= set_value('no_hp'); ?>" autocomplete="off" required>
								<?= form_error('no_hp', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
						</div>
						<div class="col-sm-12 p-0 mt-2">
							<div class="form-group">
								<label>Instansi / Umum <span class="text-danger">*</span></label>
								<select class="form-control" id="pilih" name="pilih" aria-label="Default select example">
									<option disabled>Pilih</option>
									<option disabled value="1">Instansi</option>
									<option selected value="2">Umum</option>
								</select>
							</div>
						</div>

						<div id="form-desa" class="col-sm-12 p-0 mt-2">
							<div class="form-group">
								<label>Desa / Kelurahan <span class="text-danger">*</span></label>
								<input id="alamat-desa" type="text" name="alamat_desa" class="form-control" placeholder="Dari Desa / Kelurahan" autocomplete="off" required>
							</div>
						</div>
						<div class="mb-3 form-check mt-3">
							<input type="checkbox" class="form-check-input" id="modalCheck" required>
							<label class="form-check-label" for="modalCheck">Data telah sesuai <span class="text-danger">*</span></label>
						</div>
						<br>
						<div class="col-lg-12 mt-5">
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
				<!-- Modal -->
				<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Menyatakan data telah sesuai</h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<div class="modal-body text-justify">
								<b>Pengumuman:</b><br><br>
								<b>1 : </b> Pastikan data telah lengkap dan benar karena akan ada validasi saat registrasi ulang pada tanggal 5 Maret 2023 pukul 05.00 sampai 05.45 di Alun-alun Purwodadi.<br><br>
								<b>2 : </b> Harap membawa Bukti pendaftaran yang terdapat QR Code dan KTP / Kartu Identitas saat hari-H.
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>
			</div>
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
	<script>
		var myModal = new bootstrap.Modal(document.getElementById('myModal'));
		var modalCheck = document.getElementById('modalCheck');
		modalCheck.addEventListener('click', function() {
			if (modalCheck.checked) {
				myModal.show();
			} else {
				myModal.hide();
			}
		})
	</script>
	<script>
		function validasiKTP() {
			var ktp = document.getElementById("ktp").value;
			var ktpMessage = document.getElementById("ktp-message");
			if (ktp.toString().length !== 16) {
				ktpMessage.innerText = "Nomor KTP Tidak Valid";
				ktpMessage.classList.remove("valid");
				ktpMessage.classList.add("invalid");
				document.getElementById("ktp").setCustomValidity("Terdiri dari 16 digit.");
			} else {
				ktpMessage.innerText = "Nomor KTP Valid";
				ktpMessage.classList.remove("invalid");
				ktpMessage.classList.add("valid");
				document.getElementById("ktp").setCustomValidity("");
			}
		}
	</script>
</body>

</html>