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
            /* set height of container to viewport height */
        }

        #result {
            display: inline-block;
            width: 200px;
            height: 200px;
            border-radius: 50%;
            background-color: #333;
            color: #fff;
            font-size: 72px;
            text-align: center;
            line-height: 200px;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <div class="card">
                    <div class="card-body">
                        <div class="app-brand justify-content-center">
                            <a href="index.html" class="app-brand-link gap-2">
                                <img src="<?= base_url('assets/images/webp/jalan.webp'); ?>" alt="logo R17" width="100%">
                                <style>
                                    .logo {
                                        width: 250px;
                                    }
                                </style>
                            </a>
                        </div>
                        <div class="container">
                            <div id="result"></div>
                        </div>
                        <form id="formAuthentication" class="mb-3" method="POST">

                            <div class="mb-3">
                                <input class="form-control" type="hidden" id="start" value="<?= $undian->start; ?>" name="start" />
                            </div>
                            <div class="mb-3">
                                <input class="form-control" type="hidden" id="finish" value="<?= $undian->finish; ?>" name="finish" />
                            </div>
                            <div class="mb-3">
                                <input class="form-control" type="hidden" id="seconds" value="<?= $undian->time; ?>" name="seconds" />
                            </div>

                            <div class="mb-3">
                                <button class="btn btn-primary d-grid w-100" type="button" id="generateButton">Undi Nomor</button>
                            </div>
                        </form>

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
    <script>
        const generateButton = document.getElementById('generateButton');
        const result = document.getElementById('result');

        generateButton.addEventListener('click', function() {
            const start = Number(document.getElementById('start').value);
            const finish = Number(document.getElementById('finish').value);
            const seconds = Number(document.getElementById('seconds').value);

            if (isNaN(start) || isNaN(finish) || isNaN(seconds)) {
                result.textContent = 'Please enter valid numbers';
            } else {
                const interval = setInterval(function() {
                    const randomNum = Math.floor(Math.random() * (finish - start + 1) + start);
                    result.textContent = randomNum;
                }, 300);

                setTimeout(function() {
                    clearInterval(interval);
                }, seconds * 1000);
            }
        });
    </script>
</body>

</html>