<?= $this->extend('admin/layouts/newTemplates'); ?>

<?= $this->section('content'); ?>

<?php $role = session()->get('level'); ?>
<?php if ($role != 'admin') : ?>
    <?php return redirect()->to('/forbidden'); ?>
<?php endif; ?>

<div class="container-fuild">
    <div class="row">
        <!-- general form elements -->
        <div class="col-12">
            <div class="card card-warning">
                <div class="card-header">
                    <h3 class="card-title"><?= $breadcrumbs ?> - Kode Balita</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <?= form_open_multipart('data-bayi', ['id' => 'bayi-from']) ?>
                    <div class="row">
                        <div class="col-12">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Kode Balita</label>
                                <input type="number" class="form-control" name="kode_bayi" placeholder="Enter ...">
                            </div>
                        </div>
                    </div>

                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Cek Data Balita</button>
                </div>
                <?= form_close() ?>
            </div>
        </div>
        <div class="col-12">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title"><?= $breadcrumbs ?> - Form</h3>
                </div>
                <!-- /.card-body -->
                <div class="card-body">
                    <!-- input states -->
                    <?= form_open('print') ?>
                    <div class="form-group">
                        <label class="col-form-label" for="inputSuccess">Nama Balita</label>
                        <input type="text" class="form-control" id="nama_bayi" name="nama_bayi" placeholder="Nama Balita">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label" for="inputWarning">Usia Balita</label>
                        <input type="text" class="form-control" id="usia_bayi" name="usia_bayi" placeholder="Enter ...">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label" for="inputError">Jenis Kelamin</label>

                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                            <option value="laki_laki">Laki-laki</option>
                            <option value="perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label" for="inputWarning">Berat Badan (kg)</label>
                        <input type="number" step="0.01" class="form-control" name="berat_badan" id="berat_badan" placeholder="Enter ...">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label" for="inputWarning">Tinggi Badan (cm)</label>
                        <input type="number" step="0.01" class="form-control" name="tinggi_badan" id="tinggi_badan" placeholder="Enter ...">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label" for="inputWarning">Lingkar Kepala (cm)</label>
                        <input type="number" step="0.01" class="form-control" name="lingkar_kepala" id="lingkar_kepala" placeholder="Enter ...">
                        <input type="hidden" name="imt" id="imt">
                        <input type="hidden" name="status_gizi" id="status_gizi">
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <!-- radio -->
                            <div class="form-group">
                                <h4>Gerak Kasar</h4>
                                <p>Berdiri selama 1 detik</p>
                                <div class="radiobtn">
                                    <input type="radio" name="gerak_kasar" value="bisa" id="radio1">
                                    <label for="radio1">Bisa</label>
                                </div>
                                <div class="radiobtn">
                                    <input type="radio" name="gerak_kasar" value="tidak" id="radio2">
                                    <label for="radio2">Tidak</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <!-- radio -->
                            <div class="form-group">
                                <h4>Gerak Halus</h4>
                                <p>Mengambil benda kecil dengan gerakan "meraup"</p>
                                <div class="radiobtn">
                                    <input type="radio" name="gerak_halus" value="bisa" id="radio3">
                                    <label for="radio3">Bisa</label>
                                </div>
                                <div class="radiobtn">
                                    <input type="radio" name="gerak_halus" value="tidak" id="radio4">
                                    <label for="radio4">Tidak</label>
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
                                    <input type="radio" name="bicara_bahasa" value="bisa" id="radio5">
                                    <label for="radio5">Bisa</label>
                                </div>
                                <div class="radiobtn">
                                    <input type="radio" name="bicara_bahasa" value="tidak" id="radio6">
                                    <label for="radio6">Tidak</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <!-- radio -->
                            <div class="form-group">
                                <h4>Sosialisasi dan Kemandirian</h4>
                                <p>Membedakan dengan orang yang dikenal</p>
                                <div class="radiobtn">
                                    <input type="radio" name="sos_kem" value="bisa" id="radio7">
                                    <label for="radio7">Bisa</label>
                                </div>
                                <div class="radiobtn">
                                    <input type="radio" name="sos_kem" value="tidak" id="radio8">
                                    <label for="radio8">Tidak</label>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success form-control">Print Data</button>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>
    <!-- /.card -->
</div>



<?= $this->endSection() ?>