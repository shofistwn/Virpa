<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Data</title>

    <link rel="stylesheet" href="<?= base_url('dist/css/adminlte.min.css') ?>">

</head>

<body>
    <div class="container-fluid">
        <div class="card-header">
            <h2 class=" text-center">Kegiatan Stimulasi, Deteksi, Intervensi Dini Tumbuh Kembang (SDIDTK)</h2>
        </div>
        <div class="card-body">
            <!-- input states -->
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="col-form-label" for="inputSuccess">Nama Balita :</label>
                        <h4><?= $nama_bayi ?></h4>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label" for="inputWarning">Usia Balita :</label>
                        <h4><?= $usia_bayi ?> bulan</h4>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label" for="inputError">Jenis Kelamin :</label>
                        <h4><?= $jenis_kelamin === 'laki_laki' ? 'Laki-laki' : 'Perempuan' ?></h4>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label" for="inputError">Lingkar Kepala :</label>
                        <h4><?= $lingkar_kepala ?> cm</h4>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="col-form-label" for="inputWarning">Berat Badan :</label>
                        <h4><?= $berat_badan ?> kg</h4>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label" for="inputError">Tinggi Badan :</label>
                        <h4><?= $tinggi_badan ?> cm</h4>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label" for="inputError">Indek Massa Tubuh :</label>
                        <h4><?= $imt ?></h4>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label" for="inputError">Status Gizi :</label>
                        <h4><?= $status_gizi ?></h4>
                    </div>

                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-6">
                    <!-- radio -->
                    <div class="form-group">
                        <h4>Gerak Kasar</h4>
                        <p>Berdiri selama 1 detik</p>
                        <div class="radiobtn">
                            <?php if ($gerak_kasar == 'bisa') { ?>
                                <label for="radio3">Bisa</label>
                                <label for="">/</label>
                                <label for="radio4" style="text-decoration-line: line-through; ">Tidak</label>
                            <?php } else { ?>
                                <label for="radio3" style="text-decoration-line: line-through; ">Bisa</label>
                                <label for="">/</label>
                                <label for="radio4">Tidak</label>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <!-- radio -->
                    <div class="form-group">
                        <h4>Gerak Halus</h4>
                        <p>Mengambil benda kecil dengan gerakan "meraup"</p>
                        <div class="radiobtn">
                            <?php if ($gerak_kasar == 'bisa') { ?>
                                <label for="radio3">Bisa</label>
                                <label for="">/</label>
                                <label for="radio4" style="text-decoration-line: line-through; ">Tidak</label>
                            <?php } else { ?>
                                <label for="radio3" style="text-decoration-line: line-through; ">Bisa</label>
                                <label for="">/</label>
                                <label for="radio4">Tidak</label>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <!-- radio -->
                    <div class="form-group">
                        <h4>Bicara dan Bahasa</h4>
                        <p>Mengucap 2 suku kata yang sama (ma..ma..)</p>
                        <div class="radiobtn">
                            <?php if ($bicara_bahasa == 'bisa') { ?>
                                <label for="radio3">Bisa</label>
                                <label for="">/</label>
                                <label for="radio4" style="text-decoration-line: line-through; ">Tidak</label>
                            <?php } else { ?>
                                <label for="radio3" style="text-decoration-line: line-through; ">Bisa</label>
                                <label for="">/</label>
                                <label for="radio4">Tidak</label>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <!-- radio -->
                    <div class="form-group">
                        <h4>Sosialisasi dan Kemandirian</h4>
                        <p>Membedakan dengan orang yang dikenal</p>
                        <div class="radiobtn">
                            <?php if ($sos_kem == 'bisa') { ?>
                                <label for="radio3">Bisa</label>
                                <label for="">/</label>
                                <label for="radio4" style="text-decoration-line: line-through; ">Tidak</label>
                            <?php } else { ?>
                                <label for="radio3" style="text-decoration-line: line-through; ">Bisa</label>
                                <label for="">/</label>
                                <label for="radio4">Tidak</label>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>
<script>
    window.onload = function() {
        window.print();
    }
</script>

</html>