<?= $this->extend('admin/layouts/newTemplates'); ?>

<?= $this->section('content'); ?>

<?php $role = session()->get('level'); ?>
<?php if ($role != 'admin') : ?>
    <?php return redirect()->to('/forbidden'); ?>
<?php endif; ?>

<!-- Content Wrapper. Contains page content -->
<div class="col-12">
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
</div>
<div class="col-12">
    <div class="row">
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">
                        Tabel Data Klasifikasi
                    </h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="table1">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Umur (bln)</th>
                                    <th>Lingkar Kepala (cm)</th>
                                    <th>Berat Badan (kg)</th>
                                    <th>Tinggi Badan (cm)</th>
                                    <th>Tinggi Badan (m)</th>
                                    <th>IMT</th>
                                    <th>Akurasi</th>
                                    <th>Precision</th>
                                    <th>Recall</th>
                                    <th>Status Gizi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($klasifikasi as $key => $value) { ?>
                                    <tr>
                                        <td><?= $key + 1 ?></td>
                                        <td><?= $value['jenis_kelamin'] === 'L' ? 'Laki-laki' : 'Perempuan' ?></td>
                                        <td><?= $value['umur'] ?></td>
                                        <td><?= $value['lingkar_kepala'] ?></td>
                                        <td><?= $value['berat_badan'] ?></td>
                                        <td><?= $value['tinggi_badan_cm'] ?></td>
                                        <td><?= $value['tinggi_badan_m'] ?></td>
                                        <td><?= $value['imt'] ?></td>
                                        <td><?= !empty($value['accuracy']) ? $value['accuracy'] . '%' : '-' ?></td>
                                        <td><?= !empty($value['precision']) ? $value['precision'] . '%' : '-' ?></td>
                                        <td><?= !empty($value['recall']) ? $value['recall'] . '%' : '-' ?></td>
                                        <td><?= $value['status_gizi'] ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>

    </div>
</div>


<?= $this->endSection(); ?>