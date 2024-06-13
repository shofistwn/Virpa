<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>VIRPA | Landing Page</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link rel="icon" type="image/x-icon" href="<?= base_url('icon.ico') ?>">
    <link href="<?php echo base_url('landing') ?>/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?php echo base_url('landing') ?>/assets/reddors/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="<?php echo base_url('landing') ?>/assets/reddors/animate.css/animate.min.css" rel="stylesheet">
    <link href="<?php echo base_url('landing') ?>/assets/reddors/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url('landing') ?>/assets/reddors/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?php echo base_url('landing') ?>/assets/reddors/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?php echo base_url('landing') ?>/assets/reddors/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="<?php echo base_url('landing') ?>/assets/reddors/remixicon/remixicon.css" rel="stylesheet">
    <link href="<?php echo base_url('landing') ?>/assets/reddors/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?php echo base_url('landing') ?>/assets/css/style.css" rel="stylesheet">


</head>
<style>
    body {
        background-color: #FFD6E7;
    }

    #header {
        background-color: #FFD6E7;
    }

    #about {
        color: #2c4964;
    }

    p {
        color: #2c4964;
    }

    /* .section-title {
        background-color: #4B0082;
        color: white;
        padding: 20px;
    }

    .icon-boxes .icon {
        background-color: #F7CAC9;
        color: #4B0082;
        padding: 20px;
        border-radius: 10px;
    }

    .icon-boxes .title {
        font-weight: bold;
    }

    .icon-boxes .description {
        font-size: 14px;
    }

    .card {
        background-color: #F8BBD0;
        color: #4B0082;
        padding: 20px;
        border-radius: 10px;
    }

    .card-header {
        background-color: #4B0082;
        color: white;
        padding: 10px;
        border-radius: 10px 10px 0px 0px;
    }

    .card-title {
        font-weight: bold;
    }

    .form-group {
        margin-bottom: 10px;
    }

    .form-control {
        border-radius: 5px;
    }

    .btn-primary {
        background-color: #4B0082;
        color: white;
        border-radius: 5px;
    /* } */
</style>

<body>


    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center">

            <h1 class="logo me-auto"><img src="logo_virpa.png" alt="" class="img-fluid"><a href="#">Virtual Posyandu</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->

            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                    <li><a class="nav-link scrollto" href="#about">Contact</a></li>
                    <li><a class="nav-link scrollto" href="#contact">About</a></li>
                    <li><a class="nav-link scrollto" href="#klasifikasi">Klasifikasi</a></li>
                    <li class="dropdown"><a href="#"><span>Menu</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="<?= base_url('login') ?>">Login</a></li>
                        </ul>
                    </li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->


        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">
        <div class="container">
            <h1 style="color: white;">Selamat Datang Di</h1>
            <h1 style="color: white;">Virtual Posyandu</h1>
            <h5 style="color: white;">VIRPA merupakan website yang dipakai oleh</h5>
            <h5 style="color: white;">kader posyandu untuk memasukkan, mengolah</h5>
            <h5 style="color: white;">serta menampilkan data perkembangan balita</h5>
            <h5 style="color: white;">usia 0 - 12 bulan</h5>
            <a href="#klasifikasi" class="btn-get-started scrollto" style="color: white;">Get Started</a>
        </div>
    </section><!-- End Hero -->


    <main id="main">

        <!-- ======= Why Us Section ======= -->
        <section id="why-us" class="why-us">
            <div class="container">

                <div class="row">
                    <div class="col-lg-4 dengankan d-flex align-items-stretch">
                        <div class="content" style="background-color: green;">
                            <h3>Mengapa Memilih Virpa?</h3>
                            <p style="color: white;">
                                Beberapa alasan mengapa Anda harus menggunakan Virpa.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-8 dengankan d-flex align-items-stretch">
                        <div class="icon-boxes d-flex flex-column justify-content-center">
                            <div class="row">
                                <div class="col-xl-4 dengankan d-flex align-items-stretch">
                                    <div class="icon-box mt-4 mt-xl-0" style="background-color: green; color: white;">
                                        <i class="bx bx-receipt"></i>
                                        <h4>Prediksi Gizi yang Akurat</h4>
                                        <p style="color: white;">Prediksi yang sangat tepat untuk gizi anak Anda di Virpa. Kami memahami pentingnya kesejahteraan.</p>
                                    </div>
                                </div>
                                <div class="col-xl-4 dengankan d-flex align-items-stretch">
                                    <div class="icon-box mt-4 mt-xl-0" style="background-color: green; color: white;">
                                        <i class="bx bx-cube-alt"></i>
                                        <h4>Solusi Cepat dan Mudah</h4>
                                        <p style="color: white;">Dapatkan wawasan cepat tentang gizi anak Anda dengan platform yang ramah pengguna kami. Akses informasi berharga dalam beberapa klik.</p>
                                    </div>
                                </div>
                                <div class="col-xl-4 dengankan d-flex align-items-stretch">
                                    <div class="icon-box mt-4 mt-xl-0" style="background-color: green; color: white;">
                                        <i class="bx bx-images"></i>
                                        <h4>Akses yang Mudah</h4>
                                        <p style="color: white;">Periksa status gizi anak Anda kapan saja, di mana saja dengan Virpa. Dapat diakses 24/7 pada perangkat apa pun.</p>
                                    </div>
                                </div>
                            </div>
                        </div><!-- Akhir .content-->
                    </div>
                </div>

            </div>
        </section><!-- End Why Us Section -->

        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-xl-5 col-lg-6 video-box d-flex justify-content-center align-items-stretch position-relative">
                        <!-- <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="glightbox play-btn mb-4"></a> -->
                    </div>

                    <div class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5">
                        <h1><b>CONTACT PERSON</b></h1>
                        <div class="icon-box">
                            <div class="icon"><i class="bx bx-phone"></i></div>
                            <h4 class="title"><a href="">Phone Number</a></h4>
                            <p class="description">085749586720</p>
                        </div>

                        <div class="icon-box">
                            <div class="icon"><i class="bx bxl-gmail"></i></div>
                            <h4 class="title"><a href="">Email</a></h4>
                            <p class="description">alfeniaaw@gmail.com</p>
                        </div>

                        <div class="icon-box">
                            <div class="icon"><i class="bx bxl-instagram-alt"></i></div>
                            <h4 class="title"><a href="">Instagram</a></h4>
                            <p class="description">@alfenia.an</p>
                        </div>

                    </div>
                </div>

            </div>
        </section><!-- End About Section -->

        <!-- ======= Counts Section ======= -->

        <!-- ======= Services Section ======= -->


        <!-- ======= Departments Section ======= -->
        <section id="contact" class="departments">
            <div class="container">

                <div class="section-title">
                    <h2>About</h2>
                    <h1>VIRPA merupakan website yang digunakan oleh kader posyandu untuk memasukkan, mengolah serta menampilkan data pertumbuhan balita usia 12 - 60 bulan</h1>
                </div>


            </div>
        </section><!-- End Departments Section -->
        <section id="klasifikasi" class="departments">
            <div class="container">
                <div class="section-title">
                    <h2>Klasifikasi</h2>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card" style="background-color: pink;">
                            <div class="card-header text-center">
                                <h3 class="card-title">Proses Klasifikasi</h3>
                            </div>
                            <!-- form open -->
                            <?= form_open_multipart('predict-home', ['id' => 'klasifikasi-form']); ?>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="umur">Umur (Bulan)</label>
                                    <input type="number" class="form-control" id="umur" name="umur" placeholder="Umur" required>
                                </div>
                                <!-- select -->
                                <div class="form-group">
                                    <label for="jenis_kelamin">Jenis Kelamin</label>
                                    <select class="form-control" name="jenis_kelamin" id="jenis_kelamin" required>
                                        <option selected disabled>Pilih Jenis Kelamin</option>
                                        <option value="L">Laki-laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="tinggi_badan">Tinggi Badan (cm)</label>
                                    <input type="number" step="0.01" class="form-control" id="tinggi_badan" name="tinggi_badan_cm" placeholder="Tinggi Badan" required>
                                </div>
                                <div class="form-group">
                                    <label for="berat_badan">Berat Badan (kg)</label>
                                    <input type="number" step="0.01" class="form-control" id="berat_badan" name="berat_badan" placeholder="Berat Badan" required>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer text-center">
                                <button type="submit" class="btn btn-primary btn-purple">Lihat Hasil</button>
                            </div>
                            <?= form_close(); ?>

                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card" style="background-color: pink;">
                                    <div class="card-header text-center">
                                        <h3 class="card-title">Hasil Klasifikasi</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="text-center">
                                            <p style="color: black;">Status Gizi Balita :</p>
                                        </div>
                                        <div class="">

                                            <h1 class="text-center" id="hasil"></h1>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section><!-- End Departments Section -->



    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">


        <div class="container d-md-flex py-4">

            <div class="me-md-auto text-center text-md-start">
                <div class="copyright">
                    &copy; Copyright <strong><span>Virtual Posyandu</span></strong>. All Rights Reserved
                </div>
            </div>
            <div class="social-links text-center text-md-right pt-3 pt-md-0">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
        </div>
    </footer><!-- End Footer -->


    <!-- Vendor JS Files -->
    <script src="<?php echo base_url('landing') ?>/assets/reddors/purecounter/purecounter_vanilla.js"></script>
    <script src="<?php echo base_url('landing') ?>/assets/reddors/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url('landing') ?>/assets/reddors/glightbox/js/glightbox.min.js"></script>
    <script src="<?php echo base_url('landing') ?>/assets/reddors/swiper/swiper-bundle.min.js"></script>
    <script src="<?php echo base_url('landing') ?>/assets/reddors/php-email-form/validate.js"></script>
    <script src="<?= base_url('plugins/jquery/jquery.min.js') ?>"></script>

    <!-- Template Main JS File -->
    <script src="<?php echo base_url('landing') ?>/assets/js/main.js"></script>

    <script>
        $(document).ready(function() {
            $('#klasifikasi-form').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'),
                    data: $(this).serialize(),
                    success: function(response) {
                        // handle success response here
                        console.log(response);
                        $('#hasil').text(response.predicted);


                    },
                    error: function(xhr, status, error) {
                        // handle error response here
                        console.log(xhr.responseText);
                    }
                });
            });
        });
    </script>


</body>

</html>