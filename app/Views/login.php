<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Virtual Posyandu</title>
    <link rel="icon" type="image/x-icon" href="<?= base_url('icon.ico') ?>">



    <link rel="shortcut icon" href="<?= base_url('assets/compiled/svg/favicon.svg" type="image/x-icon') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/compiled/css/app.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/compiled/css/app-dark.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/compiled/css/auth.css') ?>">
</head>

<body>
    <?php if (session()->getFlashdata('success_logout')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('success_logout') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('success_register')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('success_register') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error_login')) : ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('error_login') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <div id="auth">

        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <div class="auth-logo">
                        <div class="row">
                            <div class="col-3">
                                <a href="#"> <img src="<?= base_url('for_icon.png') ?>" alt="Virpa Logo" style="opacity: .8; width: 90px; height: 90px">
                                </a>
                            </div>
                            <div class="col-9">
                                <h1 class="text-black">Virtual Posyandu</h1>
                            </div>
                        </div>
                    </div>
                    <h1 class="auth-title text-black">Log in.</h1>
                    <p class="auth-subtitle mb-5">Log in with your data that you entered during registration.</p>

                    <!-- <form action="index.html"> -->
                    <?= form_open('proses-login'); ?>
                    <?= csrf_field(); ?>
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="text" class="form-control form-control-xl" placeholder="Username" name="username">
                        <div class="form-control-icon">
                            <i class="bi bi-person"></i>
                        </div>
                    </div>
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="password" class="form-control form-control-xl" placeholder="Password" name="password">
                        <div class="form-control-icon">
                            <i class="bi bi-shield-lock"></i>
                        </div>
                    </div>
                    <div class="form-check form-check-lg d-flex align-items-end">
                        <input class="form-check-input me-2" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label text-gray-600" for="flexCheckDefault">
                            Keep me logged in
                        </label>
                    </div>
                    <!-- <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Log in</button> -->
                    <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5" style="background: #FFD6E7;color:black;">Masuk</button>

                    <!-- </form> -->
                    <?= form_close(); ?>

                    <div class="text-center mt-5 text-lg fs-4">
                        <p class="mb-0 text-center p-3">
                            <a href="<?= base_url('register') ?>" class="text-center text-black">Belum punya akun? Daftar Sekarang</a>
                        </p>
                        <!-- <p><a class="font-bold" href="auth-forgot-password.html">Forgot password?</a>.</p> -->
                    </div>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right" style="background: #FFD6E7;">

                </div>
            </div>
        </div>

    </div>
</body>
<script src="<?= base_url('plugins/jquery/jquery.min.js') ?>"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

</html>