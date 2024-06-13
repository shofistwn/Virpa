<?= $this->extend('admin/layouts/template'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Grafik Status Gizi</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <!-- <button type="button" class="btn btn-tool" data-card-widget="remove">
                              <i class="fas fa-times"></i>
                          </button> -->
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart">
                        <canvas id="barChartKlasifikasi" style="min-height: 250px; height: 350px; max-height: 450px; max-width: 100%;"></canvas>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Proses Klasifikasi</h3>
                </div>
                <!-- form open -->
                <?= form_open_multipart('predict', ['id' => 'klasifikasi-form']); ?>
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
                    <div class="form-group">
                        <label for="lingkar_kepala">Lingkar Kepala (cm)</label>
                        <input type="number" step="0.01" class="form-control" id="lingkar_kepala" name="lingkar_kepala" placeholder="Lingkar Kepala" required>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <?= form_close(); ?>


            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Hasil Klasifikasi</h3>
                        </div>
                        <div class="card-body">
                            <div class="text-center">
                                <p>Status Gizi Balita :</p>
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

<?= $this->endSection(); ?>