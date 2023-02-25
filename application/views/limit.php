<!DOCTYPE html>

<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="<?= base_url('assets/login'); ?>/assets/" data-template="Dimensy">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>Undian Jalan Sehat BUMN</title>
    <meta name="description" content="" />
    <link rel="icon" type="image/x-icon" href="<?= base_url('assets/images/faveicon.png'); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="<?= base_url('assets/login'); ?>/assets/vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="<?= base_url('assets/login'); ?>/assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="<?= base_url('assets/login'); ?>/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="<?= base_url('assets/login'); ?>/assets/css/demo.css" />
    <link rel="stylesheet" href="<?= base_url('assets/login'); ?>/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="<?= base_url('assets/login'); ?>/assets/vendor/css/pages/page-auth.css" />
    <script src="<?= base_url('assets/login'); ?>/assets/vendor/js/helpers.js"></script>
    <script src="<?= base_url('assets/login'); ?>/assets/js/config.js"></script>
    <style>
        body {
            background-image: url("<?= base_url('assets/images/webp/bg-header.webp'); ?>");
            background-size: cover;
            background-position: center center;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        #result img {
            max-width: 100%;
            height: auto;
            margin-top: 20px;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="card mx-auto" style="max-width: 600px;">
                <div class="card-body">
                    <div class="app-brand justify-content-center mb-5">
                        <a href="#" class="app-brand-link">
                            <img src="<?= base_url('assets/images/webp/jalan.webp'); ?>" alt="logo Jalan Sehat" class="logo" width="100%">
                        </a>
                    </div>
                    <div class="row">
                        <div id="result">
                            <h2 class="mt-3 mb-4 text-center">Mohon Maaf</h2>
                            <img style="display: flex; justify-content: center; align-items: center;" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI5NyIgaGVpZ2h0PSI5NyIgZmlsbD0ibm9uZSIgdmlld0JveD0iMCAwIDk3IDk3Ij4KICAgIDxwYXRoIGZpbGw9IiNGMUYxRjEiIGZpbGwtcnVsZT0iZXZlbm9kZCIgZD0iTTQ4LjE2NiA5Ni41NDNjMjYuNTIzIDAgNDguMDI0LTIxLjUgNDguMDI0LTQ4LjAyNEM5Ni4xOSAyMS45OTYgNzQuNjg5LjQ5NSA0OC4xNjYuNDk1Uy4xNCAyMS45OTYuMTQgNDguNTE5czIxLjUwMiA0OC4wMjQgNDguMDI1IDQ4LjAyNHoiIGNsaXAtcnVsZT0iZXZlbm9kZCIvPgogICAgPHBhdGggZmlsbD0iI0RFNEQ1OSIgZmlsbC1ydWxlPSJldmVub2RkIiBkPSJNNDMuNTkyIDI5LjQ1YzAtMi40MyAyLjAxOS0zLjggNC42MDUtMy44IDIuNDYgMCA0LjU0MiAxLjM3MSA0LjU0MiAzLjggMCAzLjcwNi0uMjIgOC4yMjItLjQ0MSAxMi43MzgtLjIyIDQuNTE2LS40NDIgOS4wMzItLjQ0MiAxMi43MzggMCAxLjkzLTIuMTQ1IDIuNzQtMy42NTkgMi43NC0yLjAxOCAwLTMuNzIyLS44MS0zLjcyMi0yLjc0IDAtMy43MDYtLjIyLTguMjIyLS40NDItMTIuNzM4LS4yMi00LjUxNi0uNDQxLTkuMDMyLS40NDEtMTIuNzM4em0wIDM3LjM2NGMwLTIuNDk1IDEuOTczLTQuNTc0IDQuNjA0LTQuNTc0IDIuNDUgMCA0LjU0MyAyLjA4IDQuNTQzIDQuNTc0IDAgMi40MzUtMi4wOTIgNC41NzQtNC41NDMgNC41NzQtMi42MzEgMC00LjYwNC0yLjEzOS00LjYwNC00LjU3NHoiIGNsaXAtcnVsZT0iZXZlbm9kZCIvPgo8L3N2Zz4K" alt="">
                            <p class="mx-2 mt-4 text-center">
                                Mohon maaf, pendaftaran program Jalan Sehat BUMN sudah penuh. Kami mohon maaf atas ketidaknyamanannya. Terima kasih atas minat Anda untuk bergabung dengan program ini.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="<?= base_url('assets/login'); ?>/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="<?= base_url('assets/login'); ?>/assets/vendor/libs/popper/popper.js"></script>
    <script src="<?= base_url('assets/login'); ?>/assets/vendor/js/bootstrap.js"></script>
    <script src="<?= base_url('assets/login'); ?>/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="<?= base_url('assets/login'); ?>/assets/vendor/js/menu.js"></script>
    <script src="<?= base_url('assets/login'); ?>/assets/js/main.js"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>

</body>

</html>