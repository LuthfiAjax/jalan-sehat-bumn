<?php
// init variables
$min_number = 1;
$max_number = 10;

// generating random numbers
$random_number1 = mt_rand($min_number, $max_number);
$random_number2 = mt_rand($min_number, $max_number);
?>

<div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
            <div class="card">
                <div class="card-body">

                    <!-- Logo -->
                    <div class="app-brand justify-content-center">
                        <a href="index.html" class="app-brand-link gap-2">
                            <img src="<?= base_url('assets/images/webp/2.webp'); ?>" alt="logo R17" class="logo">
                            <style>
                                .logo {
                                    width: 250px;
                                }
                            </style>
                        </a>
                    </div>
                    <!-- /Logo -->

                    <h4 class="mb-2">Welcome Admin jalan sehat👋</h4>
                    <p class="mb-4">Please sign-in </p>

                    <!-- flash data -->
                    <?= $this->session->flashdata('message'); ?>

                    <!-- login -->
                    <form id="formAuthentication" class="mb-3" action="<?= base_url('portal/login'); ?>" method="POST">

                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" value="<?= set_value('username'); ?>" autocomplete="off" placeholder="Enter your username account" autofocus />
                            <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="mb-3 form-password-toggle">
                            <div class="d-flex justify-content-between">
                                <label class="form-label" for="password">Password</label>
                            </div>
                            <div class="input-group input-group-merge">
                                <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span><br>
                            </div>
                            <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="mb-3">
                            <label for="answer" class="form-label">please count : <?= $random_number1 . ' + ' . $random_number2; ?></label>
                            <input name="firstNumber" type="hidden" value="<?= $random_number1; ?>" />
                            <input name="secondNumber" type="hidden" value="<?= $random_number2; ?>" />
                            <input type="number" class="form-control" id="answer" name="answer" autocomplete="off" placeholder="Enter your answer" autofocus />
                            <?= form_error('answer', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="mb-3">
                            <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
                        </div>

                    </form>
                    <!-- end login -->

                </div>
            </div>
        </div>
    </div>
</div>