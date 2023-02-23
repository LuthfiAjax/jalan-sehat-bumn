<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jalan Sehat Bersama BUMN | Grobogan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
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
                    background-image: url("<?= base_url('assets/images/webp/bg-header.webp'); ?>");
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

    <div id="container" class="container mt-4">
        <div class="d-flex justify-content-center align-items-center  ">
            <div class="content-form-login" style="background: white;box-shadow: 0 6px 15px rgba(36, 37, 38, 0.08);border-radius: 5px;">
                <div class="col">
                    <div class="card h-100">
                        <img src="<?= base_url('assets/images/webp/jalan.webp'); ?>" alt="" style="width: 100%;">
                        <img src="<?= base_url('assets/images/barcode/' . $personal->barcode); ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 style="text-transform: uppercase;" class="card-title text-center"><b><?= $personal->nama_peserta; ?></b></h5>
                            <p class="card-text text-center fw-semibold">Nomor Pendaftaran</p>
                        </div>
                        <div class="card-footer bg-primary">
                            <p class="text-center text-light fs-4"><b><?= $personal->nomor_urut; ?></b></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-3" style="padding-bottom: 70px;">
        <div class="d-flex justify-content-center align-items-center  ">
            <button id="screenshot" class="btn btn-primary fw-semibold">Download QR-Code </button>
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
        function takeScreenshot(element) {
            html2canvas(element).then(function(canvas) {
                var screenshot = canvas.toDataURL("image/png");
                var downloadLink = document.createElement('a');
                downloadLink.setAttribute('download', 'bukti-daftar.png');
                downloadLink.setAttribute('href', screenshot);
                downloadLink.click();
            });
        }

        var screenshotBtn = document.getElementById('screenshot');
        var container = document.getElementById('container');
        screenshotBtn.addEventListener('click', function() {
            takeScreenshot(container);
        });
    </script>
</body>

</html>