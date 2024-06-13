<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar | Virtual Posyandu</title>

    <link rel="icon" type="image/x-icon" href="<?= base_url('icon.ico') ?>">



    <link rel="shortcut icon" href="<?= base_url('assets/compiled/svg/favicon.svg" type="image/x-icon') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/compiled/css/app.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/compiled/css/app-dark.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/compiled/css/auth.css') ?>">
</head>

<body>
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

                    <h1 class="auth-title text-black">Sign Up</h1>
                    <p class="auth-subtitle mb-5">Input your data to register to our website.</p>

                    <?= form_open('proses-register'); ?>
                    <?= csrf_field(); ?>
                    <div class="form-group position-relative mb-4">
                        <input type="text" class="form-control form-control-xl" placeholder="Nama Ibu" name="nama_user">
                    </div>
                    <div class="form-group position-relative mb-4">
                        <input type="email" class="form-control form-control-xl" placeholder="Email" name="email">
                    </div>
                    <div class="form-group position-relative mb-4">
                        <input type="text" class="form-control form-control-xl" placeholder="Telepon" name="telepon">
                    </div>
                    <div class="form-group position-relative mb-4">
                        <input type="text" class="form-control form-control-xl" placeholder="Username" name="username">
                    </div>
                    <div class="form-group position-relative mb-4">
                        <input type="password" class="form-control form-control-xl" placeholder="Password" name="password">
                    </div>
                    <div class="form-group position-relative mb-4">
                        <input type="password" class="form-control form-control-xl" placeholder="Retype password" name="password_conf">
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="icheck-primary">
                                <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                                <label for="agreeTerms">
                                    I agree to the <a href="#">terms</a>
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5 text-black" style="background: #FFD6E7;">Daftar</button>
                        </div>
                        <!-- /.col -->
                    </div>
                    <?= form_close(); ?>
                    <div class="text-center mt-5 text-lg fs-4">
                        <a href="<?= base_url('login') ?>" class="text-center text-black">Sudah punya akun? Login Sekarang</a>

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